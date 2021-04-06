  <!-- Polygon Map Start -->
                     <!--================================-->
                     <div class="col-md-6 col-lg-6">
                        <div class="card mg-b-20">
                           <div class="card-header">
                              <h4 class="card-header-title">
                                 Polygon Map
                              </h4>
                              <div class="card-header-btn">
                                 <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse4" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                                 <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                                 <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                                 <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                              </div>
                           </div>
                           <div class="card-body collapse show" id="collapse4">
                              <div id="polygon-map" style="height:300px"></div>
                           </div>
                        </div>
                     </div>
                     <!--/ Polygon Map End -->	

                     <script>
                     
                     var map;
	$(document).ready(function () {
		map = new GMaps({
			div: '#polygon-map',
			lat: 10.418369,
			lng: -75.5522337
		});

		var path = [
			[10.418369,-75.5522337],
			[10.4152456,-75.551032],
			[10.4092731,-75.5518689],
			[10.4016331,-75.55792],
			[10.397602,-75.5644216],
			[10.3943518,-75.5618252],
			[10.3939086,-75.5598941],
			[10.3939719,-75.5578127],
			[10.395386,-75.5564394],
			[10.3909116,-75.5472126],
			[10.3916292,-75.5453887],
			[10.3978975,-75.5547013],
			[10.4008733,-75.5528345],
			[10.4067827,-75.5506673],
			[10.4107398,-75.5504098],
			[10.4143381,-75.5490794],
			[10.4173982,-75.5497553],
			[10.4182002,-75.550737],
			[10.418369,-75.5522337]
	
		];


		

		polygon = map.drawPolygon({
			paths: path,
			strokeColor: '#BBD8E9',
			strokeOpacity: 1,
			strokeWeight: 3,
			fillColor: '#BBD8E9',
			fillOpacity: 0.6
		});


		


	});
    
    </script>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBq8e96biIxn6FnqzvEXqB4WD6d9t6lcM0"></script>
      <script src="assets/plugins/gmaps/gmaps.js"></script>
      <script src="assets/plugins/gmaps/prettify/prettify.js"></script>
     

