<?php
session_start();
include "dbconnect.php";

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nume = validate($_POST['numef']);
    $prenume = validate($_POST['prenumef']);
    $email = validate($_POST['emailf']);
    $pass = validate($_POST['passwordf']);
    $passv = validate($_POST['passwordfv']);
    $ok=1;

    if(empty($nume))
    {
        header("Location: ../pagini/formularregister.php?errorf=Nu ati introdus un nume");
        $ok=0;
        exit();
    }

    if(empty($prenume))
    {
        header("Location: ../pagini/formularregister.php?errorf=Nu ati introdus un prenume");
        $ok=0;
        exit();
    }

    if(empty($email))
    {
        header("Location: ../pagini/formularregister.php?errorf=Nu ati introdus email-ul");
        $ok=0;
        exit();
    }

    if(empty($pass))
    {
        header("Location: ../pagini/formularregister.php?errorf=Nu ati introdus o parola");
        $ok=0;
        exit();
    }

    if($ok=1)
    {
            if($pass == $passv)
            {
                $pass = md5($pass);
                $verifyifemailexists = "SELECT * FROM utilizatori WHERE email='$email'";
                $emailverifyresult = mysqli_query($connection,$verifyifemailexists);
                if(mysqli_num_rows($emailverifyresult)>0){
                    header("Location: ../pagini/formularregister.php?errorf=Deja este facut un cont cu acest email!");
                    exit();
                }
                $sql = "INSERT INTO utilizatori (email,parola,nume,prenume)
                VALUES ('$email','$pass','$nume','$prenume')";
                $result = mysqli_query($connection,$sql);
                if($result){
                    header("Location: ../index.php?success=Inregistrarea a fost efectuata cu succes!");
                    exit();
                }
                else{
                    header("Location: ../pagini/formularregister.php?errorf=Eroare la database...");
                    exit();
                }
            }
            else
            {
                header("Location: ../pagini/formularregister.php?errorf=Parolele nu coincid!");
                exit();
            }
    }
?>