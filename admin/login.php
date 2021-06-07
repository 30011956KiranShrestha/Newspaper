<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css" id="style-resource-1"> 
  <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css" id="style-resource-2"> 
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic" id="style-resource-3"> 
  <link rel="stylesheet" href="assets/css/bootstrap.css" id="style-resource-4"> 
  <link rel="stylesheet" href="assets/css/neon-core.css" id="style-resource-5"> 
  <link rel="stylesheet" href="assets/css/neon-theme.css" id="style-resource-6"> 
  <link rel="stylesheet" href="assets/css/neon-forms.css" id="style-resource-7"> 
  <link rel="stylesheet" href="assets/css/custom.css" id="style-resource-8"> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
</head>
<body class="page-body login-page login-form-fall">
  <div class="login-container"> 
    <div class="login-header login-caret"> 
      <div class="login-content"> 
        <h2 class="text-light">Newspaper distribution Ltd</h2>
        <p class="description">Dear user, log in to access the admin area!</p>  
        <div class="login-progressbar-indicator"> 
                <h3>43%</h3> <span>logging in...</span> 
            </div> 
        </div> 
    </div> 
    <div class="login-progressbar"> 
        <div></div> 
    </div> 
    <div class="login-form"> 
        <div class="login-content"> 
            <div class="form-login-error"> 
                <h3>Invalid login</h3> 
                <p>Incorrect email or password.</p> 
            </div> 
            <form method="post" role="form" id="form_login"> 
              <input name="login" type="hidden" value="Login"/>
                <div class="form-group"> 
                  <div class="input-group"> 
                    <div class="input-group-addon"><i class="entypo-user"></i> </div> <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" /> 
                  </div> 
                </div> 
                <div class="form-group"> 
                    <div class="input-group"> 
                        <div class="input-group-addon"> <i class="entypo-key"></i> </div> <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" /> 
                    </div> 
                </div> 
                <div class="form-group"> 
                    <button type="submit" class="btn btn-primary btn-block btn-login"> <i class="entypo-login"></i>Login In</button> 
                </div> 
            </form> 
            
        </div> 
    </div> 
</div>
<script src="assets/js/gsap/TweenMax.min.js" id="script-resource-1"></script> 
<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script> 
<script src="assets/js/bootstrap.js" id="script-resource-3"></script> 
<script src="assets/js/joinable.js" id="script-resource-4"></script> 
<script src="assets/js/resizeable.js" id="script-resource-5"></script> 
<script src="assets/js/neon-api.js" id="script-resource-6"></script> 
<script src="assets/js/cookies.min.js" id="script-resource-7"></script> 
<script src="assets/js/jquery.validate.min.js" id="script-resource-8"></script> 
<script src="assets/js/neon-login.js" id="script-resource-9"></script> 
</body>
</html>