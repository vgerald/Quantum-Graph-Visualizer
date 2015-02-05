<html>
<head>

<?php
require 'twitteroauth/autoloader.php';
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'xajC05nB5yguNnZ9l1Bdb2ddS');
define('CONSUMER_SECRET', 'l4k9lTBT8EZb8p0ROP6psHdg1KEN0s9pqTQyKJ8daDTdbdsocm');
define('OAUTH_CALLBACK', 'http://visuallynotify.com ');

function getConnectionWithAccessToken($oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $oauth_token, $oauth_token_secret);
  return $connection;
}
$connection = getConnectionWithAccessToken("48627225-P6b9wZsfrF4Y8xQVFejtXnXRyoXP4sa1m9csAP3Ax", "O2lSYerzmyjL6Lf1x7hCCwxkmdgNt7yC8ItlqcRWur4iA");

function postStatusUpdate($status_update,$connection){
	echo $status_update;
	$connection->post('statuses/update', array('status' => $status_update));
	echo " ... Posted successfully";
	sleep(10);
}

if(isset($_GET['runFunction'])) // && function_exists($_GET['runFunction']))
{
//call_user_func($_GET['runFunction']);
postStatusUpdate(htmlspecialchars(urldecode($_GET["runFunction"])),$connection);
}
else
echo "Post Status Updates here:";


//////////// OTHER TWITTER API ACTIONS /////////////////////////////////////////////
// $content = $connection->get("statuses/home_timeline");
//$content = $connection->get("account/verify_credentials");

//var_dump($connection);
//var_dump($content);

//$content = $connection->get("account/verify_credentials");
//$statues = $connection->get("statuses/home_timeline", array("count" => 25, "exclude_replies" => true));
// for posting status
//$connection->post('statuses/update', array('status' => 'status text here'));

// for direct message - need to update permission for app!!
//$connection->post('direct_messages/new', array('text' => 'dm text here', 'screen_name' => 'recipients screen_name'));
//////////// OTHER TWITTER API ACTIONS /////////////////////////////////////////////
?>

</head>

<body>
<script>
function btnclicked() {
    var search = document.getElementById('status_update').value;
    var searchEncoded = encodeURIComponent(search);
    window.location = "http://visuallynotify.com/tweetsuite/checktweet.php?runFunction=" + searchEncoded;
}
</script>


<input id=status_update type=text></input>
<input id=status_post type=button value='Post Status' onclick="btnclicked()"></input>



</br>
<!-- SHOWS TWITTER FEED -->
</br>
<a class="twitter-timeline" href="https://twitter.com/vgerald" data-widget-id="562447625647955968">Tweets by @vgerald</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</body>
</html>