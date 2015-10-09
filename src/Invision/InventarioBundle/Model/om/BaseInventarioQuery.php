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
use Invision\InventarioBundle\Model\Color;
use Invision\InventarioBundle\Model\Inventario;
use Invision\InventarioBundle\Model\InventarioPeer;
use Invision\InventarioBundle\Model\InventarioQuery;
use Invision\InventarioBundle\Model\MaletaDetalle;
use Invision\SoporteBundle\Model\Sede;

/**
 * @method InventarioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method InventarioQuery orderByCodigo($order = Criteria::ASC) Order by the codigo column
 * @method InventarioQuery orderByColorId($order = Criteria::ASC) Order by the color_id column
 * @method InventarioQuery orderByCantidad($order = Criteria::ASC) Order by the cantidad column
 * @method InventarioQuery orderByCosto($order = Criteria::ASC) Order by the costo column
 * @method InventarioQuery orderByVenta($order = Criteria::ASC) Order by the venta column
 * @method InventarioQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method InventarioQuery orderByImagen($order = Criteria::ASC) Order by the imagen column
 * @method InventarioQuery orderBySedeId($order = Criteria::ASC) Order by the sede_id column
 * @method InventarioQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method InventarioQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 * @method InventarioQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method InventarioQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method InventarioQuery groupById() Group by the id column
 * @method InventarioQuery groupByCodigo() Group by the codigo column
 * @method InventarioQuery groupByColorId() Group by the color_id column
 * @method InventarioQuery groupByCantidad() Group by the cantidad column
 * @method InventarioQuery groupByCosto() Group by the costo column
 * @method InventarioQuery groupByVenta() Group by the venta column
 * @method InventarioQuery groupByDescripcion() Group by the descripcion column
 * @method InventarioQuery groupByImagen() Group by the imagen column
 * @method InventarioQuery groupBySedeId() Group by the sede_id column
 * @method InventarioQuery groupByCreatedBy() Group by the created_by column
 * @method InventarioQuery groupByUpdatedBy() Group by the updated_by column
 * @method InventarioQuery groupByCreatedAt() Group by the created_at column
 * @method InventarioQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method InventarioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method InventarioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method InventarioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method InventarioQuery leftJoinColor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Color relation
 * @method InventarioQuery rightJoinColor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Color relation
 * @method InventarioQuery innerJoinColor($relationAlias = null) Adds a INNER JOIN clause to the query using the Color relation
 *
 * @method InventarioQuery leftJoinSede($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sede relation
 * @method InventarioQuery rightJoinSede($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sede relation
 * @method InventarioQuery innerJoinSede($relationAlias = null) Adds a INNER JOIN clause to the query using the Sede relation
 *
 * @method InventarioQuery leftJoinMaletaDetalle($relationAlias = null) Adds a LEFT JOIN clause to the query using the MaletaDetalle relation
 * @method InventarioQuery rightJoinMaletaDetalle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MaletaDetalle relation
 * @method InventarioQuery innerJoinMaletaDetalle($relationAlias = null) Adds a INNER JOIN clause to the query using the MaletaDetalle relation
 *
 * @method Inventario findOne(PropelPDO $con = null) Return the first Inventario matching the query
 * @method Inventario findOneOrCreate(PropelPDO $con = null) Return the first Inventario matching the query, or a new Inventario object populated from the query conditions when no match is found
 *
 * @method Inventario findOneByCodigo(string $codigo) Return the first Inventario filtered by the codigo column
 * @method Inventario findOneByColorId(int $color_id) Return the first Inventario filtered by the color_id column
 * @method Inventario findOneByCantidad(int $cantidad) Return the first Inventario filtered by the cantidad column
 * @method Inventario findOneByCosto(double $costo) Return the first Inventario filtered by the costo column
 * @method Inventario findOneByVenta(double $venta) Return the first Inventario filtered by the venta column
 * @method Inventario findOneByDescripcion(string $descripcion) Return the first Inventario filtered by the descripcion column
 * @method Inventario findOneByImagen(string $imagen) Return the first Inventario filtered by the imagen column
 * @method Inventario findOneBySedeId(int $sede_id) Return the first Inventario filtered by the sede_id column
 * @method Inventario findOneByCreatedBy(string $created_by) Return the first Inventario filtered by the created_by column
 * @method Inventario findOneByUpdatedBy(string $updated_by) Return the first Inventario filtered by the updated_by column
 * @method Inventario findOneByCreatedAt(string $created_at) Return the first Inventario filtered by the created_at column
 * @method Inventario findOneByUpdatedAt(string $updated_at) Return the first Inventario filtered by the updated_at column
 *
 * @method array findById(int $id) Return Inventario objects filtered by the id column
 * @method array findByCodigo(string $codigo) Return Inventario objects filtered by the codigo column
 * @method array findByColorId(int $color_id) Return Inventario objects filtered by the color_id column
 * @method array findByCantidad(int $cantidad) Return Inventario objects filtered by the cantidad column
 * @method array findByCosto(double $costo) Return Inventario objects filtered by the costo column
 * @method array findByVenta(double $venta) Return Inventario objects filtered by the venta column
 * @method array findByDescripcion(string $descripcion) Return Inventario objects filtered by the descripcion column
 * @method array findByImagen(string $imagen) Return Inventario objects filtered by the imagen column
 * @method array findBySedeId(int $sede_id) Return Inventario objects filtered by the sede_id column
 * @method array findByCreatedBy(string $created_by) Return Inventario objects filtered by the created_by column
 * @method array findByUpdatedBy(string $updated_by) Return Inventario objects filtered by the updated_by column
 * @method array findByCreatedAt(string $created_at) Return Inventario objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Inventario objects filtered by the updated_at column
 */
