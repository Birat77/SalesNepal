<?php  

$id=@$_SESSION['id'];

function setComments($mysqli){
	if (isset($_POST['commentSubmit'])) {
		$id=$_SESSION['id'];
		$uid=$_POST['uid'];
		$date=$_POST['date'];
		$message=$_POST['message'];

		$sql="INSERT INTO comment(UserID, dates, message, productid) VALUES('$uid', '$date', '$message','$id')";
     	$result=$mysqli->query($sql);
	}	
}

function getComments($mysqli){
	$id=$_SESSION['id'];	
	$sql="SELECT * FROM comment WHERE productid='$id'";
	$result=$mysqli->query($sql);
	while ($row=$result->fetch_assoc()) {
		$id=$row['UserID'];
		$sql2="SELECT * FROM users WHERE UserID='$id'";
		$result2=$mysqli->query($sql2);
		if ($row2=$result2->fetch_assoc()) {
			echo "<div class='comment_box'><p>";
		    echo $row2['FirstName']."<br>";
		    echo $row['dates']."<br>";
		    echo nl2br($row['message']).'<br><br>';

		    if ($row['reply']!=NULL)
		    {

            echo "&nbsp &nbsp &nbsp &nbsp ADMIN".":".$row['reply'].'<br>';
		    echo "</p>";
		}
	
            	
            }   
		   
		    if ((isset($_SESSION['logged_in'])) && isset($_SESSION['userId'])) {
		    	if ($_SESSION['userId']==$row2['UserID']) {
		    		echo "
		    	   <form class='edit_form' method='POST' action='editComment.php'>
		              <input type='hidden' name='id' value='".$row['id']."'>
		              <input type='hidden' name='uid' value='".$row['UserID']."'>
		              <input type='hidden' name='date' value='".$row['dates']."'>
		              <input type='hidden' name='message' value='".$row['message']."'>
		              <button>Edit</button>
		           </form>
		           <form class='delete_form' method='POST' action='".deleteComments($mysqli)."'>
		              <input type='hidden' name='id' value='".$row['id']."'>
		              <button type='submit' name='deleteComment'>Delete</button>
		           </form>";
		    	}elseif ($_SESSION['role']=='SUBADMIN') echo "
		    	    <form class='edit_form' method='POST' action='replyComment.php'>
		              <input type='hidden' name='id' value='".$row['id']."'>
		              <button type='submit' name='replyComment'>Reply</button>
		           </form>";  
		    } 
		    echo"</div>";	      
		}
		
	}        
           


function editComments($mysqli){
	if (isset($_POST['editSubmit'])) {
		$ids=$_SESSION['id'];
		$id=$_POST['id'];
		$uid=$_POST['uid'];
		$date=$_POST['date'];
		$message=$_POST['message'];
		$sql="UPDATE comment SET message='$message' WHERE id='$id'";
		$result=$mysqli->query($sql);
		header("Location: info.php?id=$ids");
	}
}

function deleteComments($mysqli){

	if (isset($_POST['deleteComment'])) {
		$ids=$_SESSION['id'];
		$id=$_POST['id'];
		$sql="DELETE FROM comment WHERE id='$id'";
		$result=$mysqli->query($sql);
		header("Location: info.php?id=$ids");
	}
}
/*
function userLogin($mysqli){
	if (isset($_POST['loginSubmit'])) {
		$uid=$_POST['uid'];
		$password=$_POST['password'];
		$sql="SELECT * FROM user WHERE uid='$uid' AND password='$password'";
		$result=$mysqli->query($sql);
		if (mysqli_num_rows($result) > 0) {
			if ($row = $result->fetch_assoc()) {
				$_SESSION['id']=$row['id'];
				$_SESSION['uid']=$row['uid'];
				header("Location: commentsection.php?loginSuccess");
				exit();
			}
		}else{
			header("Location: commentsection.php?loginFailed");
			exit();
		}
	}
}
*/


function userLogout(){
	if (isset($_POST['logoutSubmit'])) {
		session_destroy();
		header("Location: commentsection.php");
		exit();
		
	}
}

function replyComments($mysqli){

	if (isset($_POST['reply'])) {
		$ids=$_SESSION['id'];
		$replyMessage=$_POST['replyMessage'];
        $id=$_POST['id'];
		$sql="UPDATE comment set reply='$replyMessage' WHERE id='$id'";
		$query="SELECT * FROM comment WHERE id='$id'";
		$fetch=$mysqli->query($query);
		

		header("Location:info.php?id=$ids");

	}

}