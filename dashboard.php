<?php
require( 'controllers/SessionDatabase_init.php');

if($GLOBALS['session']->isLoggedIn)
    header("Location: ./index.php");
?>
<?php
if(isset($_POST['submit'])){
        # submit was clicked
        //echo '<pre>';
            //print_r("Inside php code");
        //echo '</pre>';
        $img = $_FILES['img'];
        
        $_SESSION['entertag'] = $_POST['entertag'];
        $_SESSION['accesstype'] = $_POST['accesstype'];
        $_SESSION['enterfilename'] = $_POST['enterfilename'];
$arr = [];
if(!empty($img))
{
    
    $img_desc = reArrayFiles($img);
    //print_r($img_desc);
    
    foreach($img_desc as $val)
    {
        $newname = date('YmdHis',time()).mt_rand().'.jpg';
        move_uploaded_file($val['tmp_name'],'./uploads/'.$newname);
		$arr[] = $newname;
		
	
	}
	
	
	$_SESSION['file_name'] = $arr;
	//echo '<pre>';
		//print_r("Inside normal function session");
		//print_r($_SESSION['file_name']);
	//echo '</pre>';
	generate($arr);


  $_SESSION['entertag'] = $_POST['entertag'];
  $_SESSION['enterfilename'] = $_POST['enterfilename'];
  
}


}
function reArrayFiles($file)
{
    $file_ary = array();
    $file_count = count($file['name']);
    $file_key = array_keys($file);
    
    for($i=0;$i<$file_count;$i++)
    {
        foreach($file_key as $val)
        {
            $file_ary[$i][$val] = $file[$val][$i];
        }
    }
    return $file_ary;
}

function generate($img1)
{
    require("fpdf.php");

$img = $img1;
//echo '<pre>';
	//print_r("Inside generate function");
	//print_r($img);
//echo '</pre>';	
$pdf = new FPDF();

foreach ($img as $image1) 
{
	$image = dirname(__FILE__).DIRECTORY_SEPARATOR."uploads/" . $image1 ;
    //echo '<pre>';
		//print_r($image);
	



  //echo '</pre>';

  $pdf->AddPage();
	$pdf->Image($image,20,40,100,110);
}

$pdf->Output("download123.pdf");

$newnameforpdf = date('YmdHis',time()).mt_rand().'.pdf';
$pdf->Output("pdf/". $newnameforpdf);
//echo "Your new file downloaded successfully.";
$_SESSION['linknew'] = "pdf/".$newnameforpdf;
$link ="pdf/".$newnameforpdf;
//connection to database
$templink = dirname(__FILE__).DIRECTORY_SEPARATOR."pdf/" .  $newnameforpdf;   
//echo '<pre>';
	//print_r("this is link that will be stored in database");
	//print_r($templink);
	//print_r($_SESSION['username']);
//echo '</pre>';
	
//inserting links into databse
$sql = "INSERT into links(pdf_name,username, notename, tag, accesstype) values('".$link."','".$_SESSION['username']."', '".$_SESSION['enterfilename']."', '".$_SESSION['entertag']."', '".$_SESSION['accesstype']."') ;";
//     
   //mysql_select_db('chat');
   //$retval = mysql_query( $sql, $conn );
if(mysqli_query($GLOBALS["database"]->conn, $sql))
{
    //echo "DOne correctly";
}
else
{
    //echo "not conected";
}


 
 
   //echo '<pre>';
   //echo "data entered into links table successfully\n";
   //echo '</pre>';
   
   
   //mysqli_close($conn);

//echo dirname(__FILE__); 

}

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
    <link href="plugins/chosen_v1.6.2/chosen.min.css" rel="stylesheet" type="text/css"/>
    
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
                      <button class="btn btn-default" id="changepassdashbtn"data-toggle="control-sidebar">Change Password</button>
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
          <ul class="sidebar-menu" id="sidemenubar">
            <li class="header">MAIN NAVIGATION</li>
            
            
            <li>
              <a href="#" id="openContacts">
               <i class="material-icons" data-toggle="tooltip" title="Open Contacts">chat</i> <span> Open Contacts</span> 
              </a>
            </li>
            <li>
              <a href="#" id="openGroups">
                <i class="material-icons" data-toggle="tooltip" title="Open Groups">group</i> <span> Open Groups</span> 
              </a>
            </li>
             <li>
              <a href="#" id="viewHistory">
               <i class="material-icons" data-toggle="tooltip" title="View History"> history</i> <span> View History</span> 
              </a>
            </li>
             <li>
              <a href="#" id="convertToPdf">
                  <i class="material-icons" data-toggle="tooltip" title="Convert images to PDF">picture_as_pdf</i><span> Convert notes to PDF</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="material-icons">perm_contact_calendar</i>
                <span>Contacts</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="#" id="addContacts"><i class="fa fa-circle-o"></i> <span> Add contact</span></a></li>
                  <li><a href="#" id="removeContacts"><i class="fa fa-circle-o"></i><span> Remove Contact</span></a></li>
             
              </ul>
            </li>
            <li>
              <a href="#" id="createGroup">
                  <i class="material-icons" data-toggle="tooltip" title="Convert images to PDF">group_add</i><span>Create Group</span> 
              </a>
            </li>
           <li>
              <a href="#" id="noteLibrary">
                  <i class="material-icons" data-toggle="tooltip" title="Search For notes">note</i><span>Note Library</span> 
              </a>
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
		<div class="big-master col-lg-12">
                    <!--kid starts-->
                    <div id="bigmasterkid"></div>
        <!-- Main content -->
        <section class="content">
    
          <!-- Main row -->
           <div class="row">
            <!-- Left col -->
            <section class="col-lg-4 connectedSortable" id="master">
               
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
           
          </div>
          <!-- /.row (main row) -->

        </section><!-- /.content -->
               
		</div>
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
                <form id="changepassform" role="form">
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
                    <button type="button"  class="btn  btn-raised  btn-default" onclick="$('#changepassdashbtn').click()" >Cancel </button>
                       
                  </div>
                </form>
              </div>
