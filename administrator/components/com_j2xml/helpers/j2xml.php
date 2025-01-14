<?php
/**
 * @version		2.5.85 helpers/j2xml.php
 * 
 * @package		J2XML
 * @subpackage	com_j2xml
 * @since		2.5.85
 * 
 * @author		Helios Ciancio <info@eshiol.it>
 * @link		http://www.eshiol.it
 * @copyright	Copyright (C) 2010-2012 Helios Ciancio. All Rights Reserved
 * @license		http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL v3
 * J2XML is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Content component helper.
 */
class J2XMLHelper
{
	public static $extension = 'com_j2xml';

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return	JObject
	 * @since	2.5
	 */
	public static function getActions()
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_content';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
	
	/**
	 * @return	boolean
	 * @since	2.5
	 */
	public static function updateReset()
	{
		return true;
	}
	
	public static function addSubmenu($vName)
	{
		return true;
	}
}