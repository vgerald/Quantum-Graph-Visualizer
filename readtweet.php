<?php 
#phpinfo(); 
echo "<H1>PHP works!</H1>";
?>

<html>

<head>
 <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
 <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
 
<?php

// $json = 'json string – from twitter!'
// $ser = New-Object System.Web.Script.Serialization.JavaScriptSerializer
// $obj = $ser.DeserializeObject($json)



// foreach ($keyValue in $obj) 
    // {
        // If ($keyValue.geo -ne "null") { 
            // $keyValue.text, $keyValue.geo.coordinates[0],$keyValue.geo.coordinates[1]
        // }
    // }

?>


<?php

#$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
$json = '{"created_at":"Tue Jan 27 21:10:05 +0000 2015","id":560182983810772992,"id_str":"560182983810772992","text":"DE-News : And now for something completely different: Heritage Theatre Festival will include a popular Monty Python\u2026 http:\/\/t.co\/Cfp9u2fBYb","source":"\u003ca href=\"http:\/\/dlvr.it\" rel=\"nofollow\"\u003edlvr.it\u003c\/a\u003e","truncated":false,"in_reply_to_status_id":null,"in_reply_to_status_id_str":null,"in_reply_to_user_id":null,"in_reply_to_user_id_str":null,"in_reply_to_screen_name":null,"user":{"id":186899860,"id_str":"186899860","name":"Stigmabase | DE","screen_name":"pairsonnalitesD","location":"Deutsch | Nederlands","url":"http:\/\/de.pairsonnalites.org","description":"World Press review about social exclusion | Deutsch - Nederlands - \u00d6sterreich | Soziale Ausgrenzung | Armut |  Alkohol & Drogen | HIV LGBT | Not-for-Profit","protected":false,"verified":false,"followers_count":2396,"friends_count":2024,"listed_count":54,"favourites_count":0,"statuses_count":247180,"created_at":"Sat Sep 04 18:19:02 +0000 2010","utc_offset":-18000,"time_zone":"Eastern Time (US & Canada)","geo_enabled":true,"lang":"fr","contributors_enabled":false,"is_translator":false,"profile_background_color":"FFFFFF","profile_background_image_url":"http:\/\/pbs.twimg.com\/profile_background_images\/378800000124896273\/3ec0cde85500bf08ecfbd84989efe16f.png","profile_background_image_url_https":"https:\/\/pbs.twimg.com\/profile_background_images\/378800000124896273\/3ec0cde85500bf08ecfbd84989efe16f.png","profile_background_tile":false,"profile_link_color":"0084B4","profile_sidebar_border_color":"FFFFFF","profile_sidebar_fill_color":"EFEFEF","profile_text_color":"333333","profile_use_background_image":true,"profile_image_url":"http:\/\/pbs.twimg.com\/profile_images\/378800000775088632\/859493946769c871c405efa875ffe308_normal.png","profile_image_url_https":"https:\/\/pbs.twimg.com\/profile_images\/378800000775088632\/859493946769c871c405efa875ffe308_normal.png","profile_banner_url":"https:\/\/pbs.twimg.com\/profile_banners\/186899860\/1385148681","default_profile":false,"default_profile_image":false,"following":null,"follow_request_sent":null,"notifications":null},"geo":{"type":"Point","coordinates":[52.591320,13.467578]},"coordinates":{"type":"Point","coordinates":[13.467578,52.591320]},"place":{"id":"3078869807f9dd36","url":"https:\/\/api.twitter.com\/1.1\/geo\/id\/3078869807f9dd36.json","place_type":"city","name":"Berlin","full_name":"Berlin, Deutschland","country_code":"DE","country":"Deutschland","bounding_box":{"type":"Polygon","coordinates":[[[13.088304,52.338079],[13.088304,52.675323],[13.760909,52.675323],[13.760909,52.338079]]]},"attributes":{}},"contributors":null,"retweet_count":0,"favorite_count":0,"entities":{"hashtags":[],"trends":[],"urls":[{"url":"http:\/\/t.co\/Cfp9u2fBYb","expanded_url":"http:\/\/dlvr.it\/8GYzr5","display_url":"dlvr.it\/8GYzr5","indices":[117,139]}],"user_mentions":[],"symbols":[]},"favorited":false,"retweeted":false,"possibly_sensitive":false,"filter_level":"low","lang":"en","timestamp_ms":"1422393005694"}
'; 

#var_dump(json_decode($json));
#echo "<br>";
#var_dump(json_decode($json, true));


#$json = '{"foo-bar": 12345}';

$obj = json_decode($json);

print $obj->{'text'}; // 12345
echo "<br>";
print $obj->{'geo'}->{'coordinates'}[0];
print "<br>";
print $obj->{'geo'}->{'coordinates'}[1];

//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// function factorial($number) { 
 
	// if ($number < 2) { 
        // return 1; 
    // } else { 
        // return ($number * factorial($number-1)); 
    // } 
// }

// echo "<br><br>". factorial(3);

?> 
 
 
</head>

<body>
 <div id="map" style="width: 600px; height: 400px"></div>

<script>
 
// create a map in the "map" div, set the view to a given place and zoom
var map = L.map('map').setView([<?php print $obj->{'geo'}->{'coordinates'}[0]?>, <?php print $obj->{'geo'}->{'coordinates'}[1]?>], 1);

// add an OpenStreetMap tile layer
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// add a marker in the given location, attach some popup content to it and open the popup
L.marker([<?php print $obj->{'geo'}->{'coordinates'}[0]?>, <?php print $obj->{'geo'}->{'coordinates'}[1]?>]).addTo(map)
    .bindPopup('<?php print $obj->{'text'};?>')
    .openPopup();



</script>



</body>
</html>
