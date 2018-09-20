<?php

namespace Map;

use \BkppBanner;
use \BkppBannerQuery;
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
 * This class defines the structure of the 'bkpp_banner' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BkppBannerTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BkppBannerTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'bkpp_banner';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\BkppBanner';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'BkppBanner';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'bkpp_banner.id';

    /**
     * the column name for the gambar field
     */
    const COL_GAMBAR = 'bkpp_banner.gambar';

    /**
     * the column name for the judul field
     */
    const COL_JUDUL = 'bkpp_banner.judul';

    /**
     * the column name for the keterangan field
     */
    const COL_KETERANGAN = 'bkpp_banner.keterangan';

    /**
     * the column name for the publish field
     */
    const COL_PUBLISH = 'bkpp_banner.publish';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'bkpp_banner.date';

    /**
     * the column name for the link field
     */
    const COL_LINK = 'bkpp_banner.link';

    /**
     * the column name for the cat field
     */
    const COL_CAT = 'bkpp_banner.cat';

    /**
     * the column name for the value field
     */
    const COL_VALUE = 'bkpp_banner.value';

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
        self::TYPE_PHPNAME       => array('Id', 'Gambar', 'Judul', 'Keterangan', 'Publish', 'Date', 'Link', 'Cat', 'Value', ),
        self::TYPE_CAMELNAME     => array('id', 'gambar', 'judul', 'keterangan', 'publish', 'date', 'link', 'cat', 'value', ),
        self::TYPE_COLNAME       => array(BkppBannerTableMap::COL_ID, BkppBannerTableMap::COL_GAMBAR, BkppBannerTableMap::COL_JUDUL, BkppBannerTableMap::COL_KETERANGAN, BkppBannerTableMap::COL_PUBLISH, BkppBannerTableMap::COL_DATE, BkppBannerTableMap::COL_LINK, BkppBannerTableMap::COL_CAT, BkppBannerTableMap::COL_VALUE, ),
        self::TYPE_FIELDNAME     => array('id', 'gambar', 'judul', 'keterangan', 'publish', 'date', 'link', 'cat', 'value', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Gambar' => 1, 'Judul' => 2, 'Keterangan' => 3, 'Publish' => 4, 'Date' => 5, 'Link' => 6, 'Cat' => 7, 'Value' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'gambar' => 1, 'judul' => 2, 'keterangan' => 3, 'publish' => 4, 'date' => 5, 'link' => 6, 'cat' => 7, 'value' => 8, ),
        self::TYPE_COLNAME       => array(BkppBannerTableMap::COL_ID => 0, BkppBannerTableMap::COL_GAMBAR => 1, BkppBannerTableMap::COL_JUDUL => 2, BkppBannerTableMap::COL_KETERANGAN => 3, BkppBannerTableMap::COL_PUBLISH => 4, BkppBannerTableMap::COL_DATE => 5, BkppBannerTableMap::COL_LINK => 6, BkppBannerTableMap::COL_CAT => 7, BkppBannerTableMap::COL_VALUE => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'gambar' => 1, 'judul' => 2, 'keterangan' => 3, 'publish' => 4, 'date' => 5, 'link' => 6, 'cat' => 7, 'value' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('bkpp_banner');
        $this->setPhpName('BkppBanner');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\BkppBanner');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('gambar', 'Gambar', 'VARCHAR', false, 300, null);
        $this->addColumn('judul', 'Judul', 'VARCHAR', false, 300, '');
        $this->addColumn('keterangan', 'Keterangan', 'LONGVARCHAR', false, null, null);
        $this->addColumn('publish', 'Publish', 'INTEGER', false, 1, 1);
        $this->addColumn('date', 'Date', 'DATE', false, null, null);
        $this->addColumn('link', 'Link', 'VARCHAR', false, 255, null);
        $this->addColumn('cat', 'Cat', 'VARCHAR', true, 255, null);
        $this->addColumn('value', 'Value', 'VARCHAR', false, 255, null);
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
        return $withPrefix ? BkppBannerTableMap::CLASS_DEFAULT : BkppBannerTableMap::OM_CLASS;
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
     * @return array           (BkppBanner object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BkppBannerTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BkppBannerTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BkppBannerTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BkppBannerTableMap::OM_CLASS;
            /** @var BkppBanner $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BkppBannerTableMap::addInstanceToPool($obj, $key);
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
            $key = BkppBannerTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BkppBannerTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var BkppBanner $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BkppBannerTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BkppBannerTableMap::COL_ID);
            $criteria->addSelectColumn(BkppBannerTableMap::COL_GAMBAR);
            $criteria->addSelectColumn(BkppBannerTableMap::COL_JUDUL);
            $criteria->addSelectColumn(BkppBannerTableMap::COL_KETERANGAN);
            $criteria->addSelectColumn(BkppBannerTableMap::COL_PUBLISH);
            $criteria->addSelectColumn(BkppBannerTableMap::COL_DATE);
            $criteria->addSelectColumn(BkppBannerTableMap::COL_LINK);
            $criteria->addSelectColumn(BkppBannerTableMap::COL_CAT);
            $criteria->addSelectColumn(BkppBannerTableMap::COL_VALUE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.gambar');
            $criteria->addSelectColumn($alias . '.judul');
            $criteria->addSelectColumn($alias . '.keterangan');
            $criteria->addSelectColumn($alias . '.publish');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.link');
            $criteria->addSelectColumn($alias . '.cat');
            $criteria->addSelectColumn($alias . '.value');
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
        return Propel::getServiceContainer()->getDatabaseMap(BkppBannerTableMap::DATABASE_NAME)->getTable(BkppBannerTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BkppBannerTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BkppBannerTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BkppBannerTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a BkppBanner or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or BkppBanner object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppBannerTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \BkppBanner) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BkppBannerTableMap::DATABASE_NAME);
            $criteria->add(BkppBannerTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = BkppBannerQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BkppBannerTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BkppBannerTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the bkpp_banner table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BkppBannerQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a BkppBanner or Criteria object.
     *
     * @param mixed               $criteria Criteria or BkppBanner object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppBannerTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from BkppBanner object
        }

        if ($criteria->containsKey(BkppBannerTableMap::COL_ID) && $criteria->keyContainsValue(BkppBannerTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BkppBannerTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = BkppBannerQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BkppBannerTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BkppBannerTableMap::buildTableMap();
