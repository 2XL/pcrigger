 
<style>
	.fb-share{ 
		background-image: url(<?php echo $_PATH; ?>/api/facebook/img/compartirfb.jpg); 
		width: 82px;
		height: 18px;
	}
</style>
<div class="fb-share" onclick="
			window.open(
			'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(<?php echo $_PATH.'/event.php?event='.$ID_EVENT;?>), 
			'facebook-share-dialog', 
			'width=626,height=436'); 
			return false;">  
</div>