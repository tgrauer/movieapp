<div class="container-fluid bg_container" style="background-image:url('https://image.tmdb.org/t/p/original/{{tvshow.images.backdrops[0].file_path}}');"></div>

<div class="container-fluid result_title">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3 col-sm-push-4 col-sm-8">
                <h2 class="title">{{tvshow.name}}</h2>
                <h3 class="tagline">{{tvshow.beg_date}}-{{tvshow.end_date}}</h3>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid result_main">
    <div class="container">
        
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <img src="https://image.tmdb.org/t/p/w342{{tvshow.poster_path}}" alt="" class="img-responsive poster hidden-xs">
                <div class="list-group">
                    <a href="" ng-click="tab=1" data-toggle="tab" class="list-group-item" ng-class="{'active':tab === 1}">Overview</a>
                    <a href="" ng-click="tab=2" data-toggle="tab" class="list-group-item" ng-class="{'active':tab === 2}">Seasons</a>
                    <a href="" ng-click="tab=3" data-toggle="tab" class="list-group-item" ng-class="{'active':tab === 3}">Cast</a>
                </div>
            </div>
            
            <div id="overview" ng-show="tab===1" class="col-sm-8 col-md-9 movie_details">
                <div class="colorbg">
                    <div class="rating">
                        <p><i class="fa fa-star" aria-hidden="true"></i> {{tvshow.vote_average}}</p>
                    </div>
                    <p class="overview">{{tvshow.overview}}</p>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <p><span class="plabel">Status</span>: {{tvshow.status}}</p>
                            <p class="genres"><span class="plabel">Genres</span>: <span ng-repeat="genres in tvshow.genres" ng-class="{'last': $last}">{{genres.name}}{{$last ? '' : ','}} </span></p>
                        </div>

                        <div class="col-sm-6">
                            <p><span class="plabel">Premiered</span>: {{tvshow.first_air_date | date}}</p>
                            <p><span class="plabel">Channel</span>: {{tvshow.networks[0].name}}</p>
                        </div>
                    </div>
                </div>

                <div class="embed-responsive embed-responsive-16by9" ng-show="tvshow.videos.results.length>0">
                    <iframe class="embed-responsive-item" ng-src="{{getIframeSrc(tvshow.videos.results[0].key)}}" frameborder="0" allowfullscreen></iframe>
                </div>
                
            </div>

            <div id="gallery" ng-show="tab===2" class="col-sm-8 col-md-9 gallery tv_details" ng-show="show_seasons()">
                <div class="col-sm-3 col-sm-4 col-xs-6 seasons" ng-repeat="season in tvshow.seasons | orderBy: '-air_date'" ng-hide="season.poster_path == null">
                    <a href="#season?season_number={{season.season_number}}&tvid={{id}}&showname={{tvshow.name}}"><img src="https://image.tmdb.org/t/p/w342{{season.poster_path}}" alt="" class="img-responsive"></a>
                    <p>{{season.air_date.substr(0,4)}}</p>
                    <p>{{season.episode_count}} Episodes</p>
                </div>
            </div>

            <div id="cast" ng-show="tab===3" class="col-sm-8 col-md-9 tv_details">
                <div ng-repeat="castmember in tvshow.credits.cast | limitTo:8" class="col-sm-3 col-xs-6 castmember" ng-hide="castmember.profile_path == null">
                    <a href="#person?id={{castmember.id}}"><img src="https://image.tmdb.org/t/p/w342{{castmember.profile_path}}" alt="" class="img-responsive"></a>
                    <p><b>{{castmember.name}}</b></p>
                    <p>as {{castmember.character}}</p>
                </div>
            </div>

            <div class="recommended col-sm-8 col-md-9 col-md-offset-3 col-sm-offset-4" ng-hide="tvshow.recommendations.results.length==0">
                <h3 class="section_heading">Recommended</h3>
                <div class="col-sm-2 col-xs-6 preview_poster" ng-repeat="recc_tvshow in tvshow.recommendations.results | limitTo:6">
                    <a class="result_image" href="#/tv?id={{recc_tvshow.id}}"><img src="https://image.tmdb.org/t/p/w300{{recc_tvshow.poster_path}}" alt="" class="img-responsive"></a>
                </div>
            </div>

        </div>
    </div>
</div>
