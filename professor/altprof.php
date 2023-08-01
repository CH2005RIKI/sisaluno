<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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
   $datanasc = $array_retorno['datanasc'];
   $cpfprof = $array_retorno['cpf'];
   $endereco =$array_retorno['endereco'];
   $estatus = $array_retorno['estatus'];


?>

  <form method="POST" action="crudprof.php">
    <table> 
        <thead>
            <tr>
                <th>NOME</th>
                <th>ENDEREÇO</th>
                <th>IDADE</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Estatus</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
       <tbody>
        <tr>
            <input type="hidden" name="id" id="" value="<?php echo $id; ?>" >
            <td><input type="text" name="nome" id="" value=<?php echo $nome?>></td>
            <td><input type="number" onkeypress="return event.charCode >= 48" min="1" name="idade" id="" value=<?php echo $idade ?> required=""></td>
            <td><input type="text" name="endereco" id="" value=<?php echo $endereco?> required=""></td>
            <td><input type="text" name="cpf" id="" value=<?php echo $cpfprof ?> required></td>
            <td><input type="date" name="datanasc"  id="" value=<?php echo $datanasc?> required></td>
          <!-- <td><select name="estatus" id="" value=<?php //echo $estatus?> required="">
                    <option value="Ap">Aprovado</option>
                    <option value="Rp">Reprovado</option>
                </select>
            </td>-->
            <td>
            <input type="submit" name="update" value="Alterar" >
            </td>

        </tr>
       </tbody>
    </table>                                    
  </form>
  <div class="button-container">
        <button class="button button3"><a href="../index.php">Voltar</a></button>
    </div>
</body>
</html>