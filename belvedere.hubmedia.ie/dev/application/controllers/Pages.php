<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends CI_Controller{
	public function __construct(){
		 parent::__construct();			 
	}
	public function view($slug = 'home'){
		$page = $slug;
		if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
			$page = 'default';
			//show_404();
		}
		$data['page_content'] = $this->Common_Model->getSingle('pages',array('slug'=>$slug,'status'=>1));
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
}
	