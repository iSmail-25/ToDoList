<?php 
    class Task {
        public $id;
        public $taskText;
        public $done;
        public $todolist_id;

        public function changeTaskStatus() {}
        public function deleteTask() {}
        public function changeTaskText($text) {}
    }
?>