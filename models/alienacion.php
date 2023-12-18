<?php
require_once 'Conexion.php';

class Alienacion extends Conexion{

  //Este objeto almacena la conexion y se la dacilita a todos los metodos
  private $pdo;

  //almacenar la conexion en el objeto
  public function __CONSTRUCT(){
    $this->pdo = parent::getConexion();
  }
  public function searchAll($data=[]){
    try{
      $consulta = $this->pdo->prepare("CALL spu_tabla_publicacion_superheroes(?)");
      $consulta->execute(
        array($data['idpublisher'])
      );
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}