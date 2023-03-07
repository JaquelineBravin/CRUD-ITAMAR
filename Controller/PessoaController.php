<?php

//processa cada requisição do usuário

class PessoaController {

    //cada método/função processa uma rota, devolve algo
    //public:
    //static:

    //a index() vai devolver a listagem
    public static function index() {
        include 'Model/PessoaModel.php';

        //a variavel model está disponivel em lista de pessoas
        $model = new PessoaModel();
        //ela é um obj e contem uma propriedade chamada rows que tem a listagem de todas as pessoas
        $model->getAllRows();

        include 'View/Modules/Pessoa/ListaPessoa.php';
    }

    //devolve formulário
    public static function form() {
        include 'Model/PessoaModel.php';
        
        $model = new PessoaModel();

        if(isset($_GET['id']))
            $model = $model->getById((int)$_GET['id']);

        include "View/Modules/Pessoa/FormPessoa.php";
    }

    public static function save() {
        include 'Model/PessoaModel.php';

        //criar um novo objeto que vai transportar os dados da view até pessoaBD
        $model = new PessoaModel();

        //pegar todas as informações dentro desse  e preencher
        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->email = $_POST['email'];

        $model->save();

        //redirecionar a localização para /pessoa
        header("Location: /pessoa");
    }

    public static function delete() {
        include 'Model/PessoaModel.php';
        $model = new PessoaModel();
        $model->delete((int) $_GET['id']);
        header("Location: /pessoa");
    }


}