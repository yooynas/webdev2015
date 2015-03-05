<?php if(!defined('BASEPATH')) exit('No direct access!');
class MY_Loader extends CI_Loader{
/**
 * This autoloader permits the use of static helpers
 */
function __construct(){
	parent::__construct();
}

/**
 * This helper loader permits helpers' filenames without suffix "_helper" and with or without UCFirst
 */
public function helper($helpers = array())
{
	$helper_suffix = '_helper';
	foreach ($this->_ci_prep_filename($helpers, '') as $helper)
	{
		# = Helper already loaded
		if (isset($this->_ci_helpers[$helper]))
			continue;
		
		# = Check if helper is an extension helper
		$ext_helper = APPPATH.'helpers/'.config_item('subclass_prefix').$helper.'.php';
		$ext_helper_s = APPPATH.'helpers/'.config_item('subclass_prefix').$helper.$helper_suffix.'.php';
		$ext_helper_exists = file_exists($ext_helper);
		$ext_helper_sexists = file_exists($ext_helper_s);
		if($ext_helper_exists || $ext_helper_sexists){
			$base_helper = BASEPATH.'helpers/'.$helper.$helper_suffix.'.php';
			
			if(!file_exists($base_helper))
				show_error('Unable to load the requested file: '.BASEPATH.'helpers/'.$helper.$helper_suffix.'.php');
			
			if($ext_helper_exists)
				include_once($ext_helper);
			else
				include_once($ext_helper_s);
				
			include_once($base_helper);

			$this->_ci_helpers[$helper] = TRUE;
			log_message('debug', 'Helper extension loaded: '.(($ext_helper_exists)?$ext_helper:$ext_helper_s).'');
			continue;
		}
		
		# = Try to load helper from packages and default places
		foreach ($this->_ci_helper_paths as $path){
			$m = [
				'helpers/'.$helper.'.php',
				'helpers/'.$helper.$helper_suffix.'.php',
				'helpers/'.ucfirst($helper).'.php'
			];
			$fe = false;
			foreach($m as $f)
				if(file_exists($f)){
					$fe = true;
					$helper_file = $path.$f;
				}
			if($fe){
				include_once($helper_file);
				$this->_ci_helpers[$helper] = TRUE;
				log_message('debug', 'Helper loaded: '.(($helper_exists)?$helper_file:$helper_file_s));
				break;
			}
		}
		# = unable to load the helper
		if(!isset($this->_ci_helpers[$helper]))
			show_error('Unable to load the requested helper: '.$helper.'');
	}
}

protected function _ci_prep_filename($filename, $extension)
{
	if (!is_array($filename))
		return array(str_replace('.php', '', str_replace($extension, '', $filename).$extension));
	else{
		foreach($filename as $key=>$val)
			$filename[$key] = str_replace('.php', '', str_replace($extension, '', $val)).$extension;
		return $filename;
	}
}
}
