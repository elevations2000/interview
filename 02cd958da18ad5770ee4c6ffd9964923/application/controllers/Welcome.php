<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	
	public function css()
	{	
		$this->_addStylesheet(__CLASS__ .'_'. __FUNCTION__);
		$this->_prepareOutput();
	}
		
	public function skills()
	{
		$this->data['skills'] = array ( 
			'CSS' => 3, 
			'HTML/HTML5' => 4, 
			'Javascript' => array(
				'Javascript' => 2,
				'Bootstrap' => 2,
				'Jquery' => 2,
				'Angular' => 1,
				'Unify' => 1
			),
			'Linux' => array(
				'Command line' => 2,
				'Shell scripting' => 1,
				'Piped commands' => 1
			),
			'.net' => array(
				'C#' => 1,
				'VB' => 1
			),
			'PHP' => array(
				'PHP 5.x' => 4,
				'CTFr Framework' => 0,
				'Codeigniter' => 4,
				'Drupal' => 1
			),
			'Python' => 1,
			'Ruby On Rails' => 2,
			'SQL' => array(
				'SQL' => 3,
				'Stored Procedures' => 1,
				'Views' => 1
			),
		); 
		$this->_prepareOutput();
	}
	
	public function example()
	{
		$this->_prepareOutput();
	}
		
	public function hourglass()
	{
		$this->_addStylesheet(__CLASS__ .'_'. __FUNCTION__);
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
