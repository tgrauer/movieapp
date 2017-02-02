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
                <div class="list-group">
                    <a href="" ng-click="tab=1" data-toggle="tab" class="list-group-item" ng-class="{'active':tab === 1}">Overview</a>
                    <a href="" ng-click="tab=2" data-toggle="tab" class="list-group-item" ng-class="{'active':tab === 2}">Gallery</a>
                    <a href="" ng-click="tab=3" data-toggle="tab" class="list-group-item" ng-class="{'active':tab === 3}">Cast</a>
                </div>
            </div>
            <div id="overview" ng-show="tab===1" class="col-sm-8 col-md-9 movie_details">
                <div class="rating">
                    <p><i class="fa fa-star" aria-hidden="true"></i> {{movie.vote_average}}</p>
                </div>
                <p class="overview">{{movie.overview}}</p>
                
                <div class="row">
                    <div class="col-sm-6">
                        <p class="release_date"><span class="plabel">Premiere Date</span>: {{movie.release_date}} - {{movie.status}}</p>
                        <p class="runtime"><span class="plabel">Runtime</span>: {{movie.runtime}} minutes</p>
                        <p class="genres"><span class="plabel">Genres</span>: <span ng-repeat="genres in movie.genres" ng-class="{'last': $last}">{{genres.name}}, </span></p>
                    </div>

                    <div class="col-sm-6">
                        <p><span class="plabel">Revenue</span>: {{movie.revenue | currency}}</p>
                        <p><span class="plabel">Estimated Budget</span>: {{movie.budget | currency}}</p>
                        <p><span class="plabel">Production Company</span>: {{movie.production_companies[0].name}}</p>
                    </div>
                </div>
                
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" ng-src="{{getIframeSrc(movie.videos.results[0].key)}}" frameborder="0" allowfullscreen></iframe>
                </div>
                
                <h3 class="section_heading">Recommended</h3>
                <div class="col-sm-2 col-xs-6 preview_poster" ng-repeat="recc_movie in movie.recommendations.results | limitTo:6">
                    <a class="result_image" href="#/movie?id={{recc_movie.id}}"><img src="https://image.tmdb.org/t/p/w300{{recc_movie.poster_path}}" alt="" class="img-responsive"></a>
                </div>
            </div>

            <div id="gallery" ng-show="tab===2" class="col-sm-8 col-md-9 gallery movie_details">
                <div class="col-sm-4 col-xs-6 movie_images" ng-repeat="image in movie.images.backdrops | limitTo: 9">
                    <img src="https://image.tmdb.org/t/p/w342{{image.file_path}}" alt="" class="img-responsive">
                </div>
            </div>

            <div id="cast" ng-show="tab===3" class="col-sm-8 col-md-9 movie_details">
                <div ng-repeat="castmember in movie.credits.cast | limitTo:8" class="col-sm-3 castmember">
                    <a href="#actor?id={{castmember.id}}"><img src="https://image.tmdb.org/t/p/w342{{castmember.profile_path}}" alt="" class="img-responsive"></a>
                    <p><b>{{castmember.name}}</b></p>
                    <p>as {{castmember.character}}</p>
                </div>
            </div>

        </div>
    </div>
</div>
