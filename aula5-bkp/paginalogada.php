<?php
    session_start();
    if(!isset($_SESSION['id_user']))
    {
        header("location: index.php");
        exit;
    }

require "head.php";
require "menu.php";
require "sidebar.php";
require "content.php";
require "footer.php";

?>


  
  
  

   
