<?php



class main_model extends ceemain{
	static function driver_pending($driver){
		
		
			$key = configuration::key_serial();
	$sql = "SELECT id , AES_DECRYPT(sender_address,'".$key."') as sender_address ,
	AES_DECRYPT(sender_name,'".$key."') as sender_name ,
	AES_DECRYPT(receiver_name,'".$key."') as receiver_name ,
	 AES_DECRYPT(receiver_address,'".$key."') as receiver_address,
	AES_DECRYPT(sender_latitude,'".$key."') as sender_latitude ,
	AES_DECRYPT(sender_longitude,'".$key."') as sender_longitude ,
	AES_DECRYPT(receiver_latitude,'".$key."') as receiver_latitude ,
	AES_DECRYPT(receiver_longitude,'".$key."') as receiver_longitude ,
	AES_DECRYPT(receiver_number,'".$key."') as receiver_number ,
	AES_DECRYPT(sender_number,'".$key."') as sender_number ,
	AES_DECRYPT(item_caption,'".$key."') as item_caption ,
	AES_DECRYPT(item_r_latitude,'".$key."') as item_r_latitude ,
	AES_DECRYPT(quantity,'".$key."') as quantity ,	
	AES_DECRYPT(weight,'".$key."') as weight ,	
	AES_DECRYPT(item_r_longitude,'".$key."') as item_r_longitude
	
	
	
	
	FROM place_pickup WHERE status = AES_ENCRYPT('1','".$key."') &&  driver = AES_ENCRYPT('".$driver."','".$key."')  ORDER BY id";
	$result1 = Cee_Model::query($sql);
	$result = $result1[0];
	$conn =  $result1[1];
	
	return $result;	
		
		
		
		
		}
		
		
	static function driver_complete($username){
		
	 $key = configuration::key_serial();
	$sql = "SELECT id , AES_DECRYPT(sender_address,'".$key."') as sender_address ,
	AES_DECRYPT(sender_name,'".$key."') as sender_name ,
	AES_DECRYPT(receiver_name,'".$key."') as receiver_name ,
	 AES_DECRYPT(receiver_address,'".$key."') as receiver_address,
	AES_DECRYPT(sender_latitude,'".$key."') as sender_latitude ,
	AES_DECRYPT(sender_longitude,'".$key."') as sender_longitude ,
	AES_DECRYPT(receiver_latitude,'".$key."') as receiver_latitude ,
	AES_DECRYPT(receiver_longitude,'".$key."') as receiver_longitude ,
	AES_DECRYPT(receiver_number,'".$key."') as receiver_number ,
	AES_DECRYPT(sender_number,'".$key."') as sender_number ,
	AES_DECRYPT(item_caption,'".$key."') as item_caption ,
	AES_DECRYPT(item_r_latitude,'".$key."') as item_r_latitude ,
	AES_DECRYPT(quantity,'".$key."') as quantity ,	
	AES_DECRYPT(weight,'".$key."') as weight ,	
	AES_DECRYPT(item_r_longitude,'".$key."') as item_r_longitude
	
	
	
	
	FROM place_pickup WHERE status = AES_ENCRYPT('1','".$key."') &&  	driver = AES_ENCRYPT('".$username."','".$key."') ORDER BY id";
	$result1 = Cee_Model::query($sql);
	$result = $result1[0];
	$conn =  $result1[1];
	
	return $result;	
		
		
 //AES_ENCRYPT('0','".$key."') 	
		
		
		
		
		
		
		}
	
