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
        echo '
            <div id="task-container-' . $lastTask['id'] . '" 
            class="container d-flex justify-content-center align-items-center"
            hx-get = main.php
            hx-trigger="dblclick"
            hx-vals={"update_id":' . $lastTask['id'] .'}
            >
                <div class="task-in-list">' . $lastTask['taskContent'] . '</div>
                <i class="task-done fa-solid fa-check ms-4 me-3"></i>
                <button
                id="delete-button-' . $lastTask['id'] . '"
                class="delete-button"
                hx-target="#task-container-' . $lastTask['id'] . '"
                hx-vals={"delete_id":' . $lastTask['id'] .'}
                hx-delete ="main.php"
                hx-trigger="click"
                hx-swap="outerHTML"
                >     
                <i class="delete-task fa-solid fa-trash-can"></i>
                </button>
            </div>';
    }
}


