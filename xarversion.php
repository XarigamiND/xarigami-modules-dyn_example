<?php
/**
 * Dynamic Data Example Module - documented module template
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
$modversion['directory']    = 'dyn_example';
$modversion['name']         = 'dyn_example';
$modversion['id']           = '66';
$modversion['version']      = '1.0.1';
$modversion['displayname']  = 'DynamicData Example';
$modversion['description']  = 'Dynamic Data Example for new modules';
$modversion['credits']      = 'xardocs/credits.txt';
$modversion['help']         = 'xardocs/help.txt';
$modversion['changelog']    = 'xardocs/changelog.txt';
$modversion['license']      = 'xardocs/license.txt';
$modversion['official']     = 1;
$modversion['author']       = 'Xarigami Team, mikespub';
$modversion['contact']      = 'http://xarigami.com';
$modversion['admin']        = 1;
$modversion['user']         = 1;
$modversion['class']        = 'Complete';
$modversion['category']     = 'Tools';
/* Add dependencies var if applicable or remove - example is using Dynamic data and it's Reg ID plus core */
$modversion['dependencyinfo']   = array(
                                    0 => array(
                                            'name' => 'core',
                                            'version_ge' => '1.4.0'
                                         ),
                                    182 => array(
                                            'name' =>'dynamicdata',
                                            'version_ge' => '1.2.0'
                                        )
                                );

if (false) { //Load and translate once
    xarML('DynamicData Example');
    xarML('Dynamic Data Example for new modules');
}
?>
