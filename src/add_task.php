<?php
require_once(__DIR__ . '/../config/config.php');
$db = createDatabase();

if ($db && isset($_POST['task_item']) && !empty($_POST['task_item'])) {
    $taskItem = htmlspecialchars($_POST['task_item']);
    $db->exec("INSERT INTO task (taskContent) VALUES ( $taskItem)");
    echo '<div class="task-in-list">' . $taskItem . '</div>';
}


