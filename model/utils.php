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
	
}

?>
