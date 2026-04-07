<?php 

require_once './Controller/EstudanteController.php';

$app = new EstudanteController();

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? null;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($action === 'atualizar'){
        $app->atualizarDados();
    } else {
        $app->salvar();
    }
} else {
    switch ($action) {
        case 'novo':
            require_once './View/cadastro.php'; 
            break;

        case 'editar':
            $app->editar($id);
            break;

        case 'deletar':
            $app->deletar($id);
            break;

        default:
            $app-> index();
            break;
        }
}

?>