<?php

namespace Base;

use \BkppInfoDinas as ChildBkppInfoDinas;
use \BkppInfoDinasQuery as ChildBkppInfoDinasQuery;
use \Exception;
use \PDO;
use Map\BkppInfoDinasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bkpp_info_dinas' table.
 *
 *
 *
 * @method     ChildBkppInfoDinasQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBkppInfoDinasQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method     ChildBkppInfoDinasQuery orderByJudul($order = Criteria::ASC) Order by the judul column
 * @method     ChildBkppInfoDinasQuery orderByGambar($order = Criteria::ASC) Order by the gambar column
 * @method     ChildBkppInfoDinasQuery orderByKeteranganGambar($order = Criteria::ASC) Order by the keterangan_gambar column
 * @method     ChildBkppInfoDinasQuery orderByIsi($order = Criteria::ASC) Order by the isi column
 * @method     ChildBkppInfoDinasQuery orderByFile($order = Criteria::ASC) Order by the file column
 * @method     ChildBkppInfoDinasQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     ChildBkppInfoDinasQuery groupById() Group by the id column
 * @method     ChildBkppInfoDinasQuery groupBySlug() Group by the slug column
 * @method     ChildBkppInfoDinasQuery groupByJudul() Group by the judul column
 * @method     ChildBkppInfoDinasQuery groupByGambar() Group by the gambar column
 * @method     ChildBkppInfoDinasQuery groupByKeteranganGambar() Group by the keterangan_gambar column
 * @method     ChildBkppInfoDinasQuery groupByIsi() Group by the isi column
 * @method     ChildBkppInfoDinasQuery groupByFile() Group by the file column
 * @method     ChildBkppInfoDinasQuery groupByDate() Group by the date column
 *
 * @method     ChildBkppInfoDinasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBkppInfoDinasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBkppInfoDinasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBkppInfoDinasQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBkppInfoDinasQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBkppInfoDinasQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBkppInfoDinas findOne(ConnectionInterface $con = null) Return the first ChildBkppInfoDinas matching the query
 * @method     ChildBkppInfoDinas findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBkppInfoDinas matching the query, or a new ChildBkppInfoDinas object populated from the query conditions when no match is found
 *
 * @method     ChildBkppInfoDinas findOneById(int $id) Return the first ChildBkppInfoDinas filtered by the id column
 * @method     ChildBkppInfoDinas findOneBySlug(string $slug) Return the first ChildBkppInfoDinas filtered by the slug column
 * @method     ChildBkppInfoDinas findOneByJudul(string $judul) Return the first ChildBkppInfoDinas filtered by the judul column
 * @method     ChildBkppInfoDinas findOneByGambar(string $gambar) Return the first ChildBkppInfoDinas filtered by the gambar column
 * @method     ChildBkppInfoDinas findOneByKeteranganGambar(string $keterangan_gambar) Return the first ChildBkppInfoDinas filtered by the keterangan_gambar column
 * @method     ChildBkppInfoDinas findOneByIsi(string $isi) Return the first ChildBkppInfoDinas filtered by the isi column
 * @method     ChildBkppInfoDinas findOneByFile(string $file) Return the first ChildBkppInfoDinas filtered by the file column
 * @method     ChildBkppInfoDinas findOneByDate(string $date) Return the first ChildBkppInfoDinas filtered by the date column *

 * @method     ChildBkppInfoDinas requirePk($key, ConnectionInterface $con = null) Return the ChildBkppInfoDinas by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppInfoDinas requireOne(ConnectionInterface $con = null) Return the first ChildBkppInfoDinas matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppInfoDinas requireOneById(int $id) Return the first ChildBkppInfoDinas filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppInfoDinas requireOneBySlug(string $slug) Return the first ChildBkppInfoDinas filtered by the slug column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppInfoDinas requireOneByJudul(string $judul) Return the first ChildBkppInfoDinas filtered by the judul column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppInfoDinas requireOneByGambar(string $gambar) Return the first ChildBkppInfoDinas filtered by the gambar column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppInfoDinas requireOneByKeteranganGambar(string $keterangan_gambar) Return the first ChildBkppInfoDinas filtered by the keterangan_gambar column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppInfoDinas requireOneByIsi(string $isi) Return the first ChildBkppInfoDinas filtered by the isi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppInfoDinas requireOneByFile(string $file) Return the first ChildBkppInfoDinas filtered by the file column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppInfoDinas requireOneByDate(string $date) Return the first ChildBkppInfoDinas filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppInfoDinas[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBkppInfoDinas objects based on current ModelCriteria
 * @method     ChildBkppInfoDinas[]|ObjectCollection findById(int $id) Return ChildBkppInfoDinas objects filtered by the id column
 * @method     ChildBkppInfoDinas[]|ObjectCollection findBySlug(string $slug) Return ChildBkppInfoDinas objects filtered by the slug column
 * @method     ChildBkppInfoDinas[]|ObjectCollection findByJudul(string $judul) Return ChildBkppInfoDinas objects filtered by the judul column
 * @method     ChildBkppInfoDinas[]|ObjectCollection findByGambar(string $gambar) Return ChildBkppInfoDinas objects filtered by the gambar column
 * @method     ChildBkppInfoDinas[]|ObjectCollection findByKeteranganGambar(string $keterangan_gambar) Return ChildBkppInfoDinas objects filtered by the keterangan_gambar column
 * @method     ChildBkppInfoDinas[]|ObjectCollection findByIsi(string $isi) Return ChildBkppInfoDinas objects filtered by the isi column
 * @method     ChildBkppInfoDinas[]|ObjectCollection findByFile(string $file) Return ChildBkppInfoDinas objects filtered by the file column
 * @method     ChildBkppInfoDinas[]|ObjectCollection findByDate(string $date) Return ChildBkppInfoDinas objects filtered by the date column
 * @method     ChildBkppInfoDinas[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BkppInfoDinasQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BkppInfoDinasQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\BkppInfoDinas', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBkppInfoDinasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBkppInfoDinasQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBkppInfoDinasQuery) {
            return $criteria;
        }
        $query = new ChildBkppInfoDinasQuery();
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
     * @return ChildBkppInfoDinas|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BkppInfoDinasTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BkppInfoDinasTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBkppInfoDinas A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, slug, judul, gambar, keterangan_gambar, isi, file, date FROM bkpp_info_dinas WHERE id = :p0';
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
            /** @var ChildBkppInfoDinas $obj */
            $obj = new ChildBkppInfoDinas();
            $obj->hydrate($row);
            BkppInfoDinasTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBkppInfoDinas|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBkppInfoDinasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BkppInfoDinasTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBkppInfoDinasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BkppInfoDinasTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildBkppInfoDinasQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BkppInfoDinasTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BkppInfoDinasTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppInfoDinasTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the slug column
     *
     * Example usage:
     * <code>
     * $query->filterBySlug('fooValue');   // WHERE slug = 'fooValue'
     * $query->filterBySlug('%fooValue%', Criteria::LIKE); // WHERE slug LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slug The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppInfoDinasQuery The current query, for fluid interface
     */
    public function filterBySlug($slug = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slug)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppInfoDinasTableMap::COL_SLUG, $slug, $comparison);
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
     * @return $this|ChildBkppInfoDinasQuery The current query, for fluid interface
     */
    public function filterByJudul($judul = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($judul)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppInfoDinasTableMap::COL_JUDUL, $judul, $comparison);
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
     * @return $this|ChildBkppInfoDinasQuery The current query, for fluid interface
     */
    public function filterByGambar($gambar = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gambar)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppInfoDinasTableMap::COL_GAMBAR, $gambar, $comparison);
    }

    /**
     * Filter the query on the keterangan_gambar column
     *
     * Example usage:
     * <code>
     * $query->filterByKeteranganGambar('fooValue');   // WHERE keterangan_gambar = 'fooValue'
     * $query->filterByKeteranganGambar('%fooValue%', Criteria::LIKE); // WHERE keterangan_gambar LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keteranganGambar The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppInfoDinasQuery The current query, for fluid interface
     */
    public function filterByKeteranganGambar($keteranganGambar = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keteranganGambar)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppInfoDinasTableMap::COL_KETERANGAN_GAMBAR, $keteranganGambar, $comparison);
    }

    /**
     * Filter the query on the isi column
     *
     * Example usage:
     * <code>
     * $query->filterByIsi('fooValue');   // WHERE isi = 'fooValue'
     * $query->filterByIsi('%fooValue%', Criteria::LIKE); // WHERE isi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $isi The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppInfoDinasQuery The current query, for fluid interface
     */
    public function filterByIsi($isi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($isi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppInfoDinasTableMap::COL_ISI, $isi, $comparison);
    }

    /**
     * Filter the query on the file column
     *
     * Example usage:
     * <code>
     * $query->filterByFile('fooValue');   // WHERE file = 'fooValue'
     * $query->filterByFile('%fooValue%', Criteria::LIKE); // WHERE file LIKE '%fooValue%'
     * </code>
     *
     * @param     string $file The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppInfoDinasQuery The current query, for fluid interface
     */
    public function filterByFile($file = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($file)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppInfoDinasTableMap::COL_FILE, $file, $comparison);
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
     * @return $this|ChildBkppInfoDinasQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(BkppInfoDinasTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(BkppInfoDinasTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppInfoDinasTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBkppInfoDinas $bkppInfoDinas Object to remove from the list of results
     *
     * @return $this|ChildBkppInfoDinasQuery The current query, for fluid interface
     */
    public function prune($bkppInfoDinas = null)
    {
        if ($bkppInfoDinas) {
            $this->addUsingAlias(BkppInfoDinasTableMap::COL_ID, $bkppInfoDinas->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bkpp_info_dinas table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppInfoDinasTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BkppInfoDinasTableMap::clearInstancePool();
            BkppInfoDinasTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppInfoDinasTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BkppInfoDinasTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BkppInfoDinasTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BkppInfoDinasTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BkppInfoDinasQuery
