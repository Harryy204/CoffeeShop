<?php
    function bill_show(){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        // // $sql = "SELECT * FROM hoadonchitiet";
        // mysqli_query($con, "SELECT * FROM hoadonchitiet");
        // return $result;
        $sql = "SELECT * FROM hoadonchitiet";
            $result = $con->query($sql);
    }
?>