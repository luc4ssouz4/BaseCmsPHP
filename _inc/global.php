<?php
//IMPORT CONFIG
include_once("_inc/config.php");

// CONEXAO PDO
if(_CONFIG["DB_PDO"]):
try {
    $conn = new PDO("mysql:host="._CONFIG["DB_SERVER"].";dbname="._CONFIG["DB_NAME"], _CONFIG["DB_USER"], _CONFIG["DB_PASS"]);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
      die('ERROR: ' . $e->getMessage());
  }
endif;

// FUNCAO ROTAS API
if(isset($_GET['api'])):
    header('Content-Type: application/json; charset=utf-8');
    $pageNameAjax = $_GET['api'];
    
    if(file_exists("_api/{$pageNameAjax}.php"))
    include_once("_api/{$pageNameAjax}.php");    

    die();
endif;

// FUNCAO ROTAS
if(isset($_GET['page'])):
    $pageName = $_GET['page'];

    // VERIFICAR ROTA EXISTENTE
    if(!file_exists("_pages/{$pageName}.php"))
    $pageName = 404;

    //IMPORT HEADER PARA TODAS AS ROTAS
    include_once("_pages/_parts/header.php");
    // IMPORTAR ROTA
    include_once("_pages/{$pageName}.php");
    //IMPORT FOOTER PARA TODAS AS ROTAS
    include_once("_pages/_parts/footer.php");

endif;

?>