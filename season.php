<?php

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

    <div class="container" ng-controller="SeasonCtrl as season">
        <input type="hidden" value="<?php echo $tvid;?>" id="tvid">
        <input type="hidden" value="<?php echo $season_number;?>" id="season_number">

        <div class="row">
            <div class="col-sm-4">
                <img src="https://image.tmdb.org/t/p/w342{{season.poster_path}}" alt="" class="img-responsive poster">
                <p class="overview">{{season.overview}}</p>
            </div>

            <div class="col-sm-7 col-sm-offset-1">
                <h2 class="title"><?php echo $showname;?> - <span class="episode_name">{{season.name}}</span> <span class="year_aired fltrgt">{{season.air_date_year}}</span></h2>
                <br />
                <div class="row episodes" ng-repeat="episode in season.episodes">
                    <div class="col-sm-4">
                        <a href="episode.php?season_number={{season.season_number}}&tvid={{tvid}}&episode_number={{episode.episode_number}}&showname=<?php echo $showname;?>"><img src="https://image.tmdb.org/t/p/w185{{episode.still_path}}" alt="" class="img-responsive episode_thumbnail"></a>
                    </div>

                    <div class="col-sm-8">
                        <p class="name"><span>{{episode.season_number}}x{{episode.episode_number}} - </span>{{episode.name}} </p>
                        <p class="air_date">{{episode.air_date | date}}</p>
                        <p class="overview">{{episode.overview}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
<script src="https://code.angularjs.org/1.4.5/angular-route.min.js"></script>
<script src="js/site.js"></script>
<script src="js/app.js"></script>

</body>
</html>