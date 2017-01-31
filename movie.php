<div class="container-fluid bg_container" style="background-image:url('https://image.tmdb.org/t/p/original/{{movie.images.backdrops[0].file_path}}');">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <img class="img-responsive poster" src="https://image.tmdb.org/t/p/w342{{movie.poster_path}}" alt="">
            </div>
            <div class="col-sm-7 movie_details">
                <h2 class="title">{{movie.title}} <span class="date">({{movie.release_date}}) </span> <span class="fltrgt"><i class="fa fa-star" aria-hidden="true"></i> {{movie.vote_average}}</span></h2>
                <h3 class="tagline">{{movie.tagline}}</h3>
                <p class="overview">{{movie.overview}}</p>
                <p class="runtime"><b>Runtime</b>: {{movie.runtime}} minutes</p>
                <p class="genres"><span ng-repeat="genres in movie.genres" ng-class="{'last': $last}">{{genres.name}}, </span></p>

                <div class="row gallery">
                    <div class="col-sm-4 col-xs-6 movie_images" ng-repeat="image in movie.images.backdrops | limitTo: 9">
                        <img src="https://image.tmdb.org/t/p/w342{{image.file_path}}" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>