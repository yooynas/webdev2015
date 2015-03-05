<?php
/** @addtogroup Helpers
 *  @{
 * @file helpers/Libraries.php
 * Defines Libraries Helper
 */
/** Static class & variables for libraries management (autoload,scripts,styles).
 * Made to simplify scripts & styles printing as well as avoid classes inclusion.
 * @version 0.2
 * @author [Omniarchos]( http://omniarchos.net )
 * @copyright &copy;2014 [GPLv3]( http://www.gnu.org/licenses/gpl-3.0.html )
 * @todo Write add/remove methods with checks
 * @todo Privatize & unstatic class -> send to classes/Core
 */
class Libraries{

public static $url = '/libraries'; /*!< Base url for libraries */
public static $logs = []; /*!< An array of logs for @ref Logs "Logs helper" to check problems with libraries loading. */

/** Scripts libraries.
	Example entry:
	-------------- @code
	$scripts['script_name-v0.1x']=[
		'src' => 'js/script.js', # = Mandatory: the src attribute for <script> tag
		'type' => 'text/javascript', # = Optionnal: the type attribute for <script> tag
		'foot' => false, # = Optionnal: is the script to be displayed after content instead of between <head> tags
	];
@endcode */
public static $scripts = [];

/** Adds a script to array checking all is ok
 */
static function push_scripts($foot=false, $echo=false){}

/**
 * Creates and optionnaly outputs <script...> tags
 * @param $foot Output the head scripts (false), foot scripts (true) or both (null). Care for the types (Boolean or NULL only, no integers), value is checked with "==="!!
 * @param $echo true to echo the tags, false to only return it
 * @return Prints the tags if $echo==true and always returns a string containing them.
 */
static function scripts($foot=false, $echo=false){
	# = Create source code carriage return model
	$cr = "\n";
	if(false === $foot)
		$cr .= "\t";
	$r = $cr; # = Output var
	foreach(self::$scripts AS $k=>$script){
		# = src must exist
		if(!isset($script['src']) || !is_string($script['src'])){
			self::$logs[date('%Y-%m-%d@%i:%s.').trim(strstr(microtime(true),','),',')] = [
				'type'=>'warning',
				'msg'=>'Libraries::do_scripts() > $scripts['.$k.'] has no valid url, entry skipped!'];
			continue;
		}
		
		# = Check if relative url (not starting with slash "/" or http://)
		if(!preg_match('/^(\/|http:\/\/)/',$script['src']))
			$script['src'] = self::$url.'/'.$script['src']; # = Prepend base url
		
		# = Set default foot=false if no foot entry
		if(!isset($script['foot']))
			$script['foot'] = false;
		
		# = Set default type='text/javascript' if no valid entry found
		if(!isset($script['type']) || !is_string($script['type']))
			$script['type'] = 'text/javascript';
		
		# = Create output
		if(null === $foot || $foot === $script['foot'])
			$r .= '<script type="'.$script['type'].'" src="'.$script['src'].'"></script>'.$cr;
	}
	if($echo) # = echo if needed
		echo $r;
	return $r; # Return
}

/** Stylesheets libraries
	Example entry:
	-------------- @code
	'style_name-v0.1x'=>[
		'href'=>'css/style.css', # = Mandatory: the href attribute for <style> tag
		// 'type'=>'text/css', # = Optionnal: the type attribute for <link> tag
		// 'media'=>'all', # = Optionnal: the media attribute for <link> tag
	];
@endcode */
public static $styles = [];

/**
 * Creates and optionnaly outputs <link rel="stylesheet" ...> tags.
 * @param $echo true to echo the tags, false to only return it
 * @return Prints the tags if $echo==true and always returns a string containing them.
 */
public static function styles($echo=false){
	# = Create source code carriage return model
	$cr = "\n\t";
	$r = $cr; # = Output
	foreach(self::$styles AS $k=>$style){
		# = href must be set and valid
		if(!isset($style['href']) || !is_string($style['href'])){
			self::$logs[date('%Y-%m-%d@%i:%s.').trim(strstr(microtime(true),','),',')] = [
				'type'=>'warning',
				'msg'=>'Libraries::do_styles() > $styles['.$k.'] has no valid href, entry skipped!'];
			continue;
		}
		
		# = Check if relative url (not starting with slash "/" or http://)
		if(!preg_match('/^(\/|http:\/\/)/',$style['href']))
			$style['href'] = self::$url.'/'.$style['href']; # = Prepend base url
		
		# = Set default type='text/css' if no valid entry found
		if(!isset($style['type']) || !is_string($style['type']))
			$style['type'] = 'text/css';
		
		# = Set default media='all' if no valid entry found
		if(!isset($style['media']) || !is_string($style['media']))
			$style['media'] = 'all';
		
		# = Set output
		$r .= '<link rel="stylesheet" href="'.$style['href'].'" type="'.$style['type'].'" media="'.$style['media'].'" />'.$cr;
	}
	if($echo)
		echo $r;
	return $r; # = Return
}

/**
 * Displays the scripts & style tags.
 * 
 * @param <bool> $foot True to display only foot scripts, false to display head styles & scripts, null for all scripts & styles.
 * @return <null> Prints the requested styles & scripts tags
 */
static function output($foot=false){
	if(true !== $foot)
		echo '<!-- STYLES -->'.self::styles().'<!-- /STYLES -->';
	$c = ((true===$foot)? 'FOOT': '').'SCRIPTS -->';
	$cr = (true===$foot)? "\n": "\n\t";
	echo $cr.'<!-- '.$c.self::scripts($foot).'<!-- /'.$c;
}
}
/** @}*/
