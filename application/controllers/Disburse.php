<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disburse extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct() {
			parent::__construct();
				$this->load->model('Flip_model');
				$this->load->library('unit_test');
			}
			
	public function index()
	{
		$this->form_validation->set_rules('bank_code', 'Bank Code', 'required');
		$this->form_validation->set_rules('account_number', 'Account Number', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('remark', 'Remark', 'required');
		
		if ($this->form_validation->run() == false) {
				$server_return = array(
					'status' => 'failed',
					'message' => 'VALIDATION_ERROR'
				);
			$this->output->set_content_type('application/json')->set_output(json_encode($server_return));
			} else {
				
			$bank_code 		= $this->input->post('bank_code');
			$account_number = $this->input->post('account_number');
			$amount			= $this->input->post('amount');
			$remark			= $this->input->post('remark');
			
			$post_data = array(
				 'bank_code' 		=> $bank_code,
				 'account_number'	=> $account_number,
				 'amount'			=> $amount,
				 'remark'			=> $remark
				);
			
				
			$this->load->library('flip_request');
			
			$req_disburse = $this->flip_request->flip_post($post_data);
			//print_r($req_disburse);
			
			$data = array(
						'id' 	=> $req_disburse['id'],
						'amount' => $amount,
						'status' => $req_disburse['status'],
						'timestamp' => $req_disburse['timestamp'],
						'bank_code' => $bank_code,
						'account_number' => $account_number,
						'beneficiary_name' => $req_disburse['beneficiary_name'],
						'remark'			=> $remark,
						'receipt'		=> $req_disburse['receipt'],
						'time_served'	=> $req_disburse['time_served'],
						'fee'			=> $req_disburse['fee'],
					);
					
			//print_r($data);die;
			$test = $req_disburse;
			$expected_result = $data;
			$test_name = "Get Data from Response API";
			$this->unit->run($test, $expected_result, $test_name);
			echo $this->unit->report();

			$this->Flip_model->insert_data('disburse',$data);
			
			//echo json_encode($data);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
			echo "\n";
			
		}
	}
	
	public function disburse_get($url)
	{
		
		$this->load->library('flip_request');
		
		$sql = $this->Flip_model->get_data($url);

		if(!$sql) {
			$server_return = array(
					'status' => 'failed',
					'message' => 'ID Transaction not found'
				);
			$this->output->set_content_type('application/json')->set_output(json_encode($server_return));
			} else {

		$req_disburse_get = $this->flip_request->flip_get($url);
		
		/// SUCCESS = $req_disburse_get['status']  ///
		$data = array(
					'status' => 'SUCCESS',
					'receipt'		=> $req_disburse_get['receipt'],
					'time_served'	=> $req_disburse_get['time_served'],
				);
		
		$test = $req_disburse_get;
		$expected_result = $data;
		$test_name = "Update Data Disbursement";
		$this->unit->run($test, $expected_result, $test_name);
		echo $this->unit->report();
			
		$this->Flip_model->update_disburse($data,$url);
		
		$this->output->set_content_type('application/json')->set_output(json_encode($req_disburse_get));
		echo "\n";
	}
	}
}
