<?php 

// FUNÇÃO PARA CARREGAR CSS
function load_css($arquivo = null, $media = 'screen', $import = FALSE, $echo = FALSE){
	$css ='';
	if($import == TRUE){
		$css = '<link rel="stylesheet" type="text/css" href="'.$arquivo.'" media="'.$media.'">'."\n";
	} else {
		if($arquivo != null){
			if(file_exists('assets/'.$arquivo.'.css')){
				$arquivo = base_url('assets/'.$arquivo.'.css');
			}
			$css = '<link rel="stylesheet" type="text/css" href="'.$arquivo.'" media="'.$media.'">';
			if($echo){
				echo $css;
			} else {
				return $css;
			}
		} else {
			echo 'Arquivo não encontrado!';
		}
	}
} // FIM DA FUNÇÃO PARA CARREGAR CSS

// FUNÇÃO PARA CARREGAR JS
function load_js($arquivo = null, $echo = FALSE){
	if($arquivo != null){
		if(file_exists('assets/'.$arquivo.'.js')){
			$arquivo = base_url('assets/'.$arquivo.'.js');
		}
		$js = '<script type="text/javascript" src="'.$arquivo.'"></script>'."\n";
		if($echo){
			echo $js;
		} else {
			return $js;
		}
	}
}

// FUNÇÃO PARA CARREGAR TEMA
function get_tema(){
	$ci =& get_instance();
	$ci->load->library('sistema');
	return $ci->sistema->tema;
}
function set_tema($propriedade, $valor, $replace = TRUE){
	$ci =& get_instance();
	$ci->load->library('sistema');
	if($replace):
		$ci->sistema->tema[$propriedade] = $valor;
	else:
		if(!isset($ci->sistema->tema[$propriedade]))$ci->sistema->tema[$propriedade] = "";
		$ci->sistema->tema[$propriedade] .= $valor;
	endif;
}
function load_template(){
	$ci =& get_instance();
	$ci->load->library('sistema');
	if(isset($ci->sistema->tema['header'])){
		$ci->parser->parse($ci->sistema->tema['header'], get_tema());
	}
	if(isset($ci->sistema->tema['template'])){
		$ci->parser->parse($ci->sistema->tema['template'], get_tema());
	}
	if(isset($ci->sistema->tema['footer'])){
		$ci->parser->parse($ci->sistema->tema['footer'], get_tema());
	}
}
?>