<?php
class Producto {
    private $db;

    public function __construct(){
        require_once 'conexion.php';
        $this->db=conectar::Conexiones();
        $this->id="";
		$this->nombre="";
		$this->precio="";
		$this->existencia="";
        $this->detalle="";
        $this->carac="";
        /**--- */
        $this->size="";
        $this->filename="";
        $this->system_path="";
        $this->web_path="";

    }
  
  
 public function getidp(){


        $f=$this->db->prepare("SELECT TOP 2 id FROM productoss ORDER BY id DESC");   
        $f->execute();
        $a=$f->fetchAll(PDO::FETCH_ASSOC);/*para foreach trae los datos de golpe,ideal para pequeñas tablas poo lo usan comun mente */
        return $a;

 }


    public function getproduct(){

        $f=$this->db->prepare("SELECT * FROM productos");
   
        $f->execute();

        $a=$f->fetchAll(PDO::FETCH_ASSOC);/*para foreach trae los datos de golpe,ideal para pequeñas tablas poo lo usan comun mente */
        return $a;

    }
    public function getimg($b){
        $a1=$this->db->prepare("SELECT f.id,f.webpath,f.system_path FROM productos AS p INNER JOIN productos_file AS pf ON pf.id_producto=p.id INNER JOIN files AS f ON f.id=pf.id_files WHERE P.id=$b");/*traes lo que queiras de 2 tablas relacionadas */
        $a1->execute();/*webpath es mjor para las img */
        $a=$a1->fetchAll(PDO::FETCH_ASSOC);
        return $a;

    }
    public function deletei($a){
        $f=$this->db->prepare("DELETE FROM files WHERE id=$a");
        $f->execute();
        return $f;
    }
    public function getfilep(){
        $f=$this->db->prepare("SELECT * FROM productos_file WHERE id_producto=:a " );
        $f->bindParam(':a',$this->id);      
        $f->execute();
        $a=$f->fetchAll(PDO::FETCH_ASSOC);
        
    
    
        return $a;
    
    }

    public function createimg(){
        $a1=$this->db->prepare("INSERT INTO files (filesname,filesize,webpath,system_path)VALUES(:a,:d,:b,:c)");
   
        $a1->bindParam(':a',$this->filename);
        $a1->bindParam(':d',$this->size);
        $a1->bindParam(':b',$this->web_path);
        $a1->bindParam(':c',$this->system_path);
       $b2= $a1->execute();
       return $b2;

    }
    public function updatei($a){
        
        $f=$this->db->prepare("UPDATE files SET filesname=:a, filesize=:b,webpath=:c,system_path=:d WHERE id=$a");
        $f->bindParam(':a',$this->filename);
        $f->bindParam(':b',$this->size);
        $f->bindParam(':c',$this->web_path);
        $f->bindParam(':d',$this->system_path);
  
        $b2= $f->execute();
        return $b2;
    }

    public function createproduct(){
      
        $f=$this->db->prepare("INSERT INTO productos (nombre,precio,detalle,existencia,caracteristica)VALUES(:a,:b,:d,:c,:e)");
   
    
        $f->bindParam(':a',$this->nombre);
        $f->bindParam(':b',$this->precio);
        $f->bindParam(':d',$this->detalle);
        $f->bindParam(':c',$this->existencia);
        $f->bindParam(':e',$this->carac);
       $b1= $f->execute();
        return $b1;


    }
    public function editproduct(){/**token */
        $f=$this->db->prepare("SELECT * FROM productos WHERE id=:a");
        $f->bindParam(':a',$this->id);
        $f->execute();
        $a=$f->fetch(PDO::FETCH_ASSOC);
        return $a;
    }
    public function update(){
 
        $f=$this->db->prepare("UPDATE productos SET nombre=:nombre, precio=:precio,detalle=:detalle, existencia=:existencia,caracteristica=:e WHERE id=:a");
        $f->bindParam(':nombre',$this->nombre);
        $f->bindParam(':precio',$this->precio);
        $f->bindParam(':detalle',$this->detalle);
        $f->bindParam(':existencia',$this->existencia);
        $f->bindParam(':e',$this->carac);
        $f->bindParam(':a',$this->id);
        $a=$f->execute();
        return $a;

    }
    public function delete(){
        $f=$this->db->prepare("DELETE FROM productos WHERE id=:a");/*elimina la relacion padre ,obte por usar trigger */
        $f->bindParam(':a',$this->id);
        $f->execute();
        return $f;
    }
     
}

    ?>