<?php


namespace Ling\Light_ChloroformExtension\AjaxHandler;


use Ling\Light_AjaxHandler\Handler\ContainerAwareLightAjaxHandler;
use Ling\Light_ChloroformExtension\Exception\LightChloroformExtensionException;
use Ling\Light_ChloroformExtension\Service\LightChloroformExtensionService;
use Ling\Light_CsrfSimple\Service\LightCsrfSimpleService;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;

/**
 * The LightChloroformExtensionAjaxHandler class.
 */
class LightChloroformExtensionAjaxHandler extends ContainerAwareLightAjaxHandler
{

    /**
     * @implementation
     */
    public function handle(string $actionId, array $params): array
    {
        $response = [];
        switch ($actionId) {
            case "table_list.autocomplete":

                if (array_key_exists("tableListIdentifier", $params)) {


                    $tableListIdentifier = $params['tableListIdentifier'];


                    /**
                     * @var $chloroformX LightChloroformExtensionService
                     */
                    $chloroformX = $this->container->get('chloroform_extension');
                    $conf = $chloroformX->getTableListConfigurationItem($tableListIdentifier);


                    //--------------------------------------------
                    // TOKEN CHECK
                    //--------------------------------------------
                    $useCsrfToken = $conf['csrf_token'] ?? true;
                    if (true === $useCsrfToken) {
                        if (array_key_exists('csrf_token', $params)) {
                            /**
                             * @var $csrfSimple LightCsrfSimpleService
                             */
                            $csrfSimple = $this->container->get('csrf_simple');
                            $csrfToken = $params['csrf_token'];
                            if (false === $csrfSimple->isValid($csrfToken)) {
                                throw new LightChloroformExtensionException("Invalid csrf token provided for action $actionId and table list identifier $tableListIdentifier.");
                            }

                        } else {
                            throw new LightChloroformExtensionException("Configuration for $tableListIdentifier requires csrf token check,
                             but no csrf_token value was provided (action = $actionId).");
                        }
                    }


                    //--------------------------------------------
                    // MICRO PERMISSION CHECK
                    //--------------------------------------------
                    if (array_key_exists('micro_permission', $conf)) {
                        $microPermission = $conf['micro_permission'];

                        /**
                         * @var $microS LightMicroPermissionService
                         */
                        $microS = $this->container->get('micro_permission');
                        if (false === $microS->hasMicroPermission($microPermission)) {
                            throw new LightChloroformExtensionException("Micro permission denied: $microPermission, for action $actionId and table list identifier $tableListIdentifier.");
                        }
                    }


                    //--------------------------------------------
                    //
                    //--------------------------------------------
                    $rows = $chloroformX->getTableListItems($tableListIdentifier, false);
                    $response = [
                        "type" => 'success',
                        "rows" => $rows,
                    ];


                } else {
                    throw new LightChloroformExtensionException("Missing parameter tableListIdentifier for action $actionId.");
                }
                break;
            default:
                throw new LightChloroformExtensionException("LightChloroformExtensionAjaxHandler: Unknown action $actionId.");
                break;
        }
        return $response;
    }


}