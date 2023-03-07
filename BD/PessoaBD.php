<?php 
//aqui fica todo o acesso com o banco de dados

//cada vez que eu criaar um pbjeto do tipo PessoaBD, vou estar chamando o metodo contrutor
class PessoaBD {
    //armazena o link de conexão com o Banco de dados
    private $conexao;


    //o método construtor serve para quando queremos executar algo quando a classe é chamada. 
    //como é uma classe que faz acesso ao banco, esse algo que vamos executar é o acesso ao banco
    //então toda vez que a classe for chamada, já faço conexão com o banco de dados
    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=cruditamar";
        //conexao é uma variavel local do construtor
        //a conexão é aberta via PDO, que é um recurso da linguagem para diversos SGBD
        //para acessar como uma propriedade da classe, preciso do $this
        $this->conexao = new PDO($dsn, 'root', '');
    }

    //delcarar que ele vai receber os dados da model atraves da $model
    public function insert(PessoaModel $model) {

        //a string mysql vai ser processada pelo metodo prepare
        //os values vou substituir com valores
        $sql = $this->conexao->prepare("INSERT INTO pessoa (nome, email) VALUES (:n, :e)");

        //nome e email vou pegar o que eu preenchi la no formulario
        $sql->bindValue(":n", $model->nome);
        $sql->bindValue(":e", $model->email);

        //mando salvar no banco de dados
        $sql->execute(); 
    }
 
    public function update(PessoaModel $model) {
        $sql = $this->conexao->prepare("UPDATE pessoa SET nome=:n, email=:e WHERE id=:i");
        $sql->bindValue(":n", $model->nome);
        $sql->bindValue(":e", $model->email);
        $sql->bindValue(":i", $model->id);
        $sql->execute(); 
    }

    public function select() {
        $sql = $this->conexao->prepare("SELECT * FROM pessoa");
        $sql->execute();

        //vai retornar todas as linhas
        //para retornar como rray de objetos, só usar o metodo do PDO::FETCH_CLASS
        return $sql->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id) {
        include_once 'Model/PessoaModel.php';
        $sql = $this->conexao->prepare("SELECT * FROM pessoa WHERE id = :i");

        $sql->bindValue(":i", $id);
        $sql->execute();
        return $sql->fetchObject("PessoaModel");
    }

    public function delete(int $id) {
        $sql = "DELETE FROM pessoa WHERE id = :id";

        $bd = $this->conexao->prepare($sql);
        $bd->bindValue(":id", $id);
        $bd->execute();
    }
}

?>