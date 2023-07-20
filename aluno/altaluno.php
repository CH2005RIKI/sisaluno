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
   $Nome = $array_retorno['nome'];
   $idade = $array_retorno['idade'];
   $datanasc = $array_retorno['datanasc'];
   $cpfaluno = $array_retorno['cpf'];
   $endereco =$array_retorno['endereco'];
   $estatus = $array_retorno['estatus'];


?>

  <form method="POST" action="crudaluno.php">
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
            <td>
            <input type="text" name="nome" id="" value=<?php echo $Nome?> >
            </td>
            <td><input type="text" name="idade" id="" value=<?php echo $idade ?> >
            </td>
            <td>
            <input type="date" name="datanasc" id="" value=<?php echo $datanasc ?> >
            </td>
            <td>
            <input type="text" name="cpf" id="" value=<?php echo $cpfaluno ?>>
            </td>
            <td>
            <input type="number" name="endereco"  id="" value="<?php echo $endereco?>">
            </td>
            <td>
                <select name="estatus" id="">
                    <option value="Ap" <?php if($estatus == 'Ap') echo 'slected'?>>Aprovado</option>
                    <option value="Rp"><?php if ($estatus == 'RP') echo 'slected'?>Reprovado</option>
                    </select>
            </td>
            <td>
            <input type="submit" name="update" value="Alterar">
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