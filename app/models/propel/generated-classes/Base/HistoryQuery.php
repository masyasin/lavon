<?php

namespace Base;

use \History as ChildHistory;
use \HistoryQuery as ChildHistoryQuery;
use \Exception;
use \PDO;
use Map\HistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'history' table.
 *
 *
 *
 * @method     ChildHistoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildHistoryQuery orderByCat($order = Criteria::ASC) Order by the cat column
 * @method     ChildHistoryQuery orderByVal($order = Criteria::ASC) Order by the val column
 * @method     ChildHistoryQuery orderByIpaddr($order = Criteria::ASC) Order by the ipaddr column
 * @method     ChildHistoryQuery orderByCx($order = Criteria::ASC) Order by the cx column
 * @method     ChildHistoryQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     ChildHistoryQuery groupById() Group by the id column
 * @method     ChildHistoryQuery groupByCat() Group by the cat column
 * @method     ChildHistoryQuery groupByVal() Group by the val column
 * @method     ChildHistoryQuery groupByIpaddr() Group by the ipaddr column
 * @method     ChildHistoryQuery groupByCx() Group by the cx column
 * @method     ChildHistoryQuery groupByDate() Group by the date column
 *
 * @method     ChildHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHistoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHistoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHistoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHistory findOne(ConnectionInterface $con = null) Return the first ChildHistory matching the query
 * @method     ChildHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHistory matching the query, or a new ChildHistory object populated from the query conditions when no match is found
 *
 * @method     ChildHistory findOneById(int $id) Return the first ChildHistory filtered by the id column
 * @method     ChildHistory findOneByCat(string $cat) Return the first ChildHistory filtered by the cat column
 * @method     ChildHistory findOneByVal(string $val) Return the first ChildHistory filtered by the val column
 * @method     ChildHistory findOneByIpaddr(string $ipaddr) Return the first ChildHistory filtered by the ipaddr column
 * @method     ChildHistory findOneByCx(int $cx) Return the first ChildHistory filtered by the cx column
 * @method     ChildHistory findOneByDate(string $date) Return the first ChildHistory filtered by the date column *

 * @method     ChildHistory requirePk($key, ConnectionInterface $con = null) Return the ChildHistory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHistory requireOne(ConnectionInterface $con = null) Return the first ChildHistory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHistory requireOneById(int $id) Return the first ChildHistory filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHistory requireOneByCat(string $cat) Return the first ChildHistory filtered by the cat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHistory requireOneByVal(string $val) Return the first ChildHistory filtered by the val column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHistory requireOneByIpaddr(string $ipaddr) Return the first ChildHistory filtered by the ipaddr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHistory requireOneByCx(int $cx) Return the first ChildHistory filtered by the cx column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHistory requireOneByDate(string $date) Return the first ChildHistory filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHistory objects based on current ModelCriteria
 * @method     ChildHistory[]|ObjectCollection findById(int $id) Return ChildHistory objects filtered by the id column
 * @method     ChildHistory[]|ObjectCollection findByCat(string $cat) Return ChildHistory objects filtered by the cat column
 * @method     ChildHistory[]|ObjectCollection findByVal(string $val) Return ChildHistory objects filtered by the val column
 * @method     ChildHistory[]|ObjectCollection findByIpaddr(string $ipaddr) Return ChildHistory objects filtered by the ipaddr column
 * @method     ChildHistory[]|ObjectCollection findByCx(int $cx) Return ChildHistory objects filtered by the cx column
 * @method     ChildHistory[]|ObjectCollection findByDate(string $date) Return ChildHistory objects filtered by the date column
 * @method     ChildHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HistoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\History', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHistoryQuery) {
            return $criteria;
        }
        $query = new ChildHistoryQuery();
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
     * @return ChildHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HistoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HistoryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, cat, val, ipaddr, cx, date FROM history WHERE id = :p0';
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
            /** @var ChildHistory $obj */
            $obj = new ChildHistory();
            $obj->hydrate($row);
            HistoryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HistoryTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HistoryTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildHistoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(HistoryTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(HistoryTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the cat column
     *
     * Example usage:
     * <code>
     * $query->filterByCat('fooValue');   // WHERE cat = 'fooValue'
     * $query->filterByCat('%fooValue%', Criteria::LIKE); // WHERE cat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHistoryQuery The current query, for fluid interface
     */
    public function filterByCat($cat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryTableMap::COL_CAT, $cat, $comparison);
    }

    /**
     * Filter the query on the val column
     *
     * Example usage:
     * <code>
     * $query->filterByVal('fooValue');   // WHERE val = 'fooValue'
     * $query->filterByVal('%fooValue%', Criteria::LIKE); // WHERE val LIKE '%fooValue%'
     * </code>
     *
     * @param     string $val The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHistoryQuery The current query, for fluid interface
     */
    public function filterByVal($val = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($val)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryTableMap::COL_VAL, $val, $comparison);
    }

    /**
     * Filter the query on the ipaddr column
     *
     * Example usage:
     * <code>
     * $query->filterByIpaddr('fooValue');   // WHERE ipaddr = 'fooValue'
     * $query->filterByIpaddr('%fooValue%', Criteria::LIKE); // WHERE ipaddr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipaddr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHistoryQuery The current query, for fluid interface
     */
    public function filterByIpaddr($ipaddr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipaddr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryTableMap::COL_IPADDR, $ipaddr, $comparison);
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
     * @return $this|ChildHistoryQuery The current query, for fluid interface
     */
    public function filterByCx($cx = null, $comparison = null)
    {
        if (is_array($cx)) {
            $useMinMax = false;
            if (isset($cx['min'])) {
                $this->addUsingAlias(HistoryTableMap::COL_CX, $cx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cx['max'])) {
                $this->addUsingAlias(HistoryTableMap::COL_CX, $cx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryTableMap::COL_CX, $cx, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHistoryQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(HistoryTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(HistoryTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildHistory $history Object to remove from the list of results
     *
     * @return $this|ChildHistoryQuery The current query, for fluid interface
     */
    public function prune($history = null)
    {
        if ($history) {
            $this->addUsingAlias(HistoryTableMap::COL_ID, $history->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HistoryTableMap::clearInstancePool();
            HistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HistoryQuery
