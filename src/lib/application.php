<?php

// Import Librairies
require_once dirname(__FILE__,3) . '/src/lib/api.php';

class Application extends API{

  public function __construct(){
    parent::__construct();
  }

	public function start(){
		require_once dirname(__FILE__,3) . '/src/templates/template.php';
	}
}
