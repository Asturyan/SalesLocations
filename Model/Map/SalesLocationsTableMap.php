<?php

namespace SalesLocations\Model\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use SalesLocations\Model\SalesLocations;
use SalesLocations\Model\SalesLocationsQuery;

/**
 * This class defines the structure of the 'sales_locations' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SalesLocationsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'SalesLocations.Model.Map.SalesLocationsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'sales_locations';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\SalesLocations\\Model\\SalesLocations';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'SalesLocations.Model.SalesLocations';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 17;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 17;

    /**
     * the column name for the ID field
     */
    const ID = 'sales_locations.ID';

    /**
     * the column name for the COMPANY field
     */
    const COMPANY = 'sales_locations.COMPANY';

    /**
     * the column name for the FIRSTNAME field
     */
    const FIRSTNAME = 'sales_locations.FIRSTNAME';

    /**
     * the column name for the LASTNAME field
     */
    const LASTNAME = 'sales_locations.LASTNAME';

    /**
     * the column name for the LAT field
     */
    const LAT = 'sales_locations.LAT';

    /**
     * the column name for the LNG field
     */
    const LNG = 'sales_locations.LNG';

    /**
     * the column name for the ADDRESS1 field
     */
    const ADDRESS1 = 'sales_locations.ADDRESS1';

    /**
     * the column name for the ADDRESS2 field
     */
    const ADDRESS2 = 'sales_locations.ADDRESS2';

    /**
     * the column name for the ADDRESS3 field
     */
    const ADDRESS3 = 'sales_locations.ADDRESS3';

    /**
     * the column name for the ZIPCODE field
     */
    const ZIPCODE = 'sales_locations.ZIPCODE';

    /**
     * the column name for the CITY field
     */
    const CITY = 'sales_locations.CITY';

    /**
     * the column name for the COUNTRY_ID field
     */
    const COUNTRY_ID = 'sales_locations.COUNTRY_ID';

    /**
     * the column name for the PHONE field
     */
    const PHONE = 'sales_locations.PHONE';

    /**
     * the column name for the CELLPHONE field
     */
    const CELLPHONE = 'sales_locations.CELLPHONE';

    /**
     * the column name for the VISIBLE field
     */
    const VISIBLE = 'sales_locations.VISIBLE';

    /**
     * the column name for the CREATED_AT field
     */
    const CREATED_AT = 'sales_locations.CREATED_AT';

    /**
     * the column name for the UPDATED_AT field
     */
    const UPDATED_AT = 'sales_locations.UPDATED_AT';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Company', 'Firstname', 'Lastname', 'Lat', 'Lng', 'Address1', 'Address2', 'Address3', 'Zipcode', 'City', 'CountryId', 'Phone', 'Cellphone', 'Visible', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'company', 'firstname', 'lastname', 'lat', 'lng', 'address1', 'address2', 'address3', 'zipcode', 'city', 'countryId', 'phone', 'cellphone', 'visible', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SalesLocationsTableMap::ID, SalesLocationsTableMap::COMPANY, SalesLocationsTableMap::FIRSTNAME, SalesLocationsTableMap::LASTNAME, SalesLocationsTableMap::LAT, SalesLocationsTableMap::LNG, SalesLocationsTableMap::ADDRESS1, SalesLocationsTableMap::ADDRESS2, SalesLocationsTableMap::ADDRESS3, SalesLocationsTableMap::ZIPCODE, SalesLocationsTableMap::CITY, SalesLocationsTableMap::COUNTRY_ID, SalesLocationsTableMap::PHONE, SalesLocationsTableMap::CELLPHONE, SalesLocationsTableMap::VISIBLE, SalesLocationsTableMap::CREATED_AT, SalesLocationsTableMap::UPDATED_AT, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'COMPANY', 'FIRSTNAME', 'LASTNAME', 'LAT', 'LNG', 'ADDRESS1', 'ADDRESS2', 'ADDRESS3', 'ZIPCODE', 'CITY', 'COUNTRY_ID', 'PHONE', 'CELLPHONE', 'VISIBLE', 'CREATED_AT', 'UPDATED_AT', ),
        self::TYPE_FIELDNAME     => array('id', 'company', 'firstname', 'lastname', 'lat', 'lng', 'address1', 'address2', 'address3', 'zipcode', 'city', 'country_id', 'phone', 'cellphone', 'visible', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Company' => 1, 'Firstname' => 2, 'Lastname' => 3, 'Lat' => 4, 'Lng' => 5, 'Address1' => 6, 'Address2' => 7, 'Address3' => 8, 'Zipcode' => 9, 'City' => 10, 'CountryId' => 11, 'Phone' => 12, 'Cellphone' => 13, 'Visible' => 14, 'CreatedAt' => 15, 'UpdatedAt' => 16, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'company' => 1, 'firstname' => 2, 'lastname' => 3, 'lat' => 4, 'lng' => 5, 'address1' => 6, 'address2' => 7, 'address3' => 8, 'zipcode' => 9, 'city' => 10, 'countryId' => 11, 'phone' => 12, 'cellphone' => 13, 'visible' => 14, 'createdAt' => 15, 'updatedAt' => 16, ),
        self::TYPE_COLNAME       => array(SalesLocationsTableMap::ID => 0, SalesLocationsTableMap::COMPANY => 1, SalesLocationsTableMap::FIRSTNAME => 2, SalesLocationsTableMap::LASTNAME => 3, SalesLocationsTableMap::LAT => 4, SalesLocationsTableMap::LNG => 5, SalesLocationsTableMap::ADDRESS1 => 6, SalesLocationsTableMap::ADDRESS2 => 7, SalesLocationsTableMap::ADDRESS3 => 8, SalesLocationsTableMap::ZIPCODE => 9, SalesLocationsTableMap::CITY => 10, SalesLocationsTableMap::COUNTRY_ID => 11, SalesLocationsTableMap::PHONE => 12, SalesLocationsTableMap::CELLPHONE => 13, SalesLocationsTableMap::VISIBLE => 14, SalesLocationsTableMap::CREATED_AT => 15, SalesLocationsTableMap::UPDATED_AT => 16, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'COMPANY' => 1, 'FIRSTNAME' => 2, 'LASTNAME' => 3, 'LAT' => 4, 'LNG' => 5, 'ADDRESS1' => 6, 'ADDRESS2' => 7, 'ADDRESS3' => 8, 'ZIPCODE' => 9, 'CITY' => 10, 'COUNTRY_ID' => 11, 'PHONE' => 12, 'CELLPHONE' => 13, 'VISIBLE' => 14, 'CREATED_AT' => 15, 'UPDATED_AT' => 16, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'company' => 1, 'firstname' => 2, 'lastname' => 3, 'lat' => 4, 'lng' => 5, 'address1' => 6, 'address2' => 7, 'address3' => 8, 'zipcode' => 9, 'city' => 10, 'country_id' => 11, 'phone' => 12, 'cellphone' => 13, 'visible' => 14, 'created_at' => 15, 'updated_at' => 16, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('sales_locations');
        $this->setPhpName('SalesLocations');
        $this->setClassName('\\SalesLocations\\Model\\SalesLocations');
        $this->setPackage('SalesLocations.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('COMPANY', 'Company', 'VARCHAR', false, 255, null);
        $this->addColumn('FIRSTNAME', 'Firstname', 'VARCHAR', true, 255, null);
        $this->addColumn('LASTNAME', 'Lastname', 'VARCHAR', true, 255, null);
        $this->addColumn('LAT', 'Lat', 'VARCHAR', false, 255, null);
        $this->addColumn('LNG', 'Lng', 'VARCHAR', false, 255, null);
        $this->addColumn('ADDRESS1', 'Address1', 'VARCHAR', true, 255, null);
        $this->addColumn('ADDRESS2', 'Address2', 'VARCHAR', true, 255, null);
        $this->addColumn('ADDRESS3', 'Address3', 'VARCHAR', true, 255, null);
        $this->addColumn('ZIPCODE', 'Zipcode', 'VARCHAR', true, 10, null);
        $this->addColumn('CITY', 'City', 'VARCHAR', true, 255, null);
        $this->addForeignKey('COUNTRY_ID', 'CountryId', 'INTEGER', 'country', 'ID', true, null, null);
        $this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 20, null);
        $this->addColumn('CELLPHONE', 'Cellphone', 'VARCHAR', false, 20, null);
        $this->addColumn('VISIBLE', 'Visible', 'TINYINT', true, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Country', '\\SalesLocations\\Model\\Thelia\\Model\\Country', RelationMap::MANY_TO_ONE, array('country_id' => 'id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                          TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                          TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
            return (int) $row[
                            $indexType == TableMap::TYPE_NUM
                            ? 0 + $offset
                            : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
                        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param  boolean $withPrefix Whether or not to return the path with the class name
     * @return string  path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? SalesLocationsTableMap::CLASS_DEFAULT : SalesLocationsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (SalesLocations object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SalesLocationsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SalesLocationsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SalesLocationsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SalesLocationsTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SalesLocationsTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param  DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException      Any exceptions caught during processing will be
     *                                          rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = SalesLocationsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SalesLocationsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SalesLocationsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param  Criteria        $criteria object containing the columns to add.
     * @param  string          $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                                  rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SalesLocationsTableMap::ID);
            $criteria->addSelectColumn(SalesLocationsTableMap::COMPANY);
            $criteria->addSelectColumn(SalesLocationsTableMap::FIRSTNAME);
            $criteria->addSelectColumn(SalesLocationsTableMap::LASTNAME);
            $criteria->addSelectColumn(SalesLocationsTableMap::LAT);
            $criteria->addSelectColumn(SalesLocationsTableMap::LNG);
            $criteria->addSelectColumn(SalesLocationsTableMap::ADDRESS1);
            $criteria->addSelectColumn(SalesLocationsTableMap::ADDRESS2);
            $criteria->addSelectColumn(SalesLocationsTableMap::ADDRESS3);
            $criteria->addSelectColumn(SalesLocationsTableMap::ZIPCODE);
            $criteria->addSelectColumn(SalesLocationsTableMap::CITY);
            $criteria->addSelectColumn(SalesLocationsTableMap::COUNTRY_ID);
            $criteria->addSelectColumn(SalesLocationsTableMap::PHONE);
            $criteria->addSelectColumn(SalesLocationsTableMap::CELLPHONE);
            $criteria->addSelectColumn(SalesLocationsTableMap::VISIBLE);
            $criteria->addSelectColumn(SalesLocationsTableMap::CREATED_AT);
            $criteria->addSelectColumn(SalesLocationsTableMap::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.COMPANY');
            $criteria->addSelectColumn($alias . '.FIRSTNAME');
            $criteria->addSelectColumn($alias . '.LASTNAME');
            $criteria->addSelectColumn($alias . '.LAT');
            $criteria->addSelectColumn($alias . '.LNG');
            $criteria->addSelectColumn($alias . '.ADDRESS1');
            $criteria->addSelectColumn($alias . '.ADDRESS2');
            $criteria->addSelectColumn($alias . '.ADDRESS3');
            $criteria->addSelectColumn($alias . '.ZIPCODE');
            $criteria->addSelectColumn($alias . '.CITY');
            $criteria->addSelectColumn($alias . '.COUNTRY_ID');
            $criteria->addSelectColumn($alias . '.PHONE');
            $criteria->addSelectColumn($alias . '.CELLPHONE');
            $criteria->addSelectColumn($alias . '.VISIBLE');
            $criteria->addSelectColumn($alias . '.CREATED_AT');
            $criteria->addSelectColumn($alias . '.UPDATED_AT');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(SalesLocationsTableMap::DATABASE_NAME)->getTable(SalesLocationsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(SalesLocationsTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(SalesLocationsTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new SalesLocationsTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a SalesLocations or Criteria object OR a primary key value.
     *
     * @param  mixed               $values Criteria or SalesLocations object or primary key or array of primary keys
     *                                     which is used to create the DELETE statement
     * @param  ConnectionInterface $con    the connection to use
     * @return int                 The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                                    if supported by native driver or if emulated using Propel.
     * @throws PropelException     Any exceptions caught during processing will be
     *                                    rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SalesLocationsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \SalesLocations\Model\SalesLocations) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SalesLocationsTableMap::DATABASE_NAME);
            $criteria->add(SalesLocationsTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = SalesLocationsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { SalesLocationsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { SalesLocationsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the sales_locations table.
     *
     * @param  ConnectionInterface $con the connection to use
     * @return int                 The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SalesLocationsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SalesLocations or Criteria object.
     *
     * @param  mixed               $criteria Criteria or SalesLocations object containing data that is used to create the INSERT statement.
     * @param  ConnectionInterface $con      the ConnectionInterface connection to use
     * @return mixed               The new primary key.
     * @throws PropelException     Any exceptions caught during processing will be
     *                                      rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SalesLocationsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SalesLocations object
        }

        if ($criteria->containsKey(SalesLocationsTableMap::ID) && $criteria->keyContainsValue(SalesLocationsTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SalesLocationsTableMap::ID.')');
        }

        // Set the correct dbName
        $query = SalesLocationsQuery::create()->mergeWith($criteria);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = $query->doInsert($con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

} // SalesLocationsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SalesLocationsTableMap::buildTableMap();
