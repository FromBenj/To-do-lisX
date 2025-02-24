<?php
require_once(__DIR__ . '/../src/list-tasks.php');

function updateTask($db)
{
    //Adding the update input element
    if ($db && isset($_GET['update_id'])) {
        $updateTaskId = htmlspecialchars($_GET['update_id']);
        $selectTask = $db->prepare("SELECT * FROM task WHERE id = :id");
        $selectTask->bindValue(':id', $updateTaskId);
        $result = $selectTask->execute();
        $task = $result->fetchArray(SQLITE3_ASSOC);
        echo '
            <input type="text" 
                id="update-' . $task['id'] . '" 
                class="border-none w-100 outline-none border-bottom border-2 border-dark" 
                name="input-' . $task['id'] . '" 
                value="' . $task['taskContent'] . '" 
                required 
                minlength="1" />
        ';
    }
    //Updating the value
    //POST instead of PUT for simplification
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['update_id'], $_POST['update_content']) && $_POST['update_content'] !== '') {
            $updateId = $_POST['update_id'];
            $updateContent = $_POST['update_content'];
            $updateTask = $db->prepare("UPDATE task SET taskContent = :updateContent, done = :done WHERE id = :id");
            $updateTask->bindValue(':id', $updateId);
            $updateTask->bindValue(':done', 0);
            $updateTask->bindValue(':updateContent', $updateContent);
            $updateTask->execute();
        }
        listTasks($db);
    }

    if (isset($_POST['update_id']) && !$_POST['update_content']) {
        $updateId = $_POST['update_id'];
        $task = $db->prepare("SELECT * FROM task WHERE id = :id");
        $task->bindValue(':id', $updateId);
        $result = $task->execute();
        $task = $result->fetchArray(SQLITE3_ASSOC);
        $done = (int) $task['done'];
        $newDone = ($done === 0) ? 1 : 0;
        $updateTask = $db->prepare("UPDATE task SET done = :done WHERE id = :id");
        $updateTask->bindValue(':id', $updateId);
        $updateTask->bindValue(':done', $newDone);
        $updateTask->execute();
    }
}