abstract class BaseInventarioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseInventarioQuery object.
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
            $modelName = 'Invision\\InventarioBundle\\Model\\Inventario';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new InventarioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   InventarioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return InventarioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof InventarioQuery) {
            return $criteria;
        }
        $query = new InventarioQuery(null, null, $modelAlias);

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
     * @return   Inventario|Inventario[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InventarioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(InventarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Inventario A model object, or null if the key is not found
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
     * @return                 Inventario A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `codigo`, `color_id`, `cantidad`, `costo`, `venta`, `descripcion`, `imagen`, `sede_id`, `created_by`, `updated_by`, `created_at`, `updated_at` FROM `inventario` WHERE `id` = :p0';
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
            $obj = new Inventario();
            $obj->hydrate($row);
            InventarioPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Inventario|Inventario[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Inventario[]|mixed the list of results, formatted by the current formatter
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
     * @return InventarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InventarioPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return InventarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InventarioPeer::ID, $keys, Criteria::IN);
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
     * @return InventarioQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(InventarioPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(InventarioPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InventarioPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByCodigo('fooValue');   // WHERE codigo = 'fooValue'
     * $query->filterByCodigo('%fooValue%'); // WHERE codigo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codigo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InventarioQuery The current query, for fluid interface
     */
    public function filterByCodigo($codigo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codigo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $codigo)) {
                $codigo = str_replace('*', '%', $codigo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InventarioPeer::CODIGO, $codigo, $comparison);
    }

    /**
     * Filter the query on the color_id column
     *
     * Example usage:
     * <code>
     * $query->filterByColorId(1234); // WHERE color_id = 1234
     * $query->filterByColorId(array(12, 34)); // WHERE color_id IN (12, 34)
     * $query->filterByColorId(array('min' => 12)); // WHERE color_id >= 12
     * $query->filterByColorId(array('max' => 12)); // WHERE color_id <= 12
     * </code>
     *
     * @see       filterByColor()
     *
     * @param     mixed $colorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InventarioQuery The current query, for fluid interface
     */
    public function filterByColorId($colorId = null, $comparison = null)
    {
        if (is_array($colorId)) {
            $useMinMax = false;
            if (isset($colorId['min'])) {
                $this->addUsingAlias(InventarioPeer::COLOR_ID, $colorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($colorId['max'])) {
                $this->addUsingAlias(InventarioPeer::COLOR_ID, $colorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InventarioPeer::COLOR_ID, $colorId, $comparison);
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
     * @return InventarioQuery The current query, for fluid interface
     */
    public function filterByCantidad($cantidad = null, $comparison = null)
    {
        if (is_array($cantidad)) {
            $useMinMax = false;
            if (isset($cantidad['min'])) {
                $this->addUsingAlias(InventarioPeer::CANTIDAD, $cantidad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cantidad['max'])) {
                $this->addUsingAlias(InventarioPeer::CANTIDAD, $cantidad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InventarioPeer::CANTIDAD, $cantidad, $comparison);
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
     * @return InventarioQuery The current query, for fluid interface
     */
    public function filterByCosto($costo = null, $comparison = null)
    {
        if (is_array($costo)) {
            $useMinMax = false;
            if (isset($costo['min'])) {
                $this->addUsingAlias(InventarioPeer::COSTO, $costo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($costo['max'])) {
                $this->addUsingAlias(InventarioPeer::COSTO, $costo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InventarioPeer::COSTO, $costo, $comparison);
    }

    /**
     * Filter the query on the venta column
     *
     * Example usage:
     * <code>
     * $query->filterByVenta(1234); // WHERE venta = 1234
     * $query->filterByVenta(array(12, 34)); // WHERE venta IN (12, 34)
     * $query->filterByVenta(array('min' => 12)); // WHERE venta >= 12
     * $query->filterByVenta(array('max' => 12)); // WHERE venta <= 12
     * </code>
     *
     * @param     mixed $venta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InventarioQuery The current query, for fluid interface
     */
    public function filterByVenta($venta = null, $comparison = null)
    {
        if (is_array($venta)) {
            $useMinMax = false;
            if (isset($venta['min'])) {
                $this->addUsingAlias(InventarioPeer::VENTA, $venta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($venta['max'])) {
                $this->addUsingAlias(InventarioPeer::VENTA, $venta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InventarioPeer::VENTA, $venta, $comparison);
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
     * @return InventarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InventarioPeer::DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the imagen column
     *
     * Example usage:
     * <code>
     * $query->filterByImagen('fooValue');   // WHERE imagen = 'fooValue'
     * $query->filterByImagen('%fooValue%'); // WHERE imagen LIKE '%fooValue%'
     * </code>
     *
     * @param     string $imagen The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InventarioQuery The current query, for fluid interface
     */
    public function filterByImagen($imagen = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imagen)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $imagen)) {
                $imagen = str_replace('*', '%', $imagen);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InventarioPeer::IMAGEN, $imagen, $comparison);
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
     * @return InventarioQuery The current query, for fluid interface
     */
    public function filterBySedeId($sedeId = null, $comparison = null)
    {
        if (is_array($sedeId)) {
            $useMinMax = false;
            if (isset($sedeId['min'])) {
                $this->addUsingAlias(InventarioPeer::SEDE_ID, $sedeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sedeId['max'])) {
                $this->addUsingAlias(InventarioPeer::SEDE_ID, $sedeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InventarioPeer::SEDE_ID, $sedeId, $comparison);
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
     * @return InventarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InventarioPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return InventarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InventarioPeer::UPDATED_BY, $updatedBy, $comparison);
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
     * @return InventarioQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(InventarioPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(InventarioPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InventarioPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return InventarioQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(InventarioPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(InventarioPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InventarioPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related Color object
     *
     * @param   Color|PropelObjectCollection $color The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InventarioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByColor($color, $comparison = null)
    {
        if ($color instanceof Color) {
            return $this
                ->addUsingAlias(InventarioPeer::COLOR_ID, $color->getId(), $comparison);
        } elseif ($color instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InventarioPeer::COLOR_ID, $color->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByColor() only accepts arguments of type Color or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Color relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return InventarioQuery The current query, for fluid interface
     */
    public function joinColor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Color');

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
            $this->addJoinObject($join, 'Color');
        }

        return $this;
    }

    /**
     * Use the Color relation Color object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\InventarioBundle\Model\ColorQuery A secondary query class using the current class as primary query
     */
    public function useColorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinColor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Color', '\Invision\InventarioBundle\Model\ColorQuery');
    }

    /**
     * Filter the query by a related Sede object
     *
     * @param   Sede|PropelObjectCollection $sede The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InventarioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySede($sede, $comparison = null)
    {
        if ($sede instanceof Sede) {
            return $this
                ->addUsingAlias(InventarioPeer::SEDE_ID, $sede->getId(), $comparison);
        } elseif ($sede instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InventarioPeer::SEDE_ID, $sede->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return InventarioQuery The current query, for fluid interface
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
     * Filter the query by a related MaletaDetalle object
     *
     * @param   MaletaDetalle|PropelObjectCollection $maletaDetalle  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InventarioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMaletaDetalle($maletaDetalle, $comparison = null)
    {
        if ($maletaDetalle instanceof MaletaDetalle) {
            return $this
                ->addUsingAlias(InventarioPeer::ID, $maletaDetalle->getInventarioId(), $comparison);
        } elseif ($maletaDetalle instanceof PropelObjectCollection) {
            return $this
                ->useMaletaDetalleQuery()
                ->filterByPrimaryKeys($maletaDetalle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMaletaDetalle() only accepts arguments of type MaletaDetalle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MaletaDetalle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return InventarioQuery The current query, for fluid interface
     */
    public function joinMaletaDetalle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MaletaDetalle');

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
            $this->addJoinObject($join, 'MaletaDetalle');
        }

        return $this;
    }

    /**
     * Use the MaletaDetalle relation MaletaDetalle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\InventarioBundle\Model\MaletaDetalleQuery A secondary query class using the current class as primary query
     */
    public function useMaletaDetalleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMaletaDetalle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MaletaDetalle', '\Invision\InventarioBundle\Model\MaletaDetalleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Inventario $inventario Object to remove from the list of results
     *
     * @return InventarioQuery The current query, for fluid interface
     */
    public function prune($inventario = null)
    {
        if ($inventario) {
            $this->addUsingAlias(InventarioPeer::ID, $inventario->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     InventarioQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(InventarioPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     InventarioQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(InventarioPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     InventarioQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(InventarioPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     InventarioQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(InventarioPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     InventarioQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(InventarioPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     InventarioQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(InventarioPeer::CREATED_AT);
    }
}
