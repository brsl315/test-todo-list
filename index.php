<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <title>Список дел</title>
</head>
<body>

<div class="wrapper">
<div class="container">    

    <div class="enter_block">
    <form method="post">
      <label for="task-name">Название задачи</label><br><br>
      <input type="text" id="task-name" class="task_name" name="task-name" placeholder="Введите название задачи"><br><br>

      <div id="subtasks">
        <div class="subtask">
          <label for="task-name">Список подзадач</label><br><br>
          <input type="text" class="subtask-name" name="subtask-name[]" placeholder="Введите название подзадачи">
          <input type="number" class="subtask-hours" name="subtask-hours[]" placeholder="Часы">
          <button type="button" class="remove-subtask">Удалить</button><br><br>
        </div>
      </div>

      <button type="button" id="add-subtask">Добавить подзадачу</button><br><br>

      <button type="submit" name="save-task" class="save-task">Сохранить в LocalStorage</button>
      <button type="submit" name="create-new-task" class="create-new-task">Создать новую задачу</button>
    </form>
    </div>


    <div>
        <? 
        if (isset($_POST["save-task"])) {
          $taskName = $_POST["task-name"];
          $subtaskNames = $_POST["subtask-name"];
          $subtaskHours = $_POST["subtask-hours"];

          $file = fopen("tasks.txt", "a");
          fwrite($file, "+----+-------+----------------------------------------------------------------------+\n");
          fwrite($file, "| " . str_pad($taskName, 30) . " |\n");
          fwrite($file, "+----+-------+----------------------------------------------------------------------+\n");
          for ($i = 0; $i < count($subtaskNames); $i++) {
            fwrite($file, "| " . str_pad(($i + 1), 2) . " | " . str_pad($subtaskHours[$i], 5) . " | " . str_pad($subtaskNames[$i], 72) . " |\n");
          }
          fwrite($file, "+----+-------+----------------------------------------------------------------------+\n");
          fclose($file);
        }


        $file = fopen("tasks.txt", "r");
        if ($file) {
          while (($line = fgets($file)) !== false) {
            echo $line . "<br>";
          }
          fclose($file);
        }


        if (isset($_POST["create-new-task"])){
        	unset($_POST);
        }
        ?>
    </div>

</div>    
</div>
<script src="script.js"></script> 
</body>
</html>








