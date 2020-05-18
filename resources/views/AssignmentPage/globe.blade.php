@extends ('layouts.studentLayout')
@section('content')
    <head>

        <title>CultureUp - Globe</title>

        <link rel="stylesheet" href="https://js.arcgis.com/4.15/esri/themes/light/main.css"/>
        <link rel="stylesheet" href="/css/Assignment/globe.css"/>

        <script src="https://js.arcgis.com/4.15/"></script>

        <script>
            require([
                "esri/Map",
                "esri/views/SceneView",
                "esri/layers/TileLayer",
                "esri/layers/GeoJSONLayer",
                "esri/Basemap",

                "esri/geometry/Mesh"
            ], function (Map, SceneView, TileLayer, GeoJSONLayer, Basemap, Mesh) {

                const offset = 300000; // offset from the ground used for the clouds

                const basemap = new Basemap({
                    baseLayers: [
                        new TileLayer({
                            url: "https://tiles.arcgis.com/tiles/nGt4QxSblgDfeJn9/arcgis/rest/services/terrain_with_heavy_bathymetry/MapServer"
                        })
                    ]
                });
                try {
                    document.getElementById('toggle-button').addEventListener('click', switchMapTexture)
                }catch{}
                let mapTexture = localStorage.getItem('CultureUpDarkMode') === 'true' ? "dark-gray-vector" : "gray-vector";
                console.log(mapTexture);
                console.log((localStorage.getItem('CultureUpDarkMode') === 'true'));

                function switchMapTexture(){
                    mapTexture = !(localStorage.getItem('CultureUpDarkMode') === 'true') ? "dark-gray-vector" : "gray-vector";
                    console.log(mapTexture);
                    console.log(!(localStorage.getItem('CultureUpDarkMode') === 'true'));
                    map.basemap = mapTexture
                }

                var map = new Map({
                    basemap: mapTexture
                });

                const view = new SceneView({
                    container: "viewDiv",
                    map: map,
                    alphaCompositingEnabled: true,
                    qualityProfile: "low",
                    camera: {
                        position: [20.03975781, 14.94826384, 28000000],
                    },
                    environment: {
                        background: {
                            type: "color",
                            color: [255, 252, 244, 0]
                        },
                        starsEnabled: true,
                        atmosphereEnabled: false,
                    },
                    constraints: {
                        altitude: {
                            min: 10000000,
                            max: 28000000
                        }
                    },
                    popup: {
                        dockEnabled: true,
                        dockOptions: {
                            position: "top-right",
                            breakpoint: false,
                            buttonEnabled: false
                        },
                        collapseEnabled: false
                    },
                    highlightOptions: {
                        color: [255, 255, 255],
                        haloOpacity: 0.5
                    }
                });

                view.ui.empty("top-left");

                const extremesLayer = new GeoJSONLayer({
                    url: "/GeoJSON/cases.geojson",
                    elevationInfo: {
                        mode: "absolute-height",
                        offset: offset
                    },
                    renderer: {
                        type: "simple",
                        symbol: {
                            type: "point-3d",
                            symbolLayers: [
                                {
                                    type: "icon", // autocasts as new IconSymbol3DLayer()
                                    resource: {
                                        href: '/images/map-marker-alt-solid.svg'
                                    },
                                    size: 50,
                                }
                            ],
                        },
                    },
                    popupTemplate: {
                        title: "{name}",
                        content: `
            <div class="popupImage">
              <img src="{imageUrl}"/>
            </div>
            <div class="popupDescription">
              <p class="info">
                <span class="esri-icon-favorites"></span> {type}
              </p>
              <p class="info">
                <span class="esri-icon-map-pin"></span> {location}
              </p>
              <p class="info">
                <span class="esri-icon-documentation"></span> {facts}
              </p>
            </div>
          `
                    }
                });
                map.layers.add(extremesLayer);
            });
        </script>


    </head>

    <body>

    <div id="viewDiv"></div>

    </body>

    </html>
@endsection