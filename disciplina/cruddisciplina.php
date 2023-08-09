<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    
<?php
require_once('../conexao.php');

function validarNome($nome) {
    return preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿ\s]+$/', $nome);
}

## Fetch and display professor IDs
$query = "SELECT id FROM professor";
$result = $conexao->query($query);
if ($result) {
    /*echo "<strong>Professores disponiveis IDs:</strong><br>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo $row['id'] . "<br>";
    }
    echo "<br>";
} else {
    echo "Error fetching professor IDs: " . $conexao->errorInfo()[2];*/
}

## Cadastrar
if (isset($_POST['cadastrar'])) {
    $professorId = $_POST['professorid']; // Assuming you have an input for professor ID
    $nome = $_POST['nomedisciplina'];
    $semestre = $_POST['semestre'];
    $ch = $_POST['cargahoraria'];

    if (!validarNome($nome)) {
        echo "O nome deve conter apenas letras (sem caracteres especiais ou números).";
        exit;
    }

    ## Using parameterized queries to prevent SQL injection
    $sql = "INSERT INTO disciplina (nome, ch, semestre, idprofessor) VALUES (:nome, :ch, :semestre, :professorId)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':ch', $ch, PDO::PARAM_STR);
    $stmt->bindParam(':semestre', $semestre, PDO::PARAM_STR);
    $stmt->bindParam(':professorId', $professorId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<strong>OK!</strong> A Disciplina $nome foi incluída com sucesso!";
        echo "<button class='button'><a href='./listadisciplina.php'>lista</a></button>";
    }
}
#######alterar
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nomedisciplina'];

    ## Using parameterized queries to prevent SQL injection
    $sql = "UPDATE disciplina SET nome = :nome WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "<strong>OK!</strong> A disciplina $nome foi alterada com sucesso!";
        echo "<button class='button'><a href='./listadisciplina.php'>lista</a></button>";
    }
}

##Excluir
if (isset($_GET['excluir'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM disciplina WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<strong>OK!</strong> A disciplina com o ID $id foi excluída!";
        echo "<button class='button'><a href='listadisciplina.php'>lista</a></button>";
    }
}
?>


 
</body>
</html>