	static function get_oncgoing_pickup_username($username){
		
		
		
		
		$key = configuration::key_serial();
	$sql = "SELECT id , AES_DECRYPT(sender_address,'".$key."') as sender_address ,
	AES_DECRYPT(sender_name,'".$key."') as sender_name ,
	AES_DECRYPT(receiver_name,'".$key."') as receiver_name ,
	 AES_DECRYPT(receiver_address,'".$key."') as receiver_address,
	AES_DECRYPT(sender_latitude,'".$key."') as sender_latitude ,
	AES_DECRYPT(sender_longitude,'".$key."') as sender_longitude ,
	AES_DECRYPT(receiver_latitude,'".$key."') as receiver_latitude ,
	AES_DECRYPT(receiver_longitude,'".$key."') as receiver_longitude ,
	AES_DECRYPT(receiver_number,'".$key."') as receiver_number ,
	AES_DECRYPT(sender_number,'".$key."') as sender_number ,
	AES_DECRYPT(item_caption,'".$key."') as item_caption ,
	AES_DECRYPT(item_r_latitude,'".$key."') as item_r_latitude ,
	AES_DECRYPT(quantity,'".$key."') as quantity ,	
	AES_DECRYPT(weight,'".$key."') as weight ,	
	AES_DECRYPT(item_r_longitude,'".$key."') as item_r_longitude
	
	
	
	
	FROM place_pickup WHERE status = AES_ENCRYPT('1','".$key."') &&  username = AES_ENCRYPT('".$username."','".$key."') ORDER BY id";
	$result1 = Cee_Model::query($sql);
	$result = $result1[0];
	$conn =  $result1[1];
	
	return $result;	
		
		
 //AES_ENCRYPT('0','".$key."') 
		
		
		}
		
	 
	static function get_completed_pickup_username($username){
		
		
		
		
		$key = configuration::key_serial();
	$sql = "SELECT id , AES_DECRYPT(sender_address,'".$key."') as sender_address ,
	AES_DECRYPT(sender_name,'".$key."') as sender_name ,
	AES_DECRYPT(receiver_name,'".$key."') as receiver_name ,
	 AES_DECRYPT(receiver_address,'".$key."') as receiver_address,
	AES_DECRYPT(sender_latitude,'".$key."') as sender_latitude ,
	AES_DECRYPT(sender_longitude,'".$key."') as sender_longitude ,
	AES_DECRYPT(receiver_latitude,'".$key."') as receiver_latitude ,
	AES_DECRYPT(receiver_longitude,'".$key."') as receiver_longitude ,
	AES_DECRYPT(receiver_number,'".$key."') as receiver_number ,
	AES_DECRYPT(sender_number,'".$key."') as sender_number ,
	AES_DECRYPT(item_caption,'".$key."') as item_caption ,
	AES_DECRYPT(item_r_latitude,'".$key."') as item_r_latitude ,
	AES_DECRYPT(quantity,'".$key."') as quantity ,	
	AES_DECRYPT(weight,'".$key."') as weight ,	
	AES_DECRYPT(item_r_longitude,'".$key."') as item_r_longitude
	
	
	
	
	FROM place_pickup WHERE status = AES_ENCRYPT('2','".$key."') && username = AES_ENCRYPT('".$username."','".$key."') ORDER BY id";
	$result1 = Cee_Model::query($sql);
	$result = $result1[0];
	$conn =  $result1[1];
	
	return $result;	
		
		
 //AES_ENCRYPT('0','".$key."') 
		
		
		}
	
