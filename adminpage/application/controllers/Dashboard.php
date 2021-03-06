<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Test_model');
		$this->Test_model->get_table('tema');
	}

	public function index()
	{
		if ($this->session->userdata("admin_username") != "") {

			$this->load->model('Cilinaya_model');
			$tema = $this->Test_model->get_table('tema');
			// $d['content'] = "home";
			// $d = array(
			// 	'content' => 'home',
			// 	'tema' => $tema
			// );
			$data['content'] = "home";
			$data['tema'] = $tema;

			$this->load->view('dashboard', $data);
		} else {
			$url = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $url . '"; 
			</script>';
		}
	}
}
