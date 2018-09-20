<?php

namespace Base;

use \BkppLinks as ChildBkppLinks;
use \BkppLinksQuery as ChildBkppLinksQuery;
use \Exception;
use \PDO;
use Map\BkppLinksTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bkpp_links' table.
 *
 *
 *
 * @method     ChildBkppLinksQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBkppLinksQuery orderByJudul($order = Criteria::ASC) Order by the judul column
 * @method     ChildBkppLinksQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildBkppLinksQuery orderByGambar($order = Criteria::ASC) Order by the gambar column
 * @method     ChildBkppLinksQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method     ChildBkppLinksQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildBkppLinksQuery orderByOrder($order = Criteria::ASC) Order by the order column
 *
 * @method     ChildBkppLinksQuery groupById() Group by the id column
 * @method     ChildBkppLinksQuery groupByJudul() Group by the judul column
 * @method     ChildBkppLinksQuery groupByUrl() Group by the url column
 * @method     ChildBkppLinksQuery groupByGambar() Group by the gambar column
 * @method     ChildBkppLinksQuery groupByKeterangan() Group by the keterangan column
 * @method     ChildBkppLinksQuery groupByDate() Group by the date column
 * @method     ChildBkppLinksQuery groupByOrder() Group by the order column
 *
 * @method     ChildBkppLinksQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBkppLinksQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBkppLinksQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBkppLinksQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBkppLinksQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBkppLinksQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBkppLinks findOne(ConnectionInterface $con = null) Return the first ChildBkppLinks matching the query
 * @method     ChildBkppLinks findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBkppLinks matching the query, or a new ChildBkppLinks object populated from the query conditions when no match is found
 *
 * @method     ChildBkppLinks findOneById(int $id) Return the first ChildBkppLinks filtered by the id column
 * @method     ChildBkppLinks findOneByJudul(string $judul) Return the first ChildBkppLinks filtered by the judul column
 * @method     ChildBkppLinks findOneByUrl(string $url) Return the first ChildBkppLinks filtered by the url column
 * @method     ChildBkppLinks findOneByGambar(string $gambar) Return the first ChildBkppLinks filtered by the gambar column
 * @method     ChildBkppLinks findOneByKeterangan(string $keterangan) Return the first ChildBkppLinks filtered by the keterangan column
 * @method     ChildBkppLinks findOneByDate(string $date) Return the first ChildBkppLinks filtered by the date column
 * @method     ChildBkppLinks findOneByOrder(int $order) Return the first ChildBkppLinks filtered by the order column *

 * @method     ChildBkppLinks requirePk($key, ConnectionInterface $con = null) Return the ChildBkppLinks by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppLinks requireOne(ConnectionInterface $con = null) Return the first ChildBkppLinks matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppLinks requireOneById(int $id) Return the first ChildBkppLinks filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppLinks requireOneByJudul(string $judul) Return the first ChildBkppLinks filtered by the judul column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppLinks requireOneByUrl(string $url) Return the first ChildBkppLinks filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppLinks requireOneByGambar(string $gambar) Return the first ChildBkppLinks filtered by the gambar column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppLinks requireOneByKeterangan(string $keterangan) Return the first ChildBkppLinks filtered by the keterangan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppLinks requireOneByDate(string $date) Return the first ChildBkppLinks filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppLinks requireOneByOrder(int $order) Return the first ChildBkppLinks filtered by the order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppLinks[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBkppLinks objects based on current ModelCriteria
 * @method     ChildBkppLinks[]|ObjectCollection findById(int $id) Return ChildBkppLinks objects filtered by the id column
 * @method     ChildBkppLinks[]|ObjectCollection findByJudul(string $judul) Return ChildBkppLinks objects filtered by the judul column
 * @method     ChildBkppLinks[]|ObjectCollection findByUrl(string $url) Return ChildBkppLinks objects filtered by the url column
 * @method     ChildBkppLinks[]|ObjectCollection findByGambar(string $gambar) Return ChildBkppLinks objects filtered by the gambar column
 * @method     ChildBkppLinks[]|ObjectCollection findByKeterangan(string $keterangan) Return ChildBkppLinks objects filtered by the keterangan column
 * @method     ChildBkppLinks[]|ObjectCollection findByDate(string $date) Return ChildBkppLinks objects filtered by the date column
 * @method     ChildBkppLinks[]|ObjectCollection findByOrder(int $order) Return ChildBkppLinks objects filtered by the order column
 * @method     ChildBkppLinks[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BkppLinksQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BkppLinksQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\BkppLinks', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBkppLinksQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBkppLinksQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBkppLinksQuery) {
            return $criteria;
        }
        $query = new ChildBkppLinksQuery();
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
     * @return ChildBkppLinks|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BkppLinksTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BkppLinksTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBkppLinks A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, judul, url, gambar, keterangan, date, order FROM bkpp_links WHERE id = :p0';
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
            /** @var ChildBkppLinks $obj */
            $obj = new ChildBkppLinks();
            $obj->hydrate($row);
            BkppLinksTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBkppLinks|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBkppLinksQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BkppLinksTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBkppLinksQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BkppLinksTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildBkppLinksQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BkppLinksTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BkppLinksTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppLinksTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildBkppLinksQuery The current query, for fluid interface
     */
    public function filterByJudul($judul = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($judul)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppLinksTableMap::COL_JUDUL, $judul, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%', Criteria::LIKE); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppLinksQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppLinksTableMap::COL_URL, $url, $comparison);
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
     * @return $this|ChildBkppLinksQuery The current query, for fluid interface
     */
    public function filterByGambar($gambar = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gambar)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppLinksTableMap::COL_GAMBAR, $gambar, $comparison);
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
     * @return $this|ChildBkppLinksQuery The current query, for fluid interface
     */
    public function filterByKeterangan($keterangan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keterangan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppLinksTableMap::COL_KETERANGAN, $keterangan, $comparison);
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
     * @return $this|ChildBkppLinksQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(BkppLinksTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(BkppLinksTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppLinksTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the order column
     *
     * Example usage:
     * <code>
     * $query->filterByOrder(1234); // WHERE order = 1234
     * $query->filterByOrder(array(12, 34)); // WHERE order IN (12, 34)
     * $query->filterByOrder(array('min' => 12)); // WHERE order > 12
     * </code>
     *
     * @param     mixed $order The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppLinksQuery The current query, for fluid interface
     */
    public function filterByOrder($order = null, $comparison = null)
    {
        if (is_array($order)) {
            $useMinMax = false;
            if (isset($order['min'])) {
                $this->addUsingAlias(BkppLinksTableMap::COL_ORDER, $order['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($order['max'])) {
                $this->addUsingAlias(BkppLinksTableMap::COL_ORDER, $order['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppLinksTableMap::COL_ORDER, $order, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBkppLinks $bkppLinks Object to remove from the list of results
     *
     * @return $this|ChildBkppLinksQuery The current query, for fluid interface
     */
    public function prune($bkppLinks = null)
    {
        if ($bkppLinks) {
            $this->addUsingAlias(BkppLinksTableMap::COL_ID, $bkppLinks->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bkpp_links table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppLinksTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BkppLinksTableMap::clearInstancePool();
            BkppLinksTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppLinksTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BkppLinksTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BkppLinksTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BkppLinksTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BkppLinksQuery
