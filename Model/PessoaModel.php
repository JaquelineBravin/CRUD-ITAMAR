<?php

class PessoaModel {
    public $id, $nome, $email;

    public $rows;
    
    //vou chamar o arquivo de PessoaBD e vou passar todos os dados direto a esse metodo
    public function save() {
        include 'BD/PessoaBD.php';

        //para conectar no banco de dados
        $bd = new PessoaBD();

        //vai pegar todos os dados preenchidos da pessoaBD atraves do $this e jogar pro insert ou update
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

        //peguei todas as linhas com o select() e guardei elas na variavel $rows
        $this->rows = $bd->select();
    }

    public function getById(int $id) {
        include 'BD/PessoaBD.php';
        $bd = new PessoaBD();

        $obj = $bd->selectById($id);

        return ($obj) ? $obj : new PessoaModel();
    }

    public function delete(int $id) {
        include 'BD/PessoaBD.php';
        $bd = new PessoaBD();
        $bd->delete($id);
    }
}