</aside>
<!-- The sidebar's background -->
<!-- This div must placed right after the sidebar for it to work-->
<div class="control-sidebar-bg"></div>

<div id="addcontactslider" >
	<div class="box box-primary" style="margin-top:50%;padding:20px; background-color:#D8E8F1; color:black;">
		
					<div class="box-header with-border text-center" style="color:black;size:30px;">
					<h3 class="box-title  ">Add Contact</h3>
					
					</div>
				<form id="addContactForm" role="form">
                  <div class="box-body with-border">
				    <div class="form-group "> 
                    <label for="username">Enter Username</label>
                    <input type="text" id="addContactUsername" class="form-control" name="addusername" required>
                    </div>
					 <div class="form-group text-center" style="margin-top:0px; ">
                            <p id="userhelp"  style="visibility:hidden;font-size: 15px;font-weight:bold">some text here</p>
                    </div>
                      
                    </div><!-- /.box-body -->

                  <div class=" text-center">
                    <button type="submit"  class="btn  btn-raised " style="background:black; color:white;" id="addUserBtn">Add User</button>
                       
                  </div>
                </form>
	</div>
	
</div>
<div id="creategroupslider" >
	<div class="box box-primary" style="margin-top:50%;padding:20px; background-color:#D8E8F1; color:black;">
		
					<div class="box-header with-border text-center" style="color:black;size:30px;">
					<h3 class="box-title  ">Create Group</h3>
					
					</div>
                                <form id="createGroupForm" role="form">
                  <div class="box-body with-border">
                     <div class="form-group "> 
                    <label for="groupname">Enter Group Name</label>
                    <input type="text" id="createGroupName" class="form-control" name="createGroupName" required>
                    </div>
                
                      
                    <div class="form-group text-center" style="margin-top:0px; ">
                            <p id="createGroupUserHelp"  style="visibility:hidden;font-size: 15px;font-weight:bold">some text here</p>
                    </div>
                      <div class="form-group ">
                          <label for="selectcontactsforgroup">Add Members</label>
                          <select data-placeholder="Select Contacts"  multiple name="selectcontactsforgroup"id="addcontacttogroup" class="chosen-select form-control">
                            
                          </select>
                      </div>
                    </div><!-- /.box-body -->

                  <div class=" text-center">
                    <button type="submit"  class="btn  btn-raised " style="background:black; color:white;" id="createGroupBtn">Create</button>
                 </div>
                </form>
            
	</div>
	
