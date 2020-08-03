<?php
/**
 * Get menu links
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
 * utility function pass individual menu items to the main menu
 *
 * This function will create the links that are shown in the admin menu
 * @author the Dyn_Example module development team
 * @return array The array contains the menulinks for the main menu items.
 */
function dyn_example_adminapi_getmenulinks()
{
    $menulinks = array();
    // Add a security check, so only admins can see this link
    // Hide the possible error
    if (xarSecurityCheck('EditDynExample',0)) {

        $menulinks[] = Array('url'   => xarModURL('dyn_example','admin','view'),
                              // In order to display the tool tips and label in any language,
                              // we must encapsulate the calls in the xarML in the API.
                              'title' => xarML('View all example items that have been added.'),
                              'label' => xarML('List Items'),
                              // Add an array of items, possibly subitems, under this function when 'active' in a menu 
                              'active' => array('view','delete','modify','display'),
                              //Add an array of labels corresponding to the active items - this is optional and they can be empty
                              'activelabels' => array('',xarML('Delete item'),xarML('Modify item'),xarML('Display item'))
                              );
    }

    if (xarSecurityCheck('AddDynExample',0)) {

        $menulinks[] = Array('url'   => xarModURL('dyn_example','admin','new'),
                              // In order to display the tool tips and label in any language,
                              // we must encapsulate the calls in the xarML in the API.
                              'title' => xarML('Add a new item to system.'),
                              'label' => xarML('Add Items'),
                              // Add an array of items, possibly subitems, under this function when 'active' in a menu 
                              'active' => array('new'),
                              //Add an array of labels corresponding to the active items - this is optional and they can be empty
                              'activelabels' => array('')
                              );
    }

    if (xarSecurityCheck('AdminDynExample',0)) {
        // Add a link to the module's configuration.
        // We place this link last in the list so have a similar menu for all modules
        $menulinks[] = Array('url'   => xarModURL('dyn_example','admin','modifyconfig'),
                              // In order to display the tool tips and label in any language,
                              // we must encapsulate the calls in the xarML in the API.
                              'title' => xarML('Modify the configuration for the module'),
                              'label' => xarML('Modify Config'),
                              // Add an array of items, possibly subitems, under this function when 'active' in a menu                               
                              'active' => array('modifyconfig')                              
                              );
    }

    return $menulinks;
}
?>
