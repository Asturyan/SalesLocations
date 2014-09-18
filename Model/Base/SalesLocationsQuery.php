<?php

namespace SalesLocations\Model\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use SalesLocations\Model\SalesLocations as ChildSalesLocations;
use SalesLocations\Model\SalesLocationsQuery as ChildSalesLocationsQuery;
use SalesLocations\Model\Map\SalesLocationsTableMap;
use Thelia\Model\Country;

/**
 * Base class that represents a query for the 'sales_locations' table.
 *
 *
 *
 * @method     ChildSalesLocationsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSalesLocationsQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method     ChildSalesLocationsQuery orderByFirstname($order = Criteria::ASC) Order by the firstname column
 * @method     ChildSalesLocationsQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method     ChildSalesLocationsQuery orderByLat($order = Criteria::ASC) Order by the lat column
 * @method     ChildSalesLocationsQuery orderByLng($order = Criteria::ASC) Order by the lng column
 * @method     ChildSalesLocationsQuery orderByAddress1($order = Criteria::ASC) Order by the address1 column
 * @method     ChildSalesLocationsQuery orderByAddress2($order = Criteria::ASC) Order by the address2 column
 * @method     ChildSalesLocationsQuery orderByAddress3($order = Criteria::ASC) Order by the address3 column
 * @method     ChildSalesLocationsQuery orderByZipcode($order = Criteria::ASC) Order by the zipcode column
 * @method     ChildSalesLocationsQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildSalesLocationsQuery orderByCountryId($order = Criteria::ASC) Order by the country_id column
 * @method     ChildSalesLocationsQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildSalesLocationsQuery orderByCellphone($order = Criteria::ASC) Order by the cellphone column
 * @method     ChildSalesLocationsQuery orderByVisible($order = Criteria::ASC) Order by the visible column
 * @method     ChildSalesLocationsQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSalesLocationsQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSalesLocationsQuery groupById() Group by the id column
 * @method     ChildSalesLocationsQuery groupByCompany() Group by the company column
 * @method     ChildSalesLocationsQuery groupByFirstname() Group by the firstname column
 * @method     ChildSalesLocationsQuery groupByLastname() Group by the lastname column
 * @method     ChildSalesLocationsQuery groupByLat() Group by the lat column
 * @method     ChildSalesLocationsQuery groupByLng() Group by the lng column
 * @method     ChildSalesLocationsQuery groupByAddress1() Group by the address1 column
 * @method     ChildSalesLocationsQuery groupByAddress2() Group by the address2 column
 * @method     ChildSalesLocationsQuery groupByAddress3() Group by the address3 column
 * @method     ChildSalesLocationsQuery groupByZipcode() Group by the zipcode column
 * @method     ChildSalesLocationsQuery groupByCity() Group by the city column
 * @method     ChildSalesLocationsQuery groupByCountryId() Group by the country_id column
 * @method     ChildSalesLocationsQuery groupByPhone() Group by the phone column
 * @method     ChildSalesLocationsQuery groupByCellphone() Group by the cellphone column
 * @method     ChildSalesLocationsQuery groupByVisible() Group by the visible column
 * @method     ChildSalesLocationsQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSalesLocationsQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSalesLocationsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSalesLocationsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSalesLocationsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSalesLocationsQuery leftJoinCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the Country relation
 * @method     ChildSalesLocationsQuery rightJoinCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Country relation
 * @method     ChildSalesLocationsQuery innerJoinCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the Country relation
 *
 * @method     ChildSalesLocations findOne(ConnectionInterface $con = null) Return the first ChildSalesLocations matching the query
 * @method     ChildSalesLocations findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSalesLocations matching the query, or a new ChildSalesLocations object populated from the query conditions when no match is found
 *
 * @method     ChildSalesLocations findOneById(int $id) Return the first ChildSalesLocations filtered by the id column
 * @method     ChildSalesLocations findOneByCompany(string $company) Return the first ChildSalesLocations filtered by the company column
 * @method     ChildSalesLocations findOneByFirstname(string $firstname) Return the first ChildSalesLocations filtered by the firstname column
 * @method     ChildSalesLocations findOneByLastname(string $lastname) Return the first ChildSalesLocations filtered by the lastname column
 * @method     ChildSalesLocations findOneByLat(string $lat) Return the first ChildSalesLocations filtered by the lat column
 * @method     ChildSalesLocations findOneByLng(string $lng) Return the first ChildSalesLocations filtered by the lng column
 * @method     ChildSalesLocations findOneByAddress1(string $address1) Return the first ChildSalesLocations filtered by the address1 column
 * @method     ChildSalesLocations findOneByAddress2(string $address2) Return the first ChildSalesLocations filtered by the address2 column
 * @method     ChildSalesLocations findOneByAddress3(string $address3) Return the first ChildSalesLocations filtered by the address3 column
 * @method     ChildSalesLocations findOneByZipcode(string $zipcode) Return the first ChildSalesLocations filtered by the zipcode column
 * @method     ChildSalesLocations findOneByCity(string $city) Return the first ChildSalesLocations filtered by the city column
 * @method     ChildSalesLocations findOneByCountryId(int $country_id) Return the first ChildSalesLocations filtered by the country_id column
 * @method     ChildSalesLocations findOneByPhone(string $phone) Return the first ChildSalesLocations filtered by the phone column
 * @method     ChildSalesLocations findOneByCellphone(string $cellphone) Return the first ChildSalesLocations filtered by the cellphone column
 * @method     ChildSalesLocations findOneByVisible(int $visible) Return the first ChildSalesLocations filtered by the visible column
 * @method     ChildSalesLocations findOneByCreatedAt(string $created_at) Return the first ChildSalesLocations filtered by the created_at column
 * @method     ChildSalesLocations findOneByUpdatedAt(string $updated_at) Return the first ChildSalesLocations filtered by the updated_at column
 *
 * @method     array findById(int $id) Return ChildSalesLocations objects filtered by the id column
 * @method     array findByCompany(string $company) Return ChildSalesLocations objects filtered by the company column
 * @method     array findByFirstname(string $firstname) Return ChildSalesLocations objects filtered by the firstname column
 * @method     array findByLastname(string $lastname) Return ChildSalesLocations objects filtered by the lastname column
 * @method     array findByLat(string $lat) Return ChildSalesLocations objects filtered by the lat column
 * @method     array findByLng(string $lng) Return ChildSalesLocations objects filtered by the lng column
 * @method     array findByAddress1(string $address1) Return ChildSalesLocations objects filtered by the address1 column
 * @method     array findByAddress2(string $address2) Return ChildSalesLocations objects filtered by the address2 column
 * @method     array findByAddress3(string $address3) Return ChildSalesLocations objects filtered by the address3 column
 * @method     array findByZipcode(string $zipcode) Return ChildSalesLocations objects filtered by the zipcode column
 * @method     array findByCity(string $city) Return ChildSalesLocations objects filtered by the city column
 * @method     array findByCountryId(int $country_id) Return ChildSalesLocations objects filtered by the country_id column
 * @method     array findByPhone(string $phone) Return ChildSalesLocations objects filtered by the phone column
 * @method     array findByCellphone(string $cellphone) Return ChildSalesLocations objects filtered by the cellphone column
 * @method     array findByVisible(int $visible) Return ChildSalesLocations objects filtered by the visible column
 * @method     array findByCreatedAt(string $created_at) Return ChildSalesLocations objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ChildSalesLocations objects filtered by the updated_at column
 *
 */
