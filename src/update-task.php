<?php

function updateTask($db)
{
    if ($db && isset($_GET['update_id']) && !empty($_GET['update_id'])) {
        $updateTaskId = htmlspecialchars($_GET['update_id']);
        $selectTask = $db->prepare("SELECT * FROM task WHERE id = :id");
        $selectTask->bindValue(':id', $updateTaskId);
        $result = $selectTask->execute();
        $task = $result->fetchArray(SQLITE3_ASSOC);
        echo '
                <div class="task-in-list border-3">
                    <input type="text" id="update-' . $task['id'] . '" class="border-none w-100 outline-none border-bottom border-2 border-dark" name="input-' . $task['id'] . '" value="' . $task['taskContent'] . '" required minlength="1" />
                </div>
                <i class="update-done fa-solid fa-thumbs-up"></i>
                <i class="task-done fa-solid fa-check ms-4 me-3 opacity-0"></i>
               <button class="delete-button opacity-0">
                    <i class="delete-task fa-solid fa-trash-can"></i>
                </button>';
    }
}
