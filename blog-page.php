<?php

    session_start();
    require 'includes/dbh.inc.php';
    
    define('TITLE',"Blog | KLiK");
    
    if(!isset($_SESSION['userId']))
    {
        header("Location: login.php");
        exit();
    }
    
    if(isset($_GET['id']))
    {
        $blogId = $_GET['id'];
    }
    else
    {
        header("Location: index.php");
        exit();
    }
    
    include 'includes/HTML-head.php'; 
    include 'includes/functions.php';
?> 
    </head>
    <body>

    <?php include 'includes/navbar.php'; ?>
      <div class="container">
        <div class="row">
          
            
              <?php include 'includes/profile-card.php'; ?>
              
          
            
            
          <div class="col-sm-9" id="user-section">
              
                <?php

                    $sql = "SELECT * FROM blogs INNER JOIN users ON blogs.blog_by = users.idUsers WHERE blog_id = ?";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        die('SQL error');
                    } else {
                    mysqli_stmt_bind_param($stmt, "s", $blogId);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                ?>
              

                <picture>
                    <source srcset="uploads/<?php echo pathinfo($row['blog_img'], PATHINFO_FILENAME); ?>.webp" type="image/webp">
                    <img class="blog-cover" src="uploads/<?php echo $row['blog_img']; ?>" alt="Blog Cover">
                </picture>

                <picture>
                    <source srcset="uploads/<?php echo pathinfo($row['userImg'], PATHINFO_FILENAME); ?>.webp" type="image/webp">
                    <img class="blog-author" src="uploads/<?php echo $row['userImg']; ?>" alt="Author Image">
                </picture>

              
              <div class="px-5">
                  
                  <br><br><br>
                  <h1><?php echo avoidHtmlInjections(ucwords($row['blog_title'])) ?></h1>
                  <br><br><br>
                  
                  <p class="text-justify"><?php echo avoidHtmlInjections($row['blog_content']) ?></p>
                  
                  <div class="blog-likes pr-1 pt-5">
                      
                      <h3>
                            <a href="includes/blog-vote.inc.php?blog=<?php echo $row['blog_id']; ?>" >
                                <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
                            </a>  
                            <?php echo $row['blog_votes']; ?>
                      </h3>
                      <br>
                      <p class="text-muted">Author: <?php echo avoidHtmlInjections(ucwords($row['uidUsers'])); ?></p>
                  </div>
                  
              </div>
              <?php
                    //execption si le blog n'est pas trouvé
                    } else {
                        die('Blog not found'); 
                    }
                }
                ?>
          </div>
            
        </div>


      </div> <!-- /container -->


<?php include 'includes/footer.php'; ?>



<?php include 'includes/HTML-footer.php'; ?>