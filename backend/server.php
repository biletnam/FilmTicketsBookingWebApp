<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dberror1 = "Couldn't connect to database!";
 $con = mysql_connect($dbhost,$dbuser,$dbpass) ;//or die ($dberror1);

if($con == true){ echo "Localhost Connected!<br />";}
$select_db = mysql_select_db('mysql') or die("Couldn't select database!<br />");
$query = "select * from users where "
$create_ticket = "create database ticket";
if(mysql_query($create_ticket)){
	echo "ticket created!";
}else{
	echo "ticket error!";
}

//choose ticket database
mysql_select_db("ticket") or die("Couldn't select database!<br />"); 

//insert some data
$insert = "insert into avatar1 (SeatStatus,BuyerName) values(1,'Haoran') WHERE Avatar1=1";
$select = "select * from avatar1 where Avatar1=1";
$update1 = "update avatar2 set BuyerName='haoran_2' WHERE Avatar2=1";
$update2 = "update avatar2 set SeatStatus=1 WHERE Avatar2=1";
if(mysql_query($update1)==true){
	echo "Insert succeeded.";
}else{
	echo "Insert failed: " . mysql_error();
}
// return the selected information
$retseat = "select Avatar1 from avatar1 where SeatStatus=1";
if(mysql_query($retseat)==true){
	// echo "Seat Succeeded.";
	$resultseat = mysql_query($retseat);//echo $resultseat;
	$toHtml2 = "";
	while($row = mysql_fetch_array($resultseat)){
		$toHtml = $row['Avatar1'] ."_";
		$toHtml2 = $toHtml2 . $row['Avatar1'] . "_";
		
	}
	echo "<br/>" . $toHtml2 . "<br/>";
	$row1 = mysql_fetch_array($resultseat);
	$elenum = array_count_values($row1);
	echo $elenum;
	echo $toHtml;	
}else{
	echo "Seat Failed: " . mysql_error();
}

$t = 3;  //echo $t1;
if ($t1 = "avatar1"){ echo "equal"; }
$allinfo = "";
$request = "account";
echo alert(typeof($allfilmseat));

$data = json_decode($GLOBALS['HTTP_RAW_POST_DATA']);
$obj = json_decode($data);
mixed json_decode ( string $json [, bool $assoc = false [, int $depth = 512 [, int $options = 0 ]]] )

if ($data->ty == "account"){

	checkAccount($data->account);
	
} elseif ($data->ty == "room"){
	checkRoom($data->room);
}elseif ($data->ty == "reserve"){
	updateTicket($data->room,$data->seat,$data->name);
}

 
 // checkAccount();

function checkAccount($getBuyer){
	// $getBuyer = $data->account;
	error_log($getBuyer); 
	$film = "";
	$filmseat = "";
	$filmseattmp = "";
	$allfilmseat = "";
	
	$table1 = "spiderman1";$table2 = "startrek1";$table3 = "ironman1";$table4 = "thord1";
	$Table1 = "Spiderman1";$Table2 = "Startrek1";$Table3 = "Ironman1";$Table4 = "Thord1";
	
	for($t=1; $t<=4; $t++){
		switch($t){
			case 1: $t1 = $table1; $t2 = $Table1; break;
			case 2: $t1 = $table2; $t2 = $Table2; break;
			case 3: $t1 = $table3; $t2 = $Table3; break;
			case 4: $t1 = $table4; $t2 = $Table4; break;
			// default: echo "Not Any Case.";
		}
		error_log(gettype($t2));
	$t1 = "table".$t; $t2 = "Table".$t;
	$selectid = "select $t2 from $t1 where BuyerName='$getBuyer'";
	$resultall = mysql_query($selectid);
	$film = $t;
		while($rowall = mysql_fetch_array($resultall)){
			$filmseat = $filmseat . $rowall[$t2] . "_";
		}
	$filmseattmp = $film ."_".$filmseat;
	echo $filmseat ."<br/>";
	$allfilmseat = $filmseat . "&"; 
	if($t=1){
		$allfilmseat = $filmseattmp ."&";	
	}else{
	$allfilmseat = $allfilmseat . $filmseattmp ."&";
	//}
	$filmseat = "";
	$filmseattmp = "";
	}
	echo json_encode(array("name"=>"1","seats"=>$allfilmseat));
	error_log($allfilmseat);
}

//checkRoom();
//
function checkRoom($roomNum){

	$room = "spiderman1";

	$film = "";
	$filmseat = "";
	$filmseattmp = "";
	$allfilmseat = "";
	
	$table1 = "spiderman1";$table2 = "startrek1";$table3 = "ironman1";$table4 = "thord1";
	$Table1 = "Spiderman1";$Table2 = "Startrek1";$Table3 = "Ironman1";$Table4 = "Thord1";

	//for($t=1; $t<=4; $t++){
		switch($roomNum){
			case "1": error_log("spider"); $t1 = $table1; $t2 = $Table1; break;
			case "2": $t1 = $table2; $t2 = $Table2; break;
			case "3": $t1 = $table3; $t2 = $Table3; break;
			case "4": $t1 = $table4; $t2 = $Table4; break;
			//default: echo "Not Any Case.";
		}
	//$t1 = "table".$t; $t2 = "Table".$t;
	$selectid = "select $t2 from $t1 where SeatStatus=1";
	$resultall = mysql_query($selectid);
	//$film = $t;
		while($rowall = mysql_fetch_array($resultall)){
			$filmseat = $filmseat . $rowall[$t2] . "_";
		}
	$filmseattmp = $film ."_".$filmseat;
	echo $filmseat ."<br/>";
	$allfilmseat = $filmseat . "&"; 
	if($t=1){
		$allfilmseat = $filmseattmp ."&";	
	}else{
	$allfilmseat = $allfilmseat . $filmseattmp ."&";
	}
	$filmseat = "";
	$filmseattmp = "";
	}
	echo $filmseat;
	error_log($filmseat);
	echo json_encode(array("name"=>"1","seats"=>$filmseat));
}

