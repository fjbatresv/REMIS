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
use Invision\InventarioBundle\Model\Maleta;
use Invision\SoporteBundle\Model\Perfil;
use Invision\SoporteBundle\Model\Sede;
use Invision\SoporteBundle\Model\Usuario;
use Invision\SoporteBundle\Model\UsuarioHorario;
use Invision\SoporteBundle\Model\UsuarioPeer;
use Invision\SoporteBundle\Model\UsuarioQuery;

/**
 * @method UsuarioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method UsuarioQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method UsuarioQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method UsuarioQuery orderBySalt($order = Criteria::ASC) Order by the salt column
 * @method UsuarioQuery orderByApellido($order = Criteria::ASC) Order by the apellido column
 * @method UsuarioQuery orderByDpi($order = Criteria::ASC) Order by the dpi column
 * @method UsuarioQuery orderByPerfilId($order = Criteria::ASC) Order by the perfil_id column
 * @method UsuarioQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method UsuarioQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method UsuarioQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 * @method UsuarioQuery orderByFechaNacimiento($order = Criteria::ASC) Order by the fecha_nacimiento column
 * @method UsuarioQuery orderByUltimoCambioPassword($order = Criteria::ASC) Order by the ultimo_cambio_password column
 * @method UsuarioQuery orderBySedeId($order = Criteria::ASC) Order by the sede_id column
 * @method UsuarioQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method UsuarioQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 * @method UsuarioQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method UsuarioQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method UsuarioQuery groupById() Group by the id column
 * @method UsuarioQuery groupByNombre() Group by the nombre column
 * @method UsuarioQuery groupByEmail() Group by the email column
 * @method UsuarioQuery groupBySalt() Group by the salt column
 * @method UsuarioQuery groupByApellido() Group by the apellido column
 * @method UsuarioQuery groupByDpi() Group by the dpi column
 * @method UsuarioQuery groupByPerfilId() Group by the perfil_id column
 * @method UsuarioQuery groupByUsername() Group by the username column
 * @method UsuarioQuery groupByPassword() Group by the password column
 * @method UsuarioQuery groupByDireccion() Group by the direccion column
 * @method UsuarioQuery groupByFechaNacimiento() Group by the fecha_nacimiento column
 * @method UsuarioQuery groupByUltimoCambioPassword() Group by the ultimo_cambio_password column
 * @method UsuarioQuery groupBySedeId() Group by the sede_id column
 * @method UsuarioQuery groupByCreatedBy() Group by the created_by column
 * @method UsuarioQuery groupByUpdatedBy() Group by the updated_by column
 * @method UsuarioQuery groupByCreatedAt() Group by the created_at column
 * @method UsuarioQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method UsuarioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UsuarioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UsuarioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UsuarioQuery leftJoinPerfil($relationAlias = null) Adds a LEFT JOIN clause to the query using the Perfil relation
 * @method UsuarioQuery rightJoinPerfil($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Perfil relation
 * @method UsuarioQuery innerJoinPerfil($relationAlias = null) Adds a INNER JOIN clause to the query using the Perfil relation
 *
 * @method UsuarioQuery leftJoinSede($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sede relation
 * @method UsuarioQuery rightJoinSede($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sede relation
 * @method UsuarioQuery innerJoinSede($relationAlias = null) Adds a INNER JOIN clause to the query using the Sede relation
 *
 * @method UsuarioQuery leftJoinMaleta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Maleta relation
 * @method UsuarioQuery rightJoinMaleta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Maleta relation
 * @method UsuarioQuery innerJoinMaleta($relationAlias = null) Adds a INNER JOIN clause to the query using the Maleta relation
 *
 * @method UsuarioQuery leftJoinUsuarioHorario($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioHorario relation
 * @method UsuarioQuery rightJoinUsuarioHorario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioHorario relation
 * @method UsuarioQuery innerJoinUsuarioHorario($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioHorario relation
 *
 * @method Usuario findOne(PropelPDO $con = null) Return the first Usuario matching the query
 * @method Usuario findOneOrCreate(PropelPDO $con = null) Return the first Usuario matching the query, or a new Usuario object populated from the query conditions when no match is found
 *
 * @method Usuario findOneByNombre(string $nombre) Return the first Usuario filtered by the nombre column
 * @method Usuario findOneByEmail(string $email) Return the first Usuario filtered by the email column
 * @method Usuario findOneBySalt(string $salt) Return the first Usuario filtered by the salt column
 * @method Usuario findOneByApellido(string $apellido) Return the first Usuario filtered by the apellido column
 * @method Usuario findOneByDpi(string $dpi) Return the first Usuario filtered by the dpi column
 * @method Usuario findOneByPerfilId(int $perfil_id) Return the first Usuario filtered by the perfil_id column
 * @method Usuario findOneByUsername(string $username) Return the first Usuario filtered by the username column
 * @method Usuario findOneByPassword(string $password) Return the first Usuario filtered by the password column
 * @method Usuario findOneByDireccion(string $direccion) Return the first Usuario filtered by the direccion column
 * @method Usuario findOneByFechaNacimiento(string $fecha_nacimiento) Return the first Usuario filtered by the fecha_nacimiento column
 * @method Usuario findOneByUltimoCambioPassword(string $ultimo_cambio_password) Return the first Usuario filtered by the ultimo_cambio_password column
 * @method Usuario findOneBySedeId(int $sede_id) Return the first Usuario filtered by the sede_id column
 * @method Usuario findOneByCreatedBy(string $created_by) Return the first Usuario filtered by the created_by column
 * @method Usuario findOneByUpdatedBy(string $updated_by) Return the first Usuario filtered by the updated_by column
 * @method Usuario findOneByCreatedAt(string $created_at) Return the first Usuario filtered by the created_at column
 * @method Usuario findOneByUpdatedAt(string $updated_at) Return the first Usuario filtered by the updated_at column
 *
 * @method array findById(int $id) Return Usuario objects filtered by the id column
 * @method array findByNombre(string $nombre) Return Usuario objects filtered by the nombre column
 * @method array findByEmail(string $email) Return Usuario objects filtered by the email column
 * @method array findBySalt(string $salt) Return Usuario objects filtered by the salt column
 * @method array findByApellido(string $apellido) Return Usuario objects filtered by the apellido column
 * @method array findByDpi(string $dpi) Return Usuario objects filtered by the dpi column
 * @method array findByPerfilId(int $perfil_id) Return Usuario objects filtered by the perfil_id column
 * @method array findByUsername(string $username) Return Usuario objects filtered by the username column
 * @method array findByPassword(string $password) Return Usuario objects filtered by the password column
 * @method array findByDireccion(string $direccion) Return Usuario objects filtered by the direccion column
 * @method array findByFechaNacimiento(string $fecha_nacimiento) Return Usuario objects filtered by the fecha_nacimiento column
 * @method array findByUltimoCambioPassword(string $ultimo_cambio_password) Return Usuario objects filtered by the ultimo_cambio_password column
 * @method array findBySedeId(int $sede_id) Return Usuario objects filtered by the sede_id column
 * @method array findByCreatedBy(string $created_by) Return Usuario objects filtered by the created_by column
 * @method array findByUpdatedBy(string $updated_by) Return Usuario objects filtered by the updated_by column
 * @method array findByCreatedAt(string $created_at) Return Usuario objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Usuario objects filtered by the updated_at column
 */
