
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <!-- Displaying the user profile card -->
            <?php include 'assets/profile-card.php'; ?>
        </div>

        <div class="col-sm-7">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="forum-tab" data-toggle="tab" href="#forum" role="tab" aria-controls="forum" aria-selected="true">
                        Recent Forums
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" id="blog-tab" data-toggle="tab" href="#blog" role="tab" aria-controls="blog" aria-selected="false">
                        Recent Blogs
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" id="poll-tab" data-toggle="tab" href="#poll" role="tab" aria-controls="poll" aria-selected="false">
                        Recent Polls
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" id="event-tab" data-toggle="tab" href="#event" role="tab" aria-controls="event" aria-selected="false">
                        Recent Events
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div> 