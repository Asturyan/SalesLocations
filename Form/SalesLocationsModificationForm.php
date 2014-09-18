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

namespace SalesLocations\Form;

use Symfony\Component\Validator\Constraints\GreaterThan;

use Thelia\Core\Translation\Translator;

/**
 *
 * Form allowing to process a sale location
 *
 * @package SalesLocations
 * @author Marc LEMARCHAND <mlemarchand@hubchannel.fr>
 *
 */
class SalesLocationsModificationForm extends SalesLocationsCreationForm
{

    protected function buildForm()
    {
        parent::buildForm(true);

        $this->formBuilder
            ->add("id", "hidden", array(
                    "constraints" => array(
                        new GreaterThan(array('value' => 0))
                    )
                ))
            ->add("lat", "text", array(
                    "label" => Translator::getInstance()->trans("Latitude"),
                    "label_attr" => array(
                        "for" => "lat"
                    ),
                    "required" => false
                ))
            ->add("lng", "text", array(
                    "label" => Translator::getInstance()->trans("Longitude"),
                    "label_attr" => array(
                        "for" => "lng"
                    ),
                    "required" => false
                ))
        ;

    }

    public function getName()
    {
        return "admin_saleslocations_modification";
    }
}
