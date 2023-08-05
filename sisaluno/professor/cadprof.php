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
  
  
  <form method="post" action="crudprof.php"> 

    <label for="">NOME DO PROFESSOR</label>
     <input type="text" required="" maxlength="120" name="nomeprof">
     <label for="">IDADE</label>
     <input type="number" required="" maxlength="100" onkeypress="return event.charCode >= 48" min="1" name="idade">
     <label for="endereco">CIDADE</label> 
     <input type="text" required="" name="endereco">
     <label for="cpfprof">CPF</label> 
     <input type="text" required=""maxlength="14" name="cpfprof">
     <label for="datanascimento">Data de Nascimento</label> 
     <input type="date" required name="datanascimento">
     <label for="select">ESTATUS</label>
     <select name="select" required="" id="select">
     <option value=""></option>
     <option value="At">Ativo</option>
     <option value="In">Inativo</option>
    </select>

     <input type="submit" name="cadastrar" value="CADASTRAR" action="crudprof">
     <div class="button-container">
     </div>
     <center><a href="./listaprof.php">CADASTRADOS</a></center>
     </form>
  
     
     <button class="button"><a href="../index.php">VOLTAR</a></button>

</body>


</html>