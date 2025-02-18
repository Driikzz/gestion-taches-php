<?php

namespace App\Models;
use PDO;
use PDOException;

class Task {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAllTasks($user_id) {
        try {
            $stmt = $this->db->prepare('SELECT * FROM tasks WHERE user_id = :user_id');
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    public function addTask($title, $description, $status, $user_id) {
        try {
            $stmt = $this->db->prepare('INSERT INTO tasks (title, description, status, user_id) VALUES (:title, :description, :status, :user_id)');
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateTaskStatus($task_id, $status) {
        try {
            $stmt = $this->db->prepare('UPDATE tasks SET status = :status WHERE id = :task_id');
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteTask($task_id) {
        try {
            $stmt = $this->db->prepare('DELETE FROM tasks WHERE id = :task_id');
            $stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
