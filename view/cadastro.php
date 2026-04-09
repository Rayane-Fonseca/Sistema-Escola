<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Seleções</title>
</head>
<body>
    <h1>Nova Seleção</h1>
    <form method="POST" action="index.php?acao=salvar">
        <p>
            <label>Nome:</label><br>
            <input type="text" name="nome" required>
        </p>
        <p>
            <label>Cidade:</label><br>
            <input type="email" name="cidade" required>
        </p>
        <p>
            <label>País:</label><br>
            <input type="text" name="pais" required>
        </p>

        <button type="submit">Salvar Seleção</button>
        <a href="index.php">Voltar para a lista</a>
    </form>
</body>
</html>