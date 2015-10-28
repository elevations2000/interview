<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	protected $data = array(); 

	public function __construct()
    {
        parent::__construct();
		$this->data['template'] = 'html5';
		$this->data['title'] = "State of Rhode Island Interview Test :";
		$this->data['description'] = "State of Rhode Island Interview Test :";
		$this->data['stylesheets'] = '';
		$this->data['view'] = __CLASS__ .'_'. $this->uri->segment(2, 'index');
		$this->_addStylesheet('normalize');
		$this->_addStylesheet('styles');
    }

	public function index()
	{
		$this->_prepareOutput();
	}
	
	public function create()
	{
		$this->_prepareOutput();
	}
	
	public function retriev()
	{
		$this->_prepareOutput();
	}
	
	public function update()
	{
		$this->_prepareOutput();
	}
	
	public function delete()
	{
		$this->_prepareOutput();
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
	
	public function _output($output)
	{
		echo $output;
	}
}
