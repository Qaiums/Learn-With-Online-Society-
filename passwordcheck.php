<?php
session_start();
$value=$_GET['pass'];


$_SESSION['pass_flag']=0 ; 


if(!empty($value))
{
        
        
       if(!preg_match("#[0-9]+#",$value)) {
            echo "<p>Your Password Must Contain At Least 1 Number!</p>";
        }
        elseif(!preg_match("#[A-Z]+#",$value)) {
           echo "<p>Your Password Must Contain At Least 1 Capital Letter!</p>";
        }
        elseif(!preg_match("#[a-z]+#",$value)) {
           echo  "<p>Your Password Must Contain At Least 1 Lowercase Letter!</p>";
        } else {

           $_SESSION['pass_flag']=1 ; 
           echo  "<p>Please Check You've Entered Or Confirmed Your Password!</p>";
        }
    }

    else
    {
       $_SESSION['pass_flag']=1 ; 
    }

?>