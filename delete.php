<?php

    include_once("connection.php");

    $id = $_GET['id'];

    $delete = mysqli_query($mysqli, "DELETE FROM datamhs WHERE id='$id'");

    header("Location:index.php");
?>