<?php

namespace Base;

use \MainModule as ChildMainModule;
use \MainModuleQuery as ChildMainModuleQuery;
use \Exception;
use \PDO;
use Map\MainModuleTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'main_module' table.
 *
 *
 *
 * @method     ChildMainModuleQuery orderByModuleId($order = Criteria::ASC) Order by the module_id column
 * @method     ChildMainModuleQuery orderByModuleName($order = Criteria::ASC) Order by the module_name column
 * @method     ChildMainModuleQuery orderByModulePath($order = Criteria::ASC) Order by the module_path column
 * @method     ChildMainModuleQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method     ChildMainModuleQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 *
 * @method     ChildMainModuleQuery groupByModuleId() Group by the module_id column
 * @method     ChildMainModuleQuery groupByModuleName() Group by the module_name column
 * @method     ChildMainModuleQuery groupByModulePath() Group by the module_path column
 * @method     ChildMainModuleQuery groupByVersion() Group by the version column
 * @method     ChildMainModuleQuery groupByUserId() Group by the user_id column
 *
 * @method     ChildMainModuleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMainModuleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMainModuleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMainModuleQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMainModuleQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMainModuleQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMainModule findOne(ConnectionInterface $con = null) Return the first ChildMainModule matching the query
 * @method     ChildMainModule findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMainModule matching the query, or a new ChildMainModule object populated from the query conditions when no match is found
 *
 * @method     ChildMainModule findOneByModuleId(int $module_id) Return the first ChildMainModule filtered by the module_id column
 * @method     ChildMainModule findOneByModuleName(string $module_name) Return the first ChildMainModule filtered by the module_name column
 * @method     ChildMainModule findOneByModulePath(string $module_path) Return the first ChildMainModule filtered by the module_path column
 * @method     ChildMainModule findOneByVersion(string $version) Return the first ChildMainModule filtered by the version column
 * @method     ChildMainModule findOneByUserId(int $user_id) Return the first ChildMainModule filtered by the user_id column *

 * @method     ChildMainModule requirePk($key, ConnectionInterface $con = null) Return the ChildMainModule by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainModule requireOne(ConnectionInterface $con = null) Return the first ChildMainModule matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainModule requireOneByModuleId(int $module_id) Return the first ChildMainModule filtered by the module_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainModule requireOneByModuleName(string $module_name) Return the first ChildMainModule filtered by the module_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainModule requireOneByModulePath(string $module_path) Return the first ChildMainModule filtered by the module_path column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainModule requireOneByVersion(string $version) Return the first ChildMainModule filtered by the version column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainModule requireOneByUserId(int $user_id) Return the first ChildMainModule filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainModule[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMainModule objects based on current ModelCriteria
 * @method     ChildMainModule[]|ObjectCollection findByModuleId(int $module_id) Return ChildMainModule objects filtered by the module_id column
 * @method     ChildMainModule[]|ObjectCollection findByModuleName(string $module_name) Return ChildMainModule objects filtered by the module_name column
 * @method     ChildMainModule[]|ObjectCollection findByModulePath(string $module_path) Return ChildMainModule objects filtered by the module_path column
 * @method     ChildMainModule[]|ObjectCollection findByVersion(string $version) Return ChildMainModule objects filtered by the version column
 * @method     ChildMainModule[]|ObjectCollection findByUserId(int $user_id) Return ChildMainModule objects filtered by the user_id column
 * @method     ChildMainModule[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MainModuleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MainModuleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MainModule', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMainModuleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMainModuleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMainModuleQuery) {
            return $criteria;
        }
        $query = new ChildMainModuleQuery();
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
     * @return ChildMainModule|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MainModuleTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MainModuleTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMainModule A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT module_id, module_name, module_path, version, user_id FROM main_module WHERE module_id = :p0';
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
            /** @var ChildMainModule $obj */
            $obj = new ChildMainModule();
            $obj->hydrate($row);
            MainModuleTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMainModule|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMainModuleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MainModuleTableMap::COL_MODULE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMainModuleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MainModuleTableMap::COL_MODULE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the module_id column
     *
     * Example usage:
     * <code>
     * $query->filterByModuleId(1234); // WHERE module_id = 1234
     * $query->filterByModuleId(array(12, 34)); // WHERE module_id IN (12, 34)
     * $query->filterByModuleId(array('min' => 12)); // WHERE module_id > 12
     * </code>
     *
     * @param     mixed $moduleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainModuleQuery The current query, for fluid interface
     */
    public function filterByModuleId($moduleId = null, $comparison = null)
    {
        if (is_array($moduleId)) {
            $useMinMax = false;
            if (isset($moduleId['min'])) {
                $this->addUsingAlias(MainModuleTableMap::COL_MODULE_ID, $moduleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($moduleId['max'])) {
                $this->addUsingAlias(MainModuleTableMap::COL_MODULE_ID, $moduleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainModuleTableMap::COL_MODULE_ID, $moduleId, $comparison);
    }

    /**
     * Filter the query on the module_name column
     *
     * Example usage:
     * <code>
     * $query->filterByModuleName('fooValue');   // WHERE module_name = 'fooValue'
     * $query->filterByModuleName('%fooValue%', Criteria::LIKE); // WHERE module_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $moduleName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainModuleQuery The current query, for fluid interface
     */
    public function filterByModuleName($moduleName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($moduleName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainModuleTableMap::COL_MODULE_NAME, $moduleName, $comparison);
    }

    /**
     * Filter the query on the module_path column
     *
     * Example usage:
     * <code>
     * $query->filterByModulePath('fooValue');   // WHERE module_path = 'fooValue'
     * $query->filterByModulePath('%fooValue%', Criteria::LIKE); // WHERE module_path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $modulePath The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainModuleQuery The current query, for fluid interface
     */
    public function filterByModulePath($modulePath = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($modulePath)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainModuleTableMap::COL_MODULE_PATH, $modulePath, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion('fooValue');   // WHERE version = 'fooValue'
     * $query->filterByVersion('%fooValue%', Criteria::LIKE); // WHERE version LIKE '%fooValue%'
     * </code>
     *
     * @param     string $version The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainModuleQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($version)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainModuleTableMap::COL_VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainModuleQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(MainModuleTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(MainModuleTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainModuleTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMainModule $mainModule Object to remove from the list of results
     *
     * @return $this|ChildMainModuleQuery The current query, for fluid interface
     */
    public function prune($mainModule = null)
    {
        if ($mainModule) {
            $this->addUsingAlias(MainModuleTableMap::COL_MODULE_ID, $mainModule->getModuleId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the main_module table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainModuleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MainModuleTableMap::clearInstancePool();
            MainModuleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MainModuleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MainModuleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MainModuleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MainModuleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MainModuleQuery
