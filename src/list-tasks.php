<?php
function listTasks($db)
{
    if ($db) {
        $results = $db->query('SELECT * FROM task ORDER BY id DESC');
        while ($taskItem = $results->fetchArray(SQLITE3_ASSOC)) {
            echo '
            <div class="task-in-list" data-id="' . $taskItem['id'] . '">' . $taskItem['taskContent'] . '</div>
            <i class="task-done fa-solid fa-check"></i>
            <i class="delete-task fa-solid fa-trash-can"></i>';
        }
    }
}
