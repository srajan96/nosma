	var mid=-1;
	

	
	
	function updateScroll(){
    var element = document.getElementById("messageInsertHere");
    element.scrollTop = element.scrollHeight;
}

//srajan start
function loadGroupOptions(){
     $.ajax({
            type: "POST",
            url: "controllers/checkforadmin.php",
            data: {gid:sessionStorage.chattingto},
            success: function(data){
             
                if(data==="ITS ADMIN"){
                      // console.log("--------------------ALLOWED-----------------------");
                       var string='<button class="btn btn-box-tool" onclick="fillUserSelect()" data-toggle="modal" data-target="#addmember-dialog"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>';
                       string+='<button class="btn btn-box-tool" onclick="fillRemoveBox()" data-toggle="modal" data-target="#removemember-dialog"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>';
                       string+='<button class="btn btn-box-tool" data-toggle="modal" data-target="#deletegroup-dialog"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
                       var box=document.getElementById("optbox");
                       var newopts=string+box.innerHTML;
                       box.innerHTML=newopts;
                }
              
                        }
        });
}
function fillUserSelect(){
    var select=document.getElementById("newmember");
     
    //console.log("=----------------------------current select is -----------"+select);
     $.ajax({
            type: "POST",
            url: "controllers/load_new_members.php",
            data: {gid:sessionStorage.chattingto},
            success: function(data){
                console.log(data);
                data=JSON.parse(data);
                //console.log("--------------------outputting data---------------");
                //console.log(data);
                var string="";
                data.forEach(function(arr){
    
                    string+="<option value='"+arr.username+"'>"+arr.name+"</option>"; 
                 });
                 console.log(string);
              select.innerHTML=string;
                //$(".chosen-select2").chosen({width: "100%"});
            }});
}

function fillRemoveBox(){
   var select=document.getElementById("oldmember");
     select.innerHTML="";
    //console.log("=----------------------------current select is -----------"+select);
     $.ajax({
            type: "POST",
            url: "controllers/load_current_members.php",
            data: {gid:sessionStorage.chattingto},
            success: function(data){
                console.log(data);
                data=JSON.parse(data);
                console.log("--------------------outputting data---------------");
                //console.log(data);
                var string="";
                data.forEach(function(arr){
    
                    string+="<option value='"+arr.username+"'>"+arr.name+"</option>"; 
                 });
                 console.log(string);
              select.innerHTML=string;
                //$(".chosen-select2").chosen({width: "100%"});
            }});
}

     function addNewMembersToGroup() {
        
          var members=[];
          //console.log("aaaaaaaaaaaaaaaaaaaaaaagggggggggggggggggggggggggggggggggggaaaaaaaaaaaaaaaaaaaaaaaaa");
        $('#newmember :selected').each(function(i, selected){ 
          members[i] = $(selected).val();
      });
         $.ajax({
            type: "POST",
            url: "controllers/new_member_adder.php",
            data: {gid:sessionStorage.chattingto,members:members},
            success: function(data){
                console.log("0-------------------------------=======================----------------");
                console.log(data);

                $.snackbar({content: name+" Contacts added to groups!", timeout: 2000,id:"mysnack"});
                $("#addmemberform")[0].reset();
                //$('#addcontacttogroup').html('');
                //$('#newmember').val('').trigger('chosen:updated');
            }
        });
        
      }
      
      function removeMembersFromGroup() {
        
          var members=[];
          //console.log("aaaaaaaaaaaaaaaaaaaaaaagggggggggggggggggggggggggggggggggggaaaaaaaaaaaaaaaaaaaaaaaaa");
        $('#oldmember :selected').each(function(i, selected){ 
          members[i] = $(selected).val();
      });
         $.ajax({
            type: "POST",
            url: "controllers/old_member_remover.php",
            data: {gid:sessionStorage.chattingto,members:members},
            success: function(data){
                console.log("0-------------------------------##############----------------");
                console.log(data);

                $.snackbar({content: name+" Contacts removed from groups!", timeout: 2000,id:"mysnack"});
                $("#removememberform")[0].reset();
                //$('#addcontacttogroup').html('');
                //$('#newmember').val('').trigger('chosen:updated');
            }
        });
        
      }
      
      function deleteGroup(){
          $.ajax({
            type: "POST",
            url: "controllers/deleteGroup.php",
            data: {gid:sessionStorage.chattingto},
            success: function(data){
               // console.log("0-------------------------------##############----------------");
                console.log(data);

                $.snackbar({content: name+"Group deleted!", timeout: 2000,id:"mysnack"});
                location.reload();
//$('#openGroups').click();
                //$('#addcontacttogroup').html('');
                //$('#newmember').val('').trigger('chosen:updated');
            }
        });
      }
