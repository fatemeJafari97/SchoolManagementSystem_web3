<?php
require_once("connection.php");

class crud extends db{
	
	public $query;
	
	function __construct(){
		
		
	}
	
	
	public function insert($table,$attribute,$values,$c){	
	$this->query="insert into $table ($attribute) values ($values)";
	mysqli_query($c,$this->query);	
	}
	
	public function select($table,$attribute,$condation,$c){
		
		$this->query="select $attribute from $table $condation";
		$rows;
		$rs=mysqli_query($c,$this->query);
		
		while($row=mysqli_fetch_assoc($rs)){
		
			$rows[]=$row;
		}
		return $rows;
	}
		
	
	function update($table,$value,$condation,$c){
		
		$this->query="update $table set $value $condation";
	    mysqli_query($c,$this->query);	
	}
	
   function	delete($table, $condition,$c){
	  $this->query="delete from $table where $condition";
      mysqli_query($c,$this->query);	  
   }
	
	
	
}



