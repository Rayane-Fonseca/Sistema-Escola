<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
</head>
<body>
    <h2>Editar aluno</h2>

    <form method="POST" action="index.php?action=atualizar">
        <input type="hidden" name="id" value="<?= $aluno['id']?>">
        <p>
            Nome: <input type="text" name="nome" value="<?= safe($aluno['nome'])?>"require>
        </p>
        <p>
            E-mail: <input type="text" name="email" value="<?= safe($aluno['email'])?>"require>
        </p>
        <p>
            Matricula: <input type="text" name="matricula" value="<?= safe($aluno['matricula'])?>"require>
        </p>
        <button typr="submit">Salvar Alteração</button>
    </form>
    
</body>
</html>