</div>


<div id="converttopdfslider" >
	<div class="box box-primary" style="margin-top:50%;padding:20px; background-color:#D8E8F1; color:black;">
		
                    <div class="box-header with-border text-center" style="color:black;size:30px;">
                    <h3 class="box-title  ">Convert Images to PDF</h3>
					
                    </div>
                <form id="converttopdfform" action ="#" method="post" role="form" enctype="multipart/form-data">
                  <div class="box-body with-border">
                    <div class="form-group "> 
                    <label for="groupname">Select images</label>
                        <input type="file" name="img[]" id="fileToUpload" id="imageUpload" multiple required>
                    </div>  
                </div><!-- /.box-body -->

                <div class=" text-center form-group">
                 <input type="text" class="form-control" placeholder="select file name" name="enterfilename" id="enterfilename">
                  </div>
                  <div class=" text-center form-group">
                 <input type="text" class="form-control"  placeholder="Add Tags" name="entertag" id="entertag">
                  </div>
                  <div class=" text-center form-group">
                      <input type="radio"  name="accesstype" value="public"> Public<br>
                      <input type="radio"   name="accesstype" value="private"> Private
                  </div>

                  <div class=" text-center form-group">
                 <input type="submit"  class="form-control btn btn-primary"value="Upload Image" name="submit" id="imageSubmit" onclick="fileuploader()">
                  </div>
                </form>
	</div>
		
</div>
<div id="sharenotes-dialog" style="margin-top:5em;" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Share notes</h4>
      </div>
      <div class="modal-body">
          <form id="form">
          <h4>Select contacts</h4>
          <div class="form-group">
             <select id="newmembercontact" multiple class=" form-control">
                            
            </select>
           </div>
          <h4>Select groups</h4>
          <div class="form-group">
             <select id="newgroupcontact" multiple class=" form-control">
                            
            </select>
           </div>
          <div class="form-group">
              <button type="submit" class="btn btn-danger btn-raised" data-dismiss="modal" onclick="sharenotetomember()">SHARE</button>
                <button type="button" class="btn btn-info btn-raised" data-dismiss="modal">Cancel</button>
          </div>
          </form>
      </div>
      <div class="modal-footer">
          
      </div>
    </div>
  </div>
</div>
<!--srajan starts-->
<div id="addmember-dialog" style="margin-top:5em;" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add members to group</h4>
      </div>
      <div class="modal-body">
          <form id="addmemberform">
          <h4>Select members to add to group</h4>
          <div class="form-group">
             <select id="newmember" multiple class=" form-control">
                            
            </select>
           </div>
          <div class="form-group">
              <button type="submit" class="btn btn-danger btn-raised" data-dismiss="modal" onclick="addNewMembersToGroup()">Yes,do it</button>
                <button type="button" class="btn btn-info btn-raised" data-dismiss="modal">Cancel</button>
          </div>
          </form>
      </div>
      <div class="modal-footer">
          
      </div>
    </div>
  </div>
</div>
<!--remove contact slider-->
<div id="removecontactslider" >
	<div class="box box-primary" style="margin-top:50%;padding:20px; background-color:#D8E8F1; color:black;">
		
					<div class="box-header with-border text-center" style="color:black;size:30px;">
					<h3 class="box-title  ">Remove Contact</h3>
					
					</div>
				<form id="removeContactForm" role="form">
                  <div class="box-body with-border">
				    <div class="form-group "> 
                                          <label for="removecontacts">Add Members</label>
                                          <select data-placeholder="Select Contacts"  multiple name="removecontacts"id="removecontacts_select" class="chosen-select2 form-control">

                                          </select> 
                                    </div>
					
                    </div><!-- /.box-body -->

                  <div class=" text-center">
                    <button type="submit"  class="btn btn-danger"  id="removeUserBtn">Remove Contact</button>
                       
                  </div>
                </form>
	</div>
	
