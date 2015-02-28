<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
  * Codeigniter Asset Helper
  * For include links to asset files "CSS","Javascrip","images"
  * link    http://www.teerapuch.com
  * version 001
*/  
function other_asset_url($asset_name, $module_name = NULL, $asset_type = NULL)
{
	$oBject =& get_instance();
	$base_url = $oBject->config->item('base_url');

	$asset_location = $base_url.'assets/';

	if(!empty($module_name)) {
		
    $asset_location .= 'modules/'.$module_name.'/';
	
  }

	$asset_location .= $asset_type.'/'.$asset_name;

	return $asset_location;

}
function _parse_asset_html($attributes = NULL)
{

	if(is_array($attributes)) {
		$attribute_str = '';

		foreach($attributes as $key => $value) {
			$attribute_str .= ' '.$key.'="'.$value.'"';
		}

		return $attribute_str;
	}

	return '';
}

// Asset css location
function css_asset_url($asset_name, $module_name = NULL)
{
	return other_asset_url($asset_name, $module_name, 'css');
}

function css_asset($asset_name, $module_name = NULL, $attributes = array())
{
	$attribute_str = _parse_asset_html($attributes);

	return '<link href="'.css_asset_url($asset_name, $module_name).'" rel="stylesheet" type="text/css"'.$attribute_str.' />';
}

// Asset images location
function image_asset_url($asset_name, $module_name = NULL)
{
	return other_asset_url($asset_name, $module_name, 'images');
}

function image_asset($asset_name, $module_name = '', $attributes = array())
{
	$attribute_str = _parse_asset_html($attributes);
	return '<img src="'.image_asset_url($asset_name, $module_name).'"'.$attribute_str.' />';
}

// Asset javaScript location
function js_asset_url($asset_name, $module_name = NULL, $user = NULL)
{
	if($user == NULL) {
		return other_asset_url($asset_name, $module_name, 'js');
	} else {
		return other_asset_url($asset_name, $module_name, $user);
  }
}

function js_asset($asset_name, $module_name = NULL, $user = NULL)
{
	if($user == NULL) {
		return '<script type="text/javascript" src="'.js_asset_url($asset_name, $module_name).'"></script>';
	} else {
		return '<script type="text/javascript" src="'.js_asset_url($asset_name, $module_name, $user).'"></script>';
  }
}

?>