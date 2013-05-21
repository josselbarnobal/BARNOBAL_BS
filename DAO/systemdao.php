<?php
	
include "basedao.php";

class systemdao extends basedao {

	function logIn($accountname,$accountpassword){
      	
        $this->openConn();
                  		
            $stmt = $this->dbh->prepare("SELECT accountname,accountpassword FROM account");
            $stmt->execute();
                  
		  $found = false;   		
                  while($row = $stmt->fetch()){
                     if($row[0] == $accountname && $row[1] == $accountpassword ){
                        $found = true;
                        
                     }
                    
                  }	
                  										
          $this->closeConn();
          return $found;
              }
	function register($firstname,$lastname,$accountname,$accountpassword,$accountpassword2){

		$this->openConn();
            $stmt = $this->dbh->prepare("INSERT INTO account(firstname, lastname, accountname, accountpassword, accountpassword2)VALUES(?,?,?,?,?)");
		$stmt->bindParam(1, $firstname);
		$stmt->bindParam(2, $lastname);
		$stmt->bindParam(3, $accountname);
		$stmt->bindParam(4, $accountpassword);
		$stmt->bindParam(5, $accountpassword2);
		$stmt->execute();
	        $this->closeConn();


}
//=====================================================================Depositor====================================================================================
function viewDepositors(){
		
			$this->openConn();
			
			$stmt = $this->dbh->prepare("SELECT * FROM depositor");
			$stmt->execute();

			while($row = $stmt->fetch()){
				echo "<tr id=".$row[0].">";
					echo "<td>".$row[0]."</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[4]."</td>";
					echo "<td><img class='delete' src='css/images/delete.png' onclick='deleteDepositor(".$row[0].")'/>";
					echo "<img class='edit' src='css/images/edit.jpeg' onclick='editDepositor(".$row[0].")'/></td>";
				echo "</tr>"; 
			}

			
			$this->closeConn();
 
		}


		function addDepositor($depositorname, $address, $occupation, $contactnumber){
			
			$this->openConn();
	
			$stmt = $this->dbh->prepare("INSERT INTO depositor (depositorname,address,occupation,contactnumber)VALUES(?,?,?,?)");
			$stmt->bindParam(1, $depositorname);
			$stmt->bindParam(2, $address);
			$stmt->bindParam(3, $occupation);
			$stmt->bindParam(4, $contactnumber);
			$stmt->execute();
			$depositor_id = $this->dbh->lastInsertId();
				echo "<tr id = ".$depositor_id.">";
					echo "<td>".$depositor_id."</td>";
					echo "<td>".$depositorname."</td>";
					echo "<td>".$address."</td>";
					echo "<td>".$occupation."</td>";
					echo "<td>".$contactnumber."</td>";
					echo "<td><img class='delete' src='css/images/delete.png' onclick='deleteDepositor(".$depositor_id.")'/>";
					echo "<img class='edit' src='css/images/edit.jpeg' onclick='editDepositor(".$depositor_id.")'/></td>";
				echo "</tr>";
			$this->closeConn();

			 
		}

		function deleteDepositor($depositor_id){
			
			$this->openConn();

			$stmt = $this->dbh->prepare("DELETE FROM depositor WHERE depositor_id = ?");
			$stmt->bindParam(1, $depositor_id);
			$stmt->execute();
	
			$this->closeConn();	
		}

		function retrieve($depositor_id){

			$this->openConn();

			$stmt = $this->dbh->prepare("SELECT * FROM depositor WHERE depositor_id = ?");
			$stmt->bindParam(1, $depositor_id);
			$stmt->execute();
		
			$row = $stmt->fetch();
			
			$depositor = array("depositor_id"=>$row[0], "depositorname"=>$row[1], "address"=>$row[2], "occupation"=>$row[3], "contactnumber"=>$row[4]);

			$json_string = json_encode($depositor);			
 
			echo $json_string;

			$this->closeConn();	
		}

