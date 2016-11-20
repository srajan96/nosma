/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
$("#submitbtn").click(function(e) {
e.preventDefault();
var name = $('#name').val();
var username = $('#username').val();
var email = $('#email').val();
var password = $('#password').val();
//console.log("name and password are "+name+" "+password);
if(register('password','repass','username')){
    $.ajax({
    type: "POST",
    url: "register_insert.php",
    data: {name: name,username:username,email:email,password:password},
    success: function(data){
        var mypanel=document.getElementById("mypanel");
        var panelbody=document.getElementById("registerpanelbody");
        mypanel.style.marginTop="60px";
        panelbody.setAttribute("class","panel-body text-center");
        panelbody.innerHTML="<h2>You are now registered with CricScorer</h2><br><h4>Redirecting to login in 3 seconds</h4>";
        var delay = 3000; //Your delay in milliseconds
        setTimeout(function(){ window.location = "/clhs/index.php"; }, delay);
    
}
}); 
}
});
});



