<?php
include 'config.php';
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 if($con)
{
echo"Success";
}
$json_array = $_POST['json_array'];
$data=json_decode($json_array, true); 
//print_r($data); //exit;
foreach($data as $s)
{
	foreach($s as $key=>$value)
	{		$bill_no=$s['bill_no'];
			$item_name= $s['item_name'];
			$item_qty = $s['item_qty'];
			$item_rate = $s['item_rate'];
			$item_totalrate = $s['item_totalrate'];
			$is_active = 0;
			$lid = $s['lid'];
			$cid = $s['cid'];
			$emp_id = $s['emp_id'];
			$android_bill_id = $s['android_bill_id'];
			$bill_code = $s['bill_code'];
		
			if($lid == 'null'){
				$Sql_Query = "insert into bil_AddBillDetail (bill_no,item_name,item_qty,item_rate,item_totalrate,isactive,cid,emp_id,android_bill_id,bill_code) values ('$bill_no','$item_name','$item_qty','$item_rate','$item_totalrate','$is_active','$cid','$emp_id','$android_bill_id','$bill_code') ON DUPLICATE KEY UPDATE android_bill_id='$android_bill_id',bill_no='$bill_no',item_name='$item_name',item_qty='$item_qty',item_rate='$item_rate',item_totalrate='$item_totalrate',isactive='$is_active',cid='$cid',emp_id='$emp_id',bill_code='$bill_code'";
				$Stock_sql_query = "UPDATE `bil_AddItems` SET `item_stock`=(`item_stock` - $item_qty) WHERE item_name='$item_name' and cid='$cid'";
			}else{
				$Sql_Query = "insert into bil_AddBillDetail (bill_no,item_name,item_qty,item_rate,item_totalrate,isactive,lid,cid,emp_id,android_bill_id,bill_code) values ('$bill_no','$item_name','$item_qty','$item_rate','$item_totalrate','$is_active','$lid','$cid','$emp_id','$android_bill_id','$bill_code') ON DUPLICATE KEY UPDATE android_bill_id='$android_bill_id',bill_no='$bill_no',item_name='$item_name',item_qty='$item_qty',item_rate='$item_rate',item_totalrate='$item_totalrate',isactive='$is_active',lid='$lid',cid='$cid',emp_id='$emp_id',bill_code='$bill_code'";
				$Stock_sql_query = "UPDATE `bil_AddItems` SET `item_stock`=(`item_stock` - $item_qty) WHERE item_name='$item_name' and cid='$cid' and lid='$lid'";
			}
		
//echo $Sql_Query;
//$insert_result= mysqli_query($con,$Sql_Query);
//echo $insert_result;			
	}
	if(mysqli_query($con,$Sql_Query)){
 
	if(mysqli_query($con,$Stock_sql_query)){
	echo 'Data Inserted Successfully';
}else{
	echo 'Data Not Updated';
}
 
 }
 else{
 	echo 'Try Again';
 
 }	
}
?>
