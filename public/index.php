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
    $method = $_SERVER['REQUEST_METHOD'];
    
    if(is_array($url)) {
        if($url[0] == 'produtos') {
            switch ($method) {
                case 'GET':
                    $sql = MySQL::connect()->prepare('SELECT * FROM `produtos`');
                    $sql->execute();
                    $data = $sql->fetchAll(PDO::FETCH_ASSOC);
                    echo json_encode($data);
                    break;
                case 'POST':
                    $nome = $_POST['name'];
                    $marca = $_POST['brand'];
                    $preco = $_POST['price'];
                    $sql = MySQL::connect()->prepare('INSERT INTO `produtos` (`nome`, `marca`, `valor`) VALUES (?, ?, ?)');
                    $sql->execute([$nome, $marca, $preco]);
                    echo json_encode(['response'=>'ok']);
                    break;
                case 'PUT':
                    # alterar dados no db
                    echo "PUT";
                    break;
                case 'DELETE':
                    # excluir dados do db
                    echo "DEL";
                    break;
                default:
                    die('ERRO: operação não suportada, cheque a documentação');
            }
        } else {
            die('Operação de API inválida, cheque a documentação');
        }
    } else {
        die();
    }
?>