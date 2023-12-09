<?php
    include_once 'classes/DBC.class.php';
    include_once 'classes/DBCHandler.class.php';

    $_tasks = $_POST['task'];
    if (isset($_POST['submit'])) {
        $taskobject = new DBCHandler();
        $taskobject->setTaskStmt($_tasks);
    }
?>