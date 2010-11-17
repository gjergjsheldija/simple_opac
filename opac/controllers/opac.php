<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opac extends Controller {

	function __construct () {
		parent::Controller();
		$this->load->helper(array('html','language','url','language'));

		if($this->config->item('enable_app_debug'))
		$this->output->enable_profiler(TRUE);
		
		$language = $this->session->userdata('language');
		if($language == '' ) $language = 'english';
		$this->lang->load('opac', $language);		
	}

	function index() {
		$this->load->model('opac_model');
		$home['num_records'] = $this->opac_model->countAll();
		$home['body'] = $this->load->view('home',$home,TRUE);
		$this->load->view('main',$home);
	}

	
	function simpleSearch() {
		
		$lookfor =  $this->input->post('lookfor') != '' ?  $this->input->post('lookfor') : $this->uri->segment(4);
		$type =  $this->input->post('type') != '' ?  $this->input->post('type') : $this->uri->segment(6);

		if($lookfor == '' || $type == '') { show_404('page'); exit(); } 
		
		$this->load->library('pagination');
		$this->load->model('opac_model');
				
		//pagination
		$config['base_url'] = base_url() . 'index.php/opac/simpleSearch/' . 'lookfor/' . $lookfor . '/type/' . $type;
		$config['per_page'] = '20';
		
		switch ($type) {
			case "all" :
				$simpleSearch['results'] = $this->opac_model->simpleSearchAll($lookfor, $this->uri->segment(7),$config['per_page'] );
				$simpleSearch['num-results'] = $this->opac_model->simpleSearchAllTotal($lookfor);
				break;
			case "title" :
				$simpleSearch['results'] = $this->opac_model->simpleSearchTitle($lookfor, $this->uri->segment(7),$config['per_page'] );
				$simpleSearch['num-results'] = $this->opac_model->simpleSearchTitleTotal($lookfor);
				break;
			case "author" :
				$simpleSearch['results'] = $this->opac_model->simpleSearchAuthor($lookfor, $this->uri->segment(7),$config['per_page'] );
				$simpleSearch['num-results'] = $this->opac_model->simpleSearchAuthorTotal($lookfor);
				break;
			case "topic" :
				$simpleSearch['results'] = $this->opac_model->simpleSearchTopic($lookfor, $this->uri->segment(7),$config['per_page'] );
				$simpleSearch['num-results'] = $this->opac_model->simpleSearchTopicTotal($lookfor);
				break;
			case "vendosja" :
				$simpleSearch['results'] = $this->opac_model->simpleSearchPlacing($lookfor, $this->uri->segment(7),$config['per_page'] );
				$simpleSearch['num-results'] = $this->opac_model->simpleSearchPlacingTotal($lookfor);
				break;
			case "isn" :
				$simpleSearch['results'] = $this->opac_model->simpleSearchISBNISSN($lookfor, $this->uri->segment(7),$config['per_page'] );
				$simpleSearch['num-results'] = $this->opac_model->simpleSearchISBNISSNTotal($lookfor);
				break;
		}
		//pagination last part
		$config['uri_segment'] = 7;
		$config['total_rows'] = count($simpleSearch['num-results'] );
		$this->pagination->initialize($config);
				
		$simpleSearch['type'] = $type;
		$simpleSearch['lookfor'] = $lookfor;

		$simpleSearch['numresults'] = count($simpleSearch['num-results'] );
		$simpleSearch['lookfor'] = $lookfor;
		$simpleSearch['body'] = $this->load->view('simple-search',$simpleSearch, TRUE);
		$this->load->view('main',$simpleSearch);
	}

	function advancedSearch() {
		
		$lookfor =  $this->input->post('lookfor');
		$type =  $this->input->post('type');
		$bool = $this->input->post('bool');
		
		if($lookfor == '' || $type == '' || $bool == '') { show_404('page'); exit(); } 
		
		$this->load->model('opac_model');
		
		$advancedSearch['results'] = $this->opac_model->advancedSearch($type,$lookfor,$bool);
		if(count($advancedSearch['results']) > 0 ) {
			$advancedSearch['numresults'] = count($advancedSearch['results'] );
			$advancedSearch['lookfor'] = $lookfor;
			$advancedSearch['body'] = $this->load->view('simple-search',$advancedSearch, TRUE);
			$this->load->view('main',$advancedSearch);		
		} else {
			$advancedSearch['lookfor'] = $lookfor;
			$advancedSearch['type'] = $type;
			$advancedSearch['bool'] = $bool;
            $advancedSearch['body'] = $this->load->view('no-results',$advancedSearch, TRUE);
            $this->load->view('main',$advancedSearch);      
		}
	}
	
	function detail() {
		$this->load->model('opac_model');

		$detail['bookDetail'] = $this->opac_model->bookDetails($this->uri->segment(3));
		$detail['body'] = $this->load->view('book-detail',$detail, TRUE);
		$this->load->view('main',$detail);		
	}

	function author() {
		
		$lookfor =  $this->input->post('lookfor') != '' ?  $this->input->post('lookfor') : $this->uri->segment(3);
		
		$this->load->library('pagination');		
		$this->load->model('opac_model');

		//pagination
		$config['base_url'] = base_url() . 'index.php/opac/author/' . $lookfor ;
		$config['per_page'] = '20';
				
		list($author_surname, $author_name) = explode('+', $this->uri->segment(3));
		
		$author['results'] = $this->opac_model->searchByAuthor($author_surname, $author_name, $this->uri->segment(4),$config['per_page']);
		$author['num-results'] = $this->opac_model->searchByAuthorTotal($author_surname, $author_name);
		
		//pagination last part
		$config['uri_segment'] = 4;
		$config['total_rows'] = count($author['num-results'] );
		$this->pagination->initialize($config);
				
		$author['numresults'] = count($author['num-results'] );
		$author['lookfor'] = $author_surname . ' ' . $author_name;
		$author['body'] = $this->load->view('simple-search',$author, TRUE);
		$this->load->view('main',$author);	
	}
}