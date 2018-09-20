<?php

namespace Base;

use \MainNavigationQuery as ChildMainNavigationQuery;
use \Exception;
use \PDO;
use Map\MainNavigationTableMap;
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
 * Base class that represents a row from the 'main_navigation' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class MainNavigation implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\MainNavigationTableMap';


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
     * The value for the navigation_id field.
     *
     * @var        int
     */
    protected $navigation_id;

    /**
     * The value for the navigation_name field.
     *
     * @var        string
     */
    protected $navigation_name;

    /**
     * The value for the parent_id field.
     *
     * @var        int
     */
    protected $parent_id;

    /**
     * The value for the title field.
     *
     * @var        string
     */
    protected $title;

    /**
     * The value for the bootstrap_glyph field.
     *
     * @var        string
     */
    protected $bootstrap_glyph;

    /**
     * The value for the page_title field.
     *
     * @var        string
     */
    protected $page_title;

    /**
     * The value for the page_keyword field.
     *
     * @var        string
     */
    protected $page_keyword;

    /**
     * The value for the description field.
     *
     * @var        string
     */
    protected $description;

    /**
     * The value for the url field.
     *
     * @var        string
     */
    protected $url;

    /**
     * The value for the authorization_id field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $authorization_id;

    /**
     * The value for the active field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $active;

    /**
     * The value for the index field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $index;

    /**
     * The value for the is_static field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $is_static;

    /**
     * The value for the static_content field.
     *
     * @var        string
     */
    protected $static_content;

    /**
     * The value for the only_content field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $only_content;

    /**
     * The value for the default_theme field.
     *
     * @var        string
     */
    protected $default_theme;

    /**
     * The value for the default_layout field.
     *
     * @var        string
     */
    protected $default_layout;

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
        $this->authorization_id = 1;
        $this->active = 1;
        $this->index = 0;
        $this->is_static = 0;
        $this->only_content = 0;
    }

    /**
     * Initializes internal state of Base\MainNavigation object.
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
     * Compares this with another <code>MainNavigation</code> instance.  If
     * <code>obj</code> is an instance of <code>MainNavigation</code>, delegates to
     * <code>equals(MainNavigation)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|MainNavigation The current object, for fluid interface
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
     * Get the [navigation_id] column value.
     *
     * @return int
     */
    public function getNavigationId()
    {
        return $this->navigation_id;
    }

    /**
     * Get the [navigation_name] column value.
     *
     * @return string
     */
    public function getNavigationName()
    {
        return $this->navigation_name;
    }

    /**
     * Get the [parent_id] column value.
     *
     * @return int
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [bootstrap_glyph] column value.
     *
     * @return string
     */
    public function getBootstrapGlyph()
    {
        return $this->bootstrap_glyph;
    }

    /**
     * Get the [page_title] column value.
     *
     * @return string
     */
    public function getPageTitle()
    {
        return $this->page_title;
    }

    /**
     * Get the [page_keyword] column value.
     *
     * @return string
     */
    public function getPageKeyword()
    {
        return $this->page_keyword;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [url] column value.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the [authorization_id] column value.
     *
     * @return int
     */
    public function getAuthorizationId()
    {
        return $this->authorization_id;
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
     * Get the [index] column value.
     *
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Get the [is_static] column value.
     *
     * @return int
     */
    public function getIsStatic()
    {
        return $this->is_static;
    }

    /**
     * Get the [static_content] column value.
     *
     * @return string
     */
    public function getStaticContent()
    {
        return $this->static_content;
    }

    /**
     * Get the [only_content] column value.
     *
     * @return int
     */
    public function getOnlyContent()
    {
        return $this->only_content;
    }

    /**
     * Get the [default_theme] column value.
     *
     * @return string
     */
    public function getDefaultTheme()
    {
        return $this->default_theme;
    }

    /**
     * Get the [default_layout] column value.
     *
     * @return string
     */
    public function getDefaultLayout()
    {
        return $this->default_layout;
    }

    /**
     * Set the value of [navigation_id] column.
     *
     * @param int $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setNavigationId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->navigation_id !== $v) {
            $this->navigation_id = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_NAVIGATION_ID] = true;
        }

        return $this;
    } // setNavigationId()

    /**
     * Set the value of [navigation_name] column.
     *
     * @param string $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setNavigationName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->navigation_name !== $v) {
            $this->navigation_name = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_NAVIGATION_NAME] = true;
        }

        return $this;
    } // setNavigationName()

    /**
     * Set the value of [parent_id] column.
     *
     * @param int $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setParentId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->parent_id !== $v) {
            $this->parent_id = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_PARENT_ID] = true;
        }

        return $this;
    } // setParentId()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Set the value of [bootstrap_glyph] column.
     *
     * @param string $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setBootstrapGlyph($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bootstrap_glyph !== $v) {
            $this->bootstrap_glyph = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_BOOTSTRAP_GLYPH] = true;
        }

        return $this;
    } // setBootstrapGlyph()

    /**
     * Set the value of [page_title] column.
     *
     * @param string $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setPageTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->page_title !== $v) {
            $this->page_title = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_PAGE_TITLE] = true;
        }

        return $this;
    } // setPageTitle()

    /**
     * Set the value of [page_keyword] column.
     *
     * @param string $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setPageKeyword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->page_keyword !== $v) {
            $this->page_keyword = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_PAGE_KEYWORD] = true;
        }

        return $this;
    } // setPageKeyword()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [url] column.
     *
     * @param string $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->url !== $v) {
            $this->url = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_URL] = true;
        }

        return $this;
    } // setUrl()

    /**
     * Set the value of [authorization_id] column.
     *
     * @param int $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setAuthorizationId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->authorization_id !== $v) {
            $this->authorization_id = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_AUTHORIZATION_ID] = true;
        }

        return $this;
    } // setAuthorizationId()

    /**
     * Set the value of [active] column.
     *
     * @param int $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setActive($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->active !== $v) {
            $this->active = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_ACTIVE] = true;
        }

        return $this;
    } // setActive()

    /**
     * Set the value of [index] column.
     *
     * @param int $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setIndex($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->index !== $v) {
            $this->index = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_INDEX] = true;
        }

        return $this;
    } // setIndex()

    /**
     * Set the value of [is_static] column.
     *
     * @param int $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setIsStatic($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->is_static !== $v) {
            $this->is_static = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_IS_STATIC] = true;
        }

        return $this;
    } // setIsStatic()

    /**
     * Set the value of [static_content] column.
     *
     * @param string $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setStaticContent($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->static_content !== $v) {
            $this->static_content = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_STATIC_CONTENT] = true;
        }

        return $this;
    } // setStaticContent()

    /**
     * Set the value of [only_content] column.
     *
     * @param int $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setOnlyContent($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->only_content !== $v) {
            $this->only_content = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_ONLY_CONTENT] = true;
        }

        return $this;
    } // setOnlyContent()

    /**
     * Set the value of [default_theme] column.
     *
     * @param string $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setDefaultTheme($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->default_theme !== $v) {
            $this->default_theme = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_DEFAULT_THEME] = true;
        }

        return $this;
    } // setDefaultTheme()

    /**
     * Set the value of [default_layout] column.
     *
     * @param string $v new value
     * @return $this|\MainNavigation The current object (for fluent API support)
     */
    public function setDefaultLayout($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->default_layout !== $v) {
            $this->default_layout = $v;
            $this->modifiedColumns[MainNavigationTableMap::COL_DEFAULT_LAYOUT] = true;
        }

        return $this;
    } // setDefaultLayout()

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
            if ($this->authorization_id !== 1) {
                return false;
            }

            if ($this->active !== 1) {
                return false;
            }

            if ($this->index !== 0) {
                return false;
            }

            if ($this->is_static !== 0) {
                return false;
            }

            if ($this->only_content !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : MainNavigationTableMap::translateFieldName('NavigationId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->navigation_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : MainNavigationTableMap::translateFieldName('NavigationName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->navigation_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : MainNavigationTableMap::translateFieldName('ParentId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->parent_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : MainNavigationTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : MainNavigationTableMap::translateFieldName('BootstrapGlyph', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bootstrap_glyph = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : MainNavigationTableMap::translateFieldName('PageTitle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->page_title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : MainNavigationTableMap::translateFieldName('PageKeyword', TableMap::TYPE_PHPNAME, $indexType)];
            $this->page_keyword = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : MainNavigationTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : MainNavigationTableMap::translateFieldName('Url', TableMap::TYPE_PHPNAME, $indexType)];
            $this->url = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : MainNavigationTableMap::translateFieldName('AuthorizationId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->authorization_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : MainNavigationTableMap::translateFieldName('Active', TableMap::TYPE_PHPNAME, $indexType)];
            $this->active = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : MainNavigationTableMap::translateFieldName('Index', TableMap::TYPE_PHPNAME, $indexType)];
            $this->index = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : MainNavigationTableMap::translateFieldName('IsStatic', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_static = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : MainNavigationTableMap::translateFieldName('StaticContent', TableMap::TYPE_PHPNAME, $indexType)];
            $this->static_content = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : MainNavigationTableMap::translateFieldName('OnlyContent', TableMap::TYPE_PHPNAME, $indexType)];
            $this->only_content = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : MainNavigationTableMap::translateFieldName('DefaultTheme', TableMap::TYPE_PHPNAME, $indexType)];
            $this->default_theme = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : MainNavigationTableMap::translateFieldName('DefaultLayout', TableMap::TYPE_PHPNAME, $indexType)];
            $this->default_layout = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 17; // 17 = MainNavigationTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\MainNavigation'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(MainNavigationTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildMainNavigationQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see MainNavigation::setDeleted()
     * @see MainNavigation::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(MainNavigationTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildMainNavigationQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(MainNavigationTableMap::DATABASE_NAME);
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
                MainNavigationTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[MainNavigationTableMap::COL_NAVIGATION_ID] = true;
        if (null !== $this->navigation_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MainNavigationTableMap::COL_NAVIGATION_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MainNavigationTableMap::COL_NAVIGATION_ID)) {
            $modifiedColumns[':p' . $index++]  = 'navigation_id';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_NAVIGATION_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'navigation_name';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_PARENT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'parent_id';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_BOOTSTRAP_GLYPH)) {
            $modifiedColumns[':p' . $index++]  = 'bootstrap_glyph';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_PAGE_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'page_title';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_PAGE_KEYWORD)) {
            $modifiedColumns[':p' . $index++]  = 'page_keyword';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_URL)) {
            $modifiedColumns[':p' . $index++]  = 'url';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_AUTHORIZATION_ID)) {
            $modifiedColumns[':p' . $index++]  = 'authorization_id';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = 'active';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_INDEX)) {
            $modifiedColumns[':p' . $index++]  = 'index';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_IS_STATIC)) {
            $modifiedColumns[':p' . $index++]  = 'is_static';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_STATIC_CONTENT)) {
            $modifiedColumns[':p' . $index++]  = 'static_content';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_ONLY_CONTENT)) {
            $modifiedColumns[':p' . $index++]  = 'only_content';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_DEFAULT_THEME)) {
            $modifiedColumns[':p' . $index++]  = 'default_theme';
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_DEFAULT_LAYOUT)) {
            $modifiedColumns[':p' . $index++]  = 'default_layout';
        }

        $sql = sprintf(
            'INSERT INTO main_navigation (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'navigation_id':
                        $stmt->bindValue($identifier, $this->navigation_id, PDO::PARAM_INT);
                        break;
                    case 'navigation_name':
                        $stmt->bindValue($identifier, $this->navigation_name, PDO::PARAM_STR);
                        break;
                    case 'parent_id':
                        $stmt->bindValue($identifier, $this->parent_id, PDO::PARAM_INT);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'bootstrap_glyph':
                        $stmt->bindValue($identifier, $this->bootstrap_glyph, PDO::PARAM_STR);
                        break;
                    case 'page_title':
                        $stmt->bindValue($identifier, $this->page_title, PDO::PARAM_STR);
                        break;
                    case 'page_keyword':
                        $stmt->bindValue($identifier, $this->page_keyword, PDO::PARAM_STR);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'url':
                        $stmt->bindValue($identifier, $this->url, PDO::PARAM_STR);
                        break;
                    case 'authorization_id':
                        $stmt->bindValue($identifier, $this->authorization_id, PDO::PARAM_INT);
                        break;
                    case 'active':
                        $stmt->bindValue($identifier, $this->active, PDO::PARAM_INT);
                        break;
                    case 'index':
                        $stmt->bindValue($identifier, $this->index, PDO::PARAM_INT);
                        break;
                    case 'is_static':
                        $stmt->bindValue($identifier, $this->is_static, PDO::PARAM_INT);
                        break;
                    case 'static_content':
                        $stmt->bindValue($identifier, $this->static_content, PDO::PARAM_STR);
                        break;
                    case 'only_content':
                        $stmt->bindValue($identifier, $this->only_content, PDO::PARAM_INT);
                        break;
                    case 'default_theme':
                        $stmt->bindValue($identifier, $this->default_theme, PDO::PARAM_STR);
                        break;
                    case 'default_layout':
                        $stmt->bindValue($identifier, $this->default_layout, PDO::PARAM_STR);
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
        $this->setNavigationId($pk);

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
        $pos = MainNavigationTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getNavigationId();
                break;
            case 1:
                return $this->getNavigationName();
                break;
            case 2:
                return $this->getParentId();
                break;
            case 3:
                return $this->getTitle();
                break;
            case 4:
                return $this->getBootstrapGlyph();
                break;
            case 5:
                return $this->getPageTitle();
                break;
            case 6:
                return $this->getPageKeyword();
                break;
            case 7:
                return $this->getDescription();
                break;
            case 8:
                return $this->getUrl();
                break;
            case 9:
                return $this->getAuthorizationId();
                break;
            case 10:
                return $this->getActive();
                break;
            case 11:
                return $this->getIndex();
                break;
            case 12:
                return $this->getIsStatic();
                break;
            case 13:
                return $this->getStaticContent();
                break;
            case 14:
                return $this->getOnlyContent();
                break;
            case 15:
                return $this->getDefaultTheme();
                break;
            case 16:
                return $this->getDefaultLayout();
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

        if (isset($alreadyDumpedObjects['MainNavigation'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['MainNavigation'][$this->hashCode()] = true;
        $keys = MainNavigationTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getNavigationId(),
            $keys[1] => $this->getNavigationName(),
            $keys[2] => $this->getParentId(),
            $keys[3] => $this->getTitle(),
            $keys[4] => $this->getBootstrapGlyph(),
            $keys[5] => $this->getPageTitle(),
            $keys[6] => $this->getPageKeyword(),
            $keys[7] => $this->getDescription(),
            $keys[8] => $this->getUrl(),
            $keys[9] => $this->getAuthorizationId(),
            $keys[10] => $this->getActive(),
            $keys[11] => $this->getIndex(),
            $keys[12] => $this->getIsStatic(),
            $keys[13] => $this->getStaticContent(),
            $keys[14] => $this->getOnlyContent(),
            $keys[15] => $this->getDefaultTheme(),
            $keys[16] => $this->getDefaultLayout(),
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
     * @return $this|\MainNavigation
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = MainNavigationTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\MainNavigation
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setNavigationId($value);
                break;
            case 1:
                $this->setNavigationName($value);
                break;
            case 2:
                $this->setParentId($value);
                break;
            case 3:
                $this->setTitle($value);
                break;
            case 4:
                $this->setBootstrapGlyph($value);
                break;
            case 5:
                $this->setPageTitle($value);
                break;
            case 6:
                $this->setPageKeyword($value);
                break;
            case 7:
                $this->setDescription($value);
                break;
            case 8:
                $this->setUrl($value);
                break;
            case 9:
                $this->setAuthorizationId($value);
                break;
            case 10:
                $this->setActive($value);
                break;
            case 11:
                $this->setIndex($value);
                break;
            case 12:
                $this->setIsStatic($value);
                break;
            case 13:
                $this->setStaticContent($value);
                break;
            case 14:
                $this->setOnlyContent($value);
                break;
            case 15:
                $this->setDefaultTheme($value);
                break;
            case 16:
                $this->setDefaultLayout($value);
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
        $keys = MainNavigationTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setNavigationId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNavigationName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setParentId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTitle($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setBootstrapGlyph($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPageTitle($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPageKeyword($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setDescription($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setUrl($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setAuthorizationId($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setActive($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setIndex($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setIsStatic($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setStaticContent($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setOnlyContent($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setDefaultTheme($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setDefaultLayout($arr[$keys[16]]);
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
     * @return $this|\MainNavigation The current object, for fluid interface
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
        $criteria = new Criteria(MainNavigationTableMap::DATABASE_NAME);

        if ($this->isColumnModified(MainNavigationTableMap::COL_NAVIGATION_ID)) {
            $criteria->add(MainNavigationTableMap::COL_NAVIGATION_ID, $this->navigation_id);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_NAVIGATION_NAME)) {
            $criteria->add(MainNavigationTableMap::COL_NAVIGATION_NAME, $this->navigation_name);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_PARENT_ID)) {
            $criteria->add(MainNavigationTableMap::COL_PARENT_ID, $this->parent_id);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_TITLE)) {
            $criteria->add(MainNavigationTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_BOOTSTRAP_GLYPH)) {
            $criteria->add(MainNavigationTableMap::COL_BOOTSTRAP_GLYPH, $this->bootstrap_glyph);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_PAGE_TITLE)) {
            $criteria->add(MainNavigationTableMap::COL_PAGE_TITLE, $this->page_title);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_PAGE_KEYWORD)) {
            $criteria->add(MainNavigationTableMap::COL_PAGE_KEYWORD, $this->page_keyword);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_DESCRIPTION)) {
            $criteria->add(MainNavigationTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_URL)) {
            $criteria->add(MainNavigationTableMap::COL_URL, $this->url);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_AUTHORIZATION_ID)) {
            $criteria->add(MainNavigationTableMap::COL_AUTHORIZATION_ID, $this->authorization_id);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_ACTIVE)) {
            $criteria->add(MainNavigationTableMap::COL_ACTIVE, $this->active);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_INDEX)) {
            $criteria->add(MainNavigationTableMap::COL_INDEX, $this->index);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_IS_STATIC)) {
            $criteria->add(MainNavigationTableMap::COL_IS_STATIC, $this->is_static);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_STATIC_CONTENT)) {
            $criteria->add(MainNavigationTableMap::COL_STATIC_CONTENT, $this->static_content);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_ONLY_CONTENT)) {
            $criteria->add(MainNavigationTableMap::COL_ONLY_CONTENT, $this->only_content);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_DEFAULT_THEME)) {
            $criteria->add(MainNavigationTableMap::COL_DEFAULT_THEME, $this->default_theme);
        }
        if ($this->isColumnModified(MainNavigationTableMap::COL_DEFAULT_LAYOUT)) {
            $criteria->add(MainNavigationTableMap::COL_DEFAULT_LAYOUT, $this->default_layout);
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
        $criteria = ChildMainNavigationQuery::create();
        $criteria->add(MainNavigationTableMap::COL_NAVIGATION_ID, $this->navigation_id);

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
        $validPk = null !== $this->getNavigationId();

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
        return $this->getNavigationId();
    }

    /**
     * Generic method to set the primary key (navigation_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setNavigationId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getNavigationId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \MainNavigation (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNavigationName($this->getNavigationName());
        $copyObj->setParentId($this->getParentId());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setBootstrapGlyph($this->getBootstrapGlyph());
        $copyObj->setPageTitle($this->getPageTitle());
        $copyObj->setPageKeyword($this->getPageKeyword());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setUrl($this->getUrl());
        $copyObj->setAuthorizationId($this->getAuthorizationId());
        $copyObj->setActive($this->getActive());
        $copyObj->setIndex($this->getIndex());
        $copyObj->setIsStatic($this->getIsStatic());
        $copyObj->setStaticContent($this->getStaticContent());
        $copyObj->setOnlyContent($this->getOnlyContent());
        $copyObj->setDefaultTheme($this->getDefaultTheme());
        $copyObj->setDefaultLayout($this->getDefaultLayout());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setNavigationId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \MainNavigation Clone of current object.
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
        $this->navigation_id = null;
        $this->navigation_name = null;
        $this->parent_id = null;
        $this->title = null;
        $this->bootstrap_glyph = null;
        $this->page_title = null;
        $this->page_keyword = null;
        $this->description = null;
        $this->url = null;
        $this->authorization_id = null;
        $this->active = null;
        $this->index = null;
        $this->is_static = null;
        $this->static_content = null;
        $this->only_content = null;
        $this->default_theme = null;
        $this->default_layout = null;
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
        return (string) $this->exportTo(MainNavigationTableMap::DEFAULT_STRING_FORMAT);
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
