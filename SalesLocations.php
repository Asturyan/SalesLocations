<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace SalesLocations;

use Propel\Runtime\Connection\ConnectionInterface;

use Thelia\Module\BaseModule;
use Thelia\Module\BaseModuleInterface;
use Thelia\Install\Database;

class SalesLocations extends BaseModule implements BaseModuleInterface
{
    /*
     * You may now override BaseModuleInterface methods, such as:
     * install, destroy, preActivation, postActivation, preDeactivation, postDeactivation
     *
     * Have fun !
     */
    public function postActivation(ConnectionInterface $con = null)
    {
        $database = new Database($con->getWrappedConnection());

        $database->insertSql(null, array(__DIR__ . '/Config/thelia.sql'));

    }

    public function getCode()
    {
        return 'SalesLocations';
    }
}