//srajan end
	
  function loadChatBox(id)
  {
      
    var contactto=id.split("-")[1];
	sessionStorage.chattingto=contactto;
	mid = -1;
	
	
	var removeMultipleBox = document.getElementById('chatboxmain');
	while( removeMultipleBox.hasChildNodes() ){
		removeMultipleBox.removeChild(removeMultipleBox.lastChild);
	}
	
	
	var template = $('#contacts-template').html();
	console.log(contactto);
	$('#chatboxmain').append(template);
	
	//document.getElementById('chatboxmain')
	document.getElementById('messageInsertHere').innerHTML = '';
	
	
        console.log(contactto);
        loadChatTitle();
	
	//loadMessages(contactto);
	//sessionStorage.contactsTimer=setInterval(function(){loadMessages(sessionStorage.chattingto); console.log("mid is "+ mid); },500);
//srajan start	
        if(sessionStorage.type=="g")
            loadGroupOptions();
//srajan end
      startChattingInterval();
  }
  
    function messagesender(){
		console.log("clicked");
	     
		  var message=document.getElementById("sendMessageInput").value;
		 
		  
		   $.ajax({
            type: "POST",
            url: "controllers/message_sender.php",
            data: {to_username:sessionStorage.chattingto,msg:message,"type":sessionStorage.type},
            success: function(data){
                console.log("i did it "+data);
                document.getElementById("sendMessageInput").value="";
                        }
        });
		  
	 
  }
  
  function appendMessages()
{
	/*
	<div class="direct-chat-info clearfix">
        <span class="direct-chat-name pull-left">Alexander Pierce</span>
        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
    </div>
	<div class="direct-chat-text">
                Is this template really for free? That's unbelievable!
              </div>
	 <div class="direct-chat-messages">
	 */
	appendLeftMessage();
	appendRightMessage();
	//id="sendMessageInput"
	
	//	from_iser_id == session_is -> left
	
}
		
function appendLeftMessage(arr)
{	console.log("Appending msg left");

	var msg = document.getElementById('sendMessageInput').value;
	console.log(arr.msg);
	
	bigdiv = document.createElement("div");
	bigdiv.className += 'direct-chat-msg';
	
	
	div = document.createElement("div");
	div.className += 'direct-chat-info clearfix';
	
	span1 = document.createElement("span");
	span1.className += 'direct-chat-name pull-left';
	
	text1 = document.createTextNode(arr.from_username);
	span1.appendChild(text1);
	
	span2 = document.createElement("span");
	span2.className += 'direct-chat-timestamp pull-right';
	
	text2 = document.createTextNode(arr.date_time);
	span2.appendChild(text2);
	
	div.appendChild(span1);
	div.appendChild(span2);
	
	div2 = document.createElement("div");
	div2.className += 'direct-chat-text';
	text3 = document.createTextNode(arr.msg);
	
	div2.appendChild(text3);
	
	bigdiv.appendChild(div);
	bigdiv.appendChild(div2);
	var rootDIV = document.getElementById('messageInsertHere');
	rootDIV.appendChild(bigdiv);
	
	
}	

function appendRightMessage(arr)
{	
		
	console.log("Appending msg right");
	
	var msg = document.getElementById('sendMessageInput').value;
	console.log(arr.msg);
	
	bigdiv = document.createElement("div");
	bigdiv.className += 'direct-chat-msg right';
	
	
	div = document.createElement("div");
	div.className += 'direct-chat-info clearfix';
	
	span1 = document.createElement("span");
	span1.className += 'direct-chat-name pull-right';
	
	text1 = document.createTextNode(arr.from_username);
	span1.appendChild(text1);
	
	span2 = document.createElement("span");
	span2.className += 'direct-chat-timestamp pull-left';
	
	text2 = document.createTextNode(arr.date_time);
	span2.appendChild(text2);
	
	div.appendChild(span1);
	div.appendChild(span2);
	
	div2 = document.createElement("div");
	div2.className += 'direct-chat-text';
	text3 = document.createTextNode(arr.msg);
	
	div2.appendChild(text3);
	
	bigdiv.appendChild(div);
	bigdiv.appendChild(div2);
	var rootDIV = document.getElementById('messageInsertHere');
	rootDIV.appendChild(bigdiv);
	
}

