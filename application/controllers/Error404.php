<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Error404 extends CI_Controller { 
	
   public function index(){   
   
   	$this->template->set_layout("temas/error404.php"); 

   	$this->template->loadContent("admin/sv_dashboard", array());  	   	

   }

}