</div>
<div id="removemember-dialog" style="margin-top:5em;" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Remove members from group</h4>
      </div>
      <div class="modal-body">
          <form id="removememberform">
          <h4>Select members to remove group</h4>
          <div class="form-group">
             <select id="oldmember" multiple class=" form-control">
                            
            </select>
           </div>
          <div class="form-group">
              <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal" onclick="removeMembersFromGroup()">Yes,do it</button>
                <button type="button" class="btn btn-info btn-raised" data-dismiss="modal">Cancel</button>
          </div>
          </form>
      </div>
      <div class="modal-footer">
          
      </div>
    </div>
  </div>
</div>

<div id="deletegroup-dialog" style="margin-top:5em;" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Group</h4>
      </div>
      <div class="modal-body">
         
          <h4>Do you really want to delete this group?</h4>
          <p>Deleting it will remove all the media and the conversations</p>
      </div>
        <div class="modal-footer">
      <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal" onclick="deleteGroup()">Yes,do it</button>
        <button type="button" class="btn btn-info btn-raised" data-dismiss="modal">Cancel</button>

         
      </div>
      <div class="modal-footer">
          
      </div>
    </div>
  </div>
</div>
<!--srajan ends-->
<?php
//srajan starts
    if($_SESSION['username']=="admin"){
?>
    <script>
        var elem=document.getElementById("sidemenubar");
        elem.innerHTML+=' <li>\
              <a href="#" id="openStats">\
                <i class="material-icons" data-toggle="tooltip" title="Open Statistics">insert_chart</i> <span>View Statistics</span> \
              </a>\
            </li>'
        </script>
    <?php
        
    }
         //srajan ends
    ?>
<hr />
    <!--Change Password ends-->
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	
	
   
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
	
	 <!--Modal -->
	

	 <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
   
   <!-- Chosen Plugin -->
	
   <script src="plugins/chosen_v1.6.2/chosen.jquery.min.js" type="text/javascript"></script>
    <script src="src/css/snackbar/dist/snackbar.min.js" type="text/javascript"></script>
    <link href="src/css/snackbar/themes-css/material.css" rel="stylesheet" type="text/css"/>
    <script src="src/drawer_plugin/jquery.slidereveal.js" type="text/javascript"></script>
    <script src="src/js/main.js" type="text/javascript"></script>
    <script src="js/nosmajs.js" type="text/javascript"></script>
     <script id="contacts-template" type="text/x-custom-template">
 
<div class="box box-primary direct-chat direct-chat-primary" >
       
<div class="box-header with-border" id="chatHeader">
          <h3 class="box-title" id="chatTitle"></h3>
    <!--srajan start-->
          <div class="box-tools pull-right" id="optbox">
            <button class="btn btn-box-tool" data-toggle="tooltip" title="View Media" data-widget="chat-pane-toggle" onclick="loadMedia()"><i class="fa fa-picture-o" aria-hidden="true"></i></button>
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
            <ul class="contacts-list" id="mediabox">
              
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
 <script id="choose-contacts-template" type="text/x-custom-template">
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
		
			
</script>	
<script id="choose-groups-template" type="text/x-custom-template">
				<form class="form" id="groupstable">
					<div class=" panel panel-default panel-success " >
                    <div class="panel-heading"style="background:#536dfe;color:white;"><h3 class="panel-title">Choose Groups</h3></div>
					<div class="panel-body dashboard " style="padding-top:0px;height:100%; overflow-y:auto;">
					<table class="table table-striped">
						<tbody id="grouptablebody">
						</tbody>
					</table>
					</div>
					</div>
                </form>
		
			
</script>			
<!--srajan starts-->	
<script id="viewstats-template" type="text/x-custom-template">
<div class="row" style="padding-top:100px;">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3 id='msgcount'>150</h3>
                  <p>Messages</p>
                </div>
                <div class="icon">
                  <i class="fa fa-commenting"></i>
                </div>
                <a href="#" class="small-box-footer">
                 Till Now
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3 id='grpcount'>53</h3>
                  <p>Groups</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Created 
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3 id='usercount'>44</h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                  And Counting
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3 id='convcount'>65</h3>
                  <p>File Conversion</p>
                </div>
                <div class="icon">
                <i class="fa fa-file-text" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Making studies easier
                </a>
              </div>
            </div><!-- ./col -->
          </div>
		
			
