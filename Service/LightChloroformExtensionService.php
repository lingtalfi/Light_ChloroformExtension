<?php


namespace Ling\Light_ChloroformExtension\Service;

use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ChloroformExtension\Exception\LightChloroformExtensionException;
use Ling\Light_ChloroformExtension\Field\ConfigurationHandler\TableListFieldConfigurationHandlerInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

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
     * This property holds the configurationHandlers for this instance.
     * It's an array of pluginName => TableListFieldConfigurationHandlerInterface.
     * @var TableListFieldConfigurationHandlerInterface[]
     */
    protected $tableListConfigurationHandlers;

    /**
     * This property holds the _cache for this instance.
     * An array of tableListIdentifier => configuration item.
     *
     * @var array
     */
    private $_cache;


    /**
     * Builds the LightChloroformExtensionService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->tableListConfigurationHandlers = [];
        $this->_cache = [];
    }


    /**
     * Registers a table list configuration handler for the given plugin name.
     * @param string $pluginName
     * @param TableListFieldConfigurationHandlerInterface $handler
     */
    public function registerTableListConfigurationHandler(string $pluginName, TableListFieldConfigurationHandlerInterface $handler)
    {
        if ($handler instanceof LightServiceContainerAwareInterface) {
            $handler->setContainer($this->container);
        }
        $this->tableListConfigurationHandlers[$pluginName] = $handler;
    }


    /**
     * Returns the number of items/rows of the query associated to the given table list dentifier.
     *
     * @param string $tableListIdentifier
     * @return int
     * @throws \Exception
     */
    public function getTableListNumberOfItems(string $tableListIdentifier): int
    {
        list($q, $markers) = $this->getTableListSqlQueryInfo($tableListIdentifier);

        /**
         * @var $pdoWrapper SimplePdoWrapperInterface
         */
        $pdoWrapper = $this->container->get("database");
        $row = $pdoWrapper->fetch($q, $markers);
        if (false !== $row) {
            return (int)$row['count'];
        }
        throw new LightChloroformExtensionException("Something went wrong with the sql count request: $q.");
    }


    /**
     * Returns an array of rows based on the given tableListIdentifier.
     * The returned array structure depends on the valueAsIndex flag.
     *
     * If valueAsIndex=true, then it's an array of value => label.
     * If valueAsIndex=false, then it's an array of rows, each of which containing:
     *      - value: the value
     *      - label: the label
     *
     *
     *
     * @param string $tableListIdentifier
     * @param bool $valueAsIndex
     * @return array
     * @throws \Exception
     */
    public function getTableListItems(string $tableListIdentifier, bool $valueAsIndex = true): array
    {
        list($q, $markers) = $this->getTableListSqlQueryInfo($tableListIdentifier, false);

        /**
         * @var $pdoWrapper SimplePdoWrapperInterface
         */
        $pdoWrapper = $this->container->get("database");
        if (true === $valueAsIndex) {
            return $pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
        }
        return $pdoWrapper->fetchAll($q, $markers);
    }

    /**
     * Returns the table list @page(configuration item) referenced by the given identifier.
     *
     * @param string $tableListIdentifier
     * @return array
     * @throws \Exception
     */
    public function getTableListConfigurationItem(string $tableListIdentifier): array
    {
        if (array_key_exists($tableListIdentifier, $this->_cache)) {
            return $this->_cache[$tableListIdentifier];
        }

        list($pluginName, $pluginId) = explode(".", $tableListIdentifier, 2);
        if (array_key_exists($pluginName, $this->tableListConfigurationHandlers)) {
            $conf = $this->tableListConfigurationHandlers[$pluginName]->getConfigurationItem($pluginId);
            $this->_cache[$tableListIdentifier] = $conf;
            return $conf;
        }
        throw new LightChloroformExtensionException("Plugin not registered: $pluginName, with identifier $tableListIdentifier.");
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



    //--------------------------------------------
    //
    //--------------------------------------------



    /**
     * Returns an array containing the sql query and the corresponding pdo markers, based the given table list identifier.
     * The type of query returned depends on the isCount flag.
     *
     * - if isCount=true, then the query is a count query (i.e. select count(*) as count...)
     * - if isCount=false, then the query is a query to fetch the items/rows.
     *
     *
     * @param string $tableListIdentifier
     * @param bool $isCount
     * @return array
     * @throws \Exception
     */
    protected function getTableListSqlQueryInfo(string $tableListIdentifier, bool $isCount = true): array
    {
        $markers = [];
        $item = $this->getTableListConfigurationItem($tableListIdentifier);
        $fields = $item['fields'];
        $table = $item['table'];
        $joins = $item['joins'] ?? '';
        $where = $item['where'] ?? '';
        if (true === $isCount) {
            $q = "select count(*) as count";
        } else {
            $q = "select $fields";
        }
        $q .= " from $table";
        if ($joins) {
            $q .= " $joins";
        }
        if ($where) {
            $q .= " where $where";
        }
        return [$q, $markers];
    }


}