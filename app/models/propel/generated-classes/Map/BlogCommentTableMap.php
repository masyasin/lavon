<?php

namespace Map;

use \BlogComment;
use \BlogCommentQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'blog_comment' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BlogCommentTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BlogCommentTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'blog_comment';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\BlogComment';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'BlogComment';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the comment_id field
     */
    const COL_COMMENT_ID = 'blog_comment.comment_id';

    /**
     * the column name for the article_id field
     */
    const COL_ARTICLE_ID = 'blog_comment.article_id';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'blog_comment.date';

    /**
     * the column name for the author_user_id field
     */
    const COL_AUTHOR_USER_ID = 'blog_comment.author_user_id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'blog_comment.name';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'blog_comment.email';

    /**
     * the column name for the website field
     */
    const COL_WEBSITE = 'blog_comment.website';

    /**
     * the column name for the content field
     */
    const COL_CONTENT = 'blog_comment.content';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('CommentId', 'ArticleId', 'Date', 'AuthorUserId', 'Name', 'Email', 'Website', 'Content', ),
        self::TYPE_CAMELNAME     => array('commentId', 'articleId', 'date', 'authorUserId', 'name', 'email', 'website', 'content', ),
        self::TYPE_COLNAME       => array(BlogCommentTableMap::COL_COMMENT_ID, BlogCommentTableMap::COL_ARTICLE_ID, BlogCommentTableMap::COL_DATE, BlogCommentTableMap::COL_AUTHOR_USER_ID, BlogCommentTableMap::COL_NAME, BlogCommentTableMap::COL_EMAIL, BlogCommentTableMap::COL_WEBSITE, BlogCommentTableMap::COL_CONTENT, ),
        self::TYPE_FIELDNAME     => array('comment_id', 'article_id', 'date', 'author_user_id', 'name', 'email', 'website', 'content', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('CommentId' => 0, 'ArticleId' => 1, 'Date' => 2, 'AuthorUserId' => 3, 'Name' => 4, 'Email' => 5, 'Website' => 6, 'Content' => 7, ),
        self::TYPE_CAMELNAME     => array('commentId' => 0, 'articleId' => 1, 'date' => 2, 'authorUserId' => 3, 'name' => 4, 'email' => 5, 'website' => 6, 'content' => 7, ),
        self::TYPE_COLNAME       => array(BlogCommentTableMap::COL_COMMENT_ID => 0, BlogCommentTableMap::COL_ARTICLE_ID => 1, BlogCommentTableMap::COL_DATE => 2, BlogCommentTableMap::COL_AUTHOR_USER_ID => 3, BlogCommentTableMap::COL_NAME => 4, BlogCommentTableMap::COL_EMAIL => 5, BlogCommentTableMap::COL_WEBSITE => 6, BlogCommentTableMap::COL_CONTENT => 7, ),
        self::TYPE_FIELDNAME     => array('comment_id' => 0, 'article_id' => 1, 'date' => 2, 'author_user_id' => 3, 'name' => 4, 'email' => 5, 'website' => 6, 'content' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('blog_comment');
        $this->setPhpName('BlogComment');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\BlogComment');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('comment_id', 'CommentId', 'INTEGER', true, 20, null);
        $this->addColumn('article_id', 'ArticleId', 'INTEGER', false, 20, null);
        $this->addColumn('date', 'Date', 'TIMESTAMP', false, null, null);
        $this->addColumn('author_user_id', 'AuthorUserId', 'INTEGER', false, 20, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 50, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 50, null);
        $this->addColumn('website', 'Website', 'VARCHAR', false, 50, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CommentId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CommentId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CommentId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CommentId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CommentId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('CommentId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('CommentId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? BlogCommentTableMap::CLASS_DEFAULT : BlogCommentTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (BlogComment object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BlogCommentTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BlogCommentTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BlogCommentTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BlogCommentTableMap::OM_CLASS;
            /** @var BlogComment $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BlogCommentTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = BlogCommentTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BlogCommentTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var BlogComment $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BlogCommentTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(BlogCommentTableMap::COL_COMMENT_ID);
            $criteria->addSelectColumn(BlogCommentTableMap::COL_ARTICLE_ID);
            $criteria->addSelectColumn(BlogCommentTableMap::COL_DATE);
            $criteria->addSelectColumn(BlogCommentTableMap::COL_AUTHOR_USER_ID);
            $criteria->addSelectColumn(BlogCommentTableMap::COL_NAME);
            $criteria->addSelectColumn(BlogCommentTableMap::COL_EMAIL);
            $criteria->addSelectColumn(BlogCommentTableMap::COL_WEBSITE);
            $criteria->addSelectColumn(BlogCommentTableMap::COL_CONTENT);
        } else {
            $criteria->addSelectColumn($alias . '.comment_id');
            $criteria->addSelectColumn($alias . '.article_id');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.author_user_id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.website');
            $criteria->addSelectColumn($alias . '.content');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(BlogCommentTableMap::DATABASE_NAME)->getTable(BlogCommentTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BlogCommentTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BlogCommentTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BlogCommentTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a BlogComment or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or BlogComment object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BlogCommentTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \BlogComment) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BlogCommentTableMap::DATABASE_NAME);
            $criteria->add(BlogCommentTableMap::COL_COMMENT_ID, (array) $values, Criteria::IN);
        }

        $query = BlogCommentQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BlogCommentTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BlogCommentTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the blog_comment table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BlogCommentQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a BlogComment or Criteria object.
     *
     * @param mixed               $criteria Criteria or BlogComment object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BlogCommentTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from BlogComment object
        }

        if ($criteria->containsKey(BlogCommentTableMap::COL_COMMENT_ID) && $criteria->keyContainsValue(BlogCommentTableMap::COL_COMMENT_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BlogCommentTableMap::COL_COMMENT_ID.')');
        }


        // Set the correct dbName
        $query = BlogCommentQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BlogCommentTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BlogCommentTableMap::buildTableMap();
