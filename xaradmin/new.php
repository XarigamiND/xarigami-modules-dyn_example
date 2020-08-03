<?php
/**
 * Add a new item
 *
 * @package modules
 * @copyright (C) 2002-2007 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Dynamic Data module
 * @copyright (C) 2008-2011 2skies.com
 * @link http://xarigami.com
 * @author Xarigami Team
 */
/**
 * add new item
 */
function dyn_example_admin_new()
{
    $data = array();
    // Add the admin menu

    $data['menulinks'] = xarModAPIFunc('dyn_example','admin','getmenulinks');
    // See if the current user has the privilege to add an item. We cannot pass any extra arguments here
    if (!xarSecurityCheck('AddDynExample')) return xarResponseForbidden();

    // get the Dynamic Object defined for this module (and itemtype, if relevant)
    $data['object'] = xarModAPIFunc('dynamicdata','user','getobject',
                                     array('module' => 'dyn_example'));
    $data['authid'] = xarSecGenAuthKey('dyn_example');
    // Set the item as an array
    $item = array();

    // Call the hooks. We tell the hooked module here that we will create a new item
    // TODO: replace join()
    $item['module'] = 'dyn_example';
    $hooks = xarModCallHooks('item','new','',$item);
    if (empty($hooks)) {
        $data['hooks'] = '';
    } elseif (is_array($hooks)) {
        $data['hooks'] = join('',$hooks);
    } else {
        $data['hooks'] = $hooks;
    }

    // Return the template variables defined in this function
    return $data;
}

?>