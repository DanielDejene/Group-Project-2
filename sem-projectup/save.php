<?php
include('db.php');
function createRandomPassword() {
	$chars = "abcdefghijkmnopqrstuvwxyz023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {
		$num = rand() % 33;
		$tmp = substr($chars, $num, 1);
		$pass = $pass . $tmp;
		$i++;
	}
	return $pass;                    
}
$confirmation = createRandomPassword();
$fname=$_POST['fname'];
$qty=$_POST['qty'];
$lname=$_POST['lname'];
$busnum=$_POST['busnum'];
$setnum=$_POST['setnum'];
$date=$_POST['date'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$result = mysqli_query($conn,"SELECT * FROM route WHERE id='$busnum'");
while($row = mysqli_fetch_array($result))
	{
	$price=$row['price'];
	}
	$payable=$qty*$price;
mysqli_query($conn,"INSERT INTO customer (fname, lname, address, contact, bus, transactionum, payable, setnumber)
VALUES ('$fname', '$lname', '$address', '$contact', '$busnum', '$confirmation','$payable','$setnum')");
mysqli_query($conn,"INSERT INTO reserve (date, bus, seat_reserve, transactionnum, seat)
VALUES ('$date', '$busnum', '$qty', '$confirmation','$setnum')");
header("location: print.php?id=$confirmation&setnum=$setnum");
?>