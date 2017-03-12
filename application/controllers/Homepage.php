<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	public function index(){
		$this->load->view('homepage');
	}
	public function getNoticeBoardData(){
		$this->load->model('CMS_Noticeboard_model');
		$this->load->helper('url');
		try {
			$noticeboard_datas = $this->CMS_Noticeboard_model->retrieve();
			foreach ($noticeboard_datas as $noticeboard_data){
				echo '<div class="callout callout-info">'.
						'<h4 class=" border-bottom">'.$noticeboard_data->headline.'</h4>'.

						'<p>'.$noticeboard_data->details.'</p>';
			}
		} catch (Exception $e) {
			echo 'error to insert data';
		}

	}
}