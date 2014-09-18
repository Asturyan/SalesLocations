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

namespace SalesLocations\Event;

use SalesLocations\Model\SalesLocations;
use Thelia\Core\Event\ActionEvent;

/**
 *
 * This class contains all SalesLocations events identifiers used by SalesLocations Core
 *
 * @author Marc LEMARCHAND <mlemarchand@hubchannel.fr>
 */

class SalesLocationsEvent extends ActionEvent
{
    public $saleslocations = null;

    const SALESLOCATIONS_CREATE            = 'saleslocations.action.create';
    const SALESLOCATIONS_UPDATE            = 'saleslocations.action.update';
    const SALESLOCATIONS_DELETE            = 'saleslocations.action.delete';
    const SALESLOCATIONS_TOGGLE_VISIBILITY = 'saleslocations.action.toggleVisibility';

    public function __construct(SalesLocations $salelocation = null)
    {
        $this->salelocation = $salelocation;
    }

    /**
     * @param  \SalesLocations\Model\SalesLocations $saleslocations
     * @return $this
     */
    public function setSaleLocation(SalesLocations $salelocation)
    {
        $this->salelocation = $salelocation;

        return $this;
    }

    /**
     * @return \SalesLocations\Model\SalesLocations
     */
    public function getSaleLocation()
    {
        return $this->salelocation;
    }

    /**
     * check if saleslocations exists
     *
     * @return bool
     */
    public function hasSaleLocation()
    {
        return null !== $this->salelocation;
    }
}
