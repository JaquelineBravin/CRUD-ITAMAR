<?php

include 'Controller/PessoaController.php';

//a parse url vai receber dois parametros. 
//primeiro: a url que o usuario está tentando acessar
//segundo: um parametro de configuração, que é 'o que eu quero pegar da url?', que vai ser o caminho ue usuario está tentando acessar, através de rotas
//atraves do REQUEST_URI consigo detectar o que o usuário quer acessar
//a parse url vai extrair o que tem depois da barra, para isso tem o switch case. 
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url) {
    case '/':
        header("location: View/Modules/Pessoa/index.php");
    break;
        //a camada controller processa a requisição, então se o usuário requisitou a rota /pessoa, tenho que chamar ela através da controller
    case '/pessoa':
        PessoaController::index();
    break;

    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/form/save':
        PessoaController::save();
    break;

    case '/pessoa/delete':
        PessoaController::delete();
    break;

    default:
    echo "Erro ao selecionar página";
    break;
}