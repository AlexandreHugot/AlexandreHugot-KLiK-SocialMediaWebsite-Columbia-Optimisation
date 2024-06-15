<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <?php include 'includes/profile-card.php'; ?>
        </div>
            
        <div class="col-sm-9" id="user-section">

            <img class="blog-cover" src="uploads/" alt=" "/>  
            <img class="blog-author" src="uploads/" alt =" "/>

            <div class="px-5">
                  <br><br><br>

                  <h1><?php  ?></h1>
                  
                  <br><br><br>
                  <p class="text-justify"></p>
                  <div class="blog-likes pr-1 pt-5">
                      <h3>
                        <a href="includes/blog-vote.inc.php?blog=<?php echo $row['blog_id']; ?>" >
                            <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
                        </a>  
                        <?php echo $row['blog_votes']; ?>
                      </h3>
                      <br>
                      <p class="text-muted">Author: <?php echo ucwords($row['uidUsers']);?></p>
                </div>
            </div>
        </div>
    </div>
</div>
              