</script>
<!--srajan ends-->
<script id="viewhistory-template" type="text/x-custom-template">
    <div class=" panel panel-default panel-success  col-lg-10" style="margin-top:40px;margin-left:35px;padding-right: 0px ;padding-left: 0px;">
        <div class="panel-heading"style="background:#536dfe;color:white;height:30px;"><h3 class="panel-title"></h3></div>
            <div class="panel-body dashboard " style="padding-top:10px;height:100%; overflow-y:auto;">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                        <th style="width: 35%;">File Name</th>
                        <th style="width: 40%;">Timestamp Of Conversion</th>
                        <th style="width: 25%;">Download / Share</th>
                       
                        </tr>
                    </thead>        
                    <tbody id="historytablebody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
			
</script>

<script id="searchlibrary-template" type="text/x-custom-template">
    <div class=" panel panel-default panel-success  col-lg-10" style="margin-top:40px;margin-left:35px;padding-right: 0px ;padding-left: 0px;">
        <div class="panel-heading"style="background:#536dfe;color:white;height:30px;"><h3 class="panel-title"></h3></div>
            <div class="panel-body dashboard " style="padding-top:10px;height:100%;">
               <div class="text-center" >
                   
                        <div class="label-floating"> 
                        <label for='searchterm' class="control-label">Enter Note name</label>     
                        <input type="text"  class="form-control col-md-offset-4" style="width: 325.333334px;padding-left:15px;" name="searchterm" id="searchlibraryinput">
                        </div>
                        <div class="" style="padding-left:15px;">
                        <button  type="" id="searchlibrarybtn" name="searchlibrarybtn" class="btn btn-info btn-raised" onclick="loadsearchresult();">
                        <i class="material-icons" style="padding-right:0px;">search</i>
                        </button>
                        </div>
                    
                    </div> 
                
              
            </div>
        </div>
    </div>
			
</script>




    <script>
         $(document).ready(function(e)
  { 
     // console.log("adding------------")
    loadContactToAddGroup();
     loadContactToRemoveContact();
  });   
       
       
   $(document).ready(function() {
    $("#changepassform").submit(function(e) {
        e.preventDefault();
                        stopChattingInterval();
        var oldpass = $('#oldpass').val();
        var newpass = $('#newpass').val();
        var repass = $('#repass').val();
                        $("repasshelp").val("Changing...");
        //console.log("name and overs are "+name+" "+overs);
        if(newpass===repass){
            $.ajax({
            type: "POST",
            url: "controllers/changepassword.php",
            data: {current_pass:oldpass,new_pass:newpass},
            success: function(data){
                console.log(data);
                if(data=="Success"){
                    $("#changepassform")[0].reset();
                    $.snackbar({content: "Passwords changed successully!", timeout: 2000,id:"mysnack"});
                    $('#changepassdashbtn').click();
                }
                else{
                $.snackbar({content: "Your current password doesn't match!!!Try again", timeout: 2000,id:"mysnack"});
                                        }
                                startChattingInterval();
                                }
        });
                        $("repasshelp").empty(); 
    }
    else{
       $(function() {
            $.snackbar({content: "Both passwords dont match!", timeout: 2000,id:"mysnack"});
        });         

    }

        });
         });
