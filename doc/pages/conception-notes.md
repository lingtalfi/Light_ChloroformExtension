Light_ChloroformExtension conception notes
==============
2019-11-14



The idea of this plugin is to bring extra chloroform fields to the dev fingertips.
The particularity of those fields is that they are use the light framework more or less.


Note: if I could go back in time, I would probably have incorporated the [Light_AjaxFileUploadManager](https://github.com/lingtalfi/Light_AjaxFileUploadManager) plugin
as a light chloroform extension, because it fits the description.
But hey, that's too late.



Below is the description of the fields that you can find in this planet.


Note: a renderer you might be interested in is the [Chloroform_HeliumLightRenderer](https://github.com/lingtalfi/Chloroform_HeliumLightRenderer), which is perfectly capable of 
displaying all the fields found in our plugin.





TableListField
---------------
2019-11-14


The idea of this field is to provide a list (like an html select) of items coming from a database table.
But the actual rendering depends on the number of items:

- if the number of items to display is less than 200 (configurable number), then a regular html select is used 
- if the number of items to display is more than that threshold, then an auto-complete control is used


That's because if you have too many items, a regular html select starts very being slow: we don't want that.


To make that work, you have to configure the TableListField, so that it can execute both sql queries:

- the count request (aka count sql query),
- the actual request to fetch the list items

Basically what we need to do is to create a sql query that returns two columns: the value and the label, in that order.
 
This is done by creating a configuration item (see the configuration item section below) in your plugin configuration.
Then choose an identifier to reference that configuration item, and eventually inject that identifier in the TableListField instance.

Security note: the identifier will be transmitted over http in case the auto-complete method is chosen.

Convention: because light is an environment using plugins, the identifier always uses this notation:

- {pluginName}.{pluginSpecificIdentifier}

For instance:

- MyPlugin.blabla



From then, either the html select is chosen, in which its displayed by the renderer,
or there are too many rows, in which case an ajax service (provided by this plugin) is called and returns the items
to display in the auto-complete control.


### Configuration item

Your plugin is responsible for providing the configuration item (referenced by the identifier).
In order to do that, your plugin needs to provide an object implementing the **TableListFieldConfigurationHandlerInterface**
interface.
This object basically returns a **configuration item** which structure is the following:

- fields: string representing the fields to fetch, as they are written in the sql query.
            It should yields two columns: value and label. You might use aliases to achieve that.

            For instance:
           
                - id as value, first_name as label
                - id as value, concat(id, ".", first_name) as label 
                
- table: the complete name (i.e. with alias if necessary) of the table used in this request
            For instance:   
            
                - lud_user
                - `lud_user`
                - lud_user u
                
            Notice: if you need backquotes, write them manually (like in the second example above).

- column: the target column, used to select the row. In particular, this is used to get the
            formatted default value when in ajax mode (when there are too many items for a regular select).                              
                
- ?joins: string representing the joins part of the query.
            For instance:
            
                - inner join lud_user u on u.id=h.user_id
                                
- ?where: string representing the where part of your sql query (if necessary). The where keyword is excluded.
            For instance:
            
                - id>50 and id<5000







