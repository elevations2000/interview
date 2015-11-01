<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	protected $data = array(); 

	public function __construct()
    {
        parent::__construct();
		$this->data['template'] = 'html5';
		$this->data['stylesheets'] = '';
		$this->_addStylesheet('normalize');
		$this->_addStylesheet('styles');
    }

	
	//Function to add stylesheets
	protected function _addStylesheet($name)
	{
		$this->data['stylesheets'][] = $name;
	}
	
	protected function _prepareOutput()
	{
		//render the main content
		$this->data['content'] = $this->load->view($this->data['view'], $this->data, TRUE);
		
		//add any stylesheets
		if(!empty($this->data['stylesheets']))
		{	
			$html = '';
			foreach($this->data['stylesheets'] as $stylesheet)
			{
				$html .= '<link href="'.base_url('css/'.$stylesheet.'.css').'" rel="stylesheet" media="all">' . "\n";
			}
			$this->data['stylesheets'] = strtolower($html);
		}
		
		//output
		$this->load->view($this->data['template'],$this->data);
	}
	
}
