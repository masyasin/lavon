<?php

namespace Base;

use \BlogArticle as ChildBlogArticle;
use \BlogArticleQuery as ChildBlogArticleQuery;
use \Exception;
use \PDO;
use Map\BlogArticleTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'blog_article' table.
 *
 *
 *
 * @method     ChildBlogArticleQuery orderByArticleId($order = Criteria::ASC) Order by the article_id column
 * @method     ChildBlogArticleQuery orderByArticleTitle($order = Criteria::ASC) Order by the article_title column
 * @method     ChildBlogArticleQuery orderByArticleUrl($order = Criteria::ASC) Order by the article_url column
 * @method     ChildBlogArticleQuery orderByKeyword($order = Criteria::ASC) Order by the keyword column
 * @method     ChildBlogArticleQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildBlogArticleQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildBlogArticleQuery orderByAuthorUserId($order = Criteria::ASC) Order by the author_user_id column
 * @method     ChildBlogArticleQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     ChildBlogArticleQuery orderByAllowComment($order = Criteria::ASC) Order by the allow_comment column
 * @method     ChildBlogArticleQuery orderByFile($order = Criteria::ASC) Order by the file column
 * @method     ChildBlogArticleQuery orderByView($order = Criteria::ASC) Order by the view column
 * @method     ChildBlogArticleQuery orderByAltImage($order = Criteria::ASC) Order by the alt_image column
 *
 * @method     ChildBlogArticleQuery groupByArticleId() Group by the article_id column
 * @method     ChildBlogArticleQuery groupByArticleTitle() Group by the article_title column
 * @method     ChildBlogArticleQuery groupByArticleUrl() Group by the article_url column
 * @method     ChildBlogArticleQuery groupByKeyword() Group by the keyword column
 * @method     ChildBlogArticleQuery groupByDescription() Group by the description column
 * @method     ChildBlogArticleQuery groupByDate() Group by the date column
 * @method     ChildBlogArticleQuery groupByAuthorUserId() Group by the author_user_id column
 * @method     ChildBlogArticleQuery groupByContent() Group by the content column
 * @method     ChildBlogArticleQuery groupByAllowComment() Group by the allow_comment column
 * @method     ChildBlogArticleQuery groupByFile() Group by the file column
 * @method     ChildBlogArticleQuery groupByView() Group by the view column
 * @method     ChildBlogArticleQuery groupByAltImage() Group by the alt_image column
 *
 * @method     ChildBlogArticleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBlogArticleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBlogArticleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBlogArticleQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBlogArticleQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBlogArticleQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBlogArticleQuery leftJoinBlogCategoryArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the BlogCategoryArticle relation
 * @method     ChildBlogArticleQuery rightJoinBlogCategoryArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BlogCategoryArticle relation
 * @method     ChildBlogArticleQuery innerJoinBlogCategoryArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the BlogCategoryArticle relation
 *
 * @method     ChildBlogArticleQuery joinWithBlogCategoryArticle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the BlogCategoryArticle relation
 *
 * @method     ChildBlogArticleQuery leftJoinWithBlogCategoryArticle() Adds a LEFT JOIN clause and with to the query using the BlogCategoryArticle relation
 * @method     ChildBlogArticleQuery rightJoinWithBlogCategoryArticle() Adds a RIGHT JOIN clause and with to the query using the BlogCategoryArticle relation
 * @method     ChildBlogArticleQuery innerJoinWithBlogCategoryArticle() Adds a INNER JOIN clause and with to the query using the BlogCategoryArticle relation
 *
 * @method     \BlogCategoryArticleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildBlogArticle findOne(ConnectionInterface $con = null) Return the first ChildBlogArticle matching the query
 * @method     ChildBlogArticle findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBlogArticle matching the query, or a new ChildBlogArticle object populated from the query conditions when no match is found
 *
 * @method     ChildBlogArticle findOneByArticleId(int $article_id) Return the first ChildBlogArticle filtered by the article_id column
 * @method     ChildBlogArticle findOneByArticleTitle(string $article_title) Return the first ChildBlogArticle filtered by the article_title column
 * @method     ChildBlogArticle findOneByArticleUrl(string $article_url) Return the first ChildBlogArticle filtered by the article_url column
 * @method     ChildBlogArticle findOneByKeyword(string $keyword) Return the first ChildBlogArticle filtered by the keyword column
 * @method     ChildBlogArticle findOneByDescription(string $description) Return the first ChildBlogArticle filtered by the description column
 * @method     ChildBlogArticle findOneByDate(string $date) Return the first ChildBlogArticle filtered by the date column
 * @method     ChildBlogArticle findOneByAuthorUserId(int $author_user_id) Return the first ChildBlogArticle filtered by the author_user_id column
 * @method     ChildBlogArticle findOneByContent(string $content) Return the first ChildBlogArticle filtered by the content column
 * @method     ChildBlogArticle findOneByAllowComment(int $allow_comment) Return the first ChildBlogArticle filtered by the allow_comment column
 * @method     ChildBlogArticle findOneByFile(string $file) Return the first ChildBlogArticle filtered by the file column
 * @method     ChildBlogArticle findOneByView(int $view) Return the first ChildBlogArticle filtered by the view column
 * @method     ChildBlogArticle findOneByAltImage(string $alt_image) Return the first ChildBlogArticle filtered by the alt_image column *

 * @method     ChildBlogArticle requirePk($key, ConnectionInterface $con = null) Return the ChildBlogArticle by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogArticle requireOne(ConnectionInterface $con = null) Return the first ChildBlogArticle matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBlogArticle requireOneByArticleId(int $article_id) Return the first ChildBlogArticle filtered by the article_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogArticle requireOneByArticleTitle(string $article_title) Return the first ChildBlogArticle filtered by the article_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogArticle requireOneByArticleUrl(string $article_url) Return the first ChildBlogArticle filtered by the article_url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogArticle requireOneByKeyword(string $keyword) Return the first ChildBlogArticle filtered by the keyword column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogArticle requireOneByDescription(string $description) Return the first ChildBlogArticle filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogArticle requireOneByDate(string $date) Return the first ChildBlogArticle filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogArticle requireOneByAuthorUserId(int $author_user_id) Return the first ChildBlogArticle filtered by the author_user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogArticle requireOneByContent(string $content) Return the first ChildBlogArticle filtered by the content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogArticle requireOneByAllowComment(int $allow_comment) Return the first ChildBlogArticle filtered by the allow_comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogArticle requireOneByFile(string $file) Return the first ChildBlogArticle filtered by the file column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogArticle requireOneByView(int $view) Return the first ChildBlogArticle filtered by the view column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogArticle requireOneByAltImage(string $alt_image) Return the first ChildBlogArticle filtered by the alt_image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBlogArticle[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBlogArticle objects based on current ModelCriteria
 * @method     ChildBlogArticle[]|ObjectCollection findByArticleId(int $article_id) Return ChildBlogArticle objects filtered by the article_id column
 * @method     ChildBlogArticle[]|ObjectCollection findByArticleTitle(string $article_title) Return ChildBlogArticle objects filtered by the article_title column
 * @method     ChildBlogArticle[]|ObjectCollection findByArticleUrl(string $article_url) Return ChildBlogArticle objects filtered by the article_url column
 * @method     ChildBlogArticle[]|ObjectCollection findByKeyword(string $keyword) Return ChildBlogArticle objects filtered by the keyword column
 * @method     ChildBlogArticle[]|ObjectCollection findByDescription(string $description) Return ChildBlogArticle objects filtered by the description column
 * @method     ChildBlogArticle[]|ObjectCollection findByDate(string $date) Return ChildBlogArticle objects filtered by the date column
 * @method     ChildBlogArticle[]|ObjectCollection findByAuthorUserId(int $author_user_id) Return ChildBlogArticle objects filtered by the author_user_id column
 * @method     ChildBlogArticle[]|ObjectCollection findByContent(string $content) Return ChildBlogArticle objects filtered by the content column
 * @method     ChildBlogArticle[]|ObjectCollection findByAllowComment(int $allow_comment) Return ChildBlogArticle objects filtered by the allow_comment column
 * @method     ChildBlogArticle[]|ObjectCollection findByFile(string $file) Return ChildBlogArticle objects filtered by the file column
 * @method     ChildBlogArticle[]|ObjectCollection findByView(int $view) Return ChildBlogArticle objects filtered by the view column
 * @method     ChildBlogArticle[]|ObjectCollection findByAltImage(string $alt_image) Return ChildBlogArticle objects filtered by the alt_image column
 * @method     ChildBlogArticle[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BlogArticleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BlogArticleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\BlogArticle', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBlogArticleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBlogArticleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBlogArticleQuery) {
            return $criteria;
        }
        $query = new ChildBlogArticleQuery();
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
     * @return ChildBlogArticle|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BlogArticleTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BlogArticleTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBlogArticle A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT article_id, article_title, article_url, keyword, description, date, author_user_id, content, allow_comment, file, view, alt_image FROM blog_article WHERE article_id = :p0';
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
            /** @var ChildBlogArticle $obj */
            $obj = new ChildBlogArticle();
            $obj->hydrate($row);
            BlogArticleTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBlogArticle|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BlogArticleTableMap::COL_ARTICLE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BlogArticleTableMap::COL_ARTICLE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the article_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArticleId(1234); // WHERE article_id = 1234
     * $query->filterByArticleId(array(12, 34)); // WHERE article_id IN (12, 34)
     * $query->filterByArticleId(array('min' => 12)); // WHERE article_id > 12
     * </code>
     *
     * @param     mixed $articleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByArticleId($articleId = null, $comparison = null)
    {
        if (is_array($articleId)) {
            $useMinMax = false;
            if (isset($articleId['min'])) {
                $this->addUsingAlias(BlogArticleTableMap::COL_ARTICLE_ID, $articleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($articleId['max'])) {
                $this->addUsingAlias(BlogArticleTableMap::COL_ARTICLE_ID, $articleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogArticleTableMap::COL_ARTICLE_ID, $articleId, $comparison);
    }

    /**
     * Filter the query on the article_title column
     *
     * Example usage:
     * <code>
     * $query->filterByArticleTitle('fooValue');   // WHERE article_title = 'fooValue'
     * $query->filterByArticleTitle('%fooValue%', Criteria::LIKE); // WHERE article_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $articleTitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByArticleTitle($articleTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($articleTitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogArticleTableMap::COL_ARTICLE_TITLE, $articleTitle, $comparison);
    }

    /**
     * Filter the query on the article_url column
     *
     * Example usage:
     * <code>
     * $query->filterByArticleUrl('fooValue');   // WHERE article_url = 'fooValue'
     * $query->filterByArticleUrl('%fooValue%', Criteria::LIKE); // WHERE article_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $articleUrl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByArticleUrl($articleUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($articleUrl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogArticleTableMap::COL_ARTICLE_URL, $articleUrl, $comparison);
    }

    /**
     * Filter the query on the keyword column
     *
     * Example usage:
     * <code>
     * $query->filterByKeyword('fooValue');   // WHERE keyword = 'fooValue'
     * $query->filterByKeyword('%fooValue%', Criteria::LIKE); // WHERE keyword LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keyword The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByKeyword($keyword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keyword)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogArticleTableMap::COL_KEYWORD, $keyword, $comparison);
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
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogArticleTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(BlogArticleTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(BlogArticleTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogArticleTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the author_user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthorUserId(1234); // WHERE author_user_id = 1234
     * $query->filterByAuthorUserId(array(12, 34)); // WHERE author_user_id IN (12, 34)
     * $query->filterByAuthorUserId(array('min' => 12)); // WHERE author_user_id > 12
     * </code>
     *
     * @param     mixed $authorUserId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByAuthorUserId($authorUserId = null, $comparison = null)
    {
        if (is_array($authorUserId)) {
            $useMinMax = false;
            if (isset($authorUserId['min'])) {
                $this->addUsingAlias(BlogArticleTableMap::COL_AUTHOR_USER_ID, $authorUserId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($authorUserId['max'])) {
                $this->addUsingAlias(BlogArticleTableMap::COL_AUTHOR_USER_ID, $authorUserId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogArticleTableMap::COL_AUTHOR_USER_ID, $authorUserId, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%', Criteria::LIKE); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogArticleTableMap::COL_CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the allow_comment column
     *
     * Example usage:
     * <code>
     * $query->filterByAllowComment(1234); // WHERE allow_comment = 1234
     * $query->filterByAllowComment(array(12, 34)); // WHERE allow_comment IN (12, 34)
     * $query->filterByAllowComment(array('min' => 12)); // WHERE allow_comment > 12
     * </code>
     *
     * @param     mixed $allowComment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByAllowComment($allowComment = null, $comparison = null)
    {
        if (is_array($allowComment)) {
            $useMinMax = false;
            if (isset($allowComment['min'])) {
                $this->addUsingAlias(BlogArticleTableMap::COL_ALLOW_COMMENT, $allowComment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($allowComment['max'])) {
                $this->addUsingAlias(BlogArticleTableMap::COL_ALLOW_COMMENT, $allowComment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogArticleTableMap::COL_ALLOW_COMMENT, $allowComment, $comparison);
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
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByFile($file = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($file)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogArticleTableMap::COL_FILE, $file, $comparison);
    }

    /**
     * Filter the query on the view column
     *
     * Example usage:
     * <code>
     * $query->filterByView(1234); // WHERE view = 1234
     * $query->filterByView(array(12, 34)); // WHERE view IN (12, 34)
     * $query->filterByView(array('min' => 12)); // WHERE view > 12
     * </code>
     *
     * @param     mixed $view The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByView($view = null, $comparison = null)
    {
        if (is_array($view)) {
            $useMinMax = false;
            if (isset($view['min'])) {
                $this->addUsingAlias(BlogArticleTableMap::COL_VIEW, $view['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($view['max'])) {
                $this->addUsingAlias(BlogArticleTableMap::COL_VIEW, $view['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogArticleTableMap::COL_VIEW, $view, $comparison);
    }

    /**
     * Filter the query on the alt_image column
     *
     * Example usage:
     * <code>
     * $query->filterByAltImage('fooValue');   // WHERE alt_image = 'fooValue'
     * $query->filterByAltImage('%fooValue%', Criteria::LIKE); // WHERE alt_image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $altImage The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByAltImage($altImage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($altImage)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogArticleTableMap::COL_ALT_IMAGE, $altImage, $comparison);
    }

    /**
     * Filter the query by a related \BlogCategoryArticle object
     *
     * @param \BlogCategoryArticle|ObjectCollection $blogCategoryArticle the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBlogArticleQuery The current query, for fluid interface
     */
    public function filterByBlogCategoryArticle($blogCategoryArticle, $comparison = null)
    {
        if ($blogCategoryArticle instanceof \BlogCategoryArticle) {
            return $this
                ->addUsingAlias(BlogArticleTableMap::COL_ARTICLE_ID, $blogCategoryArticle->getArticleId(), $comparison);
        } elseif ($blogCategoryArticle instanceof ObjectCollection) {
            return $this
                ->useBlogCategoryArticleQuery()
                ->filterByPrimaryKeys($blogCategoryArticle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBlogCategoryArticle() only accepts arguments of type \BlogCategoryArticle or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BlogCategoryArticle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function joinBlogCategoryArticle($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BlogCategoryArticle');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'BlogCategoryArticle');
        }

        return $this;
    }

    /**
     * Use the BlogCategoryArticle relation BlogCategoryArticle object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \BlogCategoryArticleQuery A secondary query class using the current class as primary query
     */
    public function useBlogCategoryArticleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBlogCategoryArticle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BlogCategoryArticle', '\BlogCategoryArticleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBlogArticle $blogArticle Object to remove from the list of results
     *
     * @return $this|ChildBlogArticleQuery The current query, for fluid interface
     */
    public function prune($blogArticle = null)
    {
        if ($blogArticle) {
            $this->addUsingAlias(BlogArticleTableMap::COL_ARTICLE_ID, $blogArticle->getArticleId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the blog_article table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BlogArticleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BlogArticleTableMap::clearInstancePool();
            BlogArticleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BlogArticleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BlogArticleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BlogArticleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BlogArticleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BlogArticleQuery
