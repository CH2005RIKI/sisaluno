<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

<?php
    require_once('../conexao.php');

   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM aluno where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome = $array_retorno['nome'];
   $idade = $array_retorno['idade'];
   $datanascimento = $array_retorno['datanascimento'];
   $cpfaluno = $array_retorno['cpf'];
   $endereco =$array_retorno['endereco'];
   $estatus = $array_retorno['estatus'];


?>
  <form method="POST" action="crudaluno.php">
  <input type="hidden" name="id"  id="" value="<?php echo $id; ?>" >

    <label for="nomealuno">NOME DO ALUNO</label>
    <input type="text" required="" name="nomealuno" value="<?php echo $nome; ?>">
    <label for="idade">IDADE</label>
    <input type="number" required="" name="idade" value="<?php echo $idade; ?>">
    <label for="endereco">CIDADE</label> 
    <input type="text" required="" name="endereco" value="<?php echo $endereco; ?>">
    <label for="cpfaluno">CPF</label> 
    <input type="text" required="" name="cpfaluno" value="<?php echo $cpfaluno; ?>">
    <label for="datanasc">Data de Nascimento</label> 
    <input type="date" required name="datanascimento" value="<?php echo $datanascimento; ?>">
    <label for="select">ESTATUS</label>
    <select name="estatus" required id="select">
        <option value="AP" <?php echo ($estatus === 'AP') ? 'selected' : ''; ?>>Aprovado</option>
        <option value="RP" <?php echo ($estatus === 'RP') ? 'selected' : ''; ?>>Reprovado</option>
    </select>
            <input type="submit" name="update" value="Alterar" >                                    
  </form>
  <div class="button-container">
        <button class="button button3"><a href="./listaalunos.php">Voltar</a></button>
    </div>
</body>
</html>