// Ticket();
//
// updateTicket();
function updateTicket($updateFilm,$updateId,$updateName){
	$updateId = 4;
	$updateName = 'haoran';
	$updateFilm = 'spiderman1';
	$updatePkcol = 'Spiderman1';
	$intId = intval($updateId);
	$table1 = "spiderman1";$table2 = "startrek1";$table3 = "ironman1";$table4 = "thord1";
	$Table1 = "Spiderman1";$Table2 = "Startrek1";$Table3 = "Ironman1";$Table4 = "Thord1";
	
	switch($updateFilm){
			case "1": $t1 = $table1; $t2 = $Table1; break;
			case "2": $t1 = $table2; $t2 = $Table2; break;
			case "3": $t1 = $table3; $t2 = $Table3; break;
			case "4": $t1 = $table4; $t2 = $Table4; break;
			//default: echo "Not Any Case.";
	}

	$updateDB1 = "update $t1 set BuyerName='$updateName' WHERE $t2=$intId";
	$updateDB2 = "update $t1 set SeatStatus=1 WHERE $t2=$intId";
	if(mysql_query($updateDB1)==true){
		echo "name.";
	}else{
		echo "Update: " . mysql_error();
	}
	mysql_query($updateDB1);
	mysql_query($updateDB2);
	if (mysql_query($updateDB2)==true) {
		echo "seat.";
	}else{
		echo "Update: " . mysql_error();
	}
		echo "seat."
	}else{
		echo "Can't update: " . mysql_error();
	}
}


Update Single Value Into Table.

$tablename = "spiderman1";
$pkcol = "Spiderman1";
$idval = 2;
$updateBuyer = "update $tablename set BuyerName='haoran' WHERE $pkcol = $idval";
$updateSeat = "update $tablename set SeatStatus=1 WHERE $pkcol = $idval";
if(mysql_query($updateBuyer)==true){
if(mysql_query($updateSeat)==true){	
	echo "$tablename Udpated";
}else{
	echo "Could not update $tablename: " . mysql_error();
}

if(mysql_query($selectall)==true){
	echo "select all ok";
	echo mysql_query($selectall);
}

Test Table
$ticket_table = "create table test1(
	rowid int(5),
	rowinfo int(2))";
if(mysql_query($ticket_table)==true){
	echo "table crated!";
}else{
	echo "Couldn't create table: " . mysql_error(); 
	echo "<br />";
}
insert value(10，0)
$insert_seat = "insert into test1 values(10,0)";
if(mysql_query($insert_seat)==true){
	echo "<br/>row inserted!<br />";
}


For Creating Table.
$avatar4 = "create table thord1(
 	Thord1 int not null,
 	primary key(Thord1),
 	SeatStatus int(2),
 	BuyerName varchar(20))";

if(mysql_query($avatar4)==true){
	echo "avatar1 crated!";
}else{
	echo "Couldn't create avatar1: " . mysql_error(); 
	echo "<br />";
}

For Insert Values Into Table.
for($i=1; $i<=100; $i++){
	if(mysql_query("insert into startrek1 values($i,0,'')")){
		echo "~";
	}else{
		echo "Couldn't insert rows: " . mysql_error();
	}
}



$data = "select * from avatar4 where Avatar4 = 4";
if(mysql_query($data)==true){
	$result = mysql_query($data);
	$row = mysql_fetch_array($result);
	echo "<br/>Select Seccueeded!<br/>";
	echo $row['Avatar4'] . " " . $row['SeatStatus']. " " . $row['BuyerName'];
}else{
	echo "Couldn't select form avatar4: " . mysql_error();
}

$insert = "insert into avatar4 (BuyerName) values ('Haoran')";
$delete = "delete from avatar4 where BuyerName = 'Haoran'";
if(mysql_query($delete)==true){
	echo "OK insert.";
}else{
	echo "Not OK insert.";
}

$data = json_decode($GLOBALS['HTTP_RAW_POST_DATA']);
$var1 = gettype($data);
echo json_encode(array("name"=>"1","seats"=>$allfilmseat));

?>

