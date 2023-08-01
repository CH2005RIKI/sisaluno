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
    $nome = $_POST['nomeprof'];
    $idade = $_POST['idade'];
    $endereco = $_POST['endereco'];
    $cpfprof = $_POST['cpfprof'];
    $datanasc = $_POST['datanasc'];
    //$estatus = $_POST['select'];

        
    

        ##codigo SQL
         $sql = "INSERT INTO professor(nome,cpf,idade,datanasc,endereco,estatus) 
                VALUES('$nome','$cpfprof','$idade','$datanasc','$endereco','')";

        ##junta o codigo sql a conexao do banco   
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> o Professor
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
    $cpfprof = $_POST['cpf'];
    $endereco = $_POST["endereco"];

    ##codigo SQL
    $sql = "UPDATE professor SET nome = :nome, idade = :idade, datanasc = :datanasc, cpf = :cpf, endereco = :endereco WHERE id = :id";

    ##junta o código SQL à conexão do banco
    $stmt = $conexao->prepare($sql);

    ##diz o parâmetro e o tipo do parâmetro
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanasc', $datanasc, PDO::PARAM_STR);
    $stmt->bindParam(':cpf', $cpfprof, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);

    if($stmt->execute()) {
        echo "<strong>OK!</strong> O Professor $nome foi alterado com sucesso!";
        echo "<button class='button'><a href='./listaprof.php'>voltar</a></button>";
    }

}
       


##Excluir
if(isset($_GET['excluir'])){

    $id = $_GET['id'];
    $sql ="DELETE FROM `professor` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo "
            <strong>OK!</strong> o professor
             $id foi excluido!!!"; 

            echo " <button class='button'><a href='listaprof.php'>voltar</a></button>";
        }

}

        
?>

 
</body>
</html>