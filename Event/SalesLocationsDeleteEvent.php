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

/**
 * Class SalesLocationsDeleteEvent
 * @package SalesLocations\Event
 * @author Marc LEMARCHAND <mlemarchand@hubchannel.fr>
 */
class SalesLocationsDeleteEvent extends SalesLocationsEvent
{
    /**
     * @var int salelocation id
     */
    protected $salelocation_id;

    /**
     * @param int $salelocation_id
     */
    public function __construct($salelocation_id)
    {
        $this->salelocation_id = $salelocation_id;
    }

    /**
     * @param int $salelocation_id
     */
    public function setSaleLocationId($salelocation_id)
    {
        $this->salelocation_id = $gallery_id;
    }

    /**
     * @return int
     */
    public function getSaleLocationId()
    {
        return $this->salelocation_id;
    }

}
