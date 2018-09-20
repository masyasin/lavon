<?php

namespace Base;

use \BlogPhoto as ChildBlogPhoto;
use \BlogPhotoQuery as ChildBlogPhotoQuery;
use \Exception;
use \PDO;
use Map\BlogPhotoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'blog_photo' table.
 *
 *
 *
 * @method     ChildBlogPhotoQuery orderByPhotoId($order = Criteria::ASC) Order by the photo_id column
 * @method     ChildBlogPhotoQuery orderByArticleId($order = Criteria::ASC) Order by the article_id column
 * @method     ChildBlogPhotoQuery orderByUrl($order = Criteria::ASC) Order by the url column
 *
 * @method     ChildBlogPhotoQuery groupByPhotoId() Group by the photo_id column
 * @method     ChildBlogPhotoQuery groupByArticleId() Group by the article_id column
 * @method     ChildBlogPhotoQuery groupByUrl() Group by the url column
 *
 * @method     ChildBlogPhotoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBlogPhotoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBlogPhotoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBlogPhotoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBlogPhotoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBlogPhotoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBlogPhoto findOne(ConnectionInterface $con = null) Return the first ChildBlogPhoto matching the query
 * @method     ChildBlogPhoto findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBlogPhoto matching the query, or a new ChildBlogPhoto object populated from the query conditions when no match is found
 *
 * @method     ChildBlogPhoto findOneByPhotoId(int $photo_id) Return the first ChildBlogPhoto filtered by the photo_id column
 * @method     ChildBlogPhoto findOneByArticleId(int $article_id) Return the first ChildBlogPhoto filtered by the article_id column
 * @method     ChildBlogPhoto findOneByUrl(string $url) Return the first ChildBlogPhoto filtered by the url column *

 * @method     ChildBlogPhoto requirePk($key, ConnectionInterface $con = null) Return the ChildBlogPhoto by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogPhoto requireOne(ConnectionInterface $con = null) Return the first ChildBlogPhoto matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBlogPhoto requireOneByPhotoId(int $photo_id) Return the first ChildBlogPhoto filtered by the photo_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogPhoto requireOneByArticleId(int $article_id) Return the first ChildBlogPhoto filtered by the article_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogPhoto requireOneByUrl(string $url) Return the first ChildBlogPhoto filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBlogPhoto[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBlogPhoto objects based on current ModelCriteria
 * @method     ChildBlogPhoto[]|ObjectCollection findByPhotoId(int $photo_id) Return ChildBlogPhoto objects filtered by the photo_id column
 * @method     ChildBlogPhoto[]|ObjectCollection findByArticleId(int $article_id) Return ChildBlogPhoto objects filtered by the article_id column
 * @method     ChildBlogPhoto[]|ObjectCollection findByUrl(string $url) Return ChildBlogPhoto objects filtered by the url column
 * @method     ChildBlogPhoto[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BlogPhotoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BlogPhotoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\BlogPhoto', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBlogPhotoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBlogPhotoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBlogPhotoQuery) {
            return $criteria;
        }
        $query = new ChildBlogPhotoQuery();
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
     * @return ChildBlogPhoto|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BlogPhotoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BlogPhotoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBlogPhoto A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT photo_id, article_id, url FROM blog_photo WHERE photo_id = :p0';
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
            /** @var ChildBlogPhoto $obj */
            $obj = new ChildBlogPhoto();
            $obj->hydrate($row);
            BlogPhotoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBlogPhoto|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBlogPhotoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BlogPhotoTableMap::COL_PHOTO_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBlogPhotoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BlogPhotoTableMap::COL_PHOTO_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the photo_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPhotoId(1234); // WHERE photo_id = 1234
     * $query->filterByPhotoId(array(12, 34)); // WHERE photo_id IN (12, 34)
     * $query->filterByPhotoId(array('min' => 12)); // WHERE photo_id > 12
     * </code>
     *
     * @param     mixed $photoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogPhotoQuery The current query, for fluid interface
     */
    public function filterByPhotoId($photoId = null, $comparison = null)
    {
        if (is_array($photoId)) {
            $useMinMax = false;
            if (isset($photoId['min'])) {
                $this->addUsingAlias(BlogPhotoTableMap::COL_PHOTO_ID, $photoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($photoId['max'])) {
                $this->addUsingAlias(BlogPhotoTableMap::COL_PHOTO_ID, $photoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogPhotoTableMap::COL_PHOTO_ID, $photoId, $comparison);
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
     * @return $this|ChildBlogPhotoQuery The current query, for fluid interface
     */
    public function filterByArticleId($articleId = null, $comparison = null)
    {
        if (is_array($articleId)) {
            $useMinMax = false;
            if (isset($articleId['min'])) {
                $this->addUsingAlias(BlogPhotoTableMap::COL_ARTICLE_ID, $articleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($articleId['max'])) {
                $this->addUsingAlias(BlogPhotoTableMap::COL_ARTICLE_ID, $articleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogPhotoTableMap::COL_ARTICLE_ID, $articleId, $comparison);
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
     * @return $this|ChildBlogPhotoQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogPhotoTableMap::COL_URL, $url, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBlogPhoto $blogPhoto Object to remove from the list of results
     *
     * @return $this|ChildBlogPhotoQuery The current query, for fluid interface
     */
    public function prune($blogPhoto = null)
    {
        if ($blogPhoto) {
            $this->addUsingAlias(BlogPhotoTableMap::COL_PHOTO_ID, $blogPhoto->getPhotoId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the blog_photo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BlogPhotoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BlogPhotoTableMap::clearInstancePool();
            BlogPhotoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BlogPhotoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BlogPhotoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BlogPhotoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BlogPhotoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BlogPhotoQuery
