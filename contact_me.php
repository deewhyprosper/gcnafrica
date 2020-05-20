<?php
include "thanks.html";

$fname= $_POST['fname'];
$lname = $_POST['lname'];
$email= $_POST['email'];
$message= $_POST['message'];

$conn=mysqli_connect('localhost','root', '', 'gncafrica');
if($conn){
     // echo "connect to db successful";
        }else{
            // die('unable to connect to db');
        };


 $savehere= mysqli_query ($conn, "INSERT INTO client(firstname, lastname, email, subject) VALUES ('fname', 'lname', 'email', 'message')" );
  if($savehere){
    // echo 'save to db successful';
  } else{
    // echo "unable to save to db";
  }


// Check for empty fields
if(empty($_POST['fname'])        ||
      empty($_POST['lname'])       ||
   empty($_POST['email'])       ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
    // echo "No arguments Provided!";
    return false;
   }
    
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$message = $_POST['message'];
    
// Create the email and send the message
$to = 'info@gcnafrica.com,'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $fname . $lname\n\nEmail: $email\n\nMessage:\n$message";
$headers = "From: noreply@googledocf.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address"; 
mail($to,$email_subject,$email_body,$headers);
return true;            
?> 