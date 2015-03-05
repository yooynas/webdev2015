<?php
/** @addtogroup Helpers
 *  @{
 * @file helpers/Locale.php
 * Defines Locale Helper
 */
/** Static Class for languages management using gettext(usable), database(not yet), arrays(not yet) and/or csv's(not yet).
 * This class provides static helper methods to use gettext library and manage languages and translations
 * @version 0.2
 * @author [Omniarchos]( http://omniarchos.net )
 * @copyright &copy;2014 [GPLv3]( http://www.gnu.org/licenses/gpl-3.0.html )
 */
class Locale{
	/**
	 * This is the inernal debug array
	 */
	public static $traces = [];
	
	/**
	 *
	 */
	private static $languages = ['en_GB'=>'english'];
	
	/**
	 *
	 */
	public static function languages($lc=null, $merge=false){
		if(is_string($lc) && array_key_exists($lc, self::$languages))
			return self::$languages[$lc];
		
		if(is_array($lc)){
			foreach($lc as $k => $llcc)
				if(!preg_match('#^[a-z]{2}_[A-Z]{2}$#', $k))
					unset($llcc[$k]);
			if(!$merge)
				self::$languages = $lc;
			else
				self::$languages = array_merge(self::$languages, $lc);
		}
		
		return self::$languages;
	}
	
	/**
	 *
	 */
	private static $lc = 'en_GB';
	
	/**
	 *
	 */
	public static function language($lc=null,$default=null){
		return self::$lc;
	}
	
	/**
	 * This method binds passed text-domains.
	 * @param <String[]> $textdomains An array of the form 'domain'=>'path'
	 * @return An empty array if $textdomain is no array or is empty. Else, an array of two entries arrays containing [bindtextdomain($domain,$path),bind_textdomain_codeset($domain,self::$charset)].
	 */
	public static function domains($textdomains=['general'=>'locale'],$charset='utf8'){
		# Bind domains
		if(is_array($textdomains) && !empty($textdomains))
			foreach($textdomains AS $domain=>$path){
				if(is_string($domain) && 0 < strlen($domain) && is_string($path) && is_dir($path))
					self::$traces['domains()'][$domain] = [
						bindtextdomain($domain, $path),
						bind_textdomain_codeset($domain, $charset), # Needed for windows compatibility
					];
				else
					self::$traces['domains()'][] = array(false,null);
			}
		return self::$traces['domains()'];
	}
	/**
	 * This method defines the current textdomain and/or returns the current domain. The domain must first have been registered using bindtextdomain() or Locale::domains().
	 * @param <string|null> $domain The domain to set or null to get current domain
	 * @return The current text domain. Should be the newly defined one if $domain is not null, is a string and everything went well.
	 */
	public static function domain($domain=null){
		if(null !== $domain && !is_string($domain))
			$domain = null;
		return textdomain($domain);
	}
    /**
     * Sets the locale for self::$category (putenv() + setlocale())
     * @param <string> Sets the LC_ category (one of: ALL (default),COLLATE,CTYPE,MONETARY,NUMERIC,TIME or MESSAGES)
     * @return <mixed> Returns the result of setlocale(constant('LC_'.self::$category), self::$locale)
     */
	public static function setlocale($category='ALL',$locale='en_GB.utf8'){
		if(!in_array($category, array(
			'ALL',
			'COLLATE',
			'CTYPE',
			'MONETARY',
			'NUMERIC',
			'TIME',
			'MESSAGES',
		)))
			$category = 'ALL';
		putenv('LC_'.$category.'='.$locale);
		return setlocale(constant('LC_'.$category), $locale);
	}
	
