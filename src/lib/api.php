<?php

// Import Librairies
require_once dirname(__FILE__,3) . '/src/lib/requirements.php';
require_once dirname(__FILE__,3) . '/src/lib/smtp.php';

class API{

  protected $Settings = [];
  protected $Language = 'english';
  protected $Languages = [];
  protected $Fields = [];
  protected $Mail;
  protected $Timezones;
  protected $Countries;
  protected $States;
  protected $DB;
  protected $PHPVersion;
  protected $Protocol;
  protected $Domain;
  protected $Debug = true;

  public function __construct(){

    // Increase PHP memory limit
    ini_set('memory_limit', '2G');
    ini_set('post_max_size', '16G');
    ini_set('upload_max_filesize', '16G');
    ini_set('max_execution_time','2400');

		// Gathering Server Information
		$this->PHPVersion=substr(phpversion(),0,3);
		if(isset($_SERVER['HTTP_HOST'])){
			$this->Protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://";
			$this->Domain = $_SERVER['HTTP_HOST'];
		}

    // Import Configurations
		if(is_file(dirname(__FILE__,3) . "/config/config.json")){
			$this->Settings = json_decode(file_get_contents(dirname(__FILE__,3) . '/config/config.json'),true);
		} else {
      $this->Settings=json_decode(file_get_contents(dirname(__FILE__,3) . '/dist/data/manifest.json'),true);
    }

		// Setup Debug
		if((isset($this->Settings['debug']))&&($this->Settings['debug'])){ $this->Debug = true; }
    if($this->Debug){ error_reporting(-1); } else { error_reporting(0); }

    // Import Database
		if(is_file(dirname(__FILE__,3) . "/config/database.json")){
			$this->Settings = json_decode(file_get_contents(dirname(__FILE__,3) . '/config/database.json'),true);
		}

    // Setup URL
		if(isset($_SERVER['HTTP_HOST']) && !isset($this->Settings['url'])){
			$this->Settings['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://";
			$this->Settings['url'] .= $_SERVER['HTTP_HOST'].'/';
      if(file_exists(dirname(__FILE__,3).'/config/config.json')){ $this->set($this->Settings); }
		}

		//Import Listings
    $this->Timezones = json_decode(file_get_contents(dirname(__FILE__,3) . '/dist/data/timezones.json'),true);
    $this->Countries = json_decode(file_get_contents(dirname(__FILE__,3) . '/dist/data/countries.json'),true);
    $this->States = json_decode(file_get_contents(dirname(__FILE__,3) . '/dist/data/states.json'),true);

		// Setup Language
		if(isset($_COOKIE['language'])){ $this->Language = $_COOKIE['language']; }
    elseif(isset($this->Settings['language'])){ $this->Language = $this->Settings['language']; }
    $this->Languages = array_diff(scandir(dirname(__FILE__,3) . "/dist/languages/"), array('.', '..'));
    foreach($this->Languages as $key => $value){ $this->Languages[$key] = str_replace('.json','',$value); }
    $this->Fields = json_decode(file_get_contents(dirname(__FILE__,3) . "/dist/languages/".$this->Language.".json"),true);

		// Setup Instance
		if(isset($this->Settings['timezone'])){ date_default_timezone_set($this->Settings['timezone']); }

    // Customize SMTP template
    if(isset($this->Settings['url'],$this->Settings['smtp'],$this->Settings['smtp']['username'],$this->Settings['smtp']['password'],$this->Settings['smtp']['host'],$this->Settings['smtp']['port'],$this->Settings['smtp']['encryption'])){
      $this->Mail = new MAIL($this->Settings['smtp'],$this->Fields);
      $customization = [
        "logo" => $this->Settings['url']."dist/img/logo.png",
        "support" => $this->Settings['url']."?p=support",
        "trademark" => $this->Settings['url']."?p=trademark",
        "policy" => $this->Settings['url']."?p=policy"
      ];
      if(is_file(dirname(__FILE__,3).'/dist/img/custom-logo.png')){ $customization['logo'] = $this->Settings['url']."dist/img/custom-logo.png"; }
      $this->Mail->Customization($this->Settings['title'],$customization);
    }
  }

  protected function mkdir($directory){
    $make = dirname(__FILE__,3);
    $directories = explode('/',$directory);
    foreach($directories as $subdirectory){
      $make .= '/'.$subdirectory;
      if(!is_file($make)&&!is_dir($make)){ mkdir($make); }
    }
    return $make;
  }

  public function init(){
    $init['countries'] = $this->Countries;
    $init['states'] = $this->States;
    $init['timezones'] = $this->Timezones;
    $init['language'] = $this->Language;
    $init['languages'] = $this->Languages;
    $init['fields'] = $this->Fields;
    $init['debug'] = $this->Debug;
    return $init;
  }

  protected function save(){
    try {
      $json = fopen(dirname(__FILE__,3).'/config/database.json', 'w');
  		fwrite($json, json_encode($this->DB, JSON_PRETTY_PRINT));
  		fclose($json);
      return true;
    } catch(Exception $error){ return false; }
  }

  protected function set(){
    try {
      $json = fopen(dirname(__FILE__,3).'/config/config.json', 'w');
  		fwrite($json, json_encode($this->Settings, JSON_PRETTY_PRINT));
  		fclose($json);
      return true;
    } catch(Exception $error){ return false; }
  }

  public function isInstall(){
    return is_file(dirname(__FILE__,3).'/config/config.json');
  }

  public function isLogin(){
    if(isset($this->Settings) && is_array($this->Settings) && !empty($this->Settings)){ return true; }
  }
}
