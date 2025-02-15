<?php
require_once(__DIR__ . '/../src/list-tasks.php');
function addTask($db)
{
    if ($db && isset($_POST['task_item']) && !empty($_POST['task_item'])) {
        $taskItem = htmlspecialchars($_POST['task_item']);
        $newTask = $db->prepare("INSERT INTO task (taskContent) VALUES (:taskContent)");
        $newTask->bindValue(':taskContent', $taskItem);
        $newTask->execute();
        listTasks($db);
    }
}


