<?php
    include("db-connection.php");

    //$option = $_POST['opt'];
    $con = conection();
    $result = $con->query("SELECT MAX(nimg) AS btm FROM pubs");
    $value = mysqli_fetch_array($result);
    
    $result = request(6,$con,$value["btm"]);

    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Render image
        header("Content-Type: image/jpeg"); 
        echo $imgData['img']; 
    }else{
        echo 'Image not found...';
    }   
    mysqli_close($con);
?>    