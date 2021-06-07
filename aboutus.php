<?php include 'connection/connectforUser.php';

if (isset($_POST['submit'])) {
  if (!isset($_POST['firstname']) || $_POST['firstname'] == '' || !isset($_POST['lastname']) || $_POST['lastname'] == '' || !isset($_POST['email']) || $_POST['email'] == ''){
    $error = "Please enter all required fields";
  }
  else{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $insert = mysqli_query($connection, "INSERT INTO contactus (firstname, lastname, email, subject, message) VALUES ('$firstname', '$lastname', '$email', '$subject', '$message')") or die(mysqli_error($connection));
    if($insert){
      $sucessfull = "Thank you for your response.<br/> You will reply with your issues with 7 days.";
    }
    else{
      $error = "Error while entering into the database.";
    }
  }
}
?>

<!doctype html>
<html lang="en">
  <?php include 'head.php'; ?>
  <body>
  <!--menu row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col"><h1>NewsPaper Distribution Limited</h1></div>
    </div>
    <?php include 'navbar.php'; ?>
    <div class="row">
       <div class="col-md-10 mx-auto">
         <h1 class="text-center">
           About us
           <hr/>
         </h1>
          <p>What is Lorem Ipsum?</p>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
          <hr/>
          <h2 id="contactus" class="text-center">Contact Us</h2>
          <hr/>
          <form method="post" action="">
            <?php if(isset($error)){ 
              print "<p class='errormsg messagetodisplay'>".$error."</p><hr/>"; 
            }
            elseif (isset($sucessfull)) {
              print "<p class='sucessfulmsg messagetodisplay'>".$sucessfull."</p><hr/>"; 
            }
            ?>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Full Name</label>
              <div class="row">
                <div class="col-md-6"><input type="text" name="firstname" class="form-control" id="exampleInputName" placeholder="First Name" required=""></div>
                <div class="col-md-6"><input type="text" name="lastname" class="form-control" id="exampleInputName" placeholder="Last Name" required=""></div>
              </div>
              
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required="">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputSubject" class="form-label">Subject</label>
              <input type="text" name="subject" class="form-control" id="exampleInputSubject">
            </div>
            <div class="mb-3">
              <label for="exampleInputMessage" class="form-label">Message</label>
              <Textarea name="message" class="form-control" id="exampleInputMessage" rows="8"></Textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
          </form>
       </div>
          
     </div>
  </div>
    
    <?php include 'footer.php'; ?>

<!--database content here-->

    <?php include 'script.php'; ?>
  </body>
</html>