    <link rel="stylesheet" href="http://openlayers.org/dev/theme/default/style.css" type="text/css">
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
        <script src="http://openlayers.org/dev/OpenLayers.js"></script>
<script type="text/javascript">
var map;
      var markers = [];

      function initialize() {
         var map = new OpenLayers.Map('map_canvas');
            var proj4326 = new OpenLayers.Projection("EPSG:4326");
            var projmerc = new OpenLayers.Projection("EPSG:900913");
            var layerOSM = new OpenLayers.Layer.OSM("Street Map");
            map.addLayers([layerOSM]);
            var lonLat = new OpenLayers.LonLat( -69.2260, -51.62534 )
              .transform(
              new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
              map.getProjectionObject() // to Spherical Mercator Projection
            );

            var zoom=13;

            var markers = new OpenLayers.Layer.Markers( "Markers" );
            map.addLayer(markers);

            markers.addMarker(new OpenLayers.Marker(lonLat));
            map.setCenter (lonLat, zoom);
            if (!map.getCenter()) map.zoomToMaxExtent();
            map.events.register("mousemove", map, function(e) { 
                var position = this.events.getMousePosition(e);
                var lonlat = map.getLonLatFromPixel( this.events.getMousePosition(e) );
                var lonlatTransf = lonlat.transform(map.getProjectionObject(), proj4326);
            });

            var markerslayer;
            var marcador;
            var contador_clics = 0;

            map.events.register("click", map, function(e) {
                markers.destroy();
              if(contador_clics>0){
                markerslayer.removeMarker(marcador);
              };
                var position = this.events.getMousePosition(e);
                var icon = new OpenLayers.Icon('http://maps.google.com/mapfiles/ms/icons/red-pushpin.png');   
                var lonlat = map.getLonLatFromPixel(position);
                var lonlatTransf = lonlat.transform(map.getProjectionObject(), proj4326);
                OpenLayers.Util.getElement("lat").value = lonlatTransf.lat;
                OpenLayers.Util.getElement("lng").value = lonlatTransf.lon;
                console.log ('lonlatTrans=> lat='+lonlatTransf.lat+' lon='+lonlatTransf.lon+'\nlonlat=>'+lonlat+'\nposition=>'+position);
                var lonlat = lonlatTransf.transform(proj4326, map.getProjectionObject());
                markerslayer = new OpenLayers.Layer.Markers( "Markers" );
                marcador = new OpenLayers.Marker(lonlat);

                markerslayer.addMarker(marcador);
                map.addLayer(markerslayer);
                contador_clics++;
            });
            map.addControl(new OpenLayers.Control.LayerSwitcher());
          };


  
  
</script>
