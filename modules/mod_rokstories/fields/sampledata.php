<?php
/**
 * Sample Data Custom Module
 *
 * @package RocketTheme
 * @subpackage rokstories.elements
 * @version   1.5 January 25, 2012
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 */

// no direct access
defined('_JEXEC') or die();
/**
 * @package RocketTheme
 * @subpackage rokstories.elements
 */
class JFormFieldSampledata extends JFormField
{
	public function getInput()
	{
		$output = '';
		$document 	=& JFactory::getDocument();
		
		if (defined('ROKSTORIES_ADMIN')) return;
		define('ROKSTORIES_ADMIN', 1);
		
		$document->addStyleSheet(JURI::Root(true)."/modules/mod_rokstories/admin/rokstories-admin.css");
		if (!$this->moduleExists()) return "You need RokModule in order to install Sample Data.";
		
		$module_id = JRequest::getVar('cid', null);
		if(is_array($module_id)) $module_id = $module_id[0];
		if (!$module_id) $module_id = JRequest::getVar('id', null);
		
		$document->addScript(JURI::Root(true)."/modules/mod_rokstories/admin/importData.js");
		$document->addScriptDeclaration("		window.RokStoriesAdminPath = '".JURI::Root(true)."/index.php?option=com_rokmodule&tmpl=component&type=raw&moduleid=$module_id';");
		
		$output .= "<div id='rokstories-admin-wrapper'>
						<div>
							<button>Import Sample Data</button>
						</div>
					</div>";
		
		return $output;
	}

    private function moduleExists()
    {
        $rokmodule = JPATH_SITE.DS.'components'.DS.'com_rokmodule'.DS.'rokmodule.php';

		return file_exists($rokmodule);
    }
}

?>