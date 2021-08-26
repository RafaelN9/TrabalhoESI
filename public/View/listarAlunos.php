<?php
$alunos = $_REQUEST['alunos'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title>Implementando MVC</title>
 </head>
 <body>
 <table>
 <tr>
 <th>Número USP</th>
 <th>Nome</th>
 </tr>
 <?php foreach ($alunos as $aluno): ?>
 <tr>
 <td><?php echo $aluno->getNumero_USP(); ?></td>
 <td><?php echo $aluno->getNome(); ?></td>
 </tr>
 <?php endforeach; ?>
 </table>
 </body>
</html>