<?php

namespace Base;

use \MainUserQuery as ChildMainUserQuery;
use \Exception;
use \PDO;
use Map\MainUserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'main_user' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class MainUser implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\MainUserTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the user_id field.
     *
     * @var        int
     */
    protected $user_id;

    /**
     * The value for the user_name field.
     *
     * @var        string
     */
    protected $user_name;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the password field.
     *
     * @var        string
     */
    protected $password;

    /**
     * The value for the activation_code field.
     *
     * @var        string
     */
    protected $activation_code;

    /**
     * The value for the real_name field.
     *
     * @var        string
     */
    protected $real_name;

    /**
     * The value for the active field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $active;

    /**
     * The value for the auth_openid field.
     *
     * @var        string
     */
    protected $auth_openid;

    /**
     * The value for the auth_facebook field.
     *
     * @var        string
     */
    protected $auth_facebook;

    /**
     * The value for the auth_twitter field.
     *
     * @var        string
     */
    protected $auth_twitter;

    /**
     * The value for the auth_yahoo field.
     *
     * @var        string
     */
    protected $auth_yahoo;

    /**
     * The value for the auth_linkedin field.
     *
     * @var        string
     */
    protected $auth_linkedin;

    /**
     * The value for the auth_myspace field.
     *
     * @var        string
     */
    protected $auth_myspace;

    /**
     * The value for the auth_foursquare field.
     *
     * @var        string
     */
    protected $auth_foursquare;

    /**
     * The value for the auth_aol field.
     *
     * @var        string
     */
    protected $auth_aol;

    /**
     * The value for the auth_live field.
     *
     * @var        string
     */
    protected $auth_live;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->active = 1;
    }

    /**
     * Initializes internal state of Base\MainUser object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>MainUser</code> instance.  If
     * <code>obj</code> is an instance of <code>MainUser</code>, delegates to
     * <code>equals(MainUser)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|MainUser The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [user_id] column value.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Get the [user_name] column value.
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [activation_code] column value.
     *
     * @return string
     */
    public function getActivationCode()
    {
        return $this->activation_code;
    }

    /**
     * Get the [real_name] column value.
     *
     * @return string
     */
    public function getRealName()
    {
        return $this->real_name;
    }

    /**
     * Get the [active] column value.
     *
     * @return int
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Get the [auth_openid] column value.
     *
     * @return string
     */
    public function getAuthOpenid()
    {
        return $this->auth_openid;
    }

    /**
     * Get the [auth_facebook] column value.
     *
     * @return string
     */
    public function getAuthFacebook()
    {
        return $this->auth_facebook;
    }

    /**
     * Get the [auth_twitter] column value.
     *
     * @return string
     */
    public function getAuthTwitter()
    {
        return $this->auth_twitter;
    }

    /**
     * Get the [auth_yahoo] column value.
     *
     * @return string
     */
    public function getAuthYahoo()
    {
        return $this->auth_yahoo;
    }

    /**
     * Get the [auth_linkedin] column value.
     *
     * @return string
     */
    public function getAuthLinkedin()
    {
        return $this->auth_linkedin;
    }

    /**
     * Get the [auth_myspace] column value.
     *
     * @return string
     */
    public function getAuthMyspace()
    {
        return $this->auth_myspace;
    }

    /**
     * Get the [auth_foursquare] column value.
     *
     * @return string
     */
    public function getAuthFoursquare()
    {
        return $this->auth_foursquare;
    }

    /**
     * Get the [auth_aol] column value.
     *
     * @return string
     */
    public function getAuthAol()
    {
        return $this->auth_aol;
    }

    /**
     * Get the [auth_live] column value.
     *
     * @return string
     */
    public function getAuthLive()
    {
        return $this->auth_live;
    }

    /**
     * Set the value of [user_id] column.
     *
     * @param int $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setUserId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[MainUserTableMap::COL_USER_ID] = true;
        }

        return $this;
    } // setUserId()

    /**
     * Set the value of [user_name] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setUserName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_name !== $v) {
            $this->user_name = $v;
            $this->modifiedColumns[MainUserTableMap::COL_USER_NAME] = true;
        }

        return $this;
    } // setUserName()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[MainUserTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[MainUserTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Set the value of [activation_code] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setActivationCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->activation_code !== $v) {
            $this->activation_code = $v;
            $this->modifiedColumns[MainUserTableMap::COL_ACTIVATION_CODE] = true;
        }

        return $this;
    } // setActivationCode()

    /**
     * Set the value of [real_name] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setRealName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->real_name !== $v) {
            $this->real_name = $v;
            $this->modifiedColumns[MainUserTableMap::COL_REAL_NAME] = true;
        }

        return $this;
    } // setRealName()

    /**
     * Set the value of [active] column.
     *
     * @param int $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setActive($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->active !== $v) {
            $this->active = $v;
            $this->modifiedColumns[MainUserTableMap::COL_ACTIVE] = true;
        }

        return $this;
    } // setActive()

    /**
     * Set the value of [auth_openid] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setAuthOpenid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->auth_openid !== $v) {
            $this->auth_openid = $v;
            $this->modifiedColumns[MainUserTableMap::COL_AUTH_OPENID] = true;
        }

        return $this;
    } // setAuthOpenid()

    /**
     * Set the value of [auth_facebook] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setAuthFacebook($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->auth_facebook !== $v) {
            $this->auth_facebook = $v;
            $this->modifiedColumns[MainUserTableMap::COL_AUTH_FACEBOOK] = true;
        }

        return $this;
    } // setAuthFacebook()

    /**
     * Set the value of [auth_twitter] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setAuthTwitter($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->auth_twitter !== $v) {
            $this->auth_twitter = $v;
            $this->modifiedColumns[MainUserTableMap::COL_AUTH_TWITTER] = true;
        }

        return $this;
    } // setAuthTwitter()

    /**
     * Set the value of [auth_yahoo] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setAuthYahoo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->auth_yahoo !== $v) {
            $this->auth_yahoo = $v;
            $this->modifiedColumns[MainUserTableMap::COL_AUTH_YAHOO] = true;
        }

        return $this;
    } // setAuthYahoo()

    /**
     * Set the value of [auth_linkedin] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setAuthLinkedin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->auth_linkedin !== $v) {
            $this->auth_linkedin = $v;
            $this->modifiedColumns[MainUserTableMap::COL_AUTH_LINKEDIN] = true;
        }

        return $this;
    } // setAuthLinkedin()

    /**
     * Set the value of [auth_myspace] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setAuthMyspace($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->auth_myspace !== $v) {
            $this->auth_myspace = $v;
            $this->modifiedColumns[MainUserTableMap::COL_AUTH_MYSPACE] = true;
        }

        return $this;
    } // setAuthMyspace()

    /**
     * Set the value of [auth_foursquare] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setAuthFoursquare($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->auth_foursquare !== $v) {
            $this->auth_foursquare = $v;
            $this->modifiedColumns[MainUserTableMap::COL_AUTH_FOURSQUARE] = true;
        }

        return $this;
    } // setAuthFoursquare()

    /**
     * Set the value of [auth_aol] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setAuthAol($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->auth_aol !== $v) {
            $this->auth_aol = $v;
            $this->modifiedColumns[MainUserTableMap::COL_AUTH_AOL] = true;
        }

        return $this;
    } // setAuthAol()

    /**
     * Set the value of [auth_live] column.
     *
     * @param string $v new value
     * @return $this|\MainUser The current object (for fluent API support)
     */
    public function setAuthLive($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->auth_live !== $v) {
            $this->auth_live = $v;
            $this->modifiedColumns[MainUserTableMap::COL_AUTH_LIVE] = true;
        }

        return $this;
    } // setAuthLive()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->active !== 1) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : MainUserTableMap::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : MainUserTableMap::translateFieldName('UserName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : MainUserTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : MainUserTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : MainUserTableMap::translateFieldName('ActivationCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->activation_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : MainUserTableMap::translateFieldName('RealName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->real_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : MainUserTableMap::translateFieldName('Active', TableMap::TYPE_PHPNAME, $indexType)];
            $this->active = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : MainUserTableMap::translateFieldName('AuthOpenid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->auth_openid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : MainUserTableMap::translateFieldName('AuthFacebook', TableMap::TYPE_PHPNAME, $indexType)];
            $this->auth_facebook = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : MainUserTableMap::translateFieldName('AuthTwitter', TableMap::TYPE_PHPNAME, $indexType)];
            $this->auth_twitter = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : MainUserTableMap::translateFieldName('AuthYahoo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->auth_yahoo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : MainUserTableMap::translateFieldName('AuthLinkedin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->auth_linkedin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : MainUserTableMap::translateFieldName('AuthMyspace', TableMap::TYPE_PHPNAME, $indexType)];
            $this->auth_myspace = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : MainUserTableMap::translateFieldName('AuthFoursquare', TableMap::TYPE_PHPNAME, $indexType)];
            $this->auth_foursquare = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : MainUserTableMap::translateFieldName('AuthAol', TableMap::TYPE_PHPNAME, $indexType)];
            $this->auth_aol = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : MainUserTableMap::translateFieldName('AuthLive', TableMap::TYPE_PHPNAME, $indexType)];
            $this->auth_live = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 16; // 16 = MainUserTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\MainUser'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MainUserTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildMainUserQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see MainUser::setDeleted()
     * @see MainUser::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainUserTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildMainUserQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainUserTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                MainUserTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[MainUserTableMap::COL_USER_ID] = true;
        if (null !== $this->user_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MainUserTableMap::COL_USER_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MainUserTableMap::COL_USER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'user_id';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_USER_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'user_name';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'password';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_ACTIVATION_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'activation_code';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_REAL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'real_name';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = 'active';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_OPENID)) {
            $modifiedColumns[':p' . $index++]  = 'auth_OpenID';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_FACEBOOK)) {
            $modifiedColumns[':p' . $index++]  = 'auth_Facebook';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_TWITTER)) {
            $modifiedColumns[':p' . $index++]  = 'auth_Twitter';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_YAHOO)) {
            $modifiedColumns[':p' . $index++]  = 'auth_Yahoo';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_LINKEDIN)) {
            $modifiedColumns[':p' . $index++]  = 'auth_LinkedIn';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_MYSPACE)) {
            $modifiedColumns[':p' . $index++]  = 'auth_MySpace';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_FOURSQUARE)) {
            $modifiedColumns[':p' . $index++]  = 'auth_Foursquare';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_AOL)) {
            $modifiedColumns[':p' . $index++]  = 'auth_AOL';
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_LIVE)) {
            $modifiedColumns[':p' . $index++]  = 'auth_Live';
        }

        $sql = sprintf(
            'INSERT INTO main_user (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'user_id':
                        $stmt->bindValue($identifier, $this->user_id, PDO::PARAM_INT);
                        break;
                    case 'user_name':
                        $stmt->bindValue($identifier, $this->user_name, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'password':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case 'activation_code':
                        $stmt->bindValue($identifier, $this->activation_code, PDO::PARAM_STR);
                        break;
                    case 'real_name':
                        $stmt->bindValue($identifier, $this->real_name, PDO::PARAM_STR);
                        break;
                    case 'active':
                        $stmt->bindValue($identifier, $this->active, PDO::PARAM_INT);
                        break;
                    case 'auth_OpenID':
                        $stmt->bindValue($identifier, $this->auth_openid, PDO::PARAM_STR);
                        break;
                    case 'auth_Facebook':
                        $stmt->bindValue($identifier, $this->auth_facebook, PDO::PARAM_STR);
                        break;
                    case 'auth_Twitter':
                        $stmt->bindValue($identifier, $this->auth_twitter, PDO::PARAM_STR);
                        break;
                    case 'auth_Yahoo':
                        $stmt->bindValue($identifier, $this->auth_yahoo, PDO::PARAM_STR);
                        break;
                    case 'auth_LinkedIn':
                        $stmt->bindValue($identifier, $this->auth_linkedin, PDO::PARAM_STR);
                        break;
                    case 'auth_MySpace':
                        $stmt->bindValue($identifier, $this->auth_myspace, PDO::PARAM_STR);
                        break;
                    case 'auth_Foursquare':
                        $stmt->bindValue($identifier, $this->auth_foursquare, PDO::PARAM_STR);
                        break;
                    case 'auth_AOL':
                        $stmt->bindValue($identifier, $this->auth_aol, PDO::PARAM_STR);
                        break;
                    case 'auth_Live':
                        $stmt->bindValue($identifier, $this->auth_live, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setUserId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = MainUserTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getUserId();
                break;
            case 1:
                return $this->getUserName();
                break;
            case 2:
                return $this->getEmail();
                break;
            case 3:
                return $this->getPassword();
                break;
            case 4:
                return $this->getActivationCode();
                break;
            case 5:
                return $this->getRealName();
                break;
            case 6:
                return $this->getActive();
                break;
            case 7:
                return $this->getAuthOpenid();
                break;
            case 8:
                return $this->getAuthFacebook();
                break;
            case 9:
                return $this->getAuthTwitter();
                break;
            case 10:
                return $this->getAuthYahoo();
                break;
            case 11:
                return $this->getAuthLinkedin();
                break;
            case 12:
                return $this->getAuthMyspace();
                break;
            case 13:
                return $this->getAuthFoursquare();
                break;
            case 14:
                return $this->getAuthAol();
                break;
            case 15:
                return $this->getAuthLive();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['MainUser'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['MainUser'][$this->hashCode()] = true;
        $keys = MainUserTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getUserId(),
            $keys[1] => $this->getUserName(),
            $keys[2] => $this->getEmail(),
            $keys[3] => $this->getPassword(),
            $keys[4] => $this->getActivationCode(),
            $keys[5] => $this->getRealName(),
            $keys[6] => $this->getActive(),
            $keys[7] => $this->getAuthOpenid(),
            $keys[8] => $this->getAuthFacebook(),
            $keys[9] => $this->getAuthTwitter(),
            $keys[10] => $this->getAuthYahoo(),
            $keys[11] => $this->getAuthLinkedin(),
            $keys[12] => $this->getAuthMyspace(),
            $keys[13] => $this->getAuthFoursquare(),
            $keys[14] => $this->getAuthAol(),
            $keys[15] => $this->getAuthLive(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\MainUser
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = MainUserTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\MainUser
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setUserId($value);
                break;
            case 1:
                $this->setUserName($value);
                break;
            case 2:
                $this->setEmail($value);
                break;
            case 3:
                $this->setPassword($value);
                break;
            case 4:
                $this->setActivationCode($value);
                break;
            case 5:
                $this->setRealName($value);
                break;
            case 6:
                $this->setActive($value);
                break;
            case 7:
                $this->setAuthOpenid($value);
                break;
            case 8:
                $this->setAuthFacebook($value);
                break;
            case 9:
                $this->setAuthTwitter($value);
                break;
            case 10:
                $this->setAuthYahoo($value);
                break;
            case 11:
                $this->setAuthLinkedin($value);
                break;
            case 12:
                $this->setAuthMyspace($value);
                break;
            case 13:
                $this->setAuthFoursquare($value);
                break;
            case 14:
                $this->setAuthAol($value);
                break;
            case 15:
                $this->setAuthLive($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = MainUserTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setUserId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setUserName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setEmail($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPassword($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setActivationCode($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setRealName($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setActive($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setAuthOpenid($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setAuthFacebook($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setAuthTwitter($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setAuthYahoo($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setAuthLinkedin($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setAuthMyspace($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setAuthFoursquare($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setAuthAol($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setAuthLive($arr[$keys[15]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\MainUser The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MainUserTableMap::DATABASE_NAME);

        if ($this->isColumnModified(MainUserTableMap::COL_USER_ID)) {
            $criteria->add(MainUserTableMap::COL_USER_ID, $this->user_id);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_USER_NAME)) {
            $criteria->add(MainUserTableMap::COL_USER_NAME, $this->user_name);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_EMAIL)) {
            $criteria->add(MainUserTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_PASSWORD)) {
            $criteria->add(MainUserTableMap::COL_PASSWORD, $this->password);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_ACTIVATION_CODE)) {
            $criteria->add(MainUserTableMap::COL_ACTIVATION_CODE, $this->activation_code);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_REAL_NAME)) {
            $criteria->add(MainUserTableMap::COL_REAL_NAME, $this->real_name);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_ACTIVE)) {
            $criteria->add(MainUserTableMap::COL_ACTIVE, $this->active);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_OPENID)) {
            $criteria->add(MainUserTableMap::COL_AUTH_OPENID, $this->auth_openid);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_FACEBOOK)) {
            $criteria->add(MainUserTableMap::COL_AUTH_FACEBOOK, $this->auth_facebook);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_TWITTER)) {
            $criteria->add(MainUserTableMap::COL_AUTH_TWITTER, $this->auth_twitter);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_YAHOO)) {
            $criteria->add(MainUserTableMap::COL_AUTH_YAHOO, $this->auth_yahoo);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_LINKEDIN)) {
            $criteria->add(MainUserTableMap::COL_AUTH_LINKEDIN, $this->auth_linkedin);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_MYSPACE)) {
            $criteria->add(MainUserTableMap::COL_AUTH_MYSPACE, $this->auth_myspace);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_FOURSQUARE)) {
            $criteria->add(MainUserTableMap::COL_AUTH_FOURSQUARE, $this->auth_foursquare);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_AOL)) {
            $criteria->add(MainUserTableMap::COL_AUTH_AOL, $this->auth_aol);
        }
        if ($this->isColumnModified(MainUserTableMap::COL_AUTH_LIVE)) {
            $criteria->add(MainUserTableMap::COL_AUTH_LIVE, $this->auth_live);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildMainUserQuery::create();
        $criteria->add(MainUserTableMap::COL_USER_ID, $this->user_id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getUserId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getUserId();
    }

    /**
     * Generic method to set the primary key (user_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setUserId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getUserId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \MainUser (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUserName($this->getUserName());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setActivationCode($this->getActivationCode());
        $copyObj->setRealName($this->getRealName());
        $copyObj->setActive($this->getActive());
        $copyObj->setAuthOpenid($this->getAuthOpenid());
        $copyObj->setAuthFacebook($this->getAuthFacebook());
        $copyObj->setAuthTwitter($this->getAuthTwitter());
        $copyObj->setAuthYahoo($this->getAuthYahoo());
        $copyObj->setAuthLinkedin($this->getAuthLinkedin());
        $copyObj->setAuthMyspace($this->getAuthMyspace());
        $copyObj->setAuthFoursquare($this->getAuthFoursquare());
        $copyObj->setAuthAol($this->getAuthAol());
        $copyObj->setAuthLive($this->getAuthLive());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setUserId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \MainUser Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->user_id = null;
        $this->user_name = null;
        $this->email = null;
        $this->password = null;
        $this->activation_code = null;
        $this->real_name = null;
        $this->active = null;
        $this->auth_openid = null;
        $this->auth_facebook = null;
        $this->auth_twitter = null;
        $this->auth_yahoo = null;
        $this->auth_linkedin = null;
        $this->auth_myspace = null;
        $this->auth_foursquare = null;
        $this->auth_aol = null;
        $this->auth_live = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MainUserTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
