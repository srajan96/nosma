<html>
    <head>
        <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require 'header.php' ?>
    <title>
        Note Sharing and Management Application
    </title>
    <style>

    body {
            background: url("src/resources/background.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
    }


   .panel-transparent {
        background: none;
        color: white;
    }

    .panel-transparent .panel-heading{
        background: #4d90fe !important;
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

        </style>
    </head>
    <body>

        <div class="container" style="padding-top:30px;">
        <div class="row">
          <div class="col-lg-6">
                <div class="container" style="padding-top:2px;">
                    <div class="row">
                        <div class="col-lg-6" style="color: white; font-family:Roboto;">
                                <h1>Note Sharing and Management Application</h1>
                                <h3>Sharing notes made easy</h3>
                                
                             <div style="padding-top:55%;">   
                                 <h2>With NoSMA,you can easily converse with your friends and make study easier and fun!</h2>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--login ends-->
            <!--description starts-->
            
            
              <div class="col-lg-6" style="padding-top:80px;">
            <div class="row-fluid">
            <div class="col-lg-offset-2 col-lg-8" style="padding-top: 20px;">
                <div class="panel panel-info panel-transparent">
                      <div id="mypanelhead" class="panel-heading"  >
                        <h3 class="panel-title text-center" >Login</h3>
                      </div>
                      <div class="panel-body">

                    <form id="loginform" class="" method="post" action="">
							<div class="form-group input-group label-floating">
                                <span class="input-group-addon"><i class="material-icons">account_circle</i></span>
                                <label for="username" class="control-label"></label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                            </div>
                          <div class="form-group input-group label-floating">
                              <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                               <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                          </div>
                        <div class="row form-group">
                            <div style="padding-left:5%;">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <button type="submit" name="submitbtn" class="col-lg-12 btn  btn-raised  btn-primary" style="background: #4d90fe;">Login</button>
                                    <button type="button" name="registerbtn" class=" col-lg-12  btn btn-info btn-raised "  style="background: #dd5347;" onclick="window.location.href='./register.php'">Don't have an account? Get One!</button>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                            
                             </form>
                        </div>
                     </div>
                </div>
            </div>
        </div>
            </div>
        </div>

    <script>
$(document).ready(function() {
$("#loginform").submit(function(e) {
e.preventDefault();
var username=$("#username").val();
var password=$("#password").val();
//console.log(username+password+" ");

$.ajax({
type: "POST",
url: "./controllers/login_check.php",
data: {username:username,password:password},
success: function(data){
console.log(data);
if(data=="correct"){
    window.location.href="./controllers/dashboard-controller.php";
}
else
$.snackbar({content: "Invalid username or password!!", timeout: 2000,id:"mysnack"});
}
}); 

});
});
</script>  


        <!--outermost container ends-->
<?php require 'footer.php'?>

    	
    </body>
</html>
