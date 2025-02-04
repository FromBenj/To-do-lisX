<?php

require_once(__DIR__ . '/../config/config.php');

function deleteAllTask($db)
{

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        //Remove a task
        if (isset($_GET['delete_id']) && !empty($_GET['delete_id'])) {
            var_dump($_GET['delete_id']);
        }


        //Remove all
        if (isset($_GET['full_delete']) && !empty($_GET['full_delete'])) {

            $db->exec('DELETE FROM task');
        }
    }
}


