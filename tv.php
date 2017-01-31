<div class="container-fluid bg_container" style="background-image:url('https://image.tmdb.org/t/p/original/{{tvshow.images.backdrops[0].file_path}}');">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <img src="https://image.tmdb.org/t/p/w342{{tvshow.poster_path}}" alt="" class="img-responsive poster">
            </div>
            <div class="col-sm-7 tv_details">
                <h2 class="title">{{tvshow.name}} <span class="date">({{tvshow.beg_date}}-{{tvshow.end_date}})</span> <span class="fltrgt"><i class="fa fa-star" aria-hidden="true"></i> {{tvshow.vote_average}}</span></h2>
                <p class="overview">{{tvshow.overview}}</p>
                <p class="genres"><span ng-repeat="genres in tvshow.genres">{{genres.name}}, </span></p>

                <div class="row" ng-show="show_seasons()">
                    <div class="col-sm-3 col-sm-4 col-xs-6 seasons" ng-repeat="season in tvshow.seasons | orderBy: '-air_date'" ng-hide="season.poster_path == null">
                        <a href="season.php?season_number={{season.season_number}}&tvid={{id}}&showname={{tvshow.name}}"><img src="https://image.tmdb.org/t/p/w342{{season.poster_path}}" alt="" class="img-responsive"></a>
                        <p>{{season.air_date.substr(0,4)}}</p>
                        <p>{{season.episode_count}} Episodes</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>