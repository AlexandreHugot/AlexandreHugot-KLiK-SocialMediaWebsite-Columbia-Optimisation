<section id="cover">
        <div id="cover-caption">
            <div class="container">
                <div class="col-sm-10 offset-sm-1">
                    <img src='img/200.png'>
                    <h5 class="text-white">Spreading Ideas</h5>
                    <br>
                        <form method="POST" action="index?action=login-success" class="form-inline justify-content-center">
                            <div class="form-group">
                                <label class="sr-only">Name</label>
                                <input type="text" id="name" name="mailuid"
                                    class="form-control form-control-lg mr-1" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Email</label>
                                <input type="password" id="password" name="pwd"
                                    class="form-control form-control-lg mr-1" placeholder="Password" required>
                            </div>
                            <input type="submit" class="btn btn-dark btn-lg mr-1" name="login-submit" value="Login">
                        </form>
                        <br><a href="signup.php" class="btn btn-light btn-lg mr-1">Signup</a>
                    <br><br>
                    <div class="position-absolute login-icons">
                        <a href="contact.php">
                            <i class="fa fa-envelope fa-2x social-icon" aria-hidden="true"></i>
                        </a>
                        <a href="contact.php">
                            <i class="fa fa-github fa-2x social-icon" aria-hidden="true"></i>
                        </a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>

        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" ></script>
    </body>
</html>