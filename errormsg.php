<?php
session_start();




if(isset($_SESSION['japan'])){
    echo"$_SESSION[japan]";

    unset($_SESSION['japan']);
}







?>