	static function get_pending_pickup_username($username){
		
		
		
		
		$key = configuration::key_serial();
	$sql = "SELECT id , AES_DECRYPT(sender_address,'".$key."') as sender_address ,
	AES_DECRYPT(sender_name,'".$key."') as sender_name ,
	AES_DECRYPT(receiver_name,'".$key."') as receiver_name ,
	 AES_DECRYPT(receiver_address,'".$key."') as receiver_address,
	AES_DECRYPT(sender_latitude,'".$key."') as sender_latitude ,
	AES_DECRYPT(sender_longitude,'".$key."') as sender_longitude ,
	AES_DECRYPT(receiver_latitude,'".$key."') as receiver_latitude ,
	AES_DECRYPT(receiver_longitude,'".$key."') as receiver_longitude ,
	AES_DECRYPT(receiver_number,'".$key."') as receiver_number ,
	AES_DECRYPT(sender_number,'".$key."') as sender_number ,
	AES_DECRYPT(item_caption,'".$key."') as item_caption ,
	AES_DECRYPT(item_r_latitude,'".$key."') as item_r_latitude ,
	AES_DECRYPT(quantity,'".$key."') as quantity ,	
	AES_DECRYPT(weight,'".$key."') as weight ,	
	AES_DECRYPT(item_r_longitude,'".$key."') as item_r_longitude
	
	
	
	
	FROM place_pickup WHERE status = AES_ENCRYPT('0','".$key."') && username = AES_ENCRYPT('".$username."','".$key."') ORDER BY id";
	$result1 = Cee_Model::query($sql);
	$result = $result1[0];
	$conn =  $result1[1];
	
	return $result;	
		
		
 //AES_ENCRYPT('0','".$key."') 
		
		
		}
	
	
	static function update_pickup_ascompleted($id_stat){
		
		
			$key = configuration::key_serial(); 
	$date = date("YmdHis",time());
	$sql = "UPDATE place_pickup SET 
	
	status = AES_ENCRYPT('2','".$key."')  WHERE id ='".$id_stat."'";
	
	$conn = db::createion();
	
	$result = $conn->query($sql);
	 
	 if($result === true){
		 
		return 1;
		
		}else{
			
			return $conn->error;
			
			}
		
		
		
		
		
		
		}
	static function update_driver_asfree($username){
		
	$key = configuration::key_serial(); 
	$date = date("YmdHis",time());
	$sql = "UPDATE users SET 
	 stat = AES_ENCRYPT('0','".$key."') WHERE 
	 username = AES_ENCRYPT('".$username."','".$key."') ";
	
	$conn = db::createion();
	
	$result = $conn->query($sql);
	 
	 if($result === true){
		 
		return 1;
		
		}else{
			
			return $conn->error;
			
			}
	 	
		}
		
		
	static function update_driver_op($username){
		
		
	$key = configuration::key_serial(); 
	$date = date("YmdHis",time());
	$sql = "UPDATE users SET 
	 stat = AES_ENCRYPT('1','".$key."') WHERE 
	 username = AES_ENCRYPT('".$username."','".$key."') ";
	
	$conn = db::createion();
	
	$result = $conn->query($sql);
	 
	 if($result === true){
		 
		return 1;
		
		}else{
			
			return $conn->error;
			
			}
		
		
		
		
		
		}
		
		
	static function update_acknowledge_pickup($username,$id_stat){
		
		$key = configuration::key_serial(); 
	$date = date("YmdHis",time());
	$sql = "UPDATE place_pickup SET 
	drive = AES_ENCRYPT('".$username."','".$key."') ,
	status = AES_ENCRYPT('1','".$key."') ,
	pickstat = AES_ENCRYPT('".$date."','".$key."')  WHERE id ='".$id_stat."'";
	
	$conn = db::createion();
	
	$result = $conn->query($sql);
	 
	 if($result === true){
		 
		return 1;
		
		}else{
			
			return $conn->error;
			
			}
		
		 
		}
	
	
	static function update_acknowledge_pickup12($username,$id_stat){
		
		$key = configuration::key_serial(); 
	$date = date("YmdHis",time());
	$sql = "INSERT INTO place_pickup SET 
	drive = AES_ENCRYPT('".$username."','".$key."') ,
	status = AES_ENCRYPT('1','".$key."') WHERE id ='".$id_stat."'";
	
	$conn = db::createion();
	
	$result = $conn->query($sql);
	 
	 if($result === true){
		 
		return 1;
		
		}else{
			
			return $conn->error;
			
			}
		
		 
		}
		
		
	static function getdriver_status($username){
		
		//$username = Security::decrypt(Session::ceedata("ceemain_secure2"));
	$key = configuration::key_serial();
	$sql = "SELECT id, AES_DECRYPT(level,'".$key."') as level , AES_DECRYPT(password,'".$key."') as password,
	AES_DECRYPT(firstname,'".$key."') as firstname,
	AES_DECRYPT(username,'".$key."') as username FROM users WHERE username =  AES_ENCRYPT('".$username."','".$key."') 
	&& stat = AES_ENCRYPT('1','".$key."') ORDER BY id";
	$result1 = Cee_Model::query($sql);
	$result = $result1[0];
	$conn =  $result1[1];
	
	if($result->num_rows > 0 ){
		
		return 1;
		
		}else{
			
		return $conn->error;
			
			} 	
		
		
		
		
		
		}
		
		
		
	static function get_avala_pickup(){
		
		
		
		
		$key = configuration::key_serial();
	$sql = "SELECT id , AES_DECRYPT(sender_address,'".$key."') as sender_address ,
	AES_DECRYPT(sender_name,'".$key."') as sender_name ,
	AES_DECRYPT(receiver_name,'".$key."') as receiver_name ,
	 AES_DECRYPT(receiver_address,'".$key."') as receiver_address,
	AES_DECRYPT(sender_latitude,'".$key."') as sender_latitude ,
	AES_DECRYPT(sender_longitude,'".$key."') as sender_longitude ,
	AES_DECRYPT(receiver_latitude,'".$key."') as receiver_latitude ,
	AES_DECRYPT(receiver_longitude,'".$key."') as receiver_longitude ,
	AES_DECRYPT(receiver_number,'".$key."') as receiver_number ,
	AES_DECRYPT(sender_number,'".$key."') as sender_number ,
	AES_DECRYPT(item_caption,'".$key."') as item_caption ,
	AES_DECRYPT(item_r_latitude,'".$key."') as item_r_latitude ,
	AES_DECRYPT(quantity,'".$key."') as quantity ,	
	AES_DECRYPT(weight,'".$key."') as weight ,	
	AES_DECRYPT(item_r_longitude,'".$key."') as item_r_longitude
	
	
	
	
	FROM place_pickup WHERE status = AES_ENCRYPT('0','".$key."')  ORDER BY id";
	$result1 = Cee_Model::query($sql);
	$result = $result1[0];
	$conn =  $result1[1];
	
	return $result;	
		
		
 //AES_ENCRYPT('0','".$key."') 
		
		
		
		
		
		
		}
	
