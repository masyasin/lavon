<?php

namespace Base;

use \MainConfig as ChildMainConfig;
use \MainConfigQuery as ChildMainConfigQuery;
use \Exception;
use \PDO;
use Map\MainConfigTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'main_config' table.
 *
 *
 *
 * @method     ChildMainConfigQuery orderByConfigId($order = Criteria::ASC) Order by the config_id column
 * @method     ChildMainConfigQuery orderByConfigName($order = Criteria::ASC) Order by the config_name column
 * @method     ChildMainConfigQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ChildMainConfigQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ChildMainConfigQuery groupByConfigId() Group by the config_id column
 * @method     ChildMainConfigQuery groupByConfigName() Group by the config_name column
 * @method     ChildMainConfigQuery groupByValue() Group by the value column
 * @method     ChildMainConfigQuery groupByDescription() Group by the description column
 *
 * @method     ChildMainConfigQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMainConfigQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMainConfigQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMainConfigQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMainConfigQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMainConfigQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMainConfig findOne(ConnectionInterface $con = null) Return the first ChildMainConfig matching the query
 * @method     ChildMainConfig findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMainConfig matching the query, or a new ChildMainConfig object populated from the query conditions when no match is found
 *
 * @method     ChildMainConfig findOneByConfigId(int $config_id) Return the first ChildMainConfig filtered by the config_id column
 * @method     ChildMainConfig findOneByConfigName(string $config_name) Return the first ChildMainConfig filtered by the config_name column
 * @method     ChildMainConfig findOneByValue(string $value) Return the first ChildMainConfig filtered by the value column
 * @method     ChildMainConfig findOneByDescription(string $description) Return the first ChildMainConfig filtered by the description column *

 * @method     ChildMainConfig requirePk($key, ConnectionInterface $con = null) Return the ChildMainConfig by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainConfig requireOne(ConnectionInterface $con = null) Return the first ChildMainConfig matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainConfig requireOneByConfigId(int $config_id) Return the first ChildMainConfig filtered by the config_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainConfig requireOneByConfigName(string $config_name) Return the first ChildMainConfig filtered by the config_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainConfig requireOneByValue(string $value) Return the first ChildMainConfig filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainConfig requireOneByDescription(string $description) Return the first ChildMainConfig filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainConfig[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMainConfig objects based on current ModelCriteria
 * @method     ChildMainConfig[]|ObjectCollection findByConfigId(int $config_id) Return ChildMainConfig objects filtered by the config_id column
 * @method     ChildMainConfig[]|ObjectCollection findByConfigName(string $config_name) Return ChildMainConfig objects filtered by the config_name column
 * @method     ChildMainConfig[]|ObjectCollection findByValue(string $value) Return ChildMainConfig objects filtered by the value column
 * @method     ChildMainConfig[]|ObjectCollection findByDescription(string $description) Return ChildMainConfig objects filtered by the description column
 * @method     ChildMainConfig[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MainConfigQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MainConfigQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MainConfig', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMainConfigQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMainConfigQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMainConfigQuery) {
            return $criteria;
        }
        $query = new ChildMainConfigQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildMainConfig|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MainConfigTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MainConfigTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMainConfig A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT config_id, config_name, value, description FROM main_config WHERE config_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildMainConfig $obj */
            $obj = new ChildMainConfig();
            $obj->hydrate($row);
            MainConfigTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildMainConfig|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildMainConfigQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MainConfigTableMap::COL_CONFIG_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMainConfigQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MainConfigTableMap::COL_CONFIG_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the config_id column
     *
     * Example usage:
     * <code>
     * $query->filterByConfigId(1234); // WHERE config_id = 1234
     * $query->filterByConfigId(array(12, 34)); // WHERE config_id IN (12, 34)
     * $query->filterByConfigId(array('min' => 12)); // WHERE config_id > 12
     * </code>
     *
     * @param     mixed $configId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainConfigQuery The current query, for fluid interface
     */
    public function filterByConfigId($configId = null, $comparison = null)
    {
        if (is_array($configId)) {
            $useMinMax = false;
            if (isset($configId['min'])) {
                $this->addUsingAlias(MainConfigTableMap::COL_CONFIG_ID, $configId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($configId['max'])) {
                $this->addUsingAlias(MainConfigTableMap::COL_CONFIG_ID, $configId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainConfigTableMap::COL_CONFIG_ID, $configId, $comparison);
    }

    /**
     * Filter the query on the config_name column
     *
     * Example usage:
     * <code>
     * $query->filterByConfigName('fooValue');   // WHERE config_name = 'fooValue'
     * $query->filterByConfigName('%fooValue%', Criteria::LIKE); // WHERE config_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $configName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainConfigQuery The current query, for fluid interface
     */
    public function filterByConfigName($configName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($configName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainConfigTableMap::COL_CONFIG_NAME, $configName, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%', Criteria::LIKE); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainConfigQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainConfigTableMap::COL_VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainConfigQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainConfigTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMainConfig $mainConfig Object to remove from the list of results
     *
     * @return $this|ChildMainConfigQuery The current query, for fluid interface
     */
    public function prune($mainConfig = null)
    {
        if ($mainConfig) {
            $this->addUsingAlias(MainConfigTableMap::COL_CONFIG_ID, $mainConfig->getConfigId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the main_config table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainConfigTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MainConfigTableMap::clearInstancePool();
            MainConfigTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainConfigTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MainConfigTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MainConfigTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MainConfigTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MainConfigQuery
