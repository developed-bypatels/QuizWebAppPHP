<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();
    $this->TPL['isActive'] = "about";
    // Your own constructor code
  }

  public function index()
  {
    $this->template->show('about', $this->TPL);
  }
}
