<?php
function listTasks($db)
{
    if ($db) {
        $results = $db->query('SELECT * FROM task');;
        while ($taskItem = $results->fetchArray(SQLITE3_ASSOC)) {
            echo '<div class="task-in-list" data-id="' . $taskItem['id'] . '">' . $taskItem['taskContent'] . '</div>';
        }
    }
}
