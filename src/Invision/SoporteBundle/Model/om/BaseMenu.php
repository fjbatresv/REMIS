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
use Invision\SoporteBundle\Model\Menu;
use Invision\SoporteBundle\Model\MenuPeer;
use Invision\SoporteBundle\Model\MenuQuery;
use Invision\SoporteBundle\Model\PerfilMenu;
use Invision\SoporteBundle\Model\PerfilMenuQuery;

abstract class BaseMenu extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Invision\\SoporteBundle\\Model\\MenuPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MenuPeer
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
     * The value for the ruta field.
     * @var        string
     */
    protected $ruta;

    /**
     * The value for the icono field.
     * @var        string
     */
    protected $icono;

    /**
     * The value for the superior field.
     * @var        int
     */
    protected $superior;

    /**
     * The value for the visible field.
     * @var        int
     */
    protected $visible;

    /**
     * @var        PropelObjectCollection|PerfilMenu[] Collection to store aggregation of PerfilMenu objects.
     */
    protected $collPerfilMenus;
    protected $collPerfilMenusPartial;

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
    protected $perfilMenusScheduledForDeletion = null;

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
     * Get the [ruta] column value.
     *
     * @return string
     */
    public function getRuta()
    {

        return $this->ruta;
    }

    /**
     * Get the [icono] column value.
     *
     * @return string
     */
    public function getIcono()
    {

        return $this->icono;
    }

    /**
     * Get the [superior] column value.
     *
     * @return int
     */
    public function getSuperior()
    {

        return $this->superior;
    }

    /**
     * Get the [visible] column value.
     *
     * @return int
     */
    public function getVisible()
    {

        return $this->visible;
    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = MenuPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [nombre] column.
     *
     * @param  string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nombre !== $v) {
            $this->nombre = $v;
            $this->modifiedColumns[] = MenuPeer::NOMBRE;
        }


        return $this;
    } // setNombre()

    /**
     * Set the value of [ruta] column.
     *
     * @param  string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setRuta($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ruta !== $v) {
            $this->ruta = $v;
            $this->modifiedColumns[] = MenuPeer::RUTA;
        }


        return $this;
    } // setRuta()

    /**
     * Set the value of [icono] column.
     *
     * @param  string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setIcono($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->icono !== $v) {
            $this->icono = $v;
            $this->modifiedColumns[] = MenuPeer::ICONO;
        }


        return $this;
    } // setIcono()

    /**
     * Set the value of [superior] column.
     *
     * @param  int $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setSuperior($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->superior !== $v) {
            $this->superior = $v;
            $this->modifiedColumns[] = MenuPeer::SUPERIOR;
        }


        return $this;
    } // setSuperior()

    /**
     * Set the value of [visible] column.
     *
     * @param  int $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setVisible($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->visible !== $v) {
            $this->visible = $v;
            $this->modifiedColumns[] = MenuPeer::VISIBLE;
        }


        return $this;
    } // setVisible()

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
            $this->ruta = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->icono = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->superior = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->visible = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 6; // 6 = MenuPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Menu object", $e);
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
            $con = Propel::getConnection(MenuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MenuPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPerfilMenus = null;

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
            $con = Propel::getConnection(MenuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MenuQuery::create()
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
            $con = Propel::getConnection(MenuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MenuPeer::addInstanceToPool($this);
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

            if ($this->perfilMenusScheduledForDeletion !== null) {
                if (!$this->perfilMenusScheduledForDeletion->isEmpty()) {
                    PerfilMenuQuery::create()
                        ->filterByPrimaryKeys($this->perfilMenusScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->perfilMenusScheduledForDeletion = null;
                }
            }

            if ($this->collPerfilMenus !== null) {
                foreach ($this->collPerfilMenus as $referrerFK) {
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

        $this->modifiedColumns[] = MenuPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . MenuPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(MenuPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(MenuPeer::NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = '`nombre`';
        }
        if ($this->isColumnModified(MenuPeer::RUTA)) {
            $modifiedColumns[':p' . $index++]  = '`ruta`';
        }
        if ($this->isColumnModified(MenuPeer::ICONO)) {
            $modifiedColumns[':p' . $index++]  = '`icono`';
        }
        if ($this->isColumnModified(MenuPeer::SUPERIOR)) {
            $modifiedColumns[':p' . $index++]  = '`superior`';
        }
        if ($this->isColumnModified(MenuPeer::VISIBLE)) {
            $modifiedColumns[':p' . $index++]  = '`visible`';
        }

        $sql = sprintf(
            'INSERT INTO `menu` (%s) VALUES (%s)',
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
                    case '`ruta`':
                        $stmt->bindValue($identifier, $this->ruta, PDO::PARAM_STR);
                        break;
                    case '`icono`':
                        $stmt->bindValue($identifier, $this->icono, PDO::PARAM_STR);
                        break;
                    case '`superior`':
                        $stmt->bindValue($identifier, $this->superior, PDO::PARAM_INT);
                        break;
                    case '`visible`':
                        $stmt->bindValue($identifier, $this->visible, PDO::PARAM_INT);
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


            if (($retval = MenuPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPerfilMenus !== null) {
                    foreach ($this->collPerfilMenus as $referrerFK) {
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
        $pos = MenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getRuta();
                break;
            case 3:
                return $this->getIcono();
                break;
            case 4:
                return $this->getSuperior();
                break;
            case 5:
                return $this->getVisible();
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
        if (isset($alreadyDumpedObjects['Menu'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Menu'][$this->getPrimaryKey()] = true;
        $keys = MenuPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNombre(),
            $keys[2] => $this->getRuta(),
            $keys[3] => $this->getIcono(),
            $keys[4] => $this->getSuperior(),
            $keys[5] => $this->getVisible(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collPerfilMenus) {
                $result['PerfilMenus'] = $this->collPerfilMenus->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = MenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setRuta($value);
                break;
            case 3:
                $this->setIcono($value);
                break;
            case 4:
                $this->setSuperior($value);
                break;
            case 5:
                $this->setVisible($value);
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
        $keys = MenuPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setRuta($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIcono($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSuperior($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setVisible($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MenuPeer::DATABASE_NAME);

        if ($this->isColumnModified(MenuPeer::ID)) $criteria->add(MenuPeer::ID, $this->id);
        if ($this->isColumnModified(MenuPeer::NOMBRE)) $criteria->add(MenuPeer::NOMBRE, $this->nombre);
        if ($this->isColumnModified(MenuPeer::RUTA)) $criteria->add(MenuPeer::RUTA, $this->ruta);
        if ($this->isColumnModified(MenuPeer::ICONO)) $criteria->add(MenuPeer::ICONO, $this->icono);
        if ($this->isColumnModified(MenuPeer::SUPERIOR)) $criteria->add(MenuPeer::SUPERIOR, $this->superior);
        if ($this->isColumnModified(MenuPeer::VISIBLE)) $criteria->add(MenuPeer::VISIBLE, $this->visible);

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
        $criteria = new Criteria(MenuPeer::DATABASE_NAME);
        $criteria->add(MenuPeer::ID, $this->id);

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
     * @param object $copyObj An object of Menu (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNombre($this->getNombre());
        $copyObj->setRuta($this->getRuta());
        $copyObj->setIcono($this->getIcono());
        $copyObj->setSuperior($this->getSuperior());
        $copyObj->setVisible($this->getVisible());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPerfilMenus() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPerfilMenu($relObj->copy($deepCopy));
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
     * @return Menu Clone of current object.
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
     * @return MenuPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MenuPeer();
        }

        return self::$peer;
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
        if ('PerfilMenu' == $relationName) {
            $this->initPerfilMenus();
        }
    }

    /**
     * Clears out the collPerfilMenus collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Menu The current object (for fluent API support)
     * @see        addPerfilMenus()
     */
    public function clearPerfilMenus()
    {
        $this->collPerfilMenus = null; // important to set this to null since that means it is uninitialized
        $this->collPerfilMenusPartial = null;

        return $this;
    }

    /**
     * reset is the collPerfilMenus collection loaded partially
     *
     * @return void
     */
    public function resetPartialPerfilMenus($v = true)
    {
        $this->collPerfilMenusPartial = $v;
    }

    /**
     * Initializes the collPerfilMenus collection.
     *
     * By default this just sets the collPerfilMenus collection to an empty array (like clearcollPerfilMenus());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPerfilMenus($overrideExisting = true)
    {
        if (null !== $this->collPerfilMenus && !$overrideExisting) {
            return;
        }
        $this->collPerfilMenus = new PropelObjectCollection();
        $this->collPerfilMenus->setModel('PerfilMenu');
    }

    /**
     * Gets an array of PerfilMenu objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Menu is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PerfilMenu[] List of PerfilMenu objects
     * @throws PropelException
     */
    public function getPerfilMenus($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPerfilMenusPartial && !$this->isNew();
        if (null === $this->collPerfilMenus || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPerfilMenus) {
                // return empty collection
                $this->initPerfilMenus();
            } else {
                $collPerfilMenus = PerfilMenuQuery::create(null, $criteria)
                    ->filterByMenu($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPerfilMenusPartial && count($collPerfilMenus)) {
                      $this->initPerfilMenus(false);

                      foreach ($collPerfilMenus as $obj) {
                        if (false == $this->collPerfilMenus->contains($obj)) {
                          $this->collPerfilMenus->append($obj);
                        }
                      }

                      $this->collPerfilMenusPartial = true;
                    }

                    $collPerfilMenus->getInternalIterator()->rewind();

                    return $collPerfilMenus;
                }

                if ($partial && $this->collPerfilMenus) {
                    foreach ($this->collPerfilMenus as $obj) {
                        if ($obj->isNew()) {
                            $collPerfilMenus[] = $obj;
                        }
                    }
                }

                $this->collPerfilMenus = $collPerfilMenus;
                $this->collPerfilMenusPartial = false;
            }
        }

        return $this->collPerfilMenus;
    }

    /**
     * Sets a collection of PerfilMenu objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $perfilMenus A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Menu The current object (for fluent API support)
     */
    public function setPerfilMenus(PropelCollection $perfilMenus, PropelPDO $con = null)
    {
        $perfilMenusToDelete = $this->getPerfilMenus(new Criteria(), $con)->diff($perfilMenus);


        $this->perfilMenusScheduledForDeletion = $perfilMenusToDelete;

        foreach ($perfilMenusToDelete as $perfilMenuRemoved) {
            $perfilMenuRemoved->setMenu(null);
        }

        $this->collPerfilMenus = null;
        foreach ($perfilMenus as $perfilMenu) {
            $this->addPerfilMenu($perfilMenu);
        }

        $this->collPerfilMenus = $perfilMenus;
        $this->collPerfilMenusPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PerfilMenu objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PerfilMenu objects.
     * @throws PropelException
     */
    public function countPerfilMenus(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPerfilMenusPartial && !$this->isNew();
        if (null === $this->collPerfilMenus || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPerfilMenus) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPerfilMenus());
            }
            $query = PerfilMenuQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMenu($this)
                ->count($con);
        }

        return count($this->collPerfilMenus);
    }

    /**
     * Method called to associate a PerfilMenu object to this object
     * through the PerfilMenu foreign key attribute.
     *
     * @param    PerfilMenu $l PerfilMenu
     * @return Menu The current object (for fluent API support)
     */
    public function addPerfilMenu(PerfilMenu $l)
    {
        if ($this->collPerfilMenus === null) {
            $this->initPerfilMenus();
            $this->collPerfilMenusPartial = true;
        }

        if (!in_array($l, $this->collPerfilMenus->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPerfilMenu($l);

            if ($this->perfilMenusScheduledForDeletion and $this->perfilMenusScheduledForDeletion->contains($l)) {
                $this->perfilMenusScheduledForDeletion->remove($this->perfilMenusScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PerfilMenu $perfilMenu The perfilMenu object to add.
     */
    protected function doAddPerfilMenu($perfilMenu)
    {
        $this->collPerfilMenus[]= $perfilMenu;
        $perfilMenu->setMenu($this);
    }

    /**
     * @param	PerfilMenu $perfilMenu The perfilMenu object to remove.
     * @return Menu The current object (for fluent API support)
     */
    public function removePerfilMenu($perfilMenu)
    {
        if ($this->getPerfilMenus()->contains($perfilMenu)) {
            $this->collPerfilMenus->remove($this->collPerfilMenus->search($perfilMenu));
            if (null === $this->perfilMenusScheduledForDeletion) {
                $this->perfilMenusScheduledForDeletion = clone $this->collPerfilMenus;
                $this->perfilMenusScheduledForDeletion->clear();
            }
            $this->perfilMenusScheduledForDeletion[]= clone $perfilMenu;
            $perfilMenu->setMenu(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Menu is new, it will return
     * an empty collection; or if this Menu has previously
     * been saved, it will retrieve related PerfilMenus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Menu.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PerfilMenu[] List of PerfilMenu objects
     */
    public function getPerfilMenusJoinPerfil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PerfilMenuQuery::create(null, $criteria);
        $query->joinWith('Perfil', $join_behavior);

        return $this->getPerfilMenus($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->nombre = null;
        $this->ruta = null;
        $this->icono = null;
        $this->superior = null;
        $this->visible = null;
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
            if ($this->collPerfilMenus) {
                foreach ($this->collPerfilMenus as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPerfilMenus instanceof PropelCollection) {
            $this->collPerfilMenus->clearIterator();
        }
        $this->collPerfilMenus = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MenuPeer::DEFAULT_STRING_FORMAT);
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
