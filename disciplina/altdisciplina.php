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
   $sql = "SELECT * FROM disciplina where id= :id";
   
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
   $semestre =$array_retorno ['semestre'];


?>
  <form method="POST" action="cruddisciplina.php">
  <input type="hidden" name="id"  id="" value="<?php echo $id; ?>" >
    <label for="">DISCIPLINA</label>
     <input type="text" required="" name="nomedisciplina">
     <label for="">SEMESTRE</label>
     <input type="text" required="" name="semenstre">
     <label for="">CARGA HORARIA</label>
     <input type="text" required="" name="cargahoraria">
     <label for="">ID DO PROFESSOR</label>
     <input type="number" required="" name="idprofessor">
            <input type="submit" name="update" value="Alterar" >                                    
  </form>
  <div class="button-container">
        <button class="button button3"><a href="./listaalunos.php">Voltar</a></button>
    </div>
</body>
</html>