<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de aluno</title>
</head>
<body>
    <h1>Novo Aluno</h1>
    <form method="POST" action="index.php?acao=salvar">
        <p>
            <label>Nome:</label><br>
            <input type="text" name="nome" required>
        </p>
        <p>
            <label>E-mail:</label><br>
            <input type="email" name="email" required>
        </p>
        <p>
            <label>Matrícula:</label><br>
            <input type="text" name="matricula" required>
        </p>

        <button type="submit">Salvar Aluno</button>
        <a href="index.php">Voltar para a lista</a>
    </form>
</body>
</html>