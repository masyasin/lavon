<?php

namespace Map;

use \BkppBukuTamu;
use \BkppBukuTamuQuery;
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
 * This class defines the structure of the 'bkpp_buku_tamu' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BkppBukuTamuTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BkppBukuTamuTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'bkpp_buku_tamu';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\BkppBukuTamu';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'BkppBukuTamu';

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
    const COL_ID = 'bkpp_buku_tamu.id';

    /**
     * the column name for the nama field
     */
    const COL_NAMA = 'bkpp_buku_tamu.nama';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'bkpp_buku_tamu.email';

    /**
     * the column name for the isi field
     */
    const COL_ISI = 'bkpp_buku_tamu.isi';

    /**
     * the column name for the jawaban field
     */
    const COL_JAWABAN = 'bkpp_buku_tamu.jawaban';

    /**
     * the column name for the publish field
     */
    const COL_PUBLISH = 'bkpp_buku_tamu.publish';

    /**
     * the column name for the tanggal field
     */
    const COL_TANGGAL = 'bkpp_buku_tamu.tanggal';

    /**
     * the column name for the tanggal_dijawab field
     */
    const COL_TANGGAL_DIJAWAB = 'bkpp_buku_tamu.tanggal_dijawab';

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
        self::TYPE_PHPNAME       => array('Id', 'Nama', 'Email', 'Isi', 'Jawaban', 'Publish', 'Tanggal', 'TanggalDijawab', ),
        self::TYPE_CAMELNAME     => array('id', 'nama', 'email', 'isi', 'jawaban', 'publish', 'tanggal', 'tanggalDijawab', ),
        self::TYPE_COLNAME       => array(BkppBukuTamuTableMap::COL_ID, BkppBukuTamuTableMap::COL_NAMA, BkppBukuTamuTableMap::COL_EMAIL, BkppBukuTamuTableMap::COL_ISI, BkppBukuTamuTableMap::COL_JAWABAN, BkppBukuTamuTableMap::COL_PUBLISH, BkppBukuTamuTableMap::COL_TANGGAL, BkppBukuTamuTableMap::COL_TANGGAL_DIJAWAB, ),
        self::TYPE_FIELDNAME     => array('id', 'nama', 'email', 'isi', 'jawaban', 'publish', 'tanggal', 'tanggal_dijawab', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Nama' => 1, 'Email' => 2, 'Isi' => 3, 'Jawaban' => 4, 'Publish' => 5, 'Tanggal' => 6, 'TanggalDijawab' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'nama' => 1, 'email' => 2, 'isi' => 3, 'jawaban' => 4, 'publish' => 5, 'tanggal' => 6, 'tanggalDijawab' => 7, ),
        self::TYPE_COLNAME       => array(BkppBukuTamuTableMap::COL_ID => 0, BkppBukuTamuTableMap::COL_NAMA => 1, BkppBukuTamuTableMap::COL_EMAIL => 2, BkppBukuTamuTableMap::COL_ISI => 3, BkppBukuTamuTableMap::COL_JAWABAN => 4, BkppBukuTamuTableMap::COL_PUBLISH => 5, BkppBukuTamuTableMap::COL_TANGGAL => 6, BkppBukuTamuTableMap::COL_TANGGAL_DIJAWAB => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'nama' => 1, 'email' => 2, 'isi' => 3, 'jawaban' => 4, 'publish' => 5, 'tanggal' => 6, 'tanggal_dijawab' => 7, ),
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
        $this->setName('bkpp_buku_tamu');
        $this->setPhpName('BkppBukuTamu');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\BkppBukuTamu');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 5, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 80, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 80, null);
        $this->addColumn('isi', 'Isi', 'LONGVARCHAR', true, null, null);
        $this->addColumn('jawaban', 'Jawaban', 'LONGVARCHAR', true, null, null);
        $this->addColumn('publish', 'Publish', 'INTEGER', true, null, 1);
        $this->addColumn('tanggal', 'Tanggal', 'TIMESTAMP', false, null, null);
        $this->addColumn('tanggal_dijawab', 'TanggalDijawab', 'TIMESTAMP', false, null, null);
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
        return $withPrefix ? BkppBukuTamuTableMap::CLASS_DEFAULT : BkppBukuTamuTableMap::OM_CLASS;
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
     * @return array           (BkppBukuTamu object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BkppBukuTamuTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BkppBukuTamuTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BkppBukuTamuTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BkppBukuTamuTableMap::OM_CLASS;
            /** @var BkppBukuTamu $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BkppBukuTamuTableMap::addInstanceToPool($obj, $key);
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
            $key = BkppBukuTamuTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BkppBukuTamuTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var BkppBukuTamu $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BkppBukuTamuTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BkppBukuTamuTableMap::COL_ID);
            $criteria->addSelectColumn(BkppBukuTamuTableMap::COL_NAMA);
            $criteria->addSelectColumn(BkppBukuTamuTableMap::COL_EMAIL);
            $criteria->addSelectColumn(BkppBukuTamuTableMap::COL_ISI);
            $criteria->addSelectColumn(BkppBukuTamuTableMap::COL_JAWABAN);
            $criteria->addSelectColumn(BkppBukuTamuTableMap::COL_PUBLISH);
            $criteria->addSelectColumn(BkppBukuTamuTableMap::COL_TANGGAL);
            $criteria->addSelectColumn(BkppBukuTamuTableMap::COL_TANGGAL_DIJAWAB);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.isi');
            $criteria->addSelectColumn($alias . '.jawaban');
            $criteria->addSelectColumn($alias . '.publish');
            $criteria->addSelectColumn($alias . '.tanggal');
            $criteria->addSelectColumn($alias . '.tanggal_dijawab');
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
        return Propel::getServiceContainer()->getDatabaseMap(BkppBukuTamuTableMap::DATABASE_NAME)->getTable(BkppBukuTamuTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BkppBukuTamuTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BkppBukuTamuTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BkppBukuTamuTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a BkppBukuTamu or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or BkppBukuTamu object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BkppBukuTamuTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \BkppBukuTamu) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BkppBukuTamuTableMap::DATABASE_NAME);
            $criteria->add(BkppBukuTamuTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = BkppBukuTamuQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BkppBukuTamuTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BkppBukuTamuTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the bkpp_buku_tamu table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BkppBukuTamuQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a BkppBukuTamu or Criteria object.
     *
     * @param mixed               $criteria Criteria or BkppBukuTamu object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppBukuTamuTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from BkppBukuTamu object
        }

        if ($criteria->containsKey(BkppBukuTamuTableMap::COL_ID) && $criteria->keyContainsValue(BkppBukuTamuTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BkppBukuTamuTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = BkppBukuTamuQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BkppBukuTamuTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BkppBukuTamuTableMap::buildTableMap();
