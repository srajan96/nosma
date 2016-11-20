<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	<style>
        .nav{
            
            display: flex;
        }
        body{
            padding-top:40px;          
        }
        .navbar-right{
            margin-right: 0px;
            
        }
	</style>
  </head>
  <body data-spy="scroll" data-target="#mynav">
      <header>
        <div class="navbar navbar-default navbar-inverse navbar-fixed-top" id="mynav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#coll">
                    <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                </button>
                
                <a href="" class="navbar-brand">WiredWiki</a>
            </div> 
            <div class="collapse navbar-collapse" id="coll">
              
            <ul class="nav navbar-nav">
                <li><a href="#feedback">Feedback</a></li>    
                 <li><a href="#gallery">Gallery</a></li>    
                 <li><a href="#features">Features</a></li>    
                 <li><a href="#faq">FAQ</a></li>    
                 <li><a href="#contact">Contact Us</a></li>                    
            </ul>
   <a href="" class=" btn btn-success navbar-btn navbar-right">Download Now</a>              
            </div>
        </div>
          <div class="jumbotron">
            <div class="container text-center">
              <h1>WiredWiki App</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy </p>
                <div class="btn-group">
                    <a href="" class="btn btn-lg btn-success">Download App</a>
                     <a href="" class="btn btn-lg btn-default">Visit Store</a>
                     <a href="" class="btn btn-lg btn-success">Spread the word</a>
                </div>
            </div>
          </div>
          <div class="container">
                <section>
                    <div class="page-header" id="feedback">
                    <h2>Feedback
                        <small>Check out the awesome feedback</small></h2>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <blockquote>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                                <footer>Barack Obama</footer>
                            </blockquote>
                            
                        </div>
                        <div class="col-md-4">
                            <blockquote>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                                <footer>Barack Obama</footer>
                            </blockquote>
                            
                        </div>
                        <div class="col-md-4">
                            <blockquote>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                                <footer>-Barack Obama</footer>
                            </blockquote>
                            
                        </div>
                    </div>
                </section>
          </div><!--end container-->
      </header>
      <!--call to section-->
      <seciton>
        <div class="well">
              <div class="container text-center">
                    <h3>Suscribe for more free stuff</h3>
                  <p>Enter your name and email</p>
                  <form action="" class="form-inline">
                    <div class="form-group">
                        <label for="subscription">Subscription</label>
                        <input type="text" class="form-control" id="subscription" placeholder="your name">
                         <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="email address">
                     
                    </div>
                      <button type="submit" class="btn btn-success">Suscribe</button>
                      <hr>
                  </form>
                </div>
        </div><!--end well-->
      </seciton><!--Call to action-->
      <!--gallery--->
	<div class="container">
        <Section>
            <div class="page-header" id="gallery">
                <h2>Gallery<small> Check out the awesome gallery</small></h2>
            </div>
            <div class="carousel slide"id="screenshot-c" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li class="active" data-target="#screenshot-c" data-slide-to="0"></li>
                    <li class="active" data-target="#screenshot-c" data-slide-to="1"></li>
                    <li class="active" data-target="#screenshot-c" data-slide-to="2"></li>
                </ol>
            <div class="carousel-inner">
                <div class="item active">
                        <div class="carousel-caption">
                             <h3>Desktop</h3>
                <p>This is a caption</p>
                            </div>
                        
                    <img src="E:\lesson\css\bootstrap\Ex_files_Bootstrap 3.0\Working_files_Bootstrap\desktop.png" alt="Textof the image">
                     </div> 
                    
                    <div class="item">
                         <div class="carousel-caption">
                             <h3>Desktop</h3>
                <p>This is a caption</p>
                             </div>
                        
                    <img src="E:\lesson\css\bootstrap\Ex_files_Bootstrap 3.0\Working_files_Bootstrap\desktop.png" alt="Textof the image">
                        </div>
                     
                   <div class="item">
                        <div class="carousel-caption">
                             <h3>Desktop</h3>
                <p>This is a caption</p>
                        </div>
                       
                    <img src="E:\lesson\css\bootstrap\Ex_files_Bootstrap 3.0\Working_files_Bootstrap\desktop.png" alt="Textof the image">
                     </div> 
                </div> 
                   <a href="#screenshot-c" class="left carousel-control" data-slide="prev">
            <span class="
glyphicon glyphicon-chevron-left"></span>
            </a>
              <a href="#screenshot-c" class="right carousel-control" data-slide="next">
            <span class="