function loadmessages() {
        
          console.log("clicled in load");
           var tbody=document.getElementById("contacttablebody");
            //console.log("The old league is "+oldleague);
            //console.log(options);
          $.ajax({
            type: "POST",
            url: "controllers/contact_loader.php",
            data: {},
           //dataType: "json",
            success: function(data){
                var arr=JSON.parse(data);
                var i;
                var str="";
                  for(i = 0; i < arr.length; i++){
                      
                     str+= "<tr><td><div id='chat-"+arr[i].username+"' onclick='loadChatBox(this.id)'>"+arr[i].name+"</div></td></tr>";
                        
                  }
                 tbody.innerHTML=str;
            //document.getElementById("leaguename").innerHTML=name;
               
                        }
        });
    }
function closeChatButton(){
	clearInterval(sessionStorage.contactsTimer);
	delete sessionStorage.contactsTimer;
	delete sessionStorage.chattingto;
} 
function startChattingInterval(){
	//sessionStorage.c="c";
	if(sessionStorage.getItem("contactsTimer") === null){
		if(sessionStorage.getItem("chattingto") !== null){
			sessionStorage.contactsTimer=setInterval(function(){loadMessages(sessionStorage.chattingto,sessionStorage.type); console.log("mid is "+ mid); },2000);
		}	
	}
	else
		sessionStorage.contactsTimer=setInterval(function(){loadMessages(sessionStorage.chattingto,sessionStorage.type); console.log("mid is "+ mid); },2000);
		
		
}
function stopChattingInterval(){
//	sessionStorage.hello="hello";
	if(sessionStorage.getItem("contactsTimer") !== null){
	//	sessionStorage.h="h";
		clearInterval(sessionStorage.contactsTimer);
	}
}
/*
$("#closeChatButton").on("click",function(){
	
	sessionStorage.contactsTimer.clearInterval();
	delete sessionStorage.contactsTimer;
	delete sessionStorage.chattingto;
	
});	  */

function loadContactList() {
        
          console.log("clicled in load");
           var tbody=document.getElementById("contacttablebody");
            //console.log("The old league is "+oldleague);
            //console.log(options);
          $.ajax({
            type: "POST",
            url: "controllers/contact_loader.php",
            data: {},
           //dataType: "json",
            success: function(data){
                var arr=JSON.parse(data);
                var i;
                var str="";
                  for(i = 0; i < arr.length; i++){
                     str+= "<tr><td><div id='chat-"+arr[i].username+"' onclick='loadChatBox(this.id)'>"+arr[i].name+"</div></td></tr>";
                        
                  }
                 tbody.innerHTML=str;
            //document.getElementById("leaguename").innerHTML=name;
               
                        }
        });
    }
    
function loadContactToAddGroup() {
        
          console.log("clicled in load");
          var element=document.getElementById("addcontacttogroup");
            //console.log("The old league is "+oldleague);
            //console.log(options);
          $.ajax({
            type: "POST",
            url: "controllers/contact_loader.php",
            data: {},
           //dataType: "json",
            success: function(data){
                var arr=JSON.parse(data);
                var i;
                var str="";
                  for(i = 0; i < arr.length; i++){
                     str+= "<option value='"+arr[i].username+"'>"+arr[i].name+"</option>";
                        
                  }
                 // console.log(element.innerHTML);
                 element.innerHTML=str;
                 //console.log("mew--------------------"+element.innerHTML);
                 $(".chosen-select").chosen({width: "100%"});
            //document.getElementById("leaguename").innerHTML=name;
               
                        }
        });
    }

