<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do list</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- HTMX -->
    <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
</head>

<body>
<h1 class="text-center m-5">My to do list</h1>
    <label for="task-input"></label>
    <input type="text"
        name="task_item"
        id="task-input"
        placeholder="New task...">
<button
        id="add-button"
        hx-post="main.php"
        hx-include="#task-input"
        hx-target="#tasks-list"
        hx-trigger="click"
        hx-swap="beforeend">
        Add Task
    </button>
    <div id="tasks-list">
        <?php
            require_once(__DIR__ . '/../src/list-tasks.php');
        ?>
    </div>
</body>
</html>