abstract class SalesLocationsQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \SalesLocations\Model\Base\SalesLocationsQuery object.
     *
     * @param string $dbName     The database name
     * @param string $modelName  The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\SalesLocations\\Model\\SalesLocations', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSalesLocationsQuery object.
     *
     * @param string   $modelAlias The alias of a model in the query
     * @param Criteria $criteria   Optional Criteria to build the query from
     *
     * @return ChildSalesLocationsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \SalesLocations\Model\SalesLocationsQuery) {
            return $criteria;
        }
        $query = new \SalesLocations\Model\SalesLocationsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
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
     * @param mixed               $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSalesLocations|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SalesLocationsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SalesLocationsTableMap::DATABASE_NAME);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed               $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildSalesLocations A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, COMPANY, FIRSTNAME, LASTNAME, LAT, LNG, ADDRESS1, ADDRESS2, ADDRESS3, ZIPCODE, CITY, COUNTRY_ID, PHONE, CELLPHONE, VISIBLE, CREATED_AT, UPDATED_AT FROM sales_locations WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildSalesLocations();
            $obj->hydrate($row);
            SalesLocationsTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed               $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildSalesLocations|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param array               $keys Primary keys to use for the query
     * @param ConnectionInterface $con  an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param mixed $key Primary key to use for the query
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        return $this->addUsingAlias(SalesLocationsTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array $keys The list of primary key to use for the query
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        return $this->addUsingAlias(SalesLocationsTableMap::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param mixed  $id         The value to use as filter.
     *                           Use scalar values for equality.
     *                           Use array values for in_array() equivalent.
     *                           Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SalesLocationsTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SalesLocationsTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the company column
     *
     * Example usage:
     * <code>
     * $query->filterByCompany('fooValue');   // WHERE company = 'fooValue'
     * $query->filterByCompany('%fooValue%'); // WHERE company LIKE '%fooValue%'
     * </code>
     *
     * @param string $company    The value to use as filter.
     *                           Accepts wildcards (* and % trigger a LIKE)
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByCompany($company = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($company)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $company)) {
                $company = str_replace('*', '%', $company);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::COMPANY, $company, $comparison);
    }

    /**
     * Filter the query on the firstname column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstname('fooValue');   // WHERE firstname = 'fooValue'
     * $query->filterByFirstname('%fooValue%'); // WHERE firstname LIKE '%fooValue%'
     * </code>
     *
     * @param string $firstname  The value to use as filter.
     *                           Accepts wildcards (* and % trigger a LIKE)
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstname)) {
                $firstname = str_replace('*', '%', $firstname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::FIRSTNAME, $firstname, $comparison);
    }

    /**
     * Filter the query on the lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE lastname = 'fooValue'
     * $query->filterByLastname('%fooValue%'); // WHERE lastname LIKE '%fooValue%'
     * </code>
     *
     * @param string $lastname   The value to use as filter.
     *                           Accepts wildcards (* and % trigger a LIKE)
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastname)) {
                $lastname = str_replace('*', '%', $lastname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the lat column
     *
     * Example usage:
     * <code>
     * $query->filterByLat('fooValue');   // WHERE lat = 'fooValue'
     * $query->filterByLat('%fooValue%'); // WHERE lat LIKE '%fooValue%'
     * </code>
     *
     * @param string $lat        The value to use as filter.
     *                           Accepts wildcards (* and % trigger a LIKE)
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByLat($lat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lat)) {
                $lat = str_replace('*', '%', $lat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::LAT, $lat, $comparison);
    }

    /**
     * Filter the query on the lng column
     *
     * Example usage:
     * <code>
     * $query->filterByLng('fooValue');   // WHERE lng = 'fooValue'
     * $query->filterByLng('%fooValue%'); // WHERE lng LIKE '%fooValue%'
     * </code>
     *
     * @param string $lng        The value to use as filter.
     *                           Accepts wildcards (* and % trigger a LIKE)
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByLng($lng = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lng)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lng)) {
                $lng = str_replace('*', '%', $lng);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::LNG, $lng, $comparison);
    }

    /**
     * Filter the query on the address1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress1('fooValue');   // WHERE address1 = 'fooValue'
     * $query->filterByAddress1('%fooValue%'); // WHERE address1 LIKE '%fooValue%'
     * </code>
     *
     * @param string $address1   The value to use as filter.
     *                           Accepts wildcards (* and % trigger a LIKE)
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByAddress1($address1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address1)) {
                $address1 = str_replace('*', '%', $address1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::ADDRESS1, $address1, $comparison);
    }

    /**
     * Filter the query on the address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress2('fooValue');   // WHERE address2 = 'fooValue'
     * $query->filterByAddress2('%fooValue%'); // WHERE address2 LIKE '%fooValue%'
     * </code>
     *
     * @param string $address2   The value to use as filter.
     *                           Accepts wildcards (* and % trigger a LIKE)
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByAddress2($address2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address2)) {
                $address2 = str_replace('*', '%', $address2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::ADDRESS2, $address2, $comparison);
    }

    /**
     * Filter the query on the address3 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress3('fooValue');   // WHERE address3 = 'fooValue'
     * $query->filterByAddress3('%fooValue%'); // WHERE address3 LIKE '%fooValue%'
     * </code>
     *
     * @param string $address3   The value to use as filter.
     *                           Accepts wildcards (* and % trigger a LIKE)
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByAddress3($address3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address3)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address3)) {
                $address3 = str_replace('*', '%', $address3);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::ADDRESS3, $address3, $comparison);
    }

    /**
     * Filter the query on the zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByZipcode('fooValue');   // WHERE zipcode = 'fooValue'
     * $query->filterByZipcode('%fooValue%'); // WHERE zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param string $zipcode    The value to use as filter.
     *                           Accepts wildcards (* and % trigger a LIKE)
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByZipcode($zipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zipcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $zipcode)) {
                $zipcode = str_replace('*', '%', $zipcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::ZIPCODE, $zipcode, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%'); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param string $city       The value to use as filter.
     *                           Accepts wildcards (* and % trigger a LIKE)
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $city)) {
                $city = str_replace('*', '%', $city);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::CITY, $city, $comparison);
    }

    /**
     * Filter the query on the country_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCountryId(1234); // WHERE country_id = 1234
     * $query->filterByCountryId(array(12, 34)); // WHERE country_id IN (12, 34)
     * $query->filterByCountryId(array('min' => 12)); // WHERE country_id > 12
     * </code>
     *
     * @see       filterByCountry()
     *
     * @param mixed  $countryId  The value to use as filter.
     *                           Use scalar values for equality.
     *                           Use array values for in_array() equivalent.
     *                           Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByCountryId($countryId = null, $comparison = null)
    {
        if (is_array($countryId)) {
            $useMinMax = false;
            if (isset($countryId['min'])) {
                $this->addUsingAlias(SalesLocationsTableMap::COUNTRY_ID, $countryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countryId['max'])) {
                $this->addUsingAlias(SalesLocationsTableMap::COUNTRY_ID, $countryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::COUNTRY_ID, $countryId, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param string $phone      The value to use as filter.
     *                           Accepts wildcards (* and % trigger a LIKE)
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the cellphone column
     *
     * Example usage:
     * <code>
     * $query->filterByCellphone('fooValue');   // WHERE cellphone = 'fooValue'
     * $query->filterByCellphone('%fooValue%'); // WHERE cellphone LIKE '%fooValue%'
     * </code>
     *
     * @param string $cellphone  The value to use as filter.
     *                           Accepts wildcards (* and % trigger a LIKE)
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByCellphone($cellphone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cellphone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cellphone)) {
                $cellphone = str_replace('*', '%', $cellphone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::CELLPHONE, $cellphone, $comparison);
    }

    /**
     * Filter the query on the visible column
     *
     * Example usage:
     * <code>
     * $query->filterByVisible(1234); // WHERE visible = 1234
     * $query->filterByVisible(array(12, 34)); // WHERE visible IN (12, 34)
     * $query->filterByVisible(array('min' => 12)); // WHERE visible > 12
     * </code>
     *
     * @param mixed  $visible    The value to use as filter.
     *                           Use scalar values for equality.
     *                           Use array values for in_array() equivalent.
     *                           Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByVisible($visible = null, $comparison = null)
    {
        if (is_array($visible)) {
            $useMinMax = false;
            if (isset($visible['min'])) {
                $this->addUsingAlias(SalesLocationsTableMap::VISIBLE, $visible['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($visible['max'])) {
                $this->addUsingAlias(SalesLocationsTableMap::VISIBLE, $visible['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::VISIBLE, $visible, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param mixed  $createdAt  The value to use as filter.
     *                           Values can be integers (unix timestamps), DateTime objects, or strings.
     *                           Empty strings are treated as NULL.
     *                           Use scalar values for equality.
     *                           Use array values for in_array() equivalent.
     *                           Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SalesLocationsTableMap::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SalesLocationsTableMap::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param mixed  $updatedAt  The value to use as filter.
     *                           Values can be integers (unix timestamps), DateTime objects, or strings.
     *                           Empty strings are treated as NULL.
     *                           Use scalar values for equality.
     *                           Use array values for in_array() equivalent.
     *                           Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SalesLocationsTableMap::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SalesLocationsTableMap::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesLocationsTableMap::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \SalesLocations\Model\Thelia\Model\Country object
     *
     * @param \SalesLocations\Model\Thelia\Model\Country|ObjectCollection $country    The related object(s) to use as filter
     * @param string                                                      $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function filterByCountry($country, $comparison = null)
    {
        if ($country instanceof \SalesLocations\Model\Thelia\Model\Country) {
            return $this
                ->addUsingAlias(SalesLocationsTableMap::COUNTRY_ID, $country->getId(), $comparison);
        } elseif ($country instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SalesLocationsTableMap::COUNTRY_ID, $country->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCountry() only accepts arguments of type \SalesLocations\Model\Thelia\Model\Country or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Country relation
     *
     * @param string $relationAlias optional alias for the relation
     * @param string $joinType      Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function joinCountry($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Country');

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
            $this->addJoinObject($join, 'Country');
        }

        return $this;
    }

    /**
     * Use the Country relation Country object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                              to be used as main alias in the secondary query
     * @param string $joinType      Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Thelia\Model\CountryQuery A secondary query class using the current class as primary query
     */
    public function useCountryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCountry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Country', '\Thelia\Model\CountryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param ChildSalesLocations $salesLocations Object to remove from the list of results
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function prune($salesLocations = null)
    {
        if ($salesLocations) {
            $this->addUsingAlias(SalesLocationsTableMap::ID, $salesLocations->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the sales_locations table.
     *
     * @param  ConnectionInterface $con the connection to use
     * @return int                 The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SalesLocationsTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SalesLocationsTableMap::clearInstancePool();
            SalesLocationsTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildSalesLocations or Criteria object OR a primary key value.
     *
     * @param  mixed               $values Criteria or ChildSalesLocations object or primary key or array of primary keys
     *                                     which is used to create the DELETE statement
     * @param  ConnectionInterface $con    the connection to use
     * @return int                 The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                                    if supported by native driver or if emulated using Propel.
     * @throws PropelException     Any exceptions caught during processing will be
     *                                    rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SalesLocationsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SalesLocationsTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

        SalesLocationsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SalesLocationsTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param int $nbDays Maximum age of the latest update in days
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SalesLocationsTableMap::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Filter by the latest created
     *
     * @param int $nbDays Maximum age of in days
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SalesLocationsTableMap::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SalesLocationsTableMap::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SalesLocationsTableMap::UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SalesLocationsTableMap::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return ChildSalesLocationsQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SalesLocationsTableMap::CREATED_AT);
    }

} // SalesLocationsQuery
