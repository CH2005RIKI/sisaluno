<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style1.css">

</head>
<body>
  
  <form method="post" action="cruddisciplina.php">
    <label for="">DISCIPLINA</label>
     <input type="text" required="" name="nomedisciplina">
     <label for="">SEMESTRE</label>
     <input type="text" required="" name="semestre">
     <label for="">CARGA HORARIA</label>
     <input type="text" required="" name="cargahoraria">
     <label for="">ID DO PROFESSOR</label>
     <input type="number" required="" name="id_professor">

     <input type="submit" name="cadastrar" value="CADASTRAR">
     <a href="./listadisciplina.php">CADASTRADOS</a>
     </form>

     <button class="button"><a href="../index.php">VOLTAR</a></button>

</body>

</html>