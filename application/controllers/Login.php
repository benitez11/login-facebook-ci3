<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("M_login"); 
	}

	public function index()
	{	
		if( $this->_logeado() ):			
			redirect('login/admin');
		endif;
				
		if ($this->facebook->logged_in()):		
			redirect('login/login_fb');		
		else:
			$contents['link'] = $this->facebook->login_url();								
			$this->template->set_layout("temas/login_tema.php");	
			$this->template->loadContent("login/sv_login", $contents);
		endif;		
	}



	public function login_fb()
	{				
		if( $this->_logeado() ):
			redirect('login/admin/');
		endif;
				
		if ($this->facebook->logged_in())
		{
			$user = $this->facebook->user();
			
			if ($user['code'] === 200)
			{		
				$regsocial=$this->registro_ensocial('facebook',  $user['data']['id'] );

				if (count($regsocial)>0): //ya esta registrado en social					
					$this->session->set_userdata('usuario_id',$regsocial[0]->usuario_id);
					$this->M_login->updatelogin($regsocial[0]->usuario_id );															
				else:
					$regnormal=$this->registro_ennormal($user['data']['email']);				
					if (count($regnormal)>0): //ya esta registrado normal
						$this->insertaSocial($regnormal[0]->usuario_id, 'facebook', $user['data']['id'] );						
						$this->session->set_userdata('usuario_id',$regnormal[0]->usuario_id);						
					else:						
						$lastusuario_id = $this->M_login->m_insertanormal($user['data']);
						$this->insertaSocial($lastusuario_id, 'facebook', $user['data']['id'] );
						$this->session->set_userdata('usuario_id',$lastusuario_id);																		
					endif;	                                                                 	                        	                 		                                   
				endif;

				$this->session->set_userdata('email',$user['data']['email']);
				$this->session->set_userdata('user_profile',$user['data']);
				redirect('login/admin'); 						    
			}

		}		
		 else {	
			$contents['link'] = $this->facebook->login_url();				
			$this->load->view('login/sv_login',$contents);			
		}

	}
	
	public function admin()
	{	
		if( !$this->_logeado() ):			
			redirect('login');
		endif;
		
		$contents['user_profile'] = $this->session->userdata('user_profile');
		$this->template->set_layout("temas/principal_tema.php");	
		$this->template->loadContent("admin/sv_dashboard", $contents);
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('');
		
	}


	public function _logeado() {
        if($this->session->userdata('usuario_id') == null)
        	return false;
                
        return true;        
    }



      public function registro_ensocial($provider, $id) 
    {
    	return  $this->M_login->m_registro_ensocial($provider, $id);               
    }

     public function registro_ennormal($email) 
    {
    	return  $this->M_login->m_registro_ennormal($email);               
    }

      public function insertaSocial($userId, $provider, $providerId) 
    {
        $this->M_login->m_insertaSocial($userId, $provider, $providerId);
    }


    public function valida() 
	{		
		if($this->_logeado() ):			
			echo json_encode(array(
			                'login_success' => true,
			                'mensaje' 		=> "Bienvenido"
			            ));
				return true;
		endif;
		
		$email = trim(strtolower($this->input->post("email", true)));
		$pass  = trim($this->common->nohtml($this->input->post("pass", true)));
		$login = $this->M_login->getUserByEmail($email);
		

		if ($login->num_rows() == 0) {		
			echo json_encode(array(
	                'login_success' => false,
	                'mensaje' 		=> "El correo no existe o esta inactivo."
	            ));
	       return false;	
		}
		else{		
				$r = $login->row();
				$userid = $r->usuario_id;
							
		    	if (md5($pass)!=$r->password) {
		    		echo json_encode(array(
			                'login_success' => false,
			                'mensaje' 		=> "Password Incorrecto"
			            ));
			       return false;
		    	}
		    	else
		    	{
		    		$this->session->set_userdata('email',$r->email);
					$this->session->set_userdata('usuario_id',$r->usuario_id);
		    		
					echo json_encode(array(
			                'login_success' => true,
			                'mensaje' 		=> "Bienvenido"
			            ));

					return true;
		    	}

    		}
	
	}

}
