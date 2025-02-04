<?php
require_once(__DIR__ . '/../src/list-tasks.php');
function addTask($db)
{
    if ($db && isset($_POST['task_item']) && !empty($_POST['task_item'])) {
        $taskItem = htmlspecialchars($_POST['task_item']);
        $newTask = $db->prepare("INSERT INTO task (taskContent) VALUES (:taskContent)");
        $newTask->bindValue(':taskContent', $taskItem);
        $newTask->execute();
        $lastTaskId = $db->lastInsertRowID();
        $selectLastTask = $db->prepare("SELECT * FROM task WHERE id = :id");
        $selectLastTask->bindValue(':id', $lastTaskId);
        $result = $selectLastTask->execute();
        $lastTask = $result->fetchArray(SQLITE3_ASSOC);
        $lastTaskId = $lastTask['id'];
        $lastTaskContent = $lastTask['taskContent'];
        echo '
        <div data-id= ' . $lastTaskId . ' class="container d-flex justify-content-center align-items-center">
            <div class="task-in-list" > ' . $lastTask['taskContent'] . ' </div>
            <i class="task-done fa-solid fa-check ms-4 me-3"></i>
            <i 
                id="delete-task-" 
            class="delete-task fa-solid fa-trash-can">
            </i>
        </div>';
    }
}


