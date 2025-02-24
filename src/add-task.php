<?php
function addTask($db)
{
    if ($db && isset($_POST['task_item']) && !empty($_POST['task_item'])) {
        $taskItem = htmlspecialchars($_POST['task_item']);
        $newTask = $db->prepare("INSERT INTO task (taskContent, done) VALUES (:taskContent, :done)");
        $newTask->bindValue(':taskContent', $taskItem);
        $newTask->bindValue(':done', 0);
        $newTask->execute();
    }
}


