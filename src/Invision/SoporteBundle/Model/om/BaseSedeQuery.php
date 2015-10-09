<?php

namespace Invision\SoporteBundle\Model\om;

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
use Invision\SoporteBundle\Model\Bitacora;
use Invision\SoporteBundle\Model\Sede;
use Invision\SoporteBundle\Model\SedePeer;
use Invision\SoporteBundle\Model\SedeQuery;
use Invision\SoporteBundle\Model\TipoSede;
use Invision\SoporteBundle\Model\Usuario;

/**
 * @method SedeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method SedeQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method SedeQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 * @method SedeQuery orderByTelefono($order = Criteria::ASC) Order by the telefono column
 * @method SedeQuery orderByTipoSedeId($order = Criteria::ASC) Order by the tipo_sede_id column
 *
 * @method SedeQuery groupById() Group by the id column
 * @method SedeQuery groupByNombre() Group by the nombre column
 * @method SedeQuery groupByDireccion() Group by the direccion column
 * @method SedeQuery groupByTelefono() Group by the telefono column
 * @method SedeQuery groupByTipoSedeId() Group by the tipo_sede_id column
 *
 * @method SedeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SedeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SedeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SedeQuery leftJoinTipoSede($relationAlias = null) Adds a LEFT JOIN clause to the query using the TipoSede relation
 * @method SedeQuery rightJoinTipoSede($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TipoSede relation
 * @method SedeQuery innerJoinTipoSede($relationAlias = null) Adds a INNER JOIN clause to the query using the TipoSede relation
 *
 * @method SedeQuery leftJoinInventario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inventario relation
 * @method SedeQuery rightJoinInventario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inventario relation
 * @method SedeQuery innerJoinInventario($relationAlias = null) Adds a INNER JOIN clause to the query using the Inventario relation
 *
 * @method SedeQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method SedeQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method SedeQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method SedeQuery leftJoinBitacora($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bitacora relation
 * @method SedeQuery rightJoinBitacora($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bitacora relation
 * @method SedeQuery innerJoinBitacora($relationAlias = null) Adds a INNER JOIN clause to the query using the Bitacora relation
 *
 * @method Sede findOne(PropelPDO $con = null) Return the first Sede matching the query
 * @method Sede findOneOrCreate(PropelPDO $con = null) Return the first Sede matching the query, or a new Sede object populated from the query conditions when no match is found
 *
 * @method Sede findOneByNombre(string $nombre) Return the first Sede filtered by the nombre column
 * @method Sede findOneByDireccion(string $direccion) Return the first Sede filtered by the direccion column
 * @method Sede findOneByTelefono(string $telefono) Return the first Sede filtered by the telefono column
 * @method Sede findOneByTipoSedeId(int $tipo_sede_id) Return the first Sede filtered by the tipo_sede_id column
 *
 * @method array findById(int $id) Return Sede objects filtered by the id column
 * @method array findByNombre(string $nombre) Return Sede objects filtered by the nombre column
 * @method array findByDireccion(string $direccion) Return Sede objects filtered by the direccion column
 * @method array findByTelefono(string $telefono) Return Sede objects filtered by the telefono column
 * @method array findByTipoSedeId(int $tipo_sede_id) Return Sede objects filtered by the tipo_sede_id column
 */
