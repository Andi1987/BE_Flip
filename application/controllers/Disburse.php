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
					'label' => 'failed',
					'message' => 'VALIDATION_ERROR'
				);
				
			} else {
				
			$header = array(
				'Content-Type'	=> 'application/x-www-form-urlencoded',
				'Authorization'	=> 'Basic ' . base64_encode('HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41')
			);
			
			$bank_code 		= $this->input->post('bank_code');
			$account_number = $this->input->post('account_number');
			$amount			= $this->input->post('amount');
			$remark			= $this->input->post('remark');
			$time 			= date("Y-m-d h:i:s");
			
			$post_data = array(
				 'bank_code' 		=> $bank_code,
				 'account_number'	=> $account_number,
				 'amount'			=> $amount,
				 'remark'			=> $remark
				);
			
				
			$this->load->library('flip_request',$header);
			
			$req_disburse = $this->flip_request->flip_post($post_data);
			//print_r($req_disburse['id']);
			
			$data = array(
						'id' 	=> $req_disburse['id'],
						'amount' => $amount,
						'status' => 'PENDING',
						'timestamp' => $time,
						'bank_code' => $bank_code,
						'account_number' => $account_number,
						'beneficiary_name' => 'PT FLIP',
						'remark'			=> $remark,
						'receipt'		=> null,
						'time_served'	=> '0000-00-00 00:00:00',
						'fee'			=> 4000
					);
			//print_r($data);die;
			$this->Flip_model->insert_data('disburse',$data);
			
			//echo json_encode($data);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
			echo "\n";
		}
	}
}
