<?php
    $cn = mysqli_connect("localhost","root","","ingexis");
    $rs = mysqli_query($cn,"call login_usuario('jesdsaus12dsadsa0190240.8@gmail.com','1sad23sad4d')");
    echo print_r($rs);
    mysqli_close($cm);
?>