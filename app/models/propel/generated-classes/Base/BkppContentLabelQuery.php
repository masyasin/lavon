<?php

namespace Base;

use \BkppContentLabel as ChildBkppContentLabel;
use \BkppContentLabelQuery as ChildBkppContentLabelQuery;
use \Exception;
use \PDO;
use Map\BkppContentLabelTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bkpp_content_label' table.
 *
 *
 *
 * @method     ChildBkppContentLabelQuery orderByKodeLabel($order = Criteria::ASC) Order by the kode_label column
 * @method     ChildBkppContentLabelQuery orderByKodeContent($order = Criteria::ASC) Order by the kode_content column
 *
 * @method     ChildBkppContentLabelQuery groupByKodeLabel() Group by the kode_label column
 * @method     ChildBkppContentLabelQuery groupByKodeContent() Group by the kode_content column
 *
 * @method     ChildBkppContentLabelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBkppContentLabelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBkppContentLabelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBkppContentLabelQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBkppContentLabelQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBkppContentLabelQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBkppContentLabel findOne(ConnectionInterface $con = null) Return the first ChildBkppContentLabel matching the query
 * @method     ChildBkppContentLabel findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBkppContentLabel matching the query, or a new ChildBkppContentLabel object populated from the query conditions when no match is found
 *
 * @method     ChildBkppContentLabel findOneByKodeLabel(int $kode_label) Return the first ChildBkppContentLabel filtered by the kode_label column
 * @method     ChildBkppContentLabel findOneByKodeContent(int $kode_content) Return the first ChildBkppContentLabel filtered by the kode_content column *

 * @method     ChildBkppContentLabel requirePk($key, ConnectionInterface $con = null) Return the ChildBkppContentLabel by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppContentLabel requireOne(ConnectionInterface $con = null) Return the first ChildBkppContentLabel matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppContentLabel requireOneByKodeLabel(int $kode_label) Return the first ChildBkppContentLabel filtered by the kode_label column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBkppContentLabel requireOneByKodeContent(int $kode_content) Return the first ChildBkppContentLabel filtered by the kode_content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBkppContentLabel[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBkppContentLabel objects based on current ModelCriteria
 * @method     ChildBkppContentLabel[]|ObjectCollection findByKodeLabel(int $kode_label) Return ChildBkppContentLabel objects filtered by the kode_label column
 * @method     ChildBkppContentLabel[]|ObjectCollection findByKodeContent(int $kode_content) Return ChildBkppContentLabel objects filtered by the kode_content column
 * @method     ChildBkppContentLabel[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BkppContentLabelQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BkppContentLabelQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\BkppContentLabel', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBkppContentLabelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBkppContentLabelQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBkppContentLabelQuery) {
            return $criteria;
        }
        $query = new ChildBkppContentLabelQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$kode_label, $kode_content] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildBkppContentLabel|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BkppContentLabelTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BkppContentLabelTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildBkppContentLabel A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT kode_label, kode_content FROM bkpp_content_label WHERE kode_label = :p0 AND kode_content = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildBkppContentLabel $obj */
            $obj = new ChildBkppContentLabel();
            $obj->hydrate($row);
            BkppContentLabelTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildBkppContentLabel|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildBkppContentLabelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(BkppContentLabelTableMap::COL_KODE_LABEL, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(BkppContentLabelTableMap::COL_KODE_CONTENT, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBkppContentLabelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(BkppContentLabelTableMap::COL_KODE_LABEL, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(BkppContentLabelTableMap::COL_KODE_CONTENT, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the kode_label column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeLabel(1234); // WHERE kode_label = 1234
     * $query->filterByKodeLabel(array(12, 34)); // WHERE kode_label IN (12, 34)
     * $query->filterByKodeLabel(array('min' => 12)); // WHERE kode_label > 12
     * </code>
     *
     * @param     mixed $kodeLabel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppContentLabelQuery The current query, for fluid interface
     */
    public function filterByKodeLabel($kodeLabel = null, $comparison = null)
    {
        if (is_array($kodeLabel)) {
            $useMinMax = false;
            if (isset($kodeLabel['min'])) {
                $this->addUsingAlias(BkppContentLabelTableMap::COL_KODE_LABEL, $kodeLabel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeLabel['max'])) {
                $this->addUsingAlias(BkppContentLabelTableMap::COL_KODE_LABEL, $kodeLabel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppContentLabelTableMap::COL_KODE_LABEL, $kodeLabel, $comparison);
    }

    /**
     * Filter the query on the kode_content column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeContent(1234); // WHERE kode_content = 1234
     * $query->filterByKodeContent(array(12, 34)); // WHERE kode_content IN (12, 34)
     * $query->filterByKodeContent(array('min' => 12)); // WHERE kode_content > 12
     * </code>
     *
     * @param     mixed $kodeContent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBkppContentLabelQuery The current query, for fluid interface
     */
    public function filterByKodeContent($kodeContent = null, $comparison = null)
    {
        if (is_array($kodeContent)) {
            $useMinMax = false;
            if (isset($kodeContent['min'])) {
                $this->addUsingAlias(BkppContentLabelTableMap::COL_KODE_CONTENT, $kodeContent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeContent['max'])) {
                $this->addUsingAlias(BkppContentLabelTableMap::COL_KODE_CONTENT, $kodeContent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BkppContentLabelTableMap::COL_KODE_CONTENT, $kodeContent, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBkppContentLabel $bkppContentLabel Object to remove from the list of results
     *
     * @return $this|ChildBkppContentLabelQuery The current query, for fluid interface
     */
    public function prune($bkppContentLabel = null)
    {
        if ($bkppContentLabel) {
            $this->addCond('pruneCond0', $this->getAliasedColName(BkppContentLabelTableMap::COL_KODE_LABEL), $bkppContentLabel->getKodeLabel(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(BkppContentLabelTableMap::COL_KODE_CONTENT), $bkppContentLabel->getKodeContent(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bkpp_content_label table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppContentLabelTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BkppContentLabelTableMap::clearInstancePool();
            BkppContentLabelTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BkppContentLabelTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BkppContentLabelTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BkppContentLabelTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BkppContentLabelTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BkppContentLabelQuery
