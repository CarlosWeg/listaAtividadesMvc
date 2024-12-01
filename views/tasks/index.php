<!DOCTYPE html>
<html lang = "pt-BR">

<head>

    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Lista de tarefas</title>

</head>

<body>

    <h1>Lista de Tarefas:</h1>

    <form action = "../public/index.php?action=store" method = "POST">
        <input type = "text" name = "description" required>
        <input type = "submit" value = "Adicionar">
    </form>


    <table border = "1">

        <tr>

            <th>Descrição</th>
            <th>Status Atual</th>
            <th colspan = "2">Ações</th>

        </tr>


        <?php

            foreach ($aTasks as $task){
                echo '<tr>';
                echo '<td>' . $task['description'] . '</td>';
                echo '<td>Status: ' . ($task['is_completed'] ? 'Pendente' : 'Completo') . '</td>';
                echo '<td><a href = "../public/index.php?action=update&id=' . $task['id'] . '&is_completed=true">Completar</a></td>';
                echo '<td><a href = "../public/index.php?action=delete&id=' . $task['id'] . '">Deletar</a></td>';
                echo '</tr>';
            }

        ?>

    </table>

</body>
</html>