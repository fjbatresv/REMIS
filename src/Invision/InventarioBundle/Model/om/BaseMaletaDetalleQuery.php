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
use Invision\InventarioBundle\Model\Inventario;
use Invision\InventarioBundle\Model\Maleta;
use Invision\InventarioBundle\Model\MaletaDetalle;
use Invision\InventarioBundle\Model\MaletaDetallePeer;
use Invision\InventarioBundle\Model\MaletaDetalleQuery;

/**
 * @method MaletaDetalleQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MaletaDetalleQuery orderByCantidad($order = Criteria::ASC) Order by the cantidad column
 * @method MaletaDetalleQuery orderByInventarioId($order = Criteria::ASC) Order by the inventario_id column
 * @method MaletaDetalleQuery orderByMaletaId($order = Criteria::ASC) Order by the maleta_id column
 *
 * @method MaletaDetalleQuery groupById() Group by the id column
 * @method MaletaDetalleQuery groupByCantidad() Group by the cantidad column
 * @method MaletaDetalleQuery groupByInventarioId() Group by the inventario_id column
 * @method MaletaDetalleQuery groupByMaletaId() Group by the maleta_id column
 *
 * @method MaletaDetalleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MaletaDetalleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MaletaDetalleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MaletaDetalleQuery leftJoinMaleta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Maleta relation
 * @method MaletaDetalleQuery rightJoinMaleta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Maleta relation
 * @method MaletaDetalleQuery innerJoinMaleta($relationAlias = null) Adds a INNER JOIN clause to the query using the Maleta relation
 *
 * @method MaletaDetalleQuery leftJoinInventario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inventario relation
 * @method MaletaDetalleQuery rightJoinInventario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inventario relation
 * @method MaletaDetalleQuery innerJoinInventario($relationAlias = null) Adds a INNER JOIN clause to the query using the Inventario relation
 *
 * @method MaletaDetalle findOne(PropelPDO $con = null) Return the first MaletaDetalle matching the query
 * @method MaletaDetalle findOneOrCreate(PropelPDO $con = null) Return the first MaletaDetalle matching the query, or a new MaletaDetalle object populated from the query conditions when no match is found
 *
 * @method MaletaDetalle findOneByCantidad(int $cantidad) Return the first MaletaDetalle filtered by the cantidad column
 * @method MaletaDetalle findOneByInventarioId(int $inventario_id) Return the first MaletaDetalle filtered by the inventario_id column
 * @method MaletaDetalle findOneByMaletaId(int $maleta_id) Return the first MaletaDetalle filtered by the maleta_id column
 *
 * @method array findById(int $id) Return MaletaDetalle objects filtered by the id column
 * @method array findByCantidad(int $cantidad) Return MaletaDetalle objects filtered by the cantidad column
 * @method array findByInventarioId(int $inventario_id) Return MaletaDetalle objects filtered by the inventario_id column
 * @method array findByMaletaId(int $maleta_id) Return MaletaDetalle objects filtered by the maleta_id column
 */
