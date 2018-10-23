<?php


// front ajax url
add_action( 'wp_enqueue_scripts', 'realtyajax_data', 99 );
function realtyajax_data(){
	wp_localize_script('realty-shortcodes-script', 'realtyajax', 
		array(
			'url' => admin_url('admin-ajax.php')
		)
	);  
}




// form shortcode
function add_realty_form(){
	$output = '<div class="add-realty">
				<h3>Добавить объект:</h3>';
	
	$output .='
				<form type="post" id="add-realty-form">
					<div class="form-group">
						<label for="realtyName">Заголовок объекта недвижимости</label>
						<input name="title" type="text" class="form-control" id="realtyName" placeholder="Укажите заголовок" required>
					</div>
					<div class="form-group">
						<label for="realtyDesc">Описание объекта недвижимости</label>
						<textarea name="description" class="form-control" id="realtyDesc" placeholder="Укажите описание" ></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Добавить</button>
				</form>
			';
	
	$output .= '</div>';
	
	return $output;
}
add_shortcode('add_realty_form', 'add_realty_form');




// ajax
add_action('wp_ajax_add_realty', 'add_realty_callback');
function add_realty_callback() {
	
	$realty_data = array(
		'post_title'    => wp_strip_all_tags($_POST['title']),
		'post_content'  => $_POST['description'],
		'post_status'   => 'publish',
		'post_author'   => 1,
		'post_type' 	=> 'realty'
	);
	
	$realty_id = wp_insert_post($realty_data, true);
	if(is_wp_error($realty_id)){
		$result = array(
			'status' => false,
			'message' => 'При добавлении произошла ошибка: '.$realty_id->get_error_message()
		);
	}
	else{
		$result = array(
			'status' => true,
			'message' => 'Новый объект недвижимости успешно добавлен!'
		);
	}
	
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
	wp_die();
}