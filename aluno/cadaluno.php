<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    
<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_POST['cadastrar'])) {
    $nome = $_POST['nomealuno'];
    $idade = $_POST['idade'];
    $endereco = $_POST['endereco'];
    $cpfaluno = $_POST['cpfaluno'];
    $datanasc = $_POST['datanasc'];
    $estatus = $_POST['select'];

        
    

        ##codigo SQL
         $sql = "INSERT INTO aluno(nome,cpf,idade,datanasc,endereco,estatus) 
                VALUES('$nome','$cpfaluno','$idade','$datanasc','$endereco','$estatus')";

        ##junta o codigo sql a conexao do banco   
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo $estatus;
                echo " <strong>OK!</strong> o aluno
                $nome foi Incluido com sucesso!!!"; 
                echo " <button class='button'><a href='../index.php'>voltar</a></button>";
            }
}

#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo método POST
    $id = $_POST['id'];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $datanasc = $_POST["datanasc"];
    $cpfaluno = $_POST['cpf'];
    $endereco = $_POST["endereco"];
    $estatus = $_POST["estatus"];

    ##codigo SQL
    $sql = "UPDATE aluno SET nome = :nome, idade = :idade, datanasc = :datanasc, cpf = :cpf, endereco = :endereco, estatus = :estatus WHERE id = :id";

    ##junta o código SQL à conexão do banco
    $stmt = $conexao->prepare($sql);

    ##diz o parâmetro e o tipo do parâmetro
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanasc', $datanasc, PDO::PARAM_STR);
    $stmt->bindParam(':cpf', $cpfaluno, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':estatus', $estatus, PDO::PARAM_STR);

    if($stmt->execute()) {
        echo "<strong>OK!</strong> O aluno $nome foi alterado com sucesso!";
        echo "<button class='button'><a href='../index.php'>voltar</a></button>";
    }

}
       


##Excluir
if(isset($_GET['excluir'])){

    $id = $_GET['id'];
    $sql ="DELETE FROM `aluno` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo "
            <strong>OK!</strong> o aluno
             $id foi excluido!!!"; 

            echo " <button class='button'><a href='listaalunos.php'>voltar</a></button>";
        }

}

        
?>

 
</body>
</html>
