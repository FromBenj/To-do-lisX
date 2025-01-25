<?php

require_once(__DIR__ . '/../config/config.php');
$db = getDatabase();

//Remove all
if ($db && isset($_POST['full_delete']) && $_POST['full_delete'] === "true") {
    $db->exec('DELETE FROM task');
}

