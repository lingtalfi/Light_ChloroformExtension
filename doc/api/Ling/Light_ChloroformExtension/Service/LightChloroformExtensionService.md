[Back to the Ling/Light_ChloroformExtension api](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension.md)



The LightChloroformExtensionService class
================
2019-11-18 --> 2019-11-27






Introduction
============

The LightChloroformExtensionService class.



Class synopsis
==============


class <span class="pl-k">LightChloroformExtensionService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected [Ling\Light_ChloroformExtension\Field\ConfigurationHandler\TableListFieldConfigurationHandlerInterface[]](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/ConfigurationHandler/TableListFieldConfigurationHandlerInterface.md) [$tableListConfigurationHandlers](#property-tableListConfigurationHandlers) ;
    - private array [$_cache](#property-_cache) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/__construct.md)() : void
    - public [registerTableListConfigurationHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/registerTableListConfigurationHandler.md)(string $pluginName, [Ling\Light_ChloroformExtension\Field\ConfigurationHandler\TableListFieldConfigurationHandlerInterface](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/ConfigurationHandler/TableListFieldConfigurationHandlerInterface.md) $handler) : void
    - public [getTableListNumberOfItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListNumberOfItems.md)(string $tableListIdentifier) : int
    - public [getTableListItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListItems.md)(string $tableListIdentifier, ?bool $valueAsIndex = true) : array
    - public [getTableListLabel](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListLabel.md)(string $columnValue, string $tableListIdentifier) : string
    - public [getTableListConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListConfigurationItem.md)(string $tableListIdentifier) : array
    - public [setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [getTableListSqlQueryInfo](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListSqlQueryInfo.md)(string $tableListIdentifier, ?bool $isCount = true, ?array $options = []) : array

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-tableListConfigurationHandlers"><b>tableListConfigurationHandlers</b></span>

    This property holds the configurationHandlers for this instance.
    It's an array of pluginName => TableListFieldConfigurationHandlerInterface.
    
    

- <span id="property-_cache"><b>_cache</b></span>

    This property holds the _cache for this instance.
    An array of tableListIdentifier => configuration item.
    
    



Methods
==============

- [LightChloroformExtensionService::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/__construct.md) &ndash; Builds the LightChloroformExtensionService instance.
- [LightChloroformExtensionService::registerTableListConfigurationHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/registerTableListConfigurationHandler.md) &ndash; Registers a table list configuration handler for the given plugin name.
- [LightChloroformExtensionService::getTableListNumberOfItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListNumberOfItems.md) &ndash; Returns the number of items/rows of the query associated to the given table list dentifier.
- [LightChloroformExtensionService::getTableListItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListItems.md) &ndash; Returns an array of rows based on the given tableListIdentifier.
- [LightChloroformExtensionService::getTableListLabel](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListLabel.md) &ndash; Returns the formatted label of the column, based on the given raw value.
- [LightChloroformExtensionService::getTableListConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListConfigurationItem.md) &ndash; Returns the table list [configuration item](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md#configuration-item) referenced by the given identifier.
- [LightChloroformExtensionService::setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/setContainer.md) &ndash; Sets the container.
- [LightChloroformExtensionService::getTableListSqlQueryInfo](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListSqlQueryInfo.md) &ndash; Returns an array containing the sql query and the corresponding pdo markers, based the given table list identifier.





Location
=============
Ling\Light_ChloroformExtension\Service\LightChloroformExtensionService<br>
See the source code of [Ling\Light_ChloroformExtension\Service\LightChloroformExtensionService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/Service/LightChloroformExtensionService.php)



SeeAlso
==============
Previous class: [TableListField](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField.md)<br>