	static function insert_pickup_placement($sender_name,$receiver_name,$sender_address,$receiver_address,$sender_latitude
				,$sender_longitude,$receiver_latitude,$receiver_longitude,$receiver_number,
				$sender_number,$item_r_latitude,$item_r_longitude,$quantity,$item_caption,$weight,$username){
					
					
					
			$key = configuration::key_serial(); 
	$date = date("YmdHis",time());
	$sql = "INSERT INTO  place_pickup SET 
	receiver_name = AES_ENCRYPT('".$receiver_name."','".$key."') , 
	sender_name = AES_ENCRYPT('".$sender_name."','".$key."') , 
	
	sender_address = AES_ENCRYPT('".$sender_address."','".$key."') , 
	receiver_address = AES_ENCRYPT('".$receiver_address."','".$key."') , 
	sender_latitude = AES_ENCRYPT('".$sender_latitude."','".$key."') , 
	sender_longitude = AES_ENCRYPT('".$sender_longitude."','".$key."') ,
	item_caption = AES_ENCRYPT('".$item_caption."','".$key."') ,
	item_r_latitude = AES_ENCRYPT('".$receiver_latitude."','".$key."'), 
	sender_number = AES_ENCRYPT('".$sender_number."','".$key."') ,
	receiver_number = AES_ENCRYPT('".$receiver_number."','".$key."') ,
	receiver_longitude = AES_ENCRYPT('".$receiver_number."','".$key."') ,
	receiver_latitude = AES_ENCRYPT('".$receiver_longitude."','".$key."') ,
	item_r_longitude =  AES_ENCRYPT('".$item_r_longitude."','".$key."') ,
	quantity =  AES_ENCRYPT('".$quantity."','".$key."') ,
	weight =  AES_ENCRYPT('".$weight."','".$key."') ,
	username = AES_ENCRYPT('".$username."','".$key."') ,
	status = AES_ENCRYPT('0','".$key."') , 
	format = AES_ENCRYPT('".$date."','".$key."') ";
	
	$conn = db::createion();
	
	$result = $conn->query($sql);
	 
	 if($result === true){
		 
		return 1;
		
		}else{
			
			return $conn->error;
			
			}		
					
					
					
					
					
					
					
					
					
					
					
					
					}
					
					
					
					
	static function userby(){
	//$username = Security::decrypt(Session::ceedata("ceemain_secure2"));
	$key = configuration::key_serial();
	$sql = "SELECT id, AES_DECRYPT(level,'".$key."') as level , AES_DECRYPT(password,'".$key."') as password,
	AES_DECRYPT(firstname,'".$key."') as firstname,
	AES_DECRYPT(username,'".$key."') as username FROM users ORDER BY id";
	$result1 = Cee_Model::query($sql);
	$result = $result1[0];
	$conn =  $result1[1];
	
	return $result;	
		
		
		}
	static function userbyIdusername($username){
	
	//$username = Security::decrypt(Session::ceedata("ceemain_secure2"));
	$key = configuration::key_serial();
	$sql = "SELECT id, AES_DECRYPT(level,'".$key."') as level , AES_DECRYPT(password,'".$key."') as password,
	AES_DECRYPT(firstname,'".$key."') as firstname,
	AES_DECRYPT(username,'".$key."') as username FROM users WHERE 
	username = AES_ENCRYPT('".$username."','".$key."') || email = AES_ENCRYPT('".$username."','".$key."')  
	ORDER BY id  LIMIT 0,1 ";
	$result1 = Cee_Model::query($sql);
		$result = $result1[0];
		$conn =  $result1[1];
		return $result;	
		
		
		}
		
