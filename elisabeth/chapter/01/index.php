
<style>
	.flow_image{
		width: 194px;
		height: 175px;
	}
</style>

<?php


require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php');

// VARS 

$section = 'WEB PAGE BUILDING BLOCKS';
$image = $_PATH .'/elisabeth/img/wild-blue-flax.jpg';
$image_alt = 'Blue Flax';







echo 'SECTION: '.$section;



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<div>
	<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="flow_image">	
</div>
<p>
	I am continually amazed at the beautiful, delicate blue flax taht somehow took hold in my garden.
	they are awash in color every morning, yet not a single flower remains by the afternoon.
	they are the very definition of 
	<em>
		ephemeral
	</em>
</p>
<p>
	&copy; 2002 by Blue Flax Society. 
</p>

