import {manageUserInfos} from "./user-infos.js";
import {getDateAndTime} from "./date.js";
import {getDadJoke} from "./dad-joke.js";
import {backgroundType} from "./background.js";
import {preventWelcomePage} from "./prevent-welcome.js";
import {taskInput} from "./add-input.js";
import {taskDone} from "./task-done.js";
import {deleteTasks} from "./delete-tasks.js";
import {taskUpdate}  from "./task-update.js";

manageUserInfos();
getDateAndTime();
getDadJoke();
backgroundType();
preventWelcomePage();
taskInput();
taskDone();
deleteTasks();
taskUpdate();
