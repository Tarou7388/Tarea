<?php
require_once '../models/Productores.php';

if (isset($_GET['operacion'])) {
  $Productores = new Productores();
  if($_GET['operacion']== 'searchListar'){
    $resultado = $Productores->searchListar();
    echo json_encode($resultado);
  }
  if($_GET['operacion']== 'searchAll'){
    $resultado = $Productores->searchAll(["idpublisher" => $_GET['idpublisher']]);
    echo json_encode($resultado);
  }
  if($_GET['operacion'] == 'searchListarAlienacion'){
    $resultado = $Productores->searchListarAlienacion(["idpublisher" => $_GET['idpublisher']]);
    echo json_encode($resultado);
  }
  if($_GET['operacion'] == 'searchListarCantidad'){
    $resultado = $Productores->searchListarCantidad(["idpublisher" => $_GET['idpublisher']]);
    echo json_encode($resultado);
  }
}
?>