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
	
}

?>
