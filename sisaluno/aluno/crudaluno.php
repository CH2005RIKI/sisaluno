<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    
<?php
##permite acesso as variaves dentro do arquivo conexao
require_once('../conexao.php');

function validarNome($nome) {
    return preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿ\s]+$/', $nome);
}

##cadastrar
if(isset($_POST['cadastrar'])) {
    $nome = $_POST['nomedisciplina'];
    $semenstre= $_POST['semestre'];




        ##codigo SQL
         $sql = "INSERT INTO disciplina(nomedisciplina,semestre) 
                VALUES('$nome',)";

        ##junta o codigo sql a conexao do banco   
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> a disciplina
                $nome foi Incluido com sucesso!!!"; 
                echo " <button class='button'><a href='./listaalunos.php'>voltar</a></button>";
            }

        
}

#######alterar
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nome = $_POST['nomealuno'];

    ##codigo SQL
    $sql = "UPDATE disciplina SET nome = :nome WHERE id = :id";

    ##junta o código SQL à conexão do banco
    $stmt = $conexao->prepare($sql);

    ##diz o parâmetro e o tipo do parâmetro
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanasc', $datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':cpfaluno', $cpfaluno, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);

    if($stmt->execute()) {
        echo "<strong>OK!</strong> A Disciplina $nome foi alterado com sucesso!";
        echo "<button class='button'><a href='./listaalunos.php'>voltar</a></button>";
    }

}
       


##Excluir
if(isset($_GET['excluir'])){

    $id = $_GET['id'];
    $sql ="DELETE FROM `disciplina` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo "
            <strong>OK!</strong> a disciplina
             $id foi excluido!!!"; 

            echo " <button class='button'><a href='listaalunos.php'>voltar</a></button>";
        }

}

        
?>

 
</body>
</html>