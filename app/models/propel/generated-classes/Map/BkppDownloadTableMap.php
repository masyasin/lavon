<?php

namespace Map;

use \BkppDownload;
use \BkppDownloadQuery;
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
 * This class defines the structure of the 'bkpp_download' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BkppDownloadTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BkppDownloadTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'bkpp_download';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\BkppDownload';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'BkppDownload';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    const COL_ID = 'bkpp_download.id';

    /**
     * the column name for the judul field
     */
    const COL_JUDUL = 'bkpp_download.judul';

    /**
     * the column name for the keterangan field
     */
    const COL_KETERANGAN = 'bkpp_download.keterangan';

    /**
     * the column name for the file field
     */
    const COL_FILE = 'bkpp_download.file';

    /**
     * the column name for the kategori field
     */
    const COL_KATEGORI = 'bkpp_download.kategori';

    /**
     * the column name for the uploader field
     */
    const COL_UPLOADER = 'bkpp_download.uploader';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'bkpp_download.date';

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
        self::TYPE_PHPNAME       => array('Id', 'Judul', 'Keterangan', 'File', 'Kategori', 'Uploader', 'Date', ),
        self::TYPE_CAMELNAME     => array('id', 'judul', 'keterangan', 'file', 'kategori', 'uploader', 'date', ),
        self::TYPE_COLNAME       => array(BkppDownloadTableMap::COL_ID, BkppDownloadTableMap::COL_JUDUL, BkppDownloadTableMap::COL_KETERANGAN, BkppDownloadTableMap::COL_FILE, BkppDownloadTableMap::COL_KATEGORI, BkppDownloadTableMap::COL_UPLOADER, BkppDownloadTableMap::COL_DATE, ),
        self::TYPE_FIELDNAME     => array('id', 'judul', 'keterangan', 'file', 'kategori', 'uploader', 'date', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Judul' => 1, 'Keterangan' => 2, 'File' => 3, 'Kategori' => 4, 'Uploader' => 5, 'Date' => 6, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'judul' => 1, 'keterangan' => 2, 'file' => 3, 'kategori' => 4, 'uploader' => 5, 'date' => 6, ),
        self::TYPE_COLNAME       => array(BkppDownloadTableMap::COL_ID => 0, BkppDownloadTableMap::COL_JUDUL => 1, BkppDownloadTableMap::COL_KETERANGAN => 2, BkppDownloadTableMap::COL_FILE => 3, BkppDownloadTableMap::COL_KATEGORI => 4, BkppDownloadTableMap::COL_UPLOADER => 5, BkppDownloadTableMap::COL_DATE => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'judul' => 1, 'keterangan' => 2, 'file' => 3, 'kategori' => 4, 'uploader' => 5, 'date' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('bkpp_download');
        $this->setPhpName('BkppDownload');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\BkppDownload');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('judul', 'Judul', 'VARCHAR', true, 100, null);
        $this->addColumn('keterangan', 'Keterangan', 'LONGVARCHAR', false, null, null);
        $this->addColumn('file', 'File', 'VARCHAR', true, 100, null);
        $this->addColumn('kategori', 'Kategori', 'VARCHAR', true, 20, null);
        $this->addColumn('uploader', 'Uploader', 'VARCHAR', true, 100, null);
        $this->addColumn('date', 'Date', 'DATE', false, null, null);
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
        return $withPrefix ? BkppDownloadTableMap::CLASS_DEFAULT : BkppDownloadTableMap::OM_CLASS;
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
     * @return array           (BkppDownload object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BkppDownloadTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BkppDownloadTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BkppDownloadTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BkppDownloadTableMap::OM_CLASS;
            /** @var BkppDownload $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BkppDownloadTableMap::addInstanceToPool($obj, $key);
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
            $key = BkppDownloadTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BkppDownloadTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var BkppDownload $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BkppDownloadTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BkppDownloadTableMap::COL_ID);
            $criteria->addSelectColumn(BkppDownloadTableMap::COL_JUDUL);
            $criteria->addSelectColumn(BkppDownloadTableMap::COL_KETERANGAN);
            $criteria->addSelectColumn(BkppDownloadTableMap::COL_FILE);
            $criteria->addSelectColumn(BkppDownloadTableMap::COL_KATEGORI);
            $criteria->addSelectColumn(BkppDownloadTableMap::COL_UPLOADER);
            $criteria->addSelectColumn(BkppDownloadTableMap::COL_DATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.judul');
            $criteria->addSelectColumn($alias . '.keterangan');
            $criteria->addSelectColumn($alias . '.file');
            $criteria->addSelectColumn($alias . '.kategori');
            $criteria->addSelectColumn($alias . '.uploader');
            $criteria->addSelectColumn($alias . '.date');
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
        return Propel::getServiceContainer()->getDatabaseMap(BkppDownloadTableMap::DATABASE_NAME)->getTable(BkppDownloadTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BkppDownloadTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BkppDownloadTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BkppDownloadTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a BkppDownload or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or BkppDownload object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppDownloadTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \BkppDownload) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BkppDownloadTableMap::DATABASE_NAME);
            $criteria->add(BkppDownloadTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = BkppDownloadQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BkppDownloadTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BkppDownloadTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the bkpp_download table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BkppDownloadQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a BkppDownload or Criteria object.
     *
     * @param mixed               $criteria Criteria or BkppDownload object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppDownloadTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from BkppDownload object
        }

        if ($criteria->containsKey(BkppDownloadTableMap::COL_ID) && $criteria->keyContainsValue(BkppDownloadTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BkppDownloadTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = BkppDownloadQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BkppDownloadTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BkppDownloadTableMap::buildTableMap();
