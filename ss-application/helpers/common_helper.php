<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if( ! function_exists('DateFormat')){
    function DateFormat($Date){
		return date('d M Y', strtotime($Date));
	}
}

if( ! function_exists('DateTimeFormat')){
    function DateTimeFormat($Date = '', $Style = ''){
	
		if($Style == 'break')
			return date('d M Y', strtotime($Date)) . '<br />' . date('h:i A', strtotime($Date));
			
		return date('d M Y | h:i A', strtotime($Date));
	}
}

if( ! function_exists('Ymd_to_dmY')){
    function Ymd_to_dmY($date = NULL){
		if($date) return date('d/m/Y', strtotime($date));
		return false;
	}
}
if( ! function_exists('dmY_to_Ymd')){
    function dmY_to_Ymd($date = NULL){
		if($date){
			$dateInput = explode('/', $date);
			$date = $dateInput[2].'-'.$dateInput[1].'-'.$dateInput[0];
			return $date;
		}
		return false;
	}
}