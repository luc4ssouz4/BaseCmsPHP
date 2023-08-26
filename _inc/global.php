<?php
//GLOBAL
DEFINE("_CONFIG", [
    "URL" => "http://localhost", // URL SITE

    // BASE SEM CONEXAO COM MYSQL
    /*"DB_SERVER" => "http://localhost",    
    "DB_USER" => "",
    "DB_PASS" => "",
    "DB_NAME" => ""*/
]);

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