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
      <style>
            body {
            color: #FFA500 !important; /* Set background color to red */
          }
      </style>
    </head>
    
    <nav class="navbar sticky-top navbar-expand-md navbar-light " style=" background-color: #00BFFF">
     <a class="navbar-brand" href="index.php">
         <img src="img/200.png" width="40" height="40">
     </a>

      </nav>

        
        <div id="">
            <div class="container">
                <div class="row">
                    
                        
                      <div class="col-sm-5 col-md-6 signup-left  text-center">
                            <div class=" d-none d-lg-block">
                              
                              <img class="mt-5"alt="klik logo" src="img/200.png">
                            
                            <br><br><br>
                            </div>
                            <?php
                            
                                if(isset($_GET['error']))
                                {
                                    if($_GET['error'] == 'emptyfields')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Fill In All The Fields
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'invalidmailuid')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Please enter a valid email and user name
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'invalidmail')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Please enter a valid email
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'invaliduid')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Please enter a valid user name
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'passwordcheck')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Passwords donot match
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'usertaken')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> This User name is already taken
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'invalidimagetype')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Invalid image type 
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'imguploaderror')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Image upload error, please try again
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'imgsizeexceeded')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Image too large
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'sqlerror')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Website Error: </strong> Contact admin to have the issue fixed
                                              </div>';
                                    }
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
                                  <div class="col d-none d-lg-block">
                        
                                <input type="submit" class="mt-3 btn btn-light btn-dark" style="color :#FFA500 " name="signup-submit" value="Signup">
                                
                                <br><br>
                                      
                                          <a  href="login.php">
                                              <i class="fa fa-sign-in fa-2x social-icon" aria-hidden="true"></i>
                                          </a> 
                                          <a href="contact.php">
                                              <i class="fa fa-envelope fa-2x social-icon" aria-hidden="true"></i>
                                          </a>
                                      </div>
                                
                            
                      </div>
                        
                        
                    
                    
                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 text-center d-lg-block">
                        
                        <h1 style="color:orange" class="mt-5 ">Signup and Lets Go!</h1>
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
                          <div class="col d-sm-block d-lg-none">
                          <input type="submit" class=" mb-3 btn btn-light btn-dark" style="color :#FFA500 " name="signup-submit" value="Signup">
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