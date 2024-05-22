<?php

    session_start();
    require 'includes/dbh.inc.php';
    define('TITLE',"Event | KLiK");
    
    if(!isset($_SESSION['userId']))
    {
        header("Location: login.php");
        exit();
    }
    
    if(isset($_GET['id']))
    {
        $eventId = $_GET['id'];
    }
    else
    {
        header("Location: index.php");
        exit();
    } 
    
    include 'includes/HTML-head.php';
?> 

        <link href="css/flipclock.css" rel="stylesheet">
    </head>
    
    <body>
        
        <?php include 'includes/navbar.php'; ?>    

        <div class="container">
            <div class="row">
                <div class="col-sm-3">

                    <?php include 'includes/profile-card.php'; ?>

                </div>

                <div class="col-sm-9" id="user-section">

                    <?php

                        try{
                                                
                            /**
                             * On essaie de se connecter à la base de donnée, si on y arrive pas on affiche un message d'erreur à l'écran ------------------
                             */
                            $sql = "select e.event_date, e.event_id, e.event_by, e.title, e.event_image, i.description,
                                        u.uidUsers, u.userImg, i.headline as e_headline
                                    from events e, event_info i, users u
                                    where e.event_id = ? 
                                    and e.event_by = u.idUsers
                                    and e.event_id = i.event";
                            
                            /**
                             * On créer un statement pour pouvoir executer notre requête SQL en la préparant
                             */
                            $statement = mysqli_stmt_init($conn);   
                            mysqli_stmt_prepare($statement,$sql); 

                            
                            /**
                             * On ajoute les paramètres à la requête équivalent au "?" 
                             */
                            mysqli_stmt_bind_param($statement, "s", $eventId);

                            /**
                             * On exécute la requête et on récupère les résultats
                             */
                            mysqli_stmt_execute($statement);
                            $result = mysqli_stmt_get_result($statement);
                            $row = mysqli_fetch_assoc($result); // Le fetch_assoc permet d'avoir les données des autres tables à partir des clés étrangères.
                            
                            /**
                             * On créer les dates à partir des données reçus par la requête.
                             */
                            
                            $date1 = date_create(date("Y-m-d",time())); //Format DATETIME DE MySQL
                            $date2 = date_create($row['event_date']);
                            
                            /**
                             * Correction de l'appel date_diff, le calcul des deux dates était incorrect par conséquent avant il s'agissait de : date debut - date fin.
                             * On procède ensuite au décompte du timer pour l'afficher
                             */
                            $diff = date_diff($date2,$date1);

                            $diff_sec = $diff->format('%r').( 
                                                ($diff->s-1)+ 
                                                (60*($diff->i))+ 
                                                (60*60*($diff->h))+ 
                                                (24*60*60*($diff->d))+ 
                                                (30*24*60*60*($diff->m))+ 
                                                (365*24*60*60*($diff->y)) 
                            );      
                        }
                        catch (Exception $exception){
                            echo '<div class="px-5">
                                    <div class="text-center px-5">
                                        <br><br><br>
                                        <h1>Oops ! the event could not load</h1>
                                    </div>
                                  </div>
                            ';
                        }
                    ?>

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

                            <div class="clock" style="margin-left:5%;"></div>
                            <div class="message"></div>
                            <br><br><br>

                            <p class="text-justify"><?php echo $row['description'] ?></p>

                            <br><br>
                            <p class="text-muted text-left">Organized By: <?php echo ucwords($row['uidUsers']); ?></p>

                        </div>
                    </div>
                </div>
            </div>
        </div> 


<?php include 'includes/footer.php'; ?>
        

        
        <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
        <script src="js/flipclock.js"></script>	
        
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
        
    </body>
</html>