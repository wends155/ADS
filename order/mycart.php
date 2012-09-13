<?php
session_start();
$id=2;//<---dependent from the database
$name='natasha';//<---dependent from the database
$q=2;//<---dependent from the user input
$p=900.30;//<---dependent from the database
$ord=array($id,$name,$q,$p,($q*$p));
addItem($ord);
//removeItem(0);
modifyItemValues(0,3);
showItems();
//savetoDb();
//clearCart();

//method for adding item/s on the cart...
function addItem($order=array()){

		if(is_array($_SESSION['cart'])){
			array_push($_SESSION['cart'], $order);
			echo count($_SESSION['cart'])." item/s added </br></br>";
		}
		else{
			$_SESSION['cart']=array();
			array_push($_SESSION['cart'], $order);
			echo count($_SESSION['cart'])." item/s added </br></br>";
		}
}
//method for querying items on the cart...
function showItems(){
	if(count($_SESSION['cart'])==0){
		echo "cart is empty";
	}
	else{
		$cart=$_SESSION['cart'];
		echo "<table border=1>";
		echo "<tr>";
		echo "<td>Product_id</td>";
		echo "<td>Product_name</td>";
		echo "<td>Product_quantity</td>";
		echo "<td>Product_price</td>";
		echo "<td>Total_price</td>";
		echo "</tr>";
		for($i=0;$i<count($cart);$i++){
			echo "<tr>";
			for($j=0;$j<count($cart[$i]);$j++){
				echo "<td>";
				echo $cart[$i][$j]." ";
				echo "</td>";
				if(is_double($cart[$i][$j])){
					$totalcartprice=$totalcartprice+$cart[$i][$j+1];
				}
			}
			echo "</tr>";
		}
		echo "cart_price: ".$totalcartprice;
		echo "</table>";
	}
	
}
//method for deleting item on the cart...
function removeItem($index){
	if(count($_SESSION['cart'])==0){
		echo "cart is empty nothing to delete";
	}
	else{
		unset($_SESSION['cart'][$index]);
		sort($_SESSION['cart']);
	}
}
//method for changing quantity on a particular selected item...
function modifyItemValues($index,$quantity){
	$_SESSION['cart'][$index][2]=$quantity;
	$_SESSION['cart'][$index][4]=$quantity*$_SESSION['cart'][$index][3];

}
//method for checking out the cart and save it to database...
function savetoDb(){
	try{
		$conn=new PDO('mysql:host=localhost;dbname=test','root','villacorta');
		$mycart=$_SESSION['cart'];
		for($i=0;$i<count($mycart);$i++){
			$id=$mycart[$i][0];
			$prod_name=$mycart[$i][1];
			$prod_quantity=$mycart[$i][2];
			$prod_price=$mycart[$i][3];
			$total_price=$mycart[$i][4];
			$sql="INSERT INTO cart VALUES('$id','$prod_name','$prod_quantity','$prod_price','$total_price');";
			if(!$conn->exec($sql)){
				echo "error";
			}
			else{
			}
		}
		echo "<script type='text/javascript'>alert('items on cart has been saved!!');</script>";
	}
	catch(PDOException $e){
		echo $e->getMessage;
	}
}
function clearCart(){
	unset($_SESSION['cart']);
}
?>