<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do list</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- HTMX -->
    <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
</head>

<body>
<div>
    <h1 id="to-do-title" class="m-5 text-center">My to do list</h1>
    <label for="background-choice"></label>
    <select id="background-choice" class="form-select">
        <option selected disabled> background </option>
        <option value="white-background">White</option>
        <option value="color-background">Colour</option>
        <option value="dark-mode">Dark</option>
    </select>
</div>

<div id="to-do-list-main-container" class="d-flex flex-column justify-content-center">
    <label for="task-input"></label>
    <input type="text"
           name="task_item"
           id="task-input"
           class="mb-3"
           placeholder="New task...">
    <button
            id="add-button"
            class="mb-4"
            hx-post="main.php"
            hx-include="#task-input"
            hx-target="#tasks-list"
            hx-trigger="click"
            hx-swap="beforeend">
        Add Task
    </button>
    <div id="tasks-list ">
        <?php
        require_once(__DIR__ . '/../src/list-tasks.php');
        ?>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>


