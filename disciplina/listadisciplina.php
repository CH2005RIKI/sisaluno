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
                <th>SEMESTRE</th>
                <th>ID DO PROFESSOR</th>
                <th>CARGA HORARIA</th>
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
                        <?php echo $value['semestre']; ?>
                    </td>
                    <td>
                        <?php echo $value['idprofessor']; ?>
                    </td>
                    <td>
                        <?php echo $value['ch'];?>
                    </td>
                    </td>
                    <td>
                        <form method="POST" action="altdisciplina.php">
                            <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                            <button name="alterar" type="submit">Alterar</button>
                        </form>
                    </td> 
                    <td>
                        <form method="GET" action="cruddisciplina.php">
                            <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                            <button name="excluir" type="submit">Excluir</button>
                        </form>
                    </td> 
                </tr>
            <?php } ?> 
        </tbody>
    </table>

    <div class="button-container">
        <button class="button button3"><a href="./caddisciplina.php">VOLTAR</a></button>
    </div>
</body>
</html>
    <table> 




