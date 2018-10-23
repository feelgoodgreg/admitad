<?php

function get_realty_meta_list($realty_id){
	
	$result = '<ul class="list-group list-group-flush">';
	
	$area = get_field( "area", $realty_id );
	if( $area )
	{
		$result .= '<li class="list-group-item"><b>Площадь: </b>'.$area.' кв. м.</li>';
	}
	
	$price = get_field( "price", $realty_id );
	if( $price )
	{
		$result .= '<li class="list-group-item"><b>Стоимость: </b>'.$price.' руб.</li>';
	}
	
	$address = get_field( "address", $realty_id );
	if( $address )
	{
		$result .= '<li class="list-group-item"><b>Адрес: </b>'.$address.'</li>';
	}
	
	$living_area = get_field( "living_area", $realty_id );
	if( $living_area )
	{
		$result .= '<li class="list-group-item"><b>Жилая площадь: </b>'.$living_area.' кв. м.</li>';
	}
	
	$floor = get_field( "floor", $realty_id );
	if( $floor )
	{
		$result .= '<li class="list-group-item"><b>Этаж: </b>'.$floor.'</li>';
	}
	
	$result .= '</ul>';
	
	
	return $result;
}