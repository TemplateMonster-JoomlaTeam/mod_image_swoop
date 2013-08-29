<?php
/**
 * Camera Slideshow for Joomla! Module
 *
 * @author    TemplateMonster http://www.templatemonster.com
 * @copyright Copyright (C) 2012 - 2013 Jetimpex, Inc.
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 
 * Parts of this software are based on Camera Slideshow By Manuel Masia: http://www.pixedelic.com/plugins/camera/ & Articles Newsflash standard module
 * 
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$app 	  = JFactory::getApplication();	
$document =& JFactory::getDocument();
$template = $app->getTemplate();

// Include Camera Slideshow styles
switch($params->get('theme')){
	case 0:
		$document->addStyleSheet(JURI::base() . 'modules/mod_image_swoop/css/camera.css');
		break;
	case 1:
		$document->addStyleSheet(JURI::base() . 'templates/'.$template.'/css/camera.css');
		break;
}

// Include Camera Slideshow scripts
switch($params->get('script')){
	case 0:
		$document->addScript(JURI::base() . 'modules/mod_image_swoop/js/camera.min.js');
		break;
	case 1:
		$document->addScript(JURI::base() . 'modules/mod_image_swoop/js/camera.js');
		break;	
	case 2:
		$document->addScript(JURI::base() . 'templates/'.$template.'/js/camera.js');
		break;
}


if($params->get('load_easing') == 'true'){
	$document->addScript(JURI::base() . 'modules/mod_image_swoop/js/jquery.mobile.customized.min.js');
}
if($params->get('load_jquery_mobile') == 'true'){
	$document->addScript(JURI::base() . 'modules/mod_image_swoop/js/jquery.easing.1.3.js');
}


$list = modImageSwoopHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Color Skin

if($params->get('skin') == 'default'){
	$skin = '';
} else {
	$skin = 'camera_'.$params->get('skin').'_skin';
}

require JModuleHelper::getLayoutPath('mod_image_swoop', $params->get('layout', 'default'));
