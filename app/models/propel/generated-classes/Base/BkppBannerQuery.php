<?php

namespace Base;

use \BkppBanner as ChildBkppBanner;
use \BkppBannerQuery as ChildBkppBannerQuery;
use \Exception;
use \PDO;
use Map\BkppBannerTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bkpp_banner' table.
 *
 *
 *
 * @method     ChildBkppBannerQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBkppBannerQuery orderByGambar($order = Criteria::ASC) Order by the gambar column
 * @method     ChildBkppBannerQuery orderByJudul($order = Criteria::ASC) Order by the judul column
 * @method     ChildBkppBannerQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method     ChildBkppBannerQuery orderByPublish($order = Criteria::ASC) Order by the publish column
 * @method     ChildBkppBannerQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildBkppBannerQuery orderByLink($order = Criteria::ASC) Order by the link column
 * @method     ChildBkppBannerQuery orderByCat($order = Criteria::ASC) Order by the cat column
 * @method     ChildBkppBannerQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method     ChildBkppBannerQuery groupById() Group by the id column
 * @method     ChildBkppBannerQuery groupByGambar() Group by the gambar column
 * @method     ChildBkppBannerQuery groupByJudul() Group by the judul column
 * @method     ChildBkppBannerQuery groupByKeterangan() Group by the keterangan column
 * @method     ChildBkppBannerQuery groupByPublish() Group by the publish column
 * @method     ChildBkppBannerQuery groupByDate() Group by the date column
 * @method     ChildBkppBannerQuery groupByLink() Group by the link column
 * @method     ChildBkppBannerQuery groupByCat() Group by the cat column
 * @method     ChildBkppBannerQuery groupByValue() Group by the value column
 *
 * @method     ChildBkppBannerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBkppBannerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBkppBannerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBkppBannerQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBkppBannerQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBkppBannerQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBkppBanner findOne(ConnectionInterface $con = null) Return the first ChildBkppBanner matching the query
 * @method     ChildBkppBanner findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBkppBanner matching the query, or a new ChildBkppBanner object populated from the query conditions when no match is found
 *
 * @method     ChildBkppBanner findOneById(int $id) Return the first ChildBkppBanner filtered by the id column
 * @method     ChildBkppBanner findOneByGambar(string $gambar) Return the first ChildBkppBanner filtered by the gambar column
 * @method     ChildBkppBanner findOneByJudul(string $judul) Return the first ChildBkppBanner filtered by the judul column
 * @method     ChildBkppBanner findOneByKeterangan(string $keterangan) Return the first ChildBkppBanner filtered by the keterangan column
 * @method     ChildBkppBanner findOneByPublish(int $publish) Return the first ChildBkppBanner filtered by the publish column
 * @method     ChildBkppBanner findOneByDate(string $date) Return the first ChildBkppBanner filtered by the date column
 * @method     ChildBkppBanner findOneByLink(string $link) Return the first ChildBkppBanner filtered by the link column
 * @method     ChildBkppBanner findOneByCat(string $cat) Return the first ChildBkppBanner filtered by the cat column
 * @method     ChildBkppBanner findOneByValue(string $value) Return the first ChildBkppBanner filtered by the value column *

 * @method     ChildBkppBanner requirePk($key, ConnectionInterface $con = null) Return the ChildBkppBanner by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBanner requireOne(ConnectionInterface $con = null) Return the first ChildBkppBanner matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppBanner requireOneById(int $id) Return the first ChildBkppBanner filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBanner requireOneByGambar(string $gambar) Return the first ChildBkppBanner filtered by the gambar column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBanner requireOneByJudul(string $judul) Return the first ChildBkppBanner filtered by the judul column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBanner requireOneByKeterangan(string $keterangan) Return the first ChildBkppBanner filtered by the keterangan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBanner requireOneByPublish(int $publish) Return the first ChildBkppBanner filtered by the publish column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBanner requireOneByDate(string $date) Return the first ChildBkppBanner filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBanner requireOneByLink(string $link) Return the first ChildBkppBanner filtered by the link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBanner requireOneByCat(string $cat) Return the first ChildBkppBanner filtered by the cat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBanner requireOneByValue(string $value) Return the first ChildBkppBanner filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppBanner[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBkppBanner objects based on current ModelCriteria
 * @method     ChildBkppBanner[]|ObjectCollection findById(int $id) Return ChildBkppBanner objects filtered by the id column
 * @method     ChildBkppBanner[]|ObjectCollection findByGambar(string $gambar) Return ChildBkppBanner objects filtered by the gambar column
 * @method     ChildBkppBanner[]|ObjectCollection findByJudul(string $judul) Return ChildBkppBanner objects filtered by the judul column
 * @method     ChildBkppBanner[]|ObjectCollection findByKeterangan(string $keterangan) Return ChildBkppBanner objects filtered by the keterangan column
 * @method     ChildBkppBanner[]|ObjectCollection findByPublish(int $publish) Return ChildBkppBanner objects filtered by the publish column
 * @method     ChildBkppBanner[]|ObjectCollection findByDate(string $date) Return ChildBkppBanner objects filtered by the date column
 * @method     ChildBkppBanner[]|ObjectCollection findByLink(string $link) Return ChildBkppBanner objects filtered by the link column
 * @method     ChildBkppBanner[]|ObjectCollection findByCat(string $cat) Return ChildBkppBanner objects filtered by the cat column
 * @method     ChildBkppBanner[]|ObjectCollection findByValue(string $value) Return ChildBkppBanner objects filtered by the value column
 * @method     ChildBkppBanner[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BkppBannerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BkppBannerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\BkppBanner', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBkppBannerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBkppBannerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBkppBannerQuery) {
            return $criteria;
        }
        $query = new ChildBkppBannerQuery();
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
     * @return ChildBkppBanner|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BkppBannerTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BkppBannerTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBkppBanner A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, gambar, judul, keterangan, publish, date, link, cat, value FROM bkpp_banner WHERE id = :p0';
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
            /** @var ChildBkppBanner $obj */
            $obj = new ChildBkppBanner();
            $obj->hydrate($row);
            BkppBannerTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBkppBanner|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBkppBannerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BkppBannerTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBkppBannerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BkppBannerTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildBkppBannerQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BkppBannerTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BkppBannerTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBannerTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the gambar column
     *
     * Example usage:
     * <code>
     * $query->filterByGambar('fooValue');   // WHERE gambar = 'fooValue'
     * $query->filterByGambar('%fooValue%', Criteria::LIKE); // WHERE gambar LIKE '%fooValue%'
     * </code>
     *
     * @param     string $gambar The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppBannerQuery The current query, for fluid interface
     */
    public function filterByGambar($gambar = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gambar)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBannerTableMap::COL_GAMBAR, $gambar, $comparison);
    }

    /**
     * Filter the query on the judul column
     *
     * Example usage:
     * <code>
     * $query->filterByJudul('fooValue');   // WHERE judul = 'fooValue'
     * $query->filterByJudul('%fooValue%', Criteria::LIKE); // WHERE judul LIKE '%fooValue%'
     * </code>
     *
     * @param     string $judul The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppBannerQuery The current query, for fluid interface
     */
    public function filterByJudul($judul = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($judul)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBannerTableMap::COL_JUDUL, $judul, $comparison);
    }

    /**
     * Filter the query on the keterangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKeterangan('fooValue');   // WHERE keterangan = 'fooValue'
     * $query->filterByKeterangan('%fooValue%', Criteria::LIKE); // WHERE keterangan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keterangan The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppBannerQuery The current query, for fluid interface
     */
    public function filterByKeterangan($keterangan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keterangan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBannerTableMap::COL_KETERANGAN, $keterangan, $comparison);
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
     * @return $this|ChildBkppBannerQuery The current query, for fluid interface
     */
    public function filterByPublish($publish = null, $comparison = null)
    {
        if (is_array($publish)) {
            $useMinMax = false;
            if (isset($publish['min'])) {
                $this->addUsingAlias(BkppBannerTableMap::COL_PUBLISH, $publish['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($publish['max'])) {
                $this->addUsingAlias(BkppBannerTableMap::COL_PUBLISH, $publish['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBannerTableMap::COL_PUBLISH, $publish, $comparison);
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
     * @return $this|ChildBkppBannerQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(BkppBannerTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(BkppBannerTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBannerTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the link column
     *
     * Example usage:
     * <code>
     * $query->filterByLink('fooValue');   // WHERE link = 'fooValue'
     * $query->filterByLink('%fooValue%', Criteria::LIKE); // WHERE link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $link The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppBannerQuery The current query, for fluid interface
     */
    public function filterByLink($link = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($link)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBannerTableMap::COL_LINK, $link, $comparison);
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
     * @return $this|ChildBkppBannerQuery The current query, for fluid interface
     */
    public function filterByCat($cat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBannerTableMap::COL_CAT, $cat, $comparison);
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
     * @return $this|ChildBkppBannerQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBannerTableMap::COL_VALUE, $value, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBkppBanner $bkppBanner Object to remove from the list of results
     *
     * @return $this|ChildBkppBannerQuery The current query, for fluid interface
     */
    public function prune($bkppBanner = null)
    {
        if ($bkppBanner) {
            $this->addUsingAlias(BkppBannerTableMap::COL_ID, $bkppBanner->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bkpp_banner table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppBannerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BkppBannerTableMap::clearInstancePool();
            BkppBannerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppBannerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BkppBannerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BkppBannerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BkppBannerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BkppBannerQuery
