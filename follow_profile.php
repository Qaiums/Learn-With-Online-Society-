<?php
			session_start();

			require("oracle_to_json.php");
		    $v=$_SESSION['email'];
			$v1=$_SESSION['pass'];
			$v2=$_SESSION['user_id'];
		    $com_users_id= $_POST['follow_users_id'];
		
			$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE USER_ID = '".$com_users_id."'");
			//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
			//echo $jsonData;
			$jsn=json_decode($jsonData,true);

			for($i=0;$i<sizeof($jsn);$i++) {

		    $public_user_id=$jsn[$i]['USER_ID'] ;
?>	

<!DOCTYPE html PUBLIC>
<html xmlns="">
<head>
<meta/>
<title>Learn with online society</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header_panel">
	<div id="header_section">
    	<div id="title_section">Learn With Online Society</div>
        <div id="tagline">about my website</div>
    </div>
</div>
<div id="menu_panel">
    <div id="menu_section">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="profile.php" >Profile</a></li>
            <li><a href="follower.php" >Follower</a></li>            
            <li><a href="following.php" >Following</a></li>  
            <li><a href="aboutus.php" >About Us</a></li> 

            <li><a href="logout.php" >Logout</a></li>  
   <!--<li><a href="registration.php" >Register</a></li> -->                     
        </ul> 
    </div>
</div>
<!-- colum 1-->
<div id="content">

	<div id="content_column_one">
    	<div class="column_one_section">
        	<div style="font-size:20px;font-weight: bold;color:white;">Categories</div><br><br>
            <p>
         	<input id="oracle" type="radio" onchange="loadDoc(this.value)" name="category" value="<?php echo "Oracle" ?>"> Oracle <br><br>
        	<input id="php" type="radio" onchange="loadDoc(this.value)" name="category" value="PHP"> PHP <br><br>
        	<input id="java" type="radio" onchange="loadDoc(this.value)" name="category" value="Java"> Java <br><br>
        	<input id="Csharp" type="radio" onchange="loadDoc(this.value)" name="category" value="Csharp"> C# <br><br>  
        	<input id="Csharp" type="radio" onchange="loadDoc(this.value)" name="category" value="Cplus"> C++<br><br>
        	<input id="other" type="radio" onchange="loadDoc(this.value)" name="category" value="<?php echo "Other" ?> "> Other </p> 
           
             
        </div>

      
			<script>
					   function loadDoc(category) {
						
					   var xhttp = new XMLHttpRequest();
					   xhttp.onreadystatechange = function() {
					    if (this.readyState == 4 && this.status == 200) {
					      document.getElementById("content_column_two").innerHTML = this.responseText;
					     }
					   };
					   xhttp.open("GET", "categori_ajax.php?category="+category, true);
					   xhttp.send();
					   }

			</script>
        <div class="cleaner_with_divider">&nbsp;</div>
 
    </div>

    <!-- end of column one -->
    
   	<div id="content_column_two">
    
  		 <div class="column_two_section">
  		    <br>

			<h1><center><?php echo $jsn[$i]['USER_NAME'];?>'s Profile</center></h1>
           
<!-- Follow  -->

			<?php 
	

		$jsonFol= getJSONFromDB("SELECT * FROM FOLLOW where FOLLOWING_USER_ID = '".$public_user_id."' AND FOLLOWER_USER_ID = '".$v2."'");

		$jsnFol=json_decode($jsonFol,true);

			if ($_SESSION['user_id'] <> $public_user_id) {

							 ?>

                         <!--

								<div id="follow" >

									 <form action="follow.php" method="post">
									<input  name="follow" value="<?php echo $public_user_id;?>" hidden="follow">
									<input class="button"  type="submit" value="Follow">
							    	 </from>

							    	 <script type="text/javascript">
						  			document.getElementById("follow").style.visibility="hidden";
						  			
		    </script>

							    </div> -->

            <div id=follow >
				<button type="button" id="follow" name="follow" class="button" onclick="followF(this.value)" value="

				<?php echo $public_user_id;?>" >follow</button> 

								<script type="text/javascript">
												    function followF(follow) {
													var xhttp = new XMLHttpRequest();
													xhttp.onreadystatechange = function() {
	 												   if (this.readyState == 4 && this.status == 200) {
	  												    document.getElementById("follow").innerHTML = this.responseText;
	  												  }
	 												};
													xhttp.open("GET", "follow.php?follow="+follow, true);
													xhttp.send();
													}

								</script>
			</div>	

	<?php 

					  if ($jsnFol)
							  
							  { 
						  			 ?>

						  			<!-- MAKING HIDE INVISIBLE BY JAVA SCRIPT -->

						  			<script type="text/javascript">
						  			document.getElementById("follow").style.visibility="hidden";
						  			</script>


						  		    <div id=follow >
						  		    <button type="button" id="unfollow" name="unfollow" class="button" onclick="unfollowF(this.value)" value="

						  			<?php echo $public_user_id;?>" >unfollow</button> 

									<script type="text/javascript">
													    function unfollowF(unfollow) {
														  var xhttp = new XMLHttpRequest();
														  xhttp.onreadystatechange = function() {
		 												  if (this.readyState == 4 && this.status == 200) {
		  												  document.getElementById("unfollow").innerHTML = this.responseText;
		  												   }
		 												  };
														  xhttp.open("GET", "unfollow.php?unfollow="+unfollow, true);
														  xhttp.send();
														}

									</script>
											</div>			

											<?php 	
							 		 }
		   
						}			

		

	 //$jsonData= getJSONFromDB("SELECT * FROM post_tab WHERE POST_TYPE='public'");

		
		 /*	$jsnFol=json_decode($jsonFol,true);

			for($f=0;$f<sizeof($jsnFol);$f++) {


					
					if ($_SESSION['user_id'] <> $com_users_id )
						{
							if($jsnFol[$f]['IS_ACTIVE']=0)
							{
						
						   ?>	<form action="">
							
							<input type="button" name="follow" value="" hidden="follow">
							<input class="button"  type="submit" value="Follow">

								</form>
							<?php 	
							}
							else
							{
								 ?> 
								 <from>
							<input type="button" name="follow" value="" hidden="follow">
							<input class="button"  type="submit" value="Unfollow">
							     </from>

								 <?php
							}


					 } }  

			<p>
				<tr>
	                    <td><p> Profile Picture : &nbsp &nbsp
	                    <?php //echo $jsn[$i]['PRO_PIC'];  ?>
	                    <img width="100px" height="100px" src="<?php echo $jsn[$i]['PRO_PIC'];  ?>">
	                     </p> </td>
	           </tr>
	           <br>
				<tr>
	                    <td><p>  Name :  &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
	                    <?php echo $jsn[$i]['FULL_NAME'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>  User Name : &nbsp  &nbsp&nbsp &nbsp

	                    <?php echo $jsn[$i]['USER_NAME'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	            <tr>
	                    <td><p>  Email Address :&nbsp &nbsp
	                    <?php echo $jsn[$i]['EMAIL'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>  Mobile Number :&nbsp 
	                    <?php echo $jsn[$i]['MOBILE'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>  Date of Birth : &nbsp &nbsp
	                    <?php echo $jsn[$i]['DOB'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>Gender : &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp 
	                    <?php echo $jsn[$i]['GENDER'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>Address : &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
	                    <?php echo $jsn[$i]['ADDRESS'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>Country : &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
	                    <?php echo $jsn[$i]['COUNTRY'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>State : &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
	                    <?php echo $jsn[$i]['CITY'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>User Number : &nbsp 
	                    <?php echo $jsn[$i]['USER_ID'];  

	                    $user_id=$jsn[$i]['USER_ID'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
           </p>

           <br><br>  */ ?>


<table border="1" width = "87%" style="color: white;">
      <tr>
        <td height="50" colspan = "2" align="center">
          <b>PERSON PROFILE</b>
        </td>
      </tr>

      <tr>
        <td>Photo</td>
        <td>
          <img width="100px" height="100px" src="<?php echo $jsn[$i]['PRO_PIC'];  ?>">
        </td>
      </tr>
      <tr>
        <td>Name</td>
        <td>
           <?php echo $jsn[$i]['FULL_NAME'];  ?>
        </td>
      </tr>
      <tr>
        <td>UserName</td>
        <td>
           <?php echo $jsn[$i]['USER_NAME'];  ?>
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td>
           <?php echo $jsn[$i]['EMAIL'];  ?>
        </td>
      </tr>
      <tr>
        <td>Mobile </td>
        <td>
          <?php echo $jsn[$i]['MOBILE'];  ?>
        </td>
      </tr>
      <tr>
        <td>DOB</td>
        <td>
           <?php echo $jsn[$i]['DOB'];  ?>
        </td>
      </tr>
      <tr>
        <td>Gender</td>
        <td>
           <?php echo $jsn[$i]['GENDER'];  ?>
        </td>
      </tr>
      <tr>
        <td>Address</td>
        <td>
          <?php echo $jsn[$i]['ADDRESS'];  ?>
        </td>
      </tr>
      <tr>
        <td>User ID</td>
        <td>
          <?php echo  $user_id=$jsn[$i]['USER_ID'];  ?>
        </td>
      </tr>
      <tr>
        <td colspan = "2" align="center">
          
        </td>
      </tr>
        </table> 

  <br>
  <br>
  
 



       </div>

<!-- end of Profile view -->


						    <?php 

						    				//require("oracle_to_json.php");
						    				$jsonData= getJSONFromDB("SELECT * FROM post_tab WHERE USER_ID='".$user_id."'");
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
											$jsn1=json_decode($jsonData,true);

											//echo sizeof($jsn);

													for($k=sizeof($jsn1)-1;$k>=0;$k--) {

											    $pid=$jsn1[$k]['POST_ID'];

											   // echo $pid ;

												?>
												 <div class="column_two_section">

												 
												 <p class="p"> <?php echo $jsn1[$k]['POST_HEADLINE']; ?>  </p>
												 <?php
												
												
												//echo "<p> {$jsn[$i]['POST_HEADLINE']}  </p>"; 
												echo"<br>";
												echo "<p>Posted at: &nbsp</P>";
												echo "<p> {$jsn1[$k]['DATE_TIME']} 
												</p>"; ?>





												<?php 
												echo"<br>";
												//echo"<p>=================================================</p>";
												echo "<p> {$jsn1[$k]['POST']}</p>";
												 ?> 
												 <form name="commentform" action="comment.php"  method="post" >
												<!-- 	<input type="text" name="comment" value="Comment"> -->
												 	<input type="hidden" name="postid" value="<?php echo $pid ?> ">

												 	<input type="hidden" name="user_name_post" value="<?php echo $row['USER_NAME'];?>">
												 	<input type="submit" hidden="submit_comment" name="submit_comment" value="post">
				                                 <!-- TIME DATE TAKE BY TRIGGER FROM SYSDATE-->
												 </form>

												 <?php

//  commment , commentor, comment date database theek fech kore ante hobe. ebong dkehatee hobe . 

	$JsonCommData= getJSONFromDB("SELECT * FROM COMMENT_TAB COM INNER JOIN POST_TAB I ON COM.POST_ID=I.POST_ID WHERE I.POST_ID = ".$pid);
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
			//echo $JsonCommData;
											$JsnCom=json_decode($JsonCommData,true);

										//echo $JsnCom ;

											for($j =sizeof($JsnCom)-1;$j>=0;$j--) {

													?>
												 <form action="public_profile.php" method="post" >

										 <input hidden="com_user_id" name="com_users_id" value="<?php echo $JsnCom[$j]['COM_USER_ID'] ;?>">

										 <input type="submit"  name="" value="<?php echo $JsnCom[$j]['USER_NAME_COM'] ;?>">
												<?php 

												//echo "<p> {$JsnCom[$j]['USER_NAME_COM']}</p>"; 
												echo "<p> {$JsnCom[$j]['COMMENT_CONTENT']}</p>";
												
												echo "<p> {$JsnCom[$j]['TIME_DATE']}</p>";
												echo"<br>";
												echo"<br>";
											} 
										//	$JsonCommData = null;
									//		$JsnCom = null;

												 ?>

											</form>	</div>
		

							     <?php
									 }
			      
								 ?>
						        
		    </div> 

    <!-- end of column two -->

    		<div id="content_column_three">
    	
        
    		<div class="column_three_section">
           		<h1>Popular Posts</h1>
            
       		 </div>
               
       		 <div class="cleaner_with_divider">&nbsp;</div>
	        
	        <div class="column_three_section">
            	<h1>About This Blog</h1>
           		 <p>Hallo All <a href="#">read more</a></p>
       		</div>  
          
    </div> <!-- end of column three -->   
    
    	<div class="cleaner">&nbsp;</div>
</div> <!-- end of content -->

<div id="bottom_panel">
 <center>
		<div class="bottom_panel_section">
   		<a href="#">Home</a> | <a href="#">Profile</a> | <a href="#"> Follower</a> | <a href="#">Following </a>| <a href="#">About Us</a> | <a href="#">Contact Us</a><br /><br />
  		<p> Copyright © 2016 </p> <a href="#"><strong>Muhammad Abdul Qaium</strong></a></div>
</center>
   	 <div class="cleaner">&nbsp;</div>
</div> <!-- end of bottom panel -->

</body>
</html>


		
<!--
		
			
           -->
           
           <?php
       }
      
           ?>