function loadGroupList() {
        
          console.log("clicled in load group list");
           var tbody=document.getElementById("grouptablebody");
            //console.log("The old league is "+oldleague);
            //console.log(options);
          $.ajax({
            type: "POST",
            url: "controllers/group_loader.php",
            data: {},
           //dataType: "json",
            success: function(data){
                console.log(data);
				var arr=JSON.parse(data);
				console.log(arr);
                var i;
                var str="";
                  for(i = 0; i < arr.length; i++){
                     str+= "<tr><td><div id='chat-"+arr[i].group_id+"' onclick='loadChatBox(this.id)'>"+arr[i].group_name+"</div></td></tr>";
                        
                  }
                 tbody.innerHTML=str;
            //document.getElementById("leaguename").innerHTML=name;
               
                        }
        });
    }


function loadGroups(){
	console.log("In groups");
	var remove = document.getElementById('master');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
	
	
	var template = $('#choose-groups-template').html();
	
        
	var remove = document.getElementById('chatboxmain');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
        
          var remove = document.getElementById('bigmasterkid');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
	$('#master').append(template);
        sessionStorage.mid=-1;
        sessionStorage.type="g";
        
	loadGroupList();
}
function loadContacts(){
	console.log("In load contacts");
	var remove = document.getElementById('master');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
	var template = $('#choose-contacts-template').html();
        var remove = document.getElementById('chatboxmain');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
        
         var remove = document.getElementById('bigmasterkid');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
        
	$('#master').append(template);
        sessionStorage.type="c";
	loadContactList();
}
function sharenotetomember(){
     var memberscontact=[];
     var membersgroup=[];
          //console.log("aaaaaaaaaaaaaaaaaaaaaaagggggggggggggggggggggggggggggggggggaaaaaaaaaaaaaaaaaaaaaaaaa");
        $('#newmembercontact :selected').each(function(i, selected){ 
          memberscontact[i] = $(selected).val();
      });
      $('#newgroupcontact :selected').each(function(i, selected){ 
          membersgroup[i] = $(selected).val();
      });
         $.ajax({
            type: "POST",
            url: "controllers/sharetocontactsgroups.php",
            data: {pdfid:sessionStorage.pdf,memberscontact:memberscontact,membersgroup:membersgroup},
            success: function(data){
                console.log("0-------------------------------=======================----------------");
                console.log(data);
                
                
                 $.snackbar({content: name+" Shared", timeout: 2000,id:"mysnack"});
                $("#sharememberform")[0].reset();
                
                //$('#addcontacttogroup').html('');
                //$('#newmember').val('').trigger('chosen:updated');
            }
        });
}
function fillcontactstoshare(id){
    sessionStorage.pdf=id;
     var select1=document.getElementById("newmembercontact");
     var select2=document.getElementById("newgroupcontact");
     
     select1.innerHTML="";
     select2.innerHTML="";
    //console.log("=----------------------------current select is -----------"+select);
     $.ajax({
            type: "POST",
            url: "controllers/contact_loader.php",
            data: {},
            success: function(data){
                console.log(data);
                data=JSON.parse(data);
                console.log("--------------------outputting data---------------");
                //console.log(data);
                var string="";
                data.forEach(function(arr){
    
                    string+="<option value='"+arr.username+"'>"+arr.name+"</option>"; 
                 });
                 console.log(string);
              select1.innerHTML=string;
                //$(".chosen-select2").chosen({width: "100%"});
            }});
        $.ajax({
            type: "POST",
            url: "controllers/group_loader.php",
            data: {},
            success: function(data){
                console.log(data);
                data=JSON.parse(data);
                console.log("--------------------outputting data---------------");
                //console.log(data);
                var string="";
                data.forEach(function(arr){
    
                    string+="<option value='"+arr.group_id+"'>"+arr.group_name+"</option>"; 
                 });
                 console.log(string);
              select2.innerHTML=string;
                //$(".chosen-select2").chosen({width: "100%"});
            }});
}
function viewHistory(){
	console.log("In viewHistory");
	var remove = document.getElementById('master');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
        var remove = document.getElementById('chatboxmain');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
        var remove = document.getElementById('bigmasterkid');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
        var template = $('#viewhistory-template').html();
        $('#bigmasterkid').prepend(template);
        $.ajax({
            type:"POST",
            url:"controllers/viewhistory.php",
            data:{},
            success:function(data){
                if(data){
                    console.log(data);
                    arr=JSON.parse(data);
                    console.log(arr);
                    if(arr.length!=0){
                        hbody=document.getElementById("historytablebody");
                        str="";
                        i=0;
                        for(i=0;i<arr.length;i++){
                            str+="<tr><td>"+arr[i].notename+"</td><td>"+arr[i].time+"</td>";
                            str+='<td><a href="'+arr[i].pdf_name+'" target="_blank""><i class="fa fa-download" aria-hidden="true"></i></a>';
                            str+='<button class="btn btn-box-tool" onclick="fillcontactstoshare(this.id)" id="'+arr[i].link_id+'" data-toggle="modal" data-target="#sharenotes-dialog"><i class="fa fa-share-square-o" aria-hidden="true"></i></button></td></tr>';
                       }
                       hbody.innerHTML=str;
                    }    
                }
                
            }
        });
}
function convertToPdf(){
	console.log("In convertToPdf");
	var remove = document.getElementById('master');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
        var template = $('#converttopdf-template').html();
	$('#big-master').append(template);
	
}
function addContacts(){
	console.log("In add Contacts");
	var remove = document.getElementById('master');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
}
function removeContacts(){
	console.log("In removeContacts");
	var remove = document.getElementById('master');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
}
function createGroup(){
	console.log("In createGroup");
	var remove = document.getElementById('master');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
}
function removeGroup(){
	console.log("In removeGroup");
	var remove = document.getElementById('master');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
       
}

