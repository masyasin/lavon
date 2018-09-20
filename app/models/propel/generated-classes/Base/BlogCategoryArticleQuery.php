<?php

namespace Base;

use \BlogCategoryArticle as ChildBlogCategoryArticle;
use \BlogCategoryArticleQuery as ChildBlogCategoryArticleQuery;
use \Exception;
use \PDO;
use Map\BlogCategoryArticleTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'blog_category_article' table.
 *
 *
 *
 * @method     ChildBlogCategoryArticleQuery orderByCategoryArticleId($order = Criteria::ASC) Order by the category_article_id column
 * @method     ChildBlogCategoryArticleQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     ChildBlogCategoryArticleQuery orderByArticleId($order = Criteria::ASC) Order by the article_id column
 *
 * @method     ChildBlogCategoryArticleQuery groupByCategoryArticleId() Group by the category_article_id column
 * @method     ChildBlogCategoryArticleQuery groupByCategoryId() Group by the category_id column
 * @method     ChildBlogCategoryArticleQuery groupByArticleId() Group by the article_id column
 *
 * @method     ChildBlogCategoryArticleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBlogCategoryArticleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBlogCategoryArticleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBlogCategoryArticleQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBlogCategoryArticleQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBlogCategoryArticleQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBlogCategoryArticleQuery leftJoinBlogArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the BlogArticle relation
 * @method     ChildBlogCategoryArticleQuery rightJoinBlogArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BlogArticle relation
 * @method     ChildBlogCategoryArticleQuery innerJoinBlogArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the BlogArticle relation
 *
 * @method     ChildBlogCategoryArticleQuery joinWithBlogArticle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the BlogArticle relation
 *
 * @method     ChildBlogCategoryArticleQuery leftJoinWithBlogArticle() Adds a LEFT JOIN clause and with to the query using the BlogArticle relation
 * @method     ChildBlogCategoryArticleQuery rightJoinWithBlogArticle() Adds a RIGHT JOIN clause and with to the query using the BlogArticle relation
 * @method     ChildBlogCategoryArticleQuery innerJoinWithBlogArticle() Adds a INNER JOIN clause and with to the query using the BlogArticle relation
 *
 * @method     ChildBlogCategoryArticleQuery leftJoinBlogCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the BlogCategory relation
 * @method     ChildBlogCategoryArticleQuery rightJoinBlogCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BlogCategory relation
 * @method     ChildBlogCategoryArticleQuery innerJoinBlogCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the BlogCategory relation
 *
 * @method     ChildBlogCategoryArticleQuery joinWithBlogCategory($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the BlogCategory relation
 *
 * @method     ChildBlogCategoryArticleQuery leftJoinWithBlogCategory() Adds a LEFT JOIN clause and with to the query using the BlogCategory relation
 * @method     ChildBlogCategoryArticleQuery rightJoinWithBlogCategory() Adds a RIGHT JOIN clause and with to the query using the BlogCategory relation
 * @method     ChildBlogCategoryArticleQuery innerJoinWithBlogCategory() Adds a INNER JOIN clause and with to the query using the BlogCategory relation
 *
 * @method     \BlogArticleQuery|\BlogCategoryQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildBlogCategoryArticle findOne(ConnectionInterface $con = null) Return the first ChildBlogCategoryArticle matching the query
 * @method     ChildBlogCategoryArticle findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBlogCategoryArticle matching the query, or a new ChildBlogCategoryArticle object populated from the query conditions when no match is found
 *
 * @method     ChildBlogCategoryArticle findOneByCategoryArticleId(int $category_article_id) Return the first ChildBlogCategoryArticle filtered by the category_article_id column
 * @method     ChildBlogCategoryArticle findOneByCategoryId(int $category_id) Return the first ChildBlogCategoryArticle filtered by the category_id column
 * @method     ChildBlogCategoryArticle findOneByArticleId(int $article_id) Return the first ChildBlogCategoryArticle filtered by the article_id column *

 * @method     ChildBlogCategoryArticle requirePk($key, ConnectionInterface $con = null) Return the ChildBlogCategoryArticle by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogCategoryArticle requireOne(ConnectionInterface $con = null) Return the first ChildBlogCategoryArticle matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBlogCategoryArticle requireOneByCategoryArticleId(int $category_article_id) Return the first ChildBlogCategoryArticle filtered by the category_article_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogCategoryArticle requireOneByCategoryId(int $category_id) Return the first ChildBlogCategoryArticle filtered by the category_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogCategoryArticle requireOneByArticleId(int $article_id) Return the first ChildBlogCategoryArticle filtered by the article_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBlogCategoryArticle[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBlogCategoryArticle objects based on current ModelCriteria
 * @method     ChildBlogCategoryArticle[]|ObjectCollection findByCategoryArticleId(int $category_article_id) Return ChildBlogCategoryArticle objects filtered by the category_article_id column
 * @method     ChildBlogCategoryArticle[]|ObjectCollection findByCategoryId(int $category_id) Return ChildBlogCategoryArticle objects filtered by the category_id column
 * @method     ChildBlogCategoryArticle[]|ObjectCollection findByArticleId(int $article_id) Return ChildBlogCategoryArticle objects filtered by the article_id column
 * @method     ChildBlogCategoryArticle[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BlogCategoryArticleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BlogCategoryArticleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\BlogCategoryArticle', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBlogCategoryArticleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBlogCategoryArticleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBlogCategoryArticleQuery) {
            return $criteria;
        }
        $query = new ChildBlogCategoryArticleQuery();
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
     * @return ChildBlogCategoryArticle|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BlogCategoryArticleTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BlogCategoryArticleTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBlogCategoryArticle A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT category_article_id, category_id, article_id FROM blog_category_article WHERE category_article_id = :p0';
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
            /** @var ChildBlogCategoryArticle $obj */
            $obj = new ChildBlogCategoryArticle();
            $obj->hydrate($row);
            BlogCategoryArticleTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBlogCategoryArticle|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBlogCategoryArticleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BlogCategoryArticleTableMap::COL_CATEGORY_ARTICLE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBlogCategoryArticleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BlogCategoryArticleTableMap::COL_CATEGORY_ARTICLE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the category_article_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryArticleId(1234); // WHERE category_article_id = 1234
     * $query->filterByCategoryArticleId(array(12, 34)); // WHERE category_article_id IN (12, 34)
     * $query->filterByCategoryArticleId(array('min' => 12)); // WHERE category_article_id > 12
     * </code>
     *
     * @param     mixed $categoryArticleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogCategoryArticleQuery The current query, for fluid interface
     */
    public function filterByCategoryArticleId($categoryArticleId = null, $comparison = null)
    {
        if (is_array($categoryArticleId)) {
            $useMinMax = false;
            if (isset($categoryArticleId['min'])) {
                $this->addUsingAlias(BlogCategoryArticleTableMap::COL_CATEGORY_ARTICLE_ID, $categoryArticleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryArticleId['max'])) {
                $this->addUsingAlias(BlogCategoryArticleTableMap::COL_CATEGORY_ARTICLE_ID, $categoryArticleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogCategoryArticleTableMap::COL_CATEGORY_ARTICLE_ID, $categoryArticleId, $comparison);
    }

    /**
     * Filter the query on the category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryId(1234); // WHERE category_id = 1234
     * $query->filterByCategoryId(array(12, 34)); // WHERE category_id IN (12, 34)
     * $query->filterByCategoryId(array('min' => 12)); // WHERE category_id > 12
     * </code>
     *
     * @see       filterByBlogCategory()
     *
     * @param     mixed $categoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogCategoryArticleQuery The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(BlogCategoryArticleTableMap::COL_CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(BlogCategoryArticleTableMap::COL_CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogCategoryArticleTableMap::COL_CATEGORY_ID, $categoryId, $comparison);
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
     * @see       filterByBlogArticle()
     *
     * @param     mixed $articleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogCategoryArticleQuery The current query, for fluid interface
     */
    public function filterByArticleId($articleId = null, $comparison = null)
    {
        if (is_array($articleId)) {
            $useMinMax = false;
            if (isset($articleId['min'])) {
                $this->addUsingAlias(BlogCategoryArticleTableMap::COL_ARTICLE_ID, $articleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($articleId['max'])) {
                $this->addUsingAlias(BlogCategoryArticleTableMap::COL_ARTICLE_ID, $articleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogCategoryArticleTableMap::COL_ARTICLE_ID, $articleId, $comparison);
    }

    /**
     * Filter the query by a related \BlogArticle object
     *
     * @param \BlogArticle|ObjectCollection $blogArticle The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildBlogCategoryArticleQuery The current query, for fluid interface
     */
    public function filterByBlogArticle($blogArticle, $comparison = null)
    {
        if ($blogArticle instanceof \BlogArticle) {
            return $this
                ->addUsingAlias(BlogCategoryArticleTableMap::COL_ARTICLE_ID, $blogArticle->getArticleId(), $comparison);
        } elseif ($blogArticle instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlogCategoryArticleTableMap::COL_ARTICLE_ID, $blogArticle->toKeyValue('PrimaryKey', 'ArticleId'), $comparison);
        } else {
            throw new PropelException('filterByBlogArticle() only accepts arguments of type \BlogArticle or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BlogArticle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBlogCategoryArticleQuery The current query, for fluid interface
     */
    public function joinBlogArticle($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BlogArticle');

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
            $this->addJoinObject($join, 'BlogArticle');
        }

        return $this;
    }

    /**
     * Use the BlogArticle relation BlogArticle object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \BlogArticleQuery A secondary query class using the current class as primary query
     */
    public function useBlogArticleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBlogArticle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BlogArticle', '\BlogArticleQuery');
    }

    /**
     * Filter the query by a related \BlogCategory object
     *
     * @param \BlogCategory|ObjectCollection $blogCategory The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildBlogCategoryArticleQuery The current query, for fluid interface
     */
    public function filterByBlogCategory($blogCategory, $comparison = null)
    {
        if ($blogCategory instanceof \BlogCategory) {
            return $this
                ->addUsingAlias(BlogCategoryArticleTableMap::COL_CATEGORY_ID, $blogCategory->getCategoryId(), $comparison);
        } elseif ($blogCategory instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlogCategoryArticleTableMap::COL_CATEGORY_ID, $blogCategory->toKeyValue('PrimaryKey', 'CategoryId'), $comparison);
        } else {
            throw new PropelException('filterByBlogCategory() only accepts arguments of type \BlogCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BlogCategory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBlogCategoryArticleQuery The current query, for fluid interface
     */
    public function joinBlogCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BlogCategory');

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
            $this->addJoinObject($join, 'BlogCategory');
        }

        return $this;
    }

    /**
     * Use the BlogCategory relation BlogCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \BlogCategoryQuery A secondary query class using the current class as primary query
     */
    public function useBlogCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBlogCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BlogCategory', '\BlogCategoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBlogCategoryArticle $blogCategoryArticle Object to remove from the list of results
     *
     * @return $this|ChildBlogCategoryArticleQuery The current query, for fluid interface
     */
    public function prune($blogCategoryArticle = null)
    {
        if ($blogCategoryArticle) {
            $this->addUsingAlias(BlogCategoryArticleTableMap::COL_CATEGORY_ARTICLE_ID, $blogCategoryArticle->getCategoryArticleId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the blog_category_article table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BlogCategoryArticleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BlogCategoryArticleTableMap::clearInstancePool();
            BlogCategoryArticleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BlogCategoryArticleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BlogCategoryArticleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BlogCategoryArticleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BlogCategoryArticleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BlogCategoryArticleQuery
