<?php
require_once 'Conexion.php';

class Productores extends Conexion{

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
  public function searchListar(){
    try{
      $consulta = $this->pdo->prepare("CALL spu_listar_productores()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  public function searchListarAlienacion($data=[]){
    try{
      $consulta = $this->pdo->prepare("CALL spu_resumen_alienacion_productor(?)");
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

/* $Productores = new Productores();
$registro = $Productores->searchListarAlienacion(["idpublisher" => 4]);
echo json_encode($registro); */