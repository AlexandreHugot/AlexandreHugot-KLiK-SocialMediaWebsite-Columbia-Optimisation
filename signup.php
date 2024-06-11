<?php

    session_start();
    define('TITLE',"Signup | KLiK");
    
    if(isset($_SESSION['userId']))
    {
        header("Location: index.php");
        exit();
    }
    include 'includes/HTML-head.php';
?>  
    </head>
    
    <body>

        
        <div id="signup">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 offset-sm-1">
                        
                        <div class="signup-left position-fixed text-center">
                            
                            <img src="img/200.png">
                            <br><br><br>
                            <?php
                            
                                if(isset($_GET['error']))
                                {
                                  switch($_GET['error'])
                                  {                               
                                    case 'emptyfields':
                                        $errorMessage = "Fill In All The Fields";
                                    break;
                                    case 'invalidmailuid' :
                                        $errorMessage = "Please enter a valid email and user name";
                                    break;
                                    case 'invalidmail' :
                                        $errorMessage = "Please enter a valid email";
                                    break;
                                    case 'invaliduid' :
                                        $errorMessage = "Please enter a valid user name";
                                    break;
                                    case 'passwordcheck' :
                                        $errorMessage = "Passwords donot match";
                                    break;
                                    case 'usertaken' :
                                        $errorMessage = "This User name is already taken";
                                    break;
                                    case 'invalidimagetype' :
                                        $errorMessage = "Invalid image type"; 
                                    break;
                                    case 'imguploaderror' :
                                        $errorMessage = "Image upload error, please try again";
                                    break;
                                    case 'imgsizeexceeded' :
                                        $errorMessage = "Image too large";
                                    break;
                                    case 'sqlerror' :
                                        $errorMessage = "Contact admin to have the issue fixed";
                                    break;
                                    case 'badpassword' :
                                        $errorMessage = "The password must contains at least : </br>
                                                        8 charcaters </br>
                                                        1 uppercase letter </br>
                                                        1 lowercase letter </br>
                                                        1 number </br>";
                                    break;
                                    default:
                                        $errorMessage = "Unknown error occurred";
                                    break;
                                  }
                                  echo '<div class="alert alert-danger" role="alert">
                                        <strong>Error: </strong>' . $errorMessage . '
                                        </div>';
                                }
                                else if (isset($_GET['signup']) == 'success')
                                {
                                    echo '<div class="alert alert-success" role="alert">
                                            <strong>Signup Successful</strong> Please Login from the login menu
                                          </div>';
                                }
                            ?>
                            <form id="signup-form" action="includes/signup.inc.php" method='post' 
                                  enctype="multipart/form-data">
                        
                                <input type="submit" class="btn btn-light btn-lg" name="signup-submit" value="Signup">
                                
                                <br><br>
                                
                                    <a  href="login.php">
                                        <i class="fa fa-sign-in fa-2x social-icon" aria-hidden="true"></i>
                                    </a> 
                                    <a href="contact.php">
                                        <i class="fa fa-envelope fa-2x social-icon" aria-hidden="true"></i>
                                    </a>
                                
                            
                        </div>
                        
                        
                    </div>
                    
                    <div class="col-sm-6 offset-sm-6 text-center">
                        
                        <h1 class="mt-5 text-muted">Signup and Lets Go!</h1>
                        <br><br><br>
                        
                        
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" id="name" name="uid" placeholder="Username" maxlength="25">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="mail" placeholder="Email">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="pwd-repeat">Confirmation</label>
                            <input type="password" class="form-control" id="pwd-repeat" name="pwd-repeat" 
                                   placeholder="Repeat Password">
                          </div>
                        </div>
                        <div class="form-row border-top my-3">
                            <div class="form-group col-md-12">
                                <h2>Optional</h2>
                            </div>
                        </div>
                        <div class="form-row ">
                          <div class="form-group col-md-6">
                            <label for="f-name">First Name</label>
                            <input type="text" class="form-control" id="f-name" name="f-name" placeholder="First name" maxlength="35">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="l-name">Last Name</label>
                            <input type="text" class="form-control" id="l-name" name="l-name" placeholder="Last name" maxlength="35">
                          </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 align-self-center">
                                <label >Gender</label><br>
                                <input id="toggle-on" class="toggle toggle-left" name="gender" value="m" type="radio" checked>
                                <label for="toggle-on" class="btn-r">M</label>
                                <input id="toggle-off" class="toggle toggle-right" name="gender" value="f" type="radio">
                                <label for="toggle-off" class="btn-r">F</label>
                            </div>
                            <div class="form-group col-md-6 align-self-center">
                                <img id="blah" class="rounded" src="#" alt="your image" class="img-responsive rounded"
                                     style="height: 200px; width: 190px; object-fit: cover;">
                                <br><br><label class="btn btn-primary ">
                                    Set Avatar <input type="file" id="imgInp" name='dp' hidden>
                              </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="headline">Headline</label>
                            <input type="text" class="form-control" id="headline" name="headline" 
                                   placeholder="Your profile headline" 
                                   maxlength="120">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea class="form-control" id="bio" name="bio" rows="6" maxlength="1000"
                            placeholder="Tell people about yourself"></textarea>
                          </div>
                    </form>
                </div>
                    
                </div>
                
            </div>
        </div>
        
        
        
                            
                            
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" ></script>
        
                            <script>
                                $('#blah').attr('src', 'uploads/default.png');
                                function readURL(input) {

                                    if (input.files && input.files[0]) {
                                      var reader = new FileReader();

                                      reader.onload = function(e) {
                                        $('#blah').attr('src', e.target.result);
                                      }

                                      reader.readAsDataURL(input.files[0]);
                                    }
                                  }

                                  $("#imgInp").change(function() {
                                    readURL(this);
                                  });
                                  
                                  
                            </script>
        
    </body>
</html>