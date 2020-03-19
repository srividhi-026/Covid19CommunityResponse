@include('layout.header')

    <div class="container-fluid">

        @if(session()->has('message'))

            <div id="card-alert" class="card light-blue">

                <div class="notification card-content white-text">

                    <i class="notification-icon material-icons-outlined">notification_important</i>

                    <span>SUCCESS: {{session()->pull('message')}}</span>

                </div>

            </div>

        @endif

        @if ($errors->any())

            <div id="card-alert" class="card red lighten-1">

                <div class="notification card-content white-text">

                    <i class="notification-icon material-icons-outlined">notification_important</i>

                    <span>ERROR: Please review your details in the form below.</span>

                    <br>

                </div>

            </div>

        @endif

        <div class="row">

            <div class="col s12">

                <div id='map'></div>

                <script>
                    mapboxgl.accessToken = 'pk.eyJ1IjoiY3J5cHRva25pZ2h0IiwiYSI6ImNrN3c3emtyNTAwMnUza203ajkxdnltbnEifQ.cIJgx9Rz3A-uOJ1zsWtdQg';
                    var map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/mapbox/dark-v10',
                        center: [-6.2488 , 53.3338],

                        zoom: 5
                    });

                    map.on('load', async function() {

                        let data = await getUsersData();

                        // Add a new source from our GeoJSON data and
                        // set the 'cluster' option to true. GL-JS will
                        // add the point_count property to your source data.
                        map.addSource('earthquakes', {
                            type: 'geojson',
                            // Point to GeoJSON data. This example visualizes all M1.0+ earthquakes
                            // from 12/22/15 to 1/21/16 as logged by USGS' Earthquake hazards program.
                            //data: 'https://docs.mapbox.com/mapbox-gl-js/assets/earthquakes.geojson',
                            data: data.data,
                            cluster: true,
                            clusterMaxZoom: 14, // Max zoom to cluster points on
                            clusterRadius: 30 // Radius of each cluster when clustering points (defaults to 50)
                        });

                        map.addLayer({
                            id: 'clusters',
                            type: 'circle',
                            source: 'earthquakes',
                            filter: ['has', 'point_count'],
                            paint: {
                                // Use step expressions (https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-step)
                                // with three steps to implement three types of circles:
                                //   * Blue, 20px circles when point count is less than 100
                                //   * Yellow, 30px circles when point count is between 100 and 750
                                //   * Pink, 40px circles when point count is greater than or equal to 750
                                'circle-color': [
                                    'step',
                                    ['get', 'point_count'],
                                    '#E91E63',
                                    100,
                                    '#FF5722',
                                    750,
                                    '#2196F3'
                                ],
                                'circle-radius': [
                                    'step',
                                    ['get', 'point_count'],
                                    20,
                                    100,
                                    30,
                                    750,
                                    40
                                ]
                            }
                        });

                        map.addLayer({
                            id: 'cluster-count',
                            type: 'symbol',
                            source: 'earthquakes',
                            filter: ['has', 'point_count'],
                            layout: {
                                'text-field': '{point_count_abbreviated}',
                                'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
                                'text-size': 12
                            }
                        });

                        map.addLayer({
                            id: 'unclustered-point',
                            type: 'circle',
                            source: 'earthquakes',
                            filter: ['!', ['has', 'point_count']],
                            paint: {
                                'circle-color': '#2196F3',
                                'circle-radius': 4,
                                'circle-stroke-width': 1,
                                'circle-stroke-color': '#fff'
                            }
                        });

                        // inspect a cluster on click
                        map.on('click', 'clusters', function(e) {
                            var features = map.queryRenderedFeatures(e.point, {
                                layers: ['clusters']
                            });
                            var clusterId = features[0].properties.cluster_id;
                            map.getSource('earthquakes').getClusterExpansionZoom(
                                clusterId,
                                function(err, zoom) {
                                    if (err) return;

                                    map.easeTo({
                                        center: features[0].geometry.coordinates,
                                        zoom: zoom
                                    });
                                }
                            );
                        });

                        // When a click event occurs on a feature in
                        // the unclustered-point layer, open a popup at
                        // the location of the feature, with
                        // description HTML from its properties.
                        map.on('click', 'unclustered-point', function(e) {

                            let coordinates = e.features[0].geometry.coordinates.slice();
                            let name = e.features[0].properties.name;
                            let driving = e.features[0].properties.driving;
                            let status = e.features[0].properties.status;

                            // Ensure that if the map is zoomed out such that
                            // multiple copies of the feature are visible, the
                            // popup appears over the copy being pointed to.
                            while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                                coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                            }

                            //alert(mag)

                            new mapboxgl.Popup()
                                .setLngLat(coordinates)
                                .setHTML("<strong>Name: </strong>" + name + "</br>" +
                                         "<strong>Driving: </strong>" + driving + "</br>" +
                                         "<strong>Status: </strong>" + status + "</br>")
                                .addTo(map);
                        });

                        map.on('mouseenter', 'clusters', function() {
                            map.getCanvas().style.cursor = 'pointer';
                        });
                        map.on('mouseleave', 'clusters', function() {
                            map.getCanvas().style.cursor = '';
                        });
                    });

                    async function getUsersData () {
                        // Performing a GET request
                        return axios.get('https://covidcommunityresponse.ie/get_map_data');
                    }

                </script>

            </div>

        </div>

    </div>

@include('layout.footer')
