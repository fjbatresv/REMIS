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
use Invision\SoporteBundle\Model\Dia;
use Invision\SoporteBundle\Model\Horario;
use Invision\SoporteBundle\Model\HorarioPeer;
use Invision\SoporteBundle\Model\HorarioQuery;
use Invision\SoporteBundle\Model\UsuarioHorario;

/**
 * @method HorarioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method HorarioQuery orderByDiaId($order = Criteria::ASC) Order by the dia_id column
 * @method HorarioQuery orderByHoraInicio($order = Criteria::ASC) Order by the hora_inicio column
 * @method HorarioQuery orderByHoraFin($order = Criteria::ASC) Order by the hora_fin column
 *
 * @method HorarioQuery groupById() Group by the id column
 * @method HorarioQuery groupByDiaId() Group by the dia_id column
 * @method HorarioQuery groupByHoraInicio() Group by the hora_inicio column
 * @method HorarioQuery groupByHoraFin() Group by the hora_fin column
 *
 * @method HorarioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method HorarioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method HorarioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method HorarioQuery leftJoinDia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dia relation
 * @method HorarioQuery rightJoinDia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dia relation
 * @method HorarioQuery innerJoinDia($relationAlias = null) Adds a INNER JOIN clause to the query using the Dia relation
 *
 * @method HorarioQuery leftJoinUsuarioHorario($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioHorario relation
 * @method HorarioQuery rightJoinUsuarioHorario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioHorario relation
 * @method HorarioQuery innerJoinUsuarioHorario($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioHorario relation
 *
 * @method Horario findOne(PropelPDO $con = null) Return the first Horario matching the query
 * @method Horario findOneOrCreate(PropelPDO $con = null) Return the first Horario matching the query, or a new Horario object populated from the query conditions when no match is found
 *
 * @method Horario findOneByDiaId(int $dia_id) Return the first Horario filtered by the dia_id column
 * @method Horario findOneByHoraInicio(string $hora_inicio) Return the first Horario filtered by the hora_inicio column
 * @method Horario findOneByHoraFin(string $hora_fin) Return the first Horario filtered by the hora_fin column
 *
 * @method array findById(int $id) Return Horario objects filtered by the id column
 * @method array findByDiaId(int $dia_id) Return Horario objects filtered by the dia_id column
 * @method array findByHoraInicio(string $hora_inicio) Return Horario objects filtered by the hora_inicio column
 * @method array findByHoraFin(string $hora_fin) Return Horario objects filtered by the hora_fin column
 */
