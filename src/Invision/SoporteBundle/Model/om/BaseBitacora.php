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
use \PropelDateTime;
use \PropelException;
use \PropelPDO;
use Invision\SoporteBundle\Model\Bitacora;
use Invision\SoporteBundle\Model\BitacoraPeer;
use Invision\SoporteBundle\Model\BitacoraQuery;
use Invision\SoporteBundle\Model\Sede;
use Invision\SoporteBundle\Model\SedeQuery;

abstract class BaseBitacora extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Invision\\SoporteBundle\\Model\\BitacoraPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BitacoraPeer
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
     * The value for the descripcion field.
     * @var        string
     */
    protected $descripcion;

    /**
     * The value for the direccion field.
     * @var        string
     */
    protected $direccion;

    /**
     * The value for the fecha_hora field.
     * @var        string
     */
    protected $fecha_hora;

    /**
     * The value for the usuario field.
     * @var        string
     */
    protected $usuario;

    /**
     * The value for the tabla field.
     * @var        string
     */
    protected $tabla;

    /**
     * The value for the dato_tabla field.
     * @var        int
     */
    protected $dato_tabla;

    /**
     * The value for the error field.
     * @var        string
     */
    protected $error;

    /**
     * The value for the dato_error field.
     * @var        string
     */
    protected $dato_error;

    /**
     * The value for the estado field.
     * @var        int
     */
    protected $estado;

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
     * @var        Sede
     */
    protected $aSede;

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
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [descripcion] column value.
     *
     * @return string
     */
    public function getDescripcion()
    {

        return $this->descripcion;
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
     * Get the [optionally formatted] temporal [fecha_hora] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getFechaHora($format = null)
    {
        if ($this->fecha_hora === null) {
            return null;
        }

        if ($this->fecha_hora === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->fecha_hora);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_hora, true), $x);
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
     * Get the [usuario] column value.
     *
     * @return string
     */
    public function getUsuario()
    {

        return $this->usuario;
    }

    /**
     * Get the [tabla] column value.
     *
     * @return string
     */
    public function getTabla()
    {

        return $this->tabla;
    }

    /**
     * Get the [dato_tabla] column value.
     *
     * @return int
     */
    public function getDatoTabla()
    {

        return $this->dato_tabla;
    }

    /**
     * Get the [error] column value.
     *
     * @return string
     */
    public function getError()
    {

        return $this->error;
    }

    /**
     * Get the [dato_error] column value.
     *
     * @return string
     */
    public function getDatoError()
    {

        return $this->dato_error;
    }

    /**
     * Get the [estado] column value.
     *
     * @return int
     */
    public function getEstado()
    {

        return $this->estado;
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
     * @return Bitacora The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = BitacoraPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [descripcion] column.
     *
     * @param  string $v new value
     * @return Bitacora The current object (for fluent API support)
     */
    public function setDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descripcion !== $v) {
            $this->descripcion = $v;
            $this->modifiedColumns[] = BitacoraPeer::DESCRIPCION;
        }


        return $this;
    } // setDescripcion()

    /**
     * Set the value of [direccion] column.
     *
     * @param  string $v new value
     * @return Bitacora The current object (for fluent API support)
     */
    public function setDireccion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->direccion !== $v) {
            $this->direccion = $v;
            $this->modifiedColumns[] = BitacoraPeer::DIRECCION;
        }


        return $this;
    } // setDireccion()

    /**
     * Sets the value of [fecha_hora] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Bitacora The current object (for fluent API support)
     */
    public function setFechaHora($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->fecha_hora !== null || $dt !== null) {
            $currentDateAsString = ($this->fecha_hora !== null && $tmpDt = new DateTime($this->fecha_hora)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->fecha_hora = $newDateAsString;
                $this->modifiedColumns[] = BitacoraPeer::FECHA_HORA;
            }
        } // if either are not null


        return $this;
    } // setFechaHora()

    /**
     * Set the value of [usuario] column.
     *
     * @param  string $v new value
     * @return Bitacora The current object (for fluent API support)
     */
    public function setUsuario($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->usuario !== $v) {
            $this->usuario = $v;
            $this->modifiedColumns[] = BitacoraPeer::USUARIO;
        }


        return $this;
    } // setUsuario()

    /**
     * Set the value of [tabla] column.
     *
     * @param  string $v new value
     * @return Bitacora The current object (for fluent API support)
     */
    public function setTabla($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tabla !== $v) {
            $this->tabla = $v;
            $this->modifiedColumns[] = BitacoraPeer::TABLA;
        }


        return $this;
    } // setTabla()

    /**
     * Set the value of [dato_tabla] column.
     *
     * @param  int $v new value
     * @return Bitacora The current object (for fluent API support)
     */
    public function setDatoTabla($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->dato_tabla !== $v) {
            $this->dato_tabla = $v;
            $this->modifiedColumns[] = BitacoraPeer::DATO_TABLA;
        }


        return $this;
    } // setDatoTabla()

    /**
     * Set the value of [error] column.
     *
     * @param  string $v new value
     * @return Bitacora The current object (for fluent API support)
     */
    public function setError($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->error !== $v) {
            $this->error = $v;
            $this->modifiedColumns[] = BitacoraPeer::ERROR;
        }


        return $this;
    } // setError()

    /**
     * Set the value of [dato_error] column.
     *
     * @param  string $v new value
     * @return Bitacora The current object (for fluent API support)
     */
    public function setDatoError($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dato_error !== $v) {
            $this->dato_error = $v;
            $this->modifiedColumns[] = BitacoraPeer::DATO_ERROR;
        }


        return $this;
    } // setDatoError()

    /**
     * Set the value of [estado] column.
     *
     * @param  int $v new value
     * @return Bitacora The current object (for fluent API support)
     */
    public function setEstado($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->estado !== $v) {
            $this->estado = $v;
            $this->modifiedColumns[] = BitacoraPeer::ESTADO;
        }


        return $this;
    } // setEstado()

    /**
     * Set the value of [sede_id] column.
     *
     * @param  int $v new value
     * @return Bitacora The current object (for fluent API support)
     */
    public function setSedeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sede_id !== $v) {
            $this->sede_id = $v;
            $this->modifiedColumns[] = BitacoraPeer::SEDE_ID;
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
     * @return Bitacora The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[] = BitacoraPeer::CREATED_BY;
        }


        return $this;
    } // setCreatedBy()

    /**
     * Set the value of [updated_by] column.
     *
     * @param  string $v new value
     * @return Bitacora The current object (for fluent API support)
     */
    public function setUpdatedBy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->updated_by !== $v) {
            $this->updated_by = $v;
            $this->modifiedColumns[] = BitacoraPeer::UPDATED_BY;
        }


        return $this;
    } // setUpdatedBy()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Bitacora The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = BitacoraPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Bitacora The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = BitacoraPeer::UPDATED_AT;
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
            $this->descripcion = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->direccion = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->fecha_hora = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->usuario = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tabla = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->dato_tabla = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->error = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->dato_error = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->estado = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->sede_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->created_by = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->updated_by = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->created_at = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->updated_at = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 15; // 15 = BitacoraPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Bitacora object", $e);
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
            $con = Propel::getConnection(BitacoraPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BitacoraPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSede = null;
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
            $con = Propel::getConnection(BitacoraPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BitacoraQuery::create()
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
            $con = Propel::getConnection(BitacoraPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(BitacoraPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(BitacoraPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(BitacoraPeer::UPDATED_AT)) {
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
                BitacoraPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = BitacoraPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . BitacoraPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(BitacoraPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(BitacoraPeer::DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = '`descripcion`';
        }
        if ($this->isColumnModified(BitacoraPeer::DIRECCION)) {
            $modifiedColumns[':p' . $index++]  = '`direccion`';
        }
        if ($this->isColumnModified(BitacoraPeer::FECHA_HORA)) {
            $modifiedColumns[':p' . $index++]  = '`fecha_hora`';
        }
        if ($this->isColumnModified(BitacoraPeer::USUARIO)) {
            $modifiedColumns[':p' . $index++]  = '`usuario`';
        }
        if ($this->isColumnModified(BitacoraPeer::TABLA)) {
            $modifiedColumns[':p' . $index++]  = '`tabla`';
        }
        if ($this->isColumnModified(BitacoraPeer::DATO_TABLA)) {
            $modifiedColumns[':p' . $index++]  = '`dato_tabla`';
        }
        if ($this->isColumnModified(BitacoraPeer::ERROR)) {
            $modifiedColumns[':p' . $index++]  = '`error`';
        }
        if ($this->isColumnModified(BitacoraPeer::DATO_ERROR)) {
            $modifiedColumns[':p' . $index++]  = '`dato_error`';
        }
        if ($this->isColumnModified(BitacoraPeer::ESTADO)) {
            $modifiedColumns[':p' . $index++]  = '`estado`';
        }
        if ($this->isColumnModified(BitacoraPeer::SEDE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`sede_id`';
        }
        if ($this->isColumnModified(BitacoraPeer::CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`created_by`';
        }
        if ($this->isColumnModified(BitacoraPeer::UPDATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`updated_by`';
        }
        if ($this->isColumnModified(BitacoraPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(BitacoraPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `bitacora` (%s) VALUES (%s)',
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
                    case '`descripcion`':
                        $stmt->bindValue($identifier, $this->descripcion, PDO::PARAM_STR);
                        break;
                    case '`direccion`':
                        $stmt->bindValue($identifier, $this->direccion, PDO::PARAM_STR);
                        break;
                    case '`fecha_hora`':
                        $stmt->bindValue($identifier, $this->fecha_hora, PDO::PARAM_STR);
                        break;
                    case '`usuario`':
                        $stmt->bindValue($identifier, $this->usuario, PDO::PARAM_STR);
                        break;
                    case '`tabla`':
                        $stmt->bindValue($identifier, $this->tabla, PDO::PARAM_STR);
                        break;
                    case '`dato_tabla`':
                        $stmt->bindValue($identifier, $this->dato_tabla, PDO::PARAM_INT);
                        break;
                    case '`error`':
                        $stmt->bindValue($identifier, $this->error, PDO::PARAM_STR);
                        break;
                    case '`dato_error`':
                        $stmt->bindValue($identifier, $this->dato_error, PDO::PARAM_STR);
                        break;
                    case '`estado`':
                        $stmt->bindValue($identifier, $this->estado, PDO::PARAM_INT);
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

            if ($this->aSede !== null) {
                if (!$this->aSede->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSede->getValidationFailures());
                }
            }


            if (($retval = BitacoraPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = BitacoraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDescripcion();
                break;
            case 2:
                return $this->getDireccion();
                break;
            case 3:
                return $this->getFechaHora();
                break;
            case 4:
                return $this->getUsuario();
                break;
            case 5:
                return $this->getTabla();
                break;
            case 6:
                return $this->getDatoTabla();
                break;
            case 7:
                return $this->getError();
                break;
            case 8:
                return $this->getDatoError();
                break;
            case 9:
                return $this->getEstado();
                break;
            case 10:
                return $this->getSedeId();
                break;
            case 11:
                return $this->getCreatedBy();
                break;
            case 12:
                return $this->getUpdatedBy();
                break;
            case 13:
                return $this->getCreatedAt();
                break;
            case 14:
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
        if (isset($alreadyDumpedObjects['Bitacora'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Bitacora'][$this->getPrimaryKey()] = true;
        $keys = BitacoraPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getDescripcion(),
            $keys[2] => $this->getDireccion(),
            $keys[3] => $this->getFechaHora(),
            $keys[4] => $this->getUsuario(),
            $keys[5] => $this->getTabla(),
            $keys[6] => $this->getDatoTabla(),
            $keys[7] => $this->getError(),
            $keys[8] => $this->getDatoError(),
            $keys[9] => $this->getEstado(),
            $keys[10] => $this->getSedeId(),
            $keys[11] => $this->getCreatedBy(),
            $keys[12] => $this->getUpdatedBy(),
            $keys[13] => $this->getCreatedAt(),
            $keys[14] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aSede) {
                $result['Sede'] = $this->aSede->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = BitacoraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDescripcion($value);
                break;
            case 2:
                $this->setDireccion($value);
                break;
            case 3:
                $this->setFechaHora($value);
                break;
            case 4:
                $this->setUsuario($value);
                break;
            case 5:
                $this->setTabla($value);
                break;
            case 6:
                $this->setDatoTabla($value);
                break;
            case 7:
                $this->setError($value);
                break;
            case 8:
                $this->setDatoError($value);
                break;
            case 9:
                $this->setEstado($value);
                break;
            case 10:
                $this->setSedeId($value);
                break;
            case 11:
                $this->setCreatedBy($value);
                break;
            case 12:
                $this->setUpdatedBy($value);
                break;
            case 13:
                $this->setCreatedAt($value);
                break;
            case 14:
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
        $keys = BitacoraPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDescripcion($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDireccion($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFechaHora($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setUsuario($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTabla($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDatoTabla($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setError($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setDatoError($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setEstado($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setSedeId($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setCreatedBy($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setUpdatedBy($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setCreatedAt($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setUpdatedAt($arr[$keys[14]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BitacoraPeer::DATABASE_NAME);

        if ($this->isColumnModified(BitacoraPeer::ID)) $criteria->add(BitacoraPeer::ID, $this->id);
        if ($this->isColumnModified(BitacoraPeer::DESCRIPCION)) $criteria->add(BitacoraPeer::DESCRIPCION, $this->descripcion);
        if ($this->isColumnModified(BitacoraPeer::DIRECCION)) $criteria->add(BitacoraPeer::DIRECCION, $this->direccion);
        if ($this->isColumnModified(BitacoraPeer::FECHA_HORA)) $criteria->add(BitacoraPeer::FECHA_HORA, $this->fecha_hora);
        if ($this->isColumnModified(BitacoraPeer::USUARIO)) $criteria->add(BitacoraPeer::USUARIO, $this->usuario);
        if ($this->isColumnModified(BitacoraPeer::TABLA)) $criteria->add(BitacoraPeer::TABLA, $this->tabla);
        if ($this->isColumnModified(BitacoraPeer::DATO_TABLA)) $criteria->add(BitacoraPeer::DATO_TABLA, $this->dato_tabla);
        if ($this->isColumnModified(BitacoraPeer::ERROR)) $criteria->add(BitacoraPeer::ERROR, $this->error);
        if ($this->isColumnModified(BitacoraPeer::DATO_ERROR)) $criteria->add(BitacoraPeer::DATO_ERROR, $this->dato_error);
        if ($this->isColumnModified(BitacoraPeer::ESTADO)) $criteria->add(BitacoraPeer::ESTADO, $this->estado);
        if ($this->isColumnModified(BitacoraPeer::SEDE_ID)) $criteria->add(BitacoraPeer::SEDE_ID, $this->sede_id);
        if ($this->isColumnModified(BitacoraPeer::CREATED_BY)) $criteria->add(BitacoraPeer::CREATED_BY, $this->created_by);
        if ($this->isColumnModified(BitacoraPeer::UPDATED_BY)) $criteria->add(BitacoraPeer::UPDATED_BY, $this->updated_by);
        if ($this->isColumnModified(BitacoraPeer::CREATED_AT)) $criteria->add(BitacoraPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(BitacoraPeer::UPDATED_AT)) $criteria->add(BitacoraPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(BitacoraPeer::DATABASE_NAME);
        $criteria->add(BitacoraPeer::ID, $this->id);

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
     * @param object $copyObj An object of Bitacora (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDescripcion($this->getDescripcion());
        $copyObj->setDireccion($this->getDireccion());
        $copyObj->setFechaHora($this->getFechaHora());
        $copyObj->setUsuario($this->getUsuario());
        $copyObj->setTabla($this->getTabla());
        $copyObj->setDatoTabla($this->getDatoTabla());
        $copyObj->setError($this->getError());
        $copyObj->setDatoError($this->getDatoError());
        $copyObj->setEstado($this->getEstado());
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
     * @return Bitacora Clone of current object.
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
     * @return BitacoraPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BitacoraPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sede object.
     *
     * @param                  Sede $v
     * @return Bitacora The current object (for fluent API support)
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
            $v->addBitacora($this);
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
                $this->aSede->addBitacoras($this);
             */
        }

        return $this->aSede;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->descripcion = null;
        $this->direccion = null;
        $this->fecha_hora = null;
        $this->usuario = null;
        $this->tabla = null;
        $this->dato_tabla = null;
        $this->error = null;
        $this->dato_error = null;
        $this->estado = null;
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
            if ($this->aSede instanceof Persistent) {
              $this->aSede->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aSede = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BitacoraPeer::DEFAULT_STRING_FORMAT);
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
     * @return     Bitacora The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = BitacoraPeer::UPDATED_AT;

        return $this;
    }

}
