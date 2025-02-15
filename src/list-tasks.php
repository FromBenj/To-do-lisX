<?php
function listTasks($db)
{
    if ($db) {
        $results = $db->query('SELECT * FROM task ORDER BY id DESC');
        while ($taskItem = $results->fetchArray(SQLITE3_ASSOC)) {
            echo '
            <div id="task-container-' . $taskItem['id'] . '"  class="container d-flex justify-content-center align-items-center">
                <div class="task-in-list"
                    hx-get = main.php
                    hx-trigger="dblclick"
                    hx-vals={"update_id":' . $taskItem['id'] . '}
                >
                    ' . $taskItem['taskContent'] . '
                </div>
                <i class="task-done fa-solid fa-check ms-4 me-3"></i>
                <button
                id="delete-button-' . $taskItem['id'] . '"
                class="delete-button"
                hx-target="#task-container-' . $taskItem['id'] . '"
                hx-vals={"delete_id":' . $taskItem['id'] .'}
                hx-delete ="main.php"
                hx-trigger="click"
                hx-swap="outerHTML"
                >
                <i class="delete-task fa-solid fa-trash-can"></i>
                </button>
            </div>';
        }
    }
}
