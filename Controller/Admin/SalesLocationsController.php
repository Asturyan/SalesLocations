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

namespace SalesLocations\Controller\Admin;

use Symfony\Component\HttpFoundation\RedirectResponse;

use SalesLocations\Event\SalesLocationsEvent;
use SalesLocations\Event\SalesLocationsToggleVisibilityEvent;
use SalesLocations\Event\SalesLocationsDeleteEvent;
use SalesLocations\Event\SalesLocationsCreateOrUpdateEvent;
use SalesLocations\Model\SalesLocationsQuery;
use SalesLocations\Form\SalesLocationsCreationForm;
use SalesLocations\Form\SalesLocationsModificationForm;

use Thelia\Controller\Admin\AbstractCrudController;
use Thelia\Core\Security\AccessManager;

use Thelia\Tools\URL;

/**
 *
 * Control View and Action (Model) via Events
 * Control SalesLocations
 *
 * @package SalesLocations
 * @author  Marc LEMARCHAND <mlemarchand@hubchannel.fr>
 *
 */
class SalesLocationsController extends AbstractCrudController
{

    public function __construct()
    {
        parent::__construct(
            'saleslocations',
            null,
            null,

            'admin.saleslocations',

            SalesLocationsEvent::SALESLOCATIONS_CREATE,
            SalesLocationsEvent::SALESLOCATIONS_UPDATE,
            SalesLocationsEvent::SALESLOCATIONS_DELETE,
            SalesLocationsEvent::SALESLOCATIONS_TOGGLE_VISIBILITY,
            null
        );
    }

    protected function getCreationForm()
    {
        return new SalesLocationsCreationForm($this->getRequest());
    }

    protected function getUpdateForm()
    {
        return new SalesLocationsModificationForm($this->getRequest());
    }

    protected function getCreationEvent($formData)
    {
        $createEvent = new SalesLocationsCreateOrUpdateEvent();

        $createEvent
            ->setCompany($formData['company'])
            ->setFirstname($formData['firstname'])
            ->setLastname($formData['lastname'])
            ->setAddress1($formData['address1'])
            ->setAddress2($formData['address2'])
            ->setAddress3($formData['address3'])
            ->setZipcode($formData['zipcode'])
            ->setCity($formData['city'])
            ->setCountry($formData['country'])
            ->setVisible($formData['visible'])
        ;

        return $createEvent;
    }

    protected function getUpdateEvent($formData)
    {
        $changeEvent = new SalesLocationsCreateOrUpdateEvent($formData['id']);

        // Create and dispatch the change event
        $changeEvent
            ->setCompany($formData['company'])
            ->setFirstname($formData['firstname'])
            ->setLastname($formData['lastname'])
            ->setLat($formData['lat'])
            ->setLng($formData['lng'])
            ->setAddress1($formData['address1'])
            ->setAddress2($formData['address2'])
            ->setAddress3($formData['address3'])
            ->setZipcode($formData['zipcode'])
            ->setCity($formData['city'])
            ->setCountry($formData['country'])
            ->setVisible($formData['visible'])
        ;

        return $changeEvent;
    }

    protected function getDeleteEvent()
    {
        return new SalesLocationsDeleteEvent($this->getRequest()->get('salelocation_id', 0));
    }

    protected function eventContainsObject($event)
    {
        return $event->hasSaleLocation();
    }

    protected function hydrateObjectForm($object)
    {

        // The "General" tab form
        $data = array(
            'id'                => $object->getId(),
            'company'           => $object->getCompany(),
            'firstname'         => $object->getFirstname(),
            'lastname'          => $object->getLastname(),
            'lat'               => $object->getLat(),
            'lng'               => $object->getLng(),
            'address1'          => $object->getAddress1(),
            'address2'          => $object->getAddress2(),
            'address3'          => $object->getAddress3(),
            'zipcode'           => $object->getZipcode(),
            'city'              => $object->getCity(),
            'country'           => $object->getCountryId(),
            'phone'             => $object->getPhone(),
            'cellphone'         => $object->getCellphone(),
            'visible'      => $object->getVisible()
        );

        // Setup the object form
        return new SalesLocationsModificationForm($this->getRequest(), "form", $data);
    }

    protected function getObjectFromEvent($event)
    {
        return $event->hasSaleLocation() ? $event->getSaleLocation() : null;
    }

    protected function getExistingObject()
    {
        $saleslocations = SalesLocationsQuery::create()
            ->findOneById($this->getRequest()->get('salelocation_id', 0));

        return $saleslocations;
    }

    protected function getObjectLabel($object)
    {
        return $object->getCompany();
    }

    protected function getObjectId($object)
    {
        return $object->getId();
    }

    protected function getEditionArguments()
    {
        return array(
            'salelocation_id' => $this->getRequest()->get('salelocation_id', 0)
        );
    }

    protected function renderListTemplate($currentOrder)
    {
        return $this->render('saleslocations', array());
    }

    protected function redirectToListTemplate()
    {
       return RedirectResponse::create(URL::getInstance()->absoluteUrl('/admin/module/SalesLocations'));
    }

    protected function renderEditionTemplate()
    {
        return $this->render('saleslocations-edit', $this->getEditionArguments());
    }

    protected function redirectToEditionTemplate()
    {
        $args = $this->getEditionArguments();

        return RedirectResponse::create(URL::getInstance()->absoluteUrl('/admin/module/SalesLocations/update?salelocation_id='.$args['salelocation_id']));
    }

    /**
     * Online status toggle category
     */
    public function setToggleVisibilityAction()
    {
        // Check current user authorization
        if (null !== $response = $this->checkAuth($this->resourceCode, array(), AccessManager::UPDATE)) return $response;

        $event = new SalesLocationsToggleVisibilityEvent($this->getExistingObject());

        try {
            $this->dispatch(SalesLocationsEvent::SALESLOCATIONS_TOGGLE_VISIBILITY, $event);
        } catch (\Exception $ex) {
            // Any error
            return $this->errorPage($ex);
        }

        // Ajax response -> no action
        return $this->nullResponse();
    }

}
