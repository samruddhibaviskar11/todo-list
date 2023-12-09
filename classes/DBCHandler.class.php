<?php 
    class DBCHandler extends DBC
    {   
        public function getTasks()
        {
            $sqlQuery = "SELECT * FROM `tbl_tasks` WHERE Users_id = '".$this->getIPAddress()."';";
            $stmt = $this->ConnectDB()->query($sqlQuery);
            while($row = $stmt->fetch())
            {
                ?> <!--CARD -->
                <tr>
                <td data-label="No."><span><?php echo $row['task_id']; ?><span></td>
                <td data-label="Tasks"><span><?php echo $row['tasks_name']; ?><span></td>
                <td data-label="Action"><span><a href="DeleteTask.php?del_task=<?php echo $row['task_id'] ?>">Delete</a><span></td>
                </tr>
                <?php
            }
        }

        public function setTaskStmt($tasks)
        {
            $sqlQuery = "INSERT INTO `tbl_tasks` VALUES (?, ?, ?)";
            $stmt = $this->ConnectDB()->prepare($sqlQuery);
            $stmt->execute(['null', $tasks, $this->getIPAddress()]);

            header('location: index.php');
        }

        public function removeTaskStmt($tasks_id)
        {
            $sqlQuery = "DELETE FROM `tbl_tasks` WHERE task_id = ? AND Users_id = ?";
            $stmt = $this->ConnectDB()->prepare($sqlQuery);
            $stmt->execute([$tasks_id, $this->getIPAddress()]);

            header('location: index.php');
        }
    }
?>
