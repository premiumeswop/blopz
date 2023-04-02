<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Methods: GET, PUT, POST, OPTIONS');
      header('Access-Control-Max-Age: 1000');
      header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

class mobile_api extends ceemain{
	
	
	
	function ceem(){}
	 
	 function mypickup_driver(){
		 
		 	if(isset($_POST['username']) && isset($_POST['password'])  && isset($_POST['status'])){ 
		
		$username = Security::decrypt(Input::post("username"));
		    $password = Security::decrypt(Input::post("password"));
			$id_stat = intval(Input::post("status"));
		 
		 
		  	//$id_stat = (int)Input::post("status");
		if(main_model::auth($username,$password)){
		 
		    $rowsd = array();
			if($id_stat == 1){
				
				$rowsd = main_model::driver_pending($username);
				
				}
					
			if($id_stat == 2){
				
				$rowsd = main_model::driver_complete($username);
				
				}	
		 
		 
		    $rt = array();
			if($rowsd->num_rows > 0){
				
				while($rows  = $rowsd->fetch_assoc()){
					$rt[]  = $rows;
					

						
			$rtg = array("status"=>"1","content" => $rt);
			echo json_encode($rtg);	 
		 
		 
				}
				
				
			}else{
				
				
			$yu = array("status"=>"3","message"=>"No Result Found");  
			 echo json_encode($yu);		
					
				
				}
		 
		 
		 
			}else{
				
			 $yu = array("status"=>"2","message"=>"Invalid Username / Password");  
			 echo json_encode($yu);		
				}
		 
		 
	 }
		 
		 }
		 
		 
	 function mypickup(){
		 
		 
		 
		if(isset($_POST['username']) && isset($_POST['password'])  && isset($_POST['status'])){ 
		
		$username = Security::decrypt(Input::post("username"));
		    $password = Security::decrypt(Input::post("password"));
			$id_stat = intval(Input::post("status"));
			 
		if(main_model::auth($username,$password)){
				 
				 
			if($id_stat == 0){
				
				$rowsd = main_model::get_pending_pickup_username($username);
				
				}	
				
			if($id_stat == 1){
				
				$rowsd = main_model::get_oncgoing_pickup_username($username);
				
				}
					
			if($id_stat == 2){
				
				$rowsd = main_model::get_completed_pickup_username($username);
				
				}		
				
				
				$rt = array();
			if($rowsd->num_rows > 0){
				
				while($rows  = $rowsd->fetch_assoc()){
					$rt[]  =$rows;
					
					}
				
				
			$rtg = array("status"=>"1","content" => $rt);
				echo json_encode($rtg);	
				
				
				}else{
					
					
		 $yu = array("status"=>"3","message"=>"No Result Found");  
			 echo json_encode($yu);		
					}	
				
				
				
				
		}else{
			
			
		 $yu = array("status"=>"2","message"=>"Invalid Username / Password");  
			 echo json_encode($yu);		 	
			
			}
		
		
		
		
		
		
		
		
		
		}else{
			
			
			
			
			
			}
		 
		 
		 
		 
		 
		 
		 }
	 function driver_isdone(){
		if(isset($_POST['username']) && isset($_POST['password'])  && isset($_POST['id_stat'])){ 
		 
		 $username = Security::decrypt(Input::post("username"));
		    $password = Security::decrypt(Input::post("password"));
			$id_stat = Input::post("id_stat");
			 
			 if(main_model::auth($username,$password)){
				 
				 
				 
				if(main_model::update_driver_asfree($username)){} 
				 
				 
				  echo main_model::update_pickup_ascompleted($id_stat);
				  
				  
				  
				 if(main_model::update_pickup_ascompleted($id_stat)){} 
				 
				 
				 $yu = array("status"=>"1","message"=>"Completed");  
			 echo json_encode($yu);		 
				 
				 
				 
			 }else{
				 
				 
			 $yu = array("status"=>"2","message"=>"Invalid Username / Password");  
			 echo json_encode($yu);		 
				 
				 }
		 
		 
		 
		 
		 
		 
		}else{
			
			
			
			
			
			}
		 
		 
		 }
		 
		 
	 