abstract class BaseSedeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSedeQuery object.
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
            $modelName = 'Invision\\SoporteBundle\\Model\\Sede';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SedeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SedeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SedeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SedeQuery) {
            return $criteria;
        }
        $query = new SedeQuery(null, null, $modelAlias);

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
     * @return   Sede|Sede[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SedePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SedePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sede A model object, or null if the key is not found
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
     * @return                 Sede A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nombre`, `direccion`, `telefono`, `tipo_sede_id` FROM `sede` WHERE `id` = :p0';
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
            $obj = new Sede();
            $obj->hydrate($row);
            SedePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sede|Sede[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sede[]|mixed the list of results, formatted by the current formatter
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
     * @return SedeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SedePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SedeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SedePeer::ID, $keys, Criteria::IN);
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
     * @return SedeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SedePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SedePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SedePeer::ID, $id, $comparison);
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
     * @return SedeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SedePeer::NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the direccion column
     *
     * Example usage:
     * <code>
     * $query->filterByDireccion('fooValue');   // WHERE direccion = 'fooValue'
     * $query->filterByDireccion('%fooValue%'); // WHERE direccion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direccion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SedeQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direccion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $direccion)) {
                $direccion = str_replace('*', '%', $direccion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SedePeer::DIRECCION, $direccion, $comparison);
    }

    /**
     * Filter the query on the telefono column
     *
     * Example usage:
     * <code>
     * $query->filterByTelefono('fooValue');   // WHERE telefono = 'fooValue'
     * $query->filterByTelefono('%fooValue%'); // WHERE telefono LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telefono The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SedeQuery The current query, for fluid interface
     */
    public function filterByTelefono($telefono = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telefono)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $telefono)) {
                $telefono = str_replace('*', '%', $telefono);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SedePeer::TELEFONO, $telefono, $comparison);
    }

    /**
     * Filter the query on the tipo_sede_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTipoSedeId(1234); // WHERE tipo_sede_id = 1234
     * $query->filterByTipoSedeId(array(12, 34)); // WHERE tipo_sede_id IN (12, 34)
     * $query->filterByTipoSedeId(array('min' => 12)); // WHERE tipo_sede_id >= 12
     * $query->filterByTipoSedeId(array('max' => 12)); // WHERE tipo_sede_id <= 12
     * </code>
     *
     * @see       filterByTipoSede()
     *
     * @param     mixed $tipoSedeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SedeQuery The current query, for fluid interface
     */
    public function filterByTipoSedeId($tipoSedeId = null, $comparison = null)
    {
        if (is_array($tipoSedeId)) {
            $useMinMax = false;
            if (isset($tipoSedeId['min'])) {
                $this->addUsingAlias(SedePeer::TIPO_SEDE_ID, $tipoSedeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tipoSedeId['max'])) {
                $this->addUsingAlias(SedePeer::TIPO_SEDE_ID, $tipoSedeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SedePeer::TIPO_SEDE_ID, $tipoSedeId, $comparison);
    }

    /**
     * Filter the query by a related TipoSede object
     *
     * @param   TipoSede|PropelObjectCollection $tipoSede The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SedeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTipoSede($tipoSede, $comparison = null)
    {
        if ($tipoSede instanceof TipoSede) {
            return $this
                ->addUsingAlias(SedePeer::TIPO_SEDE_ID, $tipoSede->getId(), $comparison);
        } elseif ($tipoSede instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SedePeer::TIPO_SEDE_ID, $tipoSede->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTipoSede() only accepts arguments of type TipoSede or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TipoSede relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SedeQuery The current query, for fluid interface
     */
    public function joinTipoSede($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TipoSede');

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
            $this->addJoinObject($join, 'TipoSede');
        }

        return $this;
    }

    /**
     * Use the TipoSede relation TipoSede object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\SoporteBundle\Model\TipoSedeQuery A secondary query class using the current class as primary query
     */
    public function useTipoSedeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTipoSede($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TipoSede', '\Invision\SoporteBundle\Model\TipoSedeQuery');
    }

    /**
     * Filter the query by a related Inventario object
     *
     * @param   Inventario|PropelObjectCollection $inventario  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SedeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInventario($inventario, $comparison = null)
    {
        if ($inventario instanceof Inventario) {
            return $this
                ->addUsingAlias(SedePeer::ID, $inventario->getSedeId(), $comparison);
        } elseif ($inventario instanceof PropelObjectCollection) {
            return $this
                ->useInventarioQuery()
                ->filterByPrimaryKeys($inventario->getPrimaryKeys())
                ->endUse();
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
     * @return SedeQuery The current query, for fluid interface
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
     * Filter the query by a related Usuario object
     *
     * @param   Usuario|PropelObjectCollection $usuario  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SedeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsuario($usuario, $comparison = null)
    {
        if ($usuario instanceof Usuario) {
            return $this
                ->addUsingAlias(SedePeer::ID, $usuario->getSedeId(), $comparison);
        } elseif ($usuario instanceof PropelObjectCollection) {
            return $this
                ->useUsuarioQuery()
                ->filterByPrimaryKeys($usuario->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsuario() only accepts arguments of type Usuario or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Usuario relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SedeQuery The current query, for fluid interface
     */
    public function joinUsuario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Usuario');

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
            $this->addJoinObject($join, 'Usuario');
        }

        return $this;
    }

    /**
     * Use the Usuario relation Usuario object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\SoporteBundle\Model\UsuarioQuery A secondary query class using the current class as primary query
     */
    public function useUsuarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsuario($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Usuario', '\Invision\SoporteBundle\Model\UsuarioQuery');
    }

    /**
     * Filter the query by a related Bitacora object
     *
     * @param   Bitacora|PropelObjectCollection $bitacora  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SedeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBitacora($bitacora, $comparison = null)
    {
        if ($bitacora instanceof Bitacora) {
            return $this
                ->addUsingAlias(SedePeer::ID, $bitacora->getSedeId(), $comparison);
        } elseif ($bitacora instanceof PropelObjectCollection) {
            return $this
                ->useBitacoraQuery()
                ->filterByPrimaryKeys($bitacora->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBitacora() only accepts arguments of type Bitacora or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bitacora relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SedeQuery The current query, for fluid interface
     */
    public function joinBitacora($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bitacora');

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
            $this->addJoinObject($join, 'Bitacora');
        }

        return $this;
    }

    /**
     * Use the Bitacora relation Bitacora object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\SoporteBundle\Model\BitacoraQuery A secondary query class using the current class as primary query
     */
    public function useBitacoraQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBitacora($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bitacora', '\Invision\SoporteBundle\Model\BitacoraQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sede $sede Object to remove from the list of results
     *
     * @return SedeQuery The current query, for fluid interface
     */
    public function prune($sede = null)
    {
        if ($sede) {
            $this->addUsingAlias(SedePeer::ID, $sede->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
