<?php

namespace Map;

use \BkppAgendaKegiatan;
use \BkppAgendaKegiatanQuery;
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
 * This class defines the structure of the 'bkpp_agenda_kegiatan' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BkppAgendaKegiatanTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BkppAgendaKegiatanTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'bkpp_agenda_kegiatan';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\BkppAgendaKegiatan';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'BkppAgendaKegiatan';

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
     * the column name for the id field
     */
    const COL_ID = 'bkpp_agenda_kegiatan.id';

    /**
     * the column name for the judul field
     */
    const COL_JUDUL = 'bkpp_agenda_kegiatan.judul';

    /**
     * the column name for the gambar field
     */
    const COL_GAMBAR = 'bkpp_agenda_kegiatan.gambar';

    /**
     * the column name for the keterangan_gambar field
     */
    const COL_KETERANGAN_GAMBAR = 'bkpp_agenda_kegiatan.keterangan_gambar';

    /**
     * the column name for the slug field
     */
    const COL_SLUG = 'bkpp_agenda_kegiatan.slug';

    /**
     * the column name for the tempat field
     */
    const COL_TEMPAT = 'bkpp_agenda_kegiatan.tempat';

    /**
     * the column name for the keterangan field
     */
    const COL_KETERANGAN = 'bkpp_agenda_kegiatan.keterangan';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'bkpp_agenda_kegiatan.date';

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
        self::TYPE_PHPNAME       => array('Id', 'Judul', 'Gambar', 'KeteranganGambar', 'Slug', 'Tempat', 'Keterangan', 'Date', ),
        self::TYPE_CAMELNAME     => array('id', 'judul', 'gambar', 'keteranganGambar', 'slug', 'tempat', 'keterangan', 'date', ),
        self::TYPE_COLNAME       => array(BkppAgendaKegiatanTableMap::COL_ID, BkppAgendaKegiatanTableMap::COL_JUDUL, BkppAgendaKegiatanTableMap::COL_GAMBAR, BkppAgendaKegiatanTableMap::COL_KETERANGAN_GAMBAR, BkppAgendaKegiatanTableMap::COL_SLUG, BkppAgendaKegiatanTableMap::COL_TEMPAT, BkppAgendaKegiatanTableMap::COL_KETERANGAN, BkppAgendaKegiatanTableMap::COL_DATE, ),
        self::TYPE_FIELDNAME     => array('id', 'judul', 'gambar', 'keterangan_gambar', 'slug', 'tempat', 'keterangan', 'date', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Judul' => 1, 'Gambar' => 2, 'KeteranganGambar' => 3, 'Slug' => 4, 'Tempat' => 5, 'Keterangan' => 6, 'Date' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'judul' => 1, 'gambar' => 2, 'keteranganGambar' => 3, 'slug' => 4, 'tempat' => 5, 'keterangan' => 6, 'date' => 7, ),
        self::TYPE_COLNAME       => array(BkppAgendaKegiatanTableMap::COL_ID => 0, BkppAgendaKegiatanTableMap::COL_JUDUL => 1, BkppAgendaKegiatanTableMap::COL_GAMBAR => 2, BkppAgendaKegiatanTableMap::COL_KETERANGAN_GAMBAR => 3, BkppAgendaKegiatanTableMap::COL_SLUG => 4, BkppAgendaKegiatanTableMap::COL_TEMPAT => 5, BkppAgendaKegiatanTableMap::COL_KETERANGAN => 6, BkppAgendaKegiatanTableMap::COL_DATE => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'judul' => 1, 'gambar' => 2, 'keterangan_gambar' => 3, 'slug' => 4, 'tempat' => 5, 'keterangan' => 6, 'date' => 7, ),
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
        $this->setName('bkpp_agenda_kegiatan');
        $this->setPhpName('BkppAgendaKegiatan');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\BkppAgendaKegiatan');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('judul', 'Judul', 'VARCHAR', true, 300, null);
        $this->addColumn('gambar', 'Gambar', 'VARCHAR', true, 300, null);
        $this->addColumn('keterangan_gambar', 'KeteranganGambar', 'VARCHAR', false, 400, null);
        $this->addColumn('slug', 'Slug', 'VARCHAR', false, 300, null);
        $this->addColumn('tempat', 'Tempat', 'VARCHAR', false, 300, null);
        $this->addColumn('keterangan', 'Keterangan', 'VARCHAR', true, 300, null);
        $this->addColumn('date', 'Date', 'TIMESTAMP', false, null, null);
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
        return $withPrefix ? BkppAgendaKegiatanTableMap::CLASS_DEFAULT : BkppAgendaKegiatanTableMap::OM_CLASS;
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
     * @return array           (BkppAgendaKegiatan object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BkppAgendaKegiatanTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BkppAgendaKegiatanTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BkppAgendaKegiatanTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BkppAgendaKegiatanTableMap::OM_CLASS;
            /** @var BkppAgendaKegiatan $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BkppAgendaKegiatanTableMap::addInstanceToPool($obj, $key);
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
            $key = BkppAgendaKegiatanTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BkppAgendaKegiatanTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var BkppAgendaKegiatan $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BkppAgendaKegiatanTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BkppAgendaKegiatanTableMap::COL_ID);
            $criteria->addSelectColumn(BkppAgendaKegiatanTableMap::COL_JUDUL);
            $criteria->addSelectColumn(BkppAgendaKegiatanTableMap::COL_GAMBAR);
            $criteria->addSelectColumn(BkppAgendaKegiatanTableMap::COL_KETERANGAN_GAMBAR);
            $criteria->addSelectColumn(BkppAgendaKegiatanTableMap::COL_SLUG);
            $criteria->addSelectColumn(BkppAgendaKegiatanTableMap::COL_TEMPAT);
            $criteria->addSelectColumn(BkppAgendaKegiatanTableMap::COL_KETERANGAN);
            $criteria->addSelectColumn(BkppAgendaKegiatanTableMap::COL_DATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.judul');
            $criteria->addSelectColumn($alias . '.gambar');
            $criteria->addSelectColumn($alias . '.keterangan_gambar');
            $criteria->addSelectColumn($alias . '.slug');
            $criteria->addSelectColumn($alias . '.tempat');
            $criteria->addSelectColumn($alias . '.keterangan');
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
        return Propel::getServiceContainer()->getDatabaseMap(BkppAgendaKegiatanTableMap::DATABASE_NAME)->getTable(BkppAgendaKegiatanTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BkppAgendaKegiatanTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BkppAgendaKegiatanTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BkppAgendaKegiatanTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a BkppAgendaKegiatan or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or BkppAgendaKegiatan object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppAgendaKegiatanTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \BkppAgendaKegiatan) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BkppAgendaKegiatanTableMap::DATABASE_NAME);
            $criteria->add(BkppAgendaKegiatanTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = BkppAgendaKegiatanQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BkppAgendaKegiatanTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BkppAgendaKegiatanTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the bkpp_agenda_kegiatan table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BkppAgendaKegiatanQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a BkppAgendaKegiatan or Criteria object.
     *
     * @param mixed               $criteria Criteria or BkppAgendaKegiatan object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppAgendaKegiatanTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from BkppAgendaKegiatan object
        }

        if ($criteria->containsKey(BkppAgendaKegiatanTableMap::COL_ID) && $criteria->keyContainsValue(BkppAgendaKegiatanTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BkppAgendaKegiatanTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = BkppAgendaKegiatanQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BkppAgendaKegiatanTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BkppAgendaKegiatanTableMap::buildTableMap();
