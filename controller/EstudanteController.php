<?php 
require_once './Model/Estudante.php';
require_once './config/Database.php';

class EstudanteController {
    private $db;
    private $estudante;

    public function __construct() {
        //Preparar conexão com BD
        $database = new Database();
        $this->db = $database->getConnection();

        //instanciar a Model Estudante
        $this->estudante = new Estudante($this->db);

    }

    /*Ação */
    //listar todos os alunos na tela inicial
    public function index() {
        //pede lista de dados ao Model
        $alunos = $this->estudante->buscarTodos();

        require_once './View/lista.php';
    }

    public function salvar() {
        //verifica se o formulário foi enviado via POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = [
                'nome'  => htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8'),
                'email'  => htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8'),
                'matricula'  => htmlspecialchars(trim($_POST['matricula']), ENT_QUOTES, 'UTF-8')
            ];

            //VALIDANDO 
            //IMPEDIR QUE CAMPOS VAZIOS CHEGUEM NO BANCO
            if (empty($dados['nome'])|| empty($dados['email'])){

                header("Location: index.php?status=erro&msg=Preencha todos os campos!");
                exit;
            }
            //PERSISTÊNCIA DE DADOS: SALVAR INFORMAÇÕES NO BD E GUARDÁ-LOS MESMO QUE HAJA UM ENCERRAMENTO 
            // DO PROGRAMA OU DESLIGAMENTO DO SISTEMA

            //Chamar o Model para salvar dados limpos
            if ($this->estudante->salvar($dados)){
                //Redireciona o status de sucesso
                header("Location: index.php?status=sucesso");
                exit;

            } else {
                header("Location: index.php?status=erro&msg=Erro ao salvar");
                exit;
            }
        }
    }

    public function criar(){
        require_once '/View/cadastro.php';
    }

    public function editar($id){
        $aluno = $this->estudante->buscarPorId($id);
        if($aluno){
            require_once  './View/editar.php';                                                                                                                                                                                                                                                                                                                                                                                                                                                       
        } else {
            header("Location: index.php?status=erro&msg=Aluno não encontrado");
        }
    }

    public function atualizarDados(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $dados = [
                'id' =>(int)$_POST['id'],
                'nome' => htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8'),
                'email' => htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8'),
                'matricula' => htmlspecialchars(trim($_POST['matricula']), ENT_QUOTES, 'UTF-8'),
            ];

            if($this->estudante->atualizarDados($dados)){
                header("Location: index.php?status=sucesso&msg=Atualizado!");
            }
        }
    }

    public function deletar($id){
        if ($this->estudante->deletar($id)){
            header("Location: index.php?status=sucesso&msg=Excluido!");
        }
    }
}
?>