//srajan starts
function loadChatTitle(){
    var type="c";
    if(sessionStorage.type==="g")
    type="g";
     $.ajax({
            type: "POST",
            url: "controllers/chatnameloader.php",
            data: {type:type,to:sessionStorage.chattingto},
           //dataType: "json",
            success: function(data){
                
                console.log(data);
                $('#chatTitle').html(data);
            }
        
    });
    
}
    
    

function loadStats(){
	console.log("In openstats");
	var remove = document.getElementById('master');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
        var remove = document.getElementById('chatboxmain');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
         var remove = document.getElementById('bigmasterkid');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
          $.ajax({
            type: "POST",
            url: "controllers/stat_loader.php",
            data: {},
           //dataType: "json",
            success: function(data){
            console.log(data);
            var arr=JSON.parse(data);
            console.log(arr);
            var template = $('#viewstats-template').html();
            $('#bigmasterkid').append(template);
            $('#msgcount').html(arr.message);
            $('#grpcount').html(arr.group);
            $('#usercount').html(arr.user);
            $('#convcount').html(arr.upload);
            
            
            //document.getElementById("leaguename").innerHTML=name;
               
                        }
        });
        
	
}
function searchLibrary(){
    console.log("In search library");
	var remove = document.getElementById('master');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
        var remove = document.getElementById('chatboxmain');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
         var remove = document.getElementById('bigmasterkid');
	while( remove.hasChildNodes() ){
		remove.removeChild(remove.lastChild);
	}
         var template = $('#searchlibrary-template').html();
	$('#bigmasterkid').append(template);
	
        
}
function loadContactToRemoveContact() {
        
          console.log("clicled in load");
          var element=document.getElementById("removecontacts_select");
            //console.log("The old league is "+oldleague);
            //console.log(options);
          $.ajax({
            type: "POST",
            url: "controllers/contact_loader.php",
            data: {},
           //dataType: "json",
            success: function(data){
                var arr=JSON.parse(data);
                var i;
                var str="";
                  for(i = 0; i < arr.length; i++){
                     str+= "<option value='"+arr[i].username+"'>"+arr[i].name+"</option>";
                        
                  }
                 // console.log(element.innerHTML);
                 element.innerHTML=str;
                 //console.log("mew--------------------"+element.innerHTML);
                 $(".chosen-select2").chosen({width: "100%"});
            //document.getElementById("leaguename").innerHTML=name;
               
                        }
        });
    }
