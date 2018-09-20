<?php

namespace Base;

use \BkppKonsultasi as ChildBkppKonsultasi;
use \BkppKonsultasiQuery as ChildBkppKonsultasiQuery;
use \Exception;
use \PDO;
use Map\BkppKonsultasiTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bkpp_konsultasi' table.
 *
 *
 *
 * @method     ChildBkppKonsultasiQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBkppKonsultasiQuery orderByPengirim($order = Criteria::ASC) Order by the pengirim column
 * @method     ChildBkppKonsultasiQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildBkppKonsultasiQuery orderByPertanyaan($order = Criteria::ASC) Order by the pertanyaan column
 * @method     ChildBkppKonsultasiQuery orderByUntuk($order = Criteria::ASC) Order by the untuk column
 * @method     ChildBkppKonsultasiQuery orderByJawaban($order = Criteria::ASC) Order by the jawaban column
 * @method     ChildBkppKonsultasiQuery orderByPublish($order = Criteria::ASC) Order by the publish column
 * @method     ChildBkppKonsultasiQuery orderByTanggal($order = Criteria::ASC) Order by the tanggal column
 * @method     ChildBkppKonsultasiQuery orderByTanggalDijawab($order = Criteria::ASC) Order by the tanggal_dijawab column
 *
 * @method     ChildBkppKonsultasiQuery groupById() Group by the id column
 * @method     ChildBkppKonsultasiQuery groupByPengirim() Group by the pengirim column
 * @method     ChildBkppKonsultasiQuery groupByEmail() Group by the email column
 * @method     ChildBkppKonsultasiQuery groupByPertanyaan() Group by the pertanyaan column
 * @method     ChildBkppKonsultasiQuery groupByUntuk() Group by the untuk column
 * @method     ChildBkppKonsultasiQuery groupByJawaban() Group by the jawaban column
 * @method     ChildBkppKonsultasiQuery groupByPublish() Group by the publish column
 * @method     ChildBkppKonsultasiQuery groupByTanggal() Group by the tanggal column
 * @method     ChildBkppKonsultasiQuery groupByTanggalDijawab() Group by the tanggal_dijawab column
 *
 * @method     ChildBkppKonsultasiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBkppKonsultasiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBkppKonsultasiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBkppKonsultasiQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBkppKonsultasiQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBkppKonsultasiQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBkppKonsultasi findOne(ConnectionInterface $con = null) Return the first ChildBkppKonsultasi matching the query
 * @method     ChildBkppKonsultasi findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBkppKonsultasi matching the query, or a new ChildBkppKonsultasi object populated from the query conditions when no match is found
 *
 * @method     ChildBkppKonsultasi findOneById(int $id) Return the first ChildBkppKonsultasi filtered by the id column
 * @method     ChildBkppKonsultasi findOneByPengirim(string $pengirim) Return the first ChildBkppKonsultasi filtered by the pengirim column
 * @method     ChildBkppKonsultasi findOneByEmail(string $email) Return the first ChildBkppKonsultasi filtered by the email column
 * @method     ChildBkppKonsultasi findOneByPertanyaan(string $pertanyaan) Return the first ChildBkppKonsultasi filtered by the pertanyaan column
 * @method     ChildBkppKonsultasi findOneByUntuk(string $untuk) Return the first ChildBkppKonsultasi filtered by the untuk column
 * @method     ChildBkppKonsultasi findOneByJawaban(string $jawaban) Return the first ChildBkppKonsultasi filtered by the jawaban column
 * @method     ChildBkppKonsultasi findOneByPublish(int $publish) Return the first ChildBkppKonsultasi filtered by the publish column
 * @method     ChildBkppKonsultasi findOneByTanggal(string $tanggal) Return the first ChildBkppKonsultasi filtered by the tanggal column
 * @method     ChildBkppKonsultasi findOneByTanggalDijawab(string $tanggal_dijawab) Return the first ChildBkppKonsultasi filtered by the tanggal_dijawab column *

 * @method     ChildBkppKonsultasi requirePk($key, ConnectionInterface $con = null) Return the ChildBkppKonsultasi by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppKonsultasi requireOne(ConnectionInterface $con = null) Return the first ChildBkppKonsultasi matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppKonsultasi requireOneById(int $id) Return the first ChildBkppKonsultasi filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppKonsultasi requireOneByPengirim(string $pengirim) Return the first ChildBkppKonsultasi filtered by the pengirim column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppKonsultasi requireOneByEmail(string $email) Return the first ChildBkppKonsultasi filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppKonsultasi requireOneByPertanyaan(string $pertanyaan) Return the first ChildBkppKonsultasi filtered by the pertanyaan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppKonsultasi requireOneByUntuk(string $untuk) Return the first ChildBkppKonsultasi filtered by the untuk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppKonsultasi requireOneByJawaban(string $jawaban) Return the first ChildBkppKonsultasi filtered by the jawaban column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppKonsultasi requireOneByPublish(int $publish) Return the first ChildBkppKonsultasi filtered by the publish column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppKonsultasi requireOneByTanggal(string $tanggal) Return the first ChildBkppKonsultasi filtered by the tanggal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppKonsultasi requireOneByTanggalDijawab(string $tanggal_dijawab) Return the first ChildBkppKonsultasi filtered by the tanggal_dijawab column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppKonsultasi[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBkppKonsultasi objects based on current ModelCriteria
 * @method     ChildBkppKonsultasi[]|ObjectCollection findById(int $id) Return ChildBkppKonsultasi objects filtered by the id column
 * @method     ChildBkppKonsultasi[]|ObjectCollection findByPengirim(string $pengirim) Return ChildBkppKonsultasi objects filtered by the pengirim column
 * @method     ChildBkppKonsultasi[]|ObjectCollection findByEmail(string $email) Return ChildBkppKonsultasi objects filtered by the email column
 * @method     ChildBkppKonsultasi[]|ObjectCollection findByPertanyaan(string $pertanyaan) Return ChildBkppKonsultasi objects filtered by the pertanyaan column
 * @method     ChildBkppKonsultasi[]|ObjectCollection findByUntuk(string $untuk) Return ChildBkppKonsultasi objects filtered by the untuk column
 * @method     ChildBkppKonsultasi[]|ObjectCollection findByJawaban(string $jawaban) Return ChildBkppKonsultasi objects filtered by the jawaban column
 * @method     ChildBkppKonsultasi[]|ObjectCollection findByPublish(int $publish) Return ChildBkppKonsultasi objects filtered by the publish column
 * @method     ChildBkppKonsultasi[]|ObjectCollection findByTanggal(string $tanggal) Return ChildBkppKonsultasi objects filtered by the tanggal column
 * @method     ChildBkppKonsultasi[]|ObjectCollection findByTanggalDijawab(string $tanggal_dijawab) Return ChildBkppKonsultasi objects filtered by the tanggal_dijawab column
 * @method     ChildBkppKonsultasi[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BkppKonsultasiQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BkppKonsultasiQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\BkppKonsultasi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBkppKonsultasiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBkppKonsultasiQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBkppKonsultasiQuery) {
            return $criteria;
        }
        $query = new ChildBkppKonsultasiQuery();
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
     * @return ChildBkppKonsultasi|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BkppKonsultasiTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BkppKonsultasiTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBkppKonsultasi A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, pengirim, email, pertanyaan, untuk, jawaban, publish, tanggal, tanggal_dijawab FROM bkpp_konsultasi WHERE id = :p0';
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
            /** @var ChildBkppKonsultasi $obj */
            $obj = new ChildBkppKonsultasi();
            $obj->hydrate($row);
            BkppKonsultasiTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBkppKonsultasi|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBkppKonsultasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BkppKonsultasiTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBkppKonsultasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BkppKonsultasiTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildBkppKonsultasiQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BkppKonsultasiTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BkppKonsultasiTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppKonsultasiTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the pengirim column
     *
     * Example usage:
     * <code>
     * $query->filterByPengirim('fooValue');   // WHERE pengirim = 'fooValue'
     * $query->filterByPengirim('%fooValue%', Criteria::LIKE); // WHERE pengirim LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pengirim The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppKonsultasiQuery The current query, for fluid interface
     */
    public function filterByPengirim($pengirim = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pengirim)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppKonsultasiTableMap::COL_PENGIRIM, $pengirim, $comparison);
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
     * @return $this|ChildBkppKonsultasiQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppKonsultasiTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the pertanyaan column
     *
     * Example usage:
     * <code>
     * $query->filterByPertanyaan('fooValue');   // WHERE pertanyaan = 'fooValue'
     * $query->filterByPertanyaan('%fooValue%', Criteria::LIKE); // WHERE pertanyaan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pertanyaan The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppKonsultasiQuery The current query, for fluid interface
     */
    public function filterByPertanyaan($pertanyaan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pertanyaan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppKonsultasiTableMap::COL_PERTANYAAN, $pertanyaan, $comparison);
    }

    /**
     * Filter the query on the untuk column
     *
     * Example usage:
     * <code>
     * $query->filterByUntuk('fooValue');   // WHERE untuk = 'fooValue'
     * $query->filterByUntuk('%fooValue%', Criteria::LIKE); // WHERE untuk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $untuk The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppKonsultasiQuery The current query, for fluid interface
     */
    public function filterByUntuk($untuk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($untuk)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppKonsultasiTableMap::COL_UNTUK, $untuk, $comparison);
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
     * @return $this|ChildBkppKonsultasiQuery The current query, for fluid interface
     */
    public function filterByJawaban($jawaban = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jawaban)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppKonsultasiTableMap::COL_JAWABAN, $jawaban, $comparison);
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
     * @return $this|ChildBkppKonsultasiQuery The current query, for fluid interface
     */
    public function filterByPublish($publish = null, $comparison = null)
    {
        if (is_array($publish)) {
            $useMinMax = false;
            if (isset($publish['min'])) {
                $this->addUsingAlias(BkppKonsultasiTableMap::COL_PUBLISH, $publish['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($publish['max'])) {
                $this->addUsingAlias(BkppKonsultasiTableMap::COL_PUBLISH, $publish['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppKonsultasiTableMap::COL_PUBLISH, $publish, $comparison);
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
     * @return $this|ChildBkppKonsultasiQuery The current query, for fluid interface
     */
    public function filterByTanggal($tanggal = null, $comparison = null)
    {
        if (is_array($tanggal)) {
            $useMinMax = false;
            if (isset($tanggal['min'])) {
                $this->addUsingAlias(BkppKonsultasiTableMap::COL_TANGGAL, $tanggal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggal['max'])) {
                $this->addUsingAlias(BkppKonsultasiTableMap::COL_TANGGAL, $tanggal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppKonsultasiTableMap::COL_TANGGAL, $tanggal, $comparison);
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
     * @return $this|ChildBkppKonsultasiQuery The current query, for fluid interface
     */
    public function filterByTanggalDijawab($tanggalDijawab = null, $comparison = null)
    {
        if (is_array($tanggalDijawab)) {
            $useMinMax = false;
            if (isset($tanggalDijawab['min'])) {
                $this->addUsingAlias(BkppKonsultasiTableMap::COL_TANGGAL_DIJAWAB, $tanggalDijawab['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalDijawab['max'])) {
                $this->addUsingAlias(BkppKonsultasiTableMap::COL_TANGGAL_DIJAWAB, $tanggalDijawab['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppKonsultasiTableMap::COL_TANGGAL_DIJAWAB, $tanggalDijawab, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBkppKonsultasi $bkppKonsultasi Object to remove from the list of results
     *
     * @return $this|ChildBkppKonsultasiQuery The current query, for fluid interface
     */
    public function prune($bkppKonsultasi = null)
    {
        if ($bkppKonsultasi) {
            $this->addUsingAlias(BkppKonsultasiTableMap::COL_ID, $bkppKonsultasi->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bkpp_konsultasi table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppKonsultasiTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BkppKonsultasiTableMap::clearInstancePool();
            BkppKonsultasiTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppKonsultasiTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BkppKonsultasiTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BkppKonsultasiTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BkppKonsultasiTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BkppKonsultasiQuery