abstract class BaseUsuarioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUsuarioQuery object.
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
            $modelName = 'Invision\\SoporteBundle\\Model\\Usuario';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UsuarioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UsuarioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UsuarioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UsuarioQuery) {
            return $criteria;
        }
        $query = new UsuarioQuery(null, null, $modelAlias);

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
     * @return   Usuario|Usuario[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UsuarioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Usuario A model object, or null if the key is not found
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
     * @return                 Usuario A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nombre`, `email`, `salt`, `apellido`, `dpi`, `perfil_id`, `username`, `password`, `direccion`, `fecha_nacimiento`, `ultimo_cambio_password`, `sede_id`, `created_by`, `updated_by`, `created_at`, `updated_at` FROM `usuario` WHERE `id` = :p0';
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
            $obj = new Usuario();
            $obj->hydrate($row);
            UsuarioPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Usuario|Usuario[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Usuario[]|mixed the list of results, formatted by the current formatter
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
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsuarioPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsuarioPeer::ID, $keys, Criteria::IN);
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
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UsuarioPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UsuarioPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::ID, $id, $comparison);
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
     * @return UsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UsuarioPeer::NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the salt column
     *
     * Example usage:
     * <code>
     * $query->filterBySalt('fooValue');   // WHERE salt = 'fooValue'
     * $query->filterBySalt('%fooValue%'); // WHERE salt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $salt The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterBySalt($salt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salt)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $salt)) {
                $salt = str_replace('*', '%', $salt);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::SALT, $salt, $comparison);
    }

    /**
     * Filter the query on the apellido column
     *
     * Example usage:
     * <code>
     * $query->filterByApellido('fooValue');   // WHERE apellido = 'fooValue'
     * $query->filterByApellido('%fooValue%'); // WHERE apellido LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apellido The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByApellido($apellido = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apellido)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $apellido)) {
                $apellido = str_replace('*', '%', $apellido);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::APELLIDO, $apellido, $comparison);
    }

    /**
     * Filter the query on the dpi column
     *
     * Example usage:
     * <code>
     * $query->filterByDpi('fooValue');   // WHERE dpi = 'fooValue'
     * $query->filterByDpi('%fooValue%'); // WHERE dpi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dpi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByDpi($dpi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dpi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dpi)) {
                $dpi = str_replace('*', '%', $dpi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::DPI, $dpi, $comparison);
    }

    /**
     * Filter the query on the perfil_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPerfilId(1234); // WHERE perfil_id = 1234
     * $query->filterByPerfilId(array(12, 34)); // WHERE perfil_id IN (12, 34)
     * $query->filterByPerfilId(array('min' => 12)); // WHERE perfil_id >= 12
     * $query->filterByPerfilId(array('max' => 12)); // WHERE perfil_id <= 12
     * </code>
     *
     * @see       filterByPerfil()
     *
     * @param     mixed $perfilId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByPerfilId($perfilId = null, $comparison = null)
    {
        if (is_array($perfilId)) {
            $useMinMax = false;
            if (isset($perfilId['min'])) {
                $this->addUsingAlias(UsuarioPeer::PERFIL_ID, $perfilId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($perfilId['max'])) {
                $this->addUsingAlias(UsuarioPeer::PERFIL_ID, $perfilId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::PERFIL_ID, $perfilId, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::PASSWORD, $password, $comparison);
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
     * @return UsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UsuarioPeer::DIRECCION, $direccion, $comparison);
    }

    /**
     * Filter the query on the fecha_nacimiento column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaNacimiento('2011-03-14'); // WHERE fecha_nacimiento = '2011-03-14'
     * $query->filterByFechaNacimiento('now'); // WHERE fecha_nacimiento = '2011-03-14'
     * $query->filterByFechaNacimiento(array('max' => 'yesterday')); // WHERE fecha_nacimiento < '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaNacimiento The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByFechaNacimiento($fechaNacimiento = null, $comparison = null)
    {
        if (is_array($fechaNacimiento)) {
            $useMinMax = false;
            if (isset($fechaNacimiento['min'])) {
                $this->addUsingAlias(UsuarioPeer::FECHA_NACIMIENTO, $fechaNacimiento['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaNacimiento['max'])) {
                $this->addUsingAlias(UsuarioPeer::FECHA_NACIMIENTO, $fechaNacimiento['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::FECHA_NACIMIENTO, $fechaNacimiento, $comparison);
    }

    /**
     * Filter the query on the ultimo_cambio_password column
     *
     * Example usage:
     * <code>
     * $query->filterByUltimoCambioPassword('2011-03-14'); // WHERE ultimo_cambio_password = '2011-03-14'
     * $query->filterByUltimoCambioPassword('now'); // WHERE ultimo_cambio_password = '2011-03-14'
     * $query->filterByUltimoCambioPassword(array('max' => 'yesterday')); // WHERE ultimo_cambio_password < '2011-03-13'
     * </code>
     *
     * @param     mixed $ultimoCambioPassword The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByUltimoCambioPassword($ultimoCambioPassword = null, $comparison = null)
    {
        if (is_array($ultimoCambioPassword)) {
            $useMinMax = false;
            if (isset($ultimoCambioPassword['min'])) {
                $this->addUsingAlias(UsuarioPeer::ULTIMO_CAMBIO_PASSWORD, $ultimoCambioPassword['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ultimoCambioPassword['max'])) {
                $this->addUsingAlias(UsuarioPeer::ULTIMO_CAMBIO_PASSWORD, $ultimoCambioPassword['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::ULTIMO_CAMBIO_PASSWORD, $ultimoCambioPassword, $comparison);
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
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterBySedeId($sedeId = null, $comparison = null)
    {
        if (is_array($sedeId)) {
            $useMinMax = false;
            if (isset($sedeId['min'])) {
                $this->addUsingAlias(UsuarioPeer::SEDE_ID, $sedeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sedeId['max'])) {
                $this->addUsingAlias(UsuarioPeer::SEDE_ID, $sedeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::SEDE_ID, $sedeId, $comparison);
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
     * @return UsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UsuarioPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return UsuarioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UsuarioPeer::UPDATED_BY, $updatedBy, $comparison);
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
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(UsuarioPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(UsuarioPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(UsuarioPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(UsuarioPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuarioPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related Perfil object
     *
     * @param   Perfil|PropelObjectCollection $perfil The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UsuarioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPerfil($perfil, $comparison = null)
    {
        if ($perfil instanceof Perfil) {
            return $this
                ->addUsingAlias(UsuarioPeer::PERFIL_ID, $perfil->getId(), $comparison);
        } elseif ($perfil instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsuarioPeer::PERFIL_ID, $perfil->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPerfil() only accepts arguments of type Perfil or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Perfil relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function joinPerfil($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Perfil');

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
            $this->addJoinObject($join, 'Perfil');
        }

        return $this;
    }

    /**
     * Use the Perfil relation Perfil object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\SoporteBundle\Model\PerfilQuery A secondary query class using the current class as primary query
     */
    public function usePerfilQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPerfil($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Perfil', '\Invision\SoporteBundle\Model\PerfilQuery');
    }

    /**
     * Filter the query by a related Sede object
     *
     * @param   Sede|PropelObjectCollection $sede The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UsuarioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySede($sede, $comparison = null)
    {
        if ($sede instanceof Sede) {
            return $this
                ->addUsingAlias(UsuarioPeer::SEDE_ID, $sede->getId(), $comparison);
        } elseif ($sede instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsuarioPeer::SEDE_ID, $sede->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return UsuarioQuery The current query, for fluid interface
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
     * Filter the query by a related Maleta object
     *
     * @param   Maleta|PropelObjectCollection $maleta  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UsuarioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMaleta($maleta, $comparison = null)
    {
        if ($maleta instanceof Maleta) {
            return $this
                ->addUsingAlias(UsuarioPeer::ID, $maleta->getUsuarioId(), $comparison);
        } elseif ($maleta instanceof PropelObjectCollection) {
            return $this
                ->useMaletaQuery()
                ->filterByPrimaryKeys($maleta->getPrimaryKeys())
                ->endUse();
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
     * @return UsuarioQuery The current query, for fluid interface
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
     * Filter the query by a related UsuarioHorario object
     *
     * @param   UsuarioHorario|PropelObjectCollection $usuarioHorario  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UsuarioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUsuarioHorario($usuarioHorario, $comparison = null)
    {
        if ($usuarioHorario instanceof UsuarioHorario) {
            return $this
                ->addUsingAlias(UsuarioPeer::ID, $usuarioHorario->getUsuarioId(), $comparison);
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
     * @return UsuarioQuery The current query, for fluid interface
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
     * @param   Usuario $usuario Object to remove from the list of results
     *
     * @return UsuarioQuery The current query, for fluid interface
     */
    public function prune($usuario = null)
    {
        if ($usuario) {
            $this->addUsingAlias(UsuarioPeer::ID, $usuario->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     UsuarioQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(UsuarioPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     UsuarioQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(UsuarioPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     UsuarioQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(UsuarioPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     UsuarioQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(UsuarioPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     UsuarioQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(UsuarioPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     UsuarioQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(UsuarioPeer::CREATED_AT);
    }
}