function loadsearchresult(){
    searchinput=document.getElementById('searchlibraryinput');
    console.log(searchinput.value);
     $.ajax({
            type: "POST",
            url: "controllers/searchlibrary.php",
            data: {term:searchinput.value},
           //dataType: "json",
            success: function(data){
                
                console.log(data);
                var template = $('#viewhistory-template').html();
                $('#bigmasterkid').append(template);
                 if(data){
                    console.log(data);
                    arr=JSON.parse(data);
                    console.log(arr);
                    if(arr.length!=0){
                        hbody=document.getElementById("historytablebody");
                        str="";
                        i=0;
                        for(i=0;i<arr.length;i++){
                            str+="<tr><td>"+arr[i].notename+"</td><td>"+arr[i].time+"</td>";
                            str+='<td><a href="'+arr[i].pdf_name+'" target="_blank""><i class="fa fa-download" aria-hidden="true"></i></a>';
                            str+='<button class="btn btn-box-tool" onclick="fillcontactstoshare(this.id)" id="'+arr[i].link_id+'" data-toggle="modal" data-target="#sharenotes-dialog"><i class="fa fa-share-square-o" aria-hidden="true"></i></button></td></tr>';
                       }
                       hbody.innerHTML=str;
                    }    
                }
            }
        
    });
}

function loadMedia(){
     $.ajax({
            type: "POST",
            url: "controllers/medialoader.php",
            data: {to:sessionStorage.chattingto,type:sessionStorage.type},
           //dataType: "json",
            success: function(data){
                console.log("__________________-----------------------------------________________________");
                 if(data){
                    console.log(data);
                    arr=JSON.parse(data);
                    console.log(arr);
                    if(arr.length!=0){
                        hbody=document.getElementById("mediabox");
                        str="";
                        i=0;
                        for(i=0;i<arr.length;i++){
                             str+='<li><a href="#"><div class="contacts-list-info"><span class="contacts-list-name"><a href="'+arr[i].pdf_name+'" target="_blank""><i class="fa fa-download" aria-hidden="true"></i></a><button class="btn btn-box-tool" onclick="fillcontactstoshare(this.id)" id="'+arr[i].link_id+'" data-toggle="modal" data-target="#sharenotes-dialog"><i class="fa fa-share-square-o" aria-hidden="true"></i></button></span> <span class="contacts-list-msg">'+arr[i].notename+'</span>\
                  </div>\
                  <!-- /.contacts-list-info -->\
                </a>\
              </li>';
                        }
                       hbody.innerHTML=str;
                    }    
                }
              
                
                console.log(data);
                
            }
        
    });
 }
$('#openStats').click(function(){ stopChattingInterval();loadStats(); return false; });
//srajan ends
$('#openGroups').click(function(){ stopChattingInterval();loadGroups(); return false; });
$('#openContacts').click(function(){stopChattingInterval(); loadContacts(); return false; });
$('#viewHistory').click(function(){ stopChattingInterval();viewHistory(); return false; });
//$('#convertToPdf').click(function(){ convertToPdf(); return false; });
//$('#addContacts').click(function(){ addContacts(); return false; });
$('#removeContacts').click(function(){ removeContacts(); return false; });
//$('#createGroup').click(function(){ createGroup(); return false; });
//$('#removeGroup').click(function(){ removeGroup(); return false; });
$('#noteLibrary').click(function(){ stopChattingInterval();searchLibrary(); return false; });






$("#addContactForm").submit(function(e) {
    e.preventDefault();
	var help=document.getElementById("userhelp");
	var user=document.getElementById("addContactUsername");
	var username=user.value;
	help.setAttribute("visibility","visible");
	help.innerHTML="Checking...";
    help.setAttribute("style","font-size: 15px;color:black;font-weight:bold;");
	//console.log("user"+username)
    if($.trim(username)!=""){
		$.ajax({
			type:"POST",
			url:"controllers/contact_adder.php",
			data:{username:username},
			success:function(data){
				console.log(data);
				if(data=="done"){
					help.innerHTML="Successfully Added!!!";
					user.value="";
				}
				else if(data=="not exists"){
					help.innerHTML="User does not exist";
					help.setAttribute("style","color:red");
				}
				else if(data=="present"){
					help.innerHTML="Already present in your contacts!!!";
					help.setAttribute("style","color:green;");
				}
				else{
					help.innerHTML="Try again...";
					help.setAttribute("style","color:red");
				
				}
					
				//user.value="";	
			}
		});


		//help.innerHTML=username.value+" hey";
         //help.setAttribute("style","font-size: 15px;color:red;font-weight:bold;");
		//console.log("in if add contact");
		
	}
	//console.log("outside if add contact");
			
    });
	
                 