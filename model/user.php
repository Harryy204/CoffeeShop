<?php
    function user_delete($id){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        mysqli_query($con, "DELETE FROM `nguoidung` WHERE id = $id");
    }
    
?>