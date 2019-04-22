<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MX_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("api_model");
		$this->load->model("category/category_model");
		$this->load->model("home/home_model");
		$this->load->model("vendor/vendor_model");
		$this->load->model("myaccount/myaccount_model");
		$this->load->model("celebrations/celebrations_model");
		$this->load->library('cart');
	}
	
	  
	public function base64_to_jpeg($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen($output_file, 'wb' ); 

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $base64_string );

    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[ 1 ] ) );

    // clean up the file resource
    fclose( $ifp ); 

    return $output_file; 
}
	
	
	public function rest1()
	{
	
	$data = json_decode(file_get_contents('php://input'), TRUE);
	
	$image_name = md5(uniqid(rand(), true));
$filename = $image_name. '.' . 'png';
//rename file name with random number
$path = 'includes/uploads/'.$filename; 

  $this->base64_to_jpeg($data['img_front'],$path);
			


$image_name = md5(uniqid(rand(), true));
$filename2 = $image_name . '.' . 'png';
$path = 'includes/uploads/'.$filename2; 
$this->base64_to_jpeg($data['img_front2'],$path);
			



$image_name = md5(uniqid(rand(), true));
$filename3 = $image_name . '.' . 'png';
$path = 'includes/uploads/'.$filename3; 
$this->base64_to_jpeg($data['img_front3'],$path);


//Prepare array of user data
$userData = array(
    'email' => $data['ownermail'],    
    'password' => $data['password1'],    
    'shopname' => $data['businame'], 
    'shopaddress' => $data['shopadd'],
    'busiaddress' => $data['busiaddress'],
    'own_name' => $data['ownname'],
    'own_contno' => $data['owncntno'],
    'city' => $data['city'],
    'state' => $data['state'],
    'internet' => $data['internet'],
    'website_name' => $data['webname'],
    'front_view' => $filename,
    'kitchen' => $filename2,
    'dining' => $filename3
);

//Pass user data to model
 	$pavan = $this->vendor_model->insert($userData);
	$data['pk'] = $pavan;
	echo json_encode(array("status" => 1, "message" =>  "Vendor has benn registered ","vendor_id" => $data['pk'] ));
        
        
          }
          
          
          //vendor form 2 start 
          
