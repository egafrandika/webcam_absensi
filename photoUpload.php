<?php

include('config.php');

if(isset($_POST['photoStore'])) {

    $endcoded_data = $_POST['photoStore'];
    $binary_data = base64_decode($endcoded_data);
    $datetime = date_create ()->format('Y-m-d H:i:s');

    $photoname = uniqid().'.jpeg';

    $result = file_put_contents('uploadPhoto/'.$photoname, $binary_data);

    $sql = "INSERT INTO filename (image) VALUES ('$photoname, $datetime')";
    mysqli_query($conn, $sql);

    if($result) {
        echo 'success';
    } else {
        echo die('Could not save image! check file permission.');
    }
}
?>