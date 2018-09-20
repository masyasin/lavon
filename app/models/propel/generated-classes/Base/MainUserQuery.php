<?php

namespace Base;

use \MainUser as ChildMainUser;
use \MainUserQuery as ChildMainUserQuery;
use \Exception;
use \PDO;
use Map\MainUserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'main_user' table.
 *
 *
 *
 * @method     ChildMainUserQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildMainUserQuery orderByUserName($order = Criteria::ASC) Order by the user_name column
 * @method     ChildMainUserQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildMainUserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildMainUserQuery orderByActivationCode($order = Criteria::ASC) Order by the activation_code column
 * @method     ChildMainUserQuery orderByRealName($order = Criteria::ASC) Order by the real_name column
 * @method     ChildMainUserQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     ChildMainUserQuery orderByAuthOpenid($order = Criteria::ASC) Order by the auth_OpenID column
 * @method     ChildMainUserQuery orderByAuthFacebook($order = Criteria::ASC) Order by the auth_Facebook column
 * @method     ChildMainUserQuery orderByAuthTwitter($order = Criteria::ASC) Order by the auth_Twitter column
 * @method     ChildMainUserQuery orderByAuthYahoo($order = Criteria::ASC) Order by the auth_Yahoo column
 * @method     ChildMainUserQuery orderByAuthLinkedin($order = Criteria::ASC) Order by the auth_LinkedIn column
 * @method     ChildMainUserQuery orderByAuthMyspace($order = Criteria::ASC) Order by the auth_MySpace column
 * @method     ChildMainUserQuery orderByAuthFoursquare($order = Criteria::ASC) Order by the auth_Foursquare column
 * @method     ChildMainUserQuery orderByAuthAol($order = Criteria::ASC) Order by the auth_AOL column
 * @method     ChildMainUserQuery orderByAuthLive($order = Criteria::ASC) Order by the auth_Live column
 *
 * @method     ChildMainUserQuery groupByUserId() Group by the user_id column
 * @method     ChildMainUserQuery groupByUserName() Group by the user_name column
 * @method     ChildMainUserQuery groupByEmail() Group by the email column
 * @method     ChildMainUserQuery groupByPassword() Group by the password column
 * @method     ChildMainUserQuery groupByActivationCode() Group by the activation_code column
 * @method     ChildMainUserQuery groupByRealName() Group by the real_name column
 * @method     ChildMainUserQuery groupByActive() Group by the active column
 * @method     ChildMainUserQuery groupByAuthOpenid() Group by the auth_OpenID column
 * @method     ChildMainUserQuery groupByAuthFacebook() Group by the auth_Facebook column
 * @method     ChildMainUserQuery groupByAuthTwitter() Group by the auth_Twitter column
 * @method     ChildMainUserQuery groupByAuthYahoo() Group by the auth_Yahoo column
 * @method     ChildMainUserQuery groupByAuthLinkedin() Group by the auth_LinkedIn column
 * @method     ChildMainUserQuery groupByAuthMyspace() Group by the auth_MySpace column
 * @method     ChildMainUserQuery groupByAuthFoursquare() Group by the auth_Foursquare column
 * @method     ChildMainUserQuery groupByAuthAol() Group by the auth_AOL column
 * @method     ChildMainUserQuery groupByAuthLive() Group by the auth_Live column
 *
 * @method     ChildMainUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMainUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMainUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMainUserQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMainUserQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMainUserQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMainUser findOne(ConnectionInterface $con = null) Return the first ChildMainUser matching the query
 * @method     ChildMainUser findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMainUser matching the query, or a new ChildMainUser object populated from the query conditions when no match is found
 *
 * @method     ChildMainUser findOneByUserId(int $user_id) Return the first ChildMainUser filtered by the user_id column
 * @method     ChildMainUser findOneByUserName(string $user_name) Return the first ChildMainUser filtered by the user_name column
 * @method     ChildMainUser findOneByEmail(string $email) Return the first ChildMainUser filtered by the email column
 * @method     ChildMainUser findOneByPassword(string $password) Return the first ChildMainUser filtered by the password column
 * @method     ChildMainUser findOneByActivationCode(string $activation_code) Return the first ChildMainUser filtered by the activation_code column
 * @method     ChildMainUser findOneByRealName(string $real_name) Return the first ChildMainUser filtered by the real_name column
 * @method     ChildMainUser findOneByActive(int $active) Return the first ChildMainUser filtered by the active column
 * @method     ChildMainUser findOneByAuthOpenid(string $auth_OpenID) Return the first ChildMainUser filtered by the auth_OpenID column
 * @method     ChildMainUser findOneByAuthFacebook(string $auth_Facebook) Return the first ChildMainUser filtered by the auth_Facebook column
 * @method     ChildMainUser findOneByAuthTwitter(string $auth_Twitter) Return the first ChildMainUser filtered by the auth_Twitter column
 * @method     ChildMainUser findOneByAuthYahoo(string $auth_Yahoo) Return the first ChildMainUser filtered by the auth_Yahoo column
 * @method     ChildMainUser findOneByAuthLinkedin(string $auth_LinkedIn) Return the first ChildMainUser filtered by the auth_LinkedIn column
 * @method     ChildMainUser findOneByAuthMyspace(string $auth_MySpace) Return the first ChildMainUser filtered by the auth_MySpace column
 * @method     ChildMainUser findOneByAuthFoursquare(string $auth_Foursquare) Return the first ChildMainUser filtered by the auth_Foursquare column
 * @method     ChildMainUser findOneByAuthAol(string $auth_AOL) Return the first ChildMainUser filtered by the auth_AOL column
 * @method     ChildMainUser findOneByAuthLive(string $auth_Live) Return the first ChildMainUser filtered by the auth_Live column *

 * @method     ChildMainUser requirePk($key, ConnectionInterface $con = null) Return the ChildMainUser by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOne(ConnectionInterface $con = null) Return the first ChildMainUser matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainUser requireOneByUserId(int $user_id) Return the first ChildMainUser filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByUserName(string $user_name) Return the first ChildMainUser filtered by the user_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByEmail(string $email) Return the first ChildMainUser filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByPassword(string $password) Return the first ChildMainUser filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByActivationCode(string $activation_code) Return the first ChildMainUser filtered by the activation_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByRealName(string $real_name) Return the first ChildMainUser filtered by the real_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByActive(int $active) Return the first ChildMainUser filtered by the active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByAuthOpenid(string $auth_OpenID) Return the first ChildMainUser filtered by the auth_OpenID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByAuthFacebook(string $auth_Facebook) Return the first ChildMainUser filtered by the auth_Facebook column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByAuthTwitter(string $auth_Twitter) Return the first ChildMainUser filtered by the auth_Twitter column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByAuthYahoo(string $auth_Yahoo) Return the first ChildMainUser filtered by the auth_Yahoo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByAuthLinkedin(string $auth_LinkedIn) Return the first ChildMainUser filtered by the auth_LinkedIn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByAuthMyspace(string $auth_MySpace) Return the first ChildMainUser filtered by the auth_MySpace column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByAuthFoursquare(string $auth_Foursquare) Return the first ChildMainUser filtered by the auth_Foursquare column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByAuthAol(string $auth_AOL) Return the first ChildMainUser filtered by the auth_AOL column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainUser requireOneByAuthLive(string $auth_Live) Return the first ChildMainUser filtered by the auth_Live column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainUser[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMainUser objects based on current ModelCriteria
 * @method     ChildMainUser[]|ObjectCollection findByUserId(int $user_id) Return ChildMainUser objects filtered by the user_id column
 * @method     ChildMainUser[]|ObjectCollection findByUserName(string $user_name) Return ChildMainUser objects filtered by the user_name column
 * @method     ChildMainUser[]|ObjectCollection findByEmail(string $email) Return ChildMainUser objects filtered by the email column
 * @method     ChildMainUser[]|ObjectCollection findByPassword(string $password) Return ChildMainUser objects filtered by the password column
 * @method     ChildMainUser[]|ObjectCollection findByActivationCode(string $activation_code) Return ChildMainUser objects filtered by the activation_code column
 * @method     ChildMainUser[]|ObjectCollection findByRealName(string $real_name) Return ChildMainUser objects filtered by the real_name column
 * @method     ChildMainUser[]|ObjectCollection findByActive(int $active) Return ChildMainUser objects filtered by the active column
 * @method     ChildMainUser[]|ObjectCollection findByAuthOpenid(string $auth_OpenID) Return ChildMainUser objects filtered by the auth_OpenID column
 * @method     ChildMainUser[]|ObjectCollection findByAuthFacebook(string $auth_Facebook) Return ChildMainUser objects filtered by the auth_Facebook column
 * @method     ChildMainUser[]|ObjectCollection findByAuthTwitter(string $auth_Twitter) Return ChildMainUser objects filtered by the auth_Twitter column
 * @method     ChildMainUser[]|ObjectCollection findByAuthYahoo(string $auth_Yahoo) Return ChildMainUser objects filtered by the auth_Yahoo column
 * @method     ChildMainUser[]|ObjectCollection findByAuthLinkedin(string $auth_LinkedIn) Return ChildMainUser objects filtered by the auth_LinkedIn column
 * @method     ChildMainUser[]|ObjectCollection findByAuthMyspace(string $auth_MySpace) Return ChildMainUser objects filtered by the auth_MySpace column
 * @method     ChildMainUser[]|ObjectCollection findByAuthFoursquare(string $auth_Foursquare) Return ChildMainUser objects filtered by the auth_Foursquare column
 * @method     ChildMainUser[]|ObjectCollection findByAuthAol(string $auth_AOL) Return ChildMainUser objects filtered by the auth_AOL column
 * @method     ChildMainUser[]|ObjectCollection findByAuthLive(string $auth_Live) Return ChildMainUser objects filtered by the auth_Live column
 * @method     ChildMainUser[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MainUserQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MainUserQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MainUser', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMainUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMainUserQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMainUserQuery) {
            return $criteria;
        }
        $query = new ChildMainUserQuery();
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
     * @return ChildMainUser|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MainUserTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MainUserTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMainUser A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT user_id, user_name, email, password, activation_code, real_name, active, auth_OpenID, auth_Facebook, auth_Twitter, auth_Yahoo, auth_LinkedIn, auth_MySpace, auth_Foursquare, auth_AOL, auth_Live FROM main_user WHERE user_id = :p0';
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
            /** @var ChildMainUser $obj */
            $obj = new ChildMainUser();
            $obj->hydrate($row);
            MainUserTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMainUser|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MainUserTableMap::COL_USER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MainUserTableMap::COL_USER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(MainUserTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(MainUserTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the user_name column
     *
     * Example usage:
     * <code>
     * $query->filterByUserName('fooValue');   // WHERE user_name = 'fooValue'
     * $query->filterByUserName('%fooValue%', Criteria::LIKE); // WHERE user_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByUserName($userName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_USER_NAME, $userName, $comparison);
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
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the activation_code column
     *
     * Example usage:
     * <code>
     * $query->filterByActivationCode('fooValue');   // WHERE activation_code = 'fooValue'
     * $query->filterByActivationCode('%fooValue%', Criteria::LIKE); // WHERE activation_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $activationCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByActivationCode($activationCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($activationCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_ACTIVATION_CODE, $activationCode, $comparison);
    }

    /**
     * Filter the query on the real_name column
     *
     * Example usage:
     * <code>
     * $query->filterByRealName('fooValue');   // WHERE real_name = 'fooValue'
     * $query->filterByRealName('%fooValue%', Criteria::LIKE); // WHERE real_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $realName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByRealName($realName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($realName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_REAL_NAME, $realName, $comparison);
    }

    /**
     * Filter the query on the active column
     *
     * Example usage:
     * <code>
     * $query->filterByActive(1234); // WHERE active = 1234
     * $query->filterByActive(array(12, 34)); // WHERE active IN (12, 34)
     * $query->filterByActive(array('min' => 12)); // WHERE active > 12
     * </code>
     *
     * @param     mixed $active The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByActive($active = null, $comparison = null)
    {
        if (is_array($active)) {
            $useMinMax = false;
            if (isset($active['min'])) {
                $this->addUsingAlias(MainUserTableMap::COL_ACTIVE, $active['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($active['max'])) {
                $this->addUsingAlias(MainUserTableMap::COL_ACTIVE, $active['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_ACTIVE, $active, $comparison);
    }

    /**
     * Filter the query on the auth_OpenID column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthOpenid('fooValue');   // WHERE auth_OpenID = 'fooValue'
     * $query->filterByAuthOpenid('%fooValue%', Criteria::LIKE); // WHERE auth_OpenID LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authOpenid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByAuthOpenid($authOpenid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authOpenid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_AUTH_OPENID, $authOpenid, $comparison);
    }

    /**
     * Filter the query on the auth_Facebook column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthFacebook('fooValue');   // WHERE auth_Facebook = 'fooValue'
     * $query->filterByAuthFacebook('%fooValue%', Criteria::LIKE); // WHERE auth_Facebook LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authFacebook The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByAuthFacebook($authFacebook = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authFacebook)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_AUTH_FACEBOOK, $authFacebook, $comparison);
    }

    /**
     * Filter the query on the auth_Twitter column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthTwitter('fooValue');   // WHERE auth_Twitter = 'fooValue'
     * $query->filterByAuthTwitter('%fooValue%', Criteria::LIKE); // WHERE auth_Twitter LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authTwitter The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByAuthTwitter($authTwitter = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authTwitter)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_AUTH_TWITTER, $authTwitter, $comparison);
    }

    /**
     * Filter the query on the auth_Yahoo column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthYahoo('fooValue');   // WHERE auth_Yahoo = 'fooValue'
     * $query->filterByAuthYahoo('%fooValue%', Criteria::LIKE); // WHERE auth_Yahoo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authYahoo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByAuthYahoo($authYahoo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authYahoo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_AUTH_YAHOO, $authYahoo, $comparison);
    }

    /**
     * Filter the query on the auth_LinkedIn column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthLinkedin('fooValue');   // WHERE auth_LinkedIn = 'fooValue'
     * $query->filterByAuthLinkedin('%fooValue%', Criteria::LIKE); // WHERE auth_LinkedIn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authLinkedin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByAuthLinkedin($authLinkedin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authLinkedin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_AUTH_LINKEDIN, $authLinkedin, $comparison);
    }

    /**
     * Filter the query on the auth_MySpace column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthMyspace('fooValue');   // WHERE auth_MySpace = 'fooValue'
     * $query->filterByAuthMyspace('%fooValue%', Criteria::LIKE); // WHERE auth_MySpace LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authMyspace The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByAuthMyspace($authMyspace = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authMyspace)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_AUTH_MYSPACE, $authMyspace, $comparison);
    }

    /**
     * Filter the query on the auth_Foursquare column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthFoursquare('fooValue');   // WHERE auth_Foursquare = 'fooValue'
     * $query->filterByAuthFoursquare('%fooValue%', Criteria::LIKE); // WHERE auth_Foursquare LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authFoursquare The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByAuthFoursquare($authFoursquare = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authFoursquare)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_AUTH_FOURSQUARE, $authFoursquare, $comparison);
    }

    /**
     * Filter the query on the auth_AOL column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthAol('fooValue');   // WHERE auth_AOL = 'fooValue'
     * $query->filterByAuthAol('%fooValue%', Criteria::LIKE); // WHERE auth_AOL LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authAol The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByAuthAol($authAol = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authAol)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_AUTH_AOL, $authAol, $comparison);
    }

    /**
     * Filter the query on the auth_Live column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthLive('fooValue');   // WHERE auth_Live = 'fooValue'
     * $query->filterByAuthLive('%fooValue%', Criteria::LIKE); // WHERE auth_Live LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authLive The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function filterByAuthLive($authLive = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authLive)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainUserTableMap::COL_AUTH_LIVE, $authLive, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMainUser $mainUser Object to remove from the list of results
     *
     * @return $this|ChildMainUserQuery The current query, for fluid interface
     */
    public function prune($mainUser = null)
    {
        if ($mainUser) {
            $this->addUsingAlias(MainUserTableMap::COL_USER_ID, $mainUser->getUserId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the main_user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainUserTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MainUserTableMap::clearInstancePool();
            MainUserTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MainUserTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MainUserTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MainUserTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MainUserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MainUserQuery
