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

   ##sql para selecionar apens um professor
   $sql = "SELECT * FROM professor where id= :id";
   
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
   $cpfprof = $array_retorno['cpf'];
   $endereco =$array_retorno['endereco'];
   $estatus = $array_retorno['estatus'];


?>

<form method="POST" action="crudprof.php">
    <label for="">NOME DO ALUNO</label>
    <input type="text" required="" name="nomeprof" value="<?php echo $nome ?>">
    <label for="">IDADE</label>
    <input type="number" required="" name="idade" value="<?php echo $idade ?>">
    <label for="endereco">CIDADE</label> 
    <input type="text" required="" name="endereco" value="<?php echo $endereco ?>">
    <label for="cpfprof">CPF</label> 
    <input type="text" required="" name="cpfprof" value="<?php echo $cpfprof ?>">
    <label for="datanasc">Data de Nascimento</label> 
    <input type="date" required name="datanasc" value="<?php echo $datanascimento ?>">
    <label for="select">ESTATUS</label>
    <select name="estatus" id="" required="">
        <option value="AT" <?php if ($estatus === 'AT') echo 'selected'; ?>>ATIVO</option>
        <option value="IN" <?php if ($estatus === 'IN') echo 'selected'; ?>>INATIVO</option>
    </select>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <button type="submit" name="update">Atualizar</button>
</form>
  <div class="button-container">
        <button class="button button3"><a href="./listaprof.php">Voltar</a></button>
    </div>
</body>
</html>