<?php


namespace Ling\Light_ChloroformExtension\Field;


use Ling\Chloroform\Field\SelectField;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ChloroformExtension\Service\LightChloroformExtensionService;


/**
 * The TableListField class.
 * See more in the @page(TableListField conception notes)
 */
class TableListField extends SelectField
{
    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the isPrepared for this instance.
     * @var bool=false
     */
    protected $isPrepared;


    /**
     * @overrides
     */
    public function __construct(array $properties = [])
    {
        // ensure the some properties are defined
        $tableListIdentifier = $properties['tableListIdentifier'] ?? null;
        $threshold = $properties['threshold'] ?? 200;
        $useAutoComplete = false;

        //
        $properties['tableListIdentifier'] = $tableListIdentifier;
        $properties['threshold'] = $threshold;
        $properties['useAutoComplete'] = $useAutoComplete;

        parent::__construct($properties);
        $this->container = null;
        $this->isPrepared = false;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     * @return $this
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
        return $this;
    }


    /**
     * @overrides
     */
    public function toArray(): array
    {
        $this->prepareItems();
        $arr = parent::toArray();


        //--------------------------------------------
        // initializing the formatted value for the auto-complete field if necessary
        //--------------------------------------------
        if (true === $arr['useAutoComplete']) {
            /**
             * @var $chloroformX LightChloroformExtensionService
             */
            $chloroformX = $this->container->get('chloroform_extension');
            $value = $arr['value'];
            if (empty($value)) { // insert mode
                $arr['autoCompleteLabel'] = '';
            } else { // update mode
                $arr['autoCompleteLabel'] = $chloroformX->getTableListLabel($value, $arr['tableListIdentifier']);
            }
        }
        return $arr;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Prepares this class to be exported with the toArray method.
     * @throws \Exception
     */
    private function prepareItems()
    {
        if (false === $this->isPrepared) {

            $tableListIdentifier = $this->properties['tableListIdentifier'];

            /**
             * @var $chloroformX LightChloroformExtensionService
             */
            $chloroformX = $this->container->get('chloroform_extension');
            $numberOfItems = $chloroformX->getTableListNumberOfItems($tableListIdentifier);


            if ($numberOfItems > $this->properties['threshold']) {
                // use auto-complete

                $this->properties['useAutoComplete'] = true;
            } else {
                $items = $chloroformX->getTableListItems($tableListIdentifier);
                $this->setItems($items);
            }
            $this->isPrepared = true;
        }
    }

}