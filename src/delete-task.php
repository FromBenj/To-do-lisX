<?php

require_once(__DIR__ . '/../config/config.php');

function deleteAllTask($db)
{

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
//        //Remove a task
//        if (isset($_GET['data-id']) && !empty($_GET['data-id'])) {
//            var_dump($_GET['data-id']);
//        }


        //Remove all
        if (isset($_GET['full_delete']) && !empty($_GET['full_delete'])) {

            $db->exec('DELETE FROM task');
        }
    }
}


