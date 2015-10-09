<?php

namespace Invision\SoporteBundle\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Invision\InventarioBundle\Model\Inventario;
use Invision\InventarioBundle\Model\InventarioQuery;
use Invision\SoporteBundle\Model\Bitacora;
use Invision\SoporteBundle\Model\BitacoraQuery;
use Invision\SoporteBundle\Model\Sede;
use Invision\SoporteBundle\Model\SedePeer;
use Invision\SoporteBundle\Model\SedeQuery;
use Invision\SoporteBundle\Model\TipoSede;
use Invision\SoporteBundle\Model\TipoSedeQuery;
use Invision\SoporteBundle\Model\Usuario;
use Invision\SoporteBundle\Model\UsuarioQuery;

abstract class BaseSede extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Invision\\SoporteBundle\\Model\\SedePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SedePeer
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
     * The value for the direccion field.
     * @var        string
     */
    protected $direccion;

    /**
     * The value for the telefono field.
     * @var        string
     */
    protected $telefono;

    /**
     * The value for the tipo_sede_id field.
     * @var        int
     */
    protected $tipo_sede_id;

    /**
     * @var        TipoSede
     */
    protected $aTipoSede;

    /**
     * @var        PropelObjectCollection|Inventario[] Collection to store aggregation of Inventario objects.
     */
    protected $collInventarios;
    protected $collInventariosPartial;

    /**
     * @var        PropelObjectCollection|Usuario[] Collection to store aggregation of Usuario objects.
     */
    protected $collUsuarios;
    protected $collUsuariosPartial;

    /**
     * @var        PropelObjectCollection|Bitacora[] Collection to store aggregation of Bitacora objects.
     */
    protected $collBitacoras;
    protected $collBitacorasPartial;

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
    protected $inventariosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usuariosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bitacorasScheduledForDeletion = null;

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
     * Get the [direccion] column value.
     *
     * @return string
     */
    public function getDireccion()
    {

        return $this->direccion;
    }

    /**
     * Get the [telefono] column value.
     *
     * @return string
     */
    public function getTelefono()
    {

        return $this->telefono;
    }

    /**
     * Get the [tipo_sede_id] column value.
     *
     * @return int
     */
    public function getTipoSedeId()
    {

        return $this->tipo_sede_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return Sede The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = SedePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [nombre] column.
     *
     * @param  string $v new value
     * @return Sede The current object (for fluent API support)
     */
    public function setNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre !== $v) {
            $this->nombre = $v;
            $this->modifiedColumns[] = SedePeer::NOMBRE;
        }


        return $this;
    } // setNombre()

    /**
     * Set the value of [direccion] column.
     *
     * @param  string $v new value
     * @return Sede The current object (for fluent API support)
     */
    public function setDireccion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->direccion !== $v) {
            $this->direccion = $v;
            $this->modifiedColumns[] = SedePeer::DIRECCION;
        }


        return $this;
    } // setDireccion()

    /**
     * Set the value of [telefono] column.
     *
     * @param  string $v new value
     * @return Sede The current object (for fluent API support)
     */
    public function setTelefono($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->telefono !== $v) {
            $this->telefono = $v;
            $this->modifiedColumns[] = SedePeer::TELEFONO;
        }


        return $this;
    } // setTelefono()

    /**
     * Set the value of [tipo_sede_id] column.
     *
     * @param  int $v new value
     * @return Sede The current object (for fluent API support)
     */
    public function setTipoSedeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tipo_sede_id !== $v) {
            $this->tipo_sede_id = $v;
            $this->modifiedColumns[] = SedePeer::TIPO_SEDE_ID;
        }

        if ($this->aTipoSede !== null && $this->aTipoSede->getId() !== $v) {
            $this->aTipoSede = null;
        }


        return $this;
    } // setTipoSedeId()

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
            $this->direccion = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->telefono = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->tipo_sede_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 5; // 5 = SedePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Sede object", $e);
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

        if ($this->aTipoSede !== null && $this->tipo_sede_id !== $this->aTipoSede->getId()) {
            $this->aTipoSede = null;
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
            $con = Propel::getConnection(SedePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SedePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTipoSede = null;
            $this->collInventarios = null;

            $this->collUsuarios = null;

            $this->collBitacoras = null;

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
            $con = Propel::getConnection(SedePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SedeQuery::create()
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
            $con = Propel::getConnection(SedePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                SedePeer::addInstanceToPool($this);
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

            if ($this->aTipoSede !== null) {
                if ($this->aTipoSede->isModified() || $this->aTipoSede->isNew()) {
                    $affectedRows += $this->aTipoSede->save($con);
                }
                $this->setTipoSede($this->aTipoSede);
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

            if ($this->inventariosScheduledForDeletion !== null) {
                if (!$this->inventariosScheduledForDeletion->isEmpty()) {
                    InventarioQuery::create()
                        ->filterByPrimaryKeys($this->inventariosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->inventariosScheduledForDeletion = null;
                }
            }

            if ($this->collInventarios !== null) {
                foreach ($this->collInventarios as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->usuariosScheduledForDeletion !== null) {
                if (!$this->usuariosScheduledForDeletion->isEmpty()) {
                    UsuarioQuery::create()
                        ->filterByPrimaryKeys($this->usuariosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->usuariosScheduledForDeletion = null;
                }
            }

            if ($this->collUsuarios !== null) {
                foreach ($this->collUsuarios as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bitacorasScheduledForDeletion !== null) {
                if (!$this->bitacorasScheduledForDeletion->isEmpty()) {
                    BitacoraQuery::create()
                        ->filterByPrimaryKeys($this->bitacorasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bitacorasScheduledForDeletion = null;
                }
            }

            if ($this->collBitacoras !== null) {
                foreach ($this->collBitacoras as $referrerFK) {
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

        $this->modifiedColumns[] = SedePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SedePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SedePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(SedePeer::NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = '`nombre`';
        }
        if ($this->isColumnModified(SedePeer::DIRECCION)) {
            $modifiedColumns[':p' . $index++]  = '`direccion`';
        }
        if ($this->isColumnModified(SedePeer::TELEFONO)) {
            $modifiedColumns[':p' . $index++]  = '`telefono`';
        }
        if ($this->isColumnModified(SedePeer::TIPO_SEDE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`tipo_sede_id`';
        }

        $sql = sprintf(
            'INSERT INTO `sede` (%s) VALUES (%s)',
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
                    case '`direccion`':
                        $stmt->bindValue($identifier, $this->direccion, PDO::PARAM_STR);
                        break;
                    case '`telefono`':
                        $stmt->bindValue($identifier, $this->telefono, PDO::PARAM_STR);
                        break;
                    case '`tipo_sede_id`':
                        $stmt->bindValue($identifier, $this->tipo_sede_id, PDO::PARAM_INT);
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

            if ($this->aTipoSede !== null) {
                if (!$this->aTipoSede->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTipoSede->getValidationFailures());
                }
            }


            if (($retval = SedePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collInventarios !== null) {
                    foreach ($this->collInventarios as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUsuarios !== null) {
                    foreach ($this->collUsuarios as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBitacoras !== null) {
                    foreach ($this->collBitacoras as $referrerFK) {
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
        $pos = SedePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDireccion();
                break;
            case 3:
                return $this->getTelefono();
                break;
            case 4:
                return $this->getTipoSedeId();
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
        if (isset($alreadyDumpedObjects['Sede'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Sede'][$this->getPrimaryKey()] = true;
        $keys = SedePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNombre(),
            $keys[2] => $this->getDireccion(),
            $keys[3] => $this->getTelefono(),
            $keys[4] => $this->getTipoSedeId(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aTipoSede) {
                $result['TipoSede'] = $this->aTipoSede->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collInventarios) {
                $result['Inventarios'] = $this->collInventarios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUsuarios) {
                $result['Usuarios'] = $this->collUsuarios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBitacoras) {
                $result['Bitacoras'] = $this->collBitacoras->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SedePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDireccion($value);
                break;
            case 3:
                $this->setTelefono($value);
                break;
            case 4:
                $this->setTipoSedeId($value);
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
        $keys = SedePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDireccion($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTelefono($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTipoSedeId($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SedePeer::DATABASE_NAME);

        if ($this->isColumnModified(SedePeer::ID)) $criteria->add(SedePeer::ID, $this->id);
        if ($this->isColumnModified(SedePeer::NOMBRE)) $criteria->add(SedePeer::NOMBRE, $this->nombre);
        if ($this->isColumnModified(SedePeer::DIRECCION)) $criteria->add(SedePeer::DIRECCION, $this->direccion);
        if ($this->isColumnModified(SedePeer::TELEFONO)) $criteria->add(SedePeer::TELEFONO, $this->telefono);
        if ($this->isColumnModified(SedePeer::TIPO_SEDE_ID)) $criteria->add(SedePeer::TIPO_SEDE_ID, $this->tipo_sede_id);

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
        $criteria = new Criteria(SedePeer::DATABASE_NAME);
        $criteria->add(SedePeer::ID, $this->id);

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
     * @param object $copyObj An object of Sede (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombre($this->getNombre());
        $copyObj->setDireccion($this->getDireccion());
        $copyObj->setTelefono($this->getTelefono());
        $copyObj->setTipoSedeId($this->getTipoSedeId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getInventarios() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addInventario($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUsuarios() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsuario($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBitacoras() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBitacora($relObj->copy($deepCopy));
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
     * @return Sede Clone of current object.
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
     * @return SedePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SedePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a TipoSede object.
     *
     * @param                  TipoSede $v
     * @return Sede The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTipoSede(TipoSede $v = null)
    {
        if ($v === null) {
            $this->setTipoSedeId(NULL);
        } else {
            $this->setTipoSedeId($v->getId());
        }

        $this->aTipoSede = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the TipoSede object, it will not be re-added.
        if ($v !== null) {
            $v->addSede($this);
        }


        return $this;
    }


    /**
     * Get the associated TipoSede object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return TipoSede The associated TipoSede object.
     * @throws PropelException
     */
    public function getTipoSede(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTipoSede === null && ($this->tipo_sede_id !== null) && $doQuery) {
            $this->aTipoSede = TipoSedeQuery::create()->findPk($this->tipo_sede_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTipoSede->addSedes($this);
             */
        }

        return $this->aTipoSede;
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
        if ('Inventario' == $relationName) {
            $this->initInventarios();
        }
        if ('Usuario' == $relationName) {
            $this->initUsuarios();
        }
        if ('Bitacora' == $relationName) {
            $this->initBitacoras();
        }
    }

    /**
     * Clears out the collInventarios collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sede The current object (for fluent API support)
     * @see        addInventarios()
     */
    public function clearInventarios()
    {
        $this->collInventarios = null; // important to set this to null since that means it is uninitialized
        $this->collInventariosPartial = null;

        return $this;
    }

    /**
     * reset is the collInventarios collection loaded partially
     *
     * @return void
     */
    public function resetPartialInventarios($v = true)
    {
        $this->collInventariosPartial = $v;
    }

    /**
     * Initializes the collInventarios collection.
     *
     * By default this just sets the collInventarios collection to an empty array (like clearcollInventarios());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initInventarios($overrideExisting = true)
    {
        if (null !== $this->collInventarios && !$overrideExisting) {
            return;
        }
        $this->collInventarios = new PropelObjectCollection();
        $this->collInventarios->setModel('Inventario');
    }

    /**
     * Gets an array of Inventario objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sede is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Inventario[] List of Inventario objects
     * @throws PropelException
     */
    public function getInventarios($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collInventariosPartial && !$this->isNew();
        if (null === $this->collInventarios || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collInventarios) {
                // return empty collection
                $this->initInventarios();
            } else {
                $collInventarios = InventarioQuery::create(null, $criteria)
                    ->filterBySede($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collInventariosPartial && count($collInventarios)) {
                      $this->initInventarios(false);

                      foreach ($collInventarios as $obj) {
                        if (false == $this->collInventarios->contains($obj)) {
                          $this->collInventarios->append($obj);
                        }
                      }

                      $this->collInventariosPartial = true;
                    }

                    $collInventarios->getInternalIterator()->rewind();

                    return $collInventarios;
                }

                if ($partial && $this->collInventarios) {
                    foreach ($this->collInventarios as $obj) {
                        if ($obj->isNew()) {
                            $collInventarios[] = $obj;
                        }
                    }
                }

                $this->collInventarios = $collInventarios;
                $this->collInventariosPartial = false;
            }
        }

        return $this->collInventarios;
    }

    /**
     * Sets a collection of Inventario objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $inventarios A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sede The current object (for fluent API support)
     */
    public function setInventarios(PropelCollection $inventarios, PropelPDO $con = null)
    {
        $inventariosToDelete = $this->getInventarios(new Criteria(), $con)->diff($inventarios);


        $this->inventariosScheduledForDeletion = $inventariosToDelete;

        foreach ($inventariosToDelete as $inventarioRemoved) {
            $inventarioRemoved->setSede(null);
        }

        $this->collInventarios = null;
        foreach ($inventarios as $inventario) {
            $this->addInventario($inventario);
        }

        $this->collInventarios = $inventarios;
        $this->collInventariosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Inventario objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Inventario objects.
     * @throws PropelException
     */
    public function countInventarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collInventariosPartial && !$this->isNew();
        if (null === $this->collInventarios || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collInventarios) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getInventarios());
            }
            $query = InventarioQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySede($this)
                ->count($con);
        }

        return count($this->collInventarios);
    }

    /**
     * Method called to associate a Inventario object to this object
     * through the Inventario foreign key attribute.
     *
     * @param    Inventario $l Inventario
     * @return Sede The current object (for fluent API support)
     */
    public function addInventario(Inventario $l)
    {
        if ($this->collInventarios === null) {
            $this->initInventarios();
            $this->collInventariosPartial = true;
        }

        if (!in_array($l, $this->collInventarios->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddInventario($l);

            if ($this->inventariosScheduledForDeletion and $this->inventariosScheduledForDeletion->contains($l)) {
                $this->inventariosScheduledForDeletion->remove($this->inventariosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Inventario $inventario The inventario object to add.
     */
    protected function doAddInventario($inventario)
    {
        $this->collInventarios[]= $inventario;
        $inventario->setSede($this);
    }

    /**
     * @param	Inventario $inventario The inventario object to remove.
     * @return Sede The current object (for fluent API support)
     */
    public function removeInventario($inventario)
    {
        if ($this->getInventarios()->contains($inventario)) {
            $this->collInventarios->remove($this->collInventarios->search($inventario));
            if (null === $this->inventariosScheduledForDeletion) {
                $this->inventariosScheduledForDeletion = clone $this->collInventarios;
                $this->inventariosScheduledForDeletion->clear();
            }
            $this->inventariosScheduledForDeletion[]= clone $inventario;
            $inventario->setSede(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sede is new, it will return
     * an empty collection; or if this Sede has previously
     * been saved, it will retrieve related Inventarios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sede.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Inventario[] List of Inventario objects
     */
    public function getInventariosJoinColor($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = InventarioQuery::create(null, $criteria);
        $query->joinWith('Color', $join_behavior);

        return $this->getInventarios($query, $con);
    }

    /**
     * Clears out the collUsuarios collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sede The current object (for fluent API support)
     * @see        addUsuarios()
     */
    public function clearUsuarios()
    {
        $this->collUsuarios = null; // important to set this to null since that means it is uninitialized
        $this->collUsuariosPartial = null;

        return $this;
    }

    /**
     * reset is the collUsuarios collection loaded partially
     *
     * @return void
     */
    public function resetPartialUsuarios($v = true)
    {
        $this->collUsuariosPartial = $v;
    }

    /**
     * Initializes the collUsuarios collection.
     *
     * By default this just sets the collUsuarios collection to an empty array (like clearcollUsuarios());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsuarios($overrideExisting = true)
    {
        if (null !== $this->collUsuarios && !$overrideExisting) {
            return;
        }
        $this->collUsuarios = new PropelObjectCollection();
        $this->collUsuarios->setModel('Usuario');
    }

    /**
     * Gets an array of Usuario objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sede is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Usuario[] List of Usuario objects
     * @throws PropelException
     */
    public function getUsuarios($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUsuariosPartial && !$this->isNew();
        if (null === $this->collUsuarios || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUsuarios) {
                // return empty collection
                $this->initUsuarios();
            } else {
                $collUsuarios = UsuarioQuery::create(null, $criteria)
                    ->filterBySede($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUsuariosPartial && count($collUsuarios)) {
                      $this->initUsuarios(false);

                      foreach ($collUsuarios as $obj) {
                        if (false == $this->collUsuarios->contains($obj)) {
                          $this->collUsuarios->append($obj);
                        }
                      }

                      $this->collUsuariosPartial = true;
                    }

                    $collUsuarios->getInternalIterator()->rewind();

                    return $collUsuarios;
                }

                if ($partial && $this->collUsuarios) {
                    foreach ($this->collUsuarios as $obj) {
                        if ($obj->isNew()) {
                            $collUsuarios[] = $obj;
                        }
                    }
                }

                $this->collUsuarios = $collUsuarios;
                $this->collUsuariosPartial = false;
            }
        }

        return $this->collUsuarios;
    }

    /**
     * Sets a collection of Usuario objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $usuarios A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sede The current object (for fluent API support)
     */
    public function setUsuarios(PropelCollection $usuarios, PropelPDO $con = null)
    {
        $usuariosToDelete = $this->getUsuarios(new Criteria(), $con)->diff($usuarios);


        $this->usuariosScheduledForDeletion = $usuariosToDelete;

        foreach ($usuariosToDelete as $usuarioRemoved) {
            $usuarioRemoved->setSede(null);
        }

        $this->collUsuarios = null;
        foreach ($usuarios as $usuario) {
            $this->addUsuario($usuario);
        }

        $this->collUsuarios = $usuarios;
        $this->collUsuariosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Usuario objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Usuario objects.
     * @throws PropelException
     */
    public function countUsuarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUsuariosPartial && !$this->isNew();
        if (null === $this->collUsuarios || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsuarios) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUsuarios());
            }
            $query = UsuarioQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySede($this)
                ->count($con);
        }

        return count($this->collUsuarios);
    }

    /**
     * Method called to associate a Usuario object to this object
     * through the Usuario foreign key attribute.
     *
     * @param    Usuario $l Usuario
     * @return Sede The current object (for fluent API support)
     */
    public function addUsuario(Usuario $l)
    {
        if ($this->collUsuarios === null) {
            $this->initUsuarios();
            $this->collUsuariosPartial = true;
        }

        if (!in_array($l, $this->collUsuarios->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUsuario($l);

            if ($this->usuariosScheduledForDeletion and $this->usuariosScheduledForDeletion->contains($l)) {
                $this->usuariosScheduledForDeletion->remove($this->usuariosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Usuario $usuario The usuario object to add.
     */
    protected function doAddUsuario($usuario)
    {
        $this->collUsuarios[]= $usuario;
        $usuario->setSede($this);
    }

    /**
     * @param	Usuario $usuario The usuario object to remove.
     * @return Sede The current object (for fluent API support)
     */
    public function removeUsuario($usuario)
    {
        if ($this->getUsuarios()->contains($usuario)) {
            $this->collUsuarios->remove($this->collUsuarios->search($usuario));
            if (null === $this->usuariosScheduledForDeletion) {
                $this->usuariosScheduledForDeletion = clone $this->collUsuarios;
                $this->usuariosScheduledForDeletion->clear();
            }
            $this->usuariosScheduledForDeletion[]= clone $usuario;
            $usuario->setSede(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Sede is new, it will return
     * an empty collection; or if this Sede has previously
     * been saved, it will retrieve related Usuarios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Sede.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Usuario[] List of Usuario objects
     */
    public function getUsuariosJoinPerfil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsuarioQuery::create(null, $criteria);
        $query->joinWith('Perfil', $join_behavior);

        return $this->getUsuarios($query, $con);
    }

    /**
     * Clears out the collBitacoras collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sede The current object (for fluent API support)
     * @see        addBitacoras()
     */
    public function clearBitacoras()
    {
        $this->collBitacoras = null; // important to set this to null since that means it is uninitialized
        $this->collBitacorasPartial = null;

        return $this;
    }

    /**
     * reset is the collBitacoras collection loaded partially
     *
     * @return void
     */
    public function resetPartialBitacoras($v = true)
    {
        $this->collBitacorasPartial = $v;
    }

    /**
     * Initializes the collBitacoras collection.
     *
     * By default this just sets the collBitacoras collection to an empty array (like clearcollBitacoras());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBitacoras($overrideExisting = true)
    {
        if (null !== $this->collBitacoras && !$overrideExisting) {
            return;
        }
        $this->collBitacoras = new PropelObjectCollection();
        $this->collBitacoras->setModel('Bitacora');
    }

    /**
     * Gets an array of Bitacora objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sede is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Bitacora[] List of Bitacora objects
     * @throws PropelException
     */
    public function getBitacoras($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBitacorasPartial && !$this->isNew();
        if (null === $this->collBitacoras || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBitacoras) {
                // return empty collection
                $this->initBitacoras();
            } else {
                $collBitacoras = BitacoraQuery::create(null, $criteria)
                    ->filterBySede($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBitacorasPartial && count($collBitacoras)) {
                      $this->initBitacoras(false);

                      foreach ($collBitacoras as $obj) {
                        if (false == $this->collBitacoras->contains($obj)) {
                          $this->collBitacoras->append($obj);
                        }
                      }

                      $this->collBitacorasPartial = true;
                    }

                    $collBitacoras->getInternalIterator()->rewind();

                    return $collBitacoras;
                }

                if ($partial && $this->collBitacoras) {
                    foreach ($this->collBitacoras as $obj) {
                        if ($obj->isNew()) {
                            $collBitacoras[] = $obj;
                        }
                    }
                }

                $this->collBitacoras = $collBitacoras;
                $this->collBitacorasPartial = false;
            }
        }

        return $this->collBitacoras;
    }

    /**
     * Sets a collection of Bitacora objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bitacoras A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sede The current object (for fluent API support)
     */
    public function setBitacoras(PropelCollection $bitacoras, PropelPDO $con = null)
    {
        $bitacorasToDelete = $this->getBitacoras(new Criteria(), $con)->diff($bitacoras);


        $this->bitacorasScheduledForDeletion = $bitacorasToDelete;

        foreach ($bitacorasToDelete as $bitacoraRemoved) {
            $bitacoraRemoved->setSede(null);
        }

        $this->collBitacoras = null;
        foreach ($bitacoras as $bitacora) {
            $this->addBitacora($bitacora);
        }

        $this->collBitacoras = $bitacoras;
        $this->collBitacorasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Bitacora objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Bitacora objects.
     * @throws PropelException
     */
    public function countBitacoras(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBitacorasPartial && !$this->isNew();
        if (null === $this->collBitacoras || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBitacoras) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBitacoras());
            }
            $query = BitacoraQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySede($this)
                ->count($con);
        }

        return count($this->collBitacoras);
    }

    /**
     * Method called to associate a Bitacora object to this object
     * through the Bitacora foreign key attribute.
     *
     * @param    Bitacora $l Bitacora
     * @return Sede The current object (for fluent API support)
     */
    public function addBitacora(Bitacora $l)
    {
        if ($this->collBitacoras === null) {
            $this->initBitacoras();
            $this->collBitacorasPartial = true;
        }

        if (!in_array($l, $this->collBitacoras->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBitacora($l);

            if ($this->bitacorasScheduledForDeletion and $this->bitacorasScheduledForDeletion->contains($l)) {
                $this->bitacorasScheduledForDeletion->remove($this->bitacorasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Bitacora $bitacora The bitacora object to add.
     */
    protected function doAddBitacora($bitacora)
    {
        $this->collBitacoras[]= $bitacora;
        $bitacora->setSede($this);
    }

    /**
     * @param	Bitacora $bitacora The bitacora object to remove.
     * @return Sede The current object (for fluent API support)
     */
    public function removeBitacora($bitacora)
    {
        if ($this->getBitacoras()->contains($bitacora)) {
            $this->collBitacoras->remove($this->collBitacoras->search($bitacora));
            if (null === $this->bitacorasScheduledForDeletion) {
                $this->bitacorasScheduledForDeletion = clone $this->collBitacoras;
                $this->bitacorasScheduledForDeletion->clear();
            }
            $this->bitacorasScheduledForDeletion[]= clone $bitacora;
            $bitacora->setSede(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->nombre = null;
        $this->direccion = null;
        $this->telefono = null;
        $this->tipo_sede_id = null;
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
            if ($this->collInventarios) {
                foreach ($this->collInventarios as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsuarios) {
                foreach ($this->collUsuarios as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBitacoras) {
                foreach ($this->collBitacoras as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aTipoSede instanceof Persistent) {
              $this->aTipoSede->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collInventarios instanceof PropelCollection) {
            $this->collInventarios->clearIterator();
        }
        $this->collInventarios = null;
        if ($this->collUsuarios instanceof PropelCollection) {
            $this->collUsuarios->clearIterator();
        }
        $this->collUsuarios = null;
        if ($this->collBitacoras instanceof PropelCollection) {
            $this->collBitacoras->clearIterator();
        }
        $this->collBitacoras = null;
        $this->aTipoSede = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SedePeer::DEFAULT_STRING_FORMAT);
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

}
