<?php

namespace Map;

use \MainUser;
use \MainUserQuery;
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
 * This class defines the structure of the 'main_user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MainUserTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MainUserTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'main_user';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MainUser';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MainUser';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 16;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 16;

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'main_user.user_id';

    /**
     * the column name for the user_name field
     */
    const COL_USER_NAME = 'main_user.user_name';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'main_user.email';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'main_user.password';

    /**
     * the column name for the activation_code field
     */
    const COL_ACTIVATION_CODE = 'main_user.activation_code';

    /**
     * the column name for the real_name field
     */
    const COL_REAL_NAME = 'main_user.real_name';

    /**
     * the column name for the active field
     */
    const COL_ACTIVE = 'main_user.active';

    /**
     * the column name for the auth_OpenID field
     */
    const COL_AUTH_OPENID = 'main_user.auth_OpenID';

    /**
     * the column name for the auth_Facebook field
     */
    const COL_AUTH_FACEBOOK = 'main_user.auth_Facebook';

    /**
     * the column name for the auth_Twitter field
     */
    const COL_AUTH_TWITTER = 'main_user.auth_Twitter';

    /**
     * the column name for the auth_Yahoo field
     */
    const COL_AUTH_YAHOO = 'main_user.auth_Yahoo';

    /**
     * the column name for the auth_LinkedIn field
     */
    const COL_AUTH_LINKEDIN = 'main_user.auth_LinkedIn';

    /**
     * the column name for the auth_MySpace field
     */
    const COL_AUTH_MYSPACE = 'main_user.auth_MySpace';

    /**
     * the column name for the auth_Foursquare field
     */
    const COL_AUTH_FOURSQUARE = 'main_user.auth_Foursquare';

    /**
     * the column name for the auth_AOL field
     */
    const COL_AUTH_AOL = 'main_user.auth_AOL';

    /**
     * the column name for the auth_Live field
     */
    const COL_AUTH_LIVE = 'main_user.auth_Live';

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
        self::TYPE_PHPNAME       => array('UserId', 'UserName', 'Email', 'Password', 'ActivationCode', 'RealName', 'Active', 'AuthOpenid', 'AuthFacebook', 'AuthTwitter', 'AuthYahoo', 'AuthLinkedin', 'AuthMyspace', 'AuthFoursquare', 'AuthAol', 'AuthLive', ),
        self::TYPE_CAMELNAME     => array('userId', 'userName', 'email', 'password', 'activationCode', 'realName', 'active', 'authOpenid', 'authFacebook', 'authTwitter', 'authYahoo', 'authLinkedin', 'authMyspace', 'authFoursquare', 'authAol', 'authLive', ),
        self::TYPE_COLNAME       => array(MainUserTableMap::COL_USER_ID, MainUserTableMap::COL_USER_NAME, MainUserTableMap::COL_EMAIL, MainUserTableMap::COL_PASSWORD, MainUserTableMap::COL_ACTIVATION_CODE, MainUserTableMap::COL_REAL_NAME, MainUserTableMap::COL_ACTIVE, MainUserTableMap::COL_AUTH_OPENID, MainUserTableMap::COL_AUTH_FACEBOOK, MainUserTableMap::COL_AUTH_TWITTER, MainUserTableMap::COL_AUTH_YAHOO, MainUserTableMap::COL_AUTH_LINKEDIN, MainUserTableMap::COL_AUTH_MYSPACE, MainUserTableMap::COL_AUTH_FOURSQUARE, MainUserTableMap::COL_AUTH_AOL, MainUserTableMap::COL_AUTH_LIVE, ),
        self::TYPE_FIELDNAME     => array('user_id', 'user_name', 'email', 'password', 'activation_code', 'real_name', 'active', 'auth_OpenID', 'auth_Facebook', 'auth_Twitter', 'auth_Yahoo', 'auth_LinkedIn', 'auth_MySpace', 'auth_Foursquare', 'auth_AOL', 'auth_Live', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('UserId' => 0, 'UserName' => 1, 'Email' => 2, 'Password' => 3, 'ActivationCode' => 4, 'RealName' => 5, 'Active' => 6, 'AuthOpenid' => 7, 'AuthFacebook' => 8, 'AuthTwitter' => 9, 'AuthYahoo' => 10, 'AuthLinkedin' => 11, 'AuthMyspace' => 12, 'AuthFoursquare' => 13, 'AuthAol' => 14, 'AuthLive' => 15, ),
        self::TYPE_CAMELNAME     => array('userId' => 0, 'userName' => 1, 'email' => 2, 'password' => 3, 'activationCode' => 4, 'realName' => 5, 'active' => 6, 'authOpenid' => 7, 'authFacebook' => 8, 'authTwitter' => 9, 'authYahoo' => 10, 'authLinkedin' => 11, 'authMyspace' => 12, 'authFoursquare' => 13, 'authAol' => 14, 'authLive' => 15, ),
        self::TYPE_COLNAME       => array(MainUserTableMap::COL_USER_ID => 0, MainUserTableMap::COL_USER_NAME => 1, MainUserTableMap::COL_EMAIL => 2, MainUserTableMap::COL_PASSWORD => 3, MainUserTableMap::COL_ACTIVATION_CODE => 4, MainUserTableMap::COL_REAL_NAME => 5, MainUserTableMap::COL_ACTIVE => 6, MainUserTableMap::COL_AUTH_OPENID => 7, MainUserTableMap::COL_AUTH_FACEBOOK => 8, MainUserTableMap::COL_AUTH_TWITTER => 9, MainUserTableMap::COL_AUTH_YAHOO => 10, MainUserTableMap::COL_AUTH_LINKEDIN => 11, MainUserTableMap::COL_AUTH_MYSPACE => 12, MainUserTableMap::COL_AUTH_FOURSQUARE => 13, MainUserTableMap::COL_AUTH_AOL => 14, MainUserTableMap::COL_AUTH_LIVE => 15, ),
        self::TYPE_FIELDNAME     => array('user_id' => 0, 'user_name' => 1, 'email' => 2, 'password' => 3, 'activation_code' => 4, 'real_name' => 5, 'active' => 6, 'auth_OpenID' => 7, 'auth_Facebook' => 8, 'auth_Twitter' => 9, 'auth_Yahoo' => 10, 'auth_LinkedIn' => 11, 'auth_MySpace' => 12, 'auth_Foursquare' => 13, 'auth_AOL' => 14, 'auth_Live' => 15, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
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
        $this->setName('main_user');
        $this->setPhpName('MainUser');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\MainUser');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('user_id', 'UserId', 'INTEGER', true, 20, null);
        $this->addColumn('user_name', 'UserName', 'VARCHAR', true, 50, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 50, null);
        $this->addColumn('password', 'Password', 'VARCHAR', false, 255, null);
        $this->addColumn('activation_code', 'ActivationCode', 'VARCHAR', false, 50, null);
        $this->addColumn('real_name', 'RealName', 'VARCHAR', false, 100, null);
        $this->addColumn('active', 'Active', 'INTEGER', true, 5, 1);
        $this->addColumn('auth_OpenID', 'AuthOpenid', 'VARCHAR', false, 100, null);
        $this->addColumn('auth_Facebook', 'AuthFacebook', 'VARCHAR', false, 100, null);
        $this->addColumn('auth_Twitter', 'AuthTwitter', 'VARCHAR', false, 100, null);
        $this->addColumn('auth_Yahoo', 'AuthYahoo', 'VARCHAR', false, 100, null);
        $this->addColumn('auth_LinkedIn', 'AuthLinkedin', 'VARCHAR', false, 100, null);
        $this->addColumn('auth_MySpace', 'AuthMyspace', 'VARCHAR', false, 100, null);
        $this->addColumn('auth_Foursquare', 'AuthFoursquare', 'VARCHAR', false, 100, null);
        $this->addColumn('auth_AOL', 'AuthAol', 'VARCHAR', false, 100, null);
        $this->addColumn('auth_Live', 'AuthLive', 'VARCHAR', false, 100, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? MainUserTableMap::CLASS_DEFAULT : MainUserTableMap::OM_CLASS;
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
     * @return array           (MainUser object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MainUserTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MainUserTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MainUserTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MainUserTableMap::OM_CLASS;
            /** @var MainUser $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MainUserTableMap::addInstanceToPool($obj, $key);
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
            $key = MainUserTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MainUserTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MainUser $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MainUserTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MainUserTableMap::COL_USER_ID);
            $criteria->addSelectColumn(MainUserTableMap::COL_USER_NAME);
            $criteria->addSelectColumn(MainUserTableMap::COL_EMAIL);
            $criteria->addSelectColumn(MainUserTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(MainUserTableMap::COL_ACTIVATION_CODE);
            $criteria->addSelectColumn(MainUserTableMap::COL_REAL_NAME);
            $criteria->addSelectColumn(MainUserTableMap::COL_ACTIVE);
            $criteria->addSelectColumn(MainUserTableMap::COL_AUTH_OPENID);
            $criteria->addSelectColumn(MainUserTableMap::COL_AUTH_FACEBOOK);
            $criteria->addSelectColumn(MainUserTableMap::COL_AUTH_TWITTER);
            $criteria->addSelectColumn(MainUserTableMap::COL_AUTH_YAHOO);
            $criteria->addSelectColumn(MainUserTableMap::COL_AUTH_LINKEDIN);
            $criteria->addSelectColumn(MainUserTableMap::COL_AUTH_MYSPACE);
            $criteria->addSelectColumn(MainUserTableMap::COL_AUTH_FOURSQUARE);
            $criteria->addSelectColumn(MainUserTableMap::COL_AUTH_AOL);
            $criteria->addSelectColumn(MainUserTableMap::COL_AUTH_LIVE);
        } else {
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.user_name');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.activation_code');
            $criteria->addSelectColumn($alias . '.real_name');
            $criteria->addSelectColumn($alias . '.active');
            $criteria->addSelectColumn($alias . '.auth_OpenID');
            $criteria->addSelectColumn($alias . '.auth_Facebook');
            $criteria->addSelectColumn($alias . '.auth_Twitter');
            $criteria->addSelectColumn($alias . '.auth_Yahoo');
            $criteria->addSelectColumn($alias . '.auth_LinkedIn');
            $criteria->addSelectColumn($alias . '.auth_MySpace');
            $criteria->addSelectColumn($alias . '.auth_Foursquare');
            $criteria->addSelectColumn($alias . '.auth_AOL');
            $criteria->addSelectColumn($alias . '.auth_Live');
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
        return Propel::getServiceContainer()->getDatabaseMap(MainUserTableMap::DATABASE_NAME)->getTable(MainUserTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MainUserTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MainUserTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MainUserTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MainUser or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MainUser object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MainUserTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MainUser) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MainUserTableMap::DATABASE_NAME);
            $criteria->add(MainUserTableMap::COL_USER_ID, (array) $values, Criteria::IN);
        }

        $query = MainUserQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MainUserTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MainUserTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the main_user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MainUserQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MainUser or Criteria object.
     *
     * @param mixed               $criteria Criteria or MainUser object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainUserTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MainUser object
        }

        if ($criteria->containsKey(MainUserTableMap::COL_USER_ID) && $criteria->keyContainsValue(MainUserTableMap::COL_USER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MainUserTableMap::COL_USER_ID.')');
        }


        // Set the correct dbName
        $query = MainUserQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MainUserTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MainUserTableMap::buildTableMap();
