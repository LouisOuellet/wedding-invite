<?php

// Import Librairies
require_once dirname(__FILE__,3) . '/src/lib/api.php';

class Installer extends API {

	protected $Log;
  protected $Steps = 4;

  public function install($settings){

    // Error Reporting
    error_reporting(-1);

    // Init Installer
    if(!is_dir(dirname(__FILE__,3) . '/tmp')){ mkdir(dirname(__FILE__,3) . '/tmp'); }
    if(is_file(dirname(__FILE__,3) . '/tmp/resume.install')){ unlink(dirname(__FILE__,3) . '/tmp/resume.install'); }
    file_put_contents(dirname(__FILE__,3) . '/tmp/resume.install', $this->Steps.PHP_EOL , FILE_APPEND | LOCK_EX);

    // Init Log
    $this->Log = dirname(__FILE__,3) . '/tmp/install.log';
    if(is_file($this->Log)){ unlink($this->Log); }
    $this->log("====================================================");
    $this->log("  Installation Log ".date("Y-m-d H:i:s")."");
    $this->log("====================================================");
    $this->log("\n");

    // Verify if alreay installed
    if($this->isInstall()){
      $this->log("Application is already installed!");
      $this->error($settings);
    }

    // Clear current settings
    $this->Settings = [];

    // Validate Form and Prepare Settings
    if(isset($settings['password'])){
      // Set Password
      $this->Settings['password'] = $settings['password'];
      $this->Settings['password'] = password_hash($this->Settings['password'], PASSWORD_BCRYPT, ['cost' => 10]);
      $this->log("Password Set!");
    } else {
      $this->log("No password provided!");
      $this->error($settings);
    }
    if(isset($settings['language'])){
      // Set Language
      $this->Settings['language'] = $settings['language'];
      $this->log("Language Set!");
    } else {
      $this->log("No language provided!");
      $this->error($settings);
    }
    if(isset($settings['timezone'])){
      // Set Timezone
      $this->Settings['timezone'] = $settings['timezone'];
      date_default_timezone_set($this->Settings['timezone']);
      $this->log("Timezone Set!");
    } else {
      $this->log("No timezone provided!");
      $this->error($settings);
    }

    // Saving Settings
    if($this->set()){
      $this->log("Installation has completed successfully at ".date("Y-m-d H:i:s")."!");
    } else {
      $this->log("Unable to complete the installation");
      $this->error($settings);
    }
  }

  private function error($settings = []){
    // Log Settings Array
    $this->log(json_encode($settings, JSON_PRETTY_PRINT));
    exit();
  }

  private function log($txt){
    return file_put_contents($this->Log, $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
  }
}

$API = new Installer;
if(isset($_POST) && !empty($_POST)){
  $API->install($_POST);
}
