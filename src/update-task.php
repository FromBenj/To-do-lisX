<?php

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
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        var_dump($_SERVER['GET']);
    }
}