public function rest2()
	{
	
		$data = json_decode(file_get_contents('php://input'), TRUE);
		 
$image_name = md5(uniqid(rand(), true));
$filename = $image_name . '.' . 'png';
//rename file name with random number
$path = 'includes/uploads/'.$filename;
//image uploading folder path
$this->base64_to_jpeg($data['img_front'],$path);

//Prepare array of user data
$ven_id = $data['ven_id'];

$userData = array(
    'cusines' => $data['cusines'],    
    'holiday' => $data['days'],    
    'start_time' => $data['starttime'], 
    'end_time' => $data['endtime'],
    'mini_value' => $data['minorderval'],
    'deliv_opt' => $data['delivery'],
    'deliv_dist' => $data['kms'],
    'deliv_time' => $data['datetime'],
    'staff_name' => $data['stfname'],
    'staff_num' => $data['recnum'],
    'staff_mail' =>$data['recemail'],
    'manag_name' => $data['managname'],
    'manag_num' => $data['mangphno'],
    'manag_mail' => $data['managemail'],
    'menu_copy' => $filename
    
);

//Pass user data to model
$kumar =$this->vendor_model->inserttwo($userData,$ven_id);
$data['pk1'] = $kumar;
echo json_encode(array("status" => 1, "message" =>  "Form  has been submitted ","vendor_id" => $data['pk1'] ));
}	
          
          
          
      //vendor Form 3 start 
          
          
          
          
          
          
          public function rest3()
	{
	
	$data = json_decode(file_get_contents('php://input'), TRUE);
$image_name = md5(uniqid(rand(), true));
$filename = $image_name . '.' . 'png';
//rename file name with random number
$path = 'includes/uploads/'.$filename;
//image uploading folder path
$this->base64_to_jpeg($data['img_front'],$path);

$image_name = md5(uniqid(rand(), true));
$filename1 = $image_name . '.' . 'png';
//rename file name with random number
$path = 'includes/uploads/'.$filename1;
//image uploading folder path
$this->base64_to_jpeg($data['img_front2'],$path);

$image_name = md5(uniqid(rand(), true));
$filename2 = $image_name . '.' . 'png';
//rename file name with random number
$path = 'includes/uploads/'.$filename2;
//image uploading folder path
$this->base64_to_jpeg($data['img_front3'],$path);



//Prepare array of user data
$ven_id = $data['ven_id'];
$userData = array(
    'pan' => $data['panno'],    
    'fssai' => $data['fssai'],    
    'gstin' => $data['gstin'], 
    'gst_per' => $data['gstslab'],
    'deliv_fee' => $data['delfee'],
    'pack_fee' => $data['pakfee'],
    'servi_fee' => $data['serfee'],
    'pan_img' => $filename,
    'invoice_img' => $filename1,
    'bank_img' => $filename2
);

//Pass user data to model
$this->vendor_model->insertthree($userData,$ven_id);
echo json_encode(array("status" => 1, "message" =>  "Vendor has been registered succesfully! " ));
}
          
          
          
          
          
	
	
	
	
	
	
	

	public function index()
	{
		$login = array('mobile' => '9030221135', 'password' => 'narasimha');
		echo json_encode(array('login' => $login));
	}
	
	public function signUp()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);
		
		$firstname = $data['firstname'];
		$lastname = $data['lastname'];
		$email = $data['email'];
		$mobile = $data['mobile'];
	 	$password = $data['password'];
		
		$chkemail = $this->checkEmailExists($email);
		
		if(empty($chkemail))
		{
			$otp = rand(9999,999999);
			
			$params = array(
				'firstname' => $firstname,
				'lastname' => $lastname,
				'mobile' => $mobile,
				'email' => $email,
				'password' => sha1($password),			
				'created_date'=>@date("Y-m-d H:i:s"),
			);
			
			$table = "users";
			$store = $this->api_model->storeItems($table, $params, TRUE);
			if($store)
			{
				$params1 = array(
					'user_id' => $store,
					'user_otp' => $otp
				);
				
				$table1="user_otp";
				$store1=$this->api_model->storeotp($table1, $params1);
				if($store1)
				{
					$this->bhanuSms($firstname, $lastname, $mobile, $otp);
					echo json_encode(array("status" => 1, "message" => "signUp success please verfy mobile number", "user_id" => $store));
				} else {
					echo json_encode(array("status" => 0, "message" =>  "signUp failed"));
				}
			} else {
				echo json_encode(array("status" => 0, "message" =>  "signUp failed"));
			}
		} else {
			echo json_encode(array("status" => 0, "message" =>  "email already exist"));
		}
	}
	
	public function checkEmailExists($email)
	{
		$email=str_replace("%40","@",$email);
		$check=$this->api_model->checkEmail($email);
		if(@sizeOf($check) > 0)
		{
			return $check;
		}
		else{
			return FALSE;
		}
	}
	
	public function activateUser()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);
		$user_otp = $data["otp"];
		$user_id = $data["signupid"];
		
	 	$params=array(
			'user_id' => $user_id,
			'user_otp' => $user_otp,
		);

		$check=$this->api_model->checkAcc($params);

		if(@sizeOf($check) == 1)
		{
			$updateParams=array(
				"email_activation" => 1,
				"status" => 1,
			);
			$table="users";
			$updateStatus=$this->api_model->updateItems($table,$updateParams,$user_id);
			if($updateStatus == 1)
			{
				echo json_encode(array("status" => 1, "message" => "mobile number verifed success"));
			}
			else
			{
				echo json_encode(array("status" => 0, "message" => "please enter correcct otp"));
			}			
		}
		else{
			echo json_encode(array("status" => 0, "message" => "please enter correcct otp"));
		}
		
	}
	
	public function login()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);
		
		$mobile = $data['mobile'];
	 	$password = $data['password'];
	 	$params=array(
			'mobile' => $mobile,
			'password' => sha1($password),
		);
		
		$check = $this->api_model->checkLogin($params);
		if(!empty($check))
		{
		          $cart_total =  $this->getlogincartinfo($check['id']) ;
			echo json_encode(array("status" => 1, "message" =>  "success", "login_id" => $check['id'],"cart_total"=>$cart_total));
		}
		else{
			echo json_encode(array("status" => 0, "message" =>  "login failed"));
		}
	}
	
	public function forgotpass()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);	
		$mobile = $data['mobile'];
		$otp=rand(9999,999999);
		$data = $this->api_model->existmobile_orNot($mobile);
		
		
		
		if(!empty($data))
		{
			$params = array(
				'user_id' => $data['id'],
				'user_otp' => $otp
			);
			
			
			
			$table = "user_otp";
			$store = $this->api_model->storeItems($table, $params);

			if($store)
			{ 
			
			
				$this->bhanuSms($data['firstname'], $data['lastname'], $mobile, $otp);
				echo json_encode(array("status" => 1, "message" => "mobile number correct", "signupid" => $data['id']));
			}
			else{
				echo json_encode(array("status" => 0, "message" => "please enter correcct mobile number"));
			}			

		}else{
			echo json_encode(array("status" => 0, "message" => "please enter correcct mobile number"));			
		}
	}
	
		
	public function newPassword()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);
		$user_otp = $data['otp'];
		$resetpass = sha1($data['newPassword']);
		$signupid = $data['signupid'];
		
		$params = array(
			'user_id' => $signupid,
			'user_otp' => $user_otp,
		);

		$check = $this->api_model->checkAcc($params);
		
		if(@sizeOf($check) == 1)
		{
		
			$updateParams = array(
				'password' => $resetpass,
			);
			
			$table="users";
			$updateStatus = $this->api_model->updateItems($table,$updateParams,$signupid);
			
			if($updateStatus == 1)
			{
				echo json_encode(array("status" => 1, "message" => "password  updated sucessfully"));
			}
			else
			{
				echo json_encode(array("status" => 0, "message" => "something is rong please try agian"));
			}
		 } else {
			echo json_encode(array("status" => 0, "message" => "please enter correcct otp"));
		}
	}
	
	public function locations(){
		
		$citiesInfo = $this->api_model->getTotalInfo('cities');		
		$locations = array();
		
		if(!empty($citiesInfo))
		{
			foreach($citiesInfo as $city)
			{
				$sname = $this->api_model->getStateslist($city->id);
				$locations[]=array($city->city_name =>$sname);
			}
			echo json_encode(array("status" => 1, "message" => "success", "cityinfo" => $locations));
		} else {
			echo json_encode(array("status" => 0, "message" => "something is rong please try agian"));
		}
	}
	
	public function getcartinfo()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);
		$user_id = $data['user_id'];
				
		$loctable = 'addcart';
		$totalcost = 0;
		 
		
		$products = array();
		
		$carts = $this->api_model->getcartinfo($loctable,$user_id);
		
		
		if(!empty($carts))
		{
		       $total_count = 0 ;
		foreach($carts as $shop)
			{
			  // echo $shop['product_id'] ;
			   
			
			   //print_r($shop);
			   
			 //  exit;
			   
			  $otherCharges = $this->api_model->getOtherChargesById($shop['branch_id']);
			  
			  foreach($otherCharges as $charges)
			  {
			  
			      $delivery_charges = $charges->delivery_charges ;
			      
			      if($delivery_charges =='')
			      {
			      
			      $delivery_charges = 0;
			      }
			     
			     
			  
			  }
			   
			   $productdetails = $this->api_model->getProductsDetailsById($shop['product_id'],$shop['shop_id']);
					
					if(!empty($productdetails))
					{
					
					    			
						$data1[] = array(			 
							'category'		=> $productdetails[0]->category_name,
							'gst'                    => $productdetails[0]->gst."%",
							'shop_id'		=> $shop['shop_id'],
							'product_id'	=> $productdetails[0]->product_id,
							'product_name'  => @str_replace("(","",str_replace(")","",$productdetails[0]->product_title)),
							'image_url'		=> $productdetails[0]->main_image ?    
base_url().'administrator/uploads/products/'.$productdetails[0]->main_image : '',
							'cost'			=> $shop['qty']*$productdetails[0]->price,
							'quantity'		=> $shop['qty'],
							'kgs'			=> $shop['qty']*$productdetails[0]->quantity
						);
			
			                }
			 
		             $totalcost  = $totalcost  + $shop['qty']*$productdetails[0]->price + ($shop['qty']*$productdetails[0]->price * $productdetails[0]->gst)/100 + $delivery_charges ;
		                     $total_count = $total_count + $shop['qty'];
		                     
		                     $gst = $productdetails[0]->gst."%" ;
		        }
		
		
		
		
		
		echo json_encode(array("status" => 1, "shopproducts" =>$data1, "totalcost" => $totalcost,"cart_total"=>$total_count,"delivery_charges"=>$delivery_charges,"gst"=>$gst), JSON_UNESCAPED_SLASHES);
		exit;
		
		}
		
		
	          echo json_encode(array("status" => -1, "message" =>"You have not any product in cart.","cart_total"=>$total_count ), JSON_UNESCAPED_SLASHES);
	
	}
	
	
	
	
	public function getlogincartinfo($user_id)
	{
		//$data = json_decode(file_get_contents('php://input'), TRUE);
		$user_id =  $user_id;
				
		$loctable = 'addcart';
		$totalcost = 0;
		 
		
		$products = array();
		
		$carts = $this->api_model->getcartinfo($loctable,$user_id);
		
		  $total_qty = 0;
		
		if(!empty($carts))
		{
		 
		foreach($carts as $shop)
			{
			  // echo $shop['product_id'] ;
			   
			
			   
			   
			   $productdetails = $this->api_model->getProductsDetailsById($shop['product_id'],$shop['shop_id']);
					
					if(!empty($productdetails))
					{				
						$data1[] = array(			 
							'category'		=> $productdetails[0]->category_name,
							'vat'                    => $productdetails[0]->gst,
							'shop_id'		=> $shop['shop_id'],
							'product_id'	=> $productdetails[0]->product_id,
							'product_name'  => @str_replace("(","",str_replace(")","",$productdetails[0]->product_title)),
							'image_url'		=> $productdetails[0]->main_image ?    
base_url().'administrator/uploads/products/'.$productdetails[0]->main_image : '',
							'cost'			=> $shop['qty']*$productdetails[0]->price,
							'quantity'		=> $shop['qty'],
							'kgs'			=> $shop['qty']*$productdetails[0]->quantity
						);
			
			                }
			 
			             $total_qty = $total_qty + $shop['qty'];
		                     $totalcost  = $totalcost  + $shop['qty']*$productdetails[0]->price ;
		        }
		
		
		
		     return $total_qty ;
		
		//echo json_encode(array("status" => 1, "shopproducts" =>$data1, "totalcost" => $totalcost ), JSON_UNESCAPED_SLASHES);
		
		}
		
		
		  return $total_qty ;
	
	
	}
	
	public function shopnames()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);
		$cityid = $data['cityid'];
		$locationid = $data['locationid'];		
		$loctable = 'shop_branches';
		
		$shops = $this->api_model->getshopinfo($cityid, $locationid, $loctable);
		$shopNames = array();

		if(!empty($shops))
		{
			foreach($shops as $shop)
			{
				$shopinfo = $this->api_model->getShopsListById($shop['shop_id']);
				$shopNames[] = array("branchid" => $shop['id'], "shopid" => $shopinfo["id"], "shopname" => $shopinfo["shop_name"], "shopimages" => base_url().'administrator/uploads/shops/'.$shopinfo["shop_image"]);				
			}
			echo json_encode(array("status" => 1, "shopNames" => $shopNames), JSON_UNESCAPED_SLASHES);
		} else {
			echo json_encode(array("status" => 0, "message" => "something is wrong please try agian"));
		}
	}
	
	public function shopproducts()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);
		$shopid = $data['shopid'];
		$branch_id = $data['branch_id'];
		$categories = $this->api_model->getAllcatByshop($shopid);
		$result = array();
		$data = $this->api_model->getProductsDetails($shopid);
		
		if(!empty($data))
		{
		
		 
			foreach($data as $details)
			{
			
			
			
			      $result[] = array(
					'category' => $details->subcategory_name,
					'product_id' => $details->product_id,
					 'shop_id' => $details->shop_id,
					 'branch_id'=> $branch_id,
					'product_name' => $details->product_title,
					'image_url' => $details->main_image? base_url().'administrator/uploads/products/'.$details->main_image : '',
					'cost' => $details->price,
					'kgs' => $details->quantity
				);
			}
			echo json_encode(array("status" => 1, "shopproducts" => $result), JSON_UNESCAPED_SLASHES);
		} else {
			echo json_encode(array("status" => 0, "message" => "something is rong please try agian"));
		}
	}
	
	public function address()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);
		
		$user_id = $data['user_id'];
		$user_address = $data['user_address'];
		$buildingname = $data['buildingname'];
		$streetname = $data['streetname'];
		$area = $data['area'];
	 	$landmark = $data['landmark'];
		$city = $data['city'];
		$pincode = $data['pincode'];
		
		$table = "useraddress";
		$chkUser = $this->api_model->checkUser($user_id);
		
		if(!empty($chkUser))
		{
		
			$chkaddress = $this->api_model->checkAddress($user_id);
			
			if(!empty($chkaddress))
			{
				$params = array(
					'user_address' => $user_address,
					'buildingname' => $buildingname,
					'streetname' => $streetname,
					'area' => $area,
					'landmark' => $landmark,			
					'city'=> $city,
					'pincode' => $pincode,
					'created_date'=>@date("Y-m-d H:i:s")
				);				
				
				$store = $this->api_model->updateAddress($table, $params, $user_id);
				if($store)
				{
					echo json_encode(array("status" => 1, "message" => "address updated successfully", "data" => $params));
	
				} else {
					echo json_encode(array("status" => 0, "message" =>  "something is rong please try agian"));
				}
			} else {
				
				$params1 = array(
					'user_id' => $user_id,
					'firstname' => $chkUser['firstname'],
					'lastname' => $chkUser['lastname'],
					'email' => $chkUser['email'],
					'mobile' => $chkUser['mobile'],
					'city_id' => $chkUser['city_id'],
					'user_address' => $user_address,
					'buildingname' => $buildingname,
					'streetname' => $streetname,
					'area' => $area,
					'landmark' => $landmark,			
					'city'=> $city,
					'pincode' => $pincode,
					'created_date'=>@date("Y-m-d H:i:s")
				);
				
				$store = $this->api_model->storeItems($table, $params1);
				
				if($store)
				{
					echo json_encode(array("status" => 1, "message" => "address added successfully", "data" => $params1));
				} else {
					echo json_encode(array("status" => 0, "message" =>  "something is rong please try agian"));
				}
			}
		} else {
			echo json_encode(array("status" => 0, "message" =>  "user not found"));
		}
	}
	
	public function cartitems()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);
		
		$userid = $data['userid'];
		$shopid = $data['shopid'];
		$branchid = $data['branchid'];
		$products = $data['products'];
		$orderid = rand(9999,99999999);
		$data = array();
		$total = '';		
		
		if(!empty($userid))
		{
			$address = $this->api_model->checkAddress($userid);

			if(!empty($address))
			{
				$useraddress = $address['id'];
			}
			else
			{
				$useraddress = 0;
			}			
			
			if(!empty($products))
			{
				foreach($products as $product)
				{
					$productdetails = $this->api_model->getProductsDetailsById($product['productid'],$shopid);
					
					if(!empty($productdetails))
					{				
						$data[] = array(			 
							'category'		=> $productdetails[0]->category_name,
							'shop_id'		=> $shopid,
							'product_id'	=> $productdetails[0]->product_id,
							'product_name'  => @str_replace("(","",str_replace(")","",$productdetails[0]->product_title)),
							'image_url'		=> $productdetails[0]->main_image ? base_url().'administrator/uploads/products/'.$productdetails[0]->main_image : '',
							'cost'			=> $product['quantity']*$productdetails[0]->price,
							'quantity'		=> $product['quantity'],
							'kgs'			=> $product['quantity']*$productdetails[0]->quantity
						);
						
						$params = array(
							"orderid" => $orderid,
							"user_id" => $userid,
							"vendor_id" => $productdetails[0]->user_id,
							"branch_id" => $branchid,
							"product_id" => $productdetails[0]->product_id,
							"quantity" => $product['quantity'],
							"status" => 0,
							"order_date" => @date("Y-m-d H:i:s")						
						);
						$ordertable = "order_details";
						$store = $this->api_model->storeItems($ordertable,$params);						
						$total += $product['quantity']*$productdetails[0]->price;
					}		
				}
				
				$ordertable1 = "orders";
					
				$params1 = array(
					"orderid" => $orderid,
					"transaction_id" => 0,
					"user_id" => $userid,
					"user_address" => @$useraddress,
					"order_amount" => $total,
					"payment_type" => "None",
					"status" => 1,
					"created_date" => @date("Y-m-d H:i:s")						
				);

				$storeOrder = $this->api_model->storeItems($ordertable1, $params1);				
				
				echo json_encode(array("status"=>1,"cartproducts"=> $data, "orderid" => $orderid, "toatal_cost" => $total));
			}
			else
			{
				echo json_encode(array('status' => 0, "message" => "order failed"));
			}			
		}
		else
		{
			echo json_encode(array("status" => 0, "message" => "user not found"));
		}		
	}
	
	public function usercartproducts()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);
		
		$userid = $data['userid'];
		//$shopid = $data['shop_id'];
		//$orderid = $data['orderid'];
		//$branchid = $data['branchid'];
		$products = $data['products'];		
		
		$gst = '';
		$delivery_charges = '';
		$data = array();
		$total = '';		
		
		if(!empty($userid))
		{
			$address = $this->api_model->checkAddress($userid);

			if(!empty($address))
			{
				$useraddress = $address['id'];
			}
			else
			{
				$useraddress = 0;
			}			
			
			if(!empty($products))
			{
				foreach($products as $product)
				{					
					$productdetails = $this->api_model->getProductsDetailsById($product['productid'],$product['shop_id']);
					
					if(!empty($productdetails))
					{														
						$params = array(
							"orderid" => $product['orderid'],
							"user_id" => $userid,
							"vendor_id" => $productdetails[0]->id,
							"branch_id" => $product['branchid'],
							"product_id" => $productdetails[0]->product_id,
							"quantity" => $product['quantity'],
							"status" => 0,
							"order_date" => @date("Y-m-d H:i:s")						
						);
						$ordertable = "order_details";
						$store = $this->api_model->storeItems($ordertable,$params);
						
						$total += $product['quantity']*$productdetails[0]->price;
					}
					$oproducts = $this->api_model->
					Details($product['orderid'], $userid);				
					$toatal_amount = $oproducts[0]->order_amount;				
									
					if(!empty($oproducts))
					{				
						$ordertable1 = "orders";
						$toatal_amount = $toatal_amount+$total;
							
						$params1 = array(
							"user_address" => @$useraddress,
							"order_amount" => $toatal_amount,
							"payment_type" => "None",
							"status" => 1,
							"created_date" => @date("Y-m-d H:i:s")						
						);

						$storeOrder = $this->api_model->updateOrderItems($ordertable1, $params1, $product['orderid'], $userid);
						
					} else {
					
						$ordertable1 = "orders";
							
						$params1 = array(
							"orderid" => $product['orderid'],
							"transaction_id" => 0,
							"user_id" => $userid,
							"user_address" => @$useraddress,
							"order_amount" => $total,
							"payment_type" => "None",
							"status" => 1,
							"created_date" => @date("Y-m-d H:i:s")						
						);

						$storeOrder = $this->api_model->storeItems($ordertable1, $params1);	
					}
					$datat[] = array("orderid" => $product['orderid'], 'toatal_amount' => $toatal_amount);
					
					$otherCharges = $this->api_model->getOtherChargesById($product['branchid']);
					$gst += $otherCharges[0]->vat;
					$delivery_charges += $otherCharges[0]->delivery_charges;
				}
				
				echo json_encode(array("status" => 1, "Product Cost details" => array( "GST" => $gst , "delivary_charges" => $delivery_charges, "toatals" => $datat ? $datat : 0)));
			}
			else
			{
				echo json_encode(array('status' => 0, "message" => "order failed"));
			}			
		}
		else
		{
			echo json_encode(array("status" => 0, "message" => "user not found"));
		}
	}
	
	public function getOrderList()
	{
	
	
		$data = json_decode(file_get_contents('php://input'), TRUE);
		
		$userid = $data['user_id'];
		//$orderid = $data['orderid'];
		$cdata = array();
		$total = '';		
		
		if(!empty($userid))
		{
			$address = $this->api_model->checkAddress($userid);
                         
			if(!empty($address))
			{
				$useraddress = $address['id'];
			}
			else
			{
				$useraddress = 0;
			}
			
			$ords = $this->api_model->getOrdersStatus($userid);

			if(!empty($ords))
			{
				foreach($ords as $ord)
				{
					$orderproducts = $this->api_model->getOrderProductsByoId($ord['orderid'], $userid);
				
					if(!empty($orderproducts))
					{
						foreach($orderproducts as $orderproduct)
						{
							$productdetails = $this->api_model->savedProductsDetailsById($orderproduct['product_id'], $orderproduct['vendor_id']);
												
							if(!empty($productdetails))
							{				
								$cdata[] = array(
									 "orderid" 		=> $ord['orderid'],			 
									'category'		=> $productdetails[0]->category_name,
									'shop_id'		=> $productdetails[0]->shop_id,
									'branch_id'		=> $orderproduct['branch_id'],
									'product_id'	=> $productdetails[0]->product_id,
									'product_name'  => @str_replace("(","",str_replace(")","",$productdetails[0]->product_title)),
									'image_url'		=> $productdetails[0]->main_image ? base_url().'administrator/uploads/products/'.$productdetails[0]->main_image : '',
									'cost'			=> $orderproduct['quantity']*$productdetails[0]->price,
									'quantity'		=> $orderproduct['quantity'],
									'kgs'			=> $orderproduct['quantity']*$productdetails[0]->quantity
								);
							
								$total += $orderproduct['quantity']*$productdetails[0]->price;
							}
						}
					}
				}
			}
			
			echo json_encode(array("status"=>1,"Orderlist"=> $cdata, "toatal_cost" => $total));
		}
		else
		{
			echo json_encode(array("status" => 0, "message" => "user not found"));
		}		
	}
	
	public function delivaryitems()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);
		$userid = $data["user_id"];
		$data = array();

		if(!empty($userid))
		{
			$delproductdetails = $this->api_model->getDelivaryProducts($userid);
			//$productdetails = $this->api_model->getDelivaryProducts($userid);
			
			if(!empty($delproductdetails))
			{
				foreach($delproductdetails as $orderproduct)
				{
					$productdetails = $this->api_model->savedProductsDetailsById($orderproduct['product_id'], $orderproduct['vendor_id']);

					if(!empty($productdetails))
					{				
						$data[] = array(			 
							'category'		=> $productdetails[0]->category_name,
							'shop_id'		=> $productdetails[0]->shop_id,
							'product_id'	=> $productdetails[0]->product_id,
							'product_name'  => @str_replace("(","",str_replace(")","",$productdetails[0]->product_title)),
							'image_url'		=> $productdetails[0]->main_image ? base_url().'administrator/uploads/products/'.$productdetails[0]->main_image : '',
							'cost'			=> $orderproduct['quantity']*$productdetails[0]->price,
							'quantity'		=> $orderproduct['quantity'],
							'kgs'			=> $orderproduct['quantity']*$productdetails[0]->quantity
						);				
						
					}
				}
			}
			
			echo json_encode(array("status" => 1, "delivary_products" => $data));
		}
		else
		{
			echo json_encode(array("status" => 0, "message" => "user not found"));
		}	
	}
	
	public function paymentStatus()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);
		$userid = $data["userid"];
		$payment_type = $data['payment_type'];
		$orderids = $data['orderids'];
		$table = 'orders';
		$params = array('payment_type' => $payment_type);

		if(!empty($orderids))
		{
			foreach($orderids as $key => $val)
			{
				$this->api_model->updateOrderItems($table, $params, $val['orderid'], $userid);
			}
			echo json_encode(array("status" => 1, "message" => "success"));
		} else {
			echo json_encode(array("status" => 0, "message" => "orders not found"));
		}
	}
	
	public function cancelOrder()
	{
	
	 		$this->load->library('curl'); 
		$data = json_decode(file_get_contents('php://input'), TRUE);
		$userid = $data["userid"];
		//$payment_type = $data['payment_type'];
		$orderid = $data['orderid'];
		$table = 'orders';
		$params = array('status' => '3');
		
		
		
		$user = $this->home_model->getUserDetailsById($userid) ;
		
		foreach($user as $user)
		{
		
		$mobile = $user->mobile ;
		$name =$user->firstname ;
		
		}
		$mobile = $mobile;
		$msg="Dear%20".$name."Your Order has been s cancelled !";
		
		//$sendmsgs ='Customer Name:'.$customer_name.'Customer Mobile:'.$customer_number;
		
		$smsurl1 = "divyam2.smsservice.info/submitsms.jsp?user=sweets&key=892499adf7XX&mobile=+919581176984&message=your order has been cancelled&senderid=INFOSM&accusage=1";
		
		
			 $xml_data ='<?xml version="1.0"?>
<parent>
<child>
<user>sweets</user>
<key>892499adf7XX</key>
<mobile>+91'.$mobile.'</mobile>
<message>Your Order has been cancelled</message>
<accusage>1</accusage>
<senderid>INFOSM</senderid>
</child>

</parent>';

$URL = "http://divyam2.smsservice.info/submitsms.jsp?"; 

			$ch = curl_init($URL);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);
			
			

				 
					if($orderid)
		{
			
		      $this->api_model->updateOrderItems($table, $params, $orderid, $userid);
		     $status = $this->api_model->getOrderStatus($table,$orderid,$userid);
		  		     
		    
		     
		     foreach($status as $state)
		     {
		         
		       $order_status = $state->status ;
		       
		       
		     
		     }
		     
		      if($order_status ==3)
		      {
		          $order_status= 'Cancelled';
		      
		      }
		     if($order_status ==2)
		      {
		          $order_status= 'Delivered';
		      
		      }
		       if($order_status ==1)
		      {
		          $order_status= 'Pending';
		      
		      }
		
			echo json_encode(array("status" => 1, "message" => "Your Order has been cancelled","order_status"=>$order_status));
		} else {
			echo json_encode(array("status" => 0, "message" => "orders not found"));
		}
		
		
		
		
	}
	
	
	
	
	
	public function generate_random_password($length = 10) {
		$alphabets = range('A','Z');
		$numbers = range('0','9');
		//$additional_characters = array('_','.');
		$final_array = array_merge($alphabets,$numbers);
			 
		$password = '';
	  
		while($length--) {
		  $key = array_rand($final_array);
		  $password .= $final_array[$key];
		}
	  
		return $password;
	}
	
	public function bhanuSms($firstname,$lastname = NULL,$mobile,$otp)
	{
		$this->load->library('curl'); 
		
		$name=@ucwords($firstname);
		
		
		
	$msg="Dear%20".$name."%0AThank%20you%20for%20registering%20with%20SweetsHearts%20and%20to%20complete%20registration%2C%20please%20validate%20your%20mobile%20number%20with%20OTP%20%3A%20".$otp.".%0AThank%20You%2C%0A%20SweetsHearts.";
		
		//$sendmsgs ='Customer Name:'.$customer_name.'Customer Mobile:'.$customer_number;
		
		

		$smsurl1 = "http://done.smsservice.info/api/sms.php?uid=6475726761676f64756775&pin=0baec721bb648aa8673540af58835535&sender=SWEETS&route=12&tempid=76057&mobile=".$mobile."&message=".$msg;
		
		return $this->curl->simple_post($smsurl1); 
	}
	
	
	
	
	
	public function addToCart()
	{	
	       
	        $data = json_decode(file_get_contents('php://input'), TRUE);
	        
	        $productid =$data['productid'] ;
	        $branchid=  $data['branchid'] ;
	        $shopname=  $data['shop_id'] ;
	        $userId=    $data['userid'] ;
	        $qty=    $data['qty'] ;
	          
	          
		$productdetails = $this->category_model->getProductsDetailsById($productid,$userId);
		//print_r($productdetails);die();
		$otherCharges = $this->category_model->getOtherChargesById($branchid);
		
		$vat=$productdetails[0]->gst;
		
		//print_r($otherCharges);die();
		$data = array(			 
			'id'      => $productid,
			'qty'     => $qty,
			'price'   => $productdetails[0]->price,
			'name'    => @str_replace("(","",str_replace(")","",$productdetails[0]->product_title)),
			'options' => array('weight' => $productdetails[0]->quantity, 'vat' => $vat, 'branchid' => $branchid, 'vendorid' => $userId)
		);
		//print_R($data);exit;
		$insert=$this->cart->insert($data);
		
		/*$data = array(
			'qty' => $productdetails[0]->quantity,
		);

		$this->cart->update($data);*/
		
		//$cartlists=$this->getContents();
		//print_r($cartlists);
		//echo @sizeOf($cartlists);
		//$this->session->set_userdata(array("otherCharges" => $otherCharges));	
		//$this->session->set_userdata(array("productid" => $productid));	
		//print_r($this->session);
	
		$bata["shopname"]=$shopname;
		$bata["branchid"]=$branchid;
		$bata["otherCharges"]=$otherCharges;
		$deltable= 'delivery';
		$bata['delivery'] = $this->home_model->getTotalInfo($deltable);
		$bata['carts'] = $this->cart->contents();
		echo json_encode($bata);
		//$this->load->view('viewcart',$bata);
		
	}
	
	
	public function newaddToCart()
	{	
	
	
	 $data = json_decode(file_get_contents('php://input'), TRUE);
	        
	        $productid =$data['productid'] ;
	        $branchid=  $data['branchid'] ;
	        $userId=    $data['userid'] ;
	        $qty=    $data['qty'] ;
	        $shopid=    $data['shopid'] ;
	
	        $param= array(
	        
	        
	         'user_id'  => $userId,
	        'product_id'      => $productid,
	        'qty'     => $qty,
		'branch_id' => $branchid ,
		'shop_id' => $shopid 
	      
	      
	        );
	        
	        
	        $ordertable1= "addcart";
	    $cart = $this->api_model->storecart($ordertable1, $param);	
	    $cart_total = $this->getlogincartinfo($userId) ;
	    if($cart)
	    
	    {
	    	 
	        echo json_encode(array("code"=>1,"message"=>"Product is added to cart","cart_total"=>$cart_total));   
	    }
	    
	    else
	    {
	       echo json_encode(array("code"=>-1,"message"=>"this product is not available to ","cart_total"=>$cart_total));    
	    }
	
	}
	
	
	public function removeCart()
	{
	
	
	 $data = json_decode(file_get_contents('php://input'), TRUE);
	        
	        $productid =$data['productid'] ;
	      
	        $userId=    $data['userid'] ;
	       
	
	        $param= array(
	        'user_id'  => $userId,
	        'product_id'      => $productid,
	       
	       );
	        
	        
	        $ordertable1= "addcart";
	         $cart = $this->api_model->removecart($param);
	        $cart_total =  $this->getlogincartinfo($userId) ;      
	      if($cart)
	      {
	          echo json_encode(array("code"=>1,"message"=>"Cart has been deleted","cart_total"=>$cart_total));
	      }
	      
	      else{
	          echo json_encode(array("code"=>-1,"message"=>"Cart is not available","cart_total"=>$cart_total));
	      }
	
	
	}
	
	
	
	
	
	public function newPlaceOrder()
	{
		$data = json_decode(file_get_contents('php://input'), TRUE);
		
		$userid = $data['userid'];
		$addressid = $data['addressid'];
		$payment_type = $data['payment_type'];
		$payment_status = $data['payment_status'];
		$txnid = "TXN".rand(9999,99999999);
		$orderid = rand(9999,99999999);
		$data = array();
		$total = '';
				
		
		if(!empty($userid))
		{
			$address = $this->api_model->checkAddress($userid);

			if(!empty($address))
			{
				$useraddress = $address['id'];
			}
			else
			{
				$useraddress = 0;
			}			
			
			$products= $this->api_model->getcartinfo('addcart',$userid);
			
			if(!empty($products))
			{
				foreach($products as $product)
				{
					$productdetails = $this->api_model->getProductsDetailsById($product['product_id'],$product['shop_id']);
					
					if(!empty($productdetails))
					{				
						$data[] = array(			 
							'category'		=> $productdetails[0]->category_name,
							'shop_id'		=> $product['shop_id'],
							'product_id'	=> $productdetails[0]->product_id,
							'product_name'  => @str_replace("(","",str_replace(")","",$productdetails[0]->product_title)),
							'image_url'		=> $productdetails[0]->main_image ? base_url().'administrator/uploads/products/'.$productdetails[0]->main_image : '',
							'cost'			=> $product['qty']*$productdetails[0]->price,
							'quantity'		=> $product['qty'],
							'kgs'			=> $product['qty']*$productdetails[0]->quantity
						);
						
						$params = array(
							"orderid" => $orderid,
							"user_id" => $userid,
							"vendor_id" => $productdetails[0]->user_id,
							"branch_id" => $product['branch_id'],
							"product_id" => $productdetails[0]->product_id,
							"quantity" => $product['qty'],
							"status" => 0,
							"order_date" => @date("Y-m-d H:i:s")						
						);
						$ordertable = "order_details";
						$store = $this->api_model->storeItems($ordertable,$params);						
						$total += $product['qty']*$productdetails[0]->price;
					}		
				}
				
				$ordertable1 = "orders";
					
				$params1 = array(
					"orderid" => $orderid,
					"transaction_id" => $txnid,
					"user_id" => $userid,
					"user_address" => $addressid,
					"order_amount" => $total,
					"payment_type" => $payment_type,
					"payment_status" => $payment_status,
					"status" => 1,
					"created_date" => @date("Y-m-d H:i:s")						
				);

				$storeOrder = $this->api_model->storeItems($ordertable1, $params1);	
				
				 $deletecart = $this->api_model->deletecart($userid);
				 //start message call 
				 
				 $user = $this->home_model->getUserDetailsById($userid) ;
		
		foreach($user as $user)
		{
		
		$mobile = $user->mobile ;
		$name =$user->firstname ;
		
		}
				 
				 $xml_data ='<?xml version="1.0"?>
<parent>
<child>
<user>sweets</user>
<key>892499adf7XX</key>
<mobile>+91'.$mobile.'</mobile>
<message>Your Order has been succesfully placed order id is'. $orderid.'</message>
<accusage>1</accusage>
<senderid>INFOSM</senderid>
</child>

</parent>';

$URL = "http://divyam2.smsservice.info/submitsms.jsp?"; 

			$ch = curl_init($URL);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);

				 
				 
				 
				 
				 
				 //close message call			
				
				echo json_encode(array("status"=>1,"message"=> "Your Order has been succesfully Placed " , "orderid" => $orderid, "toatal_cost" => $total));
			}
			else
			{
				echo json_encode(array('status' => 0, "message" => "order failed"));
			}			
		}
		else
		{
			echo json_encode(array("status" => 0, "message" => "user not found"));
		}		
	}
	
	
	public function useraddresslist()
	{
	
	  
	        $data = json_decode(file_get_contents('php://input'), TRUE);
		
		$userid = $data['user_id'];
		
		if(!empty($userid))
		{
		      
			$address = $this->api_model->getuseraddress($userid);
                      
			if(!empty($address))
			{
			   foreach($address as $address)
			   {
			   
			          $data1[] =  array("addressid" => $address['id'],
			          
			          "user_address" => $address['user_address'],
			          
			          
			          
			          );
			          
			          
			         
				
				}
				
				
				echo json_encode(array("address"=> $data1));
			}
			
			}
	
	
	
	
	
	}
	
	
	
	
	
	public function userorderlist()
	{
	
	  
	        $data = json_decode(file_get_contents('php://input'), TRUE);
		
		$userid = $data['user_id'];
		
		if(!empty($userid))
		{
		      
			$address = $this->api_model->getuserorders($userid);
                      
			if(!empty($address))
			{
			
			
			   foreach($address as $address)
			   {   
			   
			       if($address['status']==1)
			       {
			       
			         $order_status = "Processing";
			       }
			       if($address['status']==2)
			       {
			       
			         $order_status = "Delivered";
			       }
			         if($address['status']==3)
			       {
			       
			         $order_status = "Cancelled";
			       }
			 $u_address=  $this->api_model->getAddress($address['user_address']);
			 
			 
			 if(!empty($u_address))
			{
			
			
			   foreach($u_address as $u_address)
			   {  
			        $user_address = $u_address;
			   }
			   
			   
			   }
			
			          $data1[] =  array("order_id" => $address['orderid'],
			            
			          "order_amount" => $address['order_amount'],
			          "order_status" => $order_status,
			          "payment_type" => $address['payment_type'],
			          "payment_type" => $address['payment_type'],
			          "order_date" => $address['created_date'],
			          "address" =>  $user_address ,
			      
			      
			          
			          
			          
			          );
			          
			          
			         
				
				}
				
				
				echo json_encode(array("orders"=> $data1));
			}
			
			}
	
	}
	
	
	public function saveCelbdetails()
	{
	
				
	
			$data = json_decode(file_get_contents('php://input'), TRUE);
		
		$userid = $data['userid'];
		$addressid = $data['addressid'];
		$payment_type = $data['payment_type'];
		$payment_status = $data['payment_status'];
		$celeb_id = $data['celb_id'];
		$qty = $data['qty'];
		$order_amount = $data['order_amount'];
		$txnid = $this->generate_random_password(8);
		$orderid = rand(9999,99999999);
		$data = array();
		$total = '';
		
		
		$setter = 0;
		
		$ordertable1="celebration_orders";
		date_default_timezone_set("Asia/Kolkata");
		$params2=array(
			"orderid" => $orderid,
			"transaction_id" => $txnid ,
			"user_id" => $userid,
			"user_address" => $addressid,
			"order_notes" => '',
			"order_amount" => $order_amount,
			"payment_type" => "COD",
			"status" => 1,
			"created_date" => @date("Y-m-d H:i:s"),							
		);
		//print_r($params2);die();
		$storeOrder=$this->category_model->storeItems($ordertable1,$params2);
		
		
		if($storeOrder > 0)
		
		{	
		        $ordertable1="celebration_orders";
			$items= $this->api_model->getorders($storeOrder);
				
			
						
			   /*
				$data[] = array(
					'rowid' => $items['id'],
					'id' => $items['id'],
					'qty' => $qty,
					'price' => $items['price'],
					'name' => $items['name'],
					'options' => $items['options'],
				);
				$celb_id = $celeb_id;
				
				*/
				
				
				$ordertable="celeb_order_details";
				date_default_timezone_set("Asia/Kolkata");
				$params1=array(
					"orderid" => $orderid,
					"user_id" => $userid,
					"celb_id" => $celeb_id,
					"quantity" => $qty,
					"order_date" => @date("Y-m-d H:i:s"),							
				);
			
				$store=$this->category_model->storeItems($ordertable,$params1);
								
				
			
			if($store > 0)
			{
			  // Need to give message 
			  
			  
			  $user = $this->home_model->getUserDetailsById($userid) ;
		
		foreach($user as $user)
		{
		
		$mobile = $user->mobile ;
		$name =$user->firstname ;
		
		}
		$mobile = $mobile;
		$msg="Dear%20".$name."Your Order has been succesfully  Placed !";
		
		//$sendmsgs ='Customer Name:'.$customer_name.'Customer Mobile:'.$customer_number;
		
		$smsurl1 = "divyam2.smsservice.info/submitsms.jsp?user=sweets&key=892499adf7XX&mobile=+919581176984&message=your order has been cancelled&senderid=INFOSM&accusage=1";
		
		
			 $xml_data ='<?xml version="1.0"?>
<parent>
<child>
<user>sweets</user>
<key>892499adf7XX</key>
<mobile>+91'.$mobile.'</mobile>
<message>Your Order has been cancelled</message>
<accusage>1</accusage>
<senderid>INFOSM</senderid>  
</child>

</parent>';

$URL = "http://divyam2.smsservice.info/submitsms.jsp?"; 

			$ch = curl_init($URL);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);
			
			  
			  
			  //closing message 
			  
			
			
				echo json_encode(array("message"=>"Your Order has been succesfully placed"));
				exit;				
			}
			else{	
			
			

			
								
				echo json_encode(array("message"=>"Order has been failed "));	
				exit;						
			}	
		}
		else
		{
			echo json_encode(array("message"=>"Order has been failed "));	
			exit;
		}	
	}
	
	
	
	
	
	
	
	public function getallcel()
	{
		$celebrationtable="celebrations";
		$data["celebrations"]=$this->home_model->getActiveCelebrations($celebrationtable);
		
		//print_r($data["celebrations"]);
		
		foreach($data["celebrations"] as $cel)
		{
		
		  $data1[] =  array("id" => $cel->id,
			            
			         "title" => $cel->title,
			           "description" => $cel->description,
			         "fromdate" => $cel->fromdate,
			        "todate" => $cel->todate,
			        "price" => $cel->price,
			        "quantity" => $cel->quantity,
			        "vat" => $cel->vat,
			         "status" => $cel->status,
				 "created_date" => $cel->created_date,			      
			      
			     );
		
	           }
		
		echo json_encode(array("message"=>"List of Celebrations", "data"=> $data1));
		exit;
	}
	
	
	public function getcelinfo()
	{
	 $data = json_decode(file_get_contents('php://input'), TRUE);
		
		$id = $data['id'];
	
	$celebrationtable="celebrations";
	$celebrate=$this->celebrations_model->getTotalInfocele($celebrationtable,$id);
	$data["celebrate"]=$celebrate;
	
	//print_r($data["celebrate"]);
	
	if(@sizeOf($celebrate) > 0)
		{
		
		foreach($data["celebrate"] as $cel)
		{
			$banners=$this->celebrations_model->getBannersbyVelbId($cel->id);
			$data["banners"]=$banners;
			
			foreach($data["banners"] as $banners) {
			
			 $data1 =  array("cel_id" => $banners->celb_id,
			            
			         "banner_image" => "http://sweetshearts.com/administrator/uploads/celebrations/".$banners->banner_image,
			            "Title" => $cel->title,
			           "description" => $cel->description,
			         "fromdate" => $cel->fromdate,
			        "todate" => $cel->todate,
			        "price" => $cel->price,
			        "quantity" => $cel->quantity,
			        "vat" => $cel->vat,
			         "status" => $cel->status,
				 "created_date" => $cel->created_date,			      
			      
			     );
			     
			     }
			
			
			
	        }
	        
	        echo json_encode(array("message"=>"Celeberations Details","status"=>1,"data"=>$data1));
	        exit;
		}
	
	
	
	}
	
	
	public function celebrations($id,$occasion=null)
	{
		$celebrationtable="celebrations";
		$data["celebrations"]=$this->home_model->getActiveCelebrations($celebrationtable);
		$this->load->view('home/header',$data);
		
		$celebrate=$this->celebrations_model->getTotalInfocele($celebrationtable,$id);
		$data["celebrate"]=$celebrate;
		if(@sizeOf($celebrate) > 0)
		{
			$banners=$this->celebrations_model->getBannersbyVelbId($celebrate[0]->id);
			$data["banners"]=$banners;
		}
		else
		{
			$banners=array();
			$data["banners"]=$banners;
		}
		//echo "<pre>";print_r($data["banners"]);echo "</pre>";die();
	
		$this->load->view('wishes',$data);
		
		$soctable= 'social_links';
		$data['social'] = $this->home_model->getTotalInfo($soctable);
		$this->load->view('home/footer',$data);
	}
	
	
	public function getcelorders()
	{
	$data = json_decode(file_get_contents('php://input'), TRUE);
		
	$userid = $data['userId'];
	
	
	$totalRecords=$this->myaccount_model->getAllCelborders($userid);
	
	 echo json_encode(array("status"=>1,"data"=>$totalRecords));
	        exit;
	
	
	}
	
	public function getcelordersdetails()
	{
	$data = json_decode(file_get_contents('php://input'), TRUE);
		
	$orderid= $data['orderid'];
	
	
	       $order=$this->myaccount_model->getCelbOrderDetailsbyId($orderid);
	       $custDetails = $this->myaccount_model->getCustomerdetails($order[0]->user_id);
	       $address= $this->myaccount_model->getUserShippingAddress($order[0]->user_address);
			      
	 echo json_encode(array("status"=>1,"order"=>$order,"user"=>$custDetails ,"address"=>$address));
	        exit;
	
	
	}
	
	public function cancelcelb()
	{
	
	$data = json_decode(file_get_contents('php://input'), TRUE);
		
	$orderid= $data['orderid'];
	             $data= array(
			
			'status'=>3
			
			
			);
	
	
			$this->myaccount_model->celbcancelorder($orderid,$data);
			$orderDetails=$this->category_model->getCelbOrderDetailsbyId($orderid);
			
		//print_r($orderDetails);die();
		if(sizeOf($orderDetails) > 0)
		{
			//$transactionId=@$orderDetails[0]->transaction_id;
			//$userEmail=@$orderDetails[0]->email;
			$userMobile=$orderDetails[0]->mobile;
			//$order_amount=@$orderDetails[0]->order_amount;
			//$userName=@ucwords($orderDetails[0]->firstname);
		}
			
			
			 $xml_data ='<?xml version="1.0"?>
<parent>
<child>
<user>sweets</user>
<key>892499adf7XX</key>
<mobile>+91'.$userMobile.'</mobile>
<message>Your Order has been cancelled succesfully order id is'.$orderid.'</message>
<accusage>1</accusage>
<senderid>INFOSM</senderid>
</child>

</parent>';

$URL = "http://divyam2.smsservice.info/submitsms.jsp?"; 

			$ch = curl_init($URL);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);
			
			
	 echo json_encode(array("status"=>1,"message"=>'Your Order has been cancelled !'));
	        exit;
	
	
	}
	  
	 
	
}
