<?php 

require_once './Controller/EstudanteController.php';

$app = new EstudanteController();

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? null;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($action == 'atualizar'){
        $app->atualizarDados();
    } else {
        $app->salvar();
    }
    $app->salvar(); //salvar dados no banco
} else {
    
    switch ($action) {
        case 'novo':
            require_once './View/cadastro.php'; //mostrar formulário
            break;

        case 'editar':
            $app->editar($id);
            break;

        case 'deletar':
            $app->deletar($id);
            break;

        default:
            $app->index();
            break;
    }
}

?>