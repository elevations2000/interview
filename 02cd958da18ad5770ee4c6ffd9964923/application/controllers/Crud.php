<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	protected $data = array(); 

	public function __construct()
    {
        parent::__construct();
		$this->data['template'] = 'html5';
		$this->data['title'] = "CRUD : ";
		$this->data['description'] = "A basic CRUD example for the State of Rhode Island Interview Test";
		$this->data['stylesheets'] = '';
		$this->data['view'] = __CLASS__ .'_'. $this->uri->segment(2, 'index');
		$this->_addStylesheet('normalize');
		$this->_addStylesheet('styles');
		$this->_addStylesheet('crud');
    }

	public function index()
	{
		$this->load->model('article_model', 'articles', TRUE);
		$this->data['query'] = $this->articles->get_last_ten_entries();
		$this->data['title'] = $this->data['title'] . 'Last 10 entries';
		$this->_prepareOutput(__FUNCTION__);
	}
	
	public function create()
	{
		$this->load->library('form_validation');
		//check for user input
		if($this->input->post('create'))
		{
			//Set up some validation rules
			$this->form_validation->set_rules('title', 'title', 'required');
			$this->form_validation->set_rules('content', 'content', 'required');
			//validate the input
			if($this->form_validation->run() == TRUE)
			{
				$this->load->model('article_model', 'article', TRUE);
				$this->article->title = $this->input->post('title');
				$this->article->content = $this->input->post('content');
				$this->article->date = date( 'Y-m-d H:i:s', time() );;
				if($this->article->create())
				{
					$this->session->set_flashdata('message', 'Article successfully created!');
					$this->load->helper('url');
					redirect('/crud/', 'refresh');
				}
			}
			//If not valid just output the form again
		}
		$this->load->helper('form');
		$this->data['title'] = $this->data['title'] . 'Create';
		$this->_prepareOutput(__FUNCTION__);
	}
	
	public function retrieve()
	{
		$this->load->model('article_model', 'article', TRUE);
		if($this->uri->segment(3))
		{
			
				$this->article->id = $this->uri->segment(3);
				if($this->data['query'] = $this->article->retrieve())
				{
					$this->article->id = $this->data['query']->id;
					$this->article->title = $this->data['query']->title;
					$this->article->content = $this->data['query']->content;
				}else{
					$this->session->set_flashdata('message', 'Unable to find specified article.');
					$this->load->helper('url');
					redirect('/crud/', 'refresh');
				}
		}else{
			$this->session->set_flashdata('message', 'Please choose an article to update first!');
			$this->load->helper('url');
			redirect('/crud/', 'refresh');	
		}
		$this->data['title'] = $this->data['title'] . ' Retrieve';
		$this->_prepareOutput(__FUNCTION__);
	}
	
	public function update()
	{
		$this->load->model('article_model', 'article', TRUE);
		if($this->uri->segment(3))
		{
			$this->load->library('form_validation');
			//check for user input
			if($this->input->post('update'))
			{
				//Set up some validation rules
				$this->form_validation->set_rules('id', 'id', 'numeric');
				$this->form_validation->set_rules('title', 'title', 'required');
				$this->form_validation->set_rules('content', 'content', 'required');
				//validate the input
				if($this->form_validation->run() == TRUE)
				{
					$this->article->title = $this->input->post('title');
					$this->article->id = $this->input->post('id');
					$this->article->content = $this->input->post('content');
					if($this->article->update())
					{
						$this->session->set_flashdata('message', 'Article successfully updated!');
						$this->load->helper('url');
						redirect('/crud/', 'refresh');
					}
				}
				//If not valid just output the form again
			}else{
				$this->article->id = $this->uri->segment(3);
				if($this->data['query'] = $this->article->retrieve())
				{
					$this->article->id = $this->data['query']->id;
					$this->article->title = $this->data['query']->title;
					$this->article->content = $this->data['query']->content;
				}else{
					$this->session->set_flashdata('message', 'Unable to find specified article.');
					$this->load->helper('url');
					redirect('/crud/', 'refresh');
				}
			}
		}else{
			$this->session->set_flashdata('message', 'Please choose an article to update first!');
			$this->load->helper('url');
			redirect('/crud/', 'refresh');	
		}
		$this->load->helper('form');
		$this->data['title'] = $this->data['title'] . 'Update';
		$this->_prepareOutput(__FUNCTION__);
	}
	
	public function delete()
	{
		$this->load->model('article_model', 'article', TRUE);
		if($this->article->id = $this->uri->segment(3))
		{
					if($this->article->delete())
					{
						$this->session->set_flashdata('message', 'Article successfully deleted!');
					}else{
						$this->session->set_flashdata('message', 'Unable to find specified article!');
					}
		}else{
			$this->session->set_flashdata('message', 'Please choose an article to delete first!');
		}
		$this->load->helper('url');
		redirect('/crud/', 'refresh');
	}
	
	private function _addStylesheet($name)
	{
		$this->data['stylesheets'][] = $name;
	}
	
	private function _prepareOutput()
	{
		$this->load->helper(
			array('html', 'form', 'url')
		);
		$this->data['content'] = $this->load->view($this->data['view'], $this->data, TRUE);

		if(!empty($this->data['stylesheets']))
		{	
			$html = '';
			foreach($this->data['stylesheets'] as $stylesheet)
			{
				$html .= '<link href="'.base_url('css/'.$stylesheet.'.css').'" rel="stylesheet" media="all">' . "\n";
			}
			$this->data['stylesheets'] = strtolower($html);
		}
		$this->load->view($this->data['template'],$this->data);
	}
	
}
