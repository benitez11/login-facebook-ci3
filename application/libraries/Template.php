<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Template
{

	var $cssincludes;
	var $sidebar;
	var $responsive_sidebar;
	var $layout = "temas/principal_tema.php";
	var $data = array();
	var $error_layout = 0;
	var $error_view = "error/error.php";

	public function loadContent($view,$data=array(),$die=0)
	{
		$CI =& get_instance();
		$site = array();
		$site['cssincludes'] = $this->cssincludes;
		foreach($this->data as $k=>$v) {
			$site[$k] = $v;
		}
		foreach($this->data as $k=>$v) {
			$data[$k] = $v;
		}
		$site['content'] = $CI->load->view($view,$data,true);
		if($this->sidebar) {
			$site['sidebar'] = $CI->load->view($this->sidebar,$data,true);
		}
		if($this->responsive_sidebar) {
			$site['responsive_sidebar'] = $CI->load
				->view($this->responsive_sidebar,$data,true);
		}
		$CI->load->view($this->layout, $site);
		if($die) die($CI->output->get_output());
	}

	public function loadAjax($view,$data=array(),$die=0) 
	{
		$CI =& get_instance();
		$site = array();
		$site['cssincludes'] = $this->cssincludes;
		$CI->load->view($view,$data);
		if($die) die($CI->output->get_output());
	}

	public function loadSidebar($view) 
	{
		$this->sidebar = $view;
	}

	public function loadResponsiveSidebar($view) 
	{
		$this->responsive_sidebar = $view;
	}

	public function set_error_layout($error) 
	{
		$this->error_layout = $error;
	}

	public function set_error_view($view) 
	{
		$this->error_view = $view;
	}

	public function set_layout($view) 
	{
		$this->layout = $view;
	}

	public function loadData($key, $data) 
	{
		$this->data[$key] = $data;
	}

	public function loadExternal($code) 
	{
		$this->cssincludes = $code;
	}

	public function error($message) 
	{
		if(!$this->error_layout) {
			$this->loadContent($this->error_view,array(
				"message" => $message),1);
		} else {
			$this->loadContent($this->error_view,array(
				"message" => $message),1);
		}
	}

	public function errori($msg) 
	{
		echo "ERROR: " . $msg;
		exit();
	}

}

?>
