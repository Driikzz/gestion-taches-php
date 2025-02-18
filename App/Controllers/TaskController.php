<?php

use App\models\Task;

require_once __DIR__ . '/../Models/Task.php';
require_once __DIR__ . '/../../config/database.php';


class TaskController {
    private $taskModel;

    public function __construct() {
        global $pdo;
        $this->taskModel = new Task($pdo);
    }

    public function showTasks() {
        session_start();

        if (!isset($_SESSION["user_id"])) {
            header("Location: /");
            exit();
        }

        $userId = $_SESSION["user_id"];
        $tasks = $this->taskModel->getAllTasks($userId);

        require_once __DIR__ . '/../../App/Views/tasks.php';
    }

    public function createTask() {
        session_start();

        if (!isset($_SESSION["user_id"])) {
            header("Location: /");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST["title"];
            $description = $_POST["description"];
            $status = "À faire";
            $userId = $_SESSION["user_id"];

            if ($this->taskModel->addTask($title, $description, $status, $userId)) {
                header("Location: /tasks");
                exit();
            } else {
                echo "Erreur lors de la création de la tâche.";
            }
        }
    }

    public function updateTask($task_id) {
        session_start();

        if (!isset($_SESSION["user_id"])) {
            header("Location: /");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $status = $_POST["status"];

            if ($this->taskModel->updateTaskStatus($task_id, $status)) {
                header("Location: /tasks");
                exit();
            } else {
                echo "Erreur lors de la mise à jour.";
            }
        }
    }

    public function deleteTask($task_id) {
        session_start();

        if (!isset($_SESSION["user_id"])) {
            header("Location: /");
            exit();
        }

        if ($this->taskModel->deleteTask($task_id)) {
            header("Location: /tasks");
            exit();
        } else {
            echo "Erreur lors de la suppression.";
        }
    }
}
