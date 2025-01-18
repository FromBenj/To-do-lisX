<?php
echo "<div>test</div>";
require_once(__DIR__ . '/../config/config.php');

$db = createDatabase();

if ($db) {
    $results = $db->query('SELECT * FROM task');
    while ($taskItem = $results->fetchArray(SQLITE3_ASSOC)) {
        echo '<div class="task-in-list">' . $taskItem['taskContent'] . '</div>';
    }
}