	 function driver_status(){
		
		 if(isset($_POST['username']) && isset($_POST['password'])){
			 
			$username = Security::decrypt(Input::post("username"));
		    $password = Security::decrypt(Input::post("password"));
			 
			 if(main_model::auth($username,$password)){
				 
				 
			  
			  if(main_model::getdriver_status($username)){
				  
				 $yu = array("status"=>"1","message"=>"Active");  
			     echo json_encode($yu);  
				  
				}else{
					  
				$yu = array("status"=>"0","message"=>"Inactive");  
			     echo json_encode($yu);  	  
				
				
				
					  
					  
					  }
			
			 
		    
			
			 }else{
				 
				 
			 $yu = array("status"=>"2","message"=>"Invalid Username / Password");  
			 echo json_encode($yu);		 
				 
				 }
			
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
		 }
		 
		 
		 
		 
		 
		 }
		 
		 
	 function driver_acknowledge(){
		
		if(isset($_POST['username']) && isset($_POST['password'])){
			
			
			
			$username = Security::decrypt(Input::post("username"));
		    $password = Security::decrypt(Input::post("password"));
			$id_stat = intval(Input::post("id_stat"));
			
			 if(main_model::auth($username,$password)){
				 
				 
			 echo main_model::update_acknowledge_pickup($username,$id_stat);
			if(main_model::update_acknowledge_pickup($username,$id_stat)){}
			//var_dump($_POST);
		    
			
			if(main_model::update_driver_op($username)){}
				$yu = array("status"=>"1","message"=>"Successful");  
			   echo json_encode($yu);	
			
			 }else{
				 
				 
			 
			$yu = array("status"=>"2","message"=>"Invalid Username / Password");  
			 echo json_encode($yu);		 }
			
			
			}else{
				
				
					
				
				
				} 
		 
		 
		 
		 
		 
		 }
	 
	 
	 
	 function available_pickup(){
		 
		 
	if(isset($_POST['username']) && isset($_POST['password'])  && isset($_POST['longitude']) 
	&& isset($_POST['latitude'])){
	
		$username = Security::decrypt(Input::post("username"));
		$password = Security::decrypt(Input::post("password"));
	$long = Input::post("longitude");
	$lati = Input::post("latitude");
		 
		 if(main_model::auth($username,$password)){
		 
		 
		 
		 $du = main_model::get_avala_pickup();
		 
		 
		 if($du->num_rows > 0){
			 
			$rayau = array();
			
			while($row = $du->fetch_assoc()){
				
				$rayau[] = $row;
				
				}
				 
			$yu = array("status"=>"0","content" => $rayau);  
			 echo json_encode($yu);	 
			 
			 
			 }else{
				 
				 
		$yu = array("status"=>"0","content" => array());  
			 echo json_encode($yu);				 
				 
				 }
		 
		 
		 
		 
		 
		 }else{
				
		$yu = array("status"=>"2","message"=>"Invalid Username / Password");  
			 echo json_encode($yu);			
				
				
				
				}
		 
		 
		 
	}else{
		
		
		
		
		
		}
		 
		 
		 }
	 
	 function place_user_order(){
		 
		 
		 
		
		
		/**
		
		sender_address
		receiver_address
		sender_latitude
		receiver_latitude
		receiver_longitude
		receiver_number
		sender_number
		item_r_latitude
		item_r_longitude
		quantity
		weight
		password
		username
		 
		
		
		**/
		
		
		if(isset($_POST['sender_address']) && isset($_POST['receiver_address']) && isset($_POST['sender_latitude']) && isset($_POST['sender_address'])
		 && isset($_POST['receiver_latitude']) && isset($_POST['receiver_longitude']) && isset($_POST['receiver_number'])
		   && isset($_POST['sender_number']) && isset($_POST['item_r_latitude']) && isset($_POST['item_caption']) ){
			
		$sender_address   = Input::post("sender_address");
		$receiver_address   = Input::post("receiver_address");
		$sender_latitude   = Input::post("sender_latitude");
		$sender_longitude   = Input::post("sender_longitude");
		$receiver_latitude   = Input::post("receiver_latitude");
		$receiver_longitude   = Input::post("receiver_longitude");
		$receiver_number   = Input::post("receiver_number");
		$sender_number   = Input::post("sender_number");
		$item_r_latitude   = Input::post("item_r_latitude");
		$item_r_longitude   = Input::post("item_r_longitude");
		$quantity   = Input::post("quantity");
		$item_caption = Input::post("item_caption");
		$weight   = Input::post("weight");
		$sender_name  = Input::post("sender_name");
		$receiver_name = Input::post("receiver_name");
		
		//$password   = Input::post("password");
		//$username   = Input::post("username");	
			
			
		$username = Security::decrypt(Input::post("username"));
		$password = Security::decrypt(Input::post("password"));
		
		 
		
			if(main_model::auth($username,$password)){
				
				
			
		 
			  
				
				if(main_model::insert_pickup_placement($sender_name,$receiver_name,$sender_address,$receiver_address,$sender_latitude
				,$sender_longitude,$receiver_latitude,$receiver_longitude,$receiver_number,
				$sender_number,$item_r_latitude,$item_r_longitude,$quantity,$item_caption,$weight,$username)){
					
					
					$yu = array("status"=>"1","message"=>"Created Successfully");  
			 echo json_encode($yu);	
					
					
					
					}else{
						
				$yu = array("status"=>"0","message"=>"Invalid Request");  
			 echo json_encode($yu);			
						
						
						
						}
				
				 
				
				
				
				
				
				
				
				
				
			}else{
				
		$yu = array("status"=>"2","message"=>"Invalid Username / Password");  
			 echo json_encode($yu);			
				
				
				
				}
		 
		
		
		
		
		
			
			
			}else{
				
				
				
				
				
				}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		 
		 
		 }
	 
