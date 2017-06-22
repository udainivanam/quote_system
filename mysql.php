<?php
ob_start();
				$host = 'students';
				$username = 'z1778595';
				$password = '1993Nov04';
				$db_name = 'z1778595';
class mysql{
		
			function verifyuserandpass($username, $password)
			{

				$conn= new mysqli('students', 'z1778595','1993Nov04','z1778595') or die('Problem connecting to database');
				if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
						  }	 
				
				$query= 'select * from sales_person where id= ? and password= ? limit 1';
                                echo "mysql";
		
				if ($stmt= $conn-> prepare($query)){
							$stmt -> bind_param('ss', $username, $password);
													$stmt -> execute();
				echo "hello";				
					}
													
				if ($stmt -> fetch()){
								      $stmt -> close();
									  return true;
									  }
}
}



