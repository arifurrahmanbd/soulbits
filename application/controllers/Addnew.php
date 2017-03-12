<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addnew extends CI_Controller {
	
public function index(){
		$pageInitData = new stdClass(); //Creates a new empty object
		$pageInitData->title = 'Admin Panel';
		$pageInitData->instituteName = "Soul Bits Blog";
               $this->load->model('Notification_model');
		$this->load->model('CMS_Noticeboard_model');
		try {
			$pageInitData->notifications = $this->Notification_model->get_last_ten_entries();
		} catch (Exception $e) {
			echo '<h1 style="color:red">error to fetch data</h1>';
		}
		$pageInitData->current_menu='index';
		$pageInitData->pageHeadline='Welcome To School';
		$pageInitData->firstLink='Welcome Page';
		$pageInitData->pageName='';
		$pageInitData->pageHeadlineDetails='Last updated on 27 th August, 2016';
		
		$this->load->helper('url');
		$this->load->view('addnew');
	}
	public function noticeboard(){
		$pageInitData = new stdClass(); //Creates a new empty object
		$pageInitData->title = 'Notice Board';
		$pageInitData->instituteName = "Soul Bits Blog";
		$this->load->model('Notification_model');
		$this->load->model('CMS_Noticeboard_model');
		try {
			$pageInitData->noticeboard_datas = $this->CMS_Noticeboard_model->retrieve();;
			$pageInitData->notifications = $this->Notification_model->get_last_ten_entries();
		} catch (Exception $e) {
			echo '<h1 style="color:red">error to fetch data</h1>';
		}
		$pageInitData->current_menu='index';
		$pageInitData->pageHeadline='Welcome To School';
		$pageInitData->firstLink='Welcome Page';
		$pageInitData->pageName='';
		$pageInitData->pageHeadlineDetails='Last updated on 27 th August, 2016';
		
		$this->load->helper('url');
		$this->load->view('secured_admin_panel/inc/prebody',$pageInitData);
		$this->load->view('secured_admin_panel/noticeboard');
		$this->load->view('secured_admin_panel/inc/postbody',$pageInitData);
	}
	public function addNoticeboardData(){
		$this->load->model('CMS_Noticeboard_model');
		try {
			$post = $this->input->post();
			$securityCode = $post['securityCode'];
			$md5Data = md5($securityCode);
			if($md5Data == "22660d882a014499fbd962beaf0f88bb"){

				$this->CMS_Noticeboard_model->insert($post);
			echo 'data inserted successfully';
			}else {
			echo 'Sorry You are not permitted to do this operation.';
				
			}
		} catch (Exception $e) {
			echo 'error to insert data';
		}
	
	}

	public function updateNoticeboardData(){
		$this->load->model('CMS_Noticeboard_model');
		try {
			$post = $this->input->post();
			$securityCode = $post['securityCode'];
			$md5Data = md5($securityCode);
			if($md5Data == "22660d882a014499fbd962beaf0f88bb"){
				$this->CMS_Noticeboard_model->update($post);
				echo 'data updated successfully';
			}else {
				echo 'Sorry You are not permitted to do this operation.';
	
			}
		} catch (Exception $e) {
			echo 'error to update data';
		}
	
	}
	

	public function getNoticeBoardData(){
		$this->load->model('CMS_Noticeboard_model');
		$this->load->helper('url');
		try {
			$noticeboard_datas = $this->CMS_Noticeboard_model->retrieve();
			foreach ($noticeboard_datas as $noticeboard_data){
				echo '<div class="callout callout-info">'.
						'<h4 class="border-bottom">'.$noticeboard_data->headline.'</h4>'.
	
						'<p>'.$noticeboard_data->details.'</p>'.
						'<input type="button" class="btn btn-primary"  onclick="editNoticeboardData('.$noticeboard_data->noticeId.')" value="Edit"/>'.
						'<input type="button" class="btn btn-danger pull-right"  onclick="deleteNoticeboardData('.$noticeboard_data->noticeId.')" value="Delete"/>'.
						'</div>';
			}
		} catch (Exception $e) {
			echo 'error to insert data';
		}
	
	}
	public function editNoticeboardData(){
		$this->load->database();
		$this->load->model('CMS_Noticeboard_model');
		$post = $this->input->post();
		try {
			$noticeboard_datas = $this->CMS_Noticeboard_model->retrieveNotice($post);
			$noticeboard_data = $noticeboard_datas[0];
			echo '<form role="form" action="noticeboard_form_action">
              <div class="box-body">
                <div class="form-group">
                  <label for="securityCode">Security Code</label>
                  <input placeholder="Enter Security Code" class="form-control" id="securityCode" type="password">
                </div>
                <div class="form-group">
                  <label for="headline">Headline</label>
                   <input class="form-control" placeholder="Enter Headline" class="form-control" value="'.$noticeboard_data->headline.'" id="headline" type="text" >
                </div>
                <div class="form-group">
                  <label for="details">Details</label>
                  <textarea class="form-control" placeholder="Enter details" rows="10" cols="50" id="details">'.$noticeboard_data->details.'</textarea>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="button" class="btn btn-primary pull-right" value="Update" onclick="updateNoticeboardData('.$noticeboard_data->noticeId.')"/>
              </div>
            </form>';
		} catch (Exception $e) {
			echo 'error to retrieve data';
		}
	}
	public function deleteNoticeboardData(){
		$this->load->database();
		$this->load->model('CMS_Noticeboard_model');
		$post = $this->input->post();
		try {
                       $post = $this->input->post();
			$securityCode = $post['securityCode'];
			$md5Data = md5($securityCode);
			if($md5Data == "22660d882a014499fbd962beaf0f88bb"){
			$this->CMS_Noticeboard_model->delete($post);
				echo 'data deleted successfully';
			}else {
				echo 'Sorry You are not permitted to do this operation.';
	
			}
		} catch (Exception $e) {
			echo 'error to delete data';
		}
	}
	
}