<?php

namespace Base;

use \BkppAgendaKegiatan as ChildBkppAgendaKegiatan;
use \BkppAgendaKegiatanQuery as ChildBkppAgendaKegiatanQuery;
use \Exception;
use \PDO;
use Map\BkppAgendaKegiatanTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bkpp_agenda_kegiatan' table.
 *
 *
 *
 * @method     ChildBkppAgendaKegiatanQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBkppAgendaKegiatanQuery orderByJudul($order = Criteria::ASC) Order by the judul column
 * @method     ChildBkppAgendaKegiatanQuery orderByGambar($order = Criteria::ASC) Order by the gambar column
 * @method     ChildBkppAgendaKegiatanQuery orderByKeteranganGambar($order = Criteria::ASC) Order by the keterangan_gambar column
 * @method     ChildBkppAgendaKegiatanQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method     ChildBkppAgendaKegiatanQuery orderByTempat($order = Criteria::ASC) Order by the tempat column
 * @method     ChildBkppAgendaKegiatanQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method     ChildBkppAgendaKegiatanQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     ChildBkppAgendaKegiatanQuery groupById() Group by the id column
 * @method     ChildBkppAgendaKegiatanQuery groupByJudul() Group by the judul column
 * @method     ChildBkppAgendaKegiatanQuery groupByGambar() Group by the gambar column
 * @method     ChildBkppAgendaKegiatanQuery groupByKeteranganGambar() Group by the keterangan_gambar column
 * @method     ChildBkppAgendaKegiatanQuery groupBySlug() Group by the slug column
 * @method     ChildBkppAgendaKegiatanQuery groupByTempat() Group by the tempat column
 * @method     ChildBkppAgendaKegiatanQuery groupByKeterangan() Group by the keterangan column
 * @method     ChildBkppAgendaKegiatanQuery groupByDate() Group by the date column
 *
 * @method     ChildBkppAgendaKegiatanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBkppAgendaKegiatanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBkppAgendaKegiatanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBkppAgendaKegiatanQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBkppAgendaKegiatanQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBkppAgendaKegiatanQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBkppAgendaKegiatan findOne(ConnectionInterface $con = null) Return the first ChildBkppAgendaKegiatan matching the query
 * @method     ChildBkppAgendaKegiatan findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBkppAgendaKegiatan matching the query, or a new ChildBkppAgendaKegiatan object populated from the query conditions when no match is found
 *
 * @method     ChildBkppAgendaKegiatan findOneById(int $id) Return the first ChildBkppAgendaKegiatan filtered by the id column
 * @method     ChildBkppAgendaKegiatan findOneByJudul(string $judul) Return the first ChildBkppAgendaKegiatan filtered by the judul column
 * @method     ChildBkppAgendaKegiatan findOneByGambar(string $gambar) Return the first ChildBkppAgendaKegiatan filtered by the gambar column
 * @method     ChildBkppAgendaKegiatan findOneByKeteranganGambar(string $keterangan_gambar) Return the first ChildBkppAgendaKegiatan filtered by the keterangan_gambar column
 * @method     ChildBkppAgendaKegiatan findOneBySlug(string $slug) Return the first ChildBkppAgendaKegiatan filtered by the slug column
 * @method     ChildBkppAgendaKegiatan findOneByTempat(string $tempat) Return the first ChildBkppAgendaKegiatan filtered by the tempat column
 * @method     ChildBkppAgendaKegiatan findOneByKeterangan(string $keterangan) Return the first ChildBkppAgendaKegiatan filtered by the keterangan column
 * @method     ChildBkppAgendaKegiatan findOneByDate(string $date) Return the first ChildBkppAgendaKegiatan filtered by the date column *

 * @method     ChildBkppAgendaKegiatan requirePk($key, ConnectionInterface $con = null) Return the ChildBkppAgendaKegiatan by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppAgendaKegiatan requireOne(ConnectionInterface $con = null) Return the first ChildBkppAgendaKegiatan matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppAgendaKegiatan requireOneById(int $id) Return the first ChildBkppAgendaKegiatan filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppAgendaKegiatan requireOneByJudul(string $judul) Return the first ChildBkppAgendaKegiatan filtered by the judul column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppAgendaKegiatan requireOneByGambar(string $gambar) Return the first ChildBkppAgendaKegiatan filtered by the gambar column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppAgendaKegiatan requireOneByKeteranganGambar(string $keterangan_gambar) Return the first ChildBkppAgendaKegiatan filtered by the keterangan_gambar column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppAgendaKegiatan requireOneBySlug(string $slug) Return the first ChildBkppAgendaKegiatan filtered by the slug column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppAgendaKegiatan requireOneByTempat(string $tempat) Return the first ChildBkppAgendaKegiatan filtered by the tempat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppAgendaKegiatan requireOneByKeterangan(string $keterangan) Return the first ChildBkppAgendaKegiatan filtered by the keterangan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppAgendaKegiatan requireOneByDate(string $date) Return the first ChildBkppAgendaKegiatan filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppAgendaKegiatan[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBkppAgendaKegiatan objects based on current ModelCriteria
 * @method     ChildBkppAgendaKegiatan[]|ObjectCollection findById(int $id) Return ChildBkppAgendaKegiatan objects filtered by the id column
 * @method     ChildBkppAgendaKegiatan[]|ObjectCollection findByJudul(string $judul) Return ChildBkppAgendaKegiatan objects filtered by the judul column
 * @method     ChildBkppAgendaKegiatan[]|ObjectCollection findByGambar(string $gambar) Return ChildBkppAgendaKegiatan objects filtered by the gambar column
 * @method     ChildBkppAgendaKegiatan[]|ObjectCollection findByKeteranganGambar(string $keterangan_gambar) Return ChildBkppAgendaKegiatan objects filtered by the keterangan_gambar column
 * @method     ChildBkppAgendaKegiatan[]|ObjectCollection findBySlug(string $slug) Return ChildBkppAgendaKegiatan objects filtered by the slug column
 * @method     ChildBkppAgendaKegiatan[]|ObjectCollection findByTempat(string $tempat) Return ChildBkppAgendaKegiatan objects filtered by the tempat column
 * @method     ChildBkppAgendaKegiatan[]|ObjectCollection findByKeterangan(string $keterangan) Return ChildBkppAgendaKegiatan objects filtered by the keterangan column
 * @method     ChildBkppAgendaKegiatan[]|ObjectCollection findByDate(string $date) Return ChildBkppAgendaKegiatan objects filtered by the date column
 * @method     ChildBkppAgendaKegiatan[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BkppAgendaKegiatanQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BkppAgendaKegiatanQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\BkppAgendaKegiatan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBkppAgendaKegiatanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBkppAgendaKegiatanQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBkppAgendaKegiatanQuery) {
            return $criteria;
        }
        $query = new ChildBkppAgendaKegiatanQuery();
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
     * @return ChildBkppAgendaKegiatan|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BkppAgendaKegiatanTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BkppAgendaKegiatanTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBkppAgendaKegiatan A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, judul, gambar, keterangan_gambar, slug, tempat, keterangan, date FROM bkpp_agenda_kegiatan WHERE id = :p0';
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
            /** @var ChildBkppAgendaKegiatan $obj */
            $obj = new ChildBkppAgendaKegiatan();
            $obj->hydrate($row);
            BkppAgendaKegiatanTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBkppAgendaKegiatan|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBkppAgendaKegiatanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBkppAgendaKegiatanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildBkppAgendaKegiatanQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildBkppAgendaKegiatanQuery The current query, for fluid interface
     */
    public function filterByJudul($judul = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($judul)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_JUDUL, $judul, $comparison);
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
     * @return $this|ChildBkppAgendaKegiatanQuery The current query, for fluid interface
     */
    public function filterByGambar($gambar = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gambar)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_GAMBAR, $gambar, $comparison);
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
     * @return $this|ChildBkppAgendaKegiatanQuery The current query, for fluid interface
     */
    public function filterByKeteranganGambar($keteranganGambar = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keteranganGambar)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_KETERANGAN_GAMBAR, $keteranganGambar, $comparison);
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
     * @return $this|ChildBkppAgendaKegiatanQuery The current query, for fluid interface
     */
    public function filterBySlug($slug = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slug)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_SLUG, $slug, $comparison);
    }

    /**
     * Filter the query on the tempat column
     *
     * Example usage:
     * <code>
     * $query->filterByTempat('fooValue');   // WHERE tempat = 'fooValue'
     * $query->filterByTempat('%fooValue%', Criteria::LIKE); // WHERE tempat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tempat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppAgendaKegiatanQuery The current query, for fluid interface
     */
    public function filterByTempat($tempat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tempat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_TEMPAT, $tempat, $comparison);
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
     * @return $this|ChildBkppAgendaKegiatanQuery The current query, for fluid interface
     */
    public function filterByKeterangan($keterangan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keterangan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_KETERANGAN, $keterangan, $comparison);
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
     * @return $this|ChildBkppAgendaKegiatanQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBkppAgendaKegiatan $bkppAgendaKegiatan Object to remove from the list of results
     *
     * @return $this|ChildBkppAgendaKegiatanQuery The current query, for fluid interface
     */
    public function prune($bkppAgendaKegiatan = null)
    {
        if ($bkppAgendaKegiatan) {
            $this->addUsingAlias(BkppAgendaKegiatanTableMap::COL_ID, $bkppAgendaKegiatan->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bkpp_agenda_kegiatan table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppAgendaKegiatanTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BkppAgendaKegiatanTableMap::clearInstancePool();
            BkppAgendaKegiatanTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppAgendaKegiatanTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BkppAgendaKegiatanTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BkppAgendaKegiatanTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BkppAgendaKegiatanTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BkppAgendaKegiatanQuery
