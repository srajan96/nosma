<?php
require( 'controllers/SessionDatabase_init.php');

if($GLOBALS['session']->isLoggedIn)
    header("Location: ./index.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NOSMA | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link href="src/css/snackbar/dist/snackbar.min.css" rel="stylesheet" type="text/css"/>
    <link href="src/css/snackbar/themes-css/material.css" rel="stylesheet" type="text/css"/>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
      
      <style>
          .material-icons{
        
        padding-right:18px;
       
    }
      </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="dashboard.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>N</b>MA</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>NOS</b>MA</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="src/resources/sample-user.png" class="img-circle" alt="User Image">
                            
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="src/resources/sample-user.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['name']?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="src/resources/sample-user.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['name']?> 
                    
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <button class="btn btn-default" data-toggle="control-sidebar">Change Password</button>
                    </div>
                    <div class="pull-right">
                        <a href="./index.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="src/resources/sample-user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['name']?></p>
          
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            
            
            <li>
              <a href="" id="loadallcontactsbtn">
               <i class="material-icons" data-toggle="tooltip" title="Open Contacts">chat</i> <span> Open Contacts</span> 
              </a>
            </li>
            <li>
              <a href="">
                <i class="material-icons" data-toggle="tooltip" title="Open Groups">group</i> <span> Open Groups</span> 
              </a>
            </li>
             <li>
              <a href="">
               <i class="material-icons" data-toggle="tooltip" title="View History"> history</i> <span> View History</span> 
              </a>
            </li>
             <li>
              <a href="">
                  <i class="material-icons" data-toggle="tooltip" title="Convert images to PDF">picture_as_pdf</i><span> Convert notes to PDF</span> 
              </a>
            </li>
            <li class=" treeview">
              <a href="#">
                <i class="material-icons">perm_contact_calendar</i>
                <span>Contacts</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> <span> Add contact</span></a></li>
                  <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i><span> Remove Contact</span></a></li>
             
              </ul>
            </li>
            <li class=" treeview" style="margin:auto;">
              <a href="#">
               <i class="material-icons">group_add</i>
                <span>Groups</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> <span> Add group</span></a></li>
                  <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i><span> Remove group</span></a></li>
             
              </ul>
            </li>
            
            
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-4 connectedSortable">
                     <form class="form" id="loadallcontactsbtn">
                <div class=" panel panel-default panel-success " >
                     <div class="panel-heading"style="background:#536dfe;color:white;"><h3 class="panel-title">Choose Contact</h3></div>
            <div class="panel-body dashboard " style="padding-top:0px;height:100%; overflow-y:auto;">
                <table class="table table-striped">
                    <tbody id="contacttablebody">
                    </tbody>
                    
                </table>
           </div>
         
            </div>
                </form>

            </section><!-- /.Left col -->
            
            <section class=" col-lg-5 col-md-offset-1  " id="chatboxmain">
		
             </section>
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
           
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     
    

    
    <!--Change Password-->

<!-- The Right Sidebar -->
<aside class="control-sidebar control-sidebar-light">
  <!-- Content of the sidebar goes here -->
  <div class="box box-primary" style="">
                <div class="box-header with-border">
                  <h3 class="box-title">Change Password</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="changepasswordform" role="form">
                  <div class="box-body">
                    <div class="form-group "> 
                    <label for="oldpassword">Current Password</label>
                    <input type="password" id="oldpass" class="form-control" name="oldpassword" >
                    </div>
                      
                    <div class="form-group">
                    <label for="newpassword">New Password</label>
                    <input type="password" class="form-control" id="newpass"name="newpassword">
                     
                    </div>
                      
                      <div class="form-group ">    
                    <label>Re-enter password</label>
                    <input type="password" class="form-control" id="repass" onkeyup="verifypass('newpass','repass','green');" name="repeatpassword">
                    </div>
                    <div class="form-group" style="margin-top:0px; ">
                            <p id="repasshelp"  style="visibility:hidden;font-size: 15px;font-weight:bold">some text here</p>
                    </div>
                    
               
                  </div><!-- /.box-body -->

                  <div class="box-footer text-center">
                    <button type="submit"  class="btn  btn-raised  btn-primary" style="background: #4d90fe;" id="changepassbtn">Change Password</button>
                       
                  </div>
                </form>
</div>
</aside>
<!-- The sidebar's background -->
<!-- This div must placed right after the sidebar for it to work-->
<div class="control-sidebar-bg"></div>


   
    <!--Change Password ends-->
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="../nosma/js/chatbox.js" type="text/javascript"></script>
    <script src="../nosma/js/main.js" type="text/javascript"></script>
    <script src="src/css/snackbar/dist/snackbar.min.js" type="text/javascript"></script>
    
    <script src="src/drawer_plugin/jquery.slidereveal.js" type="text/javascript"></script>
    <script src="src/js/main.js" type="text/javascript"></script>
    <script src="js/nosmajs.js" type="text/javascript"></script>
    <script>
      
                 
                 
$(document).ready(function(e)
  { 
     
     $("#loadallcontactsbtn").click();
     console.log("clicked");
  })
     
      $("#loadallcontactsbtn").on('click',loadmessages());
        function loadMessages(contactto){
            
	console.log("load message"+mid);
		$.ajax({
            type: "POST",
            url: "controllers/message_loader.php",
            data: {"name" : contactto,
					"message_id" : mid
					},
           //dataType: "json",
            success: function(data){
                if(data!=""){
				console.log(data);
				var arr=JSON.parse(data);
                console.log(arr);

			
				
				var i;
                var str="";
                 mid=arr[arr.length-1].m_id;
                  for(i = 0; i < arr.length; i++)
				  {
					var name ="<?php echo $_SESSION['username'] ?>";
					console.log("name is now "+name);
					if(name == arr[i].from_username)
					{
						appendRightMessage(arr[i]);
					}
					else
					{
						appendLeftMessage(arr[i]);
					}  
	
					 //str+= "<tr><td><div id='chat-"+arr[i].username+"' onclick='loadmessages(this.id)'>"+arr[i].name+"</div></td></tr>";
                        
                  }
				 
                 //tbody.innerHTML=str;
            //document.getElementById("leaguename").innerHTML=name;
			updateScroll();
				}
                        }
        });
	}
        
      function showSnack(data){
        console.log("snack called");
        $.snackbar({content: data, timeout: 2000,id:"mysnack"});
      }
 
    $("#changepasswordform").submit(function(e) {
        e.preventDefault();
        var oldpass = $('#oldpass').val();
        var newpass = $('#newpass').val();
        var repass = $('#repass').val();
        console.log("name and overs are "+newpass+" "+repass);
        if(newpass===repass){
            $.ajax({
            type: "POST",
            url: "controllers/changepassword.php",
            data: {current_pass:oldpass,new_pass:newpass},
            success: function(data){
                console.log(data);
                if(data=="Success"){
                    $("#changepasswordform")[0].reset();
                    $.snackbar({content: "Your current password doesn't match!!!Try again", timeout: 2000,id:"mysnack"});
                   
                }
                else{
                $.snackbar({content: "Your current password doesn't match!!!Try again", timeout: 2000,id:"mysnack"});
            }
        }
        }); 
    }
    else{
       $(function() {
            $.snackbar({content: "Both passwords dont match!", timeout: 2000,id:"mysnack"});
        });         
        
    }
        
        });
        
    </script>
    <script id="hidden-template" type="text/x-custom-template">
 
<div class="box box-primary direct-chat direct-chat-primary" >
       
<div class="box-header with-border" id="chatHeader">
          <h3 class="box-title" id="chatTitle"></h3>
    
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-cog" aria-hidden="true"></i></button>
            <button type="button" id = "closeChatButton" onclick="closeChatButton()" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" ></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="chatBody">
          <!-- Conversations are loaded here -->
          <div class="direct-chat-messages" id="messageInsertHere">
            <!-- Message. Default to the left -->
            
            <!-- /.direct-chat-msg -->
    
            <!-- Message to the right -->
            
            <!-- /.direct-chat-msg -->
          </div>
          <!--/.direct-chat-messages-->
    
          <!-- Contacts are loaded here -->
          <div class="direct-chat-contacts">
            <ul class="contacts-list">
              <li>
                <a href="#">
                  <img class="contacts-list-img" src="http://bootdey.com/img/Content/user_1.jpg">
    
                  <div class="contacts-list-info">
                        <span class="contacts-list-name">
                          Count Dracula
                          <small class="contacts-list-date pull-right">2/28/2015</small>
                        </span>
                    <span class="contacts-list-msg">How have you been? I was...</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
              <!-- End Contact Item -->
            </ul>
            <!-- /.contatcts-list -->
          </div>
          <!-- /.direct-chat-pane -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer" id="chatFooter">
         
            <div class="input-group">
              <input type="text" name="message" placeholder="Type Message ..." class="form-control" id="sendMessageInput">
                  <span class="input-group-btn">
                    <button type="button"  onclick="messagesender();" class="btn btn-primary btn-flat">Send</button>
					<!--<button type="submit"   class="btn btn-primary btn-flat">Send</button>-->
					</span>
            </div>
        
        </div>
        <!-- /.box-footer-->
 
      </div>
</script>
  </body>
</html>
