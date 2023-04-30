<?php
if (session_id() == "") {
	session_start();
}
require __DIR__ . '/vendor/autoload.php';
include('connection.php');
$ref_table = "cred";
$err = "";
if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $phone = $_POST['mobile'];

    $getdata = $database->getReference($ref_table)->getChild($_SESSION['key'])->getValue();

    if($getdata > 0){
        $updateData = [
            'mobile' => $phone,
            'user' => $user,
            'pass' => $pass
        ]; //this is the schema
        $ref_table = 'cred';
        $fetch_data = $database->getReference($ref_table)->getValue();
        foreach($fetch_data as $key => $row){
            //check if username is not in the database;
            if($key == $_SESSION['key']){
                continue;
            }

            if($row['user']==$user){
                $err = "Username is already registered.";
            }
            //Check if phone number is not in the database
            if($row['mobile'] == $phone){
                $err = "Mobile number is already registered.";
            }
        }


        
        if($err == ""){

            //edit the user value in schedule
            $get_data = $database->getReference('schedule')->orderByChild('user')->equalTo($_SESSION['user'])->getValue();
            foreach($get_data as $key2=>$row2){
                $database->getReference("schedule/$key2/user")->update($user);
            }
            //edits the value in the database
            $ref_table = "cred/".$_SESSION['key'];
            $database->getReference($ref_table)->update($updateData);
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            $_SESSION['mobile'] = $mobile;
            header("Location: Homepage.php");
        }else{
            echo "<script>alert('$err');</script>";
        }
    }else{
        echo "Something went wrong";
    }


}
?>