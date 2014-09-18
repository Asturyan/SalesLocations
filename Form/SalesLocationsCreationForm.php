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
use Symfony\Component\Validator\Constraints;

use Thelia\Core\Translation\Translator;
use Thelia\Form\AddressCreateForm;

/**
 *
 * Form allowing to process a sale locations
 *
 * @package SalesLocations
 * @author Marc LEMARCHAND <mlemarchand@hubchannel.fr>
 *
 */
class SalesLocationsCreationForm extends AddressCreateForm
{
    protected function buildForm()
    {
        parent::buildForm();

        $this->formBuilder
            // Remove From Address create form
            ->remove("label")
            ->remove("title")
            ->remove("is_default")
            ->remove("company")
            ->add("firstname", "text", array(
                    "label" => Translator::getInstance()->trans("First Name"),
                    "label_attr" => array(
                        "for" => "firstname"
                    ),
                    "required" => false
                ))
            ->add("lastname", "text", array(
                    "label" => Translator::getInstance()->trans("Last Name"),
                    "label_attr" => array(
                        "for" => "lastname"
                    ),
                    "required" => false
                ))
            ->add("company", "text", array(
                    "constraints" => array(
                        new Constraints\NotBlank()
                    ),
                    "label" => Translator::getInstance()->trans("Sale Location Name", [], 'saleslocations'),
                    "label_attr" => array(
                        "for" => "company"
                    )
                ))
            ->add("visible", "integer", array(
                "label" => Translator::getInstance()->trans("This sale location is online.", [], 'saleslocations'),
                "label_attr" => array("for" => "visible_create")
            ))
        ;
    }

    public function getName()
    {
        return "admin_saleslocations_creation";
    }
}
