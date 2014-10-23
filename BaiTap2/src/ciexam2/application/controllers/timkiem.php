<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timkiem extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index($search_terms = '')
	{
			if ($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$this->load->view('timkiem/timkiem', $data, FALSE);
			}
			else{
				redirect('login','refresh');
			}

			$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('q', 'Q', 'trim|required|xss_clean');
	    	if ($this->form_validation->run()) {
			}
			switch ($this->uri->uri_string) {
				case '/timkiem/sono/':
					if ($this->input->post('q'))
			        {
			        	redirect('/timkiem/sono/' . $this->input->post('q'));
			            
			        }
					break;
				case '/timkiem/donvi/':
					if ($this->input->post('q'))
			        {
			        	redirect('/timkiem/donvi/' . $this->input->post('q'));
			            
			        }
					break;
				case '/timkiem/tram/':
					if ($this->input->post('q'))
			        {
			        	redirect('/timkiem/tram/' . $this->input->post('q'));
			            
			        }
					break;
				case '/timkiem/tinhtrang/':
					if ($this->input->post('q'))
			        {
			        	redirect('/timkiem/tram/' . $this->input->post('q'));
			            
			        }
					break;
				case '/timkiem/congsuat/':
					if ($this->input->post('q'))
			        {
			        	redirect('/timkiem/congsuat/' . $this->input->post('q'));
			            
			        }
					break;
			}
		 
		        if ($search_terms)
		        {
		            // Load the model and perform the search
		            $this->load->model('md_timkiem');
		            $results = $this->md_timkiem->search($search_terms);
		        }
		 
		        // Render the view, passing it the necessary dat
		        $this->load->model('md_timkiem');
		     
			 $this->load->view('timkiem/timkiem', array(
		            'search_terms' => $search_terms,
		            'results' => @$results,
		            'donvi' => @$data
		        ));
	}
	function ajax_level2($id)
			{
				$xmlDoc=new DOMDocument();
				$xmlDoc->load("http://localhost/ciexam2/template/data/data.xml");


					$x=$xmlDoc->getElementsByTagName('link');

					//get the q parameter from URL

					//lookup all links from the xml file if length of q>0
					if (strlen($id)>0)
					{
					$hint="";
					for($i=0; $i<($x->length); $i++)
					  {
					  $y=$x->item($i)->getElementsByTagName('title');
					  if ($y->item(0)->nodeType==1)
					    {
					    //find a link matching the search text
					    if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$id))
					      {
					      if ($hint=="")
					        {
					        $hint="<a>". 
					        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
					        }
					      else
					        {
					        $hint=$hint . "<br /><a>" . 
					        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
					        }
					      }
					    }
					  }
					}

					// Set output to "no suggestion" if no hint were found
					// or to the correct values
					if ($hint=="")
					  {
					  $response="no suggestion";
					  }
					else
					  {
					  $response=$hint;
					  }

					//output the response
					echo $response;
				}
	function ajax_level3($id)
			{
				$xmlDoc=new DOMDocument();
				$xmlDoc->load("http://localhost/ciexam2/template/data/data1.xml");


					$x=$xmlDoc->getElementsByTagName('link');

					//get the q parameter from URL

					//lookup all links from the xml file if length of q>0
					if (strlen($id)>0)
					{
					$hint="";
					for($i=0; $i<($x->length); $i++)
					  {
					  $y=$x->item($i)->getElementsByTagName('title');
					  if ($y->item(0)->nodeType==1)
					    {
					    //find a link matching the search text
					    if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$id))
					      {
					      if ($hint=="")
					        {
					        $hint="<a>". 
					        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
					        }
					      else
					        {
					        $hint=$hint . "<br /><a>" . 
					        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
					        }
					      }
					    }
					  }
					}

					// Set output to "no suggestion" if no hint were found
					// or to the correct values
					if ($hint=="")
					  {
					  $response="no suggestion";
					  }
					else
					  {
					  $response=$hint;
					  }

					//output the response
					echo $response;
				}
	function sono($search_terms = '')
    {
        // If the form has been submitted, rewrite the URL so that the search
        // terms can be passed as a parameter to the action. Note that there
        // are some issues with certain characters here.
    		$this->load->model('md_timkiem');
    		if ($this->session->userdata('logged_in')['code']==2) {
    			$re_sono = $this->md_timkiem->getSono_mdv($this->session->userdata('logged_in')['ma_dv']);
    		}else{
    		$re_sono = $this->md_timkiem->getSono();
    		}
    		$doc = new DOMDocument(); 
			  $doc->formatOutput = true; 
			   
			  $r = $doc->createElement( "pages" ); 
			  $doc->appendChild( $r ); 
			   foreach ($re_sono as $value){
			     
			  $b = $doc->createElement( "link" ); 
			   
			  $name = $doc->createElement( "title" ); 
			  $name->appendChild( 
			  $doc->createTextNode( $value['SONO'] ) 
			  ); 
			  $b->appendChild( $name ); 			   
			  $r->appendChild( $b ); 
			}
			$doc->save("template/data/data.xml");

        	$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('q', 'Q', 'trim|required|xss_clean|is_natural|numeric|integer');
	    	if ($this->form_validation->run()) {
			}
			if ($this->input->post('q'))
		        {
		            redirect('/timkiem/sono/' . $this->input->post('q'));
		        }
		 		$this->load->model('md_timkiem');
		        if ($search_terms)
		        {
		            // Load the model and perform the search
		            if ($this->session->userdata('logged_in')['code']==2){
		            	$results = $this->md_timkiem->search_sono_mdv($search_terms,$this->session->userdata('logged_in')['ma_dv']);
		            }else{
		            $results = $this->md_timkiem->search_sono($search_terms);
		        	}
		        }
		 		$re_sono = $this->md_timkiem->getSono();
		 		$option1[] = 'Chọn số No';
		 		foreach ($re_sono as $value) {
		 			$option1[] = $value['SONO'];
		 		}
		 		$option2[] = 'null';
		 		foreach ($re_sono as $value) {
		 			$option2[] = $value['SONO'];
		 		}
		 		$option = $this->md_timkiem->array_fill_keys($option2,$option1);
		        // Render the view, passing it the necessary dat
			 $this->load->view('timkiem/timkiem', array(
		            'search_terms' => $search_terms,
		            'results' => @$results,
		            'name_sono' => @$option,
		            'base'=> $this->config->item('base_url')
		        ));
        
    }
    function donvi($search_terms = '')
    {
        // If the form has been submitted, rewrite the URL so that the search
        // terms can be passed as a parameter to the action. Note that there
        // are some issues with certain characters here.
        	$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('q', 'Q', 'trim|required|xss_clean|is_natural|numeric|integer');
	    	if ($this->form_validation->run()) {
			}
				if ($this->input->post('q'))
		        {
		            redirect('/timkiem/donvi/' . $this->input->post('q'));
		        }
		 		$this->load->model('md_timkiem');
		        if ($search_terms)
		        {
		            // Load the model and perform the search
		            $results = $this->md_timkiem->search_donvi($search_terms);
		        }
		 		$re_sono = $this->md_timkiem->getDonvi();
		 		if ($this->session->userdata('logged_in')['code']==2) {
		 			$option1[] = $this->session->userdata('logged_in')['name'];
		 			$option2[] = $this->session->userdata('logged_in')['ma_dv'];
		 		}else{
			 		$option1[] = 'Chọn đơn vị';
			 		foreach ($re_sono as $value) {
			 			$option1[] = $value['TEN_DV'];
			 		}
			 		$option2[] = 'null';
			 		foreach ($re_sono as $value) {
			 			$option2[] = $value['MA_DV'];
			 		}
		 		}
		 		$option = $this->md_timkiem->array_fill_keys($option2,$option1);
		        // Render the view, passing it the necessary dat
			 $this->load->view('timkiem/timkiem2', array(
		            'search_terms' => $search_terms,
		            'results' => @$results,
		            'name_dv' => @$option
		        ));
        
    }
    function tram($search_terms = '')
    {
        // If the form has been submitted, rewrite the URL so that the search
        // terms can be passed as a parameter to the action. Note that there
        // are some issues with certain characters here.
        	$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('q', 'Q', 'trim|required|xss_clean|is_natural|numeric|integer');
	    	if ($this->form_validation->run()) {
			}
			if ($this->input->post('q'))
		        {
		            redirect('/timkiem/tram/' . $this->input->post('q'));
		        }
		 	 $this->load->model('md_timkiem');
		        if ($search_terms)
		        {
		            // Load the model and perform the search
		            $results = $this->md_timkiem->search_tram($search_terms);
		        }
		 		
		        // Render the view, passing it the necessary dat
		        if ($this->session->userdata('logged_in')['code']==2) {
		        	$name_tram = $this->md_timkiem->getTram_mdv($this->session->userdata('logged_in')['ma_dv']);
		        	$option1[] = 'Chọn trạm';
				     foreach ($name_tram as $value) {
				     	$option1[] = $value['TENTRAM'];
				     }
				     $option2[] = 'null';
				      foreach ($name_tram as $value) {
				     	$option2[] = $value['MATRAM'];
				     }
		        }else{
				     $name_tram = $this->md_timkiem->getTram();
				     $option1[] = 'Chọn trạm';
				     foreach ($name_tram as $value) {
				     	$option1[] = $value['TENTRAM'];
				     }
				     $option2[] = 'null';
				      foreach ($name_tram as $value) {
				     	$option2[] = $value['MATRAM'];
				     }
				 }
		     $option = $this->md_timkiem->array_fill_keys($option2,$option1);
			 $this->load->view('timkiem/timkiem3', array(
		            'search_terms' => $search_terms,
		            'results' => @$results,
		            'name_tram' => $option
		        ));
        
    }
    function tinhtrang($search_terms = '')
    {
        // If the form has been submitted, rewrite the URL so that the search
        // terms can be passed as a parameter to the action. Note that there
        // are some issues with certain characters here.
        	$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('q', 'Q', 'trim|required|xss_clean|is_natural|numeric|integer');
	    	if ($this->form_validation->run()) {
			}
			if ($this->input->post('q'))
		        {
		            redirect('/timkiem/tinhtrang/' . $this->input->post('q'));
		        }
		 	 $this->load->model('md_timkiem');
		        if ($search_terms)
		        {
		            // Load the model and perform the search
		            if ($this->session->userdata('logged_in')['code']==2) {
		            	$results = $this->md_timkiem->search_tinhtrang_mdv($search_terms,$this->session->userdata('logged_in')['ma_dv']);
		            }else{
		            $results = $this->md_timkiem->search_tinhtrang($search_terms);
		        	}	
		    	}
		 		
		        // Render the view, passing it the necessary dat
		     $name_tram = $this->md_timkiem->getTinhtrang();
		     $option1[]= 'chọn trạng thái';
		     foreach ($name_tram as $value) {
		     	$option1[] = $value['TRANGTHAI'];
		     }
		     $option2[] = 'null';
		      foreach ($name_tram as $value) {
		     	$option2[] = $value['MA_TT'];
		     }
		     $option = $this->md_timkiem->array_fill_keys($option2,$option1);
			 $this->load->view('timkiem/timkiem4', array(
		            'search_terms' => $search_terms,
		            'results' => @$results,
		            'name_tram' => $option
		        ));
        
    }
    function timkiem6(){
    	$this->load->view('timkiem/timkiem6');
    }
    function congsuat($search_terms = '')
    {
    	$this->load->model('md_timkiem');
    		if ($this->session->userdata('logged_in')['code']==2) {
    			$re_sono = $this->md_timkiem->getCongsuat_mdv($this->session->userdata('logged_in')['ma_dv']);
    		}else{
    			$re_sono = $this->md_timkiem->getCongsuat();
    		}
    		$doc = new DOMDocument(); 
			  $doc->formatOutput = true; 
			   
			  $r = $doc->createElement( "pages" ); 
			  $doc->appendChild( $r ); 
			   foreach ($re_sono as $value){
			     
			  $b = $doc->createElement( "link" ); 
			   
			  $name = $doc->createElement( "title" ); 
			  $name->appendChild( 
			  $doc->createTextNode( $value['CONGSUAT'] ) 
			  ); 
			  $b->appendChild( $name ); 			   
			  $r->appendChild( $b ); 
			}
			$doc->save("template/data/data1.xml");
        // If the form has been submitted, rewrite the URL so that the search
        // terms can be passed as a parameter to the action. Note that there
        // are some issues with certain characters here.
        	$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('q', 'Q', 'trim|required|xss_clean|is_natural|numeric|integer');
	    	if ($this->form_validation->run()) {
			}
			if ($this->input->post('q'))
		        {
		            redirect('/timkiem/congsuat/' . $this->input->post('q'));
		        }
		 	 $this->load->model('md_timkiem');
		        if ($search_terms)
		        {
		            // Load the model and perform the search
		            if ($this->session->userdata('logged_in')['code']==2) {
		            	$results = $this->md_timkiem->search_congsuat_mdv($search_terms,$this->session->userdata('logged_in')['ma_dv']);
		            }else{
		            $results = $this->md_timkiem->search_congsuat($search_terms);
		        	}
		        }
		 		
		        // Render the view, passing it the necessary dat
		     $name_tram = $this->md_timkiem->getCongsuat();
		     $option1[] = 'Chọn công suất';
		     foreach ($name_tram as $value) {
		     	$option1[] = $value['CONGSUAT'];
		     }
		     $option2[] = 'null';
		      foreach ($name_tram as $value) {
		     	$option2[] = $value['CONGSUAT'];
		     }
		     $option = $this->md_timkiem->array_fill_keys($option2,$option1);
			 $this->load->view('timkiem/timkiem5', array(
		            'search_terms' => $search_terms,
		            'results' => @$results,
		            'name_tram' => $option
		        ));
        
    }
}

/* End of file timkiem.php */
/* Location: ./application/controllers/timkiem.php */