<link rel="stylesheet" href="../tabelastyle.css">
<?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
require_once('../conexao.php');
   
$retorno = $conexao->prepare('SELECT * FROM disciplina');
$retorno->execute();

?>       
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro</title>
</head>
<body>
    <table> 
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>ENDEREÇO</th>
                <th>IDADE</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Estatus</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($retorno->fetchAll() as $value) { ?>
                <tr>
                    <td><?php echo $value['id']; ?>
                    </td> 
                    <td>
                        <?php echo $value['nome']; ?>
                    </td> 
                    <td>
                        <?php echo $value['endereco']; ?>
                    </td>
                    <td>
                        <?php echo $value['idade']; ?>
                    </td>
                    <td>
                        <?php echo $value['cpf']; ?>
                    </td>
                    <td>
                        <?php echo $value['datanascimento']; ?>
                    </td>
                    <td> <?php echo $value['estatus']; ?>
                    </td>
                    <td>
                        <form method="POST" action="altaluno.php">
                            <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                            <button name="alterar" type="submit">Alterar</button>
                        </form>
                    </td> 
                    <td>
                        <form method="GET" action="crudaluno.php">
                            <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                            <button name="excluir" type="submit">Excluir</button>
                        </form>
                    </td> 
                </tr>
            <?php } ?> 
        </tbody>
    </table>

    <div class="button-container">
        <button class="button button3"><a href="./cadaluno.php">VOLTAR</a></button>
    </div>
</body>
</html>
    <table> 