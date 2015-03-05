<?php if(!defined('BASEPATH')) exit('No direct access!');
/**
 * This controller is an extend to CI_Controller
 */
class OMNI_Controller extends CI_Controller {
    /**
     * The extended controller's constructor
     * @return <null> Nothing but the object or null...
     */
	function __construct(){
		
		# = Construct parent first
		parent::__construct();
		
		# = Authenticate user
		# = =
		# = Load users model
			# => Load persons model
				# => Load addresses model
		# = Set default user auth level
		Pages::$auth = Pages::$auths[0]; # Visitor
		
		# = Get user informations & options
		# -  Pages::$auth = Pages::$auths[1]; # User
		# -  Pages::$auth = Pages::$auths[2]; # Client
		# -  Pages::$auth = Pages::$auths[3]; # Manager
		# -  Pages::$auth = Pages::$auths[4]; # God
		$username = 'Omniarchos';
		$this->input->set_cookie('LoginToken','token');
		
		# = Define Locale
		# = =
		# = Set default from profile if any
		
		# = Set default from URI if defined and valid
		$locale = $this->uri->segment(1);
		foreach(Locale::$locales AS $lc=>$name){
			if($locale === substr($lc,0,2))
				Locale::$language = $lc;
		}
		# = Save current in profile if any
		
		# = Init gettext functions
		Debug::trace(Locale::init(), 'Locale::init()', 'Locale');
		
		# = =
		# = Translate & display previous localized errors/messages
		# = =
		//Log::$errors[Locale::translate('Logged in').':'] = array('type'=>'success','msg'=>Locale::translate('You are now logged in!'),'dismiss'=>null);
		
		# = =
		# = Load localized config files
		# = =
		# = Pages
		
		# = =
		# = Pages Config
		# = =
		# = Check authorization
		Pages::$queried = $this->uri->rsegment(1);
		if(!Pages::is_auth_page()){
			Pages::$current = Pages::$default;
			Log::$errors[Locale::translate('Lost?')] = array('type'=>'warning','msg'=>Locale::translate('The page you requested is not available!'),'dismiss'=>null);
		}
		Pages::$current = Pages::$queried;
	}
	/**
	 * Create the head
	 */
	protected function head($data=[]){
		$defaults = [
			'charset'=>strtolower($this->config->item('charset')),
			'wrap_id'=>'container',
			'title'=>$this->config->item('title'),
			'subtitle'=>Pages::$pages[Pages::$current]['title'],
			'wrap_id'=>$this->config->item('wrap_id'),
			'wrap_class'=>$this->config->item('wrap_class'),
		];
		Arrays::validate($data,$defaults);
		if('development'===ENVIRONMENT)
			Debug::trace($data, 'Data', 'Head');
		$this->load->view('parts/head',$data);
	}
	/**
	 * Create the header
	 */
	protected function header($data=[]){
		$defaults = [
			'title'=>$this->config->item('title'),
			'subtitle'=>Pages::$pages[Pages::$current]['title'],
		];
		Arrays::validate($data,$defaults);
		if('development'===ENVIRONMENT)
			Debug::trace($data, 'Data', 'Header');
		$this->load->view('parts/header',$data);
	}
	/**
	 * Create the main navigation (bootstrap navbar)
	 */
	protected function navigation($data=[]){
		$data = array_merge($this->config->item('navigation'),$data);
		$defaults = [
			'wrap_class' => 'navbar-nav navbar-fixed-top',
			'auth' => Pages::auth_key(Pages::$auth),
			'username' => 'Omniarchos',
			'current_uri' => $this->uri->uri_string(),
			'items'=>[],
			'config'=>[],
			'ritems'=>[],
			'rconfig'=>[],
		];
		Arrays::validate($data,$defaults);
		if('development'===ENVIRONMENT)
			Debug::trace($data, 'Data', 'Navigation');
		$this->load->helper('form');
		$this->load->view('parts/navigation',$data);
	}
	/**
	 * Create the footer
	 */
	protected function footer($data=[]){
		$defaults = [
			
		];
		Arrays::validate($data,$defaults);
		if('development'===ENVIRONMENT)
			Debug::trace($data, 'Data', 'Footer');
		$this->load->view('parts/footer');
	}
	/**
	 * Create the foot
	 */
	protected function foot($data=[]){
		$defaults = [
			
		];
		Arrays::validate($data,$defaults);
		if('development'===ENVIRONMENT)
			Debug::trace($data, 'Data', 'Foot');
		$this->load->view('parts/foot');
		if(ENVIRONMENT === 'development')
			$this->load->view('parts/debug');
	}
}