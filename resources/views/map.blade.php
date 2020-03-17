<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <?php
    $lat=53.3338;
    $lon=-6.2488;
    //This use of base href needs to refer to a website with an active MediaWiki installation for the map to load. I haven't worked out why. ?>
    <base href="https://motorwayservices.ie/" />

    <?php
    //This code is written by MediaWiki and needs to be included for the map to load. I haven't been able to pull apart exactly which parts are required.
    // The part "Maps/" should refer to the exact file path to that directory. ?>

    <script>
        (window.RLQ=window.RLQ||[]).push(function(){mw.config.set({"wgWikiEditorEnabledModules":[],"egMapsScriptPath":"Maps/","egMapsDebugJS":false,"egMapsAvailableServices":["leaflet","googlemaps3"],"egMapsLeafletLayersApiKeys":{"MapBox":"","MapQuestOpen":"","Thunderforest":"","GeoportailFrance":""},"egMapsLeafletLayersDark":["CartoDB.DarkMatter"]});mw.loader.state({"site.styles":"ready","noscript":"ready","user.styles":"ready","user":"ready","user.options":"loading","user.tokens":"loading","mediawiki.legacy.shared":"ready","mediawiki.legacy.commonPrint":"ready"});mw.loader.implement("user.options@032mizr",function($,jQuery,require,module){/*@nomin*/mw.user.options.set({"disablemail":"1","enotifusertalkpages":"","enotifwatchlistpages":"","watchcreations":"","watchdefault":"","timecorrection":"System|","rcfilters-limit":"500","rcfilters-rc-collapsed":0,"rcfilters-saved-queries":"{\"queries\":{},\"version\":\"2\"}","watchlisttoken":"2a4bee34a92355c53a0b5678e8616c6c163af02a"});
        });mw.loader.implement("user.tokens@0tffind",function($,jQuery,require,module){/*@nomin*/mw.user.tokens.set({"editToken":"320577e8771651ffe9d7b3153d684d0e5e696e2b+\\","patrolToken":"d48e8873d24c972cb1b43020e331d84d5e696e2b+\\","watchToken":"abc6827b01ad760917e05d3e476d23005e696e2b+\\","csrfToken":"320577e8771651ffe9d7b3153d684d0e5e696e2b+\\"});
        });RLPAGEMODULES=["ext.maps.leaflet.loader","site","mediawiki.page.startup","mediawiki.user","mediawiki.page.ready","mediawiki.searchSuggest","mediawiki.page.watch.ajax","mmv.head","mmv.bootstrap.autostart","skins.vector.js"];mw.loader.load(RLPAGEMODULES);});
    </script>


    <?php
    // These files ned to be included for the map to work. Note that the first one refers to a MediaWiki installation.
    // Note that some relative file paths have been given. These would need to be the full URL, or else the base href would cause issues. ?>
    <link rel="stylesheet" href="https://randall.ie/help/style.css.php">
    <script async="" src="https://motorwayservices.ie/wiki/load.php?debug=false&lang=en&modules=startup&only=scripts&skin=vector"></script>
    <link rel="stylesheet" href="https://randall.ie/wiki/extensions/Maps/resources/lib/leaflet/leaflet.css"/>
    <script src="https://randall.ie/wiki/extensions/Maps/resources/lib/leaflet/leaflet.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
    <?php
    // The map code.
    // Apologies for the ugliness - I understand that line breaks can cause issues.
    // Several parameters are applied. It then adds each marker.
    // You see that there is scope to turn lat, lon and message into variables.
    // Issue: Using HTML - or even any punctuation - in the marker can become messy.
    // You can set a centre point for the map. This can cause odd behaviour on a busy map though.
    // There is access to alternative services to OpenStreetMap: basically the entire OpenLayers library.
    // Note that the location of the marker has been given a relative file path. It would need the full URL, or else the base href would cause issues. ?>

    <div id="mw-content-text" lang="en" dir="ltr" class="mw-content-ltr">

        <div class="mw-parser-output">

            <div id="map_leaflet_1" style="max-width:70em; margin-bottom:1em !important;height: 350px!important; background-color: #eeeeee; overflow: hidden;" class="maps-map maps-leaflet">

                <div class="maps-loading-message">Loading map...</div>

                <div style="display: none" class="mapdata">{"minzoom":14,"maxzoom":16,"mappingservice":"leaflet","width":"auto","height":"575px","centre":{"text":"","title":"","link":"","lat":<?php echo "$lat,\"lon\":$lon" ;?>,"icon":""},"title":"","label":"","icon":"","lines":[],"polygons":[],"circles":[],"rectangles":[],"copycoords":false,"static":false,"zoom":16,"defzoom":16,"layers":["OpenStreetMap"],"overlays":[],"resizable":true,"fullscreen":false,"scrollwheelzoom":true,"cluster":false,"clustermaxzoom":20,"clusterzoomonclick":true,"clustermaxradius":80,"clusterspiderfy":true,"geojson":"","clicktarget":"","locations":[{"text":"\u003Cdiv\u003E\u003Cp\u003E MARKER CONTENT HERE \u003C/p\u003E\u003C/div\u003E","title":"MARKER SUMMARY HERE","link":"","lat":53.044268999999,"lon":-6.09046790000000015652403817,"icon":"https://randall.ie/help/marker-icon.png"}],"imageoverlays":null}</div>

            </div>

        </div>

    </div>

</body>

</html>
