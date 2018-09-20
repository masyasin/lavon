<?php

namespace Map;

use \MainNavigation;
use \MainNavigationQuery;
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
 * This class defines the structure of the 'main_navigation' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MainNavigationTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MainNavigationTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'main_navigation';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MainNavigation';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MainNavigation';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 17;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 17;

    /**
     * the column name for the navigation_id field
     */
    const COL_NAVIGATION_ID = 'main_navigation.navigation_id';

    /**
     * the column name for the navigation_name field
     */
    const COL_NAVIGATION_NAME = 'main_navigation.navigation_name';

    /**
     * the column name for the parent_id field
     */
    const COL_PARENT_ID = 'main_navigation.parent_id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'main_navigation.title';

    /**
     * the column name for the bootstrap_glyph field
     */
    const COL_BOOTSTRAP_GLYPH = 'main_navigation.bootstrap_glyph';

    /**
     * the column name for the page_title field
     */
    const COL_PAGE_TITLE = 'main_navigation.page_title';

    /**
     * the column name for the page_keyword field
     */
    const COL_PAGE_KEYWORD = 'main_navigation.page_keyword';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'main_navigation.description';

    /**
     * the column name for the url field
     */
    const COL_URL = 'main_navigation.url';

    /**
     * the column name for the authorization_id field
     */
    const COL_AUTHORIZATION_ID = 'main_navigation.authorization_id';

    /**
     * the column name for the active field
     */
    const COL_ACTIVE = 'main_navigation.active';

    /**
     * the column name for the index field
     */
    const COL_INDEX = 'main_navigation.index';

    /**
     * the column name for the is_static field
     */
    const COL_IS_STATIC = 'main_navigation.is_static';

    /**
     * the column name for the static_content field
     */
    const COL_STATIC_CONTENT = 'main_navigation.static_content';

    /**
     * the column name for the only_content field
     */
    const COL_ONLY_CONTENT = 'main_navigation.only_content';

    /**
     * the column name for the default_theme field
     */
    const COL_DEFAULT_THEME = 'main_navigation.default_theme';

    /**
     * the column name for the default_layout field
     */
    const COL_DEFAULT_LAYOUT = 'main_navigation.default_layout';

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
        self::TYPE_PHPNAME       => array('NavigationId', 'NavigationName', 'ParentId', 'Title', 'BootstrapGlyph', 'PageTitle', 'PageKeyword', 'Description', 'Url', 'AuthorizationId', 'Active', 'Index', 'IsStatic', 'StaticContent', 'OnlyContent', 'DefaultTheme', 'DefaultLayout', ),
        self::TYPE_CAMELNAME     => array('navigationId', 'navigationName', 'parentId', 'title', 'bootstrapGlyph', 'pageTitle', 'pageKeyword', 'description', 'url', 'authorizationId', 'active', 'index', 'isStatic', 'staticContent', 'onlyContent', 'defaultTheme', 'defaultLayout', ),
        self::TYPE_COLNAME       => array(MainNavigationTableMap::COL_NAVIGATION_ID, MainNavigationTableMap::COL_NAVIGATION_NAME, MainNavigationTableMap::COL_PARENT_ID, MainNavigationTableMap::COL_TITLE, MainNavigationTableMap::COL_BOOTSTRAP_GLYPH, MainNavigationTableMap::COL_PAGE_TITLE, MainNavigationTableMap::COL_PAGE_KEYWORD, MainNavigationTableMap::COL_DESCRIPTION, MainNavigationTableMap::COL_URL, MainNavigationTableMap::COL_AUTHORIZATION_ID, MainNavigationTableMap::COL_ACTIVE, MainNavigationTableMap::COL_INDEX, MainNavigationTableMap::COL_IS_STATIC, MainNavigationTableMap::COL_STATIC_CONTENT, MainNavigationTableMap::COL_ONLY_CONTENT, MainNavigationTableMap::COL_DEFAULT_THEME, MainNavigationTableMap::COL_DEFAULT_LAYOUT, ),
        self::TYPE_FIELDNAME     => array('navigation_id', 'navigation_name', 'parent_id', 'title', 'bootstrap_glyph', 'page_title', 'page_keyword', 'description', 'url', 'authorization_id', 'active', 'index', 'is_static', 'static_content', 'only_content', 'default_theme', 'default_layout', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('NavigationId' => 0, 'NavigationName' => 1, 'ParentId' => 2, 'Title' => 3, 'BootstrapGlyph' => 4, 'PageTitle' => 5, 'PageKeyword' => 6, 'Description' => 7, 'Url' => 8, 'AuthorizationId' => 9, 'Active' => 10, 'Index' => 11, 'IsStatic' => 12, 'StaticContent' => 13, 'OnlyContent' => 14, 'DefaultTheme' => 15, 'DefaultLayout' => 16, ),
        self::TYPE_CAMELNAME     => array('navigationId' => 0, 'navigationName' => 1, 'parentId' => 2, 'title' => 3, 'bootstrapGlyph' => 4, 'pageTitle' => 5, 'pageKeyword' => 6, 'description' => 7, 'url' => 8, 'authorizationId' => 9, 'active' => 10, 'index' => 11, 'isStatic' => 12, 'staticContent' => 13, 'onlyContent' => 14, 'defaultTheme' => 15, 'defaultLayout' => 16, ),
        self::TYPE_COLNAME       => array(MainNavigationTableMap::COL_NAVIGATION_ID => 0, MainNavigationTableMap::COL_NAVIGATION_NAME => 1, MainNavigationTableMap::COL_PARENT_ID => 2, MainNavigationTableMap::COL_TITLE => 3, MainNavigationTableMap::COL_BOOTSTRAP_GLYPH => 4, MainNavigationTableMap::COL_PAGE_TITLE => 5, MainNavigationTableMap::COL_PAGE_KEYWORD => 6, MainNavigationTableMap::COL_DESCRIPTION => 7, MainNavigationTableMap::COL_URL => 8, MainNavigationTableMap::COL_AUTHORIZATION_ID => 9, MainNavigationTableMap::COL_ACTIVE => 10, MainNavigationTableMap::COL_INDEX => 11, MainNavigationTableMap::COL_IS_STATIC => 12, MainNavigationTableMap::COL_STATIC_CONTENT => 13, MainNavigationTableMap::COL_ONLY_CONTENT => 14, MainNavigationTableMap::COL_DEFAULT_THEME => 15, MainNavigationTableMap::COL_DEFAULT_LAYOUT => 16, ),
        self::TYPE_FIELDNAME     => array('navigation_id' => 0, 'navigation_name' => 1, 'parent_id' => 2, 'title' => 3, 'bootstrap_glyph' => 4, 'page_title' => 5, 'page_keyword' => 6, 'description' => 7, 'url' => 8, 'authorization_id' => 9, 'active' => 10, 'index' => 11, 'is_static' => 12, 'static_content' => 13, 'only_content' => 14, 'default_theme' => 15, 'default_layout' => 16, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
        $this->setName('main_navigation');
        $this->setPhpName('MainNavigation');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\MainNavigation');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('navigation_id', 'NavigationId', 'INTEGER', true, 20, null);
        $this->addColumn('navigation_name', 'NavigationName', 'VARCHAR', true, 50, null);
        $this->addColumn('parent_id', 'ParentId', 'INTEGER', false, 5, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 50, null);
        $this->addColumn('bootstrap_glyph', 'BootstrapGlyph', 'VARCHAR', false, 50, null);
        $this->addColumn('page_title', 'PageTitle', 'VARCHAR', false, 50, null);
        $this->addColumn('page_keyword', 'PageKeyword', 'VARCHAR', false, 100, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('url', 'Url', 'VARCHAR', false, 100, null);
        $this->addColumn('authorization_id', 'AuthorizationId', 'INTEGER', true, 5, 1);
        $this->addColumn('active', 'Active', 'INTEGER', true, 5, 1);
        $this->addColumn('index', 'Index', 'INTEGER', true, 5, 0);
        $this->addColumn('is_static', 'IsStatic', 'INTEGER', true, 5, 0);
        $this->addColumn('static_content', 'StaticContent', 'LONGVARCHAR', false, null, null);
        $this->addColumn('only_content', 'OnlyContent', 'INTEGER', true, 5, 0);
        $this->addColumn('default_theme', 'DefaultTheme', 'VARCHAR', false, 50, null);
        $this->addColumn('default_layout', 'DefaultLayout', 'VARCHAR', false, 50, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('NavigationId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('NavigationId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('NavigationId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('NavigationId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('NavigationId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('NavigationId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('NavigationId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? MainNavigationTableMap::CLASS_DEFAULT : MainNavigationTableMap::OM_CLASS;
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
     * @return array           (MainNavigation object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MainNavigationTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MainNavigationTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MainNavigationTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MainNavigationTableMap::OM_CLASS;
            /** @var MainNavigation $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MainNavigationTableMap::addInstanceToPool($obj, $key);
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
            $key = MainNavigationTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MainNavigationTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MainNavigation $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MainNavigationTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MainNavigationTableMap::COL_NAVIGATION_ID);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_NAVIGATION_NAME);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_PARENT_ID);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_TITLE);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_BOOTSTRAP_GLYPH);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_PAGE_TITLE);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_PAGE_KEYWORD);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_URL);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_AUTHORIZATION_ID);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_ACTIVE);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_INDEX);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_IS_STATIC);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_STATIC_CONTENT);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_ONLY_CONTENT);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_DEFAULT_THEME);
            $criteria->addSelectColumn(MainNavigationTableMap::COL_DEFAULT_LAYOUT);
        } else {
            $criteria->addSelectColumn($alias . '.navigation_id');
            $criteria->addSelectColumn($alias . '.navigation_name');
            $criteria->addSelectColumn($alias . '.parent_id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.bootstrap_glyph');
            $criteria->addSelectColumn($alias . '.page_title');
            $criteria->addSelectColumn($alias . '.page_keyword');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.url');
            $criteria->addSelectColumn($alias . '.authorization_id');
            $criteria->addSelectColumn($alias . '.active');
            $criteria->addSelectColumn($alias . '.index');
            $criteria->addSelectColumn($alias . '.is_static');
            $criteria->addSelectColumn($alias . '.static_content');
            $criteria->addSelectColumn($alias . '.only_content');
            $criteria->addSelectColumn($alias . '.default_theme');
            $criteria->addSelectColumn($alias . '.default_layout');
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
        return Propel::getServiceContainer()->getDatabaseMap(MainNavigationTableMap::DATABASE_NAME)->getTable(MainNavigationTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MainNavigationTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MainNavigationTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MainNavigationTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MainNavigation or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MainNavigation object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MainNavigationTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MainNavigation) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MainNavigationTableMap::DATABASE_NAME);
            $criteria->add(MainNavigationTableMap::COL_NAVIGATION_ID, (array) $values, Criteria::IN);
        }

        $query = MainNavigationQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MainNavigationTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MainNavigationTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the main_navigation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MainNavigationQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MainNavigation or Criteria object.
     *
     * @param mixed               $criteria Criteria or MainNavigation object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainNavigationTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MainNavigation object
        }

        if ($criteria->containsKey(MainNavigationTableMap::COL_NAVIGATION_ID) && $criteria->keyContainsValue(MainNavigationTableMap::COL_NAVIGATION_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MainNavigationTableMap::COL_NAVIGATION_ID.')');
        }


        // Set the correct dbName
        $query = MainNavigationQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MainNavigationTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MainNavigationTableMap::buildTableMap();
