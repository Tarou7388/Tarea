<?php
require_once '../models/Productores.php';

if (isset($_GET['operacion'])) {
  $Productores = new Productores();
  if($_GET['operacion']=='searchListar'){
    $resultado = $Productores->searchListar();
    echo json_encode($resultado);
  }
  if($_GET['operacion']=='searchAll'){
    $resultado = $Productores->searchAll(["idpublisher" => $_GET['idpublisher']]);
    echo json_encode($resultado);
  }
  
}
if (isset($_POST['operacion'])) {
  $Productores = new Productores();
  
}