<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Inventory
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Inventory extends CI_Controller
{
	public $data = [];

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->model('m_inventory');
		$this->load->helper(['url', 'language']);

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->data['userdata'] = $this->ion_auth->user()->row();

		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('auth/login', 'refresh');
			}
		
    }

    public function index(){
		$this->data['title'] = "Inventory";
		$this->data['inventory'] = $this->m_inventory->get_all()->result();
        $this->template->load('auth/static','inventory/index', $this->data);
	}
	
	public function create_item(){
		$this->data['title'] = "Inventory";
		
		$item_name = $this->input->post('item_name');
		$item_desc = $this->input->post('item_desc');

		$data = array (
			'item_name' => $item_name,
			'item_desc' => $item_desc
		);

		$insert = $this->m_inventory->insert_new($data);

		if ($insert > 0){
			redirect('inventory');
		}
	}

	public function update_item(){
		$this->data['title'] = "Inventory";
		
		$id = $this->uri->segment(3);
		$item_name = $this->input->post('item_name');
		$item_desc = $this->input->post('item_desc');

		$data = array (
			'item_name' => $item_name,
			'item_desc' => $item_desc
		);

		$where = array('id' => $id);

		$update = $this->m_inventory->update_item($data, $where);

		if ($update >= 1){
			redirect('inventory');
		}
	}

	public function delete_item(){
		$this->data['title'] = "Inventory";
		
		$id = $this->uri->segment(3);

		$where = array('id' => $id);

		$delete = $this->m_inventory->delete_item($where);

		if ($delete >= 1){
			redirect('inventory');
		}
	}

	public function test_pdf(){

		$this->data['inventory'] = $this->m_inventory->get_all()->result();
        $this->load->view('test_pdf', $this->data);
		// Get output html
		$html = $this->output->get_output();
		
		$this->load->library('pdf');
		$this->dompdf->loadHtml($html);
		$this->dompdf->setPaper('A4', 'potrait');
		$this->dompdf->render();
		$this->dompdf->stream("test.pdf", array("Attachment"=>0));
	}
}