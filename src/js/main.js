/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//To initailize material design


var ret=false;
var current_league;
//Functions to add players to the team
function moveToRight(){
        shuffleOptions("availablePlayers","selectedPlayers",11);
        updateCaptain();
}
function moveToLeft(){
        shuffleOptions("selectedPlayers","availablePlayers",0);
        updateCaptain();
}

function shuffleOptions(from,to,limit){
 var fromSelectBox = document.getElementById(from);
 var toSelectBox = document.getElementById(to);
 var toSelectBoxSize = toSelectBox.options.length;
 for(var i=0; i< fromSelectBox.options.length; i++){
        if(fromSelectBox.options[i].selected){
                if(limit > 0 && toSelectBoxSize >0 && toSelectBoxSize >= limit){
                        $('#errorMessage').html('You have reached the maximum player limit for team roster:' + teamLimit);
                        $('#errorMessage').dialog("open");
                        break;
                }else{
                        var optn = document.createElement("OPTION");
                        optn.label = fromSelectBox.options[i].label;
                        optn.text = fromSelectBox.options[i].text;
                        optn.value = fromSelectBox.options[i].value;

                        toSelectBox.options.add(optn);	 		
                        fromSelectBox.remove(i);
                        shuffleOptions(from,to,limit);
                        break;
                }
        }
    }
}
function updateCaptain(){
    var selectBox = document.getElementById("selectedPlayers");
    var captainSelectBox = document.getElementById("captain");
    captainSelectBox.length = 0;
    var optn0 = document.createElement("OPTION");
    optn0.label = '';
    optn0.text = '';
    optn0.value = '0';
    if(selectBox.options[0].value == 0){
            optn0.selected = true;
    }

     for(var i=0; i< selectBox.options.length; i++){
            var optn = document.createElement("OPTION");
            optn.label = selectBox.options[i].label;
            optn.text = selectBox.options[i].text;
            optn.value = selectBox.options[i].value;
            if(selectBox.options[i].value == 0){
                    optn.selected = true;
            }
            captainSelectBox.options.add(optn);	
            var optn1 = document.createElement("OPTION");
            optn1.label = selectBox.options[i].label;
            optn1.text = selectBox.options[i].text;
            optn1.value = selectBox.options[i].value;
            if(selectBox.options[i].value == 0){
                    optn1.selected = true;
            }

     }

}

function submitForm(){
    var selectBox = document.getElementById("selectedPlayers");
    if(selectBox.options.length<2){
        alert("Please select at least two persons to form a team");
        return false;
    }
    if(selectBox.options.length>12){
        alert("Please select at least two persons to form a team");
        return false;
    }
    var selected=document.getElementById("selectedPlayers");
    for(var i=0; i< selected.options.length; i++){
        selected[i].selected=true;
    }
   }
//For cancel buttons
function redirect(){
 window.location="./admin_home.php";
}

function verifypass(pass,repass,color){
    var passfield=document.getElementById(pass);
    var repassfield=document.getElementById(repass);
    var help=document.getElementById("repasshelp");
    help.setAttribute("visibility","visible");
    if(passfield.value!=""){
         if(passfield.value===repassfield.value ){
         help.innerHTML="Passwords match!! Good to go!";
         help.setAttribute("style","font-size: 15px;color:"+color+";font-weight:bold;");
        return true;
    }
    else{
        
        help.innerHTML="Passwords don't match!!";
        help.setAttribute("style","font-size: 15px;color:orange;font-weight:bold");
      
        return false;
    }
    }
   
}

function register(pass,repass,username){
    var checkpass=verifypass(pass,repass,'white');
    console.log("checkpass is "+checkpass);
    if(checkpass){
        var str=document.getElementById(username).value;
        var uicon=document.getElementById("username-icon");
		
		console.log(uicon.style.color);
        document.getElementById(username).focus();
        
        if(uicon.style.color=="white")
            return true;
        else
            return false;
    }
    return false;
     
}

