<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {

	public function  __construct(){
		parent::__construct();
		$this->load->model('user');
		$this->load->model('appointment');
		if ($this->session->userdata('loggedin')!=true){
			session_destroy();
			redirect('/');
		}
	}
	public function index(){
		$this->load->model('appointment');
		$data = array();
		$data['name'] = $this->session->userdata('name');
		$data['id'] = $this->session->userdata('id');
		$data['todays'] = $this->appointment->get_todays();
		$data['all'] = $this->appointment->get_all();
		$this->load->view('index', $data);
	}

	public function create(){
		$post = $this->input->post();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('time', 'Time', 'required|trim');
		$this->form_validation->set_rules('date', 'Date of appointments','required|trim');
		$this->form_validation->set_rules('tasks', 'Tasks', 'required|trim');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('index.php');
		}else{
			$id = $this->appointment->add_appointment(array(
				'user_id'=> $this->session->userdata('id'),
				'tasks' => $post['tasks'],
				'time' => $post['time'],
				'date' => $post['date']
				));
			redirect('/appointments/index');
		}

	}

	public function show($id){
		$item_to_show = $this->appointment->show_appointment($id);
		$this->load->view('show', $show = array('appointmentList' => $appointment_to_show));
	}
	public function edit($id)
	{
		$appointment_to_edit = $this->appointment->edit_appointment($id);
		$this->load->view('edit', $appointment_to_edit = array('appointmentList' => $appointment_to_edit));
	}

	public function update($id)
	{
		$post = $this->input->post();
		$this->appointment->update_appointment(array('id' => $id, 'tasks' => $post['tasks'],'time' => $post['time'],'status' => $post['status'],'date' => $post['date']));
	}
	public function destroy($id)
	{
		//make query to see the status of the appointment
		//if the status is pending you can't delete it. if status is done I can delete it
		$this->appointment->remove_appointment($id);
		redirect('/');
	}




}