	static function insert_location($username,$latitude,$longitude,$date_time){
		
		
	$key = configuration::key_serial(); 
	$date = date("YmdHis",time());
	$sql = "INSERT INTO location_i SET 
	username = AES_ENCRYPT('".$username."','".$key."') , 
	longitude = AES_ENCRYPT('".$longitude."','".$key."') , 
	date_time = AES_ENCRYPT('".$date_time."','".$key."') , 
	latitude = AES_ENCRYPT('".$latitude."','".$key."') , 
	status = AES_ENCRYPT('1','".$key."') , 
	format = AES_ENCRYPT('".$date."','".$key."') ";
	
	$conn = db::createion();
	
	$result = $conn->query($sql);
	 
	 if($result === true){
		 
		return 1;
		
		}else{
			
			return $conn->error;
			
			}
		
		
		
		
		
		
		}
		
		
	static function insert_driver($first_name,$last_name,$email,$organization,$phone_number,$password){
		
		
		//$password = "password1";	
	$key = configuration::key_serial(); 
	//$user = users_model::username();	
	$date = date("YmdHis",time());
	$sql = "INSERT INTO users SET 
	password = AES_ENCRYPT('".$password."','".$key."') , 
	username = AES_ENCRYPT('".$email."','".$key."') , 
	email = AES_ENCRYPT('".$email."','".$key."') , 
	company = AES_ENCRYPT('".$organization."','".$key."') , 
	firstname = AES_ENCRYPT('".$first_name."','".$key."') , 
	lastname = AES_ENCRYPT('".$last_name."','".$key."') , 
	phone = AES_ENCRYPT('".$phone_number."','".$key."') ,  
	level = AES_ENCRYPT('driver_co','".$key."') ,  
	 status = AES_ENCRYPT('1','".$key."') , 
	 format = AES_ENCRYPT('".$date."','".$key."') ";
	
	$conn = db::createion();
	
	$result = $conn->query($sql);
	 
	 if($result === true){
		 
		return 1;
		
		}else{
			
			return $conn->error;
			
			}
		
		
		
		
		
		}
	static function user_create_insert($first_name,$last_name,$email,$phone_number,$password){
		
		
			
			//$password = "password1";	
	$key = configuration::key_serial(); 
	//$user = users_model::username();	
	$date = date("YmdHis",time());
	$sql = "INSERT INTO users SET 
	password = AES_ENCRYPT('".$password."','".$key."') , 
	username = AES_ENCRYPT('".$email."','".$key."') , 
	email = AES_ENCRYPT('".$email."','".$key."') , 
	firstname = AES_ENCRYPT('".$first_name."','".$key."') , 
	lastname = AES_ENCRYPT('".$last_name."','".$key."') , 
	phone = AES_ENCRYPT('".$phone_number."','".$key."') ,  
	level = AES_ENCRYPT('user','".$key."') ,  
	 status = AES_ENCRYPT('1','".$key."') , 
	 format = AES_ENCRYPT('".$date."','".$key."') ";
	
	$conn = db::createion();
	
	$result = $conn->query($sql);
	 
	 if($result === true){
		 
		return 1;
		
		}else{
			
			return $conn->error;
			
			}	
		
		
		
		
		
		
		}
		
		
	 static function auth($user,$password){
		 
	 $key = configuration::key_serial(); 
	 $sql = " SELECT * FROM users WHERE ( username = AES_ENCRYPT('".$user."','".$key."') 
	 ||  email = AES_ENCRYPT('".$user."','".$key."') )
	         && password = AES_ENCRYPT('".$password."','".$key."') ";
	$result1 = Cee_Model::query($sql);
	$result = $result1[0];
	$conn =  $result1[1];
	
	if($result->num_rows > 0 ){
		
		return 1;
		
		}else{
			
		return $conn->error;
			
			} 	
			
	 }
		
	 static function email_phone_exists($email,$phone){
		 
		$key = configuration::key_serial(); 
	$sql = " SELECT * FROM users WHERE username = AES_ENCRYPT('".$email."','".$key."') || 
	 email = AES_ENCRYPT('".$email."','".$key."')  || 
	phone = AES_ENCRYPT('".$phone."','".$key."') ";
	$result1 = Cee_Model::query($sql);
	$result = $result1[0];
	$conn =  $result1[1];
	
	if($result->num_rows > 0 ){
		
		return 1;
		
		}else{
			
		return $conn->error;
			
			} 
		 
		 
		 
		 
		 
		 }
	
	
	
	static function user_exists($username){
		
	$key = configuration::key_serial(); 
	$sql = " SELECT * FROM users WHERE username = AES_ENCRYPT('".$username."','".$key."') ";
	$result1 = Cee_Model::query($sql);
	$result = $result1[0];
	$conn =  $result1[1];
	
	if($result->num_rows > 0 ){
		
		return 1;
		
		}else{
			
		return 0;	
			
			}
		
		
		}
	
	
	
	
	
	
	
	}






?>