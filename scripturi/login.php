<?php
session_start();
include "dbconnect.php";

    if(isset($_POST['emailf']) && isset($_POST['passwordf'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $email = validate($_POST['emailf']);
        $pass = validate($_POST['passwordf']);

        if(empty($email)){
            header("Location: ../pagini/formularlogin.php?errorf=Emailul este necesar");
            exit();
        }else if(empty($pass)){
            header("Location: ../pagini/formularlogin.php?errorf=Parola este necesara");
            exit();
        }else{
            $pass=md5($pass);
            $sql = "SELECT * FROM utilizatori WHERE email='$email' AND parola='$pass'";
            $result = mysqli_query($connection, $sql);
            
            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if($row['email'] === $email && $row['parola'] === $pass){
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['prenume'] = $row['prenume'];
                    $_SESSION['nume'] = $row['nume'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: ../index.php?success=Logat cu succes!");
                    exit();
                }
                    else{
                        header("Location: ../pagini/formularlogin.php?errorf=Email sau parolă incorecte");
                        exit();
                    }
            }
            else{
                header("Location: ../pagini/formularlogin.php?errorf=Email sau parolă incorecte");
                exit();
            }
        }
    }
    else{
        header("Location: ../pagini/formularlogin.php?errorf=da");
        exit();
    }
?>