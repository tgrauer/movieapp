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

    <div class="container-fluid header">
        <div class="container" ng-controller="SearchCtrl">
            <div class="row">
                <div class="col-sm-4">
                    <a href="#/"><img src="img/logo.png" alt="" class="img-responsive logo"></a>
                </div>
                <div class="col-md-4 col-md-offset-4 col-sm-5 col-sm-offset-3">
                    <form name="searchMovieForm" id="searchMovieForm" ng-submit="searchMovieForm.$valid && searchMovie()" novalidate>
                        <div class="form-holder">
                            <div class="form-group">
                                <input type="text" class="form-control" name="searchterm" ng-model="formInfo.searchterm" ng-required="true" ng-minlength="2" placeholder="search...">
                            </div>
                            <input type="submit" class="btn btn-md" value="Search">
                        </div>
                    </form>

                    <p class="error" ng-show="searched && !results.length">No results found</p>
                </div>
            </div>

            <div class="row" ng-show="searched && results.length" id="results">
                <div class="col-sm-12">
                    <h2>Search Results</h2>
                    <a class="closeBtn" ng-click="searched=false"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a>
                    <div class="col-md-2 col-sm-3 col-xs-6 preview_poster" ng-repeat="result in results | limitTo:12" ng-show="{{result_image(result)}}">
                        <a ng-click="$parent.searched=false" class="result_image" href="#/{{result.media_type}}?id={{result.id}}"><img src="https://image.tmdb.org/t/p/w342{{result.poster_path || result.profile_path}}" alt="" class="img-responsive"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div ng-view autoscroll="true"></div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
<script src="https://code.angularjs.org/1.4.5/angular-route.min.js"></script>
<script src="js/site.js"></script>
<script src="js/app.js"></script>

</body>
</html>