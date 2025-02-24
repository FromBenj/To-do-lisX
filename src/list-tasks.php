<?php
function listTasks($db)
{
    if ($db) {
        $results = $db->query('SELECT * FROM task ORDER BY id DESC');
        while ($taskItem = $results->fetchArray(SQLITE3_ASSOC)) {
            $taskDoneClass = ($taskItem['done'] === 1) ? "task-done" : "";
            $iconDoneClass = ($taskItem['done'] === 1) ? "fa-thumbs-up" :  "fa-check";
            echo '
            <div id="task-container-' . $taskItem['id'] . '"  class="task-container container d-flex justify-content-center align-items-center">
                <div
                    id="task-in-list-' . $taskItem['id'] . '"
                    class="task-in-list ' . $taskDoneClass . '"
                    hx-get = main.php
                    hx-trigger="dblclick"
                    hx-vals={"update_id":' . $taskItem['id'] . '}
                >
                    ' . $taskItem['taskContent'] . '
                </div>' . '
                <button
                    id="done-button-' . $taskItem['id'] . '"
                    class="done-button"
                    hx-post="main.php"
                    hx-trigger="click"
                     hx-vals={"update_id":' . $taskItem['id'] . '}
                     hx-swap="none"
                 >
                    <i class="task-done-icon fa-solid ' .$iconDoneClass . ' ms-4 me-3"></i>
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
                    <i class="delete-task-icon fa-solid fa-trash-can"></i>
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
