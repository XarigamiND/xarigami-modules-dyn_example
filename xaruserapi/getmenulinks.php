<?php
/**
 * Utility function for menu items for main menu
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
 * utility function pass individual menu items to the main user menu
 *
 * This function helps the xaraya to build a menu. It checks for the privileges of the current user\
 * and will prevent the user from seeing links he can't enter.
 *
 * @author the Dyn_Example module development team
 * @returns array
 * @return array containing the menulinks for the main menu items.
 */
function dyn_example_userapi_getmenulinks()
{
    $menulinks = array();
    // Check for the privilege of the current user
    // We hide a possible error
    if (xarSecurityCheck('ViewDynExample',0)) {

        $menulinks[] = Array('url'   => xarModURL('dyn_example','user','view'),
                              // In order to display the tool tips and label in any language,
                              // we must encapsulate the calls in the xarML in the API.
                              'title' => xarML('View all dynamic example items'),
                              'label' => xarML('View Items'),
                              // Add an array of items, possibly subitems, under this function when 'active' in a menu 
                              'active' => array('view','display'),
                              //Add an array of labels corresponding to the active items - this is optional and they can be empty
                             'activelabels' => array('',xarML('Display'))
                                  );
        // this shows a link to the user settings
        if (xarUserIsLoggedIn() && xarSecurityCheck('SubmitDynamicDataItem',0)) {
            $menulinks[] = Array('url'   => xarModURL('dyn_example','user','settings'),
                                 // In order to display the tool tips and label in any language,
                                 // we must encapsulate the calls in the xarML in the API.
                                 'title' => xarML('Change your preferences for this module'),
                                 'label' => xarML('Settings'),
                                 // Add an array of items, possibly subitems, under this function when 'active' in a menu 
                                 'active' => array('settings')
                                  );
        }
    }
    // Return all the links to the menu
    return $menulinks;
}

?>
