<?php session_start();
    require("oracle_to_json.php");
     $v=$_SESSION['email'];
     $v1=$_SESSION['pass'];  

     ?>
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
            <input id="php" type="radio" onchange="loadDoc(this.value)" name="category" value="<?php echo "PHP" ?> "> PHP <br><br>
            <input id="java" type="radio" onchange="loadDoc(this.value)" name="category" value=" <?php echo "Java" ?> "> Java <br><br>
            <input id="c#" type="radio" onchange="loadDoc(this.value)" name="category" value="<?php echo "C#" ?> "> C# <br><br>
            <input id="c++" type="radio" onchange="loadDoc(this.value)" name="category" value="<?php echo "c++" ?> "> C++<br><br>
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
                      xhttp.open("GET", "categori_ajax_home.php?category="+category, true);
                      xhttp.send();
                    }
                            </script>
        <div class="cleaner_with_divider">&nbsp;</div>
 
    </div>

    <!-- end of column one -->
    
   	<div id="content_column_two">
    
    	<div class="column_two_section">

      <?php  
  

    $jsonData= getJSONFromDB("select * from userinfo u inner join  follow f on u.user_id = f.FOLLOWER_USER_ID where f.following_user_id=".$_SESSION['user_id']." ");

            
              $jsn=json_decode($jsonData,true);

                      echo "<p>Your Follower user list: </p>";
                       echo $_SESSION['user_id'] ;
                         for ($i=0; $i<sizeof($jsn);$i++) {

                         

                          echo " <br>";

                          echo "<p> $i </p>";
                          echo " <p> / </p>";
                        $pid=$jsn[$i]['USER_NAME'];
                         echo "<p>$pid </p>";


                        }




       ?>
      

      </div>

        
    </div> <!-- end of column two -->

    <div id="content_column_three">

        <div class="column_three_section">
            <h2 style="color: #f5ea01;" >About This Blog</h2>
            <p>Hallo All </p>
      </div>  
          
    </div> <!-- end of column three -->   
    
    <div class="cleaner">&nbsp;</div>
</div> 
<!-- end of content -->

<div id="bottom_panel">
 <center>
	<div class="bottom_panel_section">
   	<a href="#">Home</a> | <a href="#">Profile</a> | <a href="#"> Follower</a> | <a href="#">Following </a>| <a href="#">About Us</a> | <a href="#">Contact Us</a><br /><br />
  <p> Copyright © 2016 </p> <a href="#"><strong>Muhammad Abdul Qaium</strong></a></div>
    </center>
    

    <div class="cleaner">&nbsp;</div>
</div> <!-- end of bottom panel -->



<!-- Java script-->




</body>
</html>