function searchusername(str) {
    var help=document.getElementById("username-help");
    var helpdiv=document.getElementById("username-input");
    
    //console.log("received inout as "+str);
    if (str =="") {
      // console.log("empty");
        return;
    } else {
        return new Promise(function(resolve, reject) {
    // Do the usual XHR stuff
         if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
     xmlhttp.open("GET","controllers/checkuser.php?q="+str,true);
        xmlhttp.onload = function() {
            if (this.readyState == 4 && this.status == 200) {
                var answer=this.responseText;
				var response=answer.split(" ")[0];
                console.log("got the response as "+response+"_");
				
                    resolve(response);
              if(response=="not"){
                  document.getElementById("username-icon").setAttribute("style","color:white;");
                  help.innerHTML="Username is available!";
                  help.setAttribute("style","font-size: 12px;color:white;");
                
                }
              else{
      
                   document.getElementById("username-icon").setAttribute("style","color:orange;");
                  help.innerHTML="Username is not available!";
                  help.setAttribute("style","font-size: 12px;color:orange;");
                  
                 
              }
            }
        };
          xmlhttp.send();
   
    });
     }
 }
 



/*

function searchusername(str,callback) {
    var help=document.getElementById("username-help");
    var helpdiv=document.getElementById("username-input");
    
    //console.log("received inout as "+str);
    if (str =="") {
      // console.log("empty");
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response=this.responseText;
            ///    console.log(response);
                    if (typeof callback == "function") {
                     // apply() sets the meaning of "this" in the callback
                        callback.apply(xmlhttp);
                      }
              if(response=="not exists"){
                  document.getElementById("username-icon").setAttribute("style","color:white;");
                  help.innerHTML="Username is available!";
                  help.setAttribute("style","font-size: 12px;color:white;");
                
                }
              else{
      
                   document.getElementById("username-icon").setAttribute("style","color:orange;");
                  help.innerHTML="Username is not available!";
                  help.setAttribute("style","font-size: 12px;color:orange;");
                  
                 
              }
            }
        };
        
        
        xmlhttp.send();
     
    }
searchusername(str).then(function(response){
            if(response==="not exists"){
                //console.log("Good to go");
                ret=true;
            }
            else{
                alert("Username already exists!!Please choose another")
                ret=false;
            }
        });
        
       
         //console.log("ret is "+ret);
         return !ret;


*/

//----------------------------------------------------------------------------------CHOOSE LEAGUE ----------------------
function selectleague(id){
    var league=id.split("-")[1];
    //console.log(league);
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    if (this.readyState == 4 && this.status == 200) {
        alert(this.responseText);
        console.log(this.responseText);
    }
     
    xmlhttp.open("GET","changeleagueid.php?id="+league,true);
   
    xmlhttp.send();
    
    //redirect to home page
    window.location.href="./admin_home.php";
    
}
//function to allow on future dates
function allowfuturedates(){
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', today);
}

//Function to delete current league
function deletecurrentleague(){
    
    if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText+ "is the response");
    }
     
    xmlhttp.open("GET","deleteleague.php",true);
    xmlhttp.send();
   window.location.href="./chooseleague.php";
}

//function to check whether league is eligible for scroring
//1.Check there are atleast two teams
//2.Cheack all teams have minimum number of players
function continuetoscore(){
   // console.log("sending");
    $.ajax({
            
            type: "POST",
            url: "continuetoscore.php",
            data: {},
            success: function(data){
               // console.log(data);
                if(data==""){
                    console.log("Good to go!!");
                    window.location.href="./admin_home.php?option=choosematch"
                }
                else{
                var body=document.getElementById("errortablebody");
                body.innerHTML="";
                var errors=data.split("-");
                for(var i=0;i<errors.length;++i){
                    if(errors[i]!=" "){
                       // console.log("error "+errors[i]);
                        body.innerHTML+="<tr><td>"+errors[i]+"</td></tr>"
                    }
                }
                
                
                 $('#errorboxslider').slideReveal("show");
             }
                
        }
        });
}

function setprogress(){
    $("#continuer").prop("disabled",true);
    $.ajax({
            type: "POST",
            url: "getstatus.php",
            data: {},
            success: function(data){
                //console.log(data);
                if(data!=""){
                var result=data.split("-");
                var count=0;
                for(var i=0;i<result.length;++i){
                        
                        count+=(1/7);
                }
               //console.log("count is "+count);
                $('#circle').circleProgress({ value: count});
                if(Math.ceil(count*100)==100)
                     $("#continuer").prop("disabled",false);
             }
        }
        });
}

//Match Section Stars

function selectmatch(id){
     var match=id.split("-")[1];
     $.ajax({
            type: "POST",
            url: "selectmatch.php",
            data: {id:match},
            success: function(data){
               // console.log(data);
                if(data=="success"){
                    window.location.href="admin_home.php?option=scorematch";
                }
        }
        });
}
