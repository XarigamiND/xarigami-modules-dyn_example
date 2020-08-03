<?php
/**
 * Example user settings
 *
 * @package modules
 * @copyright (C) 2002-2007 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Dynamic Example module
 * @copyright (C) 2009 2skies.com
 * @link http://xarigami.com
 * @author Xarigami Team 
 * @author mikespub <mikespub@xaraya.com>
 */
function dyn_example_user_settings()
{
    //initialize array
    $data = array();
    // Add the user menu to the data array
    $data['menulinks'] = xarModAPIFunc('dyn_example','user','getmenulinks');


    xarTplSetPageTitle(xarVarPrepForDisplay(xarML('My Settings')));

    $data['submitlabel'] = xarML('Submit');
    $data['uid'] = xarUserGetVar('uid');
    return $data;
}

?>