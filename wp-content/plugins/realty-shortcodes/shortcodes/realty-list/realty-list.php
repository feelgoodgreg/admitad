<?php


function realty_list(){
	
	$realty = get_posts( array(
		'numberposts' => -1,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'post_type'   => 'realty',
	) );
	
	$output = '<pre>'.var_export($realty, true).'</pre>';
	$output = '<div class="last-realty">
				<h3>Новые объекты:</h3>
				<div class="row">';
	
	foreach($realty as $item){
		$thumb = get_the_post_thumbnail_url($item->ID);
		if(!$thumb){
			$thumb = plugins_url('realty-shortcodes/img/noimg.jpg');
		}
		
		$output .='
			<div class="col-lg-6 col-md-4">
				<div class="card realty-item">
					<img class="card-img-top" src="'.$thumb.'">
					<div class="card-body">
						<h6 class="card-title">
							<a href="'.get_post_permalink($item->ID).'">'.$item->post_title.'</a>
						</h6>
						<div class="realty-meta">
							'.get_realty_meta_list($item->ID).'
						</div>
					</div>
				</div>
			</div>';
		
	}
	
	$output .= '</div></div>';
	
	
	return $output;
	
}
add_shortcode('realty_list', 'realty_list');