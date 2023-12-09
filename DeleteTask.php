<?php 
    include_once 'classes/DBC.class.php';
    include_once 'classes/DBCHandler.class.php';
    
    $id = $_GET['del_task'];
    if (isset($_GET['del_task'])) {
        $taskobject = new DBCHandler();
        $taskobject->removeTaskStmt($id);
    }
?>