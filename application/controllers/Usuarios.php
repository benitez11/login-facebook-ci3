<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("M_usuarios");

  	if( !$this->_logeado() ):      
        redirect('login/admin');
      endif;
				
	}

	public function index() 
	{		
		$usuarios = $this->M_usuarios->get_usuarios();
    $catRol   = $this->M_usuarios->getCatrol();
    $user_profile = $this->session->userdata('user_profile');

		$this->template->loadContent("usuarios/sv_usuarios.php", array(
			"usuarios"     => $usuarios,			
      "catRol"       => $catRol,
      "user_profile" => $user_profile
			)
		);
	}

	public function nuevoUsuario() 
	   {
        $result  = array();  		

        $errores = $this->validaDatos($_POST);
        
        if ( count ($errores) > 0 ):        
        	echo json_encode(array(
	                "status" => false,
                	"errors" => $errores
	            ));
        	 return false;	
       else:  
       		if($_POST['action']=="updateUsuario"){
   			    $userData = $_POST['userData'];
   			  	$currInfo = $this->M_usuarios->get_user_by_id($_POST['userId']);	
   			 	//print_r($currInfo);	 
   			 	// print_r($userData);	         
		        $userInfo = array();
		        
		        foreach ($currInfo as $_row) {		        				        
			        
			        if ( $_row->nombre != $userData['nombres'] )
			            $userInfo['nombre'] = $userData['nombres'];

			        if ( $_row->apellidos != $userData['paterno'] )
			            $userInfo['apellidos'] = $userData['paterno'];

			        if ( $_row->email != $userData['email'] )
			            $userInfo['email'] = $userData['email'];

			        if (  trim($userData['password'])!="" )
			            $userInfo['password'] = md5($userData['password']);

			        if ( $_row->rol_id != $userData['selectRol'] )
			            $userInfo['rol_id'] = $userData['selectRol'];			         
		        }

		        if ( count($userInfo) > 0 ){
			            $this->M_usuarios->update_user($userInfo, $_POST['userId']);		     
			        }		     
       		}  
       		else {
       				$this->M_usuarios->m_nuevoUsuario($_POST['userData']);	         	
       			}	         	

         	echo json_encode(array(
		                "status" => true
		            ));
        	return true;	
                        
        endif;
       
    }

	 private function validaDatos($data)
    {
        $id     = $data['fieldId'];  
        $user   = $data['userData'];      
        $errors = array();       
                
        if( $this->campoVacio($user['email']) )
            $errors[] = array( 
                "id"    => $id['email'],
                "msg"   => 'Email es Requerido' 
            );
       
        // if( $this->campoVacio($user['password']) )
        //     $errors[] = array( 
        //         "id"    => $id['password'],
        //         "msg"   => 'Password es Requerido'
        //     );
        
        if( $this->campoVacio($user['nombres']) )
            $errors[] = array( 
                "id"    => $id['nombres'],
                "msg"   => 'Nombre(s) es Requerido'
            );
                
        // if($user['password'] != $user['cpassword'])
        //     $errors[] = array( 
        //         "id"    => $id['cpassword'],
        //         "msg"   => 'No coincide en password'
        //     );                      
        
        return $errors;
    }


      private function campoVacio($in) {
        if ( is_array($in) )
            return empty($in);
        elseif ( $in == '' )
            return true;
        else
            return false;
    }

   public function getUsuariobyId()
   {

   	$userId = (int) $this->input->post("userId", true);

    $result = $this->M_usuarios->get_user_by_id($userId);
    
     echo json_encode($result);
  	 return true;	
   }
    
   public function _logeado() {
        if($this->session->userdata('usuario_id') == null)
          return false;
                
        return true;        
    }

}

?>