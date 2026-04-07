<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h2>Editar Aluno</h2>

    <form action="index.php?action=atualizar" method="post">
        <input type="hidden" name="id" value="<?=  $aluno['id'] ?>">
        <p>Nome: <input type="text" name="nome" value="<?= safe($aluno['nome']) ?>" required></p>
        <p>E-mail: <input type="text" name="email" value="<?= safe($aluno['email']) ?>" required></p> 
        <p>Matrícula:  <input type="text" name="matricula" value="<?= safe($aluno['matricula']) ?>" required></p> 

        <button type="submit">Salvar Alterações</button>
    </form>
    
</body>
</html>