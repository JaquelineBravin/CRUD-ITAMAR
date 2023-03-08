<?php

//Busca informações no banco de dados
class PessoaModel {
    public $id, $nome, $email;

    public $rows;
    
    //vou chamar o arquivo de PessoaBD e vou passar todos os dados direto a esse metodo
    public function save() {
        include 'BD/PessoaBD.php';

        //para conectar no banco de dados
        $bd = new PessoaBD();

        //vai pegar todos os dados preenchidos da pessoaBD atraves do $this e jogar pro insert ou update
        //se id tiver vazia, faz o insert, senão faz o update
        if(empty($this->id)) {
            $bd->insert($this);
        } else {
            $bd->update($this);
        }

    }

    //vai pegar todas as linhas da tabela pessoa
    public function getAllRows() {
        include 'BD/PessoaBD.php';
        //conectei com o BD
        $bd = new PessoaBD();

        //peguei todas as linhas vindas do banco com o select() e guardei elas na variavel $rows
        $this->rows = $bd->select();
    }

    //função para buscar alguém pelo ID
    public function getById(int $id) {
        include 'BD/PessoaBD.php';
        $bd = new PessoaBD();

        //se ele encontrou algum id, ele vai retornar o obj
        $obj = $bd->selectById($id);
        //se xiste, retorna, caso contrario, cria nova pessoamodel
        //se $obj for diferente de falso, retorne $obj, caso contrário, retorne new pessoaModel
        return ($obj) ? $obj : new PessoaModel();
    }

    public function delete(int $id) {
        include 'BD/PessoaBD.php';
        $bd = new PessoaBD();
        $bd->delete($id);
    }
}