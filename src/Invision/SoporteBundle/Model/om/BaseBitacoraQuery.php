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
use Invision\SoporteBundle\Model\Bitacora;
use Invision\SoporteBundle\Model\BitacoraPeer;
use Invision\SoporteBundle\Model\BitacoraQuery;
use Invision\SoporteBundle\Model\Sede;

/**
 * @method BitacoraQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BitacoraQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method BitacoraQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 * @method BitacoraQuery orderByFechaHora($order = Criteria::ASC) Order by the fecha_hora column
 * @method BitacoraQuery orderByUsuario($order = Criteria::ASC) Order by the usuario column
 * @method BitacoraQuery orderByTabla($order = Criteria::ASC) Order by the tabla column
 * @method BitacoraQuery orderByDatoTabla($order = Criteria::ASC) Order by the dato_tabla column
 * @method BitacoraQuery orderByError($order = Criteria::ASC) Order by the error column
 * @method BitacoraQuery orderByDatoError($order = Criteria::ASC) Order by the dato_error column
 * @method BitacoraQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method BitacoraQuery orderBySedeId($order = Criteria::ASC) Order by the sede_id column
 * @method BitacoraQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method BitacoraQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 * @method BitacoraQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method BitacoraQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method BitacoraQuery groupById() Group by the id column
 * @method BitacoraQuery groupByDescripcion() Group by the descripcion column
 * @method BitacoraQuery groupByDireccion() Group by the direccion column
 * @method BitacoraQuery groupByFechaHora() Group by the fecha_hora column
 * @method BitacoraQuery groupByUsuario() Group by the usuario column
 * @method BitacoraQuery groupByTabla() Group by the tabla column
 * @method BitacoraQuery groupByDatoTabla() Group by the dato_tabla column
 * @method BitacoraQuery groupByError() Group by the error column
 * @method BitacoraQuery groupByDatoError() Group by the dato_error column
 * @method BitacoraQuery groupByEstado() Group by the estado column
 * @method BitacoraQuery groupBySedeId() Group by the sede_id column
 * @method BitacoraQuery groupByCreatedBy() Group by the created_by column
 * @method BitacoraQuery groupByUpdatedBy() Group by the updated_by column
 * @method BitacoraQuery groupByCreatedAt() Group by the created_at column
 * @method BitacoraQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method BitacoraQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BitacoraQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BitacoraQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BitacoraQuery leftJoinSede($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sede relation
 * @method BitacoraQuery rightJoinSede($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sede relation
 * @method BitacoraQuery innerJoinSede($relationAlias = null) Adds a INNER JOIN clause to the query using the Sede relation
 *
 * @method Bitacora findOne(PropelPDO $con = null) Return the first Bitacora matching the query
 * @method Bitacora findOneOrCreate(PropelPDO $con = null) Return the first Bitacora matching the query, or a new Bitacora object populated from the query conditions when no match is found
 *
 * @method Bitacora findOneByDescripcion(string $descripcion) Return the first Bitacora filtered by the descripcion column
 * @method Bitacora findOneByDireccion(string $direccion) Return the first Bitacora filtered by the direccion column
 * @method Bitacora findOneByFechaHora(string $fecha_hora) Return the first Bitacora filtered by the fecha_hora column
 * @method Bitacora findOneByUsuario(string $usuario) Return the first Bitacora filtered by the usuario column
 * @method Bitacora findOneByTabla(string $tabla) Return the first Bitacora filtered by the tabla column
 * @method Bitacora findOneByDatoTabla(int $dato_tabla) Return the first Bitacora filtered by the dato_tabla column
 * @method Bitacora findOneByError(string $error) Return the first Bitacora filtered by the error column
 * @method Bitacora findOneByDatoError(string $dato_error) Return the first Bitacora filtered by the dato_error column
 * @method Bitacora findOneByEstado(int $estado) Return the first Bitacora filtered by the estado column
 * @method Bitacora findOneBySedeId(int $sede_id) Return the first Bitacora filtered by the sede_id column
 * @method Bitacora findOneByCreatedBy(string $created_by) Return the first Bitacora filtered by the created_by column
 * @method Bitacora findOneByUpdatedBy(string $updated_by) Return the first Bitacora filtered by the updated_by column
 * @method Bitacora findOneByCreatedAt(string $created_at) Return the first Bitacora filtered by the created_at column
 * @method Bitacora findOneByUpdatedAt(string $updated_at) Return the first Bitacora filtered by the updated_at column
 *
 * @method array findById(int $id) Return Bitacora objects filtered by the id column
 * @method array findByDescripcion(string $descripcion) Return Bitacora objects filtered by the descripcion column
 * @method array findByDireccion(string $direccion) Return Bitacora objects filtered by the direccion column
 * @method array findByFechaHora(string $fecha_hora) Return Bitacora objects filtered by the fecha_hora column
 * @method array findByUsuario(string $usuario) Return Bitacora objects filtered by the usuario column
 * @method array findByTabla(string $tabla) Return Bitacora objects filtered by the tabla column
 * @method array findByDatoTabla(int $dato_tabla) Return Bitacora objects filtered by the dato_tabla column
 * @method array findByError(string $error) Return Bitacora objects filtered by the error column
 * @method array findByDatoError(string $dato_error) Return Bitacora objects filtered by the dato_error column
 * @method array findByEstado(int $estado) Return Bitacora objects filtered by the estado column
 * @method array findBySedeId(int $sede_id) Return Bitacora objects filtered by the sede_id column
 * @method array findByCreatedBy(string $created_by) Return Bitacora objects filtered by the created_by column
 * @method array findByUpdatedBy(string $updated_by) Return Bitacora objects filtered by the updated_by column
 * @method array findByCreatedAt(string $created_at) Return Bitacora objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Bitacora objects filtered by the updated_at column
 */
