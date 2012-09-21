<?php
require_once "../db_con/db.php";

class Util{
	public static function getCat(){
		$stmt = DB::query("SELECT * FROM category");
		$substmt = DB::prepare("select * from subcategory where category_id = ?");
		$categories = $stmt->fetchall(PDO::FETCH_ASSOC);
		foreach($categories as &$category){
			$id = $category['cat_id'];
			$substmt->bindValue(1,$id,PDO::PARAM_INT);
			$substmt->execute();
			
			$subcat = $substmt->fetchall(PDO::FETCH_ASSOC);
			$category['subcat'] = $subcat;
		}
		
		return $categories;
	}
	
	public static function getSubCat($id){
		if($id){
			$stmt = DB::query("SELECT * FROM `subcategory` WHERE `sub_id`=$id LIMIT 1");
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
	}
	
	public static function getSubCatProducts($subcatID){
		if($subcatID){
			$stmt = DB::query("SELECT * FROM `product` WHERE `subcategory_id`=$subcatID");
			return $stmt->fetchall(PDO::FETCH_ASSOC);
		}
		
	}
	
	public static function getProduct($id){
		if($id){
			$stmt = DB::query("SELECT product.id, product.product_name as name, product.details, 
			product.price, product.date, subcategory.sub_id,subcategory.name as sub_name
			FROM product JOIN subcategory ON subcategory.sub_id=product.subcategory_id
			WHERE product.id=$id LIMIT 1;");
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
	}
	
	public static function getNewProducts(){
		
			$stmt = DB::query("SELECT * FROM `product` ORDER BY id DESC LIMIT 8");
			return $stmt->fetchall(PDO::FETCH_ASSOC);
		
		
	}
	
	public static function getUser($id){
		if($id){
			$stmt = DB::query("SELECT `users`.`id`,`users`.`name`,`users`.`username`,
									  `users`.`birthday`,`users`.`street`,`users`.`city`,
									  `users`.`province` 
							   FROM `users`
							   WHERE `users`.`id`=$id 
							   LIMIT 1;");
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
	}
	
	public static function adminAuth($username,$password){
		
	}
	
	public static function getOrder($dealer_id){
		$stmt = DB::query("select * from `orders` where `dealer_id`=$dealer_id Order by date DESC");
		return $stmt->fetchall(PDO::FETCH_ASSOC);
	}
	
	public static function getOrderDetails($order_id){
		$stmt = DB::query("select * from `order_items` where `order_id`=$order_id");
		return $stmt->fetchall(PDO::FETCH_ASSOC);
	}
	
	public static function getOrders($dealer_id){
		$orders = self::getOrder($dealer_id);
		foreach($orders as &$order){
			$detail = self::getOrderDetails($order['id']);
			$order['details'] = $detail;
		}
		return $orders;
	}
	
	public static function getOrderItem($id){
		$sql = "SELECT * FROM `order_items` where `id` = $id LIMIT 1";
		$stmt = DB::query($sql);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public static function insertOrderItem($cart, $order_id){
		$sql = "INSERT INTO `order_items`(`prod_id`, `prod_name`, `price`, `quantity`, `size`, `color`, `subtotal`, `order_id`)
				VALUES (:prod_id, :prod_name, :price,:quantity, :size, :color, :subtotal, :order_id)";
		$stmt = DB::prepare($sql);
		
		foreach($cart as $item){
			$data = array(
				'prod_id' => $item['id'],
				'prod_name' => $item['name'],
				'price' => $item['price'],
				'quantity' => $item['quantity'],
				'size' => $item['size'],
				'color' => $item['color'],
				'subtotal' => $item['subtotal'],
				'order_id' => $order_id
			);
			
			$stmt->execute($data);
		}
		return true;
	}
	
	public static function insertOrder($session){
		$dealer_id = $session['id'];
		$order_total = $session['cart_total'];
		$order_down = $session['cart_downpayment'];
		$cart = $session['cart'];
		$balance = $order_total;
		$insert = DB::exec("Insert into `orders`(`dealer_id`, `total`,`downpayment`, `balance`) 
								VALUES ('$dealer_id', '$order_total', '$order_down', '$balance')");
		$order_id = DB::lastInsertId();
		$success = self::insertOrderItem($cart, $order_id);
		return $success;
	}
	
	public static function updateOrderItem($id, $size,$color){
		$sql = "UPDATE `order_items` SET `size`=:size, `color`=:color where `id`=:id";
		$stmt = DB::prepare($sql);
		$data = array(
			'size' => $size,
			'color' => $color,
			'id' => $id
		);
		
		$stmt->execute($data);
	}
}


?>
