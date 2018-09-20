<?php

namespace Base;

use \MainWidget as ChildMainWidget;
use \MainWidgetQuery as ChildMainWidgetQuery;
use \Exception;
use \PDO;
use Map\MainWidgetTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'main_widget' table.
 *
 *
 *
 * @method     ChildMainWidgetQuery orderByWidgetId($order = Criteria::ASC) Order by the widget_id column
 * @method     ChildMainWidgetQuery orderByWidgetName($order = Criteria::ASC) Order by the widget_name column
 * @method     ChildMainWidgetQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildMainWidgetQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildMainWidgetQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildMainWidgetQuery orderByAuthorizationId($order = Criteria::ASC) Order by the authorization_id column
 * @method     ChildMainWidgetQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     ChildMainWidgetQuery orderByIndex($order = Criteria::ASC) Order by the index column
 * @method     ChildMainWidgetQuery orderByIsStatic($order = Criteria::ASC) Order by the is_static column
 * @method     ChildMainWidgetQuery orderByStaticContent($order = Criteria::ASC) Order by the static_content column
 * @method     ChildMainWidgetQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 *
 * @method     ChildMainWidgetQuery groupByWidgetId() Group by the widget_id column
 * @method     ChildMainWidgetQuery groupByWidgetName() Group by the widget_name column
 * @method     ChildMainWidgetQuery groupByTitle() Group by the title column
 * @method     ChildMainWidgetQuery groupByDescription() Group by the description column
 * @method     ChildMainWidgetQuery groupByUrl() Group by the url column
 * @method     ChildMainWidgetQuery groupByAuthorizationId() Group by the authorization_id column
 * @method     ChildMainWidgetQuery groupByActive() Group by the active column
 * @method     ChildMainWidgetQuery groupByIndex() Group by the index column
 * @method     ChildMainWidgetQuery groupByIsStatic() Group by the is_static column
 * @method     ChildMainWidgetQuery groupByStaticContent() Group by the static_content column
 * @method     ChildMainWidgetQuery groupBySlug() Group by the slug column
 *
 * @method     ChildMainWidgetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMainWidgetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMainWidgetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMainWidgetQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMainWidgetQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMainWidgetQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMainWidget findOne(ConnectionInterface $con = null) Return the first ChildMainWidget matching the query
 * @method     ChildMainWidget findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMainWidget matching the query, or a new ChildMainWidget object populated from the query conditions when no match is found
 *
 * @method     ChildMainWidget findOneByWidgetId(int $widget_id) Return the first ChildMainWidget filtered by the widget_id column
 * @method     ChildMainWidget findOneByWidgetName(string $widget_name) Return the first ChildMainWidget filtered by the widget_name column
 * @method     ChildMainWidget findOneByTitle(string $title) Return the first ChildMainWidget filtered by the title column
 * @method     ChildMainWidget findOneByDescription(string $description) Return the first ChildMainWidget filtered by the description column
 * @method     ChildMainWidget findOneByUrl(string $url) Return the first ChildMainWidget filtered by the url column
 * @method     ChildMainWidget findOneByAuthorizationId(int $authorization_id) Return the first ChildMainWidget filtered by the authorization_id column
 * @method     ChildMainWidget findOneByActive(int $active) Return the first ChildMainWidget filtered by the active column
 * @method     ChildMainWidget findOneByIndex(int $index) Return the first ChildMainWidget filtered by the index column
 * @method     ChildMainWidget findOneByIsStatic(int $is_static) Return the first ChildMainWidget filtered by the is_static column
 * @method     ChildMainWidget findOneByStaticContent(string $static_content) Return the first ChildMainWidget filtered by the static_content column
 * @method     ChildMainWidget findOneBySlug(string $slug) Return the first ChildMainWidget filtered by the slug column *

 * @method     ChildMainWidget requirePk($key, ConnectionInterface $con = null) Return the ChildMainWidget by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainWidget requireOne(ConnectionInterface $con = null) Return the first ChildMainWidget matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainWidget requireOneByWidgetId(int $widget_id) Return the first ChildMainWidget filtered by the widget_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainWidget requireOneByWidgetName(string $widget_name) Return the first ChildMainWidget filtered by the widget_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainWidget requireOneByTitle(string $title) Return the first ChildMainWidget filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainWidget requireOneByDescription(string $description) Return the first ChildMainWidget filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainWidget requireOneByUrl(string $url) Return the first ChildMainWidget filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainWidget requireOneByAuthorizationId(int $authorization_id) Return the first ChildMainWidget filtered by the authorization_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainWidget requireOneByActive(int $active) Return the first ChildMainWidget filtered by the active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainWidget requireOneByIndex(int $index) Return the first ChildMainWidget filtered by the index column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainWidget requireOneByIsStatic(int $is_static) Return the first ChildMainWidget filtered by the is_static column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainWidget requireOneByStaticContent(string $static_content) Return the first ChildMainWidget filtered by the static_content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainWidget requireOneBySlug(string $slug) Return the first ChildMainWidget filtered by the slug column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainWidget[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMainWidget objects based on current ModelCriteria
 * @method     ChildMainWidget[]|ObjectCollection findByWidgetId(int $widget_id) Return ChildMainWidget objects filtered by the widget_id column
 * @method     ChildMainWidget[]|ObjectCollection findByWidgetName(string $widget_name) Return ChildMainWidget objects filtered by the widget_name column
 * @method     ChildMainWidget[]|ObjectCollection findByTitle(string $title) Return ChildMainWidget objects filtered by the title column
 * @method     ChildMainWidget[]|ObjectCollection findByDescription(string $description) Return ChildMainWidget objects filtered by the description column
 * @method     ChildMainWidget[]|ObjectCollection findByUrl(string $url) Return ChildMainWidget objects filtered by the url column
 * @method     ChildMainWidget[]|ObjectCollection findByAuthorizationId(int $authorization_id) Return ChildMainWidget objects filtered by the authorization_id column
 * @method     ChildMainWidget[]|ObjectCollection findByActive(int $active) Return ChildMainWidget objects filtered by the active column
 * @method     ChildMainWidget[]|ObjectCollection findByIndex(int $index) Return ChildMainWidget objects filtered by the index column
 * @method     ChildMainWidget[]|ObjectCollection findByIsStatic(int $is_static) Return ChildMainWidget objects filtered by the is_static column
 * @method     ChildMainWidget[]|ObjectCollection findByStaticContent(string $static_content) Return ChildMainWidget objects filtered by the static_content column
 * @method     ChildMainWidget[]|ObjectCollection findBySlug(string $slug) Return ChildMainWidget objects filtered by the slug column
 * @method     ChildMainWidget[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MainWidgetQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MainWidgetQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MainWidget', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMainWidgetQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMainWidgetQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMainWidgetQuery) {
            return $criteria;
        }
        $query = new ChildMainWidgetQuery();
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
     * @return ChildMainWidget|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MainWidgetTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MainWidgetTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMainWidget A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT widget_id, widget_name, title, description, url, authorization_id, active, index, is_static, static_content, slug FROM main_widget WHERE widget_id = :p0';
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
            /** @var ChildMainWidget $obj */
            $obj = new ChildMainWidget();
            $obj->hydrate($row);
            MainWidgetTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMainWidget|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MainWidgetTableMap::COL_WIDGET_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MainWidgetTableMap::COL_WIDGET_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the widget_id column
     *
     * Example usage:
     * <code>
     * $query->filterByWidgetId(1234); // WHERE widget_id = 1234
     * $query->filterByWidgetId(array(12, 34)); // WHERE widget_id IN (12, 34)
     * $query->filterByWidgetId(array('min' => 12)); // WHERE widget_id > 12
     * </code>
     *
     * @param     mixed $widgetId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function filterByWidgetId($widgetId = null, $comparison = null)
    {
        if (is_array($widgetId)) {
            $useMinMax = false;
            if (isset($widgetId['min'])) {
                $this->addUsingAlias(MainWidgetTableMap::COL_WIDGET_ID, $widgetId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($widgetId['max'])) {
                $this->addUsingAlias(MainWidgetTableMap::COL_WIDGET_ID, $widgetId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainWidgetTableMap::COL_WIDGET_ID, $widgetId, $comparison);
    }

    /**
     * Filter the query on the widget_name column
     *
     * Example usage:
     * <code>
     * $query->filterByWidgetName('fooValue');   // WHERE widget_name = 'fooValue'
     * $query->filterByWidgetName('%fooValue%', Criteria::LIKE); // WHERE widget_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $widgetName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function filterByWidgetName($widgetName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($widgetName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainWidgetTableMap::COL_WIDGET_NAME, $widgetName, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainWidgetTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainWidgetTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainWidgetTableMap::COL_URL, $url, $comparison);
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
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function filterByAuthorizationId($authorizationId = null, $comparison = null)
    {
        if (is_array($authorizationId)) {
            $useMinMax = false;
            if (isset($authorizationId['min'])) {
                $this->addUsingAlias(MainWidgetTableMap::COL_AUTHORIZATION_ID, $authorizationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($authorizationId['max'])) {
                $this->addUsingAlias(MainWidgetTableMap::COL_AUTHORIZATION_ID, $authorizationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainWidgetTableMap::COL_AUTHORIZATION_ID, $authorizationId, $comparison);
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
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function filterByActive($active = null, $comparison = null)
    {
        if (is_array($active)) {
            $useMinMax = false;
            if (isset($active['min'])) {
                $this->addUsingAlias(MainWidgetTableMap::COL_ACTIVE, $active['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($active['max'])) {
                $this->addUsingAlias(MainWidgetTableMap::COL_ACTIVE, $active['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainWidgetTableMap::COL_ACTIVE, $active, $comparison);
    }

    /**
     * Filter the query on the index column
     *
     * Example usage:
     * <code>
     * $query->filterByIndex(1234); // WHERE index = 1234
     * $query->filterByIndex(array(12, 34)); // WHERE index IN (12, 34)
     * $query->filterByIndex(array('min' => 12)); // WHERE index > 12
     * </code>
     *
     * @param     mixed $index The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function filterByIndex($index = null, $comparison = null)
    {
        if (is_array($index)) {
            $useMinMax = false;
            if (isset($index['min'])) {
                $this->addUsingAlias(MainWidgetTableMap::COL_INDEX, $index['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($index['max'])) {
                $this->addUsingAlias(MainWidgetTableMap::COL_INDEX, $index['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainWidgetTableMap::COL_INDEX, $index, $comparison);
    }

    /**
     * Filter the query on the is_static column
     *
     * Example usage:
     * <code>
     * $query->filterByIsStatic(1234); // WHERE is_static = 1234
     * $query->filterByIsStatic(array(12, 34)); // WHERE is_static IN (12, 34)
     * $query->filterByIsStatic(array('min' => 12)); // WHERE is_static > 12
     * </code>
     *
     * @param     mixed $isStatic The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function filterByIsStatic($isStatic = null, $comparison = null)
    {
        if (is_array($isStatic)) {
            $useMinMax = false;
            if (isset($isStatic['min'])) {
                $this->addUsingAlias(MainWidgetTableMap::COL_IS_STATIC, $isStatic['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isStatic['max'])) {
                $this->addUsingAlias(MainWidgetTableMap::COL_IS_STATIC, $isStatic['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainWidgetTableMap::COL_IS_STATIC, $isStatic, $comparison);
    }

    /**
     * Filter the query on the static_content column
     *
     * Example usage:
     * <code>
     * $query->filterByStaticContent('fooValue');   // WHERE static_content = 'fooValue'
     * $query->filterByStaticContent('%fooValue%', Criteria::LIKE); // WHERE static_content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $staticContent The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function filterByStaticContent($staticContent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($staticContent)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainWidgetTableMap::COL_STATIC_CONTENT, $staticContent, $comparison);
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
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function filterBySlug($slug = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slug)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainWidgetTableMap::COL_SLUG, $slug, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMainWidget $mainWidget Object to remove from the list of results
     *
     * @return $this|ChildMainWidgetQuery The current query, for fluid interface
     */
    public function prune($mainWidget = null)
    {
        if ($mainWidget) {
            $this->addUsingAlias(MainWidgetTableMap::COL_WIDGET_ID, $mainWidget->getWidgetId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the main_widget table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainWidgetTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MainWidgetTableMap::clearInstancePool();
            MainWidgetTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MainWidgetTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MainWidgetTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MainWidgetTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MainWidgetTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MainWidgetQuery
