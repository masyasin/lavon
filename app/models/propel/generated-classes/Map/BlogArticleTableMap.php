<?php

namespace Map;

use \BlogArticle;
use \BlogArticleQuery;
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
 * This class defines the structure of the 'blog_article' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BlogArticleTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BlogArticleTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'blog_article';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\BlogArticle';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'BlogArticle';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the article_id field
     */
    const COL_ARTICLE_ID = 'blog_article.article_id';

    /**
     * the column name for the article_title field
     */
    const COL_ARTICLE_TITLE = 'blog_article.article_title';

    /**
     * the column name for the article_url field
     */
    const COL_ARTICLE_URL = 'blog_article.article_url';

    /**
     * the column name for the keyword field
     */
    const COL_KEYWORD = 'blog_article.keyword';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'blog_article.description';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'blog_article.date';

    /**
     * the column name for the author_user_id field
     */
    const COL_AUTHOR_USER_ID = 'blog_article.author_user_id';

    /**
     * the column name for the content field
     */
    const COL_CONTENT = 'blog_article.content';

    /**
     * the column name for the allow_comment field
     */
    const COL_ALLOW_COMMENT = 'blog_article.allow_comment';

    /**
     * the column name for the file field
     */
    const COL_FILE = 'blog_article.file';

    /**
     * the column name for the view field
     */
    const COL_VIEW = 'blog_article.view';

    /**
     * the column name for the alt_image field
     */
    const COL_ALT_IMAGE = 'blog_article.alt_image';

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
        self::TYPE_PHPNAME       => array('ArticleId', 'ArticleTitle', 'ArticleUrl', 'Keyword', 'Description', 'Date', 'AuthorUserId', 'Content', 'AllowComment', 'File', 'View', 'AltImage', ),
        self::TYPE_CAMELNAME     => array('articleId', 'articleTitle', 'articleUrl', 'keyword', 'description', 'date', 'authorUserId', 'content', 'allowComment', 'file', 'view', 'altImage', ),
        self::TYPE_COLNAME       => array(BlogArticleTableMap::COL_ARTICLE_ID, BlogArticleTableMap::COL_ARTICLE_TITLE, BlogArticleTableMap::COL_ARTICLE_URL, BlogArticleTableMap::COL_KEYWORD, BlogArticleTableMap::COL_DESCRIPTION, BlogArticleTableMap::COL_DATE, BlogArticleTableMap::COL_AUTHOR_USER_ID, BlogArticleTableMap::COL_CONTENT, BlogArticleTableMap::COL_ALLOW_COMMENT, BlogArticleTableMap::COL_FILE, BlogArticleTableMap::COL_VIEW, BlogArticleTableMap::COL_ALT_IMAGE, ),
        self::TYPE_FIELDNAME     => array('article_id', 'article_title', 'article_url', 'keyword', 'description', 'date', 'author_user_id', 'content', 'allow_comment', 'file', 'view', 'alt_image', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ArticleId' => 0, 'ArticleTitle' => 1, 'ArticleUrl' => 2, 'Keyword' => 3, 'Description' => 4, 'Date' => 5, 'AuthorUserId' => 6, 'Content' => 7, 'AllowComment' => 8, 'File' => 9, 'View' => 10, 'AltImage' => 11, ),
        self::TYPE_CAMELNAME     => array('articleId' => 0, 'articleTitle' => 1, 'articleUrl' => 2, 'keyword' => 3, 'description' => 4, 'date' => 5, 'authorUserId' => 6, 'content' => 7, 'allowComment' => 8, 'file' => 9, 'view' => 10, 'altImage' => 11, ),
        self::TYPE_COLNAME       => array(BlogArticleTableMap::COL_ARTICLE_ID => 0, BlogArticleTableMap::COL_ARTICLE_TITLE => 1, BlogArticleTableMap::COL_ARTICLE_URL => 2, BlogArticleTableMap::COL_KEYWORD => 3, BlogArticleTableMap::COL_DESCRIPTION => 4, BlogArticleTableMap::COL_DATE => 5, BlogArticleTableMap::COL_AUTHOR_USER_ID => 6, BlogArticleTableMap::COL_CONTENT => 7, BlogArticleTableMap::COL_ALLOW_COMMENT => 8, BlogArticleTableMap::COL_FILE => 9, BlogArticleTableMap::COL_VIEW => 10, BlogArticleTableMap::COL_ALT_IMAGE => 11, ),
        self::TYPE_FIELDNAME     => array('article_id' => 0, 'article_title' => 1, 'article_url' => 2, 'keyword' => 3, 'description' => 4, 'date' => 5, 'author_user_id' => 6, 'content' => 7, 'allow_comment' => 8, 'file' => 9, 'view' => 10, 'alt_image' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('blog_article');
        $this->setPhpName('BlogArticle');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\BlogArticle');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('article_id', 'ArticleId', 'INTEGER', true, 20, null);
        $this->addColumn('article_title', 'ArticleTitle', 'VARCHAR', false, 100, null);
        $this->addColumn('article_url', 'ArticleUrl', 'VARCHAR', false, 100, null);
        $this->addColumn('keyword', 'Keyword', 'VARCHAR', false, 100, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('date', 'Date', 'TIMESTAMP', false, null, null);
        $this->addColumn('author_user_id', 'AuthorUserId', 'INTEGER', false, 20, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', false, null, null);
        $this->addColumn('allow_comment', 'AllowComment', 'INTEGER', false, 20, null);
        $this->addColumn('file', 'File', 'VARCHAR', false, 300, null);
        $this->addColumn('view', 'View', 'INTEGER', false, null, null);
        $this->addColumn('alt_image', 'AltImage', 'VARCHAR', false, 300, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('BlogCategoryArticle', '\\BlogCategoryArticle', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':article_id',
    1 => ':article_id',
  ),
), 'CASCADE', null, 'BlogCategoryArticles', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to blog_article     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        BlogCategoryArticleTableMap::clearInstancePool();
    }

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ArticleId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ArticleId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ArticleId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ArticleId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ArticleId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ArticleId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ArticleId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? BlogArticleTableMap::CLASS_DEFAULT : BlogArticleTableMap::OM_CLASS;
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
     * @return array           (BlogArticle object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BlogArticleTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BlogArticleTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BlogArticleTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BlogArticleTableMap::OM_CLASS;
            /** @var BlogArticle $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BlogArticleTableMap::addInstanceToPool($obj, $key);
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
            $key = BlogArticleTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BlogArticleTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var BlogArticle $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BlogArticleTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BlogArticleTableMap::COL_ARTICLE_ID);
            $criteria->addSelectColumn(BlogArticleTableMap::COL_ARTICLE_TITLE);
            $criteria->addSelectColumn(BlogArticleTableMap::COL_ARTICLE_URL);
            $criteria->addSelectColumn(BlogArticleTableMap::COL_KEYWORD);
            $criteria->addSelectColumn(BlogArticleTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(BlogArticleTableMap::COL_DATE);
            $criteria->addSelectColumn(BlogArticleTableMap::COL_AUTHOR_USER_ID);
            $criteria->addSelectColumn(BlogArticleTableMap::COL_CONTENT);
            $criteria->addSelectColumn(BlogArticleTableMap::COL_ALLOW_COMMENT);
            $criteria->addSelectColumn(BlogArticleTableMap::COL_FILE);
            $criteria->addSelectColumn(BlogArticleTableMap::COL_VIEW);
            $criteria->addSelectColumn(BlogArticleTableMap::COL_ALT_IMAGE);
        } else {
            $criteria->addSelectColumn($alias . '.article_id');
            $criteria->addSelectColumn($alias . '.article_title');
            $criteria->addSelectColumn($alias . '.article_url');
            $criteria->addSelectColumn($alias . '.keyword');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.author_user_id');
            $criteria->addSelectColumn($alias . '.content');
            $criteria->addSelectColumn($alias . '.allow_comment');
            $criteria->addSelectColumn($alias . '.file');
            $criteria->addSelectColumn($alias . '.view');
            $criteria->addSelectColumn($alias . '.alt_image');
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
        return Propel::getServiceContainer()->getDatabaseMap(BlogArticleTableMap::DATABASE_NAME)->getTable(BlogArticleTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BlogArticleTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BlogArticleTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BlogArticleTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a BlogArticle or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or BlogArticle object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BlogArticleTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \BlogArticle) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BlogArticleTableMap::DATABASE_NAME);
            $criteria->add(BlogArticleTableMap::COL_ARTICLE_ID, (array) $values, Criteria::IN);
        }

        $query = BlogArticleQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BlogArticleTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BlogArticleTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the blog_article table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BlogArticleQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a BlogArticle or Criteria object.
     *
     * @param mixed               $criteria Criteria or BlogArticle object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BlogArticleTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from BlogArticle object
        }

        if ($criteria->containsKey(BlogArticleTableMap::COL_ARTICLE_ID) && $criteria->keyContainsValue(BlogArticleTableMap::COL_ARTICLE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BlogArticleTableMap::COL_ARTICLE_ID.')');
        }


        // Set the correct dbName
        $query = BlogArticleQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BlogArticleTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BlogArticleTableMap::buildTableMap();
