<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opac_Model extends Model {
	
	function opac_Model () {
		parent::Model();
	}
	
	function countAll() {
		return $this->db->count_all('opac');
	}

	function bookDetails($id) {
		$this->db->select('*')
			->from('opac')
			->where('id =',$id);
			
		$result = $this->db->get();
		return $result->result();
	}
	
	function searchByAuthor($surname, $name, $lim, $offset) {
		
		$limit = (!empty($lim)) ? $lim : 0;
		
		$this->db->select('*')
			->from('opac')
			->where('MATCH (author_name,author_surname) AGAINST (\'+'.$name.' +'.$surname.'\' IN BOOLEAN MODE)', NULL, FALSE)
			->limit($offset, $limit);
			
		$result = $this->db->get();
		return $result->result();
	}
	
	function searchByAuthorTotal($surname, $name) {
		$this->db->select('*')
			->from('opac')
			->where('MATCH (author_name,author_surname) AGAINST (\'+'.$name.' +'.$surname.'\' IN BOOLEAN MODE)', NULL, FALSE);
			
		$result = $this->db->get();
		return $result->result();
	}
	
	function simpleSearchAll($lookfor, $lim, $offset) {
		
		$limit = (!empty($lim)) ? $lim : 0;
		
		$this->db->select('*')
			->from('opac')
			->like('author_name',$lookfor,'both')
			->or_like('author_surname',$lookfor,'both')
			->or_like('title',$lookfor,'both')
			->or_like('topic',$lookfor,'both')
			->or_like('callnumber',$lookfor,'both')
			->or_like('isbn_issn',$lookfor,'both')
			->limit($offset, $limit);
			
		$result = $this->db->get();
		return $result->result();
	}
	
	function simpleSearchAllTotal($lookfor) {
		$this->db->select('*')
			->from('opac')
			->like('author_name',$lookfor,'both')
			->or_like('author_surname',$lookfor,'both')
			->or_like('title',$lookfor,'both')
			->or_like('topic',$lookfor,'both')
			->or_like('callnumber',$lookfor,'both')
			->or_like('isbn_issn',$lookfor,'both');
			
		$result = $this->db->get();
		return $result->result();
	}
	
	function simpleSearchAuthor($lookfor, $lim, $offset) {
		
		$limit = (!empty($lim)) ? $lim : 0;
		
		$this->db->select('*')
			->from('opac')
			->where('MATCH (author_name) AGAINST (\''.$lookfor.'*\' IN BOOLEAN MODE)', NULL, FALSE)
			->or_where('MATCH (author_surname) AGAINST (\''.$lookfor.'*\' IN BOOLEAN MODE)', NULL, FALSE)
			->limit($offset, $limit);
			
		$result = $this->db->get();
		return $result->result();
	}

	function simpleSearchAuthorTotal($lookfor) {
		
		$this->db->select('*')
			->from('opac')
			->where('MATCH (author_name) AGAINST (\''.$lookfor.'*\' IN BOOLEAN MODE)', NULL, FALSE)
			->or_where('MATCH (author_surname) AGAINST (\''.$lookfor.'*\' IN BOOLEAN MODE)', NULL, FALSE);
			
		$result = $this->db->get();
		return $result->result();
	}
	
	function simpleSearchTitle($lookfor, $lim, $offset) {

		$limit = (!empty($lim)) ? $lim : 0;
		
		$this->db->select('*')
			->from('opac')
			->where('MATCH (title) AGAINST (\''.$lookfor.'*\' IN BOOLEAN MODE)', NULL, FALSE)
			->limit($offset, $limit);
			
		$result = $this->db->get();
		return $result->result();		
	}
	
	function simpleSearchTitleTotal($lookfor) {
		
		$this->db->select('*')
			->from('opac')
			->where('MATCH (title) AGAINST (\''.$lookfor.'*\' IN BOOLEAN MODE)', NULL, FALSE);
			
		$result = $this->db->get();
		return $result->result();		
	}
	
	function simpleSearchTopicTotal($lookfor) {
		$this->db->select('*')
			->from('opac')
			->where('MATCH (topic) AGAINST (\''.$lookfor.'*\' IN BOOLEAN MODE)', NULL, FALSE);
			
		$result = $this->db->get();
		return $result->result();	
	}

	function simpleSearchTopic($lookfor, $lim, $offset) {
		
		$limit = (!empty($lim)) ? $lim : 0;
		
		$this->db->select('*')
			->from('opac')
			->where('MATCH (topic) AGAINST (\''.$lookfor.'*\' IN BOOLEAN MODE)', NULL, FALSE)
			->limit($offset, $limit);
			
		$result = $this->db->get();
		return $result->result();	
	}
	
	function simpleSearchPlacing($lookfor, $lim, $offset) {
		
		$limit = (!empty($lim)) ? $lim : 0;
		
		$this->db->select('*')
			->from('opac')
			->where('MATCH (vendosja) AGAINST (\''.$lookfor.'*\' IN BOOLEAN MODE)', NULL, FALSE)
			->limit($offset, $limit);
			
		$result = $this->db->get();
		return $result->result();	
	}
	
	function simpleSearchPlacingTotal($lookfor) {
		$this->db->select('*')
			->from('opac')
			->where('MATCH (vendosja) AGAINST (\''.$lookfor.'*\' IN BOOLEAN MODE)', NULL, FALSE);
			
		$result = $this->db->get();
		return $result->result();	
	}
	
	function simplesearchISBNISSN($lookfor, $lim, $offset) {
		
		$limit = (!empty($lim)) ? $lim : 0;
		
		$this->db->select('*')
			->from('opac')
			->where('MATCH (isbn_issn) AGAINST (\''.$lookfor.'*\' IN BOOLEAN MODE)', NULL, FALSE)
			->limit($offset, $limit);
			
		$result = $this->db->get();
		return $result->result();		
	}
	
	function simplesearchISBNISSNTotal($lookfor) {
		$this->db->select('*')
			->from('opac')
			->where('MATCH (isbn_issn) AGAINST (\''.$lookfor.'*\' IN BOOLEAN MODE)', NULL, FALSE);
			
		$result = $this->db->get();
		return $result->result();		
	}
	
	function advancedSearch($type, $lookfor,$boolean ){
		array_unshift($boolean, "");
		
		$sqlString = "SELECT * FROM opac WHERE ";
		for($i = 0; $i <= 3; $i++) {
			if($boolean[$i] != "NOT") {
				if($type[$i] != "author") {
					$sqlString .= $boolean[$i] . " ";
					$sqlString .= $type[$i] . " "; 
					$sqlString .= "LIKE '%" . $lookfor[$i] . "%' ";
				} else {
					$sqlString .= $boolean[$i] . " author_name " ."LIKE '%" . $lookfor[$i] . "%' ";
					$sqlString .= $boolean[$i] . " author_surname " ."LIKE '%" . $lookfor[$i] . "%' ";
				}
			} else {
				if($type[$i] != "author") {
					$sqlString .= " AND " . $type[$i] . " "; 
					$sqlString .= "NOT LIKE '%" . $lookfor[$i] . "%' ";
				} else {
					$sqlString .= " AND author_name NOT LIKE '%" . $lookfor[$i] . "%' ";
					$sqlString .= " AND author_surname NOT LIKE '%" . $lookfor[$i] . "%' ";
				}
			}
		}
		$query = $this->db->query($sqlString);
		return $query->result();	
	}
}