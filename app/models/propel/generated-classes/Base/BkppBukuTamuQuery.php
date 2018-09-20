<?php

namespace Base;

use \BkppBukuTamu as ChildBkppBukuTamu;
use \BkppBukuTamuQuery as ChildBkppBukuTamuQuery;
use \Exception;
use \PDO;
use Map\BkppBukuTamuTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bkpp_buku_tamu' table.
 *
 *
 *
 * @method     ChildBkppBukuTamuQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBkppBukuTamuQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method     ChildBkppBukuTamuQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildBkppBukuTamuQuery orderByIsi($order = Criteria::ASC) Order by the isi column
 * @method     ChildBkppBukuTamuQuery orderByJawaban($order = Criteria::ASC) Order by the jawaban column
 * @method     ChildBkppBukuTamuQuery orderByPublish($order = Criteria::ASC) Order by the publish column
 * @method     ChildBkppBukuTamuQuery orderByTanggal($order = Criteria::ASC) Order by the tanggal column
 * @method     ChildBkppBukuTamuQuery orderByTanggalDijawab($order = Criteria::ASC) Order by the tanggal_dijawab column
 *
 * @method     ChildBkppBukuTamuQuery groupById() Group by the id column
 * @method     ChildBkppBukuTamuQuery groupByNama() Group by the nama column
 * @method     ChildBkppBukuTamuQuery groupByEmail() Group by the email column
 * @method     ChildBkppBukuTamuQuery groupByIsi() Group by the isi column
 * @method     ChildBkppBukuTamuQuery groupByJawaban() Group by the jawaban column
 * @method     ChildBkppBukuTamuQuery groupByPublish() Group by the publish column
 * @method     ChildBkppBukuTamuQuery groupByTanggal() Group by the tanggal column
 * @method     ChildBkppBukuTamuQuery groupByTanggalDijawab() Group by the tanggal_dijawab column
 *
 * @method     ChildBkppBukuTamuQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBkppBukuTamuQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBkppBukuTamuQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBkppBukuTamuQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBkppBukuTamuQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBkppBukuTamuQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBkppBukuTamu findOne(ConnectionInterface $con = null) Return the first ChildBkppBukuTamu matching the query
 * @method     ChildBkppBukuTamu findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBkppBukuTamu matching the query, or a new ChildBkppBukuTamu object populated from the query conditions when no match is found
 *
 * @method     ChildBkppBukuTamu findOneById(int $id) Return the first ChildBkppBukuTamu filtered by the id column
 * @method     ChildBkppBukuTamu findOneByNama(string $nama) Return the first ChildBkppBukuTamu filtered by the nama column
 * @method     ChildBkppBukuTamu findOneByEmail(string $email) Return the first ChildBkppBukuTamu filtered by the email column
 * @method     ChildBkppBukuTamu findOneByIsi(string $isi) Return the first ChildBkppBukuTamu filtered by the isi column
 * @method     ChildBkppBukuTamu findOneByJawaban(string $jawaban) Return the first ChildBkppBukuTamu filtered by the jawaban column
 * @method     ChildBkppBukuTamu findOneByPublish(int $publish) Return the first ChildBkppBukuTamu filtered by the publish column
 * @method     ChildBkppBukuTamu findOneByTanggal(string $tanggal) Return the first ChildBkppBukuTamu filtered by the tanggal column
 * @method     ChildBkppBukuTamu findOneByTanggalDijawab(string $tanggal_dijawab) Return the first ChildBkppBukuTamu filtered by the tanggal_dijawab column *

 * @method     ChildBkppBukuTamu requirePk($key, ConnectionInterface $con = null) Return the ChildBkppBukuTamu by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBukuTamu requireOne(ConnectionInterface $con = null) Return the first ChildBkppBukuTamu matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppBukuTamu requireOneById(int $id) Return the first ChildBkppBukuTamu filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBukuTamu requireOneByNama(string $nama) Return the first ChildBkppBukuTamu filtered by the nama column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBukuTamu requireOneByEmail(string $email) Return the first ChildBkppBukuTamu filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBukuTamu requireOneByIsi(string $isi) Return the first ChildBkppBukuTamu filtered by the isi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBukuTamu requireOneByJawaban(string $jawaban) Return the first ChildBkppBukuTamu filtered by the jawaban column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBukuTamu requireOneByPublish(int $publish) Return the first ChildBkppBukuTamu filtered by the publish column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBukuTamu requireOneByTanggal(string $tanggal) Return the first ChildBkppBukuTamu filtered by the tanggal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppBukuTamu requireOneByTanggalDijawab(string $tanggal_dijawab) Return the first ChildBkppBukuTamu filtered by the tanggal_dijawab column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppBukuTamu[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBkppBukuTamu objects based on current ModelCriteria
 * @method     ChildBkppBukuTamu[]|ObjectCollection findById(int $id) Return ChildBkppBukuTamu objects filtered by the id column
 * @method     ChildBkppBukuTamu[]|ObjectCollection findByNama(string $nama) Return ChildBkppBukuTamu objects filtered by the nama column
 * @method     ChildBkppBukuTamu[]|ObjectCollection findByEmail(string $email) Return ChildBkppBukuTamu objects filtered by the email column
 * @method     ChildBkppBukuTamu[]|ObjectCollection findByIsi(string $isi) Return ChildBkppBukuTamu objects filtered by the isi column
 * @method     ChildBkppBukuTamu[]|ObjectCollection findByJawaban(string $jawaban) Return ChildBkppBukuTamu objects filtered by the jawaban column
 * @method     ChildBkppBukuTamu[]|ObjectCollection findByPublish(int $publish) Return ChildBkppBukuTamu objects filtered by the publish column
 * @method     ChildBkppBukuTamu[]|ObjectCollection findByTanggal(string $tanggal) Return ChildBkppBukuTamu objects filtered by the tanggal column
 * @method     ChildBkppBukuTamu[]|ObjectCollection findByTanggalDijawab(string $tanggal_dijawab) Return ChildBkppBukuTamu objects filtered by the tanggal_dijawab column
 * @method     ChildBkppBukuTamu[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BkppBukuTamuQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BkppBukuTamuQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\BkppBukuTamu', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBkppBukuTamuQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBkppBukuTamuQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBkppBukuTamuQuery) {
            return $criteria;
        }
        $query = new ChildBkppBukuTamuQuery();
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
     * @return ChildBkppBukuTamu|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BkppBukuTamuTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BkppBukuTamuTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBkppBukuTamu A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nama, email, isi, jawaban, publish, tanggal, tanggal_dijawab FROM bkpp_buku_tamu WHERE id = :p0';
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
            /** @var ChildBkppBukuTamu $obj */
            $obj = new ChildBkppBukuTamu();
            $obj->hydrate($row);
            BkppBukuTamuTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBkppBukuTamu|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBkppBukuTamuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BkppBukuTamuTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBkppBukuTamuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BkppBukuTamuTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildBkppBukuTamuQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BkppBukuTamuTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BkppBukuTamuTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBukuTamuTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nama column
     *
     * Example usage:
     * <code>
     * $query->filterByNama('fooValue');   // WHERE nama = 'fooValue'
     * $query->filterByNama('%fooValue%', Criteria::LIKE); // WHERE nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nama The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppBukuTamuQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBukuTamuTableMap::COL_NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppBukuTamuQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBukuTamuTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildBkppBukuTamuQuery The current query, for fluid interface
     */
    public function filterByIsi($isi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($isi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBukuTamuTableMap::COL_ISI, $isi, $comparison);
    }

    /**
     * Filter the query on the jawaban column
     *
     * Example usage:
     * <code>
     * $query->filterByJawaban('fooValue');   // WHERE jawaban = 'fooValue'
     * $query->filterByJawaban('%fooValue%', Criteria::LIKE); // WHERE jawaban LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jawaban The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppBukuTamuQuery The current query, for fluid interface
     */
    public function filterByJawaban($jawaban = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jawaban)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBukuTamuTableMap::COL_JAWABAN, $jawaban, $comparison);
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
     * @return $this|ChildBkppBukuTamuQuery The current query, for fluid interface
     */
    public function filterByPublish($publish = null, $comparison = null)
    {
        if (is_array($publish)) {
            $useMinMax = false;
            if (isset($publish['min'])) {
                $this->addUsingAlias(BkppBukuTamuTableMap::COL_PUBLISH, $publish['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($publish['max'])) {
                $this->addUsingAlias(BkppBukuTamuTableMap::COL_PUBLISH, $publish['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBukuTamuTableMap::COL_PUBLISH, $publish, $comparison);
    }

    /**
     * Filter the query on the tanggal column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggal('2011-03-14'); // WHERE tanggal = '2011-03-14'
     * $query->filterByTanggal('now'); // WHERE tanggal = '2011-03-14'
     * $query->filterByTanggal(array('max' => 'yesterday')); // WHERE tanggal > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggal The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppBukuTamuQuery The current query, for fluid interface
     */
    public function filterByTanggal($tanggal = null, $comparison = null)
    {
        if (is_array($tanggal)) {
            $useMinMax = false;
            if (isset($tanggal['min'])) {
                $this->addUsingAlias(BkppBukuTamuTableMap::COL_TANGGAL, $tanggal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggal['max'])) {
                $this->addUsingAlias(BkppBukuTamuTableMap::COL_TANGGAL, $tanggal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBukuTamuTableMap::COL_TANGGAL, $tanggal, $comparison);
    }

    /**
     * Filter the query on the tanggal_dijawab column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalDijawab('2011-03-14'); // WHERE tanggal_dijawab = '2011-03-14'
     * $query->filterByTanggalDijawab('now'); // WHERE tanggal_dijawab = '2011-03-14'
     * $query->filterByTanggalDijawab(array('max' => 'yesterday')); // WHERE tanggal_dijawab > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalDijawab The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppBukuTamuQuery The current query, for fluid interface
     */
    public function filterByTanggalDijawab($tanggalDijawab = null, $comparison = null)
    {
        if (is_array($tanggalDijawab)) {
            $useMinMax = false;
            if (isset($tanggalDijawab['min'])) {
                $this->addUsingAlias(BkppBukuTamuTableMap::COL_TANGGAL_DIJAWAB, $tanggalDijawab['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalDijawab['max'])) {
                $this->addUsingAlias(BkppBukuTamuTableMap::COL_TANGGAL_DIJAWAB, $tanggalDijawab['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppBukuTamuTableMap::COL_TANGGAL_DIJAWAB, $tanggalDijawab, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBkppBukuTamu $bkppBukuTamu Object to remove from the list of results
     *
     * @return $this|ChildBkppBukuTamuQuery The current query, for fluid interface
     */
    public function prune($bkppBukuTamu = null)
    {
        if ($bkppBukuTamu) {
            $this->addUsingAlias(BkppBukuTamuTableMap::COL_ID, $bkppBukuTamu->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bkpp_buku_tamu table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppBukuTamuTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BkppBukuTamuTableMap::clearInstancePool();
            BkppBukuTamuTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppBukuTamuTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BkppBukuTamuTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BkppBukuTamuTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BkppBukuTamuTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BkppBukuTamuQuery
