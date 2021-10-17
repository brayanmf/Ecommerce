<?php
class mercado {
    private $db;

    public function __construct(){
        require_once './admin/modelo/conexion.php';
        $this->db=conectar::Conexiones();
        $this->aux="";
        $this->limit="";
        $this->id="";
        $this->idp="";

    }

    public function getmercadovender(){/*el grupo by puede ser para categorias("se tendria qeu agreagar una tabla") asi el fltro seria mas elegenate :]*/
        $f=$this->db->prepare("SELECT p.id,p.nombre,p.precio,p.existencia,f.webpath FROM productos AS p INNER JOIN productos_file AS pf ON pf.id_producto=p.id INNER JOIN files AS f ON f.id=pf.id_files ".$this->aux." GROUP BY p.id ".$this->limit."");
        $f->execute();
        $a=$f->fetchAll(PDO::FETCH_ASSOC);/*2 inner por que se relacionan 3 trablas por el ide  */
        return $a;
    }
    public function getmercadocount(){
    $f=$this->db->prepare("SELECT COUNT(*) as cuenta FROM productos  ");
    $f->execute();        
    $a=$f->fetch(PDO::FETCH_ASSOC);/*2 inner por que se relacionan 3 trablas por el ide  */
    return $a;
    }
    public function getmercadoprod($a){
        $f=$this->db->prepare("SELECT * FROM productos  WHERE id=$a ");
        $f->execute();        
        $a=$f->fetch(PDO::FETCH_ASSOC);
        return $a;
    }

    public function getimg($b){
            $a1=$this->db->prepare("SELECT f.id,f.webpath FROM productos AS p INNER JOIN productos_file AS pf ON pf.id_producto=p.id INNER JOIN files AS f ON f.id=pf.id_files WHERE P.id=$b");/*traes lo que queiras de 2 tablas relacionadas */
            $a1->execute();/*webpath es mjor para las img */
            $a=$a1->fetchAll(PDO::FETCH_ASSOC);
            return $a;
    
    }
    public function insertventas(){
        $a1=$this->db->prepare("INSERT INTO ventas (idClie,idpago,fecha)VALUES(:a,:d,now())");
        $a1->bindParam(':a',$this->id);
        $a1->bindParam(':d',$this->idp);
        $b2=$a1->execute();
       return $b2;
     
    }
  



}