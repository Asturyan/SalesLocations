<?php
/*************************************************************************************/
/*                                                                                   */
/*      HubChannel	                                                             */
/*                                                                                   */
/*      Copyright (c) HubChannel                                                     */
/*      email : mlemarchand@hubchannel.fr                                            */
/*      web : http://www.hubchannel.fr                                               */
/*                                                                                   */
/*      This program is free software; you can redistribute it and/or modify         */
/*      it under the terms of the GNU General Public License as published by         */
/*      the Free Software Foundation; either version 3 of the License                */
/*                                                                                   */
/*      This program is distributed in the hope that it will be useful,              */
/*      but WITHOUT ANY WARRANTY; without even the implied warranty of               */
/*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                */
/*      GNU General Public License for more details.                                 */
/*                                                                                   */
/*      You should have received a copy of the GNU General Public License            */
/*	    along with this program. If not, see <http://www.gnu.org/licenses/>.     */
/*                                                                                   */
/*************************************************************************************/

namespace SalesLocations\Action;

use SalesLocations\Model\SalesLocationsQuery;
use SalesLocations\Model\SalesLocations as SalesLocationsModel;

use SalesLocations\Event\SalesLocationsEvent;
use SalesLocations\Event\SalesLocationsCreateOrUpdateEvent;
use SalesLocations\Event\SalesLocationsToggleVisibilityEvent;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Thelia\Action\BaseAction;

/**
 *
 * SalesLocations actions.
 *
 * @package SalesLocations\Action
 * @author Marc LEAMRCHAND <mlemarchand@hubchannel.fr>
 *
 */

class SalesLocations extends BaseAction implements EventSubscriberInterface
{
    /**
     * Create a new sale location entry
     *
     * @param \SalesLocations\Event\SalesLocationsCreateOrUpdateEvent $event
     */
    public function create(SalesLocationsCreateOrUpdateEvent $event)
    {
        $saleLocation = new SalesLocationsModel();

        $saleLocation
            ->setDispatcher($event->getDispatcher())

            ->setCompany($event->getCompany())
            ->setFirstname($event->getFirstname())
            ->setLastname($event->getLastname())
            ->setAddress1($event->getAddress1())
            ->setAddress2($event->getAddress2())
            ->setAddress3($event->getAddress3())
            ->setZipcode($event->getZipcode())
            ->setCity($event->getCity())
            ->setCountryId($event->getCountry())
            ->setPhone($event->getPhone())
            ->setCellphone($event->getCellphone())
            ->setVisible($event->getVisible())

            ->save()
        ;

        $event->setSaleLocation($saleLocation);
    }

    /**
     * Change a sale location
     *
     * @param \SalesLocations\Event\SalesLocationsCreateOrUpdateEvent $event
     */
    public function update(SalesLocationsCreateOrUpdateEvent $event)
    {
        if (null !== $saleLocation = SalesLocationsQuery::create()->findPk($event->getSaleLocationId())) {

            $saleLocation
                ->setDispatcher($event->getDispatcher())

                ->setCompany($event->getCompany())
                ->setFirstname($event->getFirstname())
                ->setLastname($event->getLastname())
                ->setLat($event->getLat())
                ->setLng($event->getLng())
                ->setAddress1($event->getAddress1())
                ->setAddress2($event->getAddress2())
                ->setAddress3($event->getAddress3())
                ->setZipcode($event->getZipcode())
                ->setCity($event->getCity())
                ->setCountryId($event->getCountry())
                ->setPhone($event->getPhone())
                ->setCellphone($event->getCellphone())
                ->setVisible($event->getVisible())

                ->save();

            $event->setSaleLocation($saleLocation);
        }
    }

    /**
     * Delete a sale location entry
     *
     * @param \SalesLocations\Event\SalesLocationsDeleteEvent $event
     */
    public function delete(SalesLocationsDeleteEvent $event)
    {
        if (null !== $saleLocation = SalesLocationsQuery::create()->findPk($event->getSaleLocationId())) {

            $saleLocation
                ->setDispatcher($event->getDispatcher())
                ->delete()
            ;

            $event->setSaleLocation($saleLocation);
        }
    }

    /**
     * Toggle gallery visibility. No form used here
     *
     * @param \SalesLocations\Event\SalesLocationsToggleVisibilityEvent $event
     */
    public function toggleVisibility(SalesLocationsToggleVisibilityEvent $event)
    {
        $saleLocation = $event->getSaleLocation();

        $saleLocation
            ->setDispatcher($event->getDispatcher())
            ->setVisible($saleLocation->getVisible() ? false : true)
            ->save()
            ;

        $event->setSaleLocation($saleLocation);
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            SalesLocationsEvent::SALESLOCATIONS_CREATE            => array("create", 128),
            SalesLocationsEvent::SALESLOCATIONS_UPDATE            => array("update", 128),
            SalesLocationsEvent::SALESLOCATIONS_DELETE            => array("delete", 128),
            SalesLocationsEvent::SALESLOCATIONS_TOGGLE_VISIBILITY => array("toggleVisibility", 128)
        );
    }
}
