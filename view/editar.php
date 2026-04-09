<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h2>Editar Seleção</h2>

    <form action="index.php?action=atualizar" method="post">
        <input type="hidden" name="id" value="<?=  $selecao['id'] ?>">
        <p>Nome: <input type="text" name="nome" value="<?= safe($selecao['nome']) ?>" required></p>
        <p>Cidade: <input type="text" name="cidade" value="<?= safe($selecao['cidade']) ?>" required></p> 
        <p>País:  <input type="text" name="pais" value="<?= safe($selecao['pais']) ?>" required></p> 

        <button type="submit">Salvar Alterações</button>
    </form>
    
</body>
</html>