glyphicon glyphicon-chevron-right"></span>
            </a> 
            </div>
            
            </div>
        </Section>
	</div>
    
        <!--features-->
    <Section>
        <div class="container">
            <div class="page-header" id="features">
                <h2>Features <small>Some of the coolest features of this app</small></h2>
                
            </div><!--end page header-->
            
            <div class="row">
                <div class="col-sm-8">
                    <h3>This is the heading</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                </div>
                <div class="col-sm-4">
                    <img src="E:\lesson\css\bootstrap\Ex_files_Creating_a_website_using__Bootstrap\imac.jpg" class="img-responsive" alt="image">
                </div>
            </div><!--end row-->
             <div class="row">
                <div class="col-sm-8">
                    <h3>This is the heading</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                </div>
                <div class="col-sm-4">
                    <img src="E:\lesson\css\bootstrap\Ex_files_Creating_a_website_using__Bootstrap\smartphone.jpg" class="img-responsive" alt="image">
                </div>
            </div><!--end row-->
             <div class="row">
                <div class="col-lg-8">
                    <h3>This is the heading</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                </div>
                <div class="col-sm-4">
                    <img src="E:\lesson\css\bootstrap\Ex_files_Creating_a_website_using__Bootstrap\user.jpg" class="img-responsive" alt="image">
                </div>
            </div><!--end row-->
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default text-center">
                        <div class="panel-body">
                             <span class="glyphicon glyphicon-ok"></span>
                            <h4>This is the heading</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4">
                    <div class="panel panel-default text-center">
                        <div class="panel-body">
                             <span class="glyphicon glyphicon-ok"></span>
                            <h4>This is the heading</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4">
                    <div class="panel panel-default text-center">
                        <div class="panel-body">
                            <span class="glyphicon glyphicon-ok"></span>
                            <h4>This is the heading</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
        
    </Section>
        <!--features end-->
      <!--gallery-->
   <!--faq-->
    <div class="container">
        <section>
            <div class="page-header" id="faq">
                <h2>FAQ. <small>Engaging with consumers</small></h2>
            </div>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="#collapse-1" data-toggle="collapse" data-parent="#accordion">
                                Question one?
                            </a>
                        </div><!--panel title-->
                        <div id="collapse-1" class="panel-collapse collapse fade in">
                            <div class="panel-body">
                                <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="#collapse-2" data-toggle="collapse" data-parent="#accordion">
                                Question two?
                            </a>
                        </div><!--panel title-->
                        <div id="collapse-2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a href="#collapse-3" data-toggle="collapse" data-parent="#accordion">
                                Question three?
                            </a>
                        </div><!--panel title-->
                        <div id="collapse-3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!-panel end-->
            </div>
        </section>
    </div>
    <!--faq end-->
    <!--contact-->
    <div class="container">
        <section>
            <div class="page-header" id="contact">
                <h2>Contact Us. <small>Contact us for more</small></h2>
            </div>
            
            <div class="row">
                <div class="col-lg-4">
                    <p>Send us a message,or contact us at below</p>
                    <address>
                        <strong>
                        Wiredwiki Pvt .Ltd.
                        </strong>
                        <br>
                        221 B Baker Street,London
                        UK
                    </address>
                </div>
                <div class="col-lg-8">
                    <form action="" class="form-horizontal">
                    <div class="form-group">
                        <label for="user-name" class="col-lg-2 control-label">
                            Name
                        </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="user-name" placeholder="enter your name">
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="email" class="col-lg-2 control-label">
                            Email
                        </label>
                            <div class="col-lg-10">
                                <input type="text"class="form-control" id="email" placeholder="enter your email ">
                            </div>
                        </div>
                        <div class="form-group">
                         <label for="user-website" class="col-lg-2 control-label">
                            Your website
                        </label>
                            <div class="col-lg-10">
                                <input type="text"class="form-control" id="user-website" placeholder="enter your name">
                            </div>
                            
                          
                    </div><!--end form group-->    
                     <div class="form-group">
                         <label for="user-msg" class="col-lg-2 control-label">
                           Your Message
                        </label>
                            <div class="col-lg-10">
                                <textarea id="user-msg " class="form-control" cols="20" rows="10" placeholder="Enter your message"></textarea>
                            </div>
                            
                          
                    </div><!--end form group-->  
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>    
                    </div>
                    
                    </form>
                </div>
            </div><!--row ends-->
        </section>
    </div>
    <!--contact end-->
    
    <!--footer-->
    <footer>
        <hr>
        <div class="container">
            <div class="container text-center">
                    <h3>Suscribe for more free stuff</h3>
                  <p>Enter your name and email</p>
                  <form action="" class="form-inline">
                    <div class="form-group">
                        <label for="subscription">Subscription</label>
                        <input type="text" class="form-control" id="subscription" placeholder="your name">
                         <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="email address">
                     
                    </div>
                      <button type="submit" class="btn btn-success">Suscribe</button>
                      <hr>
                  </form>
                <hr>
                <ul class="list-inline">
                    <li><a href="">Twitter</a></li>
                    <li><a href="">Facebook</a></li>
                    <li><a href="">Youtube</a></li>
                </ul>
                <p>&copy;Copyright @2014</p>
                </div>
        </div>
    </footer>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>