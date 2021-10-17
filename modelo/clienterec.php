<?php 
class clienterec {


    public function __construct()
    { 
		  require_once './admin/modelo/conexion.php';
        $this->db=conectar::Conexiones();
		$this->nombre="";
		$this->email="";
		$this->direccion="";
		$this->idCli="";

    }
    public  function insertrec()
	{

		/*$z=$this->db->prepare("SELECT max(id) as id FROM recibe LIMIT 1");
		$z->execute();
		$a1=$z->fetch(PDO::FETCH_ASSOC); por el momento solo insertamos */
		
		$f=$this->db->prepare("INSERT INTO recibe (idCli,nombre,email,direccion)VALUES(:a,:b,:c,:d) ON DUPLICATE KEY UPDATE nombre=:b,email=:c,direccion=:d");/* si se duplica idcli insertar */
		/*$f->bindParam(':a1',$a1['id']);*/
		$f->bindParam(':a',$this->idCli);
		$f->bindParam(':b',$this->nombre);
		$f->bindParam(':c',$this->email);
		$f->bindParam(':d',$this->direccion);

		$a=$f->execute();
		return $a;
	}
	public function getrec($a){
		$f=$this->db->prepare("SELECT nombre,email,direccion FROM recibe WHERE idCli=$a");
		$f->execute();
		$C=$f->fetch(PDO::FETCH_ASSOC);
		return $C;
	
	}

	
	
}
?>