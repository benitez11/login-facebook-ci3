<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Error404 extends CI_Controller { 
	
   public function index(){   	
   	$this->template->set_layout("temas/error404.php"); 
   	$this->template->loadContent("admin/sv_dashboard", array());  	
   	
      //echo 'Error 404_____>. Usted está intentando acceder a una página que no existe.';
	  //echo 'Error 404_____>. Usted está intentando acceder a una página que no existe.';
	  //echo 'Error 404_____>. Usted está intentando acceder a una página que no existe.';	  
   
   
   }

}
