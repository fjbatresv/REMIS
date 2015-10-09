<?php

namespace Invision\SoporteBundle\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelDateTime;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Invision\InventarioBundle\Model\Maleta;
use Invision\InventarioBundle\Model\MaletaQuery;
use Invision\SoporteBundle\Model\Perfil;
use Invision\SoporteBundle\Model\PerfilQuery;
use Invision\SoporteBundle\Model\Sede;
use Invision\SoporteBundle\Model\SedeQuery;
use Invision\SoporteBundle\Model\Usuario;
use Invision\SoporteBundle\Model\UsuarioHorario;
use Invision\SoporteBundle\Model\UsuarioHorarioQuery;
use Invision\SoporteBundle\Model\UsuarioPeer;
use Invision\SoporteBundle\Model\UsuarioQuery;

abstract class BaseUsuario extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Invision\\SoporteBundle\\Model\\UsuarioPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        UsuarioPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the nombre field.
     * @var        string
     */
    protected $nombre;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the salt field.
     * @var        string
     */
    protected $salt;

    /**
     * The value for the apellido field.
     * @var        string
     */
    protected $apellido;

    /**
     * The value for the dpi field.
     * @var        string
     */
    protected $dpi;

    /**
     * The value for the perfil_id field.
     * @var        int
     */
    protected $perfil_id;

    /**
     * The value for the username field.
     * @var        string
     */
    protected $username;

    /**
     * The value for the password field.
     * @var        string
     */
    protected $password;

    /**
     * The value for the direccion field.
     * @var        string
     */
    protected $direccion;

    /**
     * The value for the fecha_nacimiento field.
     * @var        string
     */
    protected $fecha_nacimiento;

    /**
     * The value for the ultimo_cambio_password field.
     * @var        string
     */
    protected $ultimo_cambio_password;

    /**
     * The value for the sede_id field.
     * @var        int
     */
    protected $sede_id;

    /**
     * The value for the created_by field.
     * @var        string
     */
    protected $created_by;

    /**
     * The value for the updated_by field.
     * @var        string
     */
    protected $updated_by;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * @var        Perfil
     */
    protected $aPerfil;

    /**
     * @var        Sede
     */
    protected $aSede;

    /**
     * @var        PropelObjectCollection|Maleta[] Collection to store aggregation of Maleta objects.
     */
    protected $collMaletas;
    protected $collMaletasPartial;

    /**
     * @var        PropelObjectCollection|UsuarioHorario[] Collection to store aggregation of UsuarioHorario objects.
     */
    protected $collUsuarioHorarios;
    protected $collUsuarioHorariosPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $maletasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usuarioHorariosScheduledForDeletion = null;

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [nombre] column value.
     *
     * @return string
     */
    public function getNombre()
    {

        return $this->nombre;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {

        return $this->email;
    }

    /**
     * Get the [salt] column value.
     *
     * @return string
     */
    public function getSalt()
    {

        return $this->salt;
    }

    /**
     * Get the [apellido] column value.
     *
     * @return string
     */
    public function getApellido()
    {

        return $this->apellido;
    }

    /**
     * Get the [dpi] column value.
     *
     * @return string
     */
    public function getDpi()
    {

        return $this->dpi;
    }

    /**
     * Get the [perfil_id] column value.
     *
     * @return int
     */
    public function getPerfilId()
    {

        return $this->perfil_id;
    }

    /**
     * Get the [username] column value.
     *
     * @return string
     */
    public function getUsername()
    {

        return $this->username;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {

        return $this->password;
    }

    /**
     * Get the [direccion] column value.
     *
     * @return string
     */
    public function getDireccion()
    {

        return $this->direccion;
    }

    /**
     * Get the [optionally formatted] temporal [fecha_nacimiento] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaNacimiento($format = null)
    {
        if ($this->fecha_nacimiento === null) {
            return null;
        }

        if ($this->fecha_nacimiento === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->fecha_nacimiento);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_nacimiento, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [ultimo_cambio_password] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUltimoCambioPassword($format = null)
    {
        if ($this->ultimo_cambio_password === null) {
            return null;
        }

        if ($this->ultimo_cambio_password === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->ultimo_cambio_password);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->ultimo_cambio_password, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [sede_id] column value.
     *
     * @return int
     */
    public function getSedeId()
    {

        return $this->sede_id;
    }

    /**
     * Get the [created_by] column value.
     *
     * @return string
     */
    public function getCreatedBy()
    {

        return $this->created_by;
    }

    /**
     * Get the [updated_by] column value.
     *
     * @return string
     */
    public function getUpdatedBy()
    {

        return $this->updated_by;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = null)
    {
        if ($this->created_at === null) {
            return null;
        }

        if ($this->created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = null)
    {
        if ($this->updated_at === null) {
            return null;
        }

        if ($this->updated_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->updated_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = UsuarioPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [nombre] column.
     *
     * @param  string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre !== $v) {
            $this->nombre = $v;
            $this->modifiedColumns[] = UsuarioPeer::NOMBRE;
        }


        return $this;
    } // setNombre()

    /**
     * Set the value of [email] column.
     *
     * @param  string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = UsuarioPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [salt] column.
     *
     * @param  string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setSalt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salt !== $v) {
            $this->salt = $v;
            $this->modifiedColumns[] = UsuarioPeer::SALT;
        }


        return $this;
    } // setSalt()

    /**
     * Set the value of [apellido] column.
     *
     * @param  string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setApellido($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->apellido !== $v) {
            $this->apellido = $v;
            $this->modifiedColumns[] = UsuarioPeer::APELLIDO;
        }


        return $this;
    } // setApellido()

    /**
     * Set the value of [dpi] column.
     *
     * @param  string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setDpi($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dpi !== $v) {
            $this->dpi = $v;
            $this->modifiedColumns[] = UsuarioPeer::DPI;
        }


        return $this;
    } // setDpi()

    /**
     * Set the value of [perfil_id] column.
     *
     * @param  int $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setPerfilId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->perfil_id !== $v) {
            $this->perfil_id = $v;
            $this->modifiedColumns[] = UsuarioPeer::PERFIL_ID;
        }

        if ($this->aPerfil !== null && $this->aPerfil->getId() !== $v) {
            $this->aPerfil = null;
        }


        return $this;
    } // setPerfilId()

    /**
     * Set the value of [username] column.
     *
     * @param  string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[] = UsuarioPeer::USERNAME;
        }


        return $this;
    } // setUsername()

    /**
     * Set the value of [password] column.
     *
     * @param  string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[] = UsuarioPeer::PASSWORD;
        }


        return $this;
    } // setPassword()

    /**
     * Set the value of [direccion] column.
     *
     * @param  string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setDireccion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->direccion !== $v) {
            $this->direccion = $v;
            $this->modifiedColumns[] = UsuarioPeer::DIRECCION;
        }


        return $this;
    } // setDireccion()

    /**
     * Sets the value of [fecha_nacimiento] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Usuario The current object (for fluent API support)
     */
    public function setFechaNacimiento($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_nacimiento !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha_nacimiento !== null && $tmpDt = new DateTime($this->fecha_nacimiento)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha_nacimiento = $newDateAsString;
                $this->modifiedColumns[] = UsuarioPeer::FECHA_NACIMIENTO;
            }
        } // if either are not null


        return $this;
    } // setFechaNacimiento()

    /**
     * Sets the value of [ultimo_cambio_password] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Usuario The current object (for fluent API support)
     */
    public function setUltimoCambioPassword($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->ultimo_cambio_password !== null || $dt !== null) {
            $currentDateAsString = ($this->ultimo_cambio_password !== null && $tmpDt = new DateTime($this->ultimo_cambio_password)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->ultimo_cambio_password = $newDateAsString;
                $this->modifiedColumns[] = UsuarioPeer::ULTIMO_CAMBIO_PASSWORD;
            }
        } // if either are not null


        return $this;
    } // setUltimoCambioPassword()

    /**
     * Set the value of [sede_id] column.
     *
     * @param  int $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setSedeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sede_id !== $v) {
            $this->sede_id = $v;
            $this->modifiedColumns[] = UsuarioPeer::SEDE_ID;
        }

        if ($this->aSede !== null && $this->aSede->getId() !== $v) {
            $this->aSede = null;
        }


        return $this;
    } // setSedeId()

    /**
     * Set the value of [created_by] column.
     *
     * @param  string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[] = UsuarioPeer::CREATED_BY;
        }


        return $this;
    } // setCreatedBy()

    /**
     * Set the value of [updated_by] column.
     *
     * @param  string $v new value
     * @return Usuario The current object (for fluent API support)
     */
    public function setUpdatedBy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->updated_by !== $v) {
            $this->updated_by = $v;
            $this->modifiedColumns[] = UsuarioPeer::UPDATED_BY;
        }


        return $this;
    } // setUpdatedBy()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Usuario The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = UsuarioPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Usuario The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = UsuarioPeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

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
        // otherwise, everything was equal, so return true
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
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->nombre = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->email = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->salt = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->apellido = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->dpi = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->perfil_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->username = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->password = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->direccion = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->fecha_nacimiento = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->ultimo_cambio_password = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->sede_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->created_by = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->updated_by = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->created_at = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->updated_at = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 17; // 17 = UsuarioPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Usuario object", $e);
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

        if ($this->aPerfil !== null && $this->perfil_id !== $this->aPerfil->getId()) {
            $this->aPerfil = null;
        }
        if ($this->aSede !== null && $this->sede_id !== $this->aSede->getId()) {
            $this->aSede = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = UsuarioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPerfil = null;
            $this->aSede = null;
            $this->collMaletas = null;

            $this->collUsuarioHorarios = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = UsuarioQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(UsuarioPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(UsuarioPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(UsuarioPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                UsuarioPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPerfil !== null) {
                if ($this->aPerfil->isModified() || $this->aPerfil->isNew()) {
                    $affectedRows += $this->aPerfil->save($con);
                }
                $this->setPerfil($this->aPerfil);
            }

            if ($this->aSede !== null) {
                if ($this->aSede->isModified() || $this->aSede->isNew()) {
                    $affectedRows += $this->aSede->save($con);
                }
                $this->setSede($this->aSede);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->maletasScheduledForDeletion !== null) {
                if (!$this->maletasScheduledForDeletion->isEmpty()) {
                    MaletaQuery::create()
                        ->filterByPrimaryKeys($this->maletasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->maletasScheduledForDeletion = null;
                }
            }

            if ($this->collMaletas !== null) {
                foreach ($this->collMaletas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->usuarioHorariosScheduledForDeletion !== null) {
                if (!$this->usuarioHorariosScheduledForDeletion->isEmpty()) {
                    UsuarioHorarioQuery::create()
                        ->filterByPrimaryKeys($this->usuarioHorariosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->usuarioHorariosScheduledForDeletion = null;
                }
            }

            if ($this->collUsuarioHorarios !== null) {
                foreach ($this->collUsuarioHorarios as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = UsuarioPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UsuarioPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UsuarioPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(UsuarioPeer::NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = '`nombre`';
        }
        if ($this->isColumnModified(UsuarioPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(UsuarioPeer::SALT)) {
            $modifiedColumns[':p' . $index++]  = '`salt`';
        }
        if ($this->isColumnModified(UsuarioPeer::APELLIDO)) {
            $modifiedColumns[':p' . $index++]  = '`apellido`';
        }
        if ($this->isColumnModified(UsuarioPeer::DPI)) {
            $modifiedColumns[':p' . $index++]  = '`dpi`';
        }
        if ($this->isColumnModified(UsuarioPeer::PERFIL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`perfil_id`';
        }
        if ($this->isColumnModified(UsuarioPeer::USERNAME)) {
            $modifiedColumns[':p' . $index++]  = '`username`';
        }
        if ($this->isColumnModified(UsuarioPeer::PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`password`';
        }
        if ($this->isColumnModified(UsuarioPeer::DIRECCION)) {
            $modifiedColumns[':p' . $index++]  = '`direccion`';
        }
        if ($this->isColumnModified(UsuarioPeer::FECHA_NACIMIENTO)) {
            $modifiedColumns[':p' . $index++]  = '`fecha_nacimiento`';
        }
        if ($this->isColumnModified(UsuarioPeer::ULTIMO_CAMBIO_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`ultimo_cambio_password`';
        }
        if ($this->isColumnModified(UsuarioPeer::SEDE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`sede_id`';
        }
        if ($this->isColumnModified(UsuarioPeer::CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`created_by`';
        }
        if ($this->isColumnModified(UsuarioPeer::UPDATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`updated_by`';
        }
        if ($this->isColumnModified(UsuarioPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(UsuarioPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `usuario` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`nombre`':
                        $stmt->bindValue($identifier, $this->nombre, PDO::PARAM_STR);
                        break;
                    case '`email`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`salt`':
                        $stmt->bindValue($identifier, $this->salt, PDO::PARAM_STR);
                        break;
                    case '`apellido`':
                        $stmt->bindValue($identifier, $this->apellido, PDO::PARAM_STR);
                        break;
                    case '`dpi`':
                        $stmt->bindValue($identifier, $this->dpi, PDO::PARAM_STR);
                        break;
                    case '`perfil_id`':
                        $stmt->bindValue($identifier, $this->perfil_id, PDO::PARAM_INT);
                        break;
                    case '`username`':
                        $stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
                        break;
                    case '`password`':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '`direccion`':
                        $stmt->bindValue($identifier, $this->direccion, PDO::PARAM_STR);
                        break;
                    case '`fecha_nacimiento`':
                        $stmt->bindValue($identifier, $this->fecha_nacimiento, PDO::PARAM_STR);
                        break;
                    case '`ultimo_cambio_password`':
                        $stmt->bindValue($identifier, $this->ultimo_cambio_password, PDO::PARAM_STR);
                        break;
                    case '`sede_id`':
                        $stmt->bindValue($identifier, $this->sede_id, PDO::PARAM_INT);
                        break;
                    case '`created_by`':
                        $stmt->bindValue($identifier, $this->created_by, PDO::PARAM_STR);
                        break;
                    case '`updated_by`':
                        $stmt->bindValue($identifier, $this->updated_by, PDO::PARAM_STR);
                        break;
                    case '`created_at`':
                        $stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`updated_at`':
                        $stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPerfil !== null) {
                if (!$this->aPerfil->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPerfil->getValidationFailures());
                }
            }

            if ($this->aSede !== null) {
                if (!$this->aSede->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSede->getValidationFailures());
                }
            }


            if (($retval = UsuarioPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMaletas !== null) {
                    foreach ($this->collMaletas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUsuarioHorarios !== null) {
                    foreach ($this->collUsuarioHorarios as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getNombre();
                break;
            case 2:
                return $this->getEmail();
                break;
            case 3:
                return $this->getSalt();
                break;
            case 4:
                return $this->getApellido();
                break;
            case 5:
                return $this->getDpi();
                break;
            case 6:
                return $this->getPerfilId();
                break;
            case 7:
                return $this->getUsername();
                break;
            case 8:
                return $this->getPassword();
                break;
            case 9:
                return $this->getDireccion();
                break;
            case 10:
                return $this->getFechaNacimiento();
                break;
            case 11:
                return $this->getUltimoCambioPassword();
                break;
            case 12:
                return $this->getSedeId();
                break;
            case 13:
                return $this->getCreatedBy();
                break;
            case 14:
                return $this->getUpdatedBy();
                break;
            case 15:
                return $this->getCreatedAt();
                break;
            case 16:
                return $this->getUpdatedAt();
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
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Usuario'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Usuario'][$this->getPrimaryKey()] = true;
        $keys = UsuarioPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNombre(),
            $keys[2] => $this->getEmail(),
            $keys[3] => $this->getSalt(),
            $keys[4] => $this->getApellido(),
            $keys[5] => $this->getDpi(),
            $keys[6] => $this->getPerfilId(),
            $keys[7] => $this->getUsername(),
            $keys[8] => $this->getPassword(),
            $keys[9] => $this->getDireccion(),
            $keys[10] => $this->getFechaNacimiento(),
            $keys[11] => $this->getUltimoCambioPassword(),
            $keys[12] => $this->getSedeId(),
            $keys[13] => $this->getCreatedBy(),
            $keys[14] => $this->getUpdatedBy(),
            $keys[15] => $this->getCreatedAt(),
            $keys[16] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aPerfil) {
                $result['Perfil'] = $this->aPerfil->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSede) {
                $result['Sede'] = $this->aSede->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMaletas) {
                $result['Maletas'] = $this->collMaletas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUsuarioHorarios) {
                $result['UsuarioHorarios'] = $this->collUsuarioHorarios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setNombre($value);
                break;
            case 2:
                $this->setEmail($value);
                break;
            case 3:
                $this->setSalt($value);
                break;
            case 4:
                $this->setApellido($value);
                break;
            case 5:
                $this->setDpi($value);
                break;
            case 6:
                $this->setPerfilId($value);
                break;
            case 7:
                $this->setUsername($value);
                break;
            case 8:
                $this->setPassword($value);
                break;
            case 9:
                $this->setDireccion($value);
                break;
            case 10:
                $this->setFechaNacimiento($value);
                break;
            case 11:
                $this->setUltimoCambioPassword($value);
                break;
            case 12:
                $this->setSedeId($value);
                break;
            case 13:
                $this->setCreatedBy($value);
                break;
            case 14:
                $this->setUpdatedBy($value);
                break;
            case 15:
                $this->setCreatedAt($value);
                break;
            case 16:
                $this->setUpdatedAt($value);
                break;
        } // switch()
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
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = UsuarioPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setEmail($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSalt($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setApellido($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDpi($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setPerfilId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setUsername($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPassword($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setDireccion($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setFechaNacimiento($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setUltimoCambioPassword($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setSedeId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setCreatedBy($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setUpdatedBy($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setCreatedAt($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setUpdatedAt($arr[$keys[16]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

        if ($this->isColumnModified(UsuarioPeer::ID)) $criteria->add(UsuarioPeer::ID, $this->id);
        if ($this->isColumnModified(UsuarioPeer::NOMBRE)) $criteria->add(UsuarioPeer::NOMBRE, $this->nombre);
        if ($this->isColumnModified(UsuarioPeer::EMAIL)) $criteria->add(UsuarioPeer::EMAIL, $this->email);
        if ($this->isColumnModified(UsuarioPeer::SALT)) $criteria->add(UsuarioPeer::SALT, $this->salt);
        if ($this->isColumnModified(UsuarioPeer::APELLIDO)) $criteria->add(UsuarioPeer::APELLIDO, $this->apellido);
        if ($this->isColumnModified(UsuarioPeer::DPI)) $criteria->add(UsuarioPeer::DPI, $this->dpi);
        if ($this->isColumnModified(UsuarioPeer::PERFIL_ID)) $criteria->add(UsuarioPeer::PERFIL_ID, $this->perfil_id);
        if ($this->isColumnModified(UsuarioPeer::USERNAME)) $criteria->add(UsuarioPeer::USERNAME, $this->username);
        if ($this->isColumnModified(UsuarioPeer::PASSWORD)) $criteria->add(UsuarioPeer::PASSWORD, $this->password);
        if ($this->isColumnModified(UsuarioPeer::DIRECCION)) $criteria->add(UsuarioPeer::DIRECCION, $this->direccion);
        if ($this->isColumnModified(UsuarioPeer::FECHA_NACIMIENTO)) $criteria->add(UsuarioPeer::FECHA_NACIMIENTO, $this->fecha_nacimiento);
        if ($this->isColumnModified(UsuarioPeer::ULTIMO_CAMBIO_PASSWORD)) $criteria->add(UsuarioPeer::ULTIMO_CAMBIO_PASSWORD, $this->ultimo_cambio_password);
        if ($this->isColumnModified(UsuarioPeer::SEDE_ID)) $criteria->add(UsuarioPeer::SEDE_ID, $this->sede_id);
        if ($this->isColumnModified(UsuarioPeer::CREATED_BY)) $criteria->add(UsuarioPeer::CREATED_BY, $this->created_by);
        if ($this->isColumnModified(UsuarioPeer::UPDATED_BY)) $criteria->add(UsuarioPeer::UPDATED_BY, $this->updated_by);
        if ($this->isColumnModified(UsuarioPeer::CREATED_AT)) $criteria->add(UsuarioPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(UsuarioPeer::UPDATED_AT)) $criteria->add(UsuarioPeer::UPDATED_AT, $this->updated_at);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
        $criteria->add(UsuarioPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Usuario (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombre($this->getNombre());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setSalt($this->getSalt());
        $copyObj->setApellido($this->getApellido());
        $copyObj->setDpi($this->getDpi());
        $copyObj->setPerfilId($this->getPerfilId());
        $copyObj->setUsername($this->getUsername());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setDireccion($this->getDireccion());
        $copyObj->setFechaNacimiento($this->getFechaNacimiento());
        $copyObj->setUltimoCambioPassword($this->getUltimoCambioPassword());
        $copyObj->setSedeId($this->getSedeId());
        $copyObj->setCreatedBy($this->getCreatedBy());
        $copyObj->setUpdatedBy($this->getUpdatedBy());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getMaletas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMaleta($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUsuarioHorarios() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsuarioHorario($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Usuario Clone of current object.
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
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return UsuarioPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new UsuarioPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Perfil object.
     *
     * @param                  Perfil $v
     * @return Usuario The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPerfil(Perfil $v = null)
    {
        if ($v === null) {
            $this->setPerfilId(NULL);
        } else {
            $this->setPerfilId($v->getId());
        }

        $this->aPerfil = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Perfil object, it will not be re-added.
        if ($v !== null) {
            $v->addUsuario($this);
        }


        return $this;
    }


    /**
     * Get the associated Perfil object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Perfil The associated Perfil object.
     * @throws PropelException
     */
    public function getPerfil(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPerfil === null && ($this->perfil_id !== null) && $doQuery) {
            $this->aPerfil = PerfilQuery::create()->findPk($this->perfil_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPerfil->addUsuarios($this);
             */
        }

        return $this->aPerfil;
    }

    /**
     * Declares an association between this object and a Sede object.
     *
     * @param                  Sede $v
     * @return Usuario The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSede(Sede $v = null)
    {
        if ($v === null) {
            $this->setSedeId(NULL);
        } else {
            $this->setSedeId($v->getId());
        }

        $this->aSede = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sede object, it will not be re-added.
        if ($v !== null) {
            $v->addUsuario($this);
        }


        return $this;
    }


    /**
     * Get the associated Sede object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sede The associated Sede object.
     * @throws PropelException
     */
    public function getSede(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSede === null && ($this->sede_id !== null) && $doQuery) {
            $this->aSede = SedeQuery::create()->findPk($this->sede_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSede->addUsuarios($this);
             */
        }

        return $this->aSede;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Maleta' == $relationName) {
            $this->initMaletas();
        }
        if ('UsuarioHorario' == $relationName) {
            $this->initUsuarioHorarios();
        }
    }

    /**
     * Clears out the collMaletas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Usuario The current object (for fluent API support)
     * @see        addMaletas()
     */
    public function clearMaletas()
    {
        $this->collMaletas = null; // important to set this to null since that means it is uninitialized
        $this->collMaletasPartial = null;

        return $this;
    }

    /**
     * reset is the collMaletas collection loaded partially
     *
     * @return void
     */
    public function resetPartialMaletas($v = true)
    {
        $this->collMaletasPartial = $v;
    }

    /**
     * Initializes the collMaletas collection.
     *
     * By default this just sets the collMaletas collection to an empty array (like clearcollMaletas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMaletas($overrideExisting = true)
    {
        if (null !== $this->collMaletas && !$overrideExisting) {
            return;
        }
        $this->collMaletas = new PropelObjectCollection();
        $this->collMaletas->setModel('Maleta');
    }

    /**
     * Gets an array of Maleta objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Usuario is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Maleta[] List of Maleta objects
     * @throws PropelException
     */
    public function getMaletas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMaletasPartial && !$this->isNew();
        if (null === $this->collMaletas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMaletas) {
                // return empty collection
                $this->initMaletas();
            } else {
                $collMaletas = MaletaQuery::create(null, $criteria)
                    ->filterByUsuario($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMaletasPartial && count($collMaletas)) {
                      $this->initMaletas(false);

                      foreach ($collMaletas as $obj) {
                        if (false == $this->collMaletas->contains($obj)) {
                          $this->collMaletas->append($obj);
                        }
                      }

                      $this->collMaletasPartial = true;
                    }

                    $collMaletas->getInternalIterator()->rewind();

                    return $collMaletas;
                }

                if ($partial && $this->collMaletas) {
                    foreach ($this->collMaletas as $obj) {
                        if ($obj->isNew()) {
                            $collMaletas[] = $obj;
                        }
                    }
                }

                $this->collMaletas = $collMaletas;
                $this->collMaletasPartial = false;
            }
        }

        return $this->collMaletas;
    }

    /**
     * Sets a collection of Maleta objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $maletas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Usuario The current object (for fluent API support)
     */
    public function setMaletas(PropelCollection $maletas, PropelPDO $con = null)
    {
        $maletasToDelete = $this->getMaletas(new Criteria(), $con)->diff($maletas);


        $this->maletasScheduledForDeletion = $maletasToDelete;

        foreach ($maletasToDelete as $maletaRemoved) {
            $maletaRemoved->setUsuario(null);
        }

        $this->collMaletas = null;
        foreach ($maletas as $maleta) {
            $this->addMaleta($maleta);
        }

        $this->collMaletas = $maletas;
        $this->collMaletasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Maleta objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Maleta objects.
     * @throws PropelException
     */
    public function countMaletas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMaletasPartial && !$this->isNew();
        if (null === $this->collMaletas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMaletas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMaletas());
            }
            $query = MaletaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUsuario($this)
                ->count($con);
        }

        return count($this->collMaletas);
    }

    /**
     * Method called to associate a Maleta object to this object
     * through the Maleta foreign key attribute.
     *
     * @param    Maleta $l Maleta
     * @return Usuario The current object (for fluent API support)
     */
    public function addMaleta(Maleta $l)
    {
        if ($this->collMaletas === null) {
            $this->initMaletas();
            $this->collMaletasPartial = true;
        }

        if (!in_array($l, $this->collMaletas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMaleta($l);

            if ($this->maletasScheduledForDeletion and $this->maletasScheduledForDeletion->contains($l)) {
                $this->maletasScheduledForDeletion->remove($this->maletasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Maleta $maleta The maleta object to add.
     */
    protected function doAddMaleta($maleta)
    {
        $this->collMaletas[]= $maleta;
        $maleta->setUsuario($this);
    }

    /**
     * @param	Maleta $maleta The maleta object to remove.
     * @return Usuario The current object (for fluent API support)
     */
    public function removeMaleta($maleta)
    {
        if ($this->getMaletas()->contains($maleta)) {
            $this->collMaletas->remove($this->collMaletas->search($maleta));
            if (null === $this->maletasScheduledForDeletion) {
                $this->maletasScheduledForDeletion = clone $this->collMaletas;
                $this->maletasScheduledForDeletion->clear();
            }
            $this->maletasScheduledForDeletion[]= clone $maleta;
            $maleta->setUsuario(null);
        }

        return $this;
    }

    /**
     * Clears out the collUsuarioHorarios collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Usuario The current object (for fluent API support)
     * @see        addUsuarioHorarios()
     */
    public function clearUsuarioHorarios()
    {
        $this->collUsuarioHorarios = null; // important to set this to null since that means it is uninitialized
        $this->collUsuarioHorariosPartial = null;

        return $this;
    }

    /**
     * reset is the collUsuarioHorarios collection loaded partially
     *
     * @return void
     */
    public function resetPartialUsuarioHorarios($v = true)
    {
        $this->collUsuarioHorariosPartial = $v;
    }

    /**
     * Initializes the collUsuarioHorarios collection.
     *
     * By default this just sets the collUsuarioHorarios collection to an empty array (like clearcollUsuarioHorarios());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsuarioHorarios($overrideExisting = true)
    {
        if (null !== $this->collUsuarioHorarios && !$overrideExisting) {
            return;
        }
        $this->collUsuarioHorarios = new PropelObjectCollection();
        $this->collUsuarioHorarios->setModel('UsuarioHorario');
    }

    /**
     * Gets an array of UsuarioHorario objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Usuario is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|UsuarioHorario[] List of UsuarioHorario objects
     * @throws PropelException
     */
    public function getUsuarioHorarios($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUsuarioHorariosPartial && !$this->isNew();
        if (null === $this->collUsuarioHorarios || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUsuarioHorarios) {
                // return empty collection
                $this->initUsuarioHorarios();
            } else {
                $collUsuarioHorarios = UsuarioHorarioQuery::create(null, $criteria)
                    ->filterByUsuario($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUsuarioHorariosPartial && count($collUsuarioHorarios)) {
                      $this->initUsuarioHorarios(false);

                      foreach ($collUsuarioHorarios as $obj) {
                        if (false == $this->collUsuarioHorarios->contains($obj)) {
                          $this->collUsuarioHorarios->append($obj);
                        }
                      }

                      $this->collUsuarioHorariosPartial = true;
                    }

                    $collUsuarioHorarios->getInternalIterator()->rewind();

                    return $collUsuarioHorarios;
                }

                if ($partial && $this->collUsuarioHorarios) {
                    foreach ($this->collUsuarioHorarios as $obj) {
                        if ($obj->isNew()) {
                            $collUsuarioHorarios[] = $obj;
                        }
                    }
                }

                $this->collUsuarioHorarios = $collUsuarioHorarios;
                $this->collUsuarioHorariosPartial = false;
            }
        }

        return $this->collUsuarioHorarios;
    }

    /**
     * Sets a collection of UsuarioHorario objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $usuarioHorarios A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Usuario The current object (for fluent API support)
     */
    public function setUsuarioHorarios(PropelCollection $usuarioHorarios, PropelPDO $con = null)
    {
        $usuarioHorariosToDelete = $this->getUsuarioHorarios(new Criteria(), $con)->diff($usuarioHorarios);


        $this->usuarioHorariosScheduledForDeletion = $usuarioHorariosToDelete;

        foreach ($usuarioHorariosToDelete as $usuarioHorarioRemoved) {
            $usuarioHorarioRemoved->setUsuario(null);
        }

        $this->collUsuarioHorarios = null;
        foreach ($usuarioHorarios as $usuarioHorario) {
            $this->addUsuarioHorario($usuarioHorario);
        }

        $this->collUsuarioHorarios = $usuarioHorarios;
        $this->collUsuarioHorariosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related UsuarioHorario objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related UsuarioHorario objects.
     * @throws PropelException
     */
    public function countUsuarioHorarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUsuarioHorariosPartial && !$this->isNew();
        if (null === $this->collUsuarioHorarios || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsuarioHorarios) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUsuarioHorarios());
            }
            $query = UsuarioHorarioQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUsuario($this)
                ->count($con);
        }

        return count($this->collUsuarioHorarios);
    }

    /**
     * Method called to associate a UsuarioHorario object to this object
     * through the UsuarioHorario foreign key attribute.
     *
     * @param    UsuarioHorario $l UsuarioHorario
     * @return Usuario The current object (for fluent API support)
     */
    public function addUsuarioHorario(UsuarioHorario $l)
    {
        if ($this->collUsuarioHorarios === null) {
            $this->initUsuarioHorarios();
            $this->collUsuarioHorariosPartial = true;
        }

        if (!in_array($l, $this->collUsuarioHorarios->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUsuarioHorario($l);

            if ($this->usuarioHorariosScheduledForDeletion and $this->usuarioHorariosScheduledForDeletion->contains($l)) {
                $this->usuarioHorariosScheduledForDeletion->remove($this->usuarioHorariosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	UsuarioHorario $usuarioHorario The usuarioHorario object to add.
     */
    protected function doAddUsuarioHorario($usuarioHorario)
    {
        $this->collUsuarioHorarios[]= $usuarioHorario;
        $usuarioHorario->setUsuario($this);
    }

    /**
     * @param	UsuarioHorario $usuarioHorario The usuarioHorario object to remove.
     * @return Usuario The current object (for fluent API support)
     */
    public function removeUsuarioHorario($usuarioHorario)
    {
        if ($this->getUsuarioHorarios()->contains($usuarioHorario)) {
            $this->collUsuarioHorarios->remove($this->collUsuarioHorarios->search($usuarioHorario));
            if (null === $this->usuarioHorariosScheduledForDeletion) {
                $this->usuarioHorariosScheduledForDeletion = clone $this->collUsuarioHorarios;
                $this->usuarioHorariosScheduledForDeletion->clear();
            }
            $this->usuarioHorariosScheduledForDeletion[]= clone $usuarioHorario;
            $usuarioHorario->setUsuario(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Usuario is new, it will return
     * an empty collection; or if this Usuario has previously
     * been saved, it will retrieve related UsuarioHorarios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Usuario.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UsuarioHorario[] List of UsuarioHorario objects
     */
    public function getUsuarioHorariosJoinHorario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsuarioHorarioQuery::create(null, $criteria);
        $query->joinWith('Horario', $join_behavior);

        return $this->getUsuarioHorarios($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->nombre = null;
        $this->email = null;
        $this->salt = null;
        $this->apellido = null;
        $this->dpi = null;
        $this->perfil_id = null;
        $this->username = null;
        $this->password = null;
        $this->direccion = null;
        $this->fecha_nacimiento = null;
        $this->ultimo_cambio_password = null;
        $this->sede_id = null;
        $this->created_by = null;
        $this->updated_by = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collMaletas) {
                foreach ($this->collMaletas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsuarioHorarios) {
                foreach ($this->collUsuarioHorarios as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPerfil instanceof Persistent) {
              $this->aPerfil->clearAllReferences($deep);
            }
            if ($this->aSede instanceof Persistent) {
              $this->aSede->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMaletas instanceof PropelCollection) {
            $this->collMaletas->clearIterator();
        }
        $this->collMaletas = null;
        if ($this->collUsuarioHorarios instanceof PropelCollection) {
            $this->collUsuarioHorarios->clearIterator();
        }
        $this->collUsuarioHorarios = null;
        $this->aPerfil = null;
        $this->aSede = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UsuarioPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     Usuario The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = UsuarioPeer::UPDATED_AT;

        return $this;
    }

}
