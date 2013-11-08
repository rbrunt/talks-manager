<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class MY_Exceptions extends CI_Exceptions {

    function __construct(){
        parent::__construct();
    }

    function show_404(){ // error page logic
        header("HTTP/1.1 404 Not Found");
        // First, assign the CodeIgniter object to a variable
        $CI =& get_instance();

        // do what you want here, even db stuff or just 
        // load your template with a custom 404
        $CI->output->set_status_header("404");
		$CI->load->view("includes/template", array("content"=>"errors/error_404", "title"=>"Page not found"));
		echo $CI->output->get_output();
        exit;
    }
}
?>