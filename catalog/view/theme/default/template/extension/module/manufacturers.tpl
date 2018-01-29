<?php
echo '<div class="well">';
	if ($slider): echo '<div id="manufacturers" class="owl-carousel">';
		if ($random): shuffle($manslides); endif;
		foreach ($manslides as $manslide):
			if ($manslide['image']): echo '<div class="item"><a href="' .$manslide['href'] .'"><center><img src="' .$manslide['image'] .'" alt="' .$manslide['name']. '" class="img-responsive" /></center></a></div>';
			endif;
		endforeach;
		echo '</div>';
	endif;

	if ($select): echo '<div><select id="manufacturers" class="form-control" onchange="location = this.value;"><option>' . $select_text . '</option>';
		foreach ($manufacturers as $manufacturer): echo'<option value="' .$manufacturer['href'] .'">' .$manufacturer['name']. '</option>';
		endforeach; 
echo'</select></div>';
	endif; 
echo'</div>';

if ($slider): echo "
<script type='text/javascript'><!--
$('#manufacturers').owlCarousel({
	items: 6,
	autoPlay:   $speed,
	singleItem: true,
	navigation: false,
	pagination: false,
	transitionStyle: 'fade'
});
--></script>";
endif;
?>