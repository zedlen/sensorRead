<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('index');
	}
	public function getData()
	{
		$result=exec("python c:/xampp/htdocs/medic/medic.py",$out,$status); 	
		$result=str_replace("'", "", $result);
		//$result=str_replace("[", "{0:", $result);
		//$result=str_replace("]", "}", $result);		
		echo $result;
		//echo json_encode(intval($result));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */