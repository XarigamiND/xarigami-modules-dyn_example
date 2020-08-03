<?php
/**
 * Main administration
 *
 * @package modules
 * @copyright (C) 2002-2007 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Dynamic Data module
 * @copyright (C) 2008-2010 2skies.com
 * @link http://xarigami.com
 * @author Xarigami Team
 * @author mikespub <mikespub@xaraya.com>
 */
/**
 * the main administration function
 * @param none
 * @return array
 */
function dyn_example_admin_main()
{
    // Check to see the current user has edit access to the dyn_example module
    if (!xarSecurityCheck('EditDynExample')) return;
    //initialize the data array
    $data = array();

    // Add the admin menu
    $data['menulinks'] = xarModAPIFunc('dyn_example','admin','getmenulinks');

    /* if there is a separate overview function return data to it
     * else just call the main function that usually displays the overview
     */
   // return xarTplModule('dyn_example', 'admin', 'main', $data,'main');

    // Else Return the template variables defined in this function
    return $data;
}

?>