<div class="container-fluid hero">
    <div class="billboard" style="background-image:url('https://image.tmdb.org/t/p/original/{{hero.poster_path}}');"></div>
    <div class="container movies">
        <div class="row">
            <div class="col-sm-12 heading_col">
                <h1 class="heading">Movies</h1>
                <form class="fltrgt" name='filterMovies'>
                    <div class="form-group select">
                        <select ng-change="loadMovies(movie_filter)" ng-model="movie_filter" name="movie_filter" id="movie_filter">
                            <option selected value="now_playing">Now Playing</option>
                            <option value="top_rated">Top Rated</option>
                            <option value="popular">Popular</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="col-md-2 col-sm-3 col-xs-6 preview_poster" ng-repeat="movie in movies | limitTo: 18" ng-hide="movie.poster_path == null">
                <a class="result_image" href="#/movie?id={{movie.id}}"><img src="https://image.tmdb.org/t/p/w300{{movie.poster_path}}" alt="" class="img-responsive"></a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 heading_col">
            <h1 class="heading">TV Shows</h1>
            <form class="fltrgt" name='filterTVshows'>
                <div class="form-group select">
                    <select ng-change="loadTVshows(tvshow_filter)" ng-model="tvshow_filter" name="tvshow_filter" id="tvshow_filter">
                        <option selected value="on_the_air">Now Playing</option>
                        <option value="top_rated">Top Rated</option>
                        <option value="popular">Popular</option>
                    </select>
                </div>
            </form>
        </div>
        
        <div class="col-md-2 col-sm-3 col-xs-6 preview_poster" ng-repeat="tvshow in tvshows | limitTo: 18" ng-hide="tvshow.poster_path == null">
            <a class="result_image" href="#/tv?id={{tvshow.id}}"><img src="https://image.tmdb.org/t/p/w300{{tvshow.poster_path}}" alt="" class="img-responsive"></a>
        </div>
    </div>
</div>