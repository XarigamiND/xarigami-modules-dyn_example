<?php
/**
 * Delete an item
 *
 * @package modules
 * @copyright (C) 2002-2007 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Dynamic Data module
 * @copyright (C) 2008-2011 2skies.com
 * @link http://xarigami.com
 * @author Xarigami Team
 * @author mikespub <mikespub@xaraya.com>
 */
/**
 * delete an item
 * @param 'itemid' the id of the item to be deleted
 * @param 'confirm' confirm that this item can be deleted
 */
function dyn_example_admin_delete($args)
{
    // Get parameters from whatever input we need.  All arguments to this
    // function should be obtained from xarVarFetch(), getting them
    // from other places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of Xaraya
    if(!xarVarFetch('itemid',   'id', $itemid,   NULL, XARVAR_DONT_SET)) {return;}
    if(!xarVarFetch('objectid', 'id', $objectid, NULL, XARVAR_DONT_SET)) {return;}
    if(!xarVarFetch('confirm', 'str', $confirm,  NULL, XARVAR_DONT_SET)) {return;}
     if(!xarVarFetch('noconfirm', 'str', $noconfirm,  '', XARVAR_DONT_SET)) {return;}

    extract($args);

    if (!empty($objectid)) {
        $itemid = $objectid;
    }
    // Show an error when the itemid is still not set
    if (empty($itemid)) {
        $msg = xarML('Invalid #(1) for #(2) function #(3)() in module #(4)',
                    'item id', 'admin', 'delete', 'dyn_example');
        throw new BadParameterException(null,$msg);
        return $msg;
    }

    // get the Dynamic Object defined for this module (and itemtype, if relevant)
    $object = xarModAPIFunc('dynamicdata','user','getobject',
                             array('module' => 'dyn_example',
                                   'itemid' => $itemid));
    if (!isset($object)) return;

    // get the values for this item
    $newid = $object->getItem();
    if (!isset($newid) || $newid != $itemid) return;

    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing.  However,
    // in this case we had to wait until we could obtain the item name to
    // complete the instance information so this is the first chance we get to
    // do the check
    if (!xarSecurityCheck('DeleteDynExample',1,'Item',$itemid)) return;

    if (!empty($noconfirm)) {
        //we're cancelling
        xarResponseRedirect(xarModURL('dyn_example', 'admin', 'view'));
    }

    // Check for confirmation.
    if (empty($confirm)) {
        // No confirmation yet - display a suitable form to obtain confirmation
        // of this action from the user
        // Get the menu
        $data['menulinks'] = xarModAPIFunc('dyn_example','admin','getmenulinks');
        // Specify for which item you want confirmation
        $data['itemid'] = $itemid;
        $data['object'] =& $object;

        // Return the template variables defined in this function
        return $data;
    }

    // If we get here it means that the user has confirmed the action
    // Check for a valid Authentication Key
    if (!xarSecConfirmAuthKey()) return;
    // Now, delete the item
    $itemid = $object->deleteItem();
    if (empty($itemid))
    {
        $msg = xarML('There was a problem deleting the item.');
        xarTplSetMessage($msg,'error');
        return;
    }
       $msg = xarML('Item was successfully deleted.');
        xarTplSetMessage($msg,'status');
    // Redirect to the main view function of this module after success
    xarResponseRedirect(xarModURL('dyn_example', 'admin', 'view'));

    // Return
    return true;
}

?>