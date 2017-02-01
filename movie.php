<div class="container-fluid bg_container" style="background-image:url('https://image.tmdb.org/t/p/original/{{movie.images.backdrops[0].file_path}}');"></div>

<div class="container-fluid result_title">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3 col-sm-push-4 col-sm-8">
                <h2 class="title">{{movie.title}}</h2>
                <h3 class="tagline">{{movie.tagline}}</h3>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid result_main">
    <div class="container">
        
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <img class="img-responsive poster hidden-xs" src="https://image.tmdb.org/t/p/w342{{movie.poster_path}}" alt="">
                <div class="list-group" ng-init="tab=1">
                    <a href="" ng-click="tab=1" data-toggle="tab" class="list-group-item" ng-class="{'active':tab === 1}">Overview</a>
                    <a href="" ng-click="tab=2" data-toggle="tab" class="list-group-item" ng-class="{'active':tab === 2}">Cast</a>
                </div>
            </div>
            <div id="overview" ng-show="tab===1" class="col-sm-8 col-md-9 movie_details">
                <div class="rating">
                    <p><i class="fa fa-star" aria-hidden="true"></i> {{movie.vote_average}}</p>
                </div>
                <p class="overview">{{movie.overview}}</p>
                <p class="release_date"><b>Premiere Date</b>: {{movie.release_date}}</p>
                <p class="runtime"><b>Runtime</b>: {{movie.runtime}} minutes</p>
                <p class="genres"><span ng-repeat="genres in movie.genres" ng-class="{'last': $last}">{{genres.name}}, </span></p>

                <div class="row gallery">
                    <div class="col-sm-4 col-xs-6 movie_images" ng-repeat="image in movie.images.backdrops | limitTo: 9">
                        <img src="https://image.tmdb.org/t/p/w342{{image.file_path}}" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
            
            <div id="cast" ng-show="tab===2" class="col-sm-8 col-md-9 movie_details">
                <div ng-repeat="castmember in movie.credits.cast | limitTo:8" class="col-sm-3 castmember">
                    <img src="https://image.tmdb.org/t/p/w342{{castmember.profile_path}}" alt="" class="img-responsive">
                    <p><b>{{castmember.name}}</b></p>
                    <p>as {{castmember.character}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
