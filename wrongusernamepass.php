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
            <li><a href="index.php"  class="current">Home</a></li>
            <li><a href="" >Profile</a></li>
            <li><a href="" >Follower</a></li>            
            <li><a href="" >Following</a></li>  
            <li><a href="" >About Us</a></li> 
            <li><a href="" >Contact Us</a></li>
            <li><a href="login.php" >Login</a></li>  
            <li><a href="registration.php" >Register</a></li>                       
        </ul> 
    </div>
</div>
<!-- colum 1-->
<div id="content">

   <div id="content_column_one">
        <div class="column_one_section">
            <div class="p">Categories</div><br><br>
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
            <center>
            <script type="text/javascript" src="javascript.js"></script>



  <form  name="myForm1" action="logincheck.php" onsubmit="return validateLoinForm()" method="post">
 


<pre>
    <h2>Login</h2>
     <p style="color: red;" >Wrong Email or Password !!! </p>
  <p>Email : <input style="width: 300px;" value="" type="email" name="email" /><br>
Password : <input style="width: 300px;" type="password" name="pass" /></p> 
      </pre><input type="submit" value="Login" /><br><br>



<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>

   
  </form>
</center>
               
        </div>
        
    </div> <!-- end of column two -->

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



<!-- Java script-->




</body>
</html>
