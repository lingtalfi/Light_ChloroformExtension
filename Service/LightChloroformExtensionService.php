<?php


namespace Ling\Light_ChloroformExtension\Service;

use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ChloroformExtension\Field\TableList\TableListService;
use Ling\Light_Nugget\Service\LightNuggetService;

/**
 * The LightChloroformExtensionService class.
 */
class LightChloroformExtensionService
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightChloroformExtensionService instance.
     */
    public function __construct()
    {
        $this->container = null;
    }


    /**
     *
     * Returns the @page(table list configuration item) corresponding to the given identifier.
     *
     * See the @page(Light_ChloroformExtension conception notes) for more details.
     *
     * @param string $identifier
     * @return array
     * @throws \Exception
     */
    public function getConfigurationItem(string $identifier): array
    {
        /**
         * @var $ng LightNuggetService
         */
        $ng = $this->container->get("nugget");
        return $ng->getNugget($identifier, "Light_ChloroformExtension/tablelist");

    }

    /**
     * Returns the table list service based on the given table list identifier.
     *
     * @param string $tableListIdentifier
     * @return TableListService
     * @throws \Exception
     */
    public function getTableListService(string $tableListIdentifier): TableListService
    {
        $nugget = $this->getConfigurationItem($tableListIdentifier);
        $service = new TableListService();
        $service->setContainer($this->container);
        $service->setNugget($nugget);
        return $service;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


}