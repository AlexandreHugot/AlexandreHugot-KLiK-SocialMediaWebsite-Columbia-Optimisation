<div id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <!-- Displaying the user profile card -->
                <?php include 'assets/profile-card.php'; ?>
            </div>


            <div class="col-sm-7">
                <div class="text-center p-3">
                    <img src="img/200.png">
                        <h2 class='text-muted'>DASHBOARD</h2>
                    <br>
                </div>
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="forum-tab" data-toggle="tab" href="#forum" role="tab" aria-controls="forum" aria-selected="true">
                            Recent Forums
                        </a>
                        <?php

                            foreach ($listForums as $forum) {
                                    echo '<div class="col-md-6">
                                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                                    <a href="posts.php?topic='.$forum['topic_id'].'">
                                    <img class="card-img-left flex-auto d-none d-lg-block blogindex-cover" 
                                            src="img/forum-cover.png" alt="Card image cap">
                                            </a>
                                    <div class="card-body d-flex flex-column align-items-start">
                                        <strong class="d-inline-block mb-2 text-primary text-center  ml-auto">
                                            <i class="fa fa-chevron-up" aria-hidden="true"></i><br>'.$forum['upvotes'].'
                                        </strong>
                                        <h6 class="mb-0">
                                        <a class="text-dark" href="posts.php?topic='.$forum['topic_id'].'">'
                                            .substr(ucwords($forum['topic_subject']),0,15).'...</a>
                                        </h6>
                                        <small class="mb-1 text-muted">'.date("F jS, Y", strtotime($forum['topic_date'])).'</small>
                                        <small class="card-text mb-auto">Created By: '.ucwords($forum['uidUsers']).'</small>
                                        <a href="posts.php?topic='.$forum['topic_id'].'">Go To Forum</a>
                                    </div>
                                    </div>
                                </div>';
                            }
                        ?>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="blog-tab" data-toggle="tab" href="#blog" role="tab" aria-controls="blog" aria-selected="false">
                            Recent Blogs
                        </a>
                        <?php

                                foreach ($listBlogs as $blog) {  
                                    echo '<div class="col-md-6">
                                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                                    <div class="card-body d-flex flex-column align-items-start">
                                        <strong class="d-inline-block mb-2 text-primary">
                                            <i class="fa fa-thumbs-up" aria-hidden="true"></i> '.$blog['blog_votes'].'
                                        </strong>
                                        <h6 class="mb-0">
                                        <a class="text-dark" href="blog-page.php?id='.$blog['blog_id'].'">'.substr($blog['blog_title'],0,10).'...</a>
                                        </h6>
                                        <small class="mb-1 text-muted">'.date("F jS, Y", strtotime($blog['blog_date'])).'</small>
                                        <small class="card-text mb-auto">'.substr($blog['blog_content'],0,40).'...</small>
                                        <a href="blog-page.php?id='.$blog['blog_id'].'">Continue reading</a>
                                    </div>
                                    <a href="blog-page.php?id='.$blog['blog_id'].'">
                                    <img class="card-img-right flex-auto d-none d-lg-block blogindex-cover" 
                                            src="uploads/'.$blog['blog_img'].'" alt="Card image cap">
                                    </a>
                                    </div>
                                    </div>';
                                }
                            ?>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="poll-tab" data-toggle="tab" href="#poll" role="tab" aria-controls="poll" aria-selected="false">
                            Recent Polls
                        </a>
                        <?php

                                foreach ($listPolls as $poll)
                                {
                                    echo '<a href="poll.php?poll='.$poll['id'].'">
                                                        <div class="media text-muted pt-3">
                                                            <img src="img/poll-cover.png" alt="" class="mr-2 rounded div-img poll-img">
                                                            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray ">
                                                            <strong class="d-block text-gray-dark">'.ucwords($poll['subject']).'</strong></a>
                                                                '.date("F jS, Y", strtotime($poll['created'])).'
                                                                <br><br>
                                                                <span class="text-primary" >
                                                                        '.$poll['votes'].' User(s) have voted
                                                                </span>
                                                            </p>
                                                            <span class="text-right">';

                                                    if($poll['locked'] === 1)
                                                    {
                                                        echo '<br><b class="small text-muted">[Locked Poll]</b>';
                                                    }
                                                    else
                                                    {
                                                        echo '<br><b class="small text-success">[Open Poll]</b>';
                                                    }

                                                    echo '</span>
                                                            </div>';
                                }
                            ?>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="event-tab" data-toggle="tab" href="#event" role="tab" aria-controls="event" aria-selected="false">
                            Recent Events
                        </a>
                        <?php

                        foreach($listEvents as $event) {

                            $earlier = date_create();
                            $later = date_create($event['event_date']);
                            $diff = $later->diff($earlier)->format("%a");

                            echo '<a href="event-page.php?id='.$event['event_id'].'">
                                <div class="media text-muted pt-3">
                                    <img src="uploads/'.$event['event_image'].'" alt="" class="mr-2 rounded div-img poll-img">
                                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                    <strong class="d-block text-gray-dark">'.ucwords($event['title']).'</strong></a>
                                    '.date("F jS, Y", strtotime($event['event_date'])).'<br><br>
                                    <span class="text-primary" >'.$diff.' days remaining </span>
                                    </p>
                                    <span class="text-primary text-right">';

                            if ($_SESSION['userLevel'] == 1 || $_SESSION['userId'] == $event['event_by'])
                            {
                                echo '<a href="includes/delete-event.php?id='.$event['event_id'].'&page=forum" >
                                        <i class="fa fa-trash" aria-hidden="true" style="color: red;"></i>
                                    </a>
                                    </span>';
                            }
                            else
                            {
                                echo '</span>';
                            }
                            echo '</span>
                                    </div>';
                    }
            ?>
                    </li>
                </ul>
            </div>

            <div class="col-sm-2">

                        <div class="text-center p-3 mt-5">
                            <a href="team.php" target="_blank">
                                <i class="creater-icon fa fa-users fa-5x" aria-hidden="true"></i>
                            </a>
                            <p><br>THE CREATORS</p>
                        </div>

                        <a href="forum.php" class="btn btn-warning btn-lg btn-block">KLiK Forum</a>
                        <a href="hub.php" class="btn btn-secondary btn-lg btn-block">KLiK Hub</a>
                        <br><br><br>
                        <a href="create-topic.php" class="btn btn-warning btn-lg btn-block">Create a Forum</a>
                        <a href="create-blog.php" class="btn btn-secondary btn-lg btn-block">Create a Blog</a>

                    </div>
        </div>
    </div> 
</div>