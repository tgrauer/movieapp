<div class="container-fluid actor actor_details">
    <div class="container">
        <div class="row">
        	<div class="col-md-3 col-sm-4">
        		<img src="https://image.tmdb.org/t/p/w342{{actor.profile_path}}" alt="" class="img-responsive poster poster_orgpos">
        		<p ng-hide="actor.birthday=='' || actor.birthday==null"><span class="plabel">DOB</span>: {{actor.birthday | date}}</p>
        		<p ng-hide="actor.place_of_birth=='' || actor.place_of_birth==null"><span class="plabel">Birthplace</span>: {{actor.place_of_birth}}</p>
        		<p ng-hide="actor.homepage=='' || actor.homepage==null"><span class="plabel">Website</span>: <a target="_blank" href="{{actor.homepage}}">{{actor.homepage}}</a></p>
        	</div>
            <div class="col-md-9 col-sm-8">
                <div class="colorbg">
                	<h2 class="title">{{actor.name}}</h2>
                	<p class="overview">{{actor.biography}}</p>

                	<div class="col-sm-3 col-xs-6 actor_gallery" ng-repeat="image in actor.images.profiles | limitTo: 5" ng-if="$index > 0">
                		<img src="https://image.tmdb.org/t/p/w300{{image.file_path}}" alt="" class="img-responsive">
                	</div>
                </div>

            	<div class="col-sm-12 featuredin nobdr" ng-show="actor.movie_credits.cast.length >0">
    				<h3 class="section_heading">Movies appeared in</h3>
    				<div class="col-sm-2 col-xs-6 preview_poster" ng-repeat="featured in actor.movie_credits.cast | limitTo:12 | orderBy: '-release_date'" ng-hide="featured.poster_path==null">
    					<a class="result_image" href="#/movie?id={{featured.id}}"><img src="https://image.tmdb.org/t/p/w300{{featured.poster_path}}" alt="" class="img-responsive"></a>
    				</div>
            	</div>

				<div class="col-sm-12 featuredin" ng-show="actor.tv_credits.cast.length >0">
					<h3 class="section_heading">TV Shows appeared in</h3>
					<div class="col-sm-2 col-xs-6 preview_poster" ng-repeat="featured in actor.tv_credits.cast | limitTo:12 | orderBy: '-release_date'" ng-hide="featured.poster_path==null">
						<a class="result_image" href="#/tv?id={{featured.id}}"><img src="https://image.tmdb.org/t/p/w300{{featured.poster_path}}" alt="" class="img-responsive"></a>
					</div>
	        	</div>
            </div>

        	
        </div>
    </div>
</div>