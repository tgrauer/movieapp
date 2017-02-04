<div class="container-fluid bg_container" style="background-image:url('https://image.tmdb.org/t/p/original/{{tvshow.images.backdrops[0].file_path}}');"></div>

<div class="container-fluid result_title">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3 col-sm-push-4 col-sm-8">
                <h2 class="title">{{tvshow.name}}</h2>
                <h3 class="tagline">{{season.name}} - {{season.air_date | date}}</h3>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid result_main">
    <div class="container">
        
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <img src="https://image.tmdb.org/t/p/w342{{season.poster_path}}" alt="" class="img-responsive poster hidden-xs">
            </div>

            <div id="overview" class="col-sm-8 col-md-9 movie_details season_overview">
                <div class="colorbg" ng-hide="season.overview=='' || season.overview==null">
                    <p class="overview">{{season.overview}}</p>
                </div>

                <div class="row episodes" ng-repeat="episode in season.episodes">
                    <div class="col-sm-4">
                        <img src="https://image.tmdb.org/t/p/w320{{episode.still_path}}" alt="" class="img-responsive episode_thumbnail">
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
</div>

