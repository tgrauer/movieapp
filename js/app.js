(function() {
var movieApp = angular.module('movieApp', ['ngRoute'])
    .config(function($routeProvider){

        $routeProvider
            .when('/', {
                templateUrl:'main.php',
                controller:'MainCtrl'
            })

            .when('/movie/:id',{
                templateUrl:'movie.php',
                controller:'MovieCtrl'
            })

            .when('/tv/:id', {
                templateUrl:'tv.php',
                controller:'TVShowCtrl'
            })

            .when('/season/:id/:season_number',{
                templateUrl:'season.php',
                controller:'SeasonCtrl'
            })

            .when('/person/:id',{
                templateUrl:'person.php',
                controller:'PersonCtrl'
            });

    })

    .controller('SearchCtrl', function($scope, $http){
        $scope.formInfo = {};
        $scope.$root.searched=false;
        // $scope.formInfo.searchtype='movie';

        $scope.searchMovie=function(){
            
            $http.get("https://api.themoviedb.org/3/search/multi?api_key=0f83568cb022f28816a16308dcc1371c&query="+$scope.formInfo.searchterm)
                .then(function(response){
                $scope.results = response.data.results;
                $scope.$root.searched=true;
                console.log($scope.results);
            });
        }

        $scope.result_image=function(result){
            $scope.display_image=false;

            if(result.poster_path){
                if(result.poster_path==null){
                    $scope.display_image=false;
                }else{
                    $scope.display_image=true;
                }
            }else if(result.profile_path){
                if(result.profile_path==null){
                    $scope.display_image=false;
                }else{
                    $scope.display_image=true;
                }
            }

            return $scope.display_image;
        }
    })

    .controller('MainCtrl', function($scope, $http){
        $scope.$root.searched=false;
        $scope.movie_filter='now_playing';

        $scope.loadMovies = function(){
            $scope.filter = $scope.movie_filter;
            $http.get("https://api.themoviedb.org/3/movie/"+$scope.filter+"?api_key=0f83568cb022f28816a16308dcc1371c")
                .then(function(response) {
                $scope.movies = response.data.results;
                console.log($scope.movies);
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
                $scope.votes=[];
                $scope.highest_rated=0;
                $scope.indexofarray=0;

                for(var i=0;i<$scope.hero.length;i++){
                    $scope.votes.push($scope.hero[i].vote_count);
                }
                
                for(var j=0;j<$scope.votes.length;j++){
                    if($scope.votes[j]>$scope.highest_rated){
                        $scope.highest_rated=$scope.votes[j];
                        $scope.indexofarray=j;
                    }
                }
                $scope.hero = response.data.results[$scope.indexofarray];
            });
        }

        $scope.load_hero();
    })

    .controller('MovieCtrl', function($scope, $http, $routeParams){
        $scope.$root.searched=false;
        
        $scope.loadMovieDetails = function(){

            $scope.id = $routeParams.id;
            $scope.overview=true;
            $scope.cast=false;
            $scope.tab=1;
            $http.get("https://api.themoviedb.org/3/movie/"+$scope.id+"?api_key=0f83568cb022f28816a16308dcc1371c&append_to_response=images,credits,recommendations,videos")
                .then(function(response) {
                $scope.movie = response.data;
                $scope.movie.vote_average = Math.round( $scope.movie.vote_average * 10 ) / 10;
                $scope.movie.release_date = $scope.movie.release_date.substr(0,4);

                if($scope.movie.videos.results.length){
                    $scope.getIframeSrc = function (videokey) {
                      return 'https://www.youtube.com/embed/' + $scope.movie.videos.results[0].key;
                    };
                }
                console.log($scope.movie);
            });
        }

        $scope.loadMovieDetails();
    })

    .controller('TVShowCtrl', function($scope, $http, $routeParams){
        $scope.$root.searched=false;

        $scope.loadTVShowDetails = function(){

            $scope.id = $routeParams.id;
            $scope.tab=1;
             
            $http.get("https://api.themoviedb.org/3/tv/"+$scope.id+"?api_key=0f83568cb022f28816a16308dcc1371c&append_to_response=images,credits,recommendations,videos")
                .then(function(response) {
                $scope.tvshow = response.data;
                $scope.tvshow.vote_average = Math.round( $scope.tvshow.vote_average * 10 ) / 10;
                $scope.tvshow.beg_date = $scope.tvshow.first_air_date.substr(0,4);
                $scope.tvshow.end_date = $scope.tvshow.last_air_date.substr(0,4);

                console.log($scope.tvshow);

                if($scope.tvshow.videos.results.length){
                    $scope.getIframeSrc = function (videokey) {
                      return 'https://www.youtube.com/embed/' + $scope.tvshow.videos.results[0].key;
                    };
                }

                $scope.show_seasons = function(){
                    if($scope.tvshow.seasons.length>1){
                        return true;
                    }
                }
            });
        }

        $scope.loadTVShowDetails();

    })

    .controller('SeasonCtrl', function($scope, $http, $routeParams){
        $scope.$root.searched=false;
        $scope.id = $routeParams.id;
        $scope.season_number = $routeParams.season_number;
        console.log($scope.id +' : '+ $scope.season_number);

        $scope.loadSesasonDetails = function(){

            $http.get("https://api.themoviedb.org/3/tv/"+$scope.id+"?api_key=0f83568cb022f28816a16308dcc1371c&append_to_response=images")
                .then(function(response) {
                $scope.tvshow = response.data;
            });

            $http.get("https://api.themoviedb.org/3/tv/"+$scope.id+"/season/"+$scope.season_number+"?api_key=0f83568cb022f28816a16308dcc1371c&append_to_response=images")
                .then(function(response) {
                $scope.season = response.data;
                $scope.season.air_date_year = $scope.season.air_date.substr(0,4);
            });
        }

        $scope.loadSesasonDetails();

    })

    .controller('PersonCtrl', function($scope,$http, $routeParams){
        $scope.$root.searched=false;
        $scope.id = $routeParams.id;

        $scope.loadActor= function(){
            $http.get("https://api.themoviedb.org/3/person/"+$scope.id+"?api_key=0f83568cb022f28816a16308dcc1371c&append_to_response=images,movie_credits,tv_credits")
            .then(function(response){
                $scope.actor = response.data;

                console.log($scope.actor);
            });
        }
        $scope.loadActor();
    })
    

    .config(["$sceDelegateProvider", function($sceDelegateProvider) {
        $sceDelegateProvider.resourceUrlWhitelist([
            'self',
            "https://www.youtube.com/embed/**"
        ]);
    }])

;

})();
