<?php

namespace Base;

use \Related as ChildRelated;
use \RelatedQuery as ChildRelatedQuery;
use \Exception;
use \PDO;
use Map\RelatedTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'related' table.
 *
 *
 *
 * @method     ChildRelatedQuery orderByJd($order = Criteria::ASC) Order by the jd column
 * @method     ChildRelatedQuery orderByCat($order = Criteria::ASC) Order by the cat column
 * @method     ChildRelatedQuery orderByPk($order = Criteria::ASC) Order by the pk column
 * @method     ChildRelatedQuery orderByRpk($order = Criteria::ASC) Order by the rpk column
 * @method     ChildRelatedQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     ChildRelatedQuery groupByJd() Group by the jd column
 * @method     ChildRelatedQuery groupByCat() Group by the cat column
 * @method     ChildRelatedQuery groupByPk() Group by the pk column
 * @method     ChildRelatedQuery groupByRpk() Group by the rpk column
 * @method     ChildRelatedQuery groupByDate() Group by the date column
 *
 * @method     ChildRelatedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRelatedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRelatedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRelatedQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRelatedQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRelatedQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRelated findOne(ConnectionInterface $con = null) Return the first ChildRelated matching the query
 * @method     ChildRelated findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRelated matching the query, or a new ChildRelated object populated from the query conditions when no match is found
 *
 * @method     ChildRelated findOneByJd(int $jd) Return the first ChildRelated filtered by the jd column
 * @method     ChildRelated findOneByCat(string $cat) Return the first ChildRelated filtered by the cat column
 * @method     ChildRelated findOneByPk(int $pk) Return the first ChildRelated filtered by the pk column
 * @method     ChildRelated findOneByRpk(int $rpk) Return the first ChildRelated filtered by the rpk column
 * @method     ChildRelated findOneByDate(string $date) Return the first ChildRelated filtered by the date column *

 * @method     ChildRelated requirePk($key, ConnectionInterface $con = null) Return the ChildRelated by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRelated requireOne(ConnectionInterface $con = null) Return the first ChildRelated matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRelated requireOneByJd(int $jd) Return the first ChildRelated filtered by the jd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRelated requireOneByCat(string $cat) Return the first ChildRelated filtered by the cat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRelated requireOneByPk(int $pk) Return the first ChildRelated filtered by the pk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRelated requireOneByRpk(int $rpk) Return the first ChildRelated filtered by the rpk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRelated requireOneByDate(string $date) Return the first ChildRelated filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRelated[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRelated objects based on current ModelCriteria
 * @method     ChildRelated[]|ObjectCollection findByJd(int $jd) Return ChildRelated objects filtered by the jd column
 * @method     ChildRelated[]|ObjectCollection findByCat(string $cat) Return ChildRelated objects filtered by the cat column
 * @method     ChildRelated[]|ObjectCollection findByPk(int $pk) Return ChildRelated objects filtered by the pk column
 * @method     ChildRelated[]|ObjectCollection findByRpk(int $rpk) Return ChildRelated objects filtered by the rpk column
 * @method     ChildRelated[]|ObjectCollection findByDate(string $date) Return ChildRelated objects filtered by the date column
 * @method     ChildRelated[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RelatedQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RelatedQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Related', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRelatedQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRelatedQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRelatedQuery) {
            return $criteria;
        }
        $query = new ChildRelatedQuery();
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
     * @return ChildRelated|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RelatedTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = RelatedTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildRelated A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT jd, cat, pk, rpk, date FROM related WHERE jd = :p0';
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
            /** @var ChildRelated $obj */
            $obj = new ChildRelated();
            $obj->hydrate($row);
            RelatedTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildRelated|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRelatedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RelatedTableMap::COL_JD, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRelatedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RelatedTableMap::COL_JD, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jd column
     *
     * Example usage:
     * <code>
     * $query->filterByJd(1234); // WHERE jd = 1234
     * $query->filterByJd(array(12, 34)); // WHERE jd IN (12, 34)
     * $query->filterByJd(array('min' => 12)); // WHERE jd > 12
     * </code>
     *
     * @param     mixed $jd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRelatedQuery The current query, for fluid interface
     */
    public function filterByJd($jd = null, $comparison = null)
    {
        if (is_array($jd)) {
            $useMinMax = false;
            if (isset($jd['min'])) {
                $this->addUsingAlias(RelatedTableMap::COL_JD, $jd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jd['max'])) {
                $this->addUsingAlias(RelatedTableMap::COL_JD, $jd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RelatedTableMap::COL_JD, $jd, $comparison);
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
     * @return $this|ChildRelatedQuery The current query, for fluid interface
     */
    public function filterByCat($cat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RelatedTableMap::COL_CAT, $cat, $comparison);
    }

    /**
     * Filter the query on the pk column
     *
     * Example usage:
     * <code>
     * $query->filterByPk(1234); // WHERE pk = 1234
     * $query->filterByPk(array(12, 34)); // WHERE pk IN (12, 34)
     * $query->filterByPk(array('min' => 12)); // WHERE pk > 12
     * </code>
     *
     * @param     mixed $pk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRelatedQuery The current query, for fluid interface
     */
    public function filterByPk($pk = null, $comparison = null)
    {
        if (is_array($pk)) {
            $useMinMax = false;
            if (isset($pk['min'])) {
                $this->addUsingAlias(RelatedTableMap::COL_PK, $pk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pk['max'])) {
                $this->addUsingAlias(RelatedTableMap::COL_PK, $pk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RelatedTableMap::COL_PK, $pk, $comparison);
    }

    /**
     * Filter the query on the rpk column
     *
     * Example usage:
     * <code>
     * $query->filterByRpk(1234); // WHERE rpk = 1234
     * $query->filterByRpk(array(12, 34)); // WHERE rpk IN (12, 34)
     * $query->filterByRpk(array('min' => 12)); // WHERE rpk > 12
     * </code>
     *
     * @param     mixed $rpk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRelatedQuery The current query, for fluid interface
     */
    public function filterByRpk($rpk = null, $comparison = null)
    {
        if (is_array($rpk)) {
            $useMinMax = false;
            if (isset($rpk['min'])) {
                $this->addUsingAlias(RelatedTableMap::COL_RPK, $rpk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rpk['max'])) {
                $this->addUsingAlias(RelatedTableMap::COL_RPK, $rpk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RelatedTableMap::COL_RPK, $rpk, $comparison);
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
     * @return $this|ChildRelatedQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(RelatedTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(RelatedTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RelatedTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRelated $related Object to remove from the list of results
     *
     * @return $this|ChildRelatedQuery The current query, for fluid interface
     */
    public function prune($related = null)
    {
        if ($related) {
            $this->addUsingAlias(RelatedTableMap::COL_JD, $related->getJd(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the related table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RelatedTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RelatedTableMap::clearInstancePool();
            RelatedTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RelatedTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RelatedTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RelatedTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RelatedTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RelatedQuery
