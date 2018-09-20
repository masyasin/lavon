<?php

namespace Base;

use \Shares as ChildShares;
use \SharesQuery as ChildSharesQuery;
use \Exception;
use \PDO;
use Map\SharesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'shares' table.
 *
 *
 *
 * @method     ChildSharesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSharesQuery orderByT($order = Criteria::ASC) Order by the t column
 * @method     ChildSharesQuery orderByHash($order = Criteria::ASC) Order by the hash column
 * @method     ChildSharesQuery orderByCx($order = Criteria::ASC) Order by the cx column
 * @method     ChildSharesQuery orderByTs($order = Criteria::ASC) Order by the ts column
 *
 * @method     ChildSharesQuery groupById() Group by the id column
 * @method     ChildSharesQuery groupByT() Group by the t column
 * @method     ChildSharesQuery groupByHash() Group by the hash column
 * @method     ChildSharesQuery groupByCx() Group by the cx column
 * @method     ChildSharesQuery groupByTs() Group by the ts column
 *
 * @method     ChildSharesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSharesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSharesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSharesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSharesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSharesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildShares findOne(ConnectionInterface $con = null) Return the first ChildShares matching the query
 * @method     ChildShares findOneOrCreate(ConnectionInterface $con = null) Return the first ChildShares matching the query, or a new ChildShares object populated from the query conditions when no match is found
 *
 * @method     ChildShares findOneById(int $id) Return the first ChildShares filtered by the id column
 * @method     ChildShares findOneByT(int $t) Return the first ChildShares filtered by the t column
 * @method     ChildShares findOneByHash(string $hash) Return the first ChildShares filtered by the hash column
 * @method     ChildShares findOneByCx(string $cx) Return the first ChildShares filtered by the cx column
 * @method     ChildShares findOneByTs(string $ts) Return the first ChildShares filtered by the ts column *

 * @method     ChildShares requirePk($key, ConnectionInterface $con = null) Return the ChildShares by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShares requireOne(ConnectionInterface $con = null) Return the first ChildShares matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShares requireOneById(int $id) Return the first ChildShares filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShares requireOneByT(int $t) Return the first ChildShares filtered by the t column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShares requireOneByHash(string $hash) Return the first ChildShares filtered by the hash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShares requireOneByCx(string $cx) Return the first ChildShares filtered by the cx column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShares requireOneByTs(string $ts) Return the first ChildShares filtered by the ts column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShares[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildShares objects based on current ModelCriteria
 * @method     ChildShares[]|ObjectCollection findById(int $id) Return ChildShares objects filtered by the id column
 * @method     ChildShares[]|ObjectCollection findByT(int $t) Return ChildShares objects filtered by the t column
 * @method     ChildShares[]|ObjectCollection findByHash(string $hash) Return ChildShares objects filtered by the hash column
 * @method     ChildShares[]|ObjectCollection findByCx(string $cx) Return ChildShares objects filtered by the cx column
 * @method     ChildShares[]|ObjectCollection findByTs(string $ts) Return ChildShares objects filtered by the ts column
 * @method     ChildShares[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SharesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SharesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Shares', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSharesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSharesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSharesQuery) {
            return $criteria;
        }
        $query = new ChildSharesQuery();
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
     * @return ChildShares|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SharesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SharesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildShares A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, t, hash, cx, ts FROM shares WHERE id = :p0';
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
            /** @var ChildShares $obj */
            $obj = new ChildShares();
            $obj->hydrate($row);
            SharesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildShares|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSharesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SharesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSharesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SharesTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSharesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SharesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SharesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SharesTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the t column
     *
     * Example usage:
     * <code>
     * $query->filterByT(1234); // WHERE t = 1234
     * $query->filterByT(array(12, 34)); // WHERE t IN (12, 34)
     * $query->filterByT(array('min' => 12)); // WHERE t > 12
     * </code>
     *
     * @param     mixed $t The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSharesQuery The current query, for fluid interface
     */
    public function filterByT($t = null, $comparison = null)
    {
        if (is_array($t)) {
            $useMinMax = false;
            if (isset($t['min'])) {
                $this->addUsingAlias(SharesTableMap::COL_T, $t['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($t['max'])) {
                $this->addUsingAlias(SharesTableMap::COL_T, $t['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SharesTableMap::COL_T, $t, $comparison);
    }

    /**
     * Filter the query on the hash column
     *
     * Example usage:
     * <code>
     * $query->filterByHash('fooValue');   // WHERE hash = 'fooValue'
     * $query->filterByHash('%fooValue%', Criteria::LIKE); // WHERE hash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hash The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSharesQuery The current query, for fluid interface
     */
    public function filterByHash($hash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SharesTableMap::COL_HASH, $hash, $comparison);
    }

    /**
     * Filter the query on the cx column
     *
     * Example usage:
     * <code>
     * $query->filterByCx(1234); // WHERE cx = 1234
     * $query->filterByCx(array(12, 34)); // WHERE cx IN (12, 34)
     * $query->filterByCx(array('min' => 12)); // WHERE cx > 12
     * </code>
     *
     * @param     mixed $cx The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSharesQuery The current query, for fluid interface
     */
    public function filterByCx($cx = null, $comparison = null)
    {
        if (is_array($cx)) {
            $useMinMax = false;
            if (isset($cx['min'])) {
                $this->addUsingAlias(SharesTableMap::COL_CX, $cx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cx['max'])) {
                $this->addUsingAlias(SharesTableMap::COL_CX, $cx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SharesTableMap::COL_CX, $cx, $comparison);
    }

    /**
     * Filter the query on the ts column
     *
     * Example usage:
     * <code>
     * $query->filterByTs('2011-03-14'); // WHERE ts = '2011-03-14'
     * $query->filterByTs('now'); // WHERE ts = '2011-03-14'
     * $query->filterByTs(array('max' => 'yesterday')); // WHERE ts > '2011-03-13'
     * </code>
     *
     * @param     mixed $ts The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSharesQuery The current query, for fluid interface
     */
    public function filterByTs($ts = null, $comparison = null)
    {
        if (is_array($ts)) {
            $useMinMax = false;
            if (isset($ts['min'])) {
                $this->addUsingAlias(SharesTableMap::COL_TS, $ts['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ts['max'])) {
                $this->addUsingAlias(SharesTableMap::COL_TS, $ts['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SharesTableMap::COL_TS, $ts, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildShares $shares Object to remove from the list of results
     *
     * @return $this|ChildSharesQuery The current query, for fluid interface
     */
    public function prune($shares = null)
    {
        if ($shares) {
            $this->addUsingAlias(SharesTableMap::COL_ID, $shares->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the shares table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SharesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SharesTableMap::clearInstancePool();
            SharesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SharesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SharesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SharesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SharesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SharesQuery
