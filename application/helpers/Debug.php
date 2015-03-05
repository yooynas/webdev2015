<?php
/** @group Helpers Helpers
 *  @{
 * @file helpers/Debug.php
 */
/** Static class for values tracing & debugging.
 * Made to simplify debugging by tracing values through a program.
 * @version 0.2
 * @author [Omniarchos]( http://omniarchos.net )
 * @copyright &copy;2014 [GPLv3]( http://www.gnu.org/licenses/gpl-3.0.html )
 */
class Debug{
	const VERSION = '0.2'; /*!< Debug helper's version. */

	/** @param <int|null> $level The default debug level. */
	public static $level = 0;

	/** @param <String> $group The default group */
	public static $group = 'Default';

	/** @param <mixed[][]> $traces The debug traces:
		'group'=>[ # = Full
			'key'=>[
				'level'=>null,
				'value'=>null,
			],
		],
	*/
	private static $traces = [];

/**
 * Adds a traced value
 * @param $value The value to trace (always passed by reference)
 * @param $key The optional key/numeric string to label value with. If not a string or int, default numeric keys are used but not printed.
 * @param $group A string used as grouping name (case sensitive). 'Default' is used for key/value pairs without a string defined group.
 * @param $level An optional level of debugging. 0 means extra verbose and the more you go up in numbers, the less you should see output.
 * @param $overwrite An existing value will be overwritten if this one is true or equivalent.
 */
static function trace($value, $key=null, $group=null, $level=null, $overwrite=true){
	# = Default group is no string => default
	if(!is_string(self::$group))
		self::$group = 'Default';
	
	# = Default level is no int => default
	if(!is_int(self::$level))
		self::$level = 0;
	
	# = Group is no string => default
	if(!is_string($group) || 0 === strlen($group))
		$group = self::$group;
	
	# = Group not exists => create it
	if(!array_key_exists($group,self::$traces))
		self::$traces[$group] = [];
	
	# = Level is no int => default
	if(!is_int($level))
		$level = self::$level;
	
	# = Key is valid int or string
	if(is_string($key) || is_int($key)){ # = Asume it's a value with key
		if(array_key_exists($key,self::$traces[$group]) && !$overwrite) # = Do Not Overwrite
			self::$traces[$group][] = [
				'level'=>$level,
				'value'=>[$key=>$value],
			];
		else # = Overwrite
			self::$traces[$group][$key] = [
				'level'=>$level,
				'value'=>$value,
			];
	}
	else # = Asume it's a value without key (numeric one)
		self::$traces[$group][] = [
			'level'=>$level,
			'value'=>$value,
		];
}

/**
 * Adds an array of traced values (useful to add pre_debug array to static debug array)
 * @param $a The array of traces to merge with static param one
 * @param $group The group name to put value in. All characters other than "a-zA-Z0-9_-" will be replaced by "-" when used in arguments of @ref Debug::traces()
 * @param $level An optional level of debugging. 0 means extra verbose and the more you go up in numbers, the less you should see output.
 * @param $overwrite An existing value will be overwritten if this one is true or equivalent.
 */
static function atrace($a,$group=null,$level=null,$overwrite=true){
	# = Default group is no string => default
	if(!is_string(self::$group))
		self::$group = 'Default';
	
	# = Default level is no int => default
	if(!is_int(self::$level))
		self::$level = 0;
	
	# = If not an array passed, exit
	if(!is_array($a))
		return;
	
	# = Group is no string => default
	if(!is_string($group) || 0 === strlen($group))
		$group = self::$group;
	
	# = Group not exists => create it
	if(!array_key_exists($group,self::$traces))
		self::$traces[$group] = [];
	
	# = Level is no int => default
	if(!is_int($level))
		$level = self::$level;
	
	# = Overwrite is no boolean => default
	if(!is_bool($overwrite))
		$overwrite = true;
	
	# = Run through array and trace each value
	foreach($a AS $k=>$v)
		self::trace($v,$k,$group,$level,$overwrite);
}
 
/**
 * Prints traces' array according to value's type (object, array, int, float, ...)
 * @param <int>$t The number of tabulations before generated html first line of debug output (for correct source code indent)
 * @param $args An array of arguments for output configuration (defaults to a boostrap accordion of all groups (one group per accordion))
	- groups: an array of names of groups to output (leave empty for all groups)
	- level: the minimum level value to output. All entries with a value strictly under this one will not be output.
	- before_groups: html code to output before the groups output
	- before_group: html code to output before the group traces output. You can use %g% and %gid% to retrieve respectively the group's "name" (unstripped key) and the group's id (stripped key)
	- after_group: html code to output after the group traces output
	- after_groups: html code to output after the groups output
	
	Content is output quite like this pseudo-code below: @code
	echo $args['before_groups'];
	foreach($groups as group){
		echo $args['before_group'];
		echo $group;
		foreach($group->traces as trace) echo $trace;
		echo $args['after_group'];
	}
	echo $args['after_groups'];
	@endcode
 * @return Prints the traces (uses twitter bootstrap accordion html tags & css classes)
 */
static function traces($t=0,$args=[]){
	# = Default group is no string => default
	if(!is_string(self::$group))
		self::$group = 'No Group';
	
	# = Default level is no int => default
	if(!is_int(self::$level))
		self::$level = 0;
	
	# = Check arguments
	\Arrays::validate($args,[
		'groups'=>[],
		'level'=>self::$level,
		'before_groups'=>'<div class="container container-fluid"><div class="panel-group" id="accordion_debug" role="tablist" aria-multiselectable="false">',
		
		'before_group'=>'<div class="panel panel-info" style="margin:10px;">'.
			Strings::nl($t+2).'<div class="panel-heading" role="tab" id="accordion-heading_%gid%">'.
				Strings::nl($t+3).'<h3 class="panel-title">'.
					Strings::nl($t+4).'<a data-toggle="collapse" data-parent="#accordion_debug" href="#accordion-collapse_%gid%"
							aria-expanded="false" aria-controls="accordion-collapse_%gid%">%g%</a>'.
				Strings::nl($t+3).'</h3>'.
			Strings::nl($t+2).'</div>'.
			Strings::nl($t+2).'<div id="accordion-collapse_%gid%" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion-heading_%gid%">'.
				Strings::nl($t+3).'<div class="panel-body"><ul class="list-group">',
		
		'after_group'=>'</ul></div></div></div>',
		'after_groups'=>'</div></div>',
		
		'default_entry'=>'list-group-item',
		'array_entry'=>'list-group-item well',
		'object_entry'=>'list-group-item well',
		'bool_entry'=>'list-group-item',
		'int_entry'=>'list-group-item',
		'string_entry'=>'list-group-item',
		'null_entry'=>'list-group-item',
		
	]);
	extract($args);
	
	/* @todo Check args... */
	
	# = Start foreach group
	echo Strings::nl($t).$before_groups;
	foreach(self::$traces AS $group=>$stack){
		$group_id = preg_replace('#[^a-zA-Z0-9_-]#', '-', $group);
		echo Strings::nl($t+1).preg_replace(['/%g%/','/%gid%/'],[$group,$group_id],$before_group);
		
		# = Check group is included
		if(is_array($groups) && 0 < count($groups) && !in_array($group,$groups))
			continue;
		
		# = Start foreach traces
		foreach($stack AS $k=>$v){
			# = Check level is included
			if($level > $v['level'])
				continue;
			
			# = Check type
			$v = $v['value'];
			$vtype = gettype($v);
			
			# = Array
			if(is_array($v)){
				echo Strings::nl($t+2).'<li class="'.$array_entry.'"><h4><strong>&lt;'.$vtype.'&gt;</strong>'.(is_string($k)? $k: '').'</h4>';
				array_walk_recursive($v, "\Strings::htmlescape");
				echo Strings::nl($t+3).'<pre class="pre-scrollable"><ul>';
				foreach($v AS $k=>$vv){
					echo Strings::nl($t+4).'<li>'.((is_string($k)||is_int($k))? '<strong>'.$k.': </strong>': '');
					var_dump($vv);
					echo '</li>';
				}
				echo Strings::nl($t+3).'</ul></pre>';
			}
			# = Object
			elseif(is_object($v)){
				echo Strings::nl($t+2).'<li class="'.$object_entry.'"><h4><strong>&lt;'.$vtype.'&gt;</strong>'.(is_string($k)? $k: '').'</h4>';
				$v = (array)$v;
				array_walk_recursive($v, "\Strings::htmlescape");
				echo Strings::nl($t+3).'<pre class="pre-scrollable"><ul>';
				foreach($v AS $k=>$vv){
					echo Strings::nl($t+4).'<li>'.((is_string($k)||is_int($k))? '<strong>'.$k.': </strong>': '');
					var_dump($vv);
					echo '</li>';
				}
				echo Strings::nl($t+3).'</ul></pre>';
			}
			
			# = Boolean
			elseif(is_bool($v))
				echo Strings::nl($t+2).'<li class="'.$bool_entry.'"><strong>&lt;'.$vtype.'&gt;'.(is_string($k)? $k: '').':</strong> '.
					(($v)?'TRUE':'FALSE');
				
			# = Null
			elseif(is_null($v))
				echo Strings::nl($t+2).'<li class="'.$null_entry.'"><strong>&lt;'.$vtype.'&gt;'.(is_string($k)? $k: '').'</strong>';
			
			# = String or int
			elseif(is_string($v) || is_int($v))
				echo Strings::nl($t+2).'<li class="'.$string_entry.'"><strong>&lt;'.$vtype.'&gt;'.(is_string($k)? $k: '').':</strong> '.$v;
					
			# = Other
			else
				echo Strings::nl($t+2).'<li class="'.$default_entry.'"><strong>&lt;'.$vtype.'&gt;'.(is_string($k)? $k: '').'</strong>';
			
			# = Closing
			echo Strings::nl($t+2).'</li>';
		}
		echo Strings::nl($t+1).$after_group;
	}
	echo Strings::nl($t).$after_groups;
}

}
/** @}*/