		function saveDepositor($depositor_id, $depositorname, $address, $occupation, $contactnumber){
			$this->openConn();
	
			$stmt = $this->dbh->prepare("UPDATE depositor SET depositorname = ?, address = ?, occupation = ?, contactnumber = ? WHERE depositor_id = ?");
			$stmt->bindParam(1, $depositorname);
			$stmt->bindParam(2, $address);
			$stmt->bindParam(3, $occupation);
			$stmt->bindParam(4, $contactnumber);
			$stmt->bindParam(5, $depositor_id);
			$stmt->execute();
 
			$this->closeConn();
	 			
					echo "<td>".$depositor_id."</td>";
					echo "<td>".$depositorname."</td>";
					echo "<td>".$address."</td>";
					echo "<td>".$occupation."</td>";
					echo "<td>".$contactnumber."</td>";
					echo "<td><img class='delete' src='css/images/delete.png' onclick='deleteDepositor(".$depositor_id.")'/>";
					echo "<img class='edit' src='css/images/edit.jpeg' onclick='editDepositor(".$depositor_id.")'/></td>";
				
		}
		
		

//===================================================================Records=================================================================
function viewRecords(){
		
			$this->openConn();
			
			$stmt = $this->dbh->prepare("SELECT * FROM records");
			$stmt->execute();

			while($row = $stmt->fetch()){
				echo "<tr  id=".$row[0].">";
					echo "<td>".$row[0]."</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[4]."</td>";
					echo "<td>".$row[5]."</td>";
					echo "<td>".$row[6]."</td>";
					echo "<td><img class='delete' src='css/images/delete.png' onclick='deleteRecords(".$row[0].")'/>";
					echo "<img class='edit' src='css/images/edit.jpeg' onclick='editRecords(".$row[0].")'/></td>";
				echo "</tr>"; 
			}

			
			$this->closeConn();
 
		}


		function addRecords($depositor_id, $deposits, $date_of_deposits, $withdrawals, $date_of_withdrawals, $balance){
			
			$this->openConn();
	
			$stmt = $this->dbh->prepare("INSERT INTO records (depositor_id, deposits, date_of_deposits, withdrawals, date_of_withdrawals, balance)VALUES(?,?,?,?,?,?)");
			$stmt->bindParam(1, $depositor_id);
			$stmt->bindParam(2, $deposits);
			$stmt->bindParam(3, $date_of_deposits);
			$stmt->bindParam(4, $withdrawals);
			$stmt->bindParam(5, $date_of_withdrawals);
			$stmt->bindParam(6, $balance);
			$stmt->execute();
			$id = $this->dbh->lastInsertId();
				echo "<tr id=".$id.">";
					echo "<td>".$id."</td>";
					echo "<td>".$depositor_id."</td>";
					echo "<td>".$deposits."</td>";
					echo "<td>".$date_of_deposits."</td>";
					echo "<td>".$withdrawals."</td>";
					echo "<td>".$date_of_withdrawals."</td>";
					echo "<td>".$balance."</td>";
					echo "<td><img class='delete' src='css/images/delete.png' onclick='deleteRecords(".$id.")'/>";
					echo "<img class='edit' src='css/images/edit.jpeg' onclick='editRecords(".$id.")'/></td>";
				echo "</tr>";
			$this->closeConn();

			 
		}

		function deleteRecords($id){
			
			$this->openConn();

			$stmt = $this->dbh->prepare("DELETE FROM records WHERE id = ?");
			$stmt->bindParam(1, $id);
			$stmt->execute();
	
			$this->closeConn();	
		}

		function retrieve_records($id){

			$this->openConn();

			$stmt = $this->dbh->prepare("SELECT * FROM records WHERE id = ?");
			$stmt->bindParam(1, $id);
			$stmt->execute();
		
			$row = $stmt->fetch();
			
			$names = array("id"=>$row[0], "depositor_id"=>$row[1], "deposits"=>$row[2],"date_of_deposits"=>$row[3], "withdrawals"=>$row[4],"date_of_withdrawals"=>$row[5], "balance"=>$row[6]);

			$json_string = json_encode($names);			
 
			echo $json_string;

			$this->closeConn();	
		}

