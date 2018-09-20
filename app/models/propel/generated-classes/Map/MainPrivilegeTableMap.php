<?php

namespace Map;

use \MainPrivilege;
use \MainPrivilegeQuery;
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
 * This class defines the structure of the 'main_privilege' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MainPrivilegeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MainPrivilegeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'main_privilege';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MainPrivilege';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MainPrivilege';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the privilege_id field
     */
    const COL_PRIVILEGE_ID = 'main_privilege.privilege_id';

    /**
     * the column name for the privilege_name field
     */
    const COL_PRIVILEGE_NAME = 'main_privilege.privilege_name';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'main_privilege.title';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'main_privilege.description';

    /**
     * the column name for the authorization_id field
     */
    const COL_AUTHORIZATION_ID = 'main_privilege.authorization_id';

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
        self::TYPE_PHPNAME       => array('PrivilegeId', 'PrivilegeName', 'Title', 'Description', 'AuthorizationId', ),
        self::TYPE_CAMELNAME     => array('privilegeId', 'privilegeName', 'title', 'description', 'authorizationId', ),
        self::TYPE_COLNAME       => array(MainPrivilegeTableMap::COL_PRIVILEGE_ID, MainPrivilegeTableMap::COL_PRIVILEGE_NAME, MainPrivilegeTableMap::COL_TITLE, MainPrivilegeTableMap::COL_DESCRIPTION, MainPrivilegeTableMap::COL_AUTHORIZATION_ID, ),
        self::TYPE_FIELDNAME     => array('privilege_id', 'privilege_name', 'title', 'description', 'authorization_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('PrivilegeId' => 0, 'PrivilegeName' => 1, 'Title' => 2, 'Description' => 3, 'AuthorizationId' => 4, ),
        self::TYPE_CAMELNAME     => array('privilegeId' => 0, 'privilegeName' => 1, 'title' => 2, 'description' => 3, 'authorizationId' => 4, ),
        self::TYPE_COLNAME       => array(MainPrivilegeTableMap::COL_PRIVILEGE_ID => 0, MainPrivilegeTableMap::COL_PRIVILEGE_NAME => 1, MainPrivilegeTableMap::COL_TITLE => 2, MainPrivilegeTableMap::COL_DESCRIPTION => 3, MainPrivilegeTableMap::COL_AUTHORIZATION_ID => 4, ),
        self::TYPE_FIELDNAME     => array('privilege_id' => 0, 'privilege_name' => 1, 'title' => 2, 'description' => 3, 'authorization_id' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
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
        $this->setName('main_privilege');
        $this->setPhpName('MainPrivilege');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\MainPrivilege');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('privilege_id', 'PrivilegeId', 'INTEGER', true, 20, null);
        $this->addColumn('privilege_name', 'PrivilegeName', 'VARCHAR', true, 50, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 50, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('authorization_id', 'AuthorizationId', 'INTEGER', true, 5, 1);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PrivilegeId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PrivilegeId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PrivilegeId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PrivilegeId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PrivilegeId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PrivilegeId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('PrivilegeId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? MainPrivilegeTableMap::CLASS_DEFAULT : MainPrivilegeTableMap::OM_CLASS;
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
     * @return array           (MainPrivilege object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MainPrivilegeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MainPrivilegeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MainPrivilegeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MainPrivilegeTableMap::OM_CLASS;
            /** @var MainPrivilege $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MainPrivilegeTableMap::addInstanceToPool($obj, $key);
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
            $key = MainPrivilegeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MainPrivilegeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MainPrivilege $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MainPrivilegeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MainPrivilegeTableMap::COL_PRIVILEGE_ID);
            $criteria->addSelectColumn(MainPrivilegeTableMap::COL_PRIVILEGE_NAME);
            $criteria->addSelectColumn(MainPrivilegeTableMap::COL_TITLE);
            $criteria->addSelectColumn(MainPrivilegeTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(MainPrivilegeTableMap::COL_AUTHORIZATION_ID);
        } else {
            $criteria->addSelectColumn($alias . '.privilege_id');
            $criteria->addSelectColumn($alias . '.privilege_name');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.authorization_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(MainPrivilegeTableMap::DATABASE_NAME)->getTable(MainPrivilegeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MainPrivilegeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MainPrivilegeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MainPrivilegeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MainPrivilege or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MainPrivilege object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MainPrivilegeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MainPrivilege) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MainPrivilegeTableMap::DATABASE_NAME);
            $criteria->add(MainPrivilegeTableMap::COL_PRIVILEGE_ID, (array) $values, Criteria::IN);
        }

        $query = MainPrivilegeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MainPrivilegeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MainPrivilegeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the main_privilege table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MainPrivilegeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MainPrivilege or Criteria object.
     *
     * @param mixed               $criteria Criteria or MainPrivilege object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainPrivilegeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MainPrivilege object
        }

        if ($criteria->containsKey(MainPrivilegeTableMap::COL_PRIVILEGE_ID) && $criteria->keyContainsValue(MainPrivilegeTableMap::COL_PRIVILEGE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MainPrivilegeTableMap::COL_PRIVILEGE_ID.')');
        }


        // Set the correct dbName
        $query = MainPrivilegeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MainPrivilegeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MainPrivilegeTableMap::buildTableMap();