	function live_view_update(){
		
		
		if(isset($_POST['username']) && isset($_POST['password'])  && isset($_POST['latitude'])  &&
	 isset($_POST['longitude']) && isset($_POST['date_time'])){
		 
		 
		 
		$username = Security::decrypt(Input::post("username"));
		$password = Security::decrypt(Input::post("password"));
		$latitude = Input::post("latitude");
		$longitude = Input::post("longitude");
		$date_time = Input::post("date_time");
		
		 
		 
		
		
		if(main_model::auth($username,$password)){
			
			
			if(main_model::insert_location($username,$latitude,$longitude,$date_time)){
				
				
			$yu = array("status"=>"1","message"=>"Successul");  
			 echo json_encode($yu);		
				
				}else{
					
			$yu = array("status"=>"3","message"=>"Define System Error");  
			 echo json_encode($yu);			
						
					
					}
		
		
		   //var_dump($_POST);	
			
			
			}else{
				
		$yu = array("status"=>"2","message"=>"Invalid Username / Password");  
			 echo json_encode($yu);			
				
				
				
				}
		 
		 
		 }else{
			 
			 
			 
			 
			 
			 
			 }
		
		
		
		
		
		}
		
		
	function register_driver(){
		
	 
		
		if(isset($_POST['first_name']) && isset($_POST['last_name'])  && 
		isset($_POST['email'])  && isset($_POST['organization']) 
		 && isset($_POST['password'])
		
		){
		 $first_name= Input::post("first_name");;
		 $lastname = Input::post("last_name");;
		$email  = Input::post("email");;
		$organization = Input::post("organization");;
		$phone_number = Input::post("phone_number");;
		$password = Input::post("password");;
		
		 //echo main_model::email_phone_exists($email,$phone_number);
		  if(main_model::email_phone_exists($email,$phone_number)){
			  
			  
			  $yu = array("status"=>"2","message"=>"User with Parameter Already Exists");
			  
			  echo json_encode($yu);
			  }else{
				  
			
			if(main_model::insert_driver($first_name,$lastname,$email,$organization,$phone_number,$password)){
				
				
				$yu = array("status"=>"1","message"=>"Successful","username" => Security::encrypt($email) , 
			"password" => Security::encrypt($password) );	
			echo json_encode($yu);		
				
				}else{
					
				$yu = array("status"=>"0","message"=>"ERROR::1291");  
			 echo json_encode($yu);	
					
					
					}  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
			  }
		
		
		
		}else{
			
			
			
			
			}
		
		} 
	 
	 
	function user_login(){
		 
		 
		 if(isset($_POST['email']) && isset($_POST['password'])){
			 
			
		$email = Input::post("email");	
		$password = Input::post("password");	
	 
		
		if(main_model::auth($email,$password)){
			
		$thyu = main_model::userbyIdusername($email);
		$rows  = $thyu->fetch_assoc();	
			$rt = array();
		$rt['level'] = 	$rows['level'];
		$rt['username'] = Security::encrypt($rows['username']);
		$rt['password'] = Security::encrypt($rows['password']);
		$rt['id_layer'] = Security::encrypt($rows['id']);
		$rt['message'] = 'successful';
		$rt['status'] = 1;
		
		echo 	json_encode($rt);
		
			}else{
				
		$yu = array("status"=>"0","message"=>"Invalid username/password");  
			 echo json_encode($yu);			
				
				
				}
		
		
		
			 
			 
			 
			 }else{
				 
			$yu = array("status"=>"2","message"=>"Poor Network Connectivity");  
			 echo json_encode($yu);	
				 
				 
				 }
		 
		 
		 }
	 function register(){
	     
	     
	   if(isset($_POST['password']) && isset($_POST['last_name']) && isset($_POST['email']) 
	   && isset($_POST['phone_number'])){
		   
		   //first_name
		  $first_name  = Input::post("first_name");
		  $last_name = Input::post("last_name");
		  $email = strtolower(Input::post("email"));
		  $phone_number = Input::post("phone_number");
		  $password_1 =Input::post("password");
		   
		  //echo main_model::email_phone_exists($email,$phone_number);
		  if(main_model::email_phone_exists($email,$phone_number)){
			  
			  
			  $yu = array("status"=>"2","message"=>"User with Parameter Already Exists");
			  
			  echo json_encode($yu);
			  }else{
				  
				  
			
			
			if(main_model::user_create_insert($first_name,$last_name,$email,$phone_number,$password_1)){
				
			$yu = array("status"=>"1","username" => Security::encrypt($email) , 
			"password" => Security::encrypt($password_1) ,"message"=>"Successful");	
			echo json_encode($yu);		
				
				}else{
					
				$yu = array("status"=>"0","message"=>"ERROR::1291");  
			 echo json_encode($yu);	
					
					
					}
			
			
				  
				  }
		   
		   
		   
		   }else{
			   
			   
			$yu = array("status"=>"0","message"=>"ERROR::1209");  
			 echo json_encode($yu);
			  
			   
			   }
			   
	 }
	// function f_password(){}
	 
	
	
	//authentication
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	}














?>