	/**
	 * This method sets needed environment variables for gettext and other methods from this helper to be used.
	 * It is to be called once before you can start using methods provided here.
	 * @param <string[]> $textdomains An array of domains
	 * @param <bool> $dolocale If set at true, self::$locale is created as being self::$language.'.'.$charset. Set it at false in case you define your own locale. You must define your locale before calling this method or risk unexpected behaviour.
	 * @param <bool> $dolocale If set at true, self::$locale is created as being self::$language.'.'.$charset. Set it at false in case you define your own locale. You must define your locale before calling this method or risk unexpected behaviour.
	 * @return <NULL> This method returns the return of self::setlocale().
	 */
	public static function init($language='en_GB',$charset='utf8',$textdomains=['general'=>'locale'],$category='ALL'){
		# = Create locale
		$locale = $language.'.'.$charset;
		
		# = This is needed for windows compatibility
		self::$traces['init() > putenv(LANG='.$locale.')'] =  putenv('LANG='.$locale);
		self::$traces['init() > putenv(LANGUAGE='.$locale.')'] =  putenv('LANGUAGE='.$locale);
		
		# = Bind textdomains
		self::domains($textdomains,$charset);
		
		# = Set used domain
		reset($textdomains);
		self::domain(key($textdomains));
		
		# = Set locale category
		return self::setlocale($category,$locale);
	}
	/**
	 * This function translates text using gettext or dgettext (using specified domain).
	 * The translation is looked for into the following .mo file: "<locale directory>/<locale>/LC_<category>/<textdomain>.mo" where:
	 *	<locale directory> is one bind using bindtextdomain($textdomain, $locale_dir) or Locale::domains($domains)
	 *	<locale> is an existing locale in the form ll_CC (eg: fr_FR, en_GB, en_US, ja_JP,...)
	 *	<category> is the one defined in Locale::$category (one of: ALL, MESSAGES, )
	 *	<textdomain> the last domain set with textdomain($textdomain) or Locale::domain($domain)
	 * See php gettext manual for more informations about how (d)gettext is working.
	 * @param <string> $text The string to be translated. If required .mo file is not found or $text is not found within, it is returned as is.
	 * @param <string> $domain If set at a non-empty string, the translation will be looked for in a file called "$domain.mo" instead of the $textdomain defined with textdomain($textdomain), as seen above.
	 * @return <string> The translated string or $text, in case required .mo file is not found or $text is not found within it.
	 */
	public static function translate($text, $domain = null){
		if(!is_string($text))
			$text = '$text is not a string';
		if(null !== $domain && is_string($domain) && 0 < strlen($domain))
			return dgettext($domain,$text);
		return gettext($text);
	}
	/**
	 * This function translates text using ngettext or dngettext (using specified domain).
	 * The translation is looked for into the following .mo file: "$locale_dir/$locale/LC_MESSAGES/$textdomain.mo" where:
	 *	$locale_dir is one bind using bindtextdomain($textdomain, $locale_dir)
	 *	$locale is a locale in the form ll_CC (eg: fr_FR, en_GB, en_US, ja_JP,...)
	 *	$textdomain is one bind using bindtextdomain($textdomain, $locale_dir) and the last defined with textdomain($textdomain)
	 * See php gettext manual for more informations about how (d)ngettext is working.
	 * @param <string> $singular The string to be translated when $number is 0 or 1. If required .mo file is not found or $singular is not found within, it is returned as is.
	 * @param <string> $plural The string to be translated when number is greater than 1. If required .mo file is not found or $text is not found within, it is returned as is.
	 * @param <string> $number The number that will determine wether $singular or $plural is used.
	 * @param <string> $domain If set at a non-empty string, the translation will be looked for in a file called "$domain.mo" instead of the $textdomain defined with textdomain($textdomain), as seen above.
	 * @return <string> The translated string or $singular/$plural (accoring to $number), in case required .mo file is not found or $text is not found within it.
	 */
	public static function ntranslate($singular, $plural, $number, $domain = null){
		if(!is_string($singular))
			$singular = '$singular is not a string';
		if(!is_string($plural))
			$plural = '$plural is not a string';
		if(null !== $domain && is_string($domain) && 0 < strlen($domain))
			return ndgettext($domain,$text);
		return ngettext($singular, $plural, $number);
	}
}
/** @}*/
