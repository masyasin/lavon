<?php

namespace Base;

use \MainNavigation as ChildMainNavigation;
use \MainNavigationQuery as ChildMainNavigationQuery;
use \Exception;
use \PDO;
use Map\MainNavigationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'main_navigation' table.
 *
 *
 *
 * @method     ChildMainNavigationQuery orderByNavigationId($order = Criteria::ASC) Order by the navigation_id column
 * @method     ChildMainNavigationQuery orderByNavigationName($order = Criteria::ASC) Order by the navigation_name column
 * @method     ChildMainNavigationQuery orderByParentId($order = Criteria::ASC) Order by the parent_id column
 * @method     ChildMainNavigationQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildMainNavigationQuery orderByBootstrapGlyph($order = Criteria::ASC) Order by the bootstrap_glyph column
 * @method     ChildMainNavigationQuery orderByPageTitle($order = Criteria::ASC) Order by the page_title column
 * @method     ChildMainNavigationQuery orderByPageKeyword($order = Criteria::ASC) Order by the page_keyword column
 * @method     ChildMainNavigationQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildMainNavigationQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildMainNavigationQuery orderByAuthorizationId($order = Criteria::ASC) Order by the authorization_id column
 * @method     ChildMainNavigationQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     ChildMainNavigationQuery orderByIndex($order = Criteria::ASC) Order by the index column
 * @method     ChildMainNavigationQuery orderByIsStatic($order = Criteria::ASC) Order by the is_static column
 * @method     ChildMainNavigationQuery orderByStaticContent($order = Criteria::ASC) Order by the static_content column
 * @method     ChildMainNavigationQuery orderByOnlyContent($order = Criteria::ASC) Order by the only_content column
 * @method     ChildMainNavigationQuery orderByDefaultTheme($order = Criteria::ASC) Order by the default_theme column
 * @method     ChildMainNavigationQuery orderByDefaultLayout($order = Criteria::ASC) Order by the default_layout column
 *
 * @method     ChildMainNavigationQuery groupByNavigationId() Group by the navigation_id column
 * @method     ChildMainNavigationQuery groupByNavigationName() Group by the navigation_name column
 * @method     ChildMainNavigationQuery groupByParentId() Group by the parent_id column
 * @method     ChildMainNavigationQuery groupByTitle() Group by the title column
 * @method     ChildMainNavigationQuery groupByBootstrapGlyph() Group by the bootstrap_glyph column
 * @method     ChildMainNavigationQuery groupByPageTitle() Group by the page_title column
 * @method     ChildMainNavigationQuery groupByPageKeyword() Group by the page_keyword column
 * @method     ChildMainNavigationQuery groupByDescription() Group by the description column
 * @method     ChildMainNavigationQuery groupByUrl() Group by the url column
 * @method     ChildMainNavigationQuery groupByAuthorizationId() Group by the authorization_id column
 * @method     ChildMainNavigationQuery groupByActive() Group by the active column
 * @method     ChildMainNavigationQuery groupByIndex() Group by the index column
 * @method     ChildMainNavigationQuery groupByIsStatic() Group by the is_static column
 * @method     ChildMainNavigationQuery groupByStaticContent() Group by the static_content column
 * @method     ChildMainNavigationQuery groupByOnlyContent() Group by the only_content column
 * @method     ChildMainNavigationQuery groupByDefaultTheme() Group by the default_theme column
 * @method     ChildMainNavigationQuery groupByDefaultLayout() Group by the default_layout column
 *
 * @method     ChildMainNavigationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMainNavigationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMainNavigationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMainNavigationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMainNavigationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMainNavigationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMainNavigation findOne(ConnectionInterface $con = null) Return the first ChildMainNavigation matching the query
 * @method     ChildMainNavigation findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMainNavigation matching the query, or a new ChildMainNavigation object populated from the query conditions when no match is found
 *
 * @method     ChildMainNavigation findOneByNavigationId(int $navigation_id) Return the first ChildMainNavigation filtered by the navigation_id column
 * @method     ChildMainNavigation findOneByNavigationName(string $navigation_name) Return the first ChildMainNavigation filtered by the navigation_name column
 * @method     ChildMainNavigation findOneByParentId(int $parent_id) Return the first ChildMainNavigation filtered by the parent_id column
 * @method     ChildMainNavigation findOneByTitle(string $title) Return the first ChildMainNavigation filtered by the title column
 * @method     ChildMainNavigation findOneByBootstrapGlyph(string $bootstrap_glyph) Return the first ChildMainNavigation filtered by the bootstrap_glyph column
 * @method     ChildMainNavigation findOneByPageTitle(string $page_title) Return the first ChildMainNavigation filtered by the page_title column
 * @method     ChildMainNavigation findOneByPageKeyword(string $page_keyword) Return the first ChildMainNavigation filtered by the page_keyword column
 * @method     ChildMainNavigation findOneByDescription(string $description) Return the first ChildMainNavigation filtered by the description column
 * @method     ChildMainNavigation findOneByUrl(string $url) Return the first ChildMainNavigation filtered by the url column
 * @method     ChildMainNavigation findOneByAuthorizationId(int $authorization_id) Return the first ChildMainNavigation filtered by the authorization_id column
 * @method     ChildMainNavigation findOneByActive(int $active) Return the first ChildMainNavigation filtered by the active column
 * @method     ChildMainNavigation findOneByIndex(int $index) Return the first ChildMainNavigation filtered by the index column
 * @method     ChildMainNavigation findOneByIsStatic(int $is_static) Return the first ChildMainNavigation filtered by the is_static column
 * @method     ChildMainNavigation findOneByStaticContent(string $static_content) Return the first ChildMainNavigation filtered by the static_content column
 * @method     ChildMainNavigation findOneByOnlyContent(int $only_content) Return the first ChildMainNavigation filtered by the only_content column
 * @method     ChildMainNavigation findOneByDefaultTheme(string $default_theme) Return the first ChildMainNavigation filtered by the default_theme column
 * @method     ChildMainNavigation findOneByDefaultLayout(string $default_layout) Return the first ChildMainNavigation filtered by the default_layout column *

 * @method     ChildMainNavigation requirePk($key, ConnectionInterface $con = null) Return the ChildMainNavigation by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOne(ConnectionInterface $con = null) Return the first ChildMainNavigation matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainNavigation requireOneByNavigationId(int $navigation_id) Return the first ChildMainNavigation filtered by the navigation_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByNavigationName(string $navigation_name) Return the first ChildMainNavigation filtered by the navigation_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByParentId(int $parent_id) Return the first ChildMainNavigation filtered by the parent_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByTitle(string $title) Return the first ChildMainNavigation filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByBootstrapGlyph(string $bootstrap_glyph) Return the first ChildMainNavigation filtered by the bootstrap_glyph column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByPageTitle(string $page_title) Return the first ChildMainNavigation filtered by the page_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByPageKeyword(string $page_keyword) Return the first ChildMainNavigation filtered by the page_keyword column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByDescription(string $description) Return the first ChildMainNavigation filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByUrl(string $url) Return the first ChildMainNavigation filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByAuthorizationId(int $authorization_id) Return the first ChildMainNavigation filtered by the authorization_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByActive(int $active) Return the first ChildMainNavigation filtered by the active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByIndex(int $index) Return the first ChildMainNavigation filtered by the index column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByIsStatic(int $is_static) Return the first ChildMainNavigation filtered by the is_static column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByStaticContent(string $static_content) Return the first ChildMainNavigation filtered by the static_content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByOnlyContent(int $only_content) Return the first ChildMainNavigation filtered by the only_content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByDefaultTheme(string $default_theme) Return the first ChildMainNavigation filtered by the default_theme column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMainNavigation requireOneByDefaultLayout(string $default_layout) Return the first ChildMainNavigation filtered by the default_layout column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMainNavigation[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMainNavigation objects based on current ModelCriteria
 * @method     ChildMainNavigation[]|ObjectCollection findByNavigationId(int $navigation_id) Return ChildMainNavigation objects filtered by the navigation_id column
 * @method     ChildMainNavigation[]|ObjectCollection findByNavigationName(string $navigation_name) Return ChildMainNavigation objects filtered by the navigation_name column
 * @method     ChildMainNavigation[]|ObjectCollection findByParentId(int $parent_id) Return ChildMainNavigation objects filtered by the parent_id column
 * @method     ChildMainNavigation[]|ObjectCollection findByTitle(string $title) Return ChildMainNavigation objects filtered by the title column
 * @method     ChildMainNavigation[]|ObjectCollection findByBootstrapGlyph(string $bootstrap_glyph) Return ChildMainNavigation objects filtered by the bootstrap_glyph column
 * @method     ChildMainNavigation[]|ObjectCollection findByPageTitle(string $page_title) Return ChildMainNavigation objects filtered by the page_title column
 * @method     ChildMainNavigation[]|ObjectCollection findByPageKeyword(string $page_keyword) Return ChildMainNavigation objects filtered by the page_keyword column
 * @method     ChildMainNavigation[]|ObjectCollection findByDescription(string $description) Return ChildMainNavigation objects filtered by the description column
 * @method     ChildMainNavigation[]|ObjectCollection findByUrl(string $url) Return ChildMainNavigation objects filtered by the url column
 * @method     ChildMainNavigation[]|ObjectCollection findByAuthorizationId(int $authorization_id) Return ChildMainNavigation objects filtered by the authorization_id column
 * @method     ChildMainNavigation[]|ObjectCollection findByActive(int $active) Return ChildMainNavigation objects filtered by the active column
 * @method     ChildMainNavigation[]|ObjectCollection findByIndex(int $index) Return ChildMainNavigation objects filtered by the index column
 * @method     ChildMainNavigation[]|ObjectCollection findByIsStatic(int $is_static) Return ChildMainNavigation objects filtered by the is_static column
 * @method     ChildMainNavigation[]|ObjectCollection findByStaticContent(string $static_content) Return ChildMainNavigation objects filtered by the static_content column
 * @method     ChildMainNavigation[]|ObjectCollection findByOnlyContent(int $only_content) Return ChildMainNavigation objects filtered by the only_content column
 * @method     ChildMainNavigation[]|ObjectCollection findByDefaultTheme(string $default_theme) Return ChildMainNavigation objects filtered by the default_theme column
 * @method     ChildMainNavigation[]|ObjectCollection findByDefaultLayout(string $default_layout) Return ChildMainNavigation objects filtered by the default_layout column
 * @method     ChildMainNavigation[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MainNavigationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MainNavigationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MainNavigation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMainNavigationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMainNavigationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMainNavigationQuery) {
            return $criteria;
        }
        $query = new ChildMainNavigationQuery();
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
     * @return ChildMainNavigation|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MainNavigationTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MainNavigationTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMainNavigation A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT navigation_id, navigation_name, parent_id, title, bootstrap_glyph, page_title, page_keyword, description, url, authorization_id, active, index, is_static, static_content, only_content, default_theme, default_layout FROM main_navigation WHERE navigation_id = :p0';
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
            /** @var ChildMainNavigation $obj */
            $obj = new ChildMainNavigation();
            $obj->hydrate($row);
            MainNavigationTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMainNavigation|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MainNavigationTableMap::COL_NAVIGATION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MainNavigationTableMap::COL_NAVIGATION_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the navigation_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNavigationId(1234); // WHERE navigation_id = 1234
     * $query->filterByNavigationId(array(12, 34)); // WHERE navigation_id IN (12, 34)
     * $query->filterByNavigationId(array('min' => 12)); // WHERE navigation_id > 12
     * </code>
     *
     * @param     mixed $navigationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByNavigationId($navigationId = null, $comparison = null)
    {
        if (is_array($navigationId)) {
            $useMinMax = false;
            if (isset($navigationId['min'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_NAVIGATION_ID, $navigationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($navigationId['max'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_NAVIGATION_ID, $navigationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_NAVIGATION_ID, $navigationId, $comparison);
    }

    /**
     * Filter the query on the navigation_name column
     *
     * Example usage:
     * <code>
     * $query->filterByNavigationName('fooValue');   // WHERE navigation_name = 'fooValue'
     * $query->filterByNavigationName('%fooValue%', Criteria::LIKE); // WHERE navigation_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $navigationName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByNavigationName($navigationName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($navigationName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_NAVIGATION_NAME, $navigationName, $comparison);
    }

    /**
     * Filter the query on the parent_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentId(1234); // WHERE parent_id = 1234
     * $query->filterByParentId(array(12, 34)); // WHERE parent_id IN (12, 34)
     * $query->filterByParentId(array('min' => 12)); // WHERE parent_id > 12
     * </code>
     *
     * @param     mixed $parentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByParentId($parentId = null, $comparison = null)
    {
        if (is_array($parentId)) {
            $useMinMax = false;
            if (isset($parentId['min'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_PARENT_ID, $parentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentId['max'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_PARENT_ID, $parentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_PARENT_ID, $parentId, $comparison);
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
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the bootstrap_glyph column
     *
     * Example usage:
     * <code>
     * $query->filterByBootstrapGlyph('fooValue');   // WHERE bootstrap_glyph = 'fooValue'
     * $query->filterByBootstrapGlyph('%fooValue%', Criteria::LIKE); // WHERE bootstrap_glyph LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bootstrapGlyph The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByBootstrapGlyph($bootstrapGlyph = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bootstrapGlyph)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_BOOTSTRAP_GLYPH, $bootstrapGlyph, $comparison);
    }

    /**
     * Filter the query on the page_title column
     *
     * Example usage:
     * <code>
     * $query->filterByPageTitle('fooValue');   // WHERE page_title = 'fooValue'
     * $query->filterByPageTitle('%fooValue%', Criteria::LIKE); // WHERE page_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pageTitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByPageTitle($pageTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pageTitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_PAGE_TITLE, $pageTitle, $comparison);
    }

    /**
     * Filter the query on the page_keyword column
     *
     * Example usage:
     * <code>
     * $query->filterByPageKeyword('fooValue');   // WHERE page_keyword = 'fooValue'
     * $query->filterByPageKeyword('%fooValue%', Criteria::LIKE); // WHERE page_keyword LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pageKeyword The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByPageKeyword($pageKeyword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pageKeyword)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_PAGE_KEYWORD, $pageKeyword, $comparison);
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
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_URL, $url, $comparison);
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
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByAuthorizationId($authorizationId = null, $comparison = null)
    {
        if (is_array($authorizationId)) {
            $useMinMax = false;
            if (isset($authorizationId['min'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_AUTHORIZATION_ID, $authorizationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($authorizationId['max'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_AUTHORIZATION_ID, $authorizationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_AUTHORIZATION_ID, $authorizationId, $comparison);
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
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByActive($active = null, $comparison = null)
    {
        if (is_array($active)) {
            $useMinMax = false;
            if (isset($active['min'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_ACTIVE, $active['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($active['max'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_ACTIVE, $active['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_ACTIVE, $active, $comparison);
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
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByIndex($index = null, $comparison = null)
    {
        if (is_array($index)) {
            $useMinMax = false;
            if (isset($index['min'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_INDEX, $index['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($index['max'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_INDEX, $index['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_INDEX, $index, $comparison);
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
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByIsStatic($isStatic = null, $comparison = null)
    {
        if (is_array($isStatic)) {
            $useMinMax = false;
            if (isset($isStatic['min'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_IS_STATIC, $isStatic['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isStatic['max'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_IS_STATIC, $isStatic['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_IS_STATIC, $isStatic, $comparison);
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
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByStaticContent($staticContent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($staticContent)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_STATIC_CONTENT, $staticContent, $comparison);
    }

    /**
     * Filter the query on the only_content column
     *
     * Example usage:
     * <code>
     * $query->filterByOnlyContent(1234); // WHERE only_content = 1234
     * $query->filterByOnlyContent(array(12, 34)); // WHERE only_content IN (12, 34)
     * $query->filterByOnlyContent(array('min' => 12)); // WHERE only_content > 12
     * </code>
     *
     * @param     mixed $onlyContent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByOnlyContent($onlyContent = null, $comparison = null)
    {
        if (is_array($onlyContent)) {
            $useMinMax = false;
            if (isset($onlyContent['min'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_ONLY_CONTENT, $onlyContent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($onlyContent['max'])) {
                $this->addUsingAlias(MainNavigationTableMap::COL_ONLY_CONTENT, $onlyContent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_ONLY_CONTENT, $onlyContent, $comparison);
    }

    /**
     * Filter the query on the default_theme column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultTheme('fooValue');   // WHERE default_theme = 'fooValue'
     * $query->filterByDefaultTheme('%fooValue%', Criteria::LIKE); // WHERE default_theme LIKE '%fooValue%'
     * </code>
     *
     * @param     string $defaultTheme The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByDefaultTheme($defaultTheme = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($defaultTheme)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_DEFAULT_THEME, $defaultTheme, $comparison);
    }

    /**
     * Filter the query on the default_layout column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultLayout('fooValue');   // WHERE default_layout = 'fooValue'
     * $query->filterByDefaultLayout('%fooValue%', Criteria::LIKE); // WHERE default_layout LIKE '%fooValue%'
     * </code>
     *
     * @param     string $defaultLayout The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function filterByDefaultLayout($defaultLayout = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($defaultLayout)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MainNavigationTableMap::COL_DEFAULT_LAYOUT, $defaultLayout, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMainNavigation $mainNavigation Object to remove from the list of results
     *
     * @return $this|ChildMainNavigationQuery The current query, for fluid interface
     */
    public function prune($mainNavigation = null)
    {
        if ($mainNavigation) {
            $this->addUsingAlias(MainNavigationTableMap::COL_NAVIGATION_ID, $mainNavigation->getNavigationId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the main_navigation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainNavigationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MainNavigationTableMap::clearInstancePool();
            MainNavigationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MainNavigationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MainNavigationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MainNavigationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MainNavigationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MainNavigationQuery
