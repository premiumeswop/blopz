<?php



class main extends ceemain{
	
	function ceem(){
		$this->view("include/header"); 
		$this->view("main");
		$this->view("include/footer"); 
		 
		}
		
		
		function hjk(){
			
			 echo Security::encrypt("1234@gmail.com");
		     echo  "<br>".Security::encrypt("1234567890");
			
			}
	
	}






?>