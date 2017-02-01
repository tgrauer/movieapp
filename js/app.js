(function() {
var movieApp = angular.module('movieApp', ['ngRoute']);
    
    movieApp.config(function($routeProvider){

        $routeProvider
            .when('/', {
                templateUrl:'main.php',
                controller:'MainCtrl'
            })

            .when('/movie',{
                templateUrl:'movie.php',
                controller:'MovieCtrl'
            })

            .when('/tv', {
                templateUrl:'tv.php',
                controller:'TVShowCtrl'
            });
    });

    movieApp.controller('SearchCtrl', function($scope, $http){
        $scope.formInfo = {};
        $scope.searched=false;
        $scope.formInfo.searchtype='movie';

        $scope.searchMovie=function(){
            
            $http.get("https://api.themoviedb.org/3/search/"+$scope.formInfo.searchtype+"?api_key=0f83568cb022f28816a16308dcc1371c&query="+$scope.formInfo.searchterm)
                .then(function(response){
                $scope.results = response.data.results;
                $scope.searched=true;
                console.log($scope.filter);
            });
        }
    });

    movieApp.controller('MainCtrl',function($scope, $http){

        $scope.movie_filter='now_playing';

        $scope.loadMovies = function(){
            $scope.filter = $scope.movie_filter;
            $http.get("https://api.themoviedb.org/3/movie/"+$scope.filter+"?api_key=0f83568cb022f28816a16308dcc1371c")
                .then(function(response) {
                $scope.movies = response.data.results;
            });
        }

        $scope.tvshow_filter='on_the_air';

        $scope.loadTVshows = function(){
            $scope.filter = $scope.tvshow_filter;
            $http.get("https://api.themoviedb.org/3/tv/"+$scope.filter+"?api_key=0f83568cb022f28816a16308dcc1371c")
            .then(function(response){
                $scope.tvshows = response.data.results;
            });
        }

        $scope.loadMovies($scope.movie_filter);
        $scope.loadTVshows($scope.tvshow_filter);

        $scope.load_hero = function(){
            $http.get("https://api.themoviedb.org/3/movie/upcoming?api_key=0f83568cb022f28816a16308dcc1371c")
                .then(function(response) {
                $scope.hero = response.data.results;
                console.log($scope.hero);
                $scope.votes=[];
                $scope.highest_rated=0;
                $scope.indexofarray=0;

                for(var i=0;i<$scope.hero.length;i++){
                    $scope.votes.push($scope.hero[i].vote_count);
                }
                
                console.log($scope.votes);
                for(var j=0;j<$scope.votes.length;j++){
                    if($scope.votes[j]>$scope.highest_rated){
                        $scope.highest_rated=$scope.votes[j];
                        $scope.indexofarray=j;
                    }
                }
                $scope.hero = response.data.results[$scope.indexofarray];
                console.log($scope.hero);

            });
        }

        $scope.load_hero();
    });

    movieApp.controller('MovieCtrl', function($scope, $http, $routeParams){

        $scope.loadMovieDetails = function(){

            $scope.id = $routeParams.id;
            $scope.overview=true;
            $scope.cast=false;
            // tab1=true;

            $http.get("https://api.themoviedb.org/3/movie/"+$scope.id+"?api_key=0f83568cb022f28816a16308dcc1371c&append_to_response=images,credits")
                .then(function(response) {
                $scope.movie = response.data;
                $scope.movie.vote_average = Math.round( $scope.movie.vote_average * 10 ) / 10;
                $scope.movie.release_date = $scope.movie.release_date.substr(0,4);
                console.log($scope.movie);

            });
        }

        $scope.loadMovieDetails();
    });

    movieApp.controller('TVShowCtrl', function($scope, $http, $routeParams){

        $scope.loadTVShowDetails = function(){

            $scope.id = $routeParams.id;
             
            $http.get("https://api.themoviedb.org/3/tv/"+$scope.id+"?api_key=0f83568cb022f28816a16308dcc1371c&append_to_response=images")
                .then(function(response) {
                $scope.tvshow = response.data;
                $scope.tvshow.vote_average = Math.round( $scope.tvshow.vote_average * 10 ) / 10;
                $scope.tvshow.beg_date = $scope.tvshow.first_air_date.substr(0,4);
                $scope.tvshow.end_date = $scope.tvshow.last_air_date.substr(0,4);
                
                console.log($scope.tvshow);

                $scope.show_seasons = function(){
                    if($scope.tvshow.seasons.length>1){
                        return true;
                    }
                }
            });
        }

        $scope.loadSesasonDetails = function(){

            $scope.tvid = document.getElementById('tvid').value;
            $scope.season_number = document.getElementById('season_number').value;
             
            $http.get("https://api.themoviedb.org/3/tv/"+$scope.tvid+"/season/"+$scope.season_number+"?api_key=0f83568cb022f28816a16308dcc1371c")
                .then(function(response) {
                $scope.season = response.data;
                $scope.season.air_date_year = $scope.season.air_date.substr(0,4);
                console.log($scope.season );
            });
        }

        // $scope.loadSesasonDetails();

        $scope.loadTVShowDetails();

    });

    movieApp.controller('SeasonCtrl', function($scope, $http, $routeParams){

        $scope.loadSesasonDetails = function(){

            $scope.tvid = document.getElementById('tvid').value;
            $scope.season_number = document.getElementById('season_number').value;
             
            $http.get("https://api.themoviedb.org/3/tv/"+$scope.tvid+"/season/"+$scope.season_number+"?api_key=0f83568cb022f28816a16308dcc1371c")
                .then(function(response) {
                $scope.season = response.data;
                $scope.season.air_date_year = $scope.season.air_date.substr(0,4);
                console.log($scope.season );
            });
        }

        $scope.loadSesasonDetails();

    });

    movieApp.controller('EpisodeCtrl', function($scope, $http){

        $scope.loadSesasonDetails = function(){

            $scope.tvid = document.getElementById('tvid').value;
            $scope.season_number = document.getElementById('season_number').value;
            $scope.episode_number = document.getElementById('episode_number').value;
             
            $http.get("https://api.themoviedb.org/3/tv/"+$scope.tvid+"/season/"+$scope.season_number+"/episode/"+$scope.episode_number+"?api_key=0f83568cb022f28816a16308dcc1371c")
                .then(function(response) {

                $scope.episode = response.data;
                $scope.episode.vote_average = Math.round( $scope.episode.vote_average * 10 ) / 10;
                $scope.episode.air_date_year = $scope.episode.air_date.substr(0,4);
                $scope.episode.air_date_month = $scope.episode.air_date.substr(5,2);
                $scope.episode.air_date_day = $scope.episode.air_date.substr(8,2);
                $scope.episode.airdate_frmt = $scope.episode.air_date_month+'-'+$scope.episode.air_date_day+'-'+$scope.episode.air_date_year;
                console.log($scope.episode );
            });
        }

        $scope.loadSesasonDetails();

    });
})();
