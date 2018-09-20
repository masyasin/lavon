<?php

namespace Base;

use \BlogCategory as ChildBlogCategory;
use \BlogCategoryQuery as ChildBlogCategoryQuery;
use \Exception;
use \PDO;
use Map\BlogCategoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'blog_category' table.
 *
 *
 *
 * @method     ChildBlogCategoryQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     ChildBlogCategoryQuery orderByCategoryName($order = Criteria::ASC) Order by the category_name column
 * @method     ChildBlogCategoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildBlogCategoryQuery orderByInvalid($order = Criteria::ASC) Order by the invalid column
 * @method     ChildBlogCategoryQuery orderByRplc($order = Criteria::ASC) Order by the rplc column
 *
 * @method     ChildBlogCategoryQuery groupByCategoryId() Group by the category_id column
 * @method     ChildBlogCategoryQuery groupByCategoryName() Group by the category_name column
 * @method     ChildBlogCategoryQuery groupByDescription() Group by the description column
 * @method     ChildBlogCategoryQuery groupByInvalid() Group by the invalid column
 * @method     ChildBlogCategoryQuery groupByRplc() Group by the rplc column
 *
 * @method     ChildBlogCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBlogCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBlogCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBlogCategoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBlogCategoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBlogCategoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBlogCategoryQuery leftJoinBlogCategoryArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the BlogCategoryArticle relation
 * @method     ChildBlogCategoryQuery rightJoinBlogCategoryArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BlogCategoryArticle relation
 * @method     ChildBlogCategoryQuery innerJoinBlogCategoryArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the BlogCategoryArticle relation
 *
 * @method     ChildBlogCategoryQuery joinWithBlogCategoryArticle($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the BlogCategoryArticle relation
 *
 * @method     ChildBlogCategoryQuery leftJoinWithBlogCategoryArticle() Adds a LEFT JOIN clause and with to the query using the BlogCategoryArticle relation
 * @method     ChildBlogCategoryQuery rightJoinWithBlogCategoryArticle() Adds a RIGHT JOIN clause and with to the query using the BlogCategoryArticle relation
 * @method     ChildBlogCategoryQuery innerJoinWithBlogCategoryArticle() Adds a INNER JOIN clause and with to the query using the BlogCategoryArticle relation
 *
 * @method     \BlogCategoryArticleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildBlogCategory findOne(ConnectionInterface $con = null) Return the first ChildBlogCategory matching the query
 * @method     ChildBlogCategory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBlogCategory matching the query, or a new ChildBlogCategory object populated from the query conditions when no match is found
 *
 * @method     ChildBlogCategory findOneByCategoryId(int $category_id) Return the first ChildBlogCategory filtered by the category_id column
 * @method     ChildBlogCategory findOneByCategoryName(string $category_name) Return the first ChildBlogCategory filtered by the category_name column
 * @method     ChildBlogCategory findOneByDescription(string $description) Return the first ChildBlogCategory filtered by the description column
 * @method     ChildBlogCategory findOneByInvalid(int $invalid) Return the first ChildBlogCategory filtered by the invalid column
 * @method     ChildBlogCategory findOneByRplc(int $rplc) Return the first ChildBlogCategory filtered by the rplc column *

 * @method     ChildBlogCategory requirePk($key, ConnectionInterface $con = null) Return the ChildBlogCategory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogCategory requireOne(ConnectionInterface $con = null) Return the first ChildBlogCategory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBlogCategory requireOneByCategoryId(int $category_id) Return the first ChildBlogCategory filtered by the category_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogCategory requireOneByCategoryName(string $category_name) Return the first ChildBlogCategory filtered by the category_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogCategory requireOneByDescription(string $description) Return the first ChildBlogCategory filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogCategory requireOneByInvalid(int $invalid) Return the first ChildBlogCategory filtered by the invalid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBlogCategory requireOneByRplc(int $rplc) Return the first ChildBlogCategory filtered by the rplc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBlogCategory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBlogCategory objects based on current ModelCriteria
 * @method     ChildBlogCategory[]|ObjectCollection findByCategoryId(int $category_id) Return ChildBlogCategory objects filtered by the category_id column
 * @method     ChildBlogCategory[]|ObjectCollection findByCategoryName(string $category_name) Return ChildBlogCategory objects filtered by the category_name column
 * @method     ChildBlogCategory[]|ObjectCollection findByDescription(string $description) Return ChildBlogCategory objects filtered by the description column
 * @method     ChildBlogCategory[]|ObjectCollection findByInvalid(int $invalid) Return ChildBlogCategory objects filtered by the invalid column
 * @method     ChildBlogCategory[]|ObjectCollection findByRplc(int $rplc) Return ChildBlogCategory objects filtered by the rplc column
 * @method     ChildBlogCategory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BlogCategoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BlogCategoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\BlogCategory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBlogCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBlogCategoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBlogCategoryQuery) {
            return $criteria;
        }
        $query = new ChildBlogCategoryQuery();
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
     * @return ChildBlogCategory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BlogCategoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BlogCategoryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBlogCategory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT category_id, category_name, description, invalid, rplc FROM blog_category WHERE category_id = :p0';
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
            /** @var ChildBlogCategory $obj */
            $obj = new ChildBlogCategory();
            $obj->hydrate($row);
            BlogCategoryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBlogCategory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBlogCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BlogCategoryTableMap::COL_CATEGORY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBlogCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BlogCategoryTableMap::COL_CATEGORY_ID, $keys, Criteria::IN);
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
     * @param     mixed $categoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogCategoryQuery The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(BlogCategoryTableMap::COL_CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(BlogCategoryTableMap::COL_CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogCategoryTableMap::COL_CATEGORY_ID, $categoryId, $comparison);
    }

    /**
     * Filter the query on the category_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryName('fooValue');   // WHERE category_name = 'fooValue'
     * $query->filterByCategoryName('%fooValue%', Criteria::LIKE); // WHERE category_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $categoryName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogCategoryQuery The current query, for fluid interface
     */
    public function filterByCategoryName($categoryName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($categoryName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogCategoryTableMap::COL_CATEGORY_NAME, $categoryName, $comparison);
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
     * @return $this|ChildBlogCategoryQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogCategoryTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the invalid column
     *
     * Example usage:
     * <code>
     * $query->filterByInvalid(1234); // WHERE invalid = 1234
     * $query->filterByInvalid(array(12, 34)); // WHERE invalid IN (12, 34)
     * $query->filterByInvalid(array('min' => 12)); // WHERE invalid > 12
     * </code>
     *
     * @param     mixed $invalid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogCategoryQuery The current query, for fluid interface
     */
    public function filterByInvalid($invalid = null, $comparison = null)
    {
        if (is_array($invalid)) {
            $useMinMax = false;
            if (isset($invalid['min'])) {
                $this->addUsingAlias(BlogCategoryTableMap::COL_INVALID, $invalid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($invalid['max'])) {
                $this->addUsingAlias(BlogCategoryTableMap::COL_INVALID, $invalid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogCategoryTableMap::COL_INVALID, $invalid, $comparison);
    }

    /**
     * Filter the query on the rplc column
     *
     * Example usage:
     * <code>
     * $query->filterByRplc(1234); // WHERE rplc = 1234
     * $query->filterByRplc(array(12, 34)); // WHERE rplc IN (12, 34)
     * $query->filterByRplc(array('min' => 12)); // WHERE rplc > 12
     * </code>
     *
     * @param     mixed $rplc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBlogCategoryQuery The current query, for fluid interface
     */
    public function filterByRplc($rplc = null, $comparison = null)
    {
        if (is_array($rplc)) {
            $useMinMax = false;
            if (isset($rplc['min'])) {
                $this->addUsingAlias(BlogCategoryTableMap::COL_RPLC, $rplc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rplc['max'])) {
                $this->addUsingAlias(BlogCategoryTableMap::COL_RPLC, $rplc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlogCategoryTableMap::COL_RPLC, $rplc, $comparison);
    }

    /**
     * Filter the query by a related \BlogCategoryArticle object
     *
     * @param \BlogCategoryArticle|ObjectCollection $blogCategoryArticle the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBlogCategoryQuery The current query, for fluid interface
     */
    public function filterByBlogCategoryArticle($blogCategoryArticle, $comparison = null)
    {
        if ($blogCategoryArticle instanceof \BlogCategoryArticle) {
            return $this
                ->addUsingAlias(BlogCategoryTableMap::COL_CATEGORY_ID, $blogCategoryArticle->getCategoryId(), $comparison);
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
     * @return $this|ChildBlogCategoryQuery The current query, for fluid interface
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
     * @param   ChildBlogCategory $blogCategory Object to remove from the list of results
     *
     * @return $this|ChildBlogCategoryQuery The current query, for fluid interface
     */
    public function prune($blogCategory = null)
    {
        if ($blogCategory) {
            $this->addUsingAlias(BlogCategoryTableMap::COL_CATEGORY_ID, $blogCategory->getCategoryId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the blog_category table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BlogCategoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BlogCategoryTableMap::clearInstancePool();
            BlogCategoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BlogCategoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BlogCategoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BlogCategoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BlogCategoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BlogCategoryQuery
