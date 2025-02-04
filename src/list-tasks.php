<?php
function listTasks($db)
{
    if ($db) {
        $results = $db->query('SELECT * FROM task ORDER BY id DESC');
        while ($taskItem = $results->fetchArray(SQLITE3_ASSOC)) {
            echo '
            <div data-id=' . $taskItem['id']  . ' class="container d-flex justify-content-center align-items-center">
                <div class="task-in-list">' . $taskItem['taskContent'] . '</div>
                <i class="task-done fa-solid fa-check ms-4 me-3"></i>
                <i class="delete-task fa-solid fa-trash-can"></i>
            </div>';
        }
    }
}