abstract class BaseMaletaDetalleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMaletaDetalleQuery object.
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
            $modelName = 'Invision\\InventarioBundle\\Model\\MaletaDetalle';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MaletaDetalleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MaletaDetalleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MaletaDetalleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MaletaDetalleQuery) {
            return $criteria;
        }
        $query = new MaletaDetalleQuery(null, null, $modelAlias);

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
     * @return   MaletaDetalle|MaletaDetalle[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MaletaDetallePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MaletaDetallePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MaletaDetalle A model object, or null if the key is not found
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
     * @return                 MaletaDetalle A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `cantidad`, `inventario_id`, `maleta_id` FROM `maleta_detalle` WHERE `id` = :p0';
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
            $obj = new MaletaDetalle();
            $obj->hydrate($row);
            MaletaDetallePeer::addInstanceToPool($obj, (string) $key);
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
     * @return MaletaDetalle|MaletaDetalle[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|MaletaDetalle[]|mixed the list of results, formatted by the current formatter
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
     * @return MaletaDetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MaletaDetallePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MaletaDetalleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MaletaDetallePeer::ID, $keys, Criteria::IN);
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
     * @return MaletaDetalleQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MaletaDetallePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MaletaDetallePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MaletaDetallePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the cantidad column
     *
     * Example usage:
     * <code>
     * $query->filterByCantidad(1234); // WHERE cantidad = 1234
     * $query->filterByCantidad(array(12, 34)); // WHERE cantidad IN (12, 34)
     * $query->filterByCantidad(array('min' => 12)); // WHERE cantidad >= 12
     * $query->filterByCantidad(array('max' => 12)); // WHERE cantidad <= 12
     * </code>
     *
     * @param     mixed $cantidad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MaletaDetalleQuery The current query, for fluid interface
     */
    public function filterByCantidad($cantidad = null, $comparison = null)
    {
        if (is_array($cantidad)) {
            $useMinMax = false;
            if (isset($cantidad['min'])) {
                $this->addUsingAlias(MaletaDetallePeer::CANTIDAD, $cantidad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cantidad['max'])) {
                $this->addUsingAlias(MaletaDetallePeer::CANTIDAD, $cantidad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MaletaDetallePeer::CANTIDAD, $cantidad, $comparison);
    }

    /**
     * Filter the query on the inventario_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInventarioId(1234); // WHERE inventario_id = 1234
     * $query->filterByInventarioId(array(12, 34)); // WHERE inventario_id IN (12, 34)
     * $query->filterByInventarioId(array('min' => 12)); // WHERE inventario_id >= 12
     * $query->filterByInventarioId(array('max' => 12)); // WHERE inventario_id <= 12
     * </code>
     *
     * @see       filterByInventario()
     *
     * @param     mixed $inventarioId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MaletaDetalleQuery The current query, for fluid interface
     */
    public function filterByInventarioId($inventarioId = null, $comparison = null)
    {
        if (is_array($inventarioId)) {
            $useMinMax = false;
            if (isset($inventarioId['min'])) {
                $this->addUsingAlias(MaletaDetallePeer::INVENTARIO_ID, $inventarioId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inventarioId['max'])) {
                $this->addUsingAlias(MaletaDetallePeer::INVENTARIO_ID, $inventarioId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MaletaDetallePeer::INVENTARIO_ID, $inventarioId, $comparison);
    }

    /**
     * Filter the query on the maleta_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMaletaId(1234); // WHERE maleta_id = 1234
     * $query->filterByMaletaId(array(12, 34)); // WHERE maleta_id IN (12, 34)
     * $query->filterByMaletaId(array('min' => 12)); // WHERE maleta_id >= 12
     * $query->filterByMaletaId(array('max' => 12)); // WHERE maleta_id <= 12
     * </code>
     *
     * @see       filterByMaleta()
     *
     * @param     mixed $maletaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MaletaDetalleQuery The current query, for fluid interface
     */
    public function filterByMaletaId($maletaId = null, $comparison = null)
    {
        if (is_array($maletaId)) {
            $useMinMax = false;
            if (isset($maletaId['min'])) {
                $this->addUsingAlias(MaletaDetallePeer::MALETA_ID, $maletaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maletaId['max'])) {
                $this->addUsingAlias(MaletaDetallePeer::MALETA_ID, $maletaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MaletaDetallePeer::MALETA_ID, $maletaId, $comparison);
    }

    /**
     * Filter the query by a related Maleta object
     *
     * @param   Maleta|PropelObjectCollection $maleta The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MaletaDetalleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMaleta($maleta, $comparison = null)
    {
        if ($maleta instanceof Maleta) {
            return $this
                ->addUsingAlias(MaletaDetallePeer::MALETA_ID, $maleta->getId(), $comparison);
        } elseif ($maleta instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MaletaDetallePeer::MALETA_ID, $maleta->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMaleta() only accepts arguments of type Maleta or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Maleta relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MaletaDetalleQuery The current query, for fluid interface
     */
    public function joinMaleta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Maleta');

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
            $this->addJoinObject($join, 'Maleta');
        }

        return $this;
    }

    /**
     * Use the Maleta relation Maleta object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\InventarioBundle\Model\MaletaQuery A secondary query class using the current class as primary query
     */
    public function useMaletaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMaleta($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Maleta', '\Invision\InventarioBundle\Model\MaletaQuery');
    }

    /**
     * Filter the query by a related Inventario object
     *
     * @param   Inventario|PropelObjectCollection $inventario The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MaletaDetalleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInventario($inventario, $comparison = null)
    {
        if ($inventario instanceof Inventario) {
            return $this
                ->addUsingAlias(MaletaDetallePeer::INVENTARIO_ID, $inventario->getId(), $comparison);
        } elseif ($inventario instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MaletaDetallePeer::INVENTARIO_ID, $inventario->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByInventario() only accepts arguments of type Inventario or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Inventario relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MaletaDetalleQuery The current query, for fluid interface
     */
    public function joinInventario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Inventario');

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
            $this->addJoinObject($join, 'Inventario');
        }

        return $this;
    }

    /**
     * Use the Inventario relation Inventario object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\InventarioBundle\Model\InventarioQuery A secondary query class using the current class as primary query
     */
    public function useInventarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInventario($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Inventario', '\Invision\InventarioBundle\Model\InventarioQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   MaletaDetalle $maletaDetalle Object to remove from the list of results
     *
     * @return MaletaDetalleQuery The current query, for fluid interface
     */
    public function prune($maletaDetalle = null)
    {
        if ($maletaDetalle) {
            $this->addUsingAlias(MaletaDetallePeer::ID, $maletaDetalle->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
