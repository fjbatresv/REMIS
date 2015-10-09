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
use Invision\InventarioBundle\Model\Material;
use Invision\InventarioBundle\Model\MaterialPeer;
use Invision\InventarioBundle\Model\MaterialProcesoExtra;
use Invision\InventarioBundle\Model\MaterialQuery;

/**
 * @method MaterialQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MaterialQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method MaterialQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method MaterialQuery orderByCosto($order = Criteria::ASC) Order by the costo column
 *
 * @method MaterialQuery groupById() Group by the id column
 * @method MaterialQuery groupByNombre() Group by the nombre column
 * @method MaterialQuery groupByDescripcion() Group by the descripcion column
 * @method MaterialQuery groupByCosto() Group by the costo column
 *
 * @method MaterialQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MaterialQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MaterialQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MaterialQuery leftJoinMaterialProcesoExtra($relationAlias = null) Adds a LEFT JOIN clause to the query using the MaterialProcesoExtra relation
 * @method MaterialQuery rightJoinMaterialProcesoExtra($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MaterialProcesoExtra relation
 * @method MaterialQuery innerJoinMaterialProcesoExtra($relationAlias = null) Adds a INNER JOIN clause to the query using the MaterialProcesoExtra relation
 *
 * @method Material findOne(PropelPDO $con = null) Return the first Material matching the query
 * @method Material findOneOrCreate(PropelPDO $con = null) Return the first Material matching the query, or a new Material object populated from the query conditions when no match is found
 *
 * @method Material findOneByNombre(string $nombre) Return the first Material filtered by the nombre column
 * @method Material findOneByDescripcion(string $descripcion) Return the first Material filtered by the descripcion column
 * @method Material findOneByCosto(double $costo) Return the first Material filtered by the costo column
 *
 * @method array findById(int $id) Return Material objects filtered by the id column
 * @method array findByNombre(string $nombre) Return Material objects filtered by the nombre column
 * @method array findByDescripcion(string $descripcion) Return Material objects filtered by the descripcion column
 * @method array findByCosto(double $costo) Return Material objects filtered by the costo column
 */
abstract class BaseMaterialQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMaterialQuery object.
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
            $modelName = 'Invision\\InventarioBundle\\Model\\Material';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MaterialQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MaterialQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MaterialQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MaterialQuery) {
            return $criteria;
        }
        $query = new MaterialQuery(null, null, $modelAlias);

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
     * @return   Material|Material[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MaterialPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MaterialPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Material A model object, or null if the key is not found
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
     * @return                 Material A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nombre`, `descripcion`, `costo` FROM `material` WHERE `id` = :p0';
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
            $obj = new Material();
            $obj->hydrate($row);
            MaterialPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Material|Material[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Material[]|mixed the list of results, formatted by the current formatter
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
     * @return MaterialQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MaterialPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MaterialQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MaterialPeer::ID, $keys, Criteria::IN);
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
     * @return MaterialQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MaterialPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MaterialPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MaterialPeer::ID, $id, $comparison);
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
     * @return MaterialQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MaterialPeer::NOMBRE, $nombre, $comparison);
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
     * @return MaterialQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MaterialPeer::DESCRIPCION, $descripcion, $comparison);
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
     * @return MaterialQuery The current query, for fluid interface
     */
    public function filterByCosto($costo = null, $comparison = null)
    {
        if (is_array($costo)) {
            $useMinMax = false;
            if (isset($costo['min'])) {
                $this->addUsingAlias(MaterialPeer::COSTO, $costo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($costo['max'])) {
                $this->addUsingAlias(MaterialPeer::COSTO, $costo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MaterialPeer::COSTO, $costo, $comparison);
    }

    /**
     * Filter the query by a related MaterialProcesoExtra object
     *
     * @param   MaterialProcesoExtra|PropelObjectCollection $materialProcesoExtra  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MaterialQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMaterialProcesoExtra($materialProcesoExtra, $comparison = null)
    {
        if ($materialProcesoExtra instanceof MaterialProcesoExtra) {
            return $this
                ->addUsingAlias(MaterialPeer::ID, $materialProcesoExtra->getMaterialId(), $comparison);
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
     * @return MaterialQuery The current query, for fluid interface
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
     * @param   Material $material Object to remove from the list of results
     *
     * @return MaterialQuery The current query, for fluid interface
     */
    public function prune($material = null)
    {
        if ($material) {
            $this->addUsingAlias(MaterialPeer::ID, $material->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
