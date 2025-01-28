<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do list</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- HTMX -->
    <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
</head>

<body>
<?php
require_once('main.php');
?>
<div id="welcome" class="welcome-background">
    <div id="welcome-content" class="p-5 d-flex flex-column justify-content-between">
        <div id="user-container" class="d-flex flex-column align-items-center">
            <h1 id="greetings-header" class="mb-4">Hello <span id="user-name"></span>!</h1>
            <div id="new-user-container" class="d-flex flex-column justify-content-center">
                <h2 class="mb-3">What's your name again?</h2>
                <label for="new-user-name"></label>
                <input type="text"
                       name="new_user_name"
                       id="new-user-name"
                       class="bg-white mx-2 d-block"
                       placeholder="Michael Jackson...">
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div id="date" class="mx-3  h5 d-flex flex-column align-items-center justify-content-center">
                <div id="weekday"></div>
                <div id="date-number" class="fw-bold"></div>
            </div>
            <div id="time" class="fw-bold h3 text-white"></div>
        </div>
        <div class="d-flex flex-column align-items-center">
            <h3>A good day always starts with a great dad joke:</h3>
            <h4 id="dad-joke" class="fst-italic mb-5 text-white"></h4>
            <div>
                <h3 id="open-page-button" class="mt-5 mb-0">Let's go!</h3>
            </div>
        </div>
    </div>
</div>
<div id="to-do-list-page" class="d-none">
    <div>
        <h1 id="to-do-title" class="m-5 text-center">My to do list</h1>
        <label for="background-choice"></label>
        <select id="background-choice" class="form-select">
            <option selected disabled> background</option>
            <option value="white-background">White</option>
            <option value="color-background">Colour</option>
            <option value="dark-mode">Dark</option>
        </select>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div id="to-do-list-main-container" class="col-12 col-lg-8 d-flex flex-column justify-content-center m-4">
                <div class=" rounded p-4 d-flex flex-lg-row flex-column justify-content-center align-items-center">
                    <label for="task-input"></label>
                    <input type="text"
                           name="task_item"
                           id="task-input"
                           class="bg-white mx-2"
                           placeholder="New task...">
                    <button
                            id="add-button"
                            class="my-lg-2 mt-2 mx-2"
                            hx-post="main.php"
                            hx-include="#task-input"
                            hx-target="#tasks-list"
                            hx-trigger="click"
                            hx-swap="afterbegin"
                    >
                        Add Task
                    </button>
                </div>
                <div id="tasks-list" class="rounded py-4 d-flex flex-column align-items-center bg-white">
                    <?php
                    $db = getDatabase();
                    listTasks($db);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="delete-all-container">
        <button
                id="delete-all"
                hx-post="main.php"
                hx-trigger="click"
                hx-vals='{"full_delete": "true"}'
                hx-swap="beforeend"
                hx-swap-oob="true"
        >
            Delete all tasks
        </button>
    </div>
</div>

<script src="assets/js/user-infos.js"></script>
<script src="assets/js/date.js"></script>
<script src="assets/js/dad-joke.js"></script>
<script src="assets/js/background.js"></script>
<script src="assets/js/add-input.js"></script>
<script src="assets/js/task-done.js"></script>
</body>
</html>


