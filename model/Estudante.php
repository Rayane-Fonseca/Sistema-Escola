<?php 

    class Estudante{
        private $conn;
        private $table = "estudantes"; //nome da tabela no MYSQL

        public function __construct($db){
            $this ->conn = $db; //conn= instância o banco de dados
        }

        //listar todos os estudantes (READ)
        public function buscarTodos(){
            $query = "SELECT * FROM " . $this->table. " ORDER BY nome ASC"; //ASC: Ordem alfabética
            $stmt = $this->conn->prepare($query); //prepara a consulta SQL
            $stmt->execute(); //executa a consulta SQL
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

  
        //Salvar novo estudante (CREATE)
        public function salvar($dados){
            $query = "INSERT INTO " . $this->table. " (nome, email, matricula) VALUES (:nome, :email, :matricula)"; 
            //: serve para a segurança do banco de dados
            $stmt = $this->conn->prepare($query);

            //Blindar SQL
            $stmt -> bindParam(':nome', $dados['nome']);
            $stmt -> bindParam(':email', $dados['email']);
            $stmt -> bindParam(':matricula', $dados['matricula']);

            return $stmt->execute();
        }

        public function atualizarDados($dados){
            $query = "UPDATE " . $this->table. "
                SET nome =:nome, email = :email, matricula = :matricula
                WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $stmt -> bindParam(':nome', $dados['nome']);
            $stmt -> bindParam(':email', $dados['email']);
            $stmt -> bindParam(':matricula', $dados['matricula']);
            $stmt -> bindParam(':id', $dados['id']);
            return $stmt->execute();
        }

        public function buscarPorId($id){
            $query = "SELECT * FROM " .$this->table . "WHERE id= ? LIMIT 0,1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $id);
            $stmt-> execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function deleter($id){
            $query = "SELECT * FROM " .$this->table . "WHERE id= ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $id);
            return $stmt->execute();

        }

    }
?>