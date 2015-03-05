<?php
/** @group Helpers Helpers
 *  @{
 * @file helpers/Strings.php
 */
/** Static class for strings management.
 * Beautiful string.
 * @version 0.2
 * @author [Omniarchos]( http://omniarchos.net )
 * @copyright &copy;2014 [GPLv3]( http://www.gnu.org/licenses/gpl-3.0.html )
 */
class Strings{
    /**
     * An htmlspecialchars function to use with arrays as well.
     * @param <mixed> $value The array or string to escape (nothing is done to other values)
     * @return <String> The escaped string if $value is a string
     */
	public static function htmlescape(&$value){
		if(is_string($value))
			return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
		elseif(is_array($value))
			array_walk_recursive($value,['Strings','htmlescape']);
	}
	
	/**
	 * This function returns a given number of given character
	 * @param <int> $i The number of times the character is multiplied
	 * @param <string> $c The character to multiply ("\t" by default)
	 */
	public static function nl($i,$nl="\n",$t="\t"){
		$s = "\n";
		if(is_string($nl))
			$s = $nl;
		
		if(is_int($i) && is_string($t))
			for($j=0;$j<$i;$j++)
				$s .= $t;
		
		return $s;
	}
	
	/**
	 * Lorem Ipsum generator
	 * @param <string> $options Can be one or more of:
		(integer) - The number of paragraphs to generate.
		short, medium, long, verylong - The average length of a paragraph.
		decorate - Add bold, italic and marked text.
		link - Add links.
		ul - Add unordered lists.
		ol - Add numbered lists.
		dl - Add description lists.
		bq - Add blockquotes.
		code - Add code samples.
		headers - Add headers.
		allcaps - Use ALL CAPS.
		prude - Prude version.
		plaintext - Return plain text, no HTML.
	 * @return <string> The requested lorem ipsum
	 */
	static function lipsum($options='2/medium/decorate/link/ul/ol/dl/bq/code/headers'){
		return file_get_contents('http://loripsum.net/api/'.$options);
	}
}
/** @}*/
