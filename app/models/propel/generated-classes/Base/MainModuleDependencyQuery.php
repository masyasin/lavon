<?php

namespace Base;

use \MainModuleDependency as ChildMainModuleDependency;
use \MainModuleDependencyQuery as ChildMainModuleDependencyQuery;
use \Exception;
use \PDO;
use Map\MainModuleDependencyTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'main_module_dependency' table.
 *
 *
 *
 * @method     ChildMainModuleDependencyQuery orderByModuleDependencyId($order = Criteria::ASC) Order by the module_dependency_id column
 * @method     ChildMainModuleDependencyQuery orderByModuleId($order = Criteria::ASC) Order by the module_id column
 * @method     ChildMainModuleDependencyQuery orderByParentId($order = Criteria::ASC) Order by the parent_id column
 *
 * @method     ChildMainModuleDependencyQuery groupByModuleDependencyId() Group by the module_dependency_id column
 * @method     ChildMainModuleDependencyQuery groupByModuleId() Group by the module_id column
 * @method     ChildMainModuleDependencyQuery groupByParentId() Group by the parent_id column
 *
 * @method     ChildMainModuleDependencyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMainModuleDependencyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMainModuleDependencyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMainModuleDependencyQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMainModuleDependencyQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMainModuleDependencyQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMainModuleDependency findOne(ConnectionInterface $con = null) Return the first ChildMainModuleDependency matching the query
 * @method     ChildMainModuleDependency findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMainModuleDependency matching the query, or a new ChildMainModuleDependency object populated from the query conditions when no match is found
 *
 * @method     ChildMainModuleDependency findOneByModuleDependencyId(int $module_dependency_id) Return the first ChildMainModuleDependency filtered by the module_dependency_id column
 * @method     ChildMainModuleDependency findOneByModuleId(int $module_id) Return the first ChildMainModuleDependency filtered by the module_id column
 * @method     ChildMainModuleDependency findOneByParentId(int $parent_id) Return the first ChildMainModuleDependency filtered by the parent_id column *

 * @method     ChildMainModuleDependency requirePk($key, ConnectionInterface $con = null) Return the ChildMainModuleDependency by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainModuleDependency requireOne(ConnectionInterface $con = null) Return the first ChildMainModuleDependency matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainModuleDependency requireOneByModuleDependencyId(int $module_dependency_id) Return the first ChildMainModuleDependency filtered by the module_dependency_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainModuleDependency requireOneByModuleId(int $module_id) Return the first ChildMainModuleDependency filtered by the module_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainModuleDependency requireOneByParentId(int $parent_id) Return the first ChildMainModuleDependency filtered by the parent_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainModuleDependency[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMainModuleDependency objects based on current ModelCriteria
 * @method     ChildMainModuleDependency[]|ObjectCollection findByModuleDependencyId(int $module_dependency_id) Return ChildMainModuleDependency objects filtered by the module_dependency_id column
 * @method     ChildMainModuleDependency[]|ObjectCollection findByModuleId(int $module_id) Return ChildMainModuleDependency objects filtered by the module_id column
 * @method     ChildMainModuleDependency[]|ObjectCollection findByParentId(int $parent_id) Return ChildMainModuleDependency objects filtered by the parent_id column
 * @method     ChildMainModuleDependency[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MainModuleDependencyQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MainModuleDependencyQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MainModuleDependency', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMainModuleDependencyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMainModuleDependencyQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMainModuleDependencyQuery) {
            return $criteria;
        }
        $query = new ChildMainModuleDependencyQuery();
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
     * @return ChildMainModuleDependency|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MainModuleDependencyTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MainModuleDependencyTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMainModuleDependency A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT module_dependency_id, module_id, parent_id FROM main_module_dependency WHERE module_dependency_id = :p0';
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
            /** @var ChildMainModuleDependency $obj */
            $obj = new ChildMainModuleDependency();
            $obj->hydrate($row);
            MainModuleDependencyTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMainModuleDependency|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMainModuleDependencyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MainModuleDependencyTableMap::COL_MODULE_DEPENDENCY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMainModuleDependencyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MainModuleDependencyTableMap::COL_MODULE_DEPENDENCY_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the module_dependency_id column
     *
     * Example usage:
     * <code>
     * $query->filterByModuleDependencyId(1234); // WHERE module_dependency_id = 1234
     * $query->filterByModuleDependencyId(array(12, 34)); // WHERE module_dependency_id IN (12, 34)
     * $query->filterByModuleDependencyId(array('min' => 12)); // WHERE module_dependency_id > 12
     * </code>
     *
     * @param     mixed $moduleDependencyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainModuleDependencyQuery The current query, for fluid interface
     */
    public function filterByModuleDependencyId($moduleDependencyId = null, $comparison = null)
    {
        if (is_array($moduleDependencyId)) {
            $useMinMax = false;
            if (isset($moduleDependencyId['min'])) {
                $this->addUsingAlias(MainModuleDependencyTableMap::COL_MODULE_DEPENDENCY_ID, $moduleDependencyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($moduleDependencyId['max'])) {
                $this->addUsingAlias(MainModuleDependencyTableMap::COL_MODULE_DEPENDENCY_ID, $moduleDependencyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainModuleDependencyTableMap::COL_MODULE_DEPENDENCY_ID, $moduleDependencyId, $comparison);
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
     * @return $this|ChildMainModuleDependencyQuery The current query, for fluid interface
     */
    public function filterByModuleId($moduleId = null, $comparison = null)
    {
        if (is_array($moduleId)) {
            $useMinMax = false;
            if (isset($moduleId['min'])) {
                $this->addUsingAlias(MainModuleDependencyTableMap::COL_MODULE_ID, $moduleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($moduleId['max'])) {
                $this->addUsingAlias(MainModuleDependencyTableMap::COL_MODULE_ID, $moduleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainModuleDependencyTableMap::COL_MODULE_ID, $moduleId, $comparison);
    }

    /**
     * Filter the query on the parent_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentId(1234); // WHERE parent_id = 1234
     * $query->filterByParentId(array(12, 34)); // WHERE parent_id IN (12, 34)
     * $query->filterByParentId(array('min' => 12)); // WHERE parent_id > 12
     * </code>
     *
     * @param     mixed $parentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainModuleDependencyQuery The current query, for fluid interface
     */
    public function filterByParentId($parentId = null, $comparison = null)
    {
        if (is_array($parentId)) {
            $useMinMax = false;
            if (isset($parentId['min'])) {
                $this->addUsingAlias(MainModuleDependencyTableMap::COL_PARENT_ID, $parentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentId['max'])) {
                $this->addUsingAlias(MainModuleDependencyTableMap::COL_PARENT_ID, $parentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainModuleDependencyTableMap::COL_PARENT_ID, $parentId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMainModuleDependency $mainModuleDependency Object to remove from the list of results
     *
     * @return $this|ChildMainModuleDependencyQuery The current query, for fluid interface
     */
    public function prune($mainModuleDependency = null)
    {
        if ($mainModuleDependency) {
            $this->addUsingAlias(MainModuleDependencyTableMap::COL_MODULE_DEPENDENCY_ID, $mainModuleDependency->getModuleDependencyId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the main_module_dependency table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainModuleDependencyTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MainModuleDependencyTableMap::clearInstancePool();
            MainModuleDependencyTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MainModuleDependencyTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MainModuleDependencyTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MainModuleDependencyTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MainModuleDependencyTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MainModuleDependencyQuery
