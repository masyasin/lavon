<?php

namespace Base;

use \MainAuthorization as ChildMainAuthorization;
use \MainAuthorizationQuery as ChildMainAuthorizationQuery;
use \Exception;
use \PDO;
use Map\MainAuthorizationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'main_authorization' table.
 *
 *
 *
 * @method     ChildMainAuthorizationQuery orderByAuthorizationId($order = Criteria::ASC) Order by the authorization_id column
 * @method     ChildMainAuthorizationQuery orderByAuthorizationName($order = Criteria::ASC) Order by the authorization_name column
 * @method     ChildMainAuthorizationQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ChildMainAuthorizationQuery groupByAuthorizationId() Group by the authorization_id column
 * @method     ChildMainAuthorizationQuery groupByAuthorizationName() Group by the authorization_name column
 * @method     ChildMainAuthorizationQuery groupByDescription() Group by the description column
 *
 * @method     ChildMainAuthorizationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMainAuthorizationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMainAuthorizationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMainAuthorizationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMainAuthorizationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMainAuthorizationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMainAuthorization findOne(ConnectionInterface $con = null) Return the first ChildMainAuthorization matching the query
 * @method     ChildMainAuthorization findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMainAuthorization matching the query, or a new ChildMainAuthorization object populated from the query conditions when no match is found
 *
 * @method     ChildMainAuthorization findOneByAuthorizationId(int $authorization_id) Return the first ChildMainAuthorization filtered by the authorization_id column
 * @method     ChildMainAuthorization findOneByAuthorizationName(string $authorization_name) Return the first ChildMainAuthorization filtered by the authorization_name column
 * @method     ChildMainAuthorization findOneByDescription(string $description) Return the first ChildMainAuthorization filtered by the description column *

 * @method     ChildMainAuthorization requirePk($key, ConnectionInterface $con = null) Return the ChildMainAuthorization by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainAuthorization requireOne(ConnectionInterface $con = null) Return the first ChildMainAuthorization matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainAuthorization requireOneByAuthorizationId(int $authorization_id) Return the first ChildMainAuthorization filtered by the authorization_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainAuthorization requireOneByAuthorizationName(string $authorization_name) Return the first ChildMainAuthorization filtered by the authorization_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainAuthorization requireOneByDescription(string $description) Return the first ChildMainAuthorization filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainAuthorization[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMainAuthorization objects based on current ModelCriteria
 * @method     ChildMainAuthorization[]|ObjectCollection findByAuthorizationId(int $authorization_id) Return ChildMainAuthorization objects filtered by the authorization_id column
 * @method     ChildMainAuthorization[]|ObjectCollection findByAuthorizationName(string $authorization_name) Return ChildMainAuthorization objects filtered by the authorization_name column
 * @method     ChildMainAuthorization[]|ObjectCollection findByDescription(string $description) Return ChildMainAuthorization objects filtered by the description column
 * @method     ChildMainAuthorization[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MainAuthorizationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MainAuthorizationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MainAuthorization', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMainAuthorizationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMainAuthorizationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMainAuthorizationQuery) {
            return $criteria;
        }
        $query = new ChildMainAuthorizationQuery();
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
     * @return ChildMainAuthorization|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MainAuthorizationTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MainAuthorizationTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMainAuthorization A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT authorization_id, authorization_name, description FROM main_authorization WHERE authorization_id = :p0';
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
            /** @var ChildMainAuthorization $obj */
            $obj = new ChildMainAuthorization();
            $obj->hydrate($row);
            MainAuthorizationTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMainAuthorization|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMainAuthorizationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MainAuthorizationTableMap::COL_AUTHORIZATION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMainAuthorizationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MainAuthorizationTableMap::COL_AUTHORIZATION_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the authorization_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthorizationId(1234); // WHERE authorization_id = 1234
     * $query->filterByAuthorizationId(array(12, 34)); // WHERE authorization_id IN (12, 34)
     * $query->filterByAuthorizationId(array('min' => 12)); // WHERE authorization_id > 12
     * </code>
     *
     * @param     mixed $authorizationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainAuthorizationQuery The current query, for fluid interface
     */
    public function filterByAuthorizationId($authorizationId = null, $comparison = null)
    {
        if (is_array($authorizationId)) {
            $useMinMax = false;
            if (isset($authorizationId['min'])) {
                $this->addUsingAlias(MainAuthorizationTableMap::COL_AUTHORIZATION_ID, $authorizationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($authorizationId['max'])) {
                $this->addUsingAlias(MainAuthorizationTableMap::COL_AUTHORIZATION_ID, $authorizationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainAuthorizationTableMap::COL_AUTHORIZATION_ID, $authorizationId, $comparison);
    }

    /**
     * Filter the query on the authorization_name column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthorizationName('fooValue');   // WHERE authorization_name = 'fooValue'
     * $query->filterByAuthorizationName('%fooValue%', Criteria::LIKE); // WHERE authorization_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authorizationName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainAuthorizationQuery The current query, for fluid interface
     */
    public function filterByAuthorizationName($authorizationName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authorizationName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainAuthorizationTableMap::COL_AUTHORIZATION_NAME, $authorizationName, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainAuthorizationQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainAuthorizationTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMainAuthorization $mainAuthorization Object to remove from the list of results
     *
     * @return $this|ChildMainAuthorizationQuery The current query, for fluid interface
     */
    public function prune($mainAuthorization = null)
    {
        if ($mainAuthorization) {
            $this->addUsingAlias(MainAuthorizationTableMap::COL_AUTHORIZATION_ID, $mainAuthorization->getAuthorizationId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the main_authorization table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainAuthorizationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MainAuthorizationTableMap::clearInstancePool();
            MainAuthorizationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MainAuthorizationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MainAuthorizationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MainAuthorizationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MainAuthorizationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MainAuthorizationQuery
