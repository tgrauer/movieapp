
<?php
	
	if(isset($_GET['episode_number'])){
        $episode_number = $_GET['episode_number'];
    }

    if(isset($_GET['season_number'])){
        $season_number = $_GET['season_number'];
    }
    if(isset($_GET['tvid'])){
        $tvid = $_GET['tvid'];
    }

    if(isset($_GET['showname'])){
        $showname = $_GET['showname'];
    }

?>
<!doctype html>
<html lang=en-us>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]--> 
<!--[if IE]>           <html class="ie"> <![endif]--> 

<head>
    <meta charset=utf-8>
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <link href="css/bootstrap-ie7.css" rel="stylesheet">
    <![endif]-->
    <!--[if IE]>
    <script type="text/javascript" src="js/css3-mediaqueries.js"></script>    
    <![endif]-->
    
</head>

<body ng-app='movieApp'>

    <div class="container" ng-controller="EpisodeCtrl as episode">
        <input type="hidden" value="<?php echo $tvid;?>" id="tvid">
        <input type="hidden" value="<?php echo $season_number;?>" id="season_number">
        <input type="hidden" value="<?php echo $episode_number;?>" id="episode_number">

        <div class="row">
            <div class="col-sm-4">
                <img src="https://image.tmdb.org/t/p/original{{episode.still_path}}" alt="" class="img-responsive poster">
            </div>

            <div class="col-sm-7 col-sm-offset-1">
                <h2 class="title"><?php echo $showname;?> - <span class="episode_name">Season {{episode.season_number}}</span> <span class="fltrgt"><i class="fa fa-star" aria-hidden="true"></i> {{episode.vote_average}}</span></h2>
                <h3 class="season_episode">Episode {{episode.episode_number}} -  {{episode.name}}</h3>
                <p class="year_aired">Original air date: {{episode.airdate_frmt}}</p>
                <p class="overview">{{episode.overview}}</p>
                {{episode.test}}
            </div>
        </div>

        <div class="row">
        	<div class="col-md-2 col-sm-3 col-xs-6" ng-repeat="stars in episode.guest_stars | limitTo: 5" ng-hide="stars.profile_path == null">
        		<p ng-hide="stars.name == ''">{{stars.name}}</p>
        		<p ng-hide="stars.character == ''">as {{stars.character}}</p>
        		<img src="https://image.tmdb.org/t/p/original{{stars.profile_path}}" alt="" class="img-responsive img-">
        	</div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
<script src="js/site.js"></script>
<script src="js/app.js"></script>

</body>
</html>