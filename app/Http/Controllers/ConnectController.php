<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use DB;
use View;
use Illuminate\Support\Facades\Request as fRequest;

class ConnectController extends Controller {
	private $masterPassword = '';
	//IP Address of the AD-DS Server
	private $ldapServer = '';
	//Ad-DS Port
	private $ldapPort = '389';
	//AD-DS domain used by the Company
	private $domain = '@nps.com';
	//Base DN by default use DC = Domain, DC = Extension
	private $basedn = 'DC = nps, DC = com';
	//Attribute used to store the primary key value of ( Creancier table )
	private $attribName = 'homephone';
	
	public function __construct(){
		parent::__construct();
		$this->ldapServer 	= env( 'LDAP_SERVER' );
		$this->ldapPort 	= env( 'LDAP_PORT' );
		$this->domain 		= env( 'LDAP_DOMAIN' );
		$this->basedn 		= env( 'LDAP_BASEDN' );
		$this->attribName 	= env( 'LDAP_ATTR' );
	}
	/**
	 * Connect A User with his Cridentials
	 * @param Request
	 * @return Response
	 */
	public function connect( Request $request )
	{
		
		if( !$request->isMethod( 'POST' ) ){
			return redirect( '/auth/login' );
		}
		$attempt = Session::get( 'attempt', 0 );
		if( $attempt>5 ){
			Session::flash( 'error', "Vous avez dépassez le nombre de tentations possibles,  Vous devez attendre un moment puis recommencer!" );
			return redirect( '/auth/login' );
		}
		Session::set( 'attempt', $attempt+1 );
		
		
		$nom = ( $request->has( 'nom' ) )?$request->input( 'nom' ):'';
		
		if( empty( $nom ) ){
			Session::flash( 'error', "Veuillez saisir votre login." );
			return redirect( '/auth/login' )->withInput();
		}
		
		//Auth via DB with Matricule directly
		if( env( 'CONNECT_VIA' ) =  = 'DB' ){
			$user = User::where( 'MATRICULE', $nom )->first();
			if( $user ){
				Auth::loginUsingId( $user->MATRICULE );
				
				//check for birthday
				if( $user->birth =  = date( 'd/m' ) ){
					Session::set( 'birth', true );
				}
				
				return redirect()->intended( '/' );
			}else{
				Session::flash( 'error', "Vous n'êtes pas mentionnés dans notre base de données,  Veuillez contacter les responsables!" );
				return redirect( '/auth/login' )->withInput();
			}
		}
		
		$password = ( $request->has( 'password' ) )?$request->input( 'password' ):'';
		
		if( empty( $password ) ){
			Session::flash( 'error', "Veuillez saisir votre mot de passe." );
			return redirect( '/auth/login' )->withInput();
		}
		
		try{
			$ping = $this->pingController( $this->ldapServer, $this->ldapPort );
			if( !$ping )throw new \Exception( "New ping response" );
		}catch( \Exception $e ){
			Session::flash( 'error', "Le serveur d'authetification ne répond pas,  veuillez contactez les responsables du système." );
			return redirect( '/auth/login' )->withInput();
		}
		
		$code = $this->authenticate( $nom.$this->domain,  $password );
		if( $code && !empty( $code ) ){
			$user = User::where( 'MATRICULE', $code )->first();
			if( $user ){
				Auth::loginUsingId( $user->MATRICULE );
				
				return redirect()->intended( '/' );
			}else{
				Session::flash( 'error', "Vous n'êtes pas mentionnés dans notre base de données,  Veuillez contacter les responsables!" );
				return redirect( '/auth/login' )->withInput();
			}
		}else{
			Session::flash( 'error', 'Veuillez vérifier votre login et mot de passe!' );
		}
		
		return redirect( '/auth/login' )->withInput();
	}
		
	/***
	 * Authenticate against LDAP Server
	 * see config on top of this file ( all vars are in private scope )
	 * @param string ( login )
	 * @param string ( password )
	 * @return string|false ( attribe value )
	 */
	private function authenticate( $login = null, $pass = null ){
		if( is_null( $login ) || empty( $login ) || is_null( $pass ) || empty( $pass ) )
			return false;
		$con = ldap_connect( $this->ldapServer, $this->ldapPort );
		if( $con ){
			ldap_set_option( $con, LDAP_OPT_PROTOCOL_VERSION, 3 );
			ldap_set_option( $con,  LDAP_OPT_REFERRALS,  0 );
			ldap_set_option( $con, LDAP_OPT_TIMELIMIT, 10 );
			try{
				$auth = ldap_bind( $con, $login, $pass );
				if( $auth ){
					$filter  = "( &( objectCategory = person )( userprincipalname = {$login} ) )";
					$fields  =  array( $this->attribName );
					$res  =  ldap_search( $con, $this->basedn,  $filter, $fields );
					if( isset( $res ) && !empty( $res ) ){
						$entries  =  ldap_get_entries( $con,  $res );
						@ldap_close( $con );
						if( isset( $entries[0][$this->attribName][0] ) && !empty( $entries[0][$this->attribName][0] ) )
							return $entries[0][$this->attribName][0];
						else
							return false;
					}else
						return false;
				}else 
					return false;
			}catch ( \Exception $e ){
				@ldap_close( $con );
				return false;
			}
		}else 
			return false;
		
	}
	
	/** 
	* Test basic connectivity to controller 
	* @param string ( nom dns/ ip pdc )
	* @param string/intiger ( port number )
	* @return bool
	*/ 
	private function pingController( $host, $port ) {
		fsockopen( $host,  $port,  $errno,  $errstr,  10 ); 
		if ( $errno > 0 ) {
			return false;
		}
		return true;
	}
}
