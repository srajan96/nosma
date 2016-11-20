<html>
    <head>
        <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="668791001514-nk241ksbt17t0g5iksij3p3phspocgru.apps.googleusercontent.com">
      <?php require 'header.php' ?>
    <title>
      NOSMA
    </title>
    <style>

    body {
            background: url("src/resources/background.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
    }

    .form-group{
        margin-top: 15px;
    }
   .panel-transparent {
        background: none;
        color: white;
    }

    .panel-transparent .panel-heading{
        background: rgba(122, 130, 136, 0.7)!important;
    }

    .panel-transparent .panel-body{
        background: rgba(46, 51, 56, 0.7)!important;
        
    }
    
     .panel-transparent-lighter {
        background: none;
        color: white;
    }

    .panel-transparent-lighter .panel-heading{
        background: rgba(122, 130, 136, 0.4)!important;
    }

    .panel-transparent-lighter .panel-body{
        background: rgba(46, 51, 56, 0.4)!important;
        
    }
    .material-icons{
        color: white;
    }
    .form-control{
        color: white;
    }
    .tooltip_templates { display: none; }

        </style>
           
    </head>
    <body>
        
        <div class="container" >
    
        <div class="row">
           <div class="col-lg-6 col-lg-offset-4" >
              
            <div class="row-fluid">
            <div class="col-lg-10" style="padding-top: 0px;">
                 <div class="text-center" style="padding-bottom:10px; color: white; font-weight: 300;" ><h1>Lets get started</h1></div>
                <div id="mypanel" class="panel panel-info panel-transparent">
                      <div  class="panel-heading">
                        <h3 class="panel-title text-center">Register to NOSMA</h3>
                      </div>
                      <div id="registerpanelbody" class="panel-body">

                    <form id="registerform" class="" method="" action="">
                            <div class="form-group input-group label-floating">
                                <span class="input-group-addon"><i class="material-icons">person</i></span>
                                <label for="name" class="control-label"></label>
                                <input type="text" class="form-control" id="name" name="name" required placeholder="Name">
                             </div>
                        
                        
                            <div class="form-group input-group label-floating">
                                <span class="input-group-addon"><i class="material-icons">email</i></span>
                                <label for="email" class="control-label"></label>
                                <input type="email" class="form-control" id="email" name="email"  placeholder="Email Here" required>
                             </div>
                        
                            <div id="username-input" class="form-group input-group label-floating">
                                <span class="input-group-addon"><i id="username-icon"class="material-icons">account_circle</i></span>
                                <label for="username" class="control-label"></label>
                                <input type="text"  id="username" class="form-control" name="username" onkeyup="searchusername(this.value);" placeholder="Choose a username" required>
                                <p class="help-block" id="username-help" style="font-size: 12px;color:white">Type in username</p>
                                
                            </div>
                          
                            <div class="form-group input-group  ">
                                <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                <label for="password" class="control-label"></label>
                                <input type="password" id="password" name="password" required class="form-control" onkeyup="verifypass('password','repass','white');" placeholder="Choose password" required>
                                 
                            </div>
                           
                        
                        
                        <div class="form-group input-group label-floating " >
                              <span class="input-group-addon"><i class="material-icons">repeat_one</i></span>
                               <label for="repass" class="control-label"></label>
                               <input type="password" id="repass" class="form-control" onkeyup="verifypass('password','repass','white');" name="repass" placeholder="Once more time" required>
                              
                         </div>
                        <div class="form-group" style="margin-top:0px; padding-left:40px;">
                            <p id="repasshelp"  style="visibility:hidden;font-size: 15px;font-weight:bold">some text here</p>
                         </div>
                     
                             <button type="submit" name="submitbtn" id="submitbtn"  class="btn btn-info btn-raised form-control btn btn-primary">Register</button>
                     
                    </form>
                      
                      </div>
                </div>
            </div>
        </div>
            </div>
            <!--register ends-->
     
        </div>

     </div>

 <script>
$(document).ready(function() {
$("#submitbtn").click(function(e) {
e.preventDefault();
var name = $('#name').val();
var username = $('#username').val();
var email = $('#email').val();
var password = $('#password').val();
//console.log("name and password are "+name+" "+password);
var answer=register('password','repass','username');
//console.log(answer);
if(answer){
    $.ajax({
    type: "POST",
    url: "controllers/register_user.php",
    data: {name: name,username:username,email:email,password:password},
    success: function(data){
		console.log(data);
		if(data=="registered"){
        var mypanel=document.getElementById("mypanel");
        var panelbody=document.getElementById("registerpanelbody");
        mypanel.style.marginTop="60px";
        panelbody.setAttribute("class","panel-body text-center");
        panelbody.innerHTML="<h2>You are now registered with Nosma</h2><br><h4>Redirecting to login in 3 seconds</h4>";
        var delay = 3000; //Your delay in milliseconds
        setTimeout(function(){ window.location = "index.php"; }, delay);
		}
	}
	}); 
}
});
});
</script>  

        <!--outermost container ends-->
<?php require 'footer.php'?>
      
    	
    </body>
</html>

