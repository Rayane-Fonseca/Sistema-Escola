<?php 
require_once './model/Copa.php';
require_once './config/Database.php';

class CopaController {
    private $db;
    private $selecao;

    public function __construct() {
        //Preparar conexão com BD
        $database = new Database();
        $this->db = $database->getConnection();

        //instanciar a Model Estudante
        $this->selecao = new Selecao($this->db);

    }

    /*Ação */
    //listar todos os alunos na tela inicial
    public function index() {
        //pede lista de dados ao Model
        $selecoes = $this->selecao->buscarTodos();

        require_once './View/lista.php';
    }

    public function salvar() {
        //verifica se o formulário foi enviado via POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = [
                'nome'  => htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8'),
                'cidade'  => htmlspecialchars(trim($_POST['cidade']), ENT_QUOTES, 'UTF-8'),
                'pais'  => htmlspecialchars(trim($_POST['pais']), ENT_QUOTES, 'UTF-8')
            ];

            //VALIDANDO 
            //IMPEDIR QUE CAMPOS VAZIOS CHEGUEM NO BANCO
            if (empty($dados['nome'])|| empty($dados['cidade'])){

                header("Location: index.php?status=erro&msg=Preencha todos os campos!");
                exit;
            }
            //PERSISTÊNCIA DE DADOS: SALVAR INFORMAÇÕES NO BD E GUARDÁ-LOS MESMO QUE HAJA UM ENCERRAMENTO 
            // DO PROGRAMA OU DESLIGAMENTO DO SISTEMA

            //Chamar o Model para salvar dados limpos
            if ($this->selecao->salvar($dados)){
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
        $aluno = $this -> selecao->buscarPorId($id);
        if ($aluno) {
            require_once './View/editar.php';
        } else {
            header("Location: index.php?status=err&msg=Seleção não encontrada");
        }
    }

    public function atualizarDados(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dados = [
                'id' => (int) $_POST['id'],
                'nome' => htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8'),
                'cidade' => htmlspecialchars(trim($_POST['cidade']), ENT_QUOTES, 'UTF-8'),
                'pais' => htmlspecialchars(trim($_POST['pais']), ENT_QUOTES, 'UTF-8'),
            ];

            if ($this->selecao->atualizarDados($dados)){
                header("Location: index.php?status=sucesso&msg=Atualizado!");
            }
        }
    }

    public function deletar($id) {
        if ($this -> selecao-> deletar($id)) {
            header("Location: index.php?status=sucesso&msg=Excluído!");
        }
    }
}
?>