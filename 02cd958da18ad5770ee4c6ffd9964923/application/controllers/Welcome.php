<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	//all output stored in a single array 
	protected $data = array(); 

	public function __construct()
    {
        parent::__construct();
		//The base HTML5 template used for all output
		$this->data['template'] = 'html5';
		//Base title and description
		$this->data['title'] = "State of Rhode Island Interview : ";
		$this->data['description'] = "A series of tests from the State of Rhode Island for a Junior Application Developer interview.";
		//An array to hold any style sheets 
		$this->data['stylesheets'] = '';
		//Add some standard stylesheets
		$this->_addStylesheet('normalize');
		$this->_addStylesheet('styles');
    }

	public function index()
	{	
		$this->data['title'] = $this->data['title'] . 'Welcome';
		$this->_addStylesheet('tabs');
		//Start the output, this is just a static page. 
		//The view file is auto pulled based on class and method name
		$this->_prepareOutput(__FUNCTION__);
	}
	
	public function css()
	{	
		$this->data['title'] = $this->data['title'] . 'CSS Test';
		//add page specific css files then output
		$this->_addStylesheet(__CLASS__ .'_'. __FUNCTION__);
		//static output
		$this->_prepareOutput(__FUNCTION__);
	}
		
	public function skills()
	{
		$this->_addStylesheet(__CLASS__ .'_'. __FUNCTION__);
		$this->data['title'] = $this->data['title'] . 'Skill Ratings';
		//array of skills with my ratings
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
		$this->data['skills'] = $this->_processSkills($this->data['skills']);
		$this->_prepareOutput(__FUNCTION__);
	}
	
	public function examples()
	{
		$this->data['title'] = $this->data['title'] . 'Code Examples';
		$this->_addStylesheet('tabs');
		//again some static output
		$this->_prepareOutput(__FUNCTION__);
	}
		
	public function hourglass()
	{
		// a place to store the hourglass
		$this->data['hourglass'] = 'Please use the form above to generate an hourglass.';
		//load the form validation library
		$this->load->library('form_validation');
		//check for user input
		if($this->input->post('generate'))
		{
			//Set up some validation rules
			$this->form_validation->set_rules('height', 'hourglass height', 'required|numeric|greater_than_equal_to[2]');
			$this->form_validation->set_rules('remaining', 'sand remaining', 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
			//validate the input
			if($this->form_validation->run() == TRUE)
			{
				//generate the hourglass
				$this->data['hourglass'] = $this->_generateHourglass($this->input->post('height',TRUE),$this->input->post('remaining', TRUE));
			}
			//If not valid just output the form again
		}
		$this->load->helper('form');
		$this->data['title'] = $this->data['title'] . 'Hourglass Test';
		$this->_addStylesheet(__CLASS__ .'_'. __FUNCTION__);
		$this->_prepareOutput(__FUNCTION__);
	}
	
	private function _processSkills($skills)
	{
		$output = '<ol>' . "\n";
		foreach($skills as $skill => $rating)
		{
			$output .= '<li>' . "\n";
			if(is_array($rating))
			{
				$output .= $skill."\n";
				$output .= $this->_processSkills($rating);
			}else{
				$output .= $skill . "\n";
				$output .= '<span class="rating">'.$rating.'</span>';
			}
			 
			$output .= '</li>' . "\n"; 
		}
		$output .= '</ol>' . "\n";
		return $output;
	}
	
	private function _generateHourglass($height,$remaining)
	{
			$capacity 			= $height * $height;//total sand capacity
			$topSandDecimal  	= $capacity * (ceil("{$remaining}")/100);//sand in the top half
			$topSand  			= ceil("{$topSandDecimal}");//sand in the top half, rouded up
			$topEmpty 			= $capacity - $topSand ;
			$botEmpty 			= $topSand;//empty space in the top half
			$botSand			= $topEmpty;//empty space in the bottom half
			$nbsp = '&nbsp;';
			
			//lets start with the top half
			$output = str_repeat('_', ($height*2)+1) . '<br>';
			
			$i = $height;
			$blankTotal = 0;
			while($i >=1 )
			{
				$leftSpace = $height-$i;
				$output .= str_repeat($nbsp, $leftSpace) . '\\';
				$rowCount =($i*2)-1;
				//will we print more than enough blankspace?
				if(($rowCount + $blankTotal) > $topEmpty)
				{
					$spacesRemaining = $topEmpty - $blankTotal;
					//do we have a split row situation(x's and spaces)?
					if($spacesRemaining == 0)
					{
						$output .= str_repeat('x', $rowCount);
					}else{//if so then split the row
						$xRemaining = $rowCount - $spacesRemaining;
						$leftSide = floor($xRemaining/2);
						$output .= str_repeat('x', $leftSide );
						$output .= str_repeat($nbsp, $spacesRemaining);
						$output .= str_repeat('x', $xRemaining - $leftSide );
					}
					$blankTotal = $blankTotal + $spacesRemaining;
				}else{//if not print an entire line of space
					$output .= str_repeat($nbsp, $rowCount);
					$blankTotal = $blankTotal + $rowCount; 
				}
				$output .= '/' . "<br>";
				$i--;
			}
			
			//and now the bottom half
			$i = $height;
			$blankTotal = 0;
			while($i >=1 )
			{
				$leftSpace = $i-1;
				$output .= str_repeat($nbsp, $leftSpace) . '/';
				$rowCount =($height - $i)+($height - $i+1);
				//will we print more than enough blankspace?
				if(($rowCount + $blankTotal) > $botEmpty)
				{
					$spacesRemaining = $botEmpty - $blankTotal;
					//do we have a split row situation(x's and spaces)?
					if($spacesRemaining == 0)
					{
						$output .= str_repeat('x', $rowCount);
					}else{//if so then split the row
						$xRemaining = $rowCount - $spacesRemaining;
						$leftSide = floor($spacesRemaining/2);
						if($i == 1)
						{
							$nbsp = '_';
						}
						$output .= str_repeat($nbsp, $leftSide );
						$output .= str_repeat('x', $xRemaining);
						$output .= str_repeat($nbsp, $spacesRemaining - $leftSide );
					}
					$blankTotal = $blankTotal + $spacesRemaining;
				}else{//if not print an entire line of space
					$output .= str_repeat($nbsp, $rowCount);
					$blankTotal = $blankTotal + $rowCount; 
				}
				$output .= '\\' . "<br>";
				$i--;
			}
			return $output;
	}
	
	private function _addStylesheet($name)
	{
		$this->data['stylesheets'][] = $name;
	}
	
	private function _prepareOutput($function)
	{
		//load some helpers for use with the views
		$this->load->helper(
			array('html', 'form', 'url')
		);
		
		//load the view but save it to inject into the base html5 template
		$this->data['content'] = $this->load->view(__CLASS__ .'_'.$function , $this->data, TRUE);
		
		//Some would process the style sheets in the view 
		//but I like to keep as much php as possible out of the view
		if(!empty($this->data['stylesheets']))
		{	
			$html = '';
			foreach($this->data['stylesheets'] as $stylesheet)
			{
				$html .= '<link href="'.base_url('css/'.$stylesheet.'.css').'" rel="stylesheet" media="all">' . "\n";
			}
			$this->data['stylesheets'] = strtolower($html);
		}
		
		//inject everything into the html5 template and output it
		$this->load->view($this->data['template'],$this->data);
	}
	
}
