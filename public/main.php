<?php
require_once(__DIR__ . '/../config/config.php');
$db = getDatabase();
require_once(__DIR__ . '/../src/list-tasks.php');
require_once(__DIR__ . '/../src/add_task.php');
addTask($db);

require_once(__DIR__ . '/../src/delete.php');




