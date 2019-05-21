<?php
session_start();
include 'comments.inc.php';
include '../db.php';


$id=$_POST['id'];
   echo "<form class='reply_form' method='POST' action='".replyComments($mysqli)."'>
		     <input type='hidden' name='id' value='".$id."'>
		     <textarea name='replyMessage' value=''></textarea>
		     <button type='submit' name='reply'>Done</button>
		 </form>";