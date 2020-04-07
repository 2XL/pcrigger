<div id="fb-root">

</div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/ca_ES/all.js#xfbml=1";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<?php 
	$pageURL = 'http';
	if((isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on")) {
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	} 
?>

<div style="width: 600px; padding-top: 100px; margin-left: auto; margin-right: auto;"> 
	<div class="fb-comments"  data-href="<?php  echo $pageURL; ?>" data-width="600" data-num-posts="10">
	</div>
</div>