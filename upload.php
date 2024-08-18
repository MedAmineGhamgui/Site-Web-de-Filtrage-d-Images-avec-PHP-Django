<?php

include 'connection.php';
function gris($img)
{
    $response1 = file_get_contents('http://127.0.0.1:8000/api/' . $img . 'imggris?format=json');
    $my_array1 = json_decode($response1);
    $s = 'TestWebApi/';
    return $s . $my_array1->p;
}
function bleu($img)
{
    $response1 = file_get_contents('http://127.0.0.1:8000/api/' . $img . 'bleu?format=json');
    $my_array1 = json_decode($response1);
    $s = 'TestWebApi/';
    return $s . $my_array1->p;
}

function green($img)
{
    $response1 = file_get_contents('http://127.0.0.1:8000/api/' . $img . 'green?format=json');
    $my_array1 = json_decode($response1);
    $s = 'TestWebApi/';
    return $s . $my_array1->p;
}
function hsb($img)
{
    $response1 = file_get_contents('http://127.0.0.1:8000/api/' . $img . 'imghsb?format=json');
    $my_array1 = json_decode($response1);
    $s = 'TestWebApi/';
    return $s . $my_array1->p;
}
function inverce($img)
{
    $response1 = file_get_contents('http://127.0.0.1:8000/api/' . $img . 'imginverce?format=json');
    $my_array1 = json_decode($response1);
    $s = 'TestWebApi/';
    return $s . $my_array1->p;
}
function red($img)
{
    $response1 = file_get_contents('http://127.0.0.1:8000/api/' . $img . 'red?format=json');
    $my_array1 = json_decode($response1);
    $s = 'TestWebApi/';
    return $s . $my_array1->p;
}
function samdp($img)
{
    $response1 = file_get_contents('http://127.0.0.1:8000/api/' . $img . 'modesandp?format=json');
    $my_array1 = json_decode($response1);
    $s = 'TestWebApi/';
    return $s . $my_array1->p;
}
function seuil($img)
{
    $response1 = file_get_contents('http://127.0.0.1:8000/api/' . $img . 'seuil?format=json');
    $my_array1 = json_decode($response1);
    $s = 'TestWebApi/';
    return $s . $my_array1->p;
}
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];
    $img_upload_path = "";

    if ($error === 0) {
        if ($img_size > 12500000) {
            $em = "Sorry ,your file is too large";
            header("Location:index.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png", "jfif");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'TestWebApi/api/images/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                $g = gris($new_img_name);
                $inv = inverce($new_img_name);
                $hsb = hsb($new_img_name);
                $r = red($new_img_name);
                $b = bleu($new_img_name);
                $g1 = green($new_img_name);
                $mode = samdp($new_img_name);
                $seuil = seuil($new_img_name);
                //Insert fel database
                // $sql = "INSERT INTO images(image_url) VALUES('$new_img_name')";
                $sql = "INSERT INTO `images`( `image_url`, `gris`, `inverse`, `hsb`, `seuil`, `bleu`, `green`, `red`, `modesandpadd`) VALUES ('$new_img_name','$g','$inv','$hsb','$seuil','$b','$g1','$r','$mode')";
                mysqli_query($conn, $sql);
                header("Location:view.php");
            } else {
                $em = "unknowm error occured!";
                header("Location:index.php?error=$em");
            }
            echo $img_upload_path;
        }
    } else {
        $em = "unknowm error occured!";
        header("Location:index.php?error=$em");
    }
} else {
    header("Location:index.php");
}
