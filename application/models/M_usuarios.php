<?php

class M_usuarios extends CI_Model 
{

	public function get_usuarios() 
	{
		$this->db->select('u.usuario_id, u.nombre, u.apellidos, u.email,
                     u.confirmado, u.banned, u.fecha_registro,  r.rol_id, r.rol as rol')
                ->from('semaforo_usuarios AS u')
                ->join('cat_rol AS r', 'u.rol_id=r.rol_id')                    
                ->order_by('u.usuario_id', 'desc');        
      
      $query = $this->db->get();
      return $query->result();
	}

	public function getCatrol()
	{
		$this->db->select('rol_id, rol')
                ->from('cat_rol');
                      
      $query = $this->db->get();
      return $query->result();
	}

	public function get_user_by_id($usuario_id) 
	{
		$this->db
                ->select('*')
                ->from('semaforo_usuarios')                
                ->where('usuario_id', $usuario_id);
        ;
        
        $query = $this->db->get();
        return $query->result();        
        
	}


	public function m_nuevoUsuario($data)
    {                     
       $this->db->insert("semaforo_usuarios", 
			array(
				"email"       => $data['email'],				
				"nombre"      => $data['nombres'], 
				"apellidos"   => $data['paterno'],
				"password"    => md5($data['password']),
				"rol_id"     => $data['selectRol'], 				
				"confirmado" => "Y",
				"fecha_registro" => date("Y m d")
			)
		);

		return $this->db->insert_id();     
    }

	public function update_user($data, $userid ) {    	
		$this->db->where("usuario_id", $userid)->update("semaforo_usuarios", $data);
	}


/***********************************************************************/

	
}

?>