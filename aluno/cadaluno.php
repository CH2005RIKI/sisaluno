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
    $nome = $_POST['nomealuno'];
    $idade = $_POST['idade'];
    $endereco = $_POST['endereco'];
    $cpfaluno = $_POST['cpfaluno'];
    $datanascimento = $_POST['datanasc'];
    $estatus = $_POST['select'];

    // Validate age and date of birth compatibility
    $dataNascimentoObj = new DateTime($datanascimento);
    $dataAtualObj = new DateTime();
    $idadeCalculada = $dataAtualObj->diff($dataNascimentoObj)->y;

    if ($idadeCalculada < $idade) {
        echo "A data de nascimento não corresponde à idade informada!";
        exit;
    }

    if ($idade < 18) {
        echo "O aluno deve ter 18 anos ou mais.";
        exit;

    }
    // Verificar se o nome contém apenas letras
    if (!validarNome($nome)) {
        echo "O nome deve conter apenas letras (sem caracteres especiais ou números).";
        exit;
    }

        ##codigo SQL
         $sql = "INSERT INTO aluno(nome,cpf,idade,datanascimento,endereco,estatus) 
                VALUES('$nome','$cpfaluno','$idade','$datanascimento','$endereco','$estatus')";

        ##junta o codigo sql a conexao do banco   
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> o aluno
                $nome foi Incluido com sucesso!!!"; 
                echo " <button class='button'><a href='./listaalunos.php'>voltar</a></button>";
            }

        
}

#######alterar
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nome = $_POST['nomealuno'];
    $idade = $_POST['idade'];
    $endereco = $_POST['endereco'];
    $cpfaluno = $_POST['cpfaluno'];
    $datanascimento = $_POST['datanascimento'];
    $estatus = $_POST['estatus'];

    // Validate age and date of birth compatibility
    $dataNascimentoObj = new DateTime($datanascimento);
    $dataAtualObj = new DateTime();
    $idadeCalculada = $dataAtualObj->diff($dataNascimentoObj)->y;
    if ($idadeCalculada < $idade) {
        echo "A data de nascimento não corresponde à idade informada!";
        exit;
    }

    if ($idade < 18) {
        echo "O aluno deve ter 18 anos ou mais.";
        exit;

    }
    // Verificar se o nome contém apenas letras
    if (!validarNome($nome)) {
        echo "O nome deve conter apenas letras (sem caracteres especiais ou números).";
        exit;
    }

    ##codigo SQL
    $sql = "UPDATE aluno SET nome = :nome, idade = :idade, datanascimento = :datanasc, cpf = :cpfaluno, endereco = :endereco, estatus = :estatus WHERE id = :id";

    ##junta o código SQL à conexão do banco
    $stmt = $conexao->prepare($sql);

    ##diz o parâmetro e o tipo do parâmetro
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanasc', $datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':cpfaluno', $cpfaluno, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':estatus', $estatus, PDO::PARAM_STR);

    if($stmt->execute()) {
        echo "<strong>OK!</strong> O aluno $nome foi alterado com sucesso!";
        echo "<button class='button'><a href='./listaalunos.php'>voltar</a></button>";
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