abstract class BaseHorarioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseHorarioQuery object.
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
            $modelName = 'Invision\\SoporteBundle\\Model\\Horario';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new HorarioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   HorarioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return HorarioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof HorarioQuery) {
            return $criteria;
        }
        $query = new HorarioQuery(null, null, $modelAlias);

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
     * @return   Horario|Horario[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = HorarioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(HorarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Horario A model object, or null if the key is not found
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
     * @return                 Horario A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `dia_id`, `hora_inicio`, `hora_fin` FROM `horario` WHERE `id` = :p0';
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
            $obj = new Horario();
            $obj->hydrate($row);
            HorarioPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Horario|Horario[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Horario[]|mixed the list of results, formatted by the current formatter
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
     * @return HorarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HorarioPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return HorarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HorarioPeer::ID, $keys, Criteria::IN);
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
     * @return HorarioQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(HorarioPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(HorarioPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HorarioPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the dia_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDiaId(1234); // WHERE dia_id = 1234
     * $query->filterByDiaId(array(12, 34)); // WHERE dia_id IN (12, 34)
     * $query->filterByDiaId(array('min' => 12)); // WHERE dia_id >= 12
     * $query->filterByDiaId(array('max' => 12)); // WHERE dia_id <= 12
     * </code>
     *
     * @see       filterByDia()
     *
     * @param     mixed $diaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HorarioQuery The current query, for fluid interface
     */
    public function filterByDiaId($diaId = null, $comparison = null)
    {
        if (is_array($diaId)) {
            $useMinMax = false;
            if (isset($diaId['min'])) {
                $this->addUsingAlias(HorarioPeer::DIA_ID, $diaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($diaId['max'])) {
                $this->addUsingAlias(HorarioPeer::DIA_ID, $diaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HorarioPeer::DIA_ID, $diaId, $comparison);
    }

    /**
     * Filter the query on the hora_inicio column
     *
     * Example usage:
     * <code>
     * $query->filterByHoraInicio('2011-03-14'); // WHERE hora_inicio = '2011-03-14'
     * $query->filterByHoraInicio('now'); // WHERE hora_inicio = '2011-03-14'
     * $query->filterByHoraInicio(array('max' => 'yesterday')); // WHERE hora_inicio < '2011-03-13'
     * </code>
     *
     * @param     mixed $horaInicio The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HorarioQuery The current query, for fluid interface
     */
    public function filterByHoraInicio($horaInicio = null, $comparison = null)
    {
        if (is_array($horaInicio)) {
            $useMinMax = false;
            if (isset($horaInicio['min'])) {
                $this->addUsingAlias(HorarioPeer::HORA_INICIO, $horaInicio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horaInicio['max'])) {
                $this->addUsingAlias(HorarioPeer::HORA_INICIO, $horaInicio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HorarioPeer::HORA_INICIO, $horaInicio, $comparison);
    }

    /**
     * Filter the query on the hora_fin column
     *
     * Example usage:
     * <code>
     * $query->filterByHoraFin('2011-03-14'); // WHERE hora_fin = '2011-03-14'
     * $query->filterByHoraFin('now'); // WHERE hora_fin = '2011-03-14'
     * $query->filterByHoraFin(array('max' => 'yesterday')); // WHERE hora_fin < '2011-03-13'
     * </code>
     *
     * @param     mixed $horaFin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HorarioQuery The current query, for fluid interface
     */
    public function filterByHoraFin($horaFin = null, $comparison = null)
    {
        if (is_array($horaFin)) {
            $useMinMax = false;
            if (isset($horaFin['min'])) {
                $this->addUsingAlias(HorarioPeer::HORA_FIN, $horaFin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horaFin['max'])) {
                $this->addUsingAlias(HorarioPeer::HORA_FIN, $horaFin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HorarioPeer::HORA_FIN, $horaFin, $comparison);
    }

    /**
     * Filter the query by a related Dia object
     *
     * @param   Dia|PropelObjectCollection $dia The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 HorarioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDia($dia, $comparison = null)
    {
        if ($dia instanceof Dia) {
            return $this
                ->addUsingAlias(HorarioPeer::DIA_ID, $dia->getId(), $comparison);
        } elseif ($dia instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HorarioPeer::DIA_ID, $dia->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDia() only accepts arguments of type Dia or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Dia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return HorarioQuery The current query, for fluid interface
     */
    public function joinDia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Dia');

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
            $this->addJoinObject($join, 'Dia');
        }

        return $this;
    }

    /**
     * Use the Dia relation Dia object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\SoporteBundle\Model\DiaQuery A secondary query class using the current class as primary query
     */
    public function useDiaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Dia', '\Invision\SoporteBundle\Model\DiaQuery');
    }

    /**
     * Filter the query by a related UsuarioHorario object
     *
     * @param   UsuarioHorario|PropelObjectCollection $usuarioHorario  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 HorarioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsuarioHorario($usuarioHorario, $comparison = null)
    {
        if ($usuarioHorario instanceof UsuarioHorario) {
            return $this
                ->addUsingAlias(HorarioPeer::ID, $usuarioHorario->getHorarioId(), $comparison);
        } elseif ($usuarioHorario instanceof PropelObjectCollection) {
            return $this
                ->useUsuarioHorarioQuery()
                ->filterByPrimaryKeys($usuarioHorario->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsuarioHorario() only accepts arguments of type UsuarioHorario or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsuarioHorario relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return HorarioQuery The current query, for fluid interface
     */
    public function joinUsuarioHorario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsuarioHorario');

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
            $this->addJoinObject($join, 'UsuarioHorario');
        }

        return $this;
    }

    /**
     * Use the UsuarioHorario relation UsuarioHorario object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\SoporteBundle\Model\UsuarioHorarioQuery A secondary query class using the current class as primary query
     */
    public function useUsuarioHorarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsuarioHorario($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsuarioHorario', '\Invision\SoporteBundle\Model\UsuarioHorarioQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Horario $horario Object to remove from the list of results
     *
     * @return HorarioQuery The current query, for fluid interface
     */
    public function prune($horario = null)
    {
        if ($horario) {
            $this->addUsingAlias(HorarioPeer::ID, $horario->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
