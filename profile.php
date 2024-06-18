<?php

    session_start();
    require 'includes/dbh.inc.php';
    include 'includes/functions.php';
    
    define('TITLE',"Profile | KLiK");
    
    if(!isset($_SESSION['userId']))
    {
        header("Location: login.php");
        exit();
    }
    
    if(isset($_GET['id']))
    {
        $userid = $_GET['id'];
    }
    else
    {
        $userid = $_SESSION['userId'];
    }
    
    $sql = "select * from users where idUsers = ".$userid;
    $stmt = mysqli_stmt_init($conn);    
    
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        die('SQL error');
    }
    else
    {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
    }
    
    include 'includes/HTML-head.php';   
?> 
</head>

<body>

    <?php include 'includes/navbar.php'; ?>
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            
              <?php include 'includes/profile-card.php'; ?>
              
          </div>
            
            
          <div class="col-sm-8 text-center" id="user-section">
                <picture>
                    <source type="image/webp" srcset="img/user-cover.webp">
                    <img alt="bannière" class="cover-img" src="img/user-cover.png" alt="Cover image">
                </picture>
                <picture>
                <source type="image/webp" srcset="uploads/<?php echo pathinfo($user['userImg'], PATHINFO_FILENAME); ?>.webp">
                        <img alt="photo de profil" class="profile-img" src="uploads/<?php echo $user['userImg']; ?>">
                </picture>
              
              <?php  
                    if ($user['userLevel'] === 1)
                    {
                        echo '
                        <picture>
                            <source type="image/webp" srcset="img/user-cover.webp">
                            <img alt="badge admin" id="admin-badge" src="img/admin-badge.png">
                        </picture>
                        ';
                    }
              ?>
              
              <h2><?php echo avoidHtmlInjections(ucwords($user['uidUsers'])); ?></h2>
              <h6><?php echo avoidHtmlInjections(ucwords($user['f_name']) . " " . ucwords($user['l_name'])); ?></h6>
              <h6><?php echo '<small class="text-muted">'.avoidHtmlInjections($user['emailUsers']).'</small>'; ?></h6>
              
              <?php 
                if ($user['gender'] == 'm')
                {
                    echo '<i class="fa fa-male fa-2x" aria-hidden="true" style="color: #709fea;"></i>';
                }
                else if ($user['gender'] == 'f')
                {
                    echo '<i class="fa fa-female fa-2x" aria-hidden="true" style="color: #FFA6F5;"></i>';
                }
                ?>
              
              <br><small><?php echo avoidHtmlInjections($user['headline']); ?></small>
              <br><br>
              <div class="profile-bio">
                  <small><?php echo avoidHtmlInjections($user['bio']);?></small>
              </div>
              
              
              <hr>
              <h3>Created Blogs</h3>
              <br><br>
              
              <?php
                    $sql = "select * from blogs "
                            . "where blog_by = ?";
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt, "s", $userid);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        
                        echo '<div class="container">'
                                    .'<div class="row">';
                        
                        $row = mysqli_fetch_assoc($result);
                        if(empty($row))
                        {
                            echo '<div class="col-sm-4" style="padding-bottom: 30px;"></div>
                                <div class="col-sm-4">
                                    <picture>
                                        <source type="image/webp" srcset="img/empty.webp">
                                        <img class="profile-empty-img" src="img/empty.png">
                                    </picture>
                                  </div>
                                  <div class="col-sm-4" style="padding-bottom: 30px;"></div>
                                    </div>
                                  </div>';
                        }
                        else
                        {
                            do
                            {       
                                    echo '<div class="col-sm-4" style="padding-bottom: 30px;">
                                        <div class="card user-blogs">
                                            <a href="blog-page.php?id='.$row['blog_id'].'">
                                            <picture>
                                                <source type="image/webp" srcset="uploads/'.$row['blog_img'].'.webp">
                                                <img class="card-img-top" src="uploads/'.$row['blog_img'].'" alt="Card image cap">
                                            </picture>
                                            <div class="card-block p-2">
                                              <p class="card-title">'.avoidHtmlInjections(ucwords($row['blog_title'])).'</p>
                                             <p class="card-text"><small class="text-muted">'
                                             .date("F jS, Y", strtotime($row['blog_date'])).'</small></p>
                                            </div>
                                            </a>
                                          </div>
                                          </div>';
                            }while ($row = mysqli_fetch_assoc($result));
                            echo '</div>'
                                    .'</div>';
                        }
                    }
              ?>
              
              <br><br>
              <hr>
              <h3>Created Forums</h3>
              <br><br>
              
              <?php
                    $sql = "select * from topics where topic_by = ?";
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt, "s", $userid);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        
                        echo '<div class="container">'
                                    .'<div class="row">';
                        
                        $row = mysqli_fetch_assoc($result);
                        if(empty($row))
                        {
                            echo '<div class="col-sm-4" style="padding-bottom: 30px;"></div>
                                <div class="col-sm-4">
                                    <picture>
                                        <source type="image/webp" srcset="img/empty.webp">
                                        <img class="profile-empty-img" src="img/empty.png">
                                    </picture>
                                  </div>
                                  <div class="col-sm-4" style="padding-bottom: 30px;"></div>
                                    </div>
                                  </div>';
                        }
                        else
                        {
                            do
                            {
                                echo '<div class="col-sm-4" style="padding-bottom: 30px;">
                                        <div class="card user-blogs">
                                            <a href="posts.php?topic='.$row['topic_id'].'">
                                            <picture>
                                                <source type="image/webp" srcset="img/forum-cover.webp">
                                                <img class="card-img-top" src="img/forum-cover.png" alt="Card image cap">
                                            </picture>
                                            <div class="card-block p-2">
                                              <p class="card-title">'.avoidHtmlInjections(ucwords($row['topic_subject'])).'</p>
                                             <p class="card-text"><small class="text-muted">'
                                             .date("F jS, Y", strtotime($row['topic_date'])).'</small></p>
                                            </div>
                                            </a>
                                          </div>
                                          </div>';
                            }while ($row = mysqli_fetch_assoc($result));
                            echo '</div>'
                                    .'</div>';
                        }
                    }
              ?>
              
              <br><br>
              <hr>
              <h3>Participated Polls</h3>
              <br><br>
              
              
              <?php
                    $sql = "select * from poll_votes v "
                            . "join polls p on v.poll_id = p.id "
                            . "join users u on p.created_by = u.idUsers "
                            . "where v.vote_by = ?";
                    $stmt = mysqli_stmt_init($conn);    

                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        die('SQL error');
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt, "s", $userid);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        
                        echo '<div class="container">'
                                    .'<div class="row">';
                        
                        $row = mysqli_fetch_assoc($result);
                        if(empty($row))
                        {
                            echo '<div class="col-sm-4" style="padding-bottom: 30px;"></div>
                                <div class="col-sm-4">
                                <picture>
                                    <source type="image/webp" srcset="img/empty.webp">
                                    <img class="profile-empty-img" src="img/empty.png">
                                </picture>
                                  </div>
                                  <div class="col-sm-4" style="padding-bottom: 30px;"></div>
                                    </div>
                                  </div>';
                        }
                        else
                        {
                            do
                            {   
                                echo '<div class="col-sm-4" style="padding-bottom: 30px;">
                                        <div class="card user-blogs">
                                            <a href="poll.php?poll='.$row['poll_id'].'">
                                            <picture>
                                                <source type="image/webp" srcset="img/poll-cover.webp">
                                                <img class="card-img-top" src="img/poll-cover.png" alt="Card image cap">
                                            </picture>
                                            <div class="card-block p-2">
                                              <p class="card-title">'.avoidHtmlInjections(ucwords($row['subject'])).'</p>
                                             <p class="card-text"><small class="text-muted">'
                                             .date("F jS, Y", strtotime($row['created'])).'</small></p>
                                            </div>
                                            </a>
                                          </div>
                                          </div>';
                            }while ($row = mysqli_fetch_assoc($result));
                            echo '</div>'
                                    .'</div>';
                        }
                    }
              ?>
              
              
              <br><br>
              
              
              
          </div>
          <div class="col-sm-1">
            
          </div>
        </div>


      </div> <!-- /container -->

<?php include 'includes/footer.php'; ?>




<?php include 'includes/HTML-footer.php'; ?>