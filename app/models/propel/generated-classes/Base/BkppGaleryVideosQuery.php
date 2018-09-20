<?php

namespace Base;

use \BkppGaleryVideos as ChildBkppGaleryVideos;
use \BkppGaleryVideosQuery as ChildBkppGaleryVideosQuery;
use \Exception;
use \PDO;
use Map\BkppGaleryVideosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bkpp_galery_videos' table.
 *
 *
 *
 * @method     ChildBkppGaleryVideosQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBkppGaleryVideosQuery orderByJudul($order = Criteria::ASC) Order by the judul column
 * @method     ChildBkppGaleryVideosQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method     ChildBkppGaleryVideosQuery orderByTglDibuat($order = Criteria::ASC) Order by the tgl_dibuat column
 *
 * @method     ChildBkppGaleryVideosQuery groupById() Group by the id column
 * @method     ChildBkppGaleryVideosQuery groupByJudul() Group by the judul column
 * @method     ChildBkppGaleryVideosQuery groupByKeterangan() Group by the keterangan column
 * @method     ChildBkppGaleryVideosQuery groupByTglDibuat() Group by the tgl_dibuat column
 *
 * @method     ChildBkppGaleryVideosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBkppGaleryVideosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBkppGaleryVideosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBkppGaleryVideosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBkppGaleryVideosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBkppGaleryVideosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBkppGaleryVideos findOne(ConnectionInterface $con = null) Return the first ChildBkppGaleryVideos matching the query
 * @method     ChildBkppGaleryVideos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBkppGaleryVideos matching the query, or a new ChildBkppGaleryVideos object populated from the query conditions when no match is found
 *
 * @method     ChildBkppGaleryVideos findOneById(int $id) Return the first ChildBkppGaleryVideos filtered by the id column
 * @method     ChildBkppGaleryVideos findOneByJudul(string $judul) Return the first ChildBkppGaleryVideos filtered by the judul column
 * @method     ChildBkppGaleryVideos findOneByKeterangan(string $keterangan) Return the first ChildBkppGaleryVideos filtered by the keterangan column
 * @method     ChildBkppGaleryVideos findOneByTglDibuat(string $tgl_dibuat) Return the first ChildBkppGaleryVideos filtered by the tgl_dibuat column *

 * @method     ChildBkppGaleryVideos requirePk($key, ConnectionInterface $con = null) Return the ChildBkppGaleryVideos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppGaleryVideos requireOne(ConnectionInterface $con = null) Return the first ChildBkppGaleryVideos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppGaleryVideos requireOneById(int $id) Return the first ChildBkppGaleryVideos filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppGaleryVideos requireOneByJudul(string $judul) Return the first ChildBkppGaleryVideos filtered by the judul column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppGaleryVideos requireOneByKeterangan(string $keterangan) Return the first ChildBkppGaleryVideos filtered by the keterangan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppGaleryVideos requireOneByTglDibuat(string $tgl_dibuat) Return the first ChildBkppGaleryVideos filtered by the tgl_dibuat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppGaleryVideos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBkppGaleryVideos objects based on current ModelCriteria
 * @method     ChildBkppGaleryVideos[]|ObjectCollection findById(int $id) Return ChildBkppGaleryVideos objects filtered by the id column
 * @method     ChildBkppGaleryVideos[]|ObjectCollection findByJudul(string $judul) Return ChildBkppGaleryVideos objects filtered by the judul column
 * @method     ChildBkppGaleryVideos[]|ObjectCollection findByKeterangan(string $keterangan) Return ChildBkppGaleryVideos objects filtered by the keterangan column
 * @method     ChildBkppGaleryVideos[]|ObjectCollection findByTglDibuat(string $tgl_dibuat) Return ChildBkppGaleryVideos objects filtered by the tgl_dibuat column
 * @method     ChildBkppGaleryVideos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BkppGaleryVideosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BkppGaleryVideosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\BkppGaleryVideos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBkppGaleryVideosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBkppGaleryVideosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBkppGaleryVideosQuery) {
            return $criteria;
        }
        $query = new ChildBkppGaleryVideosQuery();
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
     * @return ChildBkppGaleryVideos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BkppGaleryVideosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BkppGaleryVideosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBkppGaleryVideos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, judul, keterangan, tgl_dibuat FROM bkpp_galery_videos WHERE id = :p0';
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
            /** @var ChildBkppGaleryVideos $obj */
            $obj = new ChildBkppGaleryVideos();
            $obj->hydrate($row);
            BkppGaleryVideosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBkppGaleryVideos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBkppGaleryVideosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BkppGaleryVideosTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBkppGaleryVideosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BkppGaleryVideosTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildBkppGaleryVideosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BkppGaleryVideosTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BkppGaleryVideosTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppGaleryVideosTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildBkppGaleryVideosQuery The current query, for fluid interface
     */
    public function filterByJudul($judul = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($judul)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppGaleryVideosTableMap::COL_JUDUL, $judul, $comparison);
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
     * @return $this|ChildBkppGaleryVideosQuery The current query, for fluid interface
     */
    public function filterByKeterangan($keterangan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keterangan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppGaleryVideosTableMap::COL_KETERANGAN, $keterangan, $comparison);
    }

    /**
     * Filter the query on the tgl_dibuat column
     *
     * Example usage:
     * <code>
     * $query->filterByTglDibuat('2011-03-14'); // WHERE tgl_dibuat = '2011-03-14'
     * $query->filterByTglDibuat('now'); // WHERE tgl_dibuat = '2011-03-14'
     * $query->filterByTglDibuat(array('max' => 'yesterday')); // WHERE tgl_dibuat > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglDibuat The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppGaleryVideosQuery The current query, for fluid interface
     */
    public function filterByTglDibuat($tglDibuat = null, $comparison = null)
    {
        if (is_array($tglDibuat)) {
            $useMinMax = false;
            if (isset($tglDibuat['min'])) {
                $this->addUsingAlias(BkppGaleryVideosTableMap::COL_TGL_DIBUAT, $tglDibuat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglDibuat['max'])) {
                $this->addUsingAlias(BkppGaleryVideosTableMap::COL_TGL_DIBUAT, $tglDibuat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppGaleryVideosTableMap::COL_TGL_DIBUAT, $tglDibuat, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBkppGaleryVideos $bkppGaleryVideos Object to remove from the list of results
     *
     * @return $this|ChildBkppGaleryVideosQuery The current query, for fluid interface
     */
    public function prune($bkppGaleryVideos = null)
    {
        if ($bkppGaleryVideos) {
            $this->addUsingAlias(BkppGaleryVideosTableMap::COL_ID, $bkppGaleryVideos->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bkpp_galery_videos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppGaleryVideosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BkppGaleryVideosTableMap::clearInstancePool();
            BkppGaleryVideosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppGaleryVideosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BkppGaleryVideosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BkppGaleryVideosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BkppGaleryVideosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BkppGaleryVideosQuery
