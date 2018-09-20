<?php

namespace Map;

use \BkppGaleryImageItems;
use \BkppGaleryImageItemsQuery;
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
 * This class defines the structure of the 'bkpp_galery_image_items' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BkppGaleryImageItemsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BkppGaleryImageItemsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'bkpp_galery_image_items';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\BkppGaleryImageItems';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'BkppGaleryImageItems';

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
    const COL_ID = 'bkpp_galery_image_items.id';

    /**
     * the column name for the galery_id field
     */
    const COL_GALERY_ID = 'bkpp_galery_image_items.galery_id';

    /**
     * the column name for the file field
     */
    const COL_FILE = 'bkpp_galery_image_items.file';

    /**
     * the column name for the judul field
     */
    const COL_JUDUL = 'bkpp_galery_image_items.judul';

    /**
     * the column name for the keterangan field
     */
    const COL_KETERANGAN = 'bkpp_galery_image_items.keterangan';

    /**
     * the column name for the tgl_dibuat field
     */
    const COL_TGL_DIBUAT = 'bkpp_galery_image_items.tgl_dibuat';

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
        self::TYPE_PHPNAME       => array('Id', 'GaleryId', 'File', 'Judul', 'Keterangan', 'TglDibuat', ),
        self::TYPE_CAMELNAME     => array('id', 'galeryId', 'file', 'judul', 'keterangan', 'tglDibuat', ),
        self::TYPE_COLNAME       => array(BkppGaleryImageItemsTableMap::COL_ID, BkppGaleryImageItemsTableMap::COL_GALERY_ID, BkppGaleryImageItemsTableMap::COL_FILE, BkppGaleryImageItemsTableMap::COL_JUDUL, BkppGaleryImageItemsTableMap::COL_KETERANGAN, BkppGaleryImageItemsTableMap::COL_TGL_DIBUAT, ),
        self::TYPE_FIELDNAME     => array('id', 'galery_id', 'file', 'judul', 'keterangan', 'tgl_dibuat', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'GaleryId' => 1, 'File' => 2, 'Judul' => 3, 'Keterangan' => 4, 'TglDibuat' => 5, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'galeryId' => 1, 'file' => 2, 'judul' => 3, 'keterangan' => 4, 'tglDibuat' => 5, ),
        self::TYPE_COLNAME       => array(BkppGaleryImageItemsTableMap::COL_ID => 0, BkppGaleryImageItemsTableMap::COL_GALERY_ID => 1, BkppGaleryImageItemsTableMap::COL_FILE => 2, BkppGaleryImageItemsTableMap::COL_JUDUL => 3, BkppGaleryImageItemsTableMap::COL_KETERANGAN => 4, BkppGaleryImageItemsTableMap::COL_TGL_DIBUAT => 5, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'galery_id' => 1, 'file' => 2, 'judul' => 3, 'keterangan' => 4, 'tgl_dibuat' => 5, ),
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
        $this->setName('bkpp_galery_image_items');
        $this->setPhpName('BkppGaleryImageItems');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\BkppGaleryImageItems');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('galery_id', 'GaleryId', 'INTEGER', true, null, null);
        $this->addColumn('file', 'File', 'VARCHAR', false, 300, null);
        $this->addColumn('judul', 'Judul', 'VARCHAR', false, 300, '');
        $this->addColumn('keterangan', 'Keterangan', 'LONGVARCHAR', false, null, null);
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
        return $withPrefix ? BkppGaleryImageItemsTableMap::CLASS_DEFAULT : BkppGaleryImageItemsTableMap::OM_CLASS;
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
     * @return array           (BkppGaleryImageItems object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BkppGaleryImageItemsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BkppGaleryImageItemsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BkppGaleryImageItemsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BkppGaleryImageItemsTableMap::OM_CLASS;
            /** @var BkppGaleryImageItems $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BkppGaleryImageItemsTableMap::addInstanceToPool($obj, $key);
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
            $key = BkppGaleryImageItemsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BkppGaleryImageItemsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var BkppGaleryImageItems $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BkppGaleryImageItemsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BkppGaleryImageItemsTableMap::COL_ID);
            $criteria->addSelectColumn(BkppGaleryImageItemsTableMap::COL_GALERY_ID);
            $criteria->addSelectColumn(BkppGaleryImageItemsTableMap::COL_FILE);
            $criteria->addSelectColumn(BkppGaleryImageItemsTableMap::COL_JUDUL);
            $criteria->addSelectColumn(BkppGaleryImageItemsTableMap::COL_KETERANGAN);
            $criteria->addSelectColumn(BkppGaleryImageItemsTableMap::COL_TGL_DIBUAT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.galery_id');
            $criteria->addSelectColumn($alias . '.file');
            $criteria->addSelectColumn($alias . '.judul');
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
        return Propel::getServiceContainer()->getDatabaseMap(BkppGaleryImageItemsTableMap::DATABASE_NAME)->getTable(BkppGaleryImageItemsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BkppGaleryImageItemsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BkppGaleryImageItemsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BkppGaleryImageItemsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a BkppGaleryImageItems or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or BkppGaleryImageItems object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppGaleryImageItemsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \BkppGaleryImageItems) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BkppGaleryImageItemsTableMap::DATABASE_NAME);
            $criteria->add(BkppGaleryImageItemsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = BkppGaleryImageItemsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BkppGaleryImageItemsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BkppGaleryImageItemsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the bkpp_galery_image_items table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BkppGaleryImageItemsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a BkppGaleryImageItems or Criteria object.
     *
     * @param mixed               $criteria Criteria or BkppGaleryImageItems object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppGaleryImageItemsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from BkppGaleryImageItems object
        }

        if ($criteria->containsKey(BkppGaleryImageItemsTableMap::COL_ID) && $criteria->keyContainsValue(BkppGaleryImageItemsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BkppGaleryImageItemsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = BkppGaleryImageItemsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BkppGaleryImageItemsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BkppGaleryImageItemsTableMap::buildTableMap();
