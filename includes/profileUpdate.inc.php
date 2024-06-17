<?php
session_start();

if (isset($_POST['update-profile']))
{
    
    require 'dbh.inc.php';
    
    
    $email = $_POST['email'];
    $f_name = $_POST['f-name'];
    $l_name = $_POST['l-name'];
    $oldPassword = $_POST['old-pwd'];
    $password = $_POST['pwd'];
    $passwordRepeat  = $_POST['pwd-repeat'];
    $gender = $_POST['gender'];
    $headline = $_POST['headline'];
    $bio = $_POST['bio'];
    
    
    if (empty($email))
    {
        echo "<script type='text/javascript'>
                        alert('Please enter an email.');
                        window.location.href = '../edit-profile.php';
                      </script>";
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<script type='text/javascript'>
                        alert('Email is invalid.');
                        window.location.href = '../edit-profile.php';
                      </script>";
        exit();
    }
    else
    {
        $sql = "SELECT * FROM users WHERE uidUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../edit-profile.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION['userUid']);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);
           
            
            if($row = mysqli_fetch_assoc($result))
            {
                $pwdChange = false;
                
                if( (!empty($password) || !empty($passwordRepeat)) && empty($oldPassword))
                {
                    echo "<script type='text/javascript'>
                        alert('Please enter your old password.');
                        window.location.href = '../edit-profile.php';
                      </script>";
                    exit();
                }
                else if (!(preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password) && preg_match('/[0-9]/', $password) && strlen($password) >= 8))
                {
                    echo "<script type='text/javascript'>
                        alert('Your new password must contains at least 1 uppercase letter, 1 lower case letter, 1 number and 8 characters.');
                        window.location.href = '../edit-profile.php';
                      </script>";
                    exit();
                }
                if( empty($password) && empty($passwordRepeat) && !empty($oldPassword))
                {
                    echo "<script type='text/javascript'>
                        alert('Please enter your new password.');
                        window.location.href = '../edit-profile.php';
                      </script>";
                    exit();
                }
                if (!empty($password) && empty($passwordRepeat) && !empty($oldPassword))
                {
                    echo "<script type='text/javascript'>
                        alert('Please your new password.');
                        window.location.href = '../edit-profile.php';
                      </script>";
                    exit();
                }
                if (empty($password) && !empty($passwordRepeat) && !empty($oldPassword))
                {
                    echo "<script type='text/javascript'>
                        alert('Please your new password.');
                        window.location.href = '../edit-profile.php';
                      </script>";
                    exit();
                }
                if (!empty($password) && !empty($passwordRepeat) && !empty($oldPassword))
                {
                    $pwdCheck = password_verify($oldPassword, $row['pwdUsers']);
                    if ($pwdCheck == false)
                    {
                        echo "<script type='text/javascript'>
                        alert('Your old password is incorrect.');
                        window.location.href = '../edit-profile.php';
                      </script>";
                        exit();
                    }
                    if ($oldPassword == $password)
                    {
                        echo "<script type='text/javascript'>
                        alert('Your new password must be different than your old password');
                        window.location.href = '../edit-profile.php';
                      </script>";
                        exit();
                    }
                    if ($password !== $passwordRepeat)
                    {
                        header("Location: ../edit-profile.php?error=passwordcheck&mail=".$email);
                        exit();
                    }
                    $pwdChange = true;
                }
                
                    

                    $FileNameNew = $_SESSION['userImg'];
                    require 'upload.inc.php';
                    
                    $sql = "UPDATE users "
                            . "SET f_name=?, "
                            . "l_name=?, "
                            . "emailUsers=?, "
                            . "gender=?, "
                            . "headline=?, "
                            . "bio=?, "
                            . "userImg=? ";
                    
                    if ($pwdChange)
                    {
                        $sql .= ", pwdUsers=? "
                                . "WHERE uidUsers=?;";
                    }
                    else
                    {
                        $sql .= "WHERE uidUsers=?;";
                    }
                    
                    
                    $stmt = mysqli_stmt_init($conn);
                    
                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: ../edit-profile.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        if ($pwdChange)
                        {
                            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "sssssssss", $f_name, $l_name, $email,
                                $gender, $headline, $bio, 
                                $FileNameNew, $hashedPwd, $_SESSION['userUid']);
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt, "ssssssss", $f_name, $l_name, $email,
                                $gender, $headline, $bio, 
                                $FileNameNew, $_SESSION['userUid']);
                        }
                        

                        
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        

                        $_SESSION['emailUsers'] = $email;
                        $_SESSION['f_name'] = $f_name;
                        $_SESSION['l_name'] = $l_name;
                        $_SESSION['gender'] = $gender;
                        $_SESSION['headline'] = $headline;
                        $_SESSION['bio'] = $bio;
                        $_SESSION['userImg'] = $FileNameNew;

                        echo "<script type='text/javascript'>
                        alert('Your password has been changed succesfully.');
                        window.location.href = '../edit-profile.php';
                      </script>";
                        exit();
                    }
                
            }
            else 
            {
                header("Location: ../edit-profile.php?error=sqlerror");
                exit();
            }
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../edit-profile.php");
    exit();
}