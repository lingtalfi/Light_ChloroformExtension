Ling/Light_ChloroformExtension
================
2019-11-18 --> 2019-11-19




Table of contents
===========

- [LightChloroformExtensionAjaxHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/AjaxHandler/LightChloroformExtensionAjaxHandler.md) &ndash; The LightChloroformExtensionAjaxHandler class.
    - [LightChloroformExtensionAjaxHandler::handle](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/AjaxHandler/LightChloroformExtensionAjaxHandler/handle.md) &ndash; and returns a json array as specified in the [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol).
    - ContainerAwareLightAjaxHandler::__construct &ndash; Builds the ContainerAwareLightAjaxHandler instance.
    - ContainerAwareLightAjaxHandler::setContainer &ndash; Sets the light service container interface.
- [LightChloroformExtensionException](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Exception/LightChloroformExtensionException.md) &ndash; The LightChloroformExtensionException class.
- [TableListFieldConfigurationHandlerInterface](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/ConfigurationHandler/TableListFieldConfigurationHandlerInterface.md) &ndash; The TableListFieldConfigurationHandlerInterface interface.
    - [TableListFieldConfigurationHandlerInterface::getConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/ConfigurationHandler/TableListFieldConfigurationHandlerInterface/getConfigurationItem.md) &ndash; Returns the [configuration item](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md#configuration-item) corresponding to the given identifier.
- [TableListField](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField.md) &ndash; The TableListField class.
    - [TableListField::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/__construct.md) &ndash; Builds the AbstractField instance.
    - [TableListField::setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/setContainer.md) &ndash; Sets the container.
    - [TableListField::toArray](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Field/TableListField/toArray.md) &ndash; Returns the array representation of the field.
    - SelectField::create &ndash; Builds and returns the instance.
    - SelectField::setItems &ndash; Sets the items.
    - AbstractField::getId &ndash; Returns the field id.
    - AbstractField::addValidator &ndash; Adds a validator to this instance.
    - AbstractField::validates &ndash; Tests and returns whether every validator attached to this instanced passed.
    - AbstractField::getErrors &ndash; Returns an array of error messages.
    - AbstractField::setValue &ndash; Sets the value for this instance.
    - AbstractField::getValue &ndash; Returns the value of the field.
    - AbstractField::getFallbackValue &ndash; Returns the fallback value, which defaults to null.
    - AbstractField::hasVeryImportantData &ndash; Returns whether this field contains [very important data](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data).
    - AbstractField::getDataTransformer &ndash; Returns the data transformer of this field if any, or null otherwise.
    - AbstractField::setDataTransformer &ndash; Sets the dataTransformer for this field.
    - AbstractField::setId &ndash; Sets the id.
    - AbstractField::setFallbackValue &ndash; Sets the fallbackValue.
    - AbstractField::setLabel &ndash; Sets the label.
    - AbstractField::setHint &ndash; Sets the hint.
    - AbstractField::setErrorName &ndash; Sets the errorName.
    - AbstractField::setHasVeryImportantData &ndash; Sets whether this field has [very important data](https://github.com/lingtalfi/Chloroform/blob/master/doc/pages/chloroform-discussion.md#the-concept-of-very-important-data).
- [LightChloroformExtensionService](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService.md) &ndash; The LightChloroformExtensionService class.
    - [LightChloroformExtensionService::__construct](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/__construct.md) &ndash; Builds the LightChloroformExtensionService instance.
    - [LightChloroformExtensionService::registerTableListConfigurationHandler](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/registerTableListConfigurationHandler.md) &ndash; Registers a table list configuration handler for the given plugin name.
    - [LightChloroformExtensionService::getTableListNumberOfItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListNumberOfItems.md) &ndash; Returns the number of items/rows of the query associated to the given table list dentifier.
    - [LightChloroformExtensionService::getTableListItems](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListItems.md) &ndash; Returns an array of rows based on the given tableListIdentifier.
    - [LightChloroformExtensionService::getTableListLabel](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListLabel.md) &ndash; Returns the formatted label of the column, based on the given raw value.
    - [LightChloroformExtensionService::getTableListConfigurationItem](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/getTableListConfigurationItem.md) &ndash; Returns the table list [configuration item](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/pages/conception-notes.md#configuration-item) referenced by the given identifier.
    - [LightChloroformExtensionService::setContainer](https://github.com/lingtalfi/Light_ChloroformExtension/blob/master/doc/api/Ling/Light_ChloroformExtension/Service/LightChloroformExtensionService/setContainer.md) &ndash; Sets the container.


Dependencies
============
- [Light_AjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler)
- [Light_CsrfSimple](https://github.com/lingtalfi/Light_CsrfSimple)
- [Light_MicroPermission](https://github.com/lingtalfi/Light_MicroPermission)
- [Chloroform](https://github.com/lingtalfi/Chloroform)
- [Light](https://github.com/lingtalfi/Light)
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)


