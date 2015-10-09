<?php

namespace Invision\InventarioBundle\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Invision\InventarioBundle\Model\MaterialProcesoExtra;
use Invision\InventarioBundle\Model\ProcesoExtra;
use Invision\InventarioBundle\Model\ProcesoExtraPeer;
use Invision\InventarioBundle\Model\ProcesoExtraQuery;

/**
 * @method ProcesoExtraQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ProcesoExtraQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method ProcesoExtraQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method ProcesoExtraQuery orderByCosto($order = Criteria::ASC) Order by the costo column
 *
 * @method ProcesoExtraQuery groupById() Group by the id column
 * @method ProcesoExtraQuery groupByNombre() Group by the nombre column
 * @method ProcesoExtraQuery groupByDescripcion() Group by the descripcion column
 * @method ProcesoExtraQuery groupByCosto() Group by the costo column
 *
 * @method ProcesoExtraQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProcesoExtraQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProcesoExtraQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProcesoExtraQuery leftJoinMaterialProcesoExtra($relationAlias = null) Adds a LEFT JOIN clause to the query using the MaterialProcesoExtra relation
 * @method ProcesoExtraQuery rightJoinMaterialProcesoExtra($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MaterialProcesoExtra relation
 * @method ProcesoExtraQuery innerJoinMaterialProcesoExtra($relationAlias = null) Adds a INNER JOIN clause to the query using the MaterialProcesoExtra relation
 *
 * @method ProcesoExtra findOne(PropelPDO $con = null) Return the first ProcesoExtra matching the query
 * @method ProcesoExtra findOneOrCreate(PropelPDO $con = null) Return the first ProcesoExtra matching the query, or a new ProcesoExtra object populated from the query conditions when no match is found
 *
 * @method ProcesoExtra findOneByNombre(string $nombre) Return the first ProcesoExtra filtered by the nombre column
 * @method ProcesoExtra findOneByDescripcion(string $descripcion) Return the first ProcesoExtra filtered by the descripcion column
 * @method ProcesoExtra findOneByCosto(double $costo) Return the first ProcesoExtra filtered by the costo column
 *
 * @method array findById(int $id) Return ProcesoExtra objects filtered by the id column
 * @method array findByNombre(string $nombre) Return ProcesoExtra objects filtered by the nombre column
 * @method array findByDescripcion(string $descripcion) Return ProcesoExtra objects filtered by the descripcion column
 * @method array findByCosto(double $costo) Return ProcesoExtra objects filtered by the costo column
 */
abstract class BaseProcesoExtraQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProcesoExtraQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'default';
        }
        if (null === $modelName) {
            $modelName = 'Invision\\InventarioBundle\\Model\\ProcesoExtra';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProcesoExtraQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProcesoExtraQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProcesoExtraQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProcesoExtraQuery) {
            return $criteria;
        }
        $query = new ProcesoExtraQuery(null, null, $modelAlias);

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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProcesoExtra|ProcesoExtra[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProcesoExtraPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProcesoExtraPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ProcesoExtra A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ProcesoExtra A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nombre`, `descripcion`, `costo` FROM `proceso_extra` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new ProcesoExtra();
            $obj->hydrate($row);
            ProcesoExtraPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return ProcesoExtra|ProcesoExtra[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|ProcesoExtra[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ProcesoExtraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProcesoExtraPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProcesoExtraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProcesoExtraPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProcesoExtraQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ProcesoExtraPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ProcesoExtraPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProcesoExtraPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%'); // WHERE nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProcesoExtraQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombre)) {
                $nombre = str_replace('*', '%', $nombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProcesoExtraPeer::NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcion('fooValue');   // WHERE descripcion = 'fooValue'
     * $query->filterByDescripcion('%fooValue%'); // WHERE descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProcesoExtraQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcion)) {
                $descripcion = str_replace('*', '%', $descripcion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProcesoExtraPeer::DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the costo column
     *
     * Example usage:
     * <code>
     * $query->filterByCosto(1234); // WHERE costo = 1234
     * $query->filterByCosto(array(12, 34)); // WHERE costo IN (12, 34)
     * $query->filterByCosto(array('min' => 12)); // WHERE costo >= 12
     * $query->filterByCosto(array('max' => 12)); // WHERE costo <= 12
     * </code>
     *
     * @param     mixed $costo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProcesoExtraQuery The current query, for fluid interface
     */
    public function filterByCosto($costo = null, $comparison = null)
    {
        if (is_array($costo)) {
            $useMinMax = false;
            if (isset($costo['min'])) {
                $this->addUsingAlias(ProcesoExtraPeer::COSTO, $costo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($costo['max'])) {
                $this->addUsingAlias(ProcesoExtraPeer::COSTO, $costo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProcesoExtraPeer::COSTO, $costo, $comparison);
    }

    /**
     * Filter the query by a related MaterialProcesoExtra object
     *
     * @param   MaterialProcesoExtra|PropelObjectCollection $materialProcesoExtra  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProcesoExtraQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMaterialProcesoExtra($materialProcesoExtra, $comparison = null)
    {
        if ($materialProcesoExtra instanceof MaterialProcesoExtra) {
            return $this
                ->addUsingAlias(ProcesoExtraPeer::ID, $materialProcesoExtra->getProcesoExtraId(), $comparison);
        } elseif ($materialProcesoExtra instanceof PropelObjectCollection) {
            return $this
                ->useMaterialProcesoExtraQuery()
                ->filterByPrimaryKeys($materialProcesoExtra->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMaterialProcesoExtra() only accepts arguments of type MaterialProcesoExtra or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MaterialProcesoExtra relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProcesoExtraQuery The current query, for fluid interface
     */
    public function joinMaterialProcesoExtra($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MaterialProcesoExtra');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'MaterialProcesoExtra');
        }

        return $this;
    }

    /**
     * Use the MaterialProcesoExtra relation MaterialProcesoExtra object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\InventarioBundle\Model\MaterialProcesoExtraQuery A secondary query class using the current class as primary query
     */
    public function useMaterialProcesoExtraQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMaterialProcesoExtra($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MaterialProcesoExtra', '\Invision\InventarioBundle\Model\MaterialProcesoExtraQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProcesoExtra $procesoExtra Object to remove from the list of results
     *
     * @return ProcesoExtraQuery The current query, for fluid interface
     */
    public function prune($procesoExtra = null)
    {
        if ($procesoExtra) {
            $this->addUsingAlias(ProcesoExtraPeer::ID, $procesoExtra->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
