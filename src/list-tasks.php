<?php
function listTasks($db)
{
    if ($db) {
        $results = $db->query('SELECT * FROM task ORDER BY id DESC');
        while ($taskItem = $results->fetchArray(SQLITE3_ASSOC)) {
            echo '
            <div id="task-container-' . $taskItem['id'] . '"  class="container d-flex justify-content-center align-items-center">
                <div
                    id="task-in-list-' . $taskItem['id'] . '"
                    class="task-in-list"
                    hx-get = main.php
                    hx-trigger="dblclick"
                    hx-vals={"update_id":' . $taskItem['id'] . '}
                >
                    ' . $taskItem['taskContent'] . '
                </div>' . '
                <button
                id="done-button-' . $taskItem['id'] . '"
                class="done-button">
                    <i class="task-done fa-solid fa-check ms-4 me-3"></i>
                </button>
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
                <button
                    id="update-button-' . $taskItem['id'] . '"
                    class="update-button"
                    hx-target="#tasks-list"
                    hx-vals=\'js:{update_id:' . $taskItem['id'] . ', update_content: document.getElementById("update-' . $taskItem['id'] . '").value}\'
                    hx-post="main.php"
                    hx-trigger="click"
                    hx-swap="innerHTML"
                    >
                </button>
            </div>';
        }
    }
}
