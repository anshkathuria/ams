 <?php
 session_start();
 if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' && isset($_GET["year"]))
 {
     include_once("inc/sections.php");
	 $year = $_GET["year"];
	 		 
	 ?>
     <option value="none" style="display:none" disabled selected>-- Section --</option>
     <?
	 foreach($sections[$year] as $no=>$sec)
	 {
		 if($_SESSION["role"]=="User" || false)
		 {	 
		 	 include_once("inc/dbconnect.php");
			 if($getSec = $mysqli->query("SELECT `section-$year` from `ams-users` WHERE uname='".$_SESSION["logged"]."'"))
			 {
			 	if($getSecObj = $getSec->fetch_assoc())
				{
					$sectionsAllowed = json_decode((string)$getSecObj["section-$year"]);
					
					if(in_array($no,$sectionsAllowed))
					{
					?>
					<option value="<?=$no ?>"><?=$sec ?></option>
					<?
					}
				}
			 }
		 }
		 else
		 {
		 
		  ?>
			<option value="<?=$no ?>"><?=$sec ?></option>
		  <? 
		 }
	 }
 }
 else
 {
	 echo "Forbidden :P";
 }
 ?>