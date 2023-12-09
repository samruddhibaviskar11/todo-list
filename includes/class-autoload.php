<?php 
    spl_autoload_register('ClassAutoLoader');

    function ClassAutoLoader($classname)
    {
        $path = 'classes/';
        $extension = '.class.php';
        $fileName = $path . $classname . $extension;
        
        if(!file_exists($fileName))
        {
            return false;
        }

        include_once $path . $classname . $extension;
    }
?>