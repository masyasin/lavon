<?php

namespace Map;

use \BkppGaleryVideoItems;
use \BkppGaleryVideoItemsQuery;
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
 * This class defines the structure of the 'bkpp_galery_video_items' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BkppGaleryVideoItemsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BkppGaleryVideoItemsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'bkpp_galery_video_items';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\BkppGaleryVideoItems';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'BkppGaleryVideoItems';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the id field
     */
    const COL_ID = 'bkpp_galery_video_items.id';

    /**
     * the column name for the galery_id field
     */
    const COL_GALERY_ID = 'bkpp_galery_video_items.galery_id';

    /**
     * the column name for the judul field
     */
    const COL_JUDUL = 'bkpp_galery_video_items.judul';

    /**
     * the column name for the url field
     */
    const COL_URL = 'bkpp_galery_video_items.url';

    /**
     * the column name for the keterangan field
     */
    const COL_KETERANGAN = 'bkpp_galery_video_items.keterangan';

    /**
     * the column name for the tgl_dibuat field
     */
    const COL_TGL_DIBUAT = 'bkpp_galery_video_items.tgl_dibuat';

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
        self::TYPE_PHPNAME       => array('Id', 'GaleryId', 'Judul', 'Url', 'Keterangan', 'TglDibuat', ),
        self::TYPE_CAMELNAME     => array('id', 'galeryId', 'judul', 'url', 'keterangan', 'tglDibuat', ),
        self::TYPE_COLNAME       => array(BkppGaleryVideoItemsTableMap::COL_ID, BkppGaleryVideoItemsTableMap::COL_GALERY_ID, BkppGaleryVideoItemsTableMap::COL_JUDUL, BkppGaleryVideoItemsTableMap::COL_URL, BkppGaleryVideoItemsTableMap::COL_KETERANGAN, BkppGaleryVideoItemsTableMap::COL_TGL_DIBUAT, ),
        self::TYPE_FIELDNAME     => array('id', 'galery_id', 'judul', 'url', 'keterangan', 'tgl_dibuat', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'GaleryId' => 1, 'Judul' => 2, 'Url' => 3, 'Keterangan' => 4, 'TglDibuat' => 5, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'galeryId' => 1, 'judul' => 2, 'url' => 3, 'keterangan' => 4, 'tglDibuat' => 5, ),
        self::TYPE_COLNAME       => array(BkppGaleryVideoItemsTableMap::COL_ID => 0, BkppGaleryVideoItemsTableMap::COL_GALERY_ID => 1, BkppGaleryVideoItemsTableMap::COL_JUDUL => 2, BkppGaleryVideoItemsTableMap::COL_URL => 3, BkppGaleryVideoItemsTableMap::COL_KETERANGAN => 4, BkppGaleryVideoItemsTableMap::COL_TGL_DIBUAT => 5, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'galery_id' => 1, 'judul' => 2, 'url' => 3, 'keterangan' => 4, 'tgl_dibuat' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('bkpp_galery_video_items');
        $this->setPhpName('BkppGaleryVideoItems');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\BkppGaleryVideoItems');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('galery_id', 'GaleryId', 'INTEGER', true, null, null);
        $this->addColumn('judul', 'Judul', 'VARCHAR', true, 300, '');
        $this->addColumn('url', 'Url', 'VARCHAR', true, 300, null);
        $this->addColumn('keterangan', 'Keterangan', 'LONGVARCHAR', true, null, null);
        $this->addColumn('tgl_dibuat', 'TglDibuat', 'DATE', false, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? BkppGaleryVideoItemsTableMap::CLASS_DEFAULT : BkppGaleryVideoItemsTableMap::OM_CLASS;
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
     * @return array           (BkppGaleryVideoItems object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BkppGaleryVideoItemsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BkppGaleryVideoItemsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BkppGaleryVideoItemsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BkppGaleryVideoItemsTableMap::OM_CLASS;
            /** @var BkppGaleryVideoItems $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BkppGaleryVideoItemsTableMap::addInstanceToPool($obj, $key);
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
            $key = BkppGaleryVideoItemsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BkppGaleryVideoItemsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var BkppGaleryVideoItems $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BkppGaleryVideoItemsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BkppGaleryVideoItemsTableMap::COL_ID);
            $criteria->addSelectColumn(BkppGaleryVideoItemsTableMap::COL_GALERY_ID);
            $criteria->addSelectColumn(BkppGaleryVideoItemsTableMap::COL_JUDUL);
            $criteria->addSelectColumn(BkppGaleryVideoItemsTableMap::COL_URL);
            $criteria->addSelectColumn(BkppGaleryVideoItemsTableMap::COL_KETERANGAN);
            $criteria->addSelectColumn(BkppGaleryVideoItemsTableMap::COL_TGL_DIBUAT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.galery_id');
            $criteria->addSelectColumn($alias . '.judul');
            $criteria->addSelectColumn($alias . '.url');
            $criteria->addSelectColumn($alias . '.keterangan');
            $criteria->addSelectColumn($alias . '.tgl_dibuat');
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
        return Propel::getServiceContainer()->getDatabaseMap(BkppGaleryVideoItemsTableMap::DATABASE_NAME)->getTable(BkppGaleryVideoItemsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BkppGaleryVideoItemsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BkppGaleryVideoItemsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BkppGaleryVideoItemsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a BkppGaleryVideoItems or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or BkppGaleryVideoItems object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppGaleryVideoItemsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \BkppGaleryVideoItems) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BkppGaleryVideoItemsTableMap::DATABASE_NAME);
            $criteria->add(BkppGaleryVideoItemsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = BkppGaleryVideoItemsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BkppGaleryVideoItemsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BkppGaleryVideoItemsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the bkpp_galery_video_items table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BkppGaleryVideoItemsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a BkppGaleryVideoItems or Criteria object.
     *
     * @param mixed               $criteria Criteria or BkppGaleryVideoItems object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppGaleryVideoItemsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from BkppGaleryVideoItems object
        }

        if ($criteria->containsKey(BkppGaleryVideoItemsTableMap::COL_ID) && $criteria->keyContainsValue(BkppGaleryVideoItemsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BkppGaleryVideoItemsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = BkppGaleryVideoItemsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BkppGaleryVideoItemsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BkppGaleryVideoItemsTableMap::buildTableMap();
