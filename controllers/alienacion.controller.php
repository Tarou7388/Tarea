<?php
require_once '../models/alienacion.php';
if(isset($_GET['operacion'])){

  $Alienacion = new Alienacion();

  if ($_GET['operacion'] == 'search'){
    echo json_encode($Alienacion->search());
  }
}