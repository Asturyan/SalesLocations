<?php
 namespace SalesLocations\Loop;

 use Propel\Runtime\ActiveQuery\Criteria;

 use Thelia\Core\Template\Element\BaseLoop;
 use Thelia\Core\Template\Element\LoopResult;
 use Thelia\Core\Template\Element\LoopResultRow;
 use Thelia\Core\Template\Element\PropelSearchLoopInterface;
 use Thelia\Core\Template\Loop\Argument\ArgumentCollection;
 use Thelia\Core\Template\Loop\Argument\Argument;
 use Thelia\Type\BooleanOrBothType;
 use SalesLocations\Model\SalesLocationsQuery;

 class AddressList extends BaseLoop implements PropelSearchLoopInterface
 {
    public $countable = true;
    public $timestampable = true;
    public $versionable = false;

    public function getArgDefinitions()
    {
        return new ArgumentCollection(
            Argument::createIntListTypeArgument('id'),
            Argument::createBooleanTypeArgument('with_prev_next_info', false),
            Argument::createBooleanOrBothTypeArgument('visible', 1),
            Argument::createIntListTypeArgument('exclude')
        );
    }

    public function buildModelCriteria()
    {
        $search = SalesLocationsQuery::create();

        $id = $this->getId();

        if (!is_null($id)) {
            $search->filterById($id, Criteria::IN);
        }

        $exclude = $this->getExclude();

        if (!is_null($exclude)) {
            $search->filterById($exclude, Criteria::NOT_IN);
        }

        $visible = $this->getVisible();

        if ($visible !== BooleanOrBothType::ANY) $search->filterByVisible($visible ? 1 : 0);
        return $search;
    }

    public function parseResults(LoopResult $loopResult)
    {
        foreach ($loopResult->getResultDataCollection() as $location) {

            $loopResultRow = new LoopResultRow($location);

            $loopResultRow
                ->set("ID", $location->getID())
                ->set("COMPANY", $location->getCompany())
                ->set("FIRSTNAME", $location->getFirstname())
                ->set("LASTNAME", $location->getLastname())
                ->set("LAT", $location->getLat())
                ->set("LNG", $location->getLng())
                ->set("ADRESSE1", $location->getAddress1())
                ->set("ADRESSE2", $location->getAddress2())
                ->set("ADRESSE3", $location->getAddress3())
                ->set("ZIPCODE", $location->getZipcode())
                ->set("CITY", $location->getCity())
                ->set("COUNTRY", $location->getCountryId())
                ->set("VISIBLE", $location->getVisible() ? "1" : "0");

            if ($this->getBackend_context() || $this->getWithPrevNextInfo()) {
                // Find previous and next sale location
                $previous = SalesLocationsQuery::create()
                    ->filterById($location->getId(), Criteria::LESS_THAN)
                    ->orderById(Criteria::DESC)
                    ->findOne()
                ;

                $next = SalesLocationsQuery::create()
                    ->filterById($location->getId(), Criteria::GREATER_THAN)
                    ->orderById(Criteria::ASC)
                    ->findOne()
                ;

                $loopResultRow
                    ->set("HAS_PREVIOUS"            , $previous != null ? 1 : 0)
                    ->set("HAS_NEXT"                , $next != null ? 1 : 0)

                    ->set("PREVIOUS"                , $previous != null ? $previous->getId() : -1)
                    ->set("NEXT"                    , $next != null ? $next->getId() : -1)
                ;
            }

            $loopResult->addRow($loopResultRow);
        }

        return $loopResult;
    }
 }
