<?php

class M_login extends CI_Model 
{

	public function __construct()
    {
        parent::__construct();
     
    }


   public function m_registro_ensocial($provider, $id)
   {
   		$this->db
                ->select('id, usuario_id, provider, provider_id, creado')
                ->from('semaforo_social_logins')                
                ->where('provider',  $provider)
                ->where('provider_id', $id);
        ;
        
        $query = $this->db->get();
        return $query->result();
   }


    public function m_registro_ennormal($email)
   {
   		$this->db
                ->select('*')
                ->from('semaforo_usuarios')                                
                ->where('email', $email);
        ;
        
        $query = $this->db->get();
        return $query->result();
   }


   public function m_insertaSocial($userId, $provider, $providerId)
   {
   	  $this->db
                ->set('usuario_id', $userId)
                ->set('provider', $provider)
                ->set('provider_id', $providerId) 
                ->set('creado', date('Y-m-d H:i:s'));
                
       $this->db->insert('semaforo_social_logins');

      return true;
   }

      public function m_insertanormal($user)
   {
   
      //echo 'id: '.$user['data']['id'];
   	  $this->db
                ->set('nombre', $user['first_name'] == null ? '' : $user['first_name'])
                ->set('apellidos', $user['last_name'] == null ? '' : $user['last_name'])
                ->set('email', $user['email'])
                ->set('password', $this->hashPassword(hash('sha512', $this->randomPassword()))) 
                ->set('confirmado', 'Y')
                ->set('fecha_registro', date('Y-m-d H:i:s'));
                
       $this->db->insert('semaforo_usuarios');

       return $this->db->insert_id();        
   }


        public function hashPassword($password)
     {    
        $salt = "$2a$" . PASSWORD_BCRYPT_COST . "$" . PASSWORD_SALT;
        
        if(PASSWORD_ENCRYPTION == "bcrypt") {
            $newPassword = crypt($password, $salt);
        }
        else {
            $newPassword = $password;
            for($i=0; $i<PASSWORD_SHA512_ITERATIONS; $i++)
                $newPassword = hash('sha512',$salt.$newPassword.$salt);
        }
        
        return $newPassword;
     }

     public function randomPassword($length = 7)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function updatelogin($usuario_id)
    {
        $this->db
                ->set('last_login', date("Y-m-d H:i:s"))               
                ->where('usuario_id', $usuario_id);                
         $this->db->update('semaforo_usuarios');

       return true;
    }


    public function getUserByEmail($email) 
    {
      return $this->db->select("usuario_id, password, email")
      ->where("email", $email)->get("semaforo_usuarios");
    }


}

?>