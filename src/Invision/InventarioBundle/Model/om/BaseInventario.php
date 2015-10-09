<?php

namespace Invision\InventarioBundle\Model\om;

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
use Invision\InventarioBundle\Model\Color;
use Invision\InventarioBundle\Model\ColorQuery;
use Invision\InventarioBundle\Model\Inventario;
use Invision\InventarioBundle\Model\InventarioPeer;
use Invision\InventarioBundle\Model\InventarioQuery;
use Invision\InventarioBundle\Model\MaletaDetalle;
use Invision\InventarioBundle\Model\MaletaDetalleQuery;
use Invision\SoporteBundle\Model\Sede;
use Invision\SoporteBundle\Model\SedeQuery;

abstract class BaseInventario extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Invision\\InventarioBundle\\Model\\InventarioPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        InventarioPeer
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
     * The value for the codigo field.
     * @var        string
     */
    protected $codigo;

    /**
     * The value for the color_id field.
     * @var        int
     */
    protected $color_id;

    /**
     * The value for the cantidad field.
     * @var        int
     */
    protected $cantidad;

    /**
     * The value for the costo field.
     * @var        double
     */
    protected $costo;

    /**
     * The value for the venta field.
     * @var        double
     */
    protected $venta;

    /**
     * The value for the descripcion field.
     * @var        string
     */
    protected $descripcion;

    /**
     * The value for the imagen field.
     * @var        string
     */
    protected $imagen;

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
     * @var        Color
     */
    protected $aColor;

    /**
     * @var        Sede
     */
    protected $aSede;

    /**
     * @var        PropelObjectCollection|MaletaDetalle[] Collection to store aggregation of MaletaDetalle objects.
     */
    protected $collMaletaDetalles;
    protected $collMaletaDetallesPartial;

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
    protected $maletaDetallesScheduledForDeletion = null;

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
     * Get the [codigo] column value.
     *
     * @return string
     */
    public function getCodigo()
    {

        return $this->codigo;
    }

    /**
     * Get the [color_id] column value.
     *
     * @return int
     */
    public function getColorId()
    {

        return $this->color_id;
    }

    /**
     * Get the [cantidad] column value.
     *
     * @return int
     */
    public function getCantidad()
    {

        return $this->cantidad;
    }

    /**
     * Get the [costo] column value.
     *
     * @return double
     */
    public function getCosto()
    {

        return $this->costo;
    }

    /**
     * Get the [venta] column value.
     *
     * @return double
     */
    public function getVenta()
    {

        return $this->venta;
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
     * Get the [imagen] column value.
     *
     * @return string
     */
    public function getImagen()
    {

        return $this->imagen;
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
     * @return Inventario The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = InventarioPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [codigo] column.
     *
     * @param  string $v new value
     * @return Inventario The current object (for fluent API support)
     */
    public function setCodigo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->codigo !== $v) {
            $this->codigo = $v;
            $this->modifiedColumns[] = InventarioPeer::CODIGO;
        }


        return $this;
    } // setCodigo()

    /**
     * Set the value of [color_id] column.
     *
     * @param  int $v new value
     * @return Inventario The current object (for fluent API support)
     */
    public function setColorId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->color_id !== $v) {
            $this->color_id = $v;
            $this->modifiedColumns[] = InventarioPeer::COLOR_ID;
        }

        if ($this->aColor !== null && $this->aColor->getId() !== $v) {
            $this->aColor = null;
        }


        return $this;
    } // setColorId()

    /**
     * Set the value of [cantidad] column.
     *
     * @param  int $v new value
     * @return Inventario The current object (for fluent API support)
     */
    public function setCantidad($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->cantidad !== $v) {
            $this->cantidad = $v;
            $this->modifiedColumns[] = InventarioPeer::CANTIDAD;
        }


        return $this;
    } // setCantidad()

    /**
     * Set the value of [costo] column.
     *
     * @param  double $v new value
     * @return Inventario The current object (for fluent API support)
     */
    public function setCosto($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->costo !== $v) {
            $this->costo = $v;
            $this->modifiedColumns[] = InventarioPeer::COSTO;
        }


        return $this;
    } // setCosto()

    /**
     * Set the value of [venta] column.
     *
     * @param  double $v new value
     * @return Inventario The current object (for fluent API support)
     */
    public function setVenta($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->venta !== $v) {
            $this->venta = $v;
            $this->modifiedColumns[] = InventarioPeer::VENTA;
        }


        return $this;
    } // setVenta()

    /**
     * Set the value of [descripcion] column.
     *
     * @param  string $v new value
     * @return Inventario The current object (for fluent API support)
     */
    public function setDescripcion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descripcion !== $v) {
            $this->descripcion = $v;
            $this->modifiedColumns[] = InventarioPeer::DESCRIPCION;
        }


        return $this;
    } // setDescripcion()

    /**
     * Set the value of [imagen] column.
     *
     * @param  string $v new value
     * @return Inventario The current object (for fluent API support)
     */
    public function setImagen($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->imagen !== $v) {
            $this->imagen = $v;
            $this->modifiedColumns[] = InventarioPeer::IMAGEN;
        }


        return $this;
    } // setImagen()

    /**
     * Set the value of [sede_id] column.
     *
     * @param  int $v new value
     * @return Inventario The current object (for fluent API support)
     */
    public function setSedeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->sede_id !== $v) {
            $this->sede_id = $v;
            $this->modifiedColumns[] = InventarioPeer::SEDE_ID;
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
     * @return Inventario The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[] = InventarioPeer::CREATED_BY;
        }


        return $this;
    } // setCreatedBy()

    /**
     * Set the value of [updated_by] column.
     *
     * @param  string $v new value
     * @return Inventario The current object (for fluent API support)
     */
    public function setUpdatedBy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->updated_by !== $v) {
            $this->updated_by = $v;
            $this->modifiedColumns[] = InventarioPeer::UPDATED_BY;
        }


        return $this;
    } // setUpdatedBy()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Inventario The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = InventarioPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Inventario The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = InventarioPeer::UPDATED_AT;
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
            $this->codigo = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->color_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->cantidad = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->costo = ($row[$startcol + 4] !== null) ? (double) $row[$startcol + 4] : null;
            $this->venta = ($row[$startcol + 5] !== null) ? (double) $row[$startcol + 5] : null;
            $this->descripcion = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->imagen = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->sede_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->created_by = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->updated_by = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->created_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->updated_at = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 13; // 13 = InventarioPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Inventario object", $e);
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

        if ($this->aColor !== null && $this->color_id !== $this->aColor->getId()) {
            $this->aColor = null;
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
            $con = Propel::getConnection(InventarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = InventarioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aColor = null;
            $this->aSede = null;
            $this->collMaletaDetalles = null;

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
            $con = Propel::getConnection(InventarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = InventarioQuery::create()
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
            $con = Propel::getConnection(InventarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(InventarioPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(InventarioPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(InventarioPeer::UPDATED_AT)) {
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
                InventarioPeer::addInstanceToPool($this);
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

            if ($this->aColor !== null) {
                if ($this->aColor->isModified() || $this->aColor->isNew()) {
                    $affectedRows += $this->aColor->save($con);
                }
                $this->setColor($this->aColor);
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

            if ($this->maletaDetallesScheduledForDeletion !== null) {
                if (!$this->maletaDetallesScheduledForDeletion->isEmpty()) {
                    MaletaDetalleQuery::create()
                        ->filterByPrimaryKeys($this->maletaDetallesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->maletaDetallesScheduledForDeletion = null;
                }
            }

            if ($this->collMaletaDetalles !== null) {
                foreach ($this->collMaletaDetalles as $referrerFK) {
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

        $this->modifiedColumns[] = InventarioPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . InventarioPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(InventarioPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(InventarioPeer::CODIGO)) {
            $modifiedColumns[':p' . $index++]  = '`codigo`';
        }
        if ($this->isColumnModified(InventarioPeer::COLOR_ID)) {
            $modifiedColumns[':p' . $index++]  = '`color_id`';
        }
        if ($this->isColumnModified(InventarioPeer::CANTIDAD)) {
            $modifiedColumns[':p' . $index++]  = '`cantidad`';
        }
        if ($this->isColumnModified(InventarioPeer::COSTO)) {
            $modifiedColumns[':p' . $index++]  = '`costo`';
        }
        if ($this->isColumnModified(InventarioPeer::VENTA)) {
            $modifiedColumns[':p' . $index++]  = '`venta`';
        }
        if ($this->isColumnModified(InventarioPeer::DESCRIPCION)) {
            $modifiedColumns[':p' . $index++]  = '`descripcion`';
        }
        if ($this->isColumnModified(InventarioPeer::IMAGEN)) {
            $modifiedColumns[':p' . $index++]  = '`imagen`';
        }
        if ($this->isColumnModified(InventarioPeer::SEDE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`sede_id`';
        }
        if ($this->isColumnModified(InventarioPeer::CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`created_by`';
        }
        if ($this->isColumnModified(InventarioPeer::UPDATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`updated_by`';
        }
        if ($this->isColumnModified(InventarioPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(InventarioPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `inventario` (%s) VALUES (%s)',
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
                    case '`codigo`':
                        $stmt->bindValue($identifier, $this->codigo, PDO::PARAM_STR);
                        break;
                    case '`color_id`':
                        $stmt->bindValue($identifier, $this->color_id, PDO::PARAM_INT);
                        break;
                    case '`cantidad`':
                        $stmt->bindValue($identifier, $this->cantidad, PDO::PARAM_INT);
                        break;
                    case '`costo`':
                        $stmt->bindValue($identifier, $this->costo, PDO::PARAM_STR);
                        break;
                    case '`venta`':
                        $stmt->bindValue($identifier, $this->venta, PDO::PARAM_STR);
                        break;
                    case '`descripcion`':
                        $stmt->bindValue($identifier, $this->descripcion, PDO::PARAM_STR);
                        break;
                    case '`imagen`':
                        $stmt->bindValue($identifier, $this->imagen, PDO::PARAM_STR);
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

            if ($this->aColor !== null) {
                if (!$this->aColor->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aColor->getValidationFailures());
                }
            }

            if ($this->aSede !== null) {
                if (!$this->aSede->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSede->getValidationFailures());
                }
            }


            if (($retval = InventarioPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMaletaDetalles !== null) {
                    foreach ($this->collMaletaDetalles as $referrerFK) {
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
        $pos = InventarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCodigo();
                break;
            case 2:
                return $this->getColorId();
                break;
            case 3:
                return $this->getCantidad();
                break;
            case 4:
                return $this->getCosto();
                break;
            case 5:
                return $this->getVenta();
                break;
            case 6:
                return $this->getDescripcion();
                break;
            case 7:
                return $this->getImagen();
                break;
            case 8:
                return $this->getSedeId();
                break;
            case 9:
                return $this->getCreatedBy();
                break;
            case 10:
                return $this->getUpdatedBy();
                break;
            case 11:
                return $this->getCreatedAt();
                break;
            case 12:
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
        if (isset($alreadyDumpedObjects['Inventario'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Inventario'][$this->getPrimaryKey()] = true;
        $keys = InventarioPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCodigo(),
            $keys[2] => $this->getColorId(),
            $keys[3] => $this->getCantidad(),
            $keys[4] => $this->getCosto(),
            $keys[5] => $this->getVenta(),
            $keys[6] => $this->getDescripcion(),
            $keys[7] => $this->getImagen(),
            $keys[8] => $this->getSedeId(),
            $keys[9] => $this->getCreatedBy(),
            $keys[10] => $this->getUpdatedBy(),
            $keys[11] => $this->getCreatedAt(),
            $keys[12] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aColor) {
                $result['Color'] = $this->aColor->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSede) {
                $result['Sede'] = $this->aSede->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMaletaDetalles) {
                $result['MaletaDetalles'] = $this->collMaletaDetalles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = InventarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCodigo($value);
                break;
            case 2:
                $this->setColorId($value);
                break;
            case 3:
                $this->setCantidad($value);
                break;
            case 4:
                $this->setCosto($value);
                break;
            case 5:
                $this->setVenta($value);
                break;
            case 6:
                $this->setDescripcion($value);
                break;
            case 7:
                $this->setImagen($value);
                break;
            case 8:
                $this->setSedeId($value);
                break;
            case 9:
                $this->setCreatedBy($value);
                break;
            case 10:
                $this->setUpdatedBy($value);
                break;
            case 11:
                $this->setCreatedAt($value);
                break;
            case 12:
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
        $keys = InventarioPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCodigo($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setColorId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCantidad($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCosto($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setVenta($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDescripcion($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setImagen($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setSedeId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCreatedBy($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setUpdatedBy($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setCreatedAt($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setUpdatedAt($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(InventarioPeer::DATABASE_NAME);

        if ($this->isColumnModified(InventarioPeer::ID)) $criteria->add(InventarioPeer::ID, $this->id);
        if ($this->isColumnModified(InventarioPeer::CODIGO)) $criteria->add(InventarioPeer::CODIGO, $this->codigo);
        if ($this->isColumnModified(InventarioPeer::COLOR_ID)) $criteria->add(InventarioPeer::COLOR_ID, $this->color_id);
        if ($this->isColumnModified(InventarioPeer::CANTIDAD)) $criteria->add(InventarioPeer::CANTIDAD, $this->cantidad);
        if ($this->isColumnModified(InventarioPeer::COSTO)) $criteria->add(InventarioPeer::COSTO, $this->costo);
        if ($this->isColumnModified(InventarioPeer::VENTA)) $criteria->add(InventarioPeer::VENTA, $this->venta);
        if ($this->isColumnModified(InventarioPeer::DESCRIPCION)) $criteria->add(InventarioPeer::DESCRIPCION, $this->descripcion);
        if ($this->isColumnModified(InventarioPeer::IMAGEN)) $criteria->add(InventarioPeer::IMAGEN, $this->imagen);
        if ($this->isColumnModified(InventarioPeer::SEDE_ID)) $criteria->add(InventarioPeer::SEDE_ID, $this->sede_id);
        if ($this->isColumnModified(InventarioPeer::CREATED_BY)) $criteria->add(InventarioPeer::CREATED_BY, $this->created_by);
        if ($this->isColumnModified(InventarioPeer::UPDATED_BY)) $criteria->add(InventarioPeer::UPDATED_BY, $this->updated_by);
        if ($this->isColumnModified(InventarioPeer::CREATED_AT)) $criteria->add(InventarioPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(InventarioPeer::UPDATED_AT)) $criteria->add(InventarioPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(InventarioPeer::DATABASE_NAME);
        $criteria->add(InventarioPeer::ID, $this->id);

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
     * @param object $copyObj An object of Inventario (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCodigo($this->getCodigo());
        $copyObj->setColorId($this->getColorId());
        $copyObj->setCantidad($this->getCantidad());
        $copyObj->setCosto($this->getCosto());
        $copyObj->setVenta($this->getVenta());
        $copyObj->setDescripcion($this->getDescripcion());
        $copyObj->setImagen($this->getImagen());
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

            foreach ($this->getMaletaDetalles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMaletaDetalle($relObj->copy($deepCopy));
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
     * @return Inventario Clone of current object.
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
     * @return InventarioPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new InventarioPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Color object.
     *
     * @param                  Color $v
     * @return Inventario The current object (for fluent API support)
     * @throws PropelException
     */
    public function setColor(Color $v = null)
    {
        if ($v === null) {
            $this->setColorId(NULL);
        } else {
            $this->setColorId($v->getId());
        }

        $this->aColor = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Color object, it will not be re-added.
        if ($v !== null) {
            $v->addInventario($this);
        }


        return $this;
    }


    /**
     * Get the associated Color object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Color The associated Color object.
     * @throws PropelException
     */
    public function getColor(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aColor === null && ($this->color_id !== null) && $doQuery) {
            $this->aColor = ColorQuery::create()->findPk($this->color_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aColor->addInventarios($this);
             */
        }

        return $this->aColor;
    }

    /**
     * Declares an association between this object and a Sede object.
     *
     * @param                  Sede $v
     * @return Inventario The current object (for fluent API support)
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
            $v->addInventario($this);
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
                $this->aSede->addInventarios($this);
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
        if ('MaletaDetalle' == $relationName) {
            $this->initMaletaDetalles();
        }
    }

    /**
     * Clears out the collMaletaDetalles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Inventario The current object (for fluent API support)
     * @see        addMaletaDetalles()
     */
    public function clearMaletaDetalles()
    {
        $this->collMaletaDetalles = null; // important to set this to null since that means it is uninitialized
        $this->collMaletaDetallesPartial = null;

        return $this;
    }

    /**
     * reset is the collMaletaDetalles collection loaded partially
     *
     * @return void
     */
    public function resetPartialMaletaDetalles($v = true)
    {
        $this->collMaletaDetallesPartial = $v;
    }

    /**
     * Initializes the collMaletaDetalles collection.
     *
     * By default this just sets the collMaletaDetalles collection to an empty array (like clearcollMaletaDetalles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMaletaDetalles($overrideExisting = true)
    {
        if (null !== $this->collMaletaDetalles && !$overrideExisting) {
            return;
        }
        $this->collMaletaDetalles = new PropelObjectCollection();
        $this->collMaletaDetalles->setModel('MaletaDetalle');
    }

    /**
     * Gets an array of MaletaDetalle objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Inventario is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|MaletaDetalle[] List of MaletaDetalle objects
     * @throws PropelException
     */
    public function getMaletaDetalles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMaletaDetallesPartial && !$this->isNew();
        if (null === $this->collMaletaDetalles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMaletaDetalles) {
                // return empty collection
                $this->initMaletaDetalles();
            } else {
                $collMaletaDetalles = MaletaDetalleQuery::create(null, $criteria)
                    ->filterByInventario($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMaletaDetallesPartial && count($collMaletaDetalles)) {
                      $this->initMaletaDetalles(false);

                      foreach ($collMaletaDetalles as $obj) {
                        if (false == $this->collMaletaDetalles->contains($obj)) {
                          $this->collMaletaDetalles->append($obj);
                        }
                      }

                      $this->collMaletaDetallesPartial = true;
                    }

                    $collMaletaDetalles->getInternalIterator()->rewind();

                    return $collMaletaDetalles;
                }

                if ($partial && $this->collMaletaDetalles) {
                    foreach ($this->collMaletaDetalles as $obj) {
                        if ($obj->isNew()) {
                            $collMaletaDetalles[] = $obj;
                        }
                    }
                }

                $this->collMaletaDetalles = $collMaletaDetalles;
                $this->collMaletaDetallesPartial = false;
            }
        }

        return $this->collMaletaDetalles;
    }

    /**
     * Sets a collection of MaletaDetalle objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $maletaDetalles A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Inventario The current object (for fluent API support)
     */
    public function setMaletaDetalles(PropelCollection $maletaDetalles, PropelPDO $con = null)
    {
        $maletaDetallesToDelete = $this->getMaletaDetalles(new Criteria(), $con)->diff($maletaDetalles);


        $this->maletaDetallesScheduledForDeletion = $maletaDetallesToDelete;

        foreach ($maletaDetallesToDelete as $maletaDetalleRemoved) {
            $maletaDetalleRemoved->setInventario(null);
        }

        $this->collMaletaDetalles = null;
        foreach ($maletaDetalles as $maletaDetalle) {
            $this->addMaletaDetalle($maletaDetalle);
        }

        $this->collMaletaDetalles = $maletaDetalles;
        $this->collMaletaDetallesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MaletaDetalle objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related MaletaDetalle objects.
     * @throws PropelException
     */
    public function countMaletaDetalles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMaletaDetallesPartial && !$this->isNew();
        if (null === $this->collMaletaDetalles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMaletaDetalles) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMaletaDetalles());
            }
            $query = MaletaDetalleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInventario($this)
                ->count($con);
        }

        return count($this->collMaletaDetalles);
    }

    /**
     * Method called to associate a MaletaDetalle object to this object
     * through the MaletaDetalle foreign key attribute.
     *
     * @param    MaletaDetalle $l MaletaDetalle
     * @return Inventario The current object (for fluent API support)
     */
    public function addMaletaDetalle(MaletaDetalle $l)
    {
        if ($this->collMaletaDetalles === null) {
            $this->initMaletaDetalles();
            $this->collMaletaDetallesPartial = true;
        }

        if (!in_array($l, $this->collMaletaDetalles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMaletaDetalle($l);

            if ($this->maletaDetallesScheduledForDeletion and $this->maletaDetallesScheduledForDeletion->contains($l)) {
                $this->maletaDetallesScheduledForDeletion->remove($this->maletaDetallesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	MaletaDetalle $maletaDetalle The maletaDetalle object to add.
     */
    protected function doAddMaletaDetalle($maletaDetalle)
    {
        $this->collMaletaDetalles[]= $maletaDetalle;
        $maletaDetalle->setInventario($this);
    }

    /**
     * @param	MaletaDetalle $maletaDetalle The maletaDetalle object to remove.
     * @return Inventario The current object (for fluent API support)
     */
    public function removeMaletaDetalle($maletaDetalle)
    {
        if ($this->getMaletaDetalles()->contains($maletaDetalle)) {
            $this->collMaletaDetalles->remove($this->collMaletaDetalles->search($maletaDetalle));
            if (null === $this->maletaDetallesScheduledForDeletion) {
                $this->maletaDetallesScheduledForDeletion = clone $this->collMaletaDetalles;
                $this->maletaDetallesScheduledForDeletion->clear();
            }
            $this->maletaDetallesScheduledForDeletion[]= clone $maletaDetalle;
            $maletaDetalle->setInventario(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Inventario is new, it will return
     * an empty collection; or if this Inventario has previously
     * been saved, it will retrieve related MaletaDetalles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Inventario.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MaletaDetalle[] List of MaletaDetalle objects
     */
    public function getMaletaDetallesJoinMaleta($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MaletaDetalleQuery::create(null, $criteria);
        $query->joinWith('Maleta', $join_behavior);

        return $this->getMaletaDetalles($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->codigo = null;
        $this->color_id = null;
        $this->cantidad = null;
        $this->costo = null;
        $this->venta = null;
        $this->descripcion = null;
        $this->imagen = null;
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
            if ($this->collMaletaDetalles) {
                foreach ($this->collMaletaDetalles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aColor instanceof Persistent) {
              $this->aColor->clearAllReferences($deep);
            }
            if ($this->aSede instanceof Persistent) {
              $this->aSede->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMaletaDetalles instanceof PropelCollection) {
            $this->collMaletaDetalles->clearIterator();
        }
        $this->collMaletaDetalles = null;
        $this->aColor = null;
        $this->aSede = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(InventarioPeer::DEFAULT_STRING_FORMAT);
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
     * @return     Inventario The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = InventarioPeer::UPDATED_AT;

        return $this;
    }

}
