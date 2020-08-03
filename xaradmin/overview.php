<?php
/**
 * Display module overview
 *
 * @package modules
 * @copyright (C) 2002-2007 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Dynamic Data module
 * @copyright (C) 2008,2009 2skies.com
 * @link http://xarigami.com
 * @author Xarigami Team 
 * @author mikespub <mikespub@xaraya.com>
 */
/**
 * Overview displays standard Overview page
 *
 * @returns array xarTplModule with $data containing template data
 * @return array containing the menulinks for the overview item on the main manu
 * @since 14 Oct 2005
 */
function dyn_example_admin_overview()
{
   /* Security Check */
    if (!xarSecurityCheck('AdminDynExample',0)) return;
    //initialize the data array to be returned to the template
    $data = array();
    //common admin menu
    $data['menulinks'] = xarModAPIFunc('dyn_example','admin','getmenulinks');

    /* if there is a separate overview function return data to it
     * else just call the main function that usually displays the overview
     */
    return xarTplModule('dyn_example', 'admin', 'main', $data,'main');
 
    // Else Return the template variables defined in this function
   // return $data;    
}

?>