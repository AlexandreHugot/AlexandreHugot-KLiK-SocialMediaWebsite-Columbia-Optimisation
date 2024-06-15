<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <?php include 'includes/profile-card.php'; ?>
        </div>

        <div class="col-sm-9" id="user-section">
            <img class="blog-cover" src="uploads/<?php echo $row['event_image']; ?>">
            <img class="blog-author" src="uploads/<?php echo $row['userImg']; ?>">

            <div class="px-5">
                <div class="text-center px-5">
                    <br><br><br>
                    <h1><?php echo ucwords($row['title']) ?></h1>
                    <br>
                    
                    <h6 class="text-muted"><?php echo ucwords($row['e_headline']) ?></h6>
                    <br><br><br>

                    <h3>Event Countdown</h3>
                    <br>

                    <div class="clock" style="margin-left:5%;">

                    </div>
                    <div class="message">

                    </div>
                    <br><br><br>

                    <p class="text-justify"><?php echo $row['description'] ?></p>

                    <br><br>
                    <p class="text-muted text-left">Organized By: <?php echo ucwords($row['uidUsers']); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
	var clock;	
	$(document).ready(function() {
		var clock;
		clock = $('.clock').FlipClock({
		    clockFace: 'DailyCounter',
		    autoStart: false,
		    callbacks: {
		        stop: function() {
		        	$('.message').html('<br><h1 class="text-success">The Event is Happening!</h1>')
		        }
		    }
		});
				    
		clock.setTime(<?php echo $diff_sec ?>);
		clock.setCountdown(true);
		clock.start();

	});
</script>