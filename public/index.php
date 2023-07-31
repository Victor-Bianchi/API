<?php
    
    ###########
    ##  API  ##
    ###########

    #   Objetivo: criar uma API aberta que forneça funções de CRUD onde o usuário tem opções de:
    # - Ver todos os produtos cadastrados usando o GET
    # - Adicionar novos produtos via POST
    # - Remover um item da lista via DEL
    # - Alterar dados do item da lista via PUT

    use App\MySQL;

    require_once '../vendor/autoload.php';

    $url = isset($_GET['url']) ? explode('/', $_GET['url']) : '';
    
    if(is_array($url)) {
        if($url[0] == 'produtos') {
            echo "Produtos!";
        } else {
            die('Operação de API inválida, cheque a documentação');
        }
    } else {
        die();
    }
?>