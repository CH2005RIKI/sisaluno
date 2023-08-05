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
  
  <form method="post" action="crudaluno.php">
    <label for="">NOME DO ALUNO</label>
     <input type="text" required="" name="nomealuno">
     <label for="">IDADE</label>
     <input type="number" required="" name="idade">
     <label for="endereco">CIDADE</label> 
     <input type="text" required="" name="endereco">
     <label for="cpfaluno">CPF</label> 
     <input type="text" required="" name="cpfaluno">
     <label for="datanasc">Data de Nascimento</label> 
     <input type="date" required name="datanasc">
     <label for="select">ESTATUS</label>
     <select name="select" required="" id="select">
     <option value=""></option>
     <option value="AP">Aprovado</option>
     <option value="RP">Reprovado</option>
    </select>  

     <input type="submit" name="cadastrar" value="CADASTRAR">
     <a href="./listaalunos.php">CADASTRADOS</a>
     </form>

     <button class="button"><a href="../index.php">VOLTAR</a></button>

</body>

</html>