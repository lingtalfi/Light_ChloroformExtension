<?php


namespace Ling\Light_ChloroformExtension\Field\ConfigurationHandler;

/**
 * The TableListFieldConfigurationHandlerInterface interface.
 */
interface TableListFieldConfigurationHandlerInterface
{

    /**
     * Returns the @page(configuration item) corresponding to the given identifier.
     *
     * @param string $identifier
     * @return array
     * @throws \Exception
     */
    public function getConfigurationItem(string $identifier): array;
}