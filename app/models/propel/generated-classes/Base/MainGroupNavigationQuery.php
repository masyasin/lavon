<?php

namespace Base;

use \MainGroupNavigation as ChildMainGroupNavigation;
use \MainGroupNavigationQuery as ChildMainGroupNavigationQuery;
use \Exception;
use \PDO;
use Map\MainGroupNavigationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'main_group_navigation' table.
 *
 *
 *
 * @method     ChildMainGroupNavigationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMainGroupNavigationQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method     ChildMainGroupNavigationQuery orderByNavigationId($order = Criteria::ASC) Order by the navigation_id column
 *
 * @method     ChildMainGroupNavigationQuery groupById() Group by the id column
 * @method     ChildMainGroupNavigationQuery groupByGroupId() Group by the group_id column
 * @method     ChildMainGroupNavigationQuery groupByNavigationId() Group by the navigation_id column
 *
 * @method     ChildMainGroupNavigationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMainGroupNavigationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMainGroupNavigationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMainGroupNavigationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMainGroupNavigationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMainGroupNavigationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMainGroupNavigation findOne(ConnectionInterface $con = null) Return the first ChildMainGroupNavigation matching the query
 * @method     ChildMainGroupNavigation findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMainGroupNavigation matching the query, or a new ChildMainGroupNavigation object populated from the query conditions when no match is found
 *
 * @method     ChildMainGroupNavigation findOneById(int $id) Return the first ChildMainGroupNavigation filtered by the id column
 * @method     ChildMainGroupNavigation findOneByGroupId(int $group_id) Return the first ChildMainGroupNavigation filtered by the group_id column
 * @method     ChildMainGroupNavigation findOneByNavigationId(int $navigation_id) Return the first ChildMainGroupNavigation filtered by the navigation_id column *

 * @method     ChildMainGroupNavigation requirePk($key, ConnectionInterface $con = null) Return the ChildMainGroupNavigation by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainGroupNavigation requireOne(ConnectionInterface $con = null) Return the first ChildMainGroupNavigation matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainGroupNavigation requireOneById(int $id) Return the first ChildMainGroupNavigation filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainGroupNavigation requireOneByGroupId(int $group_id) Return the first ChildMainGroupNavigation filtered by the group_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainGroupNavigation requireOneByNavigationId(int $navigation_id) Return the first ChildMainGroupNavigation filtered by the navigation_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainGroupNavigation[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMainGroupNavigation objects based on current ModelCriteria
 * @method     ChildMainGroupNavigation[]|ObjectCollection findById(int $id) Return ChildMainGroupNavigation objects filtered by the id column
 * @method     ChildMainGroupNavigation[]|ObjectCollection findByGroupId(int $group_id) Return ChildMainGroupNavigation objects filtered by the group_id column
 * @method     ChildMainGroupNavigation[]|ObjectCollection findByNavigationId(int $navigation_id) Return ChildMainGroupNavigation objects filtered by the navigation_id column
 * @method     ChildMainGroupNavigation[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MainGroupNavigationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MainGroupNavigationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MainGroupNavigation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMainGroupNavigationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMainGroupNavigationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMainGroupNavigationQuery) {
            return $criteria;
        }
        $query = new ChildMainGroupNavigationQuery();
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
     * @return ChildMainGroupNavigation|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MainGroupNavigationTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MainGroupNavigationTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMainGroupNavigation A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, group_id, navigation_id FROM main_group_navigation WHERE id = :p0';
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
            /** @var ChildMainGroupNavigation $obj */
            $obj = new ChildMainGroupNavigation();
            $obj->hydrate($row);
            MainGroupNavigationTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMainGroupNavigation|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMainGroupNavigationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MainGroupNavigationTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMainGroupNavigationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MainGroupNavigationTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainGroupNavigationQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MainGroupNavigationTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MainGroupNavigationTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainGroupNavigationTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupId(1234); // WHERE group_id = 1234
     * $query->filterByGroupId(array(12, 34)); // WHERE group_id IN (12, 34)
     * $query->filterByGroupId(array('min' => 12)); // WHERE group_id > 12
     * </code>
     *
     * @param     mixed $groupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainGroupNavigationQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (is_array($groupId)) {
            $useMinMax = false;
            if (isset($groupId['min'])) {
                $this->addUsingAlias(MainGroupNavigationTableMap::COL_GROUP_ID, $groupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupId['max'])) {
                $this->addUsingAlias(MainGroupNavigationTableMap::COL_GROUP_ID, $groupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainGroupNavigationTableMap::COL_GROUP_ID, $groupId, $comparison);
    }

    /**
     * Filter the query on the navigation_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNavigationId(1234); // WHERE navigation_id = 1234
     * $query->filterByNavigationId(array(12, 34)); // WHERE navigation_id IN (12, 34)
     * $query->filterByNavigationId(array('min' => 12)); // WHERE navigation_id > 12
     * </code>
     *
     * @param     mixed $navigationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainGroupNavigationQuery The current query, for fluid interface
     */
    public function filterByNavigationId($navigationId = null, $comparison = null)
    {
        if (is_array($navigationId)) {
            $useMinMax = false;
            if (isset($navigationId['min'])) {
                $this->addUsingAlias(MainGroupNavigationTableMap::COL_NAVIGATION_ID, $navigationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($navigationId['max'])) {
                $this->addUsingAlias(MainGroupNavigationTableMap::COL_NAVIGATION_ID, $navigationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainGroupNavigationTableMap::COL_NAVIGATION_ID, $navigationId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMainGroupNavigation $mainGroupNavigation Object to remove from the list of results
     *
     * @return $this|ChildMainGroupNavigationQuery The current query, for fluid interface
     */
    public function prune($mainGroupNavigation = null)
    {
        if ($mainGroupNavigation) {
            $this->addUsingAlias(MainGroupNavigationTableMap::COL_ID, $mainGroupNavigation->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the main_group_navigation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainGroupNavigationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MainGroupNavigationTableMap::clearInstancePool();
            MainGroupNavigationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MainGroupNavigationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MainGroupNavigationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MainGroupNavigationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MainGroupNavigationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MainGroupNavigationQuery
