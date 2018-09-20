<?php

namespace Base;

use \MainGroupPrivilege as ChildMainGroupPrivilege;
use \MainGroupPrivilegeQuery as ChildMainGroupPrivilegeQuery;
use \Exception;
use \PDO;
use Map\MainGroupPrivilegeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'main_group_privilege' table.
 *
 *
 *
 * @method     ChildMainGroupPrivilegeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMainGroupPrivilegeQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method     ChildMainGroupPrivilegeQuery orderByPrivilegeId($order = Criteria::ASC) Order by the privilege_id column
 *
 * @method     ChildMainGroupPrivilegeQuery groupById() Group by the id column
 * @method     ChildMainGroupPrivilegeQuery groupByGroupId() Group by the group_id column
 * @method     ChildMainGroupPrivilegeQuery groupByPrivilegeId() Group by the privilege_id column
 *
 * @method     ChildMainGroupPrivilegeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMainGroupPrivilegeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMainGroupPrivilegeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMainGroupPrivilegeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMainGroupPrivilegeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMainGroupPrivilegeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMainGroupPrivilege findOne(ConnectionInterface $con = null) Return the first ChildMainGroupPrivilege matching the query
 * @method     ChildMainGroupPrivilege findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMainGroupPrivilege matching the query, or a new ChildMainGroupPrivilege object populated from the query conditions when no match is found
 *
 * @method     ChildMainGroupPrivilege findOneById(int $id) Return the first ChildMainGroupPrivilege filtered by the id column
 * @method     ChildMainGroupPrivilege findOneByGroupId(int $group_id) Return the first ChildMainGroupPrivilege filtered by the group_id column
 * @method     ChildMainGroupPrivilege findOneByPrivilegeId(int $privilege_id) Return the first ChildMainGroupPrivilege filtered by the privilege_id column *

 * @method     ChildMainGroupPrivilege requirePk($key, ConnectionInterface $con = null) Return the ChildMainGroupPrivilege by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainGroupPrivilege requireOne(ConnectionInterface $con = null) Return the first ChildMainGroupPrivilege matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainGroupPrivilege requireOneById(int $id) Return the first ChildMainGroupPrivilege filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainGroupPrivilege requireOneByGroupId(int $group_id) Return the first ChildMainGroupPrivilege filtered by the group_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainGroupPrivilege requireOneByPrivilegeId(int $privilege_id) Return the first ChildMainGroupPrivilege filtered by the privilege_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainGroupPrivilege[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMainGroupPrivilege objects based on current ModelCriteria
 * @method     ChildMainGroupPrivilege[]|ObjectCollection findById(int $id) Return ChildMainGroupPrivilege objects filtered by the id column
 * @method     ChildMainGroupPrivilege[]|ObjectCollection findByGroupId(int $group_id) Return ChildMainGroupPrivilege objects filtered by the group_id column
 * @method     ChildMainGroupPrivilege[]|ObjectCollection findByPrivilegeId(int $privilege_id) Return ChildMainGroupPrivilege objects filtered by the privilege_id column
 * @method     ChildMainGroupPrivilege[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MainGroupPrivilegeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MainGroupPrivilegeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MainGroupPrivilege', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMainGroupPrivilegeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMainGroupPrivilegeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMainGroupPrivilegeQuery) {
            return $criteria;
        }
        $query = new ChildMainGroupPrivilegeQuery();
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
     * @return ChildMainGroupPrivilege|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MainGroupPrivilegeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MainGroupPrivilegeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMainGroupPrivilege A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, group_id, privilege_id FROM main_group_privilege WHERE id = :p0';
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
            /** @var ChildMainGroupPrivilege $obj */
            $obj = new ChildMainGroupPrivilege();
            $obj->hydrate($row);
            MainGroupPrivilegeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMainGroupPrivilege|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMainGroupPrivilegeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MainGroupPrivilegeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMainGroupPrivilegeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MainGroupPrivilegeTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildMainGroupPrivilegeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MainGroupPrivilegeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MainGroupPrivilegeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainGroupPrivilegeTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildMainGroupPrivilegeQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (is_array($groupId)) {
            $useMinMax = false;
            if (isset($groupId['min'])) {
                $this->addUsingAlias(MainGroupPrivilegeTableMap::COL_GROUP_ID, $groupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupId['max'])) {
                $this->addUsingAlias(MainGroupPrivilegeTableMap::COL_GROUP_ID, $groupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainGroupPrivilegeTableMap::COL_GROUP_ID, $groupId, $comparison);
    }

    /**
     * Filter the query on the privilege_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPrivilegeId(1234); // WHERE privilege_id = 1234
     * $query->filterByPrivilegeId(array(12, 34)); // WHERE privilege_id IN (12, 34)
     * $query->filterByPrivilegeId(array('min' => 12)); // WHERE privilege_id > 12
     * </code>
     *
     * @param     mixed $privilegeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainGroupPrivilegeQuery The current query, for fluid interface
     */
    public function filterByPrivilegeId($privilegeId = null, $comparison = null)
    {
        if (is_array($privilegeId)) {
            $useMinMax = false;
            if (isset($privilegeId['min'])) {
                $this->addUsingAlias(MainGroupPrivilegeTableMap::COL_PRIVILEGE_ID, $privilegeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($privilegeId['max'])) {
                $this->addUsingAlias(MainGroupPrivilegeTableMap::COL_PRIVILEGE_ID, $privilegeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainGroupPrivilegeTableMap::COL_PRIVILEGE_ID, $privilegeId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMainGroupPrivilege $mainGroupPrivilege Object to remove from the list of results
     *
     * @return $this|ChildMainGroupPrivilegeQuery The current query, for fluid interface
     */
    public function prune($mainGroupPrivilege = null)
    {
        if ($mainGroupPrivilege) {
            $this->addUsingAlias(MainGroupPrivilegeTableMap::COL_ID, $mainGroupPrivilege->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the main_group_privilege table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainGroupPrivilegeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MainGroupPrivilegeTableMap::clearInstancePool();
            MainGroupPrivilegeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MainGroupPrivilegeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MainGroupPrivilegeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MainGroupPrivilegeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MainGroupPrivilegeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MainGroupPrivilegeQuery
