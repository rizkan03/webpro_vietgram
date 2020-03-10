<?php 
    session_start();
    include 'koneksi.php';

    function EditProfile($data, $koneksi)
    {
        $id = $_SESSION["user_id"];
        $name = $data["name"];
        $username = $data["username"];
        $website = $data["website"];
        $bio = $data["bio"];
        $email = $data["email"];
        $phonenumber = $data["phonenumber"];
        $gender = $data['gender'];

        $query = "UPDATE profile SET name = '$name', username = '$username'  , website = '$website', bio = '$bio', email = '$email', phonenumber = '$phonenumber' WHERE id = $id  ";
        $result = mysqli_query($koneksi, $query);
        return $result;
    }

    if (isset($_POST["submit"])) {
        if (EditProfile($_POST, $koneksi)) {
            header("Location: profile.php");
        } else {
            header("Location: edit-profile.php");
        }
    }
?>
