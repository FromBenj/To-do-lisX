<?php
if (isset($_POST['task']) && !empty($_POST['task'])) {
    $task = htmlspecialchars($_POST['task']);
    echo '<div class="task-in-list">' . $task . '</div>';
}
