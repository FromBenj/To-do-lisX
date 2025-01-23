<?php
require_once(__DIR__ . '/../config/config.php');

$db = createDatabase();

if ($db) {
    $results = $db->query('SELECT * FROM task');
    while ($taskItem = $results->fetchArray(SQLITE3_ASSOC)) {
        echo
        '<div class="container d-flex">
            <div class="task-in-list col-10" data-id=' . $taskItem['id'] . '>' . $taskItem['taskContent'] . '</div>
            <div class="task-done-container col-1 d-flex justify-content-center align-items-center">
                <i class="task-done fa-solid fa-check"></i>
            </div>
            <div class="col-1 d-flex justify-content-center align-items-center">
                <i class="delete-task fa-regular fa-trash-can"></i>
            </div>
        </div>';
    }
}