		function saveRecords($id, $depositor_id, $deposits, $date_of_deposits, $withdrawals, $date_of_withdrawals, $balance){
			$this->openConn();
	
			$stmt = $this->dbh->prepare("UPDATE records SET depositor_id = ?, deposits = ?, date_of_deposits = ?, withdrawals = ?, date_of_withdrawals = ?, balance = ? WHERE id = ?");
			$stmt->bindParam(1, $depositor_id);
			$stmt->bindParam(2, $deposits);
			$stmt->bindParam(3, $date_of_deposits);
			$stmt->bindParam(4, $withdrawals);
			$stmt->bindParam(5, $date_of_withdrawals);
			$stmt->bindParam(6, $balance);
			$stmt->bindParam(7, $id);
			$stmt->execute();
 
			$this->closeConn();
	 	
					echo "<td>".$id."</td>";
					echo "<td>".$depositor_id."</td>";
					echo "<td>".$deposits."</td>";
					echo "<td>".$date_of_deposits."</td>";
					echo "<td>".$withdrawals."</td>";
					echo "<td>".$date_of_withdrawals."</td>";
					echo "<td>".$balance."</td>";
					echo "<td><img class='delete' src='css/images/delete.png' onclick='deleteRecords(".$id.")'/>";
					echo "<img class='edit' src='css/images/edit.jpeg' onclick='editRecords(".$id.")'/></td>";
				
		}
		
		function searchRecords($id){
				 $this->openConn();
                                
                          $stmt =$this->dbh->prepare("SELECT * FROM records WHERE id = ?");
                              	$stmt->bindParam(1, $id);
                                 $stmt->execute();
				$row = $stmt->fetch();
                                               
                                		
                                
					if($row=='' || $row==null ){
						echo "<tr>";	
                				echo "<td colspan='10'>nO lIST FouNd</td>";
			        		echo "</tr>";	
						
							}else{
								echo "<tr>";
									echo "<td>".$id."</td>";
									echo "<td>".$row[1]."</td>";
									echo "<td>".$row[2]."</td>";
									echo "<td>".$row[3]."</td>";
									echo "<td>".$row[4]."</td>";
									echo "<td>".$row[5]."</td>";
									echo "<td>".$row[6]."</td>";
									echo "<td><img class='delete' src='css/images/delete.png' onclick='deleteRecords(".$id.")'/>";
					echo "<img class='edit' src='css/images/edit.jpeg' onclick='editRecords(".$id.")'/></td>";
								 
								}
		                 
                                $this->closeConn();

			}
						
//==============================================TRanSacTioN========================================================

function viewTransaction(){
		
			$this->openConn();
			
			$stmt = $this->dbh->prepare("SELECT depositorname, deposits, date_of_deposits, 
			withdrawals, date_of_withdrawals, balance 
			FROM records as r , depositor as d 
			WHERE d.depositor_id = r.depositor_id;");
			$stmt->execute();

			while($row = $stmt->fetch()){
				echo "<tr>";
					echo "<td>".$row[0]."</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[4]."</td>";
					echo "<td>".$row[5]."</td>";
				echo "</tr>"; 
			}

			
			$this->closeConn();
 
		}
function search($depositor_id){
	 		 $this->openConn();
                              
                        $stmt =$this->dbh->prepare("SELECT * FROM records WHERE depositor_id = ?"); 	
			
			$stmt->bindParam(1, $depositor_id);
		        $stmt->execute();
		        		
		        		echo "<tr>
		        			<td>Depositor Id</td>
						<td>Deposits</td>
						<td>Date of Deposits</td>
						<td>Withdrawals</td>
						<td>Date of Withdrawals</td>
						<td>Total Balance</td>
		        		     </tr>";
		        		
		        		
		        
			while($row = $stmt->fetch()){
					
					
						echo "<tr>";
						echo "<td>".$row[1]."</td>";
						echo "<td>".$row[2]."</td>";
						echo "<td>".$row[3]."</td>";
						echo "<td>".$row[4]."</td>";
						echo "<td>".$row[5]."</td>";
						echo "<td>".$row[6]."</td>";
						echo "</tr>";
					
				}
		                 
                            $this->closeConn();

		}


			
}		

?>
