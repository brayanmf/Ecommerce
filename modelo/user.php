<?php
class UsuarioData {
    private $db;
   

    public function __construct()
    { 
		  require_once './admin/modelo/conexion.php';
        $this->db=conectar::Conexiones();
		$this->user_name="";
		$this->email="";
		$this->password="";
		$this->passf="";
		$this->token="";
		$this->verfied=false;
		$this->status="";
		$this->direccion="";
	
 
    }



public function login(){


	$f=$this->db->prepare("SELECT * FROM clientes WHERE email=:e OR username=:ea ");

	$f->bindParam(':e',$this->user_name);
	$f->bindParam(':ea',$this->user_name);
	$f->execute();
	$a=$f->fetch(PDO::FETCH_ASSOC);
	return $a;
	
	}


public function valueE($a){
	if($a==1){
	$f=$this->db->prepare("SELECT * FROM clientes WHERE email=:email LIMIT 1");
	$f->bindParam(':email',$this->email);
	$f->execute();
	$n=$f->rowCount();
	return $n;
	}else{

		$f=$this->db->prepare("SELECT * FROM clientes WHERE email=:email LIMIT 1");
	
		$f->bindParam(':email',$this->email);
		$f->execute();
		$a=$f->fetch(PDO::FETCH_ASSOC);
		return $a;
	}


	}

public  function insertU()
	{
		$this->password=password_hash($this->password,PASSWORD_DEFAULT);
		$this->token=bin2hex(random_bytes(10));
		$f=$this->db->prepare("INSERT INTO clientes (username,email,verified,token,password,direccion)VALUES(:user,:email,:verfied,:token,:clave,:direc)");

		$f->bindParam(':user',$this->user_name);
		$f->bindParam(':email',$this->email);
		$f->bindParam(':verfied',$this->verfied);
		$f->bindParam(':token',$this->token);
		$f->bindParam(':clave',$this->password);
		$f->bindParam(':direc',$this->direccion);
		$a=$f->execute();
		return $a;
	}


	public function GetU(){
		$f=$this->db->prepare("SELECT * FROM clientes  ORDER BY id DESC limit 1");//asegurarnos de que sea el ultimo

	
		$f->execute();
		$a=$f->fetch(PDO::FETCH_ASSOC);
		return $a;
	}
	public function actualizarp($a,$b){
		$f=$this->db->prepare("UPDATE clientes SET password='$a' WHERE email='$b'");
		$f->execute();
		return $f;
	}



	public function verificar($a,$b){
		if ($b==1){
		$f=$this->db->prepare("SELECT * FROM clientes WHERE token='$a' LIMIT 1");
		$f->execute();
		
		return $f;
	}else{

		$f=$this->db->prepare("UPDATE clientes SET verified=1 WHERE token='$a'");
		$a=$f->execute();
		return $a;

		

	}
	}
	public function getstatus($a){
		$f=$this->db->prepare("SELECT status FROM clientes WHERE id=$a");
		$f->execute();
		$C=$f->fetch(PDO::FETCH_ASSOC);
		return $C;
	
	}
	public function setstatus($a){

  
		$f=$this->db->prepare("UPDATE clientes SET status=:a WHERE id=$a");
		$f->bindParam(':a',$this->status);
		$f->execute();
	}
	public function update($a){
        $f=$this->db->prepare("UPDATE clientes set username=:a,email=:b,direccion=:c WHERE id=$a");
        $f->bindParam(':a',$this->user_name);
        $f->bindParam(':b',$this->email);
		$f->bindParam(':c',$this->direccion);
        $a=$f->execute();
		return $a;
    }
	public function getuser($a){
		$f=$this->db->prepare("SELECT username,email,direccion FROM clientes WHERE id=$a");
		$f->execute();
		$C=$f->fetch(PDO::FETCH_ASSOC);
		return $C;
	
	}
	

}




?>
