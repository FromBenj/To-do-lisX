<?php

require_once(__DIR__ . '/../config/config.php');

function deleteAllTask($db)
{
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        //Remove a task
        if (isset($_GET['delete_id']) && !empty($_GET['delete_id'])) {
            $deletedTaskId = htmlspecialchars($_GET['delete_id']);
           $deleteTask = $db->prepare("DELETE FROM task WHERE id = :id");
           $deleteTask->bindValue(':id', $deletedTaskId);
            $deleteTask->execute();
        }
        //Remove all
        if (isset($_GET['full_delete']) && !empty($_GET['full_delete'])) {
            $db->exec('DELETE FROM task');
        }
    }
}


