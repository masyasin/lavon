<?php

namespace Base;

use \BkppPengumuman as ChildBkppPengumuman;
use \BkppPengumumanQuery as ChildBkppPengumumanQuery;
use \Exception;
use \PDO;
use Map\BkppPengumumanTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bkpp_pengumuman' table.
 *
 *
 *
 * @method     ChildBkppPengumumanQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBkppPengumumanQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildBkppPengumumanQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method     ChildBkppPengumumanQuery orderByPublish($order = Criteria::ASC) Order by the publish column
 *
 * @method     ChildBkppPengumumanQuery groupById() Group by the id column
 * @method     ChildBkppPengumumanQuery groupByDate() Group by the date column
 * @method     ChildBkppPengumumanQuery groupByText() Group by the text column
 * @method     ChildBkppPengumumanQuery groupByPublish() Group by the publish column
 *
 * @method     ChildBkppPengumumanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBkppPengumumanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBkppPengumumanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBkppPengumumanQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBkppPengumumanQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBkppPengumumanQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBkppPengumuman findOne(ConnectionInterface $con = null) Return the first ChildBkppPengumuman matching the query
 * @method     ChildBkppPengumuman findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBkppPengumuman matching the query, or a new ChildBkppPengumuman object populated from the query conditions when no match is found
 *
 * @method     ChildBkppPengumuman findOneById(int $id) Return the first ChildBkppPengumuman filtered by the id column
 * @method     ChildBkppPengumuman findOneByDate(string $date) Return the first ChildBkppPengumuman filtered by the date column
 * @method     ChildBkppPengumuman findOneByText(string $text) Return the first ChildBkppPengumuman filtered by the text column
 * @method     ChildBkppPengumuman findOneByPublish(int $publish) Return the first ChildBkppPengumuman filtered by the publish column *

 * @method     ChildBkppPengumuman requirePk($key, ConnectionInterface $con = null) Return the ChildBkppPengumuman by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppPengumuman requireOne(ConnectionInterface $con = null) Return the first ChildBkppPengumuman matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppPengumuman requireOneById(int $id) Return the first ChildBkppPengumuman filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppPengumuman requireOneByDate(string $date) Return the first ChildBkppPengumuman filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppPengumuman requireOneByText(string $text) Return the first ChildBkppPengumuman filtered by the text column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppPengumuman requireOneByPublish(int $publish) Return the first ChildBkppPengumuman filtered by the publish column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppPengumuman[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBkppPengumuman objects based on current ModelCriteria
 * @method     ChildBkppPengumuman[]|ObjectCollection findById(int $id) Return ChildBkppPengumuman objects filtered by the id column
 * @method     ChildBkppPengumuman[]|ObjectCollection findByDate(string $date) Return ChildBkppPengumuman objects filtered by the date column
 * @method     ChildBkppPengumuman[]|ObjectCollection findByText(string $text) Return ChildBkppPengumuman objects filtered by the text column
 * @method     ChildBkppPengumuman[]|ObjectCollection findByPublish(int $publish) Return ChildBkppPengumuman objects filtered by the publish column
 * @method     ChildBkppPengumuman[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BkppPengumumanQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BkppPengumumanQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\BkppPengumuman', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBkppPengumumanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBkppPengumumanQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBkppPengumumanQuery) {
            return $criteria;
        }
        $query = new ChildBkppPengumumanQuery();
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
     * @return ChildBkppPengumuman|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BkppPengumumanTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BkppPengumumanTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBkppPengumuman A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, date, text, publish FROM bkpp_pengumuman WHERE id = :p0';
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
            /** @var ChildBkppPengumuman $obj */
            $obj = new ChildBkppPengumuman();
            $obj->hydrate($row);
            BkppPengumumanTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBkppPengumuman|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBkppPengumumanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BkppPengumumanTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBkppPengumumanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BkppPengumumanTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildBkppPengumumanQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BkppPengumumanTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BkppPengumumanTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppPengumumanTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildBkppPengumumanQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(BkppPengumumanTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(BkppPengumumanTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppPengumumanTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the text column
     *
     * Example usage:
     * <code>
     * $query->filterByText('fooValue');   // WHERE text = 'fooValue'
     * $query->filterByText('%fooValue%', Criteria::LIKE); // WHERE text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $text The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppPengumumanQuery The current query, for fluid interface
     */
    public function filterByText($text = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($text)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppPengumumanTableMap::COL_TEXT, $text, $comparison);
    }

    /**
     * Filter the query on the publish column
     *
     * Example usage:
     * <code>
     * $query->filterByPublish(1234); // WHERE publish = 1234
     * $query->filterByPublish(array(12, 34)); // WHERE publish IN (12, 34)
     * $query->filterByPublish(array('min' => 12)); // WHERE publish > 12
     * </code>
     *
     * @param     mixed $publish The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppPengumumanQuery The current query, for fluid interface
     */
    public function filterByPublish($publish = null, $comparison = null)
    {
        if (is_array($publish)) {
            $useMinMax = false;
            if (isset($publish['min'])) {
                $this->addUsingAlias(BkppPengumumanTableMap::COL_PUBLISH, $publish['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($publish['max'])) {
                $this->addUsingAlias(BkppPengumumanTableMap::COL_PUBLISH, $publish['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppPengumumanTableMap::COL_PUBLISH, $publish, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBkppPengumuman $bkppPengumuman Object to remove from the list of results
     *
     * @return $this|ChildBkppPengumumanQuery The current query, for fluid interface
     */
    public function prune($bkppPengumuman = null)
    {
        if ($bkppPengumuman) {
            $this->addUsingAlias(BkppPengumumanTableMap::COL_ID, $bkppPengumuman->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bkpp_pengumuman table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppPengumumanTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BkppPengumumanTableMap::clearInstancePool();
            BkppPengumumanTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppPengumumanTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BkppPengumumanTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BkppPengumumanTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BkppPengumumanTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BkppPengumumanQuery
