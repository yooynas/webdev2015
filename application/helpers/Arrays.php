<?php
/** @addtogroup HelpersArrays Arrays Helper
 *  @{
 * @file helpers/Arrays.php
 */
/** Static class for arrays management.
 * Made to manage arrays, lists & tree structures. Validation, conversion (array2list, array2tree, tree2array, ...), ...
	//class Matrix{...
 * @version 0.3
 * @author [Omniarchos]( http://omniarchos.net )
 * @copyright &copy;2014 [GPLv3]( http://www.gnu.org/licenses/gpl-3.0.html )
 */
class Arrays{
	/** Arrays validation
	 * Parses arguments array against a default array using given function/method to compare, if provided.
     * @param[in,out] $args The array of arguments to parse
     * @param[in] $defaults The default arguments' values
     * @param[in] $f A string or array representing the callback function/method.
     */
	public static function validate(&$args,$defaults,$f=null){
		if(!is_array($args))
			return [];
		
		/** Parsing function example: @code
		public function parse_tags($k,$v,&$defaults,&$args){
			$ko = true;
			if(array_key_exists($k,$defaults))
				switch($k){
					case ...:
						if(not good) break;
						$ko = false;
					break;
					...
					default: break;
				}
			if($ko)
				unset($args[$k]);
		}
		@endcode */
		if(is_string($f) && function_exists($f))
			foreach($args AS $k=>$v)
				$f($k,$v,$defaults,$args);
		
		elseif( is_array($f)
				&& isset($f[0]) && is_object($f[0])
				&& isset($f[1]) && is_string($f[1])
				&& method_exists($f[0], $f[1]) )
			foreach($args AS $k=>$v)
				$f[0]->$f[1]($k,$v,$defaults,$args);
			
		else{
			foreach($defaults AS $k=>$v){
				if(!array_key_exists($k, $args)){
					$args[$k] = $v;
				}
			}
		}
	}
	
	/** Creates an html tree structure from php array.
	 * @param[in] $arr An array to convert to a list
	 * @param[in] $args An array of arguments
		- level: /
		- base_align: 
		- tag{n}: 
		- before{n}: 
		- after{n}: 
		- class{n}: 
		- item_callback{n}: 
	 @todo List possible arguments
	 * @return The list's html code
	 */
	public static function as_list(&$arr,&$args=array())
	{
		$return = '';
		
		# = Check fct params
		if(!is_array($arr) || !is_array($args))
			return $return;
		
		# = Check item level (set to 0 if not set)
		if(!isset($args['level']))
			$args['level'] = 0;
		
		# = Check base alignement (set to 0 if not set)
		if(!isset($args['base_align']) || !is_int($args['base_align']))
			$args['base_align'] = 0;
		
		# = Check tag for this level or set as "ul"
		if(!isset($args['tag'.$args['level']]) || !is_string($args['tag'.$args['level']]))
			$args['tag'.$args['level']] = 'ul';
		
		# = Check what to put before this level's list
		if(isset($args['before'.$args['level']]))
			$return .= $args['before'.$args['level']];

		# = Set alignement tabs
		$return .= ((0===$args['level'])?"\n".Strings::align($args['base_align']+$args['level']):'');
		
		# = Open list tag
		$return .= '<'.$args['tag'.$args['level']].'';
		
		# = Set class for this level's list tag, if any
		if(isset($args['class'.$args['level']]) && is_string($args['class'.$args['level']]) && 0 < strlen($args['class'.$args['level']]))
			$return .= ' class="'.$args['class'.$args['level']].'"';
		
		# = End of open list tag
		$return .= '>';
		
		# = Check callback and use it if any
		/** Example callback. For a more complex example, see @ref Bootstrap::navbar_items() @code
		function as_list($k,$v,$args){
			$item = '';
			if(is_array($v)){
				$level = $args['level']++;
				$item .= "<li><span>$k</span>".self::as_list($v,$args)."</li>";
				$args['level'] = $level;
			}
			elseif(is_string($v))
				$item .= "<li>$v</li>";
			return $item;
		}
		@endcode */
		$cb = '';
		if( isset($args['item_callback']) && is_callable($args['item_callback'],true,$cb) )
			foreach($arr AS $k=>$v)
				$return .= call_user_func($cb, $k, $v, $args);
				
		# = Default list
		else
			foreach($arr AS $k=>$v){
				if(is_array($v)){
					$level = $args['level']++;
					$return .= "\n".Strings::align($args['base_align']+$args['level'])."<li><span>$k</span>".self::as_list($v,$args)."</li>";
					$args['level'] = $level;
				}
				elseif(is_string($v))
					$return .= "\n".Strings::align($args['base_align']+$args['level']+1)."<li>$v</li>";
			}
		
		# = Align & Close list tag
		$return .= "\n".Strings::align($args['base_align']+$args['level']).'</'.$args['tag'.$args['level']].'>';
		
		# = Check what to put after this level's list
		if(isset($args['after'.$args['level']]))
			$return .= $args['after'.$args['level']];
			
		return $return;
	}
	
	/** Recursive array_key_exists()
     * 
     * @param[in] $needle The key to look after into $haystack.
     * @param[in] $haystack Where $needle is to be searched for.
     * @param[in] $unique Set at true to check if key exists & is unique (in different dimensions)
     * 
     * @return True if $needle is a key in $haystack and it's dimensions. If $unique is true, returns true only if $needle is found only once in $haystack.
     */
	public static function key_exists($needle,$haystack,$unique=false){
		$e = false; $u = true;
		foreach($haystack AS $k=>$v){
			if($k === $needle){
				if($e)
					$u = false;
				$e = true;
			}
			elseif(is_array($v) && self::key_exists($needle,$v,$unique)){
				if($e)
					$u = false;
				$e = true;
			}
		}
		return (!$unique)? $e: (($e && $u)? true: false);
	}
    
	/** Recursive in_array()
     * 
     * @param[in] $needle The value to look after into $haystack.
     * @param[in] $haystack Where $needle is to be searched for.
     * @param[in] $unique Set at true to check if value exists & is unique (no matter dimension)
     * 
     * @return True if $needle exists as a value in $haystack. If $unique is true, returns true only if $needle is found only once in $haystack.
     */
	public static function value_exists($needle,$haystack,$unique=false){
		$e = false; $u = true;
		foreach($haystack AS $v){
			if($v === $needle){
				if($e)
					$u = false;
				$e = true;
			}
			elseif(is_array($v) && self::value_exists($needle,$v,$unique) ){
				if($e)
					$u = false;
				$e = true;
			}
		}
		return (!$unique)? $e: (($e && $u)? true: false);
	}
}
/** @}*/
