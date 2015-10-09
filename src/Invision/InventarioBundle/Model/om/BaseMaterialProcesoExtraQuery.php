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
use Invision\InventarioBundle\Model\Material;
use Invision\InventarioBundle\Model\MaterialProcesoExtra;
use Invision\InventarioBundle\Model\MaterialProcesoExtraPeer;
use Invision\InventarioBundle\Model\MaterialProcesoExtraQuery;
use Invision\InventarioBundle\Model\ProcesoExtra;

/**
 * @method MaterialProcesoExtraQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MaterialProcesoExtraQuery orderByMaterialId($order = Criteria::ASC) Order by the material_id column
 * @method MaterialProcesoExtraQuery orderByProcesoExtraId($order = Criteria::ASC) Order by the proceso_extra_id column
 *
 * @method MaterialProcesoExtraQuery groupById() Group by the id column
 * @method MaterialProcesoExtraQuery groupByMaterialId() Group by the material_id column
 * @method MaterialProcesoExtraQuery groupByProcesoExtraId() Group by the proceso_extra_id column
 *
 * @method MaterialProcesoExtraQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MaterialProcesoExtraQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MaterialProcesoExtraQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MaterialProcesoExtraQuery leftJoinMaterial($relationAlias = null) Adds a LEFT JOIN clause to the query using the Material relation
 * @method MaterialProcesoExtraQuery rightJoinMaterial($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Material relation
 * @method MaterialProcesoExtraQuery innerJoinMaterial($relationAlias = null) Adds a INNER JOIN clause to the query using the Material relation
 *
 * @method MaterialProcesoExtraQuery leftJoinProcesoExtra($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProcesoExtra relation
 * @method MaterialProcesoExtraQuery rightJoinProcesoExtra($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProcesoExtra relation
 * @method MaterialProcesoExtraQuery innerJoinProcesoExtra($relationAlias = null) Adds a INNER JOIN clause to the query using the ProcesoExtra relation
 *
 * @method MaterialProcesoExtra findOne(PropelPDO $con = null) Return the first MaterialProcesoExtra matching the query
 * @method MaterialProcesoExtra findOneOrCreate(PropelPDO $con = null) Return the first MaterialProcesoExtra matching the query, or a new MaterialProcesoExtra object populated from the query conditions when no match is found
 *
 * @method MaterialProcesoExtra findOneByMaterialId(int $material_id) Return the first MaterialProcesoExtra filtered by the material_id column
 * @method MaterialProcesoExtra findOneByProcesoExtraId(int $proceso_extra_id) Return the first MaterialProcesoExtra filtered by the proceso_extra_id column
 *
 * @method array findById(int $id) Return MaterialProcesoExtra objects filtered by the id column
 * @method array findByMaterialId(int $material_id) Return MaterialProcesoExtra objects filtered by the material_id column
 * @method array findByProcesoExtraId(int $proceso_extra_id) Return MaterialProcesoExtra objects filtered by the proceso_extra_id column
 */
abstract class BaseMaterialProcesoExtraQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMaterialProcesoExtraQuery object.
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
            $modelName = 'Invision\\InventarioBundle\\Model\\MaterialProcesoExtra';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MaterialProcesoExtraQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MaterialProcesoExtraQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MaterialProcesoExtraQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MaterialProcesoExtraQuery) {
            return $criteria;
        }
        $query = new MaterialProcesoExtraQuery(null, null, $modelAlias);

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
     * @return   MaterialProcesoExtra|MaterialProcesoExtra[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MaterialProcesoExtraPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MaterialProcesoExtraPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MaterialProcesoExtra A model object, or null if the key is not found
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
     * @return                 MaterialProcesoExtra A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `material_id`, `proceso_extra_id` FROM `material_proceso_extra` WHERE `id` = :p0';
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
            $obj = new MaterialProcesoExtra();
            $obj->hydrate($row);
            MaterialProcesoExtraPeer::addInstanceToPool($obj, (string) $key);
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
     * @return MaterialProcesoExtra|MaterialProcesoExtra[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|MaterialProcesoExtra[]|mixed the list of results, formatted by the current formatter
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
     * @return MaterialProcesoExtraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MaterialProcesoExtraPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MaterialProcesoExtraQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MaterialProcesoExtraPeer::ID, $keys, Criteria::IN);
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
     * @return MaterialProcesoExtraQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MaterialProcesoExtraPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MaterialProcesoExtraPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MaterialProcesoExtraPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the material_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMaterialId(1234); // WHERE material_id = 1234
     * $query->filterByMaterialId(array(12, 34)); // WHERE material_id IN (12, 34)
     * $query->filterByMaterialId(array('min' => 12)); // WHERE material_id >= 12
     * $query->filterByMaterialId(array('max' => 12)); // WHERE material_id <= 12
     * </code>
     *
     * @see       filterByMaterial()
     *
     * @param     mixed $materialId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MaterialProcesoExtraQuery The current query, for fluid interface
     */
    public function filterByMaterialId($materialId = null, $comparison = null)
    {
        if (is_array($materialId)) {
            $useMinMax = false;
            if (isset($materialId['min'])) {
                $this->addUsingAlias(MaterialProcesoExtraPeer::MATERIAL_ID, $materialId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($materialId['max'])) {
                $this->addUsingAlias(MaterialProcesoExtraPeer::MATERIAL_ID, $materialId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MaterialProcesoExtraPeer::MATERIAL_ID, $materialId, $comparison);
    }

    /**
     * Filter the query on the proceso_extra_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProcesoExtraId(1234); // WHERE proceso_extra_id = 1234
     * $query->filterByProcesoExtraId(array(12, 34)); // WHERE proceso_extra_id IN (12, 34)
     * $query->filterByProcesoExtraId(array('min' => 12)); // WHERE proceso_extra_id >= 12
     * $query->filterByProcesoExtraId(array('max' => 12)); // WHERE proceso_extra_id <= 12
     * </code>
     *
     * @see       filterByProcesoExtra()
     *
     * @param     mixed $procesoExtraId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MaterialProcesoExtraQuery The current query, for fluid interface
     */
    public function filterByProcesoExtraId($procesoExtraId = null, $comparison = null)
    {
        if (is_array($procesoExtraId)) {
            $useMinMax = false;
            if (isset($procesoExtraId['min'])) {
                $this->addUsingAlias(MaterialProcesoExtraPeer::PROCESO_EXTRA_ID, $procesoExtraId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($procesoExtraId['max'])) {
                $this->addUsingAlias(MaterialProcesoExtraPeer::PROCESO_EXTRA_ID, $procesoExtraId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MaterialProcesoExtraPeer::PROCESO_EXTRA_ID, $procesoExtraId, $comparison);
    }

    /**
     * Filter the query by a related Material object
     *
     * @param   Material|PropelObjectCollection $material The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MaterialProcesoExtraQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMaterial($material, $comparison = null)
    {
        if ($material instanceof Material) {
            return $this
                ->addUsingAlias(MaterialProcesoExtraPeer::MATERIAL_ID, $material->getId(), $comparison);
        } elseif ($material instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MaterialProcesoExtraPeer::MATERIAL_ID, $material->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMaterial() only accepts arguments of type Material or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Material relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MaterialProcesoExtraQuery The current query, for fluid interface
     */
    public function joinMaterial($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Material');

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
            $this->addJoinObject($join, 'Material');
        }

        return $this;
    }

    /**
     * Use the Material relation Material object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\InventarioBundle\Model\MaterialQuery A secondary query class using the current class as primary query
     */
    public function useMaterialQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMaterial($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Material', '\Invision\InventarioBundle\Model\MaterialQuery');
    }

    /**
     * Filter the query by a related ProcesoExtra object
     *
     * @param   ProcesoExtra|PropelObjectCollection $procesoExtra The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MaterialProcesoExtraQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProcesoExtra($procesoExtra, $comparison = null)
    {
        if ($procesoExtra instanceof ProcesoExtra) {
            return $this
                ->addUsingAlias(MaterialProcesoExtraPeer::PROCESO_EXTRA_ID, $procesoExtra->getId(), $comparison);
        } elseif ($procesoExtra instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MaterialProcesoExtraPeer::PROCESO_EXTRA_ID, $procesoExtra->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProcesoExtra() only accepts arguments of type ProcesoExtra or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProcesoExtra relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MaterialProcesoExtraQuery The current query, for fluid interface
     */
    public function joinProcesoExtra($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProcesoExtra');

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
            $this->addJoinObject($join, 'ProcesoExtra');
        }

        return $this;
    }

    /**
     * Use the ProcesoExtra relation ProcesoExtra object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Invision\InventarioBundle\Model\ProcesoExtraQuery A secondary query class using the current class as primary query
     */
    public function useProcesoExtraQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProcesoExtra($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProcesoExtra', '\Invision\InventarioBundle\Model\ProcesoExtraQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   MaterialProcesoExtra $materialProcesoExtra Object to remove from the list of results
     *
     * @return MaterialProcesoExtraQuery The current query, for fluid interface
     */
    public function prune($materialProcesoExtra = null)
    {
        if ($materialProcesoExtra) {
            $this->addUsingAlias(MaterialProcesoExtraPeer::ID, $materialProcesoExtra->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
