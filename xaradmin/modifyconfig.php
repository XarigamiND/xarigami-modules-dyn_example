<?php
/**
 * Modify config
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
 * This is a standard function to modify the configuration parameters of the
 * module
 */
function dyn_example_admin_modifyconfig()
{
    // Initialise the $data variable that will hold the data to be used in
    // the blocklayout template,
    $data = array();
    //get the common menu configuration - it
    // helps if all of the module pages have a standard menu at the top to
    // support easy navigation
    $data['menulinks'] = xarModAPIFunc('dyn_example','admin','getmenulinks');

    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing
    if (!xarSecurityCheck('AdminDynExample')) return;

    // Generate a one-time authorisation code for this operation
    $data['authid'] = xarSecGenAuthKey('dyn_example');

    // Specify some labels and values for display
    $data['boldlabel'] = xarML('Display item names in bold');
    $data['boldchecked'] = xarModGetVar('dyn_example','bold') ? 'checked' : '';
    $data['itemslabel'] = xarML('Items Per Page');
    $data['itemsvalue'] = xarModGetVar('dyn_example', 'itemsperpage');
    $data['updatebutton'] = xarML('Update Configuration');

    // Note : if you don't plan on providing encode/decode functions for
    // short URLs (see xaruserapi.php), you should remove these from your
    // admin-modifyconfig.xard template !
    $data['shorturlslabel'] = xarML('Enable short URLs');
    $data['shorturlschecked'] = xarModGetVar('dyn_example','SupportShortURLs') ?
                                'checked' : '';

    $hooks = xarModCallHooks('module', 'modifyconfig', 'dyn_example',
                            array('module' => 'dyn_example'));
    if (empty($hooks)) {
        $data['hooks'] = '';
    } elseif (is_array($hooks)) {
        $data['hooks'] = join('',$hooks);
    } else {
        $data['hooks'] = $hooks;
    }

    $data['submitlabel'] = xarML('Submit');
    // Return the template variables defined in this function
    return $data;
}

?>