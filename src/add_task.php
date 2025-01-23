<?php
require_once(__DIR__ . '/../config/config.php');
$db = createDatabase();

if ($db && isset($_POST['task_item']) && !empty($_POST['task_item'])) {
    $taskItem = htmlspecialchars($_POST['task_item']);
    $check = $db->prepare("INSERT INTO task (taskContent) VALUES (:taskContent)");
    $check->bindValue(':taskContent', $taskItem);
    $check->execute();
    echo "
    <div class='task-in-list'>$taskItem</div>
    <i class='task-done fa-solid fa-check'></i>
";
}