$(document).ready(function(e)
{ 
sessionStorage.type="c";
$("#loadallcontactsbtn").click();
console.log("clicked");
});
$("#loadallcontactsbtn").on('click',loadmessages());
function loadMessages(contactto){

console.log("load message"+mid);
        $.ajax({
    type: "POST",
    url: "controllers/message_loader.php",
    data: {"name" : contactto,
                                "message_id" : mid,
                                "type":sessionStorage.type
                                },
   //dataType: "json",
    success: function(data){
        if(data!=""){
                        console.log(data);
                        var arr=JSON.parse(data);
        console.log(arr);
                        if(arr.length!=0){	


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
                        }
});
}

$("#createGroupForm").submit(function(e) {
        e.preventDefault();
        var name = $('#createGroupName').val();
        var members=[];
      
        $('#addcontacttogroup :selected').each(function(i, selected){ 
          members[i] = $(selected).val();
        
        });

        //console.log("Group Name:"+name+" Members:"+members);

            $.ajax({
            type: "POST",
            url: "controllers/group_adder.php",
            data: {name:name,members:members},
            success: function(data){
                //console.log(data);

                $.snackbar({content: name+" added to records!", timeout: 2000,id:"mysnack"});
                $("#createGroupForm")[0].reset();
                //$('#addcontacttogroup').html('');
                $('#addcontacttogroup').val('').trigger('chosen:updated');
                
              // loadContactToAddGroup();
                $('#creategroupslider').slideReveal("hide");
        }
        });
        

        }); 
        
        

     
    </script>
    

  
<script>
    
$('#addcontactslider').slideReveal({
  trigger: $("#addContacts"),
  position:"left",
  push:false,
  overlay:true,
  width:'30%',
  zIndex:1029,
  hidden: function(slider, trigger){
   $("#addContactUsername").val('');
   $("#userhelp").empty();
  }
});
$('#creategroupslider').slideReveal({
  trigger: $("#createGroup"),
  position:"left",
  push:false,
  overlay:true,
  width:'30%',
  zIndex:1029,
  hidden: function(slider, trigger){
   $("#addContactUsername").val('');
   $("#userhelp").empty();
  }
});
$('#converttopdfslider').slideReveal({
  trigger: $("#convertToPdf"),
  position:"left",
  push:false,
  overlay:true,
  width:'30%',
  zIndex:1029,
  hidden: function(slider, trigger){

  }
});
$('#removecontactslider').slideReveal({
  trigger: $("#removeContacts"),
  position:"left",
  push:false,
  overlay:true,
  width:'30%',
  zIndex:1029,
 
});

$("#removeContactForm").submit(function(e) {
        e.preventDefault();
       
        var members=[];
      
        $('#removecontacts_select :selected').each(function(i, selected){ 
          members[i] = $(selected).val();
        
        });

        //console.log(" Members:"+members);

           $.ajax({
            type: "POST",
            url: "controllers/contact_remover.php",
            data: {members:members},
            success: function(data){
                console.log(data);

                $.snackbar({content: "Contacts deleted succssfully!", timeout: 2000,id:"mysnack"});
                $("#removeContactForm")[0].reset();
                //$('#addcontacttogroup').html('');
                $('#removecontacts_select').val('').trigger('chosen:updated');
                
              // loadContactToAddGroup();
                $('#removecontactslider').slideReveal("hide");
                location.reload();
        }
        });
        
        

        });  
</script>
<script>

function fileuploader(){
		console.log("image to database is open.");
	     
		  //var image=document.getElementById("sendMessageInput").value;
		  var image_name = [];
		  console.log(image_name);
		  <?php foreach($_SESSION['file_name'] as $a){ ?>
			image_name.push("<?=$a?>");
			<?php } ?>
		  
			console.log(image_name);
		   $.ajax({
            type: "POST",
            url: "controllers/file_uploader.php",
			data: {file_name:image_name},
            success: function(data){
                console.log("Data has been saved to database. "+data);
                        }
        });
		  
	 
  }

  

  $("#imageSubmit").on('click',function(e)
	  {
		  
		  var image_name1 = [];
		  console.log(image_name1);
		  <?php foreach($_SESSION['file_name'] as $a){ ?>
			image_name1.push("<?=$a?>");
			<?php } ?>
		  
		  
		  console.log("The data sent to pdf is ");
		  console.log(image_name1);
		  
		  $.ajax({
            type: "POST",
            url: "text2.php",
            data: {filename : image_name1},
            success: function(data){
                console.log("workingg.....");
                  }
           
        });
		  
		  
	  });



</script>
  </body>
</html>
