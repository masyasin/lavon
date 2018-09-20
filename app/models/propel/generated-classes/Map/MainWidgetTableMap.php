<?php

namespace Map;

use \MainWidget;
use \MainWidgetQuery;
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
 * This class defines the structure of the 'main_widget' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MainWidgetTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MainWidgetTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'main_widget';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MainWidget';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MainWidget';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the widget_id field
     */
    const COL_WIDGET_ID = 'main_widget.widget_id';

    /**
     * the column name for the widget_name field
     */
    const COL_WIDGET_NAME = 'main_widget.widget_name';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'main_widget.title';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'main_widget.description';

    /**
     * the column name for the url field
     */
    const COL_URL = 'main_widget.url';

    /**
     * the column name for the authorization_id field
     */
    const COL_AUTHORIZATION_ID = 'main_widget.authorization_id';

    /**
     * the column name for the active field
     */
    const COL_ACTIVE = 'main_widget.active';

    /**
     * the column name for the index field
     */
    const COL_INDEX = 'main_widget.index';

    /**
     * the column name for the is_static field
     */
    const COL_IS_STATIC = 'main_widget.is_static';

    /**
     * the column name for the static_content field
     */
    const COL_STATIC_CONTENT = 'main_widget.static_content';

    /**
     * the column name for the slug field
     */
    const COL_SLUG = 'main_widget.slug';

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
        self::TYPE_PHPNAME       => array('WidgetId', 'WidgetName', 'Title', 'Description', 'Url', 'AuthorizationId', 'Active', 'Index', 'IsStatic', 'StaticContent', 'Slug', ),
        self::TYPE_CAMELNAME     => array('widgetId', 'widgetName', 'title', 'description', 'url', 'authorizationId', 'active', 'index', 'isStatic', 'staticContent', 'slug', ),
        self::TYPE_COLNAME       => array(MainWidgetTableMap::COL_WIDGET_ID, MainWidgetTableMap::COL_WIDGET_NAME, MainWidgetTableMap::COL_TITLE, MainWidgetTableMap::COL_DESCRIPTION, MainWidgetTableMap::COL_URL, MainWidgetTableMap::COL_AUTHORIZATION_ID, MainWidgetTableMap::COL_ACTIVE, MainWidgetTableMap::COL_INDEX, MainWidgetTableMap::COL_IS_STATIC, MainWidgetTableMap::COL_STATIC_CONTENT, MainWidgetTableMap::COL_SLUG, ),
        self::TYPE_FIELDNAME     => array('widget_id', 'widget_name', 'title', 'description', 'url', 'authorization_id', 'active', 'index', 'is_static', 'static_content', 'slug', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('WidgetId' => 0, 'WidgetName' => 1, 'Title' => 2, 'Description' => 3, 'Url' => 4, 'AuthorizationId' => 5, 'Active' => 6, 'Index' => 7, 'IsStatic' => 8, 'StaticContent' => 9, 'Slug' => 10, ),
        self::TYPE_CAMELNAME     => array('widgetId' => 0, 'widgetName' => 1, 'title' => 2, 'description' => 3, 'url' => 4, 'authorizationId' => 5, 'active' => 6, 'index' => 7, 'isStatic' => 8, 'staticContent' => 9, 'slug' => 10, ),
        self::TYPE_COLNAME       => array(MainWidgetTableMap::COL_WIDGET_ID => 0, MainWidgetTableMap::COL_WIDGET_NAME => 1, MainWidgetTableMap::COL_TITLE => 2, MainWidgetTableMap::COL_DESCRIPTION => 3, MainWidgetTableMap::COL_URL => 4, MainWidgetTableMap::COL_AUTHORIZATION_ID => 5, MainWidgetTableMap::COL_ACTIVE => 6, MainWidgetTableMap::COL_INDEX => 7, MainWidgetTableMap::COL_IS_STATIC => 8, MainWidgetTableMap::COL_STATIC_CONTENT => 9, MainWidgetTableMap::COL_SLUG => 10, ),
        self::TYPE_FIELDNAME     => array('widget_id' => 0, 'widget_name' => 1, 'title' => 2, 'description' => 3, 'url' => 4, 'authorization_id' => 5, 'active' => 6, 'index' => 7, 'is_static' => 8, 'static_content' => 9, 'slug' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('main_widget');
        $this->setPhpName('MainWidget');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\MainWidget');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('widget_id', 'WidgetId', 'INTEGER', true, 20, null);
        $this->addColumn('widget_name', 'WidgetName', 'VARCHAR', true, 50, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 50, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('url', 'Url', 'VARCHAR', false, 100, null);
        $this->addColumn('authorization_id', 'AuthorizationId', 'INTEGER', true, 5, 1);
        $this->addColumn('active', 'Active', 'INTEGER', true, 5, 1);
        $this->addColumn('index', 'Index', 'INTEGER', true, 5, 0);
        $this->addColumn('is_static', 'IsStatic', 'INTEGER', true, 5, 0);
        $this->addColumn('static_content', 'StaticContent', 'LONGVARCHAR', false, null, null);
        $this->addColumn('slug', 'Slug', 'VARCHAR', false, 100, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('WidgetId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('WidgetId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('WidgetId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('WidgetId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('WidgetId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('WidgetId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('WidgetId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? MainWidgetTableMap::CLASS_DEFAULT : MainWidgetTableMap::OM_CLASS;
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
     * @return array           (MainWidget object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MainWidgetTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MainWidgetTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MainWidgetTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MainWidgetTableMap::OM_CLASS;
            /** @var MainWidget $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MainWidgetTableMap::addInstanceToPool($obj, $key);
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
            $key = MainWidgetTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MainWidgetTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MainWidget $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MainWidgetTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MainWidgetTableMap::COL_WIDGET_ID);
            $criteria->addSelectColumn(MainWidgetTableMap::COL_WIDGET_NAME);
            $criteria->addSelectColumn(MainWidgetTableMap::COL_TITLE);
            $criteria->addSelectColumn(MainWidgetTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(MainWidgetTableMap::COL_URL);
            $criteria->addSelectColumn(MainWidgetTableMap::COL_AUTHORIZATION_ID);
            $criteria->addSelectColumn(MainWidgetTableMap::COL_ACTIVE);
            $criteria->addSelectColumn(MainWidgetTableMap::COL_INDEX);
            $criteria->addSelectColumn(MainWidgetTableMap::COL_IS_STATIC);
            $criteria->addSelectColumn(MainWidgetTableMap::COL_STATIC_CONTENT);
            $criteria->addSelectColumn(MainWidgetTableMap::COL_SLUG);
        } else {
            $criteria->addSelectColumn($alias . '.widget_id');
            $criteria->addSelectColumn($alias . '.widget_name');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.url');
            $criteria->addSelectColumn($alias . '.authorization_id');
            $criteria->addSelectColumn($alias . '.active');
            $criteria->addSelectColumn($alias . '.index');
            $criteria->addSelectColumn($alias . '.is_static');
            $criteria->addSelectColumn($alias . '.static_content');
            $criteria->addSelectColumn($alias . '.slug');
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
        return Propel::getServiceContainer()->getDatabaseMap(MainWidgetTableMap::DATABASE_NAME)->getTable(MainWidgetTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MainWidgetTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MainWidgetTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MainWidgetTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MainWidget or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MainWidget object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MainWidgetTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MainWidget) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MainWidgetTableMap::DATABASE_NAME);
            $criteria->add(MainWidgetTableMap::COL_WIDGET_ID, (array) $values, Criteria::IN);
        }

        $query = MainWidgetQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MainWidgetTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MainWidgetTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the main_widget table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MainWidgetQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MainWidget or Criteria object.
     *
     * @param mixed               $criteria Criteria or MainWidget object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainWidgetTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MainWidget object
        }

        if ($criteria->containsKey(MainWidgetTableMap::COL_WIDGET_ID) && $criteria->keyContainsValue(MainWidgetTableMap::COL_WIDGET_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MainWidgetTableMap::COL_WIDGET_ID.')');
        }


        // Set the correct dbName
        $query = MainWidgetQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MainWidgetTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MainWidgetTableMap::buildTableMap();
