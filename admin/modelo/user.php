
<?php

class Usuario {
    private $db;

    public function __construct(){
        require_once 'conexion.php';
        $this->db=conectar::Conexiones();
		$this->email="";
		$this->password="";
		$this->nombre="";
        $this->foto="";
        $this->id="";
        $this->status="";
        
    }

 /*usuarios where email=:e and pass=:ea"*/
    public function getdata1(){
            $f=$this->db->prepare("SELECT * FROM usuarios WHERE email=:email LIMIT 1" );
            $f->bindParam(':email',$this->email);      
            $f->execute();
		    $a=$f->fetch(PDO::FETCH_ASSOC);
            
   

            return $a;

        }
public function getstatus($a){
    $f=$this->db->prepare("SELECT status FROM usuarios WHERE id=$a");
    $f->execute();
    $C=$f->fetch(PDO::FETCH_ASSOC);
    return $C;

}


 public function setstatus($a){

  
    $f=$this->db->prepare("UPDATE usuarios SET status=:a WHERE id=$a");
    $f->bindParam(':a',$this->status);
    $f->execute();
    

  

}



        public function getdataU(){

            $f=$this->db->prepare("SELECT id,nombre,email FROM usuarios");
            $f->execute();
            $a=$f->fetchAll(PDO::FETCH_ASSOC);/*para foreach trae los datos de golpe,ideal para pequeñas tablas poo lo usan comun mente */
            return $a;
    
        }
        public function createuser(){
            $this->password=password_hash($this->password,PASSWORD_DEFAULT);
            
            $f=$this->db->prepare("INSERT INTO usuarios (nombre,email,pass)VALUES(:user,:email,:pass)");
    
            $f->bindParam(':user',$this->nombre);
            $f->bindParam(':email',$this->email);
            $f->bindParam(':pass',$this->password);
            $a=$f->execute();
            return $a;
        }
        public function edituser(){
            $f=$this->db->prepare("SELECT id,email,pass,nombre FROM usuarios WHERE id=:a");
            $f->bindParam(':a',$this->id);
            $f->execute();
            $a=$f->fetch(PDO::FETCH_ASSOC);
            return $a;
        }
        public function update(){
            $this->password=password_hash($this->password,PASSWORD_DEFAULT);
            $f=$this->db->prepare("UPDATE usuarios SET email=:email, pass=:pass, nombre=:nombre WHERE id=:a");
            $f->bindParam(':email',$this->email);
            $f->bindParam(':pass',$this->password);
            $f->bindParam(':nombre',$this->nombre);
            $f->bindParam(':a',$this->id);
            $a=$f->execute();
            return $a;

        }
        public function delete(){
            $f=$this->db->prepare("DELETE FROM usuarios WHERE id=:a");
            $f->bindParam(':a',$this->id);
            $f->execute();
            return $f;

        }
}
?>