abstract class BaseBitacoraQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBitacoraQuery object.
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
            $modelName = 'Invision\\SoporteBundle\\Model\\Bitacora';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BitacoraQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BitacoraQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BitacoraQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BitacoraQuery) {
            return $criteria;
        }
        $query = new BitacoraQuery(null, null, $modelAlias);

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
     * @return   Bitacora|Bitacora[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BitacoraPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BitacoraPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Bitacora A model object, or null if the key is not found
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
     * @return                 Bitacora A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `descripcion`, `direccion`, `fecha_hora`, `usuario`, `tabla`, `dato_tabla`, `error`, `dato_error`, `estado`, `sede_id`, `created_by`, `updated_by`, `created_at`, `updated_at` FROM `bitacora` WHERE `id` = :p0';
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
            $obj = new Bitacora();
            $obj->hydrate($row);
            BitacoraPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Bitacora|Bitacora[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Bitacora[]|mixed the list of results, formatted by the current formatter
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
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BitacoraPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BitacoraPeer::ID, $keys, Criteria::IN);
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
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BitacoraPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BitacoraPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitacoraPeer::ID, $id, $comparison);
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
     * @return BitacoraQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BitacoraPeer::DESCRIPCION, $descripcion, $comparison);
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
     * @return BitacoraQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BitacoraPeer::DIRECCION, $direccion, $comparison);
    }

    /**
     * Filter the query on the fecha_hora column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaHora('2011-03-14'); // WHERE fecha_hora = '2011-03-14'
     * $query->filterByFechaHora('now'); // WHERE fecha_hora = '2011-03-14'
     * $query->filterByFechaHora(array('max' => 'yesterday')); // WHERE fecha_hora < '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaHora The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterByFechaHora($fechaHora = null, $comparison = null)
    {
        if (is_array($fechaHora)) {
            $useMinMax = false;
            if (isset($fechaHora['min'])) {
                $this->addUsingAlias(BitacoraPeer::FECHA_HORA, $fechaHora['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaHora['max'])) {
                $this->addUsingAlias(BitacoraPeer::FECHA_HORA, $fechaHora['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitacoraPeer::FECHA_HORA, $fechaHora, $comparison);
    }

    /**
     * Filter the query on the usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuario('fooValue');   // WHERE usuario = 'fooValue'
     * $query->filterByUsuario('%fooValue%'); // WHERE usuario LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usuario The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterByUsuario($usuario = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usuario)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $usuario)) {
                $usuario = str_replace('*', '%', $usuario);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BitacoraPeer::USUARIO, $usuario, $comparison);
    }

    /**
     * Filter the query on the tabla column
     *
     * Example usage:
     * <code>
     * $query->filterByTabla('fooValue');   // WHERE tabla = 'fooValue'
     * $query->filterByTabla('%fooValue%'); // WHERE tabla LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tabla The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterByTabla($tabla = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tabla)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tabla)) {
                $tabla = str_replace('*', '%', $tabla);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BitacoraPeer::TABLA, $tabla, $comparison);
    }

    /**
     * Filter the query on the dato_tabla column
     *
     * Example usage:
     * <code>
     * $query->filterByDatoTabla(1234); // WHERE dato_tabla = 1234
     * $query->filterByDatoTabla(array(12, 34)); // WHERE dato_tabla IN (12, 34)
     * $query->filterByDatoTabla(array('min' => 12)); // WHERE dato_tabla >= 12
     * $query->filterByDatoTabla(array('max' => 12)); // WHERE dato_tabla <= 12
     * </code>
     *
     * @param     mixed $datoTabla The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterByDatoTabla($datoTabla = null, $comparison = null)
    {
        if (is_array($datoTabla)) {
            $useMinMax = false;
            if (isset($datoTabla['min'])) {
                $this->addUsingAlias(BitacoraPeer::DATO_TABLA, $datoTabla['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datoTabla['max'])) {
                $this->addUsingAlias(BitacoraPeer::DATO_TABLA, $datoTabla['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitacoraPeer::DATO_TABLA, $datoTabla, $comparison);
    }

    /**
     * Filter the query on the error column
     *
     * Example usage:
     * <code>
     * $query->filterByError('fooValue');   // WHERE error = 'fooValue'
     * $query->filterByError('%fooValue%'); // WHERE error LIKE '%fooValue%'
     * </code>
     *
     * @param     string $error The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterByError($error = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($error)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $error)) {
                $error = str_replace('*', '%', $error);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BitacoraPeer::ERROR, $error, $comparison);
    }

    /**
     * Filter the query on the dato_error column
     *
     * Example usage:
     * <code>
     * $query->filterByDatoError('fooValue');   // WHERE dato_error = 'fooValue'
     * $query->filterByDatoError('%fooValue%'); // WHERE dato_error LIKE '%fooValue%'
     * </code>
     *
     * @param     string $datoError The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterByDatoError($datoError = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($datoError)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $datoError)) {
                $datoError = str_replace('*', '%', $datoError);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BitacoraPeer::DATO_ERROR, $datoError, $comparison);
    }

    /**
     * Filter the query on the estado column
     *
     * Example usage:
     * <code>
     * $query->filterByEstado(1234); // WHERE estado = 1234
     * $query->filterByEstado(array(12, 34)); // WHERE estado IN (12, 34)
     * $query->filterByEstado(array('min' => 12)); // WHERE estado >= 12
     * $query->filterByEstado(array('max' => 12)); // WHERE estado <= 12
     * </code>
     *
     * @param     mixed $estado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (is_array($estado)) {
            $useMinMax = false;
            if (isset($estado['min'])) {
                $this->addUsingAlias(BitacoraPeer::ESTADO, $estado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estado['max'])) {
                $this->addUsingAlias(BitacoraPeer::ESTADO, $estado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitacoraPeer::ESTADO, $estado, $comparison);
    }

    /**
     * Filter the query on the sede_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySedeId(1234); // WHERE sede_id = 1234
     * $query->filterBySedeId(array(12, 34)); // WHERE sede_id IN (12, 34)
     * $query->filterBySedeId(array('min' => 12)); // WHERE sede_id >= 12
     * $query->filterBySedeId(array('max' => 12)); // WHERE sede_id <= 12
     * </code>
     *
     * @see       filterBySede()
     *
     * @param     mixed $sedeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterBySedeId($sedeId = null, $comparison = null)
    {
        if (is_array($sedeId)) {
            $useMinMax = false;
            if (isset($sedeId['min'])) {
                $this->addUsingAlias(BitacoraPeer::SEDE_ID, $sedeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sedeId['max'])) {
                $this->addUsingAlias(BitacoraPeer::SEDE_ID, $sedeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitacoraPeer::SEDE_ID, $sedeId, $comparison);
    }

    /**
     * Filter the query on the created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy('fooValue');   // WHERE created_by = 'fooValue'
     * $query->filterByCreatedBy('%fooValue%'); // WHERE created_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $createdBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createdBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $createdBy)) {
                $createdBy = str_replace('*', '%', $createdBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BitacoraPeer::CREATED_BY, $createdBy, $comparison);
    }

    /**
     * Filter the query on the updated_by column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedBy('fooValue');   // WHERE updated_by = 'fooValue'
     * $query->filterByUpdatedBy('%fooValue%'); // WHERE updated_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updatedBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updatedBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $updatedBy)) {
                $updatedBy = str_replace('*', '%', $updatedBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BitacoraPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(BitacoraPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(BitacoraPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitacoraPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(BitacoraPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(BitacoraPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitacoraPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related Sede object
     *
     * @param   Sede|PropelObjectCollection $sede The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BitacoraQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySede($sede, $comparison = null)
    {
        if ($sede instanceof Sede) {
            return $this
                ->addUsingAlias(BitacoraPeer::SEDE_ID, $sede->getId(), $comparison);
        } elseif ($sede instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BitacoraPeer::SEDE_ID, $sede->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySede() only accepts arguments of type Sede or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sede relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function joinSede($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sede');

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
            $this->addJoinObject($join, 'Sede');
        }

        return $this;
    }

    /**
     * Use the Sede relation Sede object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\SoporteBundle\Model\SedeQuery A secondary query class using the current class as primary query
     */
    public function useSedeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSede($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sede', '\Invision\SoporteBundle\Model\SedeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Bitacora $bitacora Object to remove from the list of results
     *
     * @return BitacoraQuery The current query, for fluid interface
     */
    public function prune($bitacora = null)
    {
        if ($bitacora) {
            $this->addUsingAlias(BitacoraPeer::ID, $bitacora->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     BitacoraQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(BitacoraPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     BitacoraQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(BitacoraPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     BitacoraQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(BitacoraPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     BitacoraQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(BitacoraPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     BitacoraQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(BitacoraPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     BitacoraQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(BitacoraPeer::CREATED_AT);
    }
}
