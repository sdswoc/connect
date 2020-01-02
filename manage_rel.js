

$(document).ready(function(){
    var conn = new WebSocket('ws://localhost:8080');
conn.onopen = function(e) {
    console.log("Connection established!");
};

function get_img(to_id){
    var img_url = '';
    $.ajax({
        url: "get_chats.php?get_img_id="+to_id,
        method: "GET",
        success: function(data){
            if( data !== ''){img_url = "userImages/"+data;}
            else{ img_url += "res/default.jpeg"}
            console.log(img_url);
            $(".img_sml_"+to_id).attr('src',img_url);

            }
    }) 
   
}

conn.onmessage = function(e) {
    
    console.log(e.data);
    var data = JSON.parse(e.data);
   
   var chat_receive = '<div class="d-flex justify-content-start mb-4">';
   chat_receive+= '<div class="img_cont_msg"><img src="" class="rounded-circle user_img_msg img_sml_'+data.from_userID+'"></div>';
   chat_receive+= '<div class="msg_cotainer">'+data.msg+'<span class="msg_time">'+data.dt+'</span></div>';
   chat_receive+= '</div>';

   console.log("RECEIVED!");
            $('#msg_card_to_user_'+data.from_userID).append(chat_receive);
            $('#msg_card_to_user_'+data.from_userID).animate({scrollTop:$("#msg_card_to_user_"+data.from_userID)[0].scrollHeight}, 1000); 
            get_img(data.from_userID);


};

fetch_users();

setInterval(function(){
    fetch_users();
}, 5000);

function fetch_users(){
    $.ajax({
        url:"fetch_users.php", 
        method: "POST",
        success:function(result){
            $('#user-details').html(result);
        }
    })
}




 function append_chat_box(to_user_id, to_user_name){

    setInterval(function(){
        update_login_status(to_user_id);
        msg_count(to_user_id);
    }, 3000);

   
    function update_login_status(to_user_id){
        var status = $('#status_'+to_user_id).html();
        if(status === "ONLINE"){
            $('#status_id_'+to_user_id).show();
        }
        if(status === "OFFLINE"){
            $('#status_id_'+to_user_id).hide();
        }

    }

    function msg_count(to_user_id){
        $.ajax({
            url: "get_chats.php?msg_count_id="+to_user_id,
            method: "GET",
            success: function(data){
                $('#msg_count_'+to_user_id).html(data);
            }
        })
    }

    function get_img_self(to_id){
        var img_url = '';
        $.ajax({
            url: "get_chats.php?get_img_id="+to_id,
            method: "GET",
            success: function(data){
                if( data !== ''){img_url = "userImages/"+data;}
                else{ img_url += "res/default.jpeg"}
                console.log(img_url);
                $(".img_sml_self_"+to_id).attr('src',img_url);

                }
        }) 
       
    }


    function get_img(to_id){
        var img_url = '';
        $.ajax({
            url: "get_chats.php?get_img_id="+to_id,
            method: "GET",
            success: function(data){
                if( data !== ''){img_url = "userImages/"+data;}
                else{ img_url += "res/default.jpeg"}
                $("#img_"+to_user_id).attr('src',img_url);
                $(".img_sml_"+to_user_id).attr('src',img_url);
                }
        }) 
       
    }
    update_chats();
 function update_chats(){
     $.ajax({
        url: "get_chats.php?to_ID="+to_user_id,
        method: "GET",
        success: function(data){
            if(data != 0){
                $('#msg_card_to_user_'+to_user_id).html(data);
            }
            
        }
    })
    var from_user_id = $('#hidden_selfID').val();
    get_img(to_user_id);
 get_img_self(from_user_id);
 }
 
 

    var modal_content = '<div class="container-fluid h-100" id="user_dialog_'+to_user_id+'">';
   modal_content+= '<div class="row justify-content-center h-100">';
        
   modal_content+= '<div class="col-md-8 col-xl-6 chat">';
   modal_content+= '<div class="card" style="width: 400px"><div class="card-header msg_head">';
                
   modal_content+= '<div class="d-flex bd-highlight">';
   modal_content+= '<div class="img_cont"><img src="" class="rounded-circle user_img" id="img_'+to_user_id+'"><span style="display: none;" id="status_id_'+to_user_id+'" class="online_icon"></span></div>';
   modal_content+= '<div class="user_info"><span>Chat with '+to_user_name+'</span><p id="msg_count_'+to_user_id+'"></p></div></div></div>';
   modal_content+= '<div class="card-body msg_card_body" id="msg_card_to_user_'+to_user_id+'">';
   modal_content+= '</div>';
                    
                
   modal_content+= '<div class="card-footer"><div class="input-group">';
   modal_content+= '<textarea id="chat_message_'+to_user_id+'" class="form-control type_msg" placeholder="Type your message..."></textarea>';
   modal_content+= '<div class="input-group-append"><button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div>';
   modal_content+= '</div></div></div></div></div></div>';
   $('#user_model_details').html(modal_content);


 }

 $(document).on('click', '.start_chat', function(){


    var to_user_id = $(this).data('touserid');
    var to_user_name = $(this).data('tousername');
    append_chat_box(to_user_id, to_user_name);
    $("#user_dialog_"+to_user_id).dialog({
     autoOpen:false,
    });
    $('#user_dialog_'+to_user_id).dialog('open');
    $('#msg_card_to_user_'+to_user_id).animate({scrollTop:$("#msg_card_to_user_"+to_user_id)[0].scrollHeight}, 1000); 

  

    document.getElementById('chat_message_'+to_user_id).onkeypress = function(e){
        if(e.which == 13 && !e.shiftKey){
           $('.send_chat').click();
        }
    }

   });

  

  

$(document).on('click', '.send_chat', function(){

  
    function get_img_self(to_id){
        var img_url = '';
        $.ajax({
            url: "get_chats.php?get_img_id="+to_id,
            method: "GET",
            success: function(data){
                if( data !== ''){img_url = "userImages/"+data;}
                else{ img_url += "res/default.jpeg"}
                console.log(img_url);
                $(".img_sml_self_"+to_id).attr('src',img_url);

                }
        }) 
       
    }

    var to_user_id = $(this).attr('id');
    var from_user_id = $('#hidden_selfID').val();
    var chat_message = $('#chat_message_'+to_user_id).val();

 if(chat_message !== ''){
    var chat_insert = '<div class="d-flex justify-content-end mb-4">';
   chat_insert+= '<div class="msg_cotainer_send">'+chat_message+'<span class="msg_time_send"></span></div>';
   chat_insert+= '<div class="img_cont_msg"><img src="" class="rounded-circle user_img_msg img_sml_self_'+from_user_id+'"></div>';
   chat_insert+= '</div>';

  
   var data = {
       from_userID: from_user_id, to_userID: to_user_id, msg: chat_message
   };

   conn.send(JSON.stringify(data));


    $.ajax({
        url: "insert_chat.php?to_id="+to_user_id+"&chat_msg="+chat_message,
       method: "GET",
        success:function(data){
            console.log("SENT!");
            $('#msg_card_to_user_'+to_user_id).append(chat_insert);
            $('#msg_card_to_user_'+to_user_id).animate({scrollTop:$("#msg_card_to_user_"+to_user_id)[0].scrollHeight}, 1000); 
            $('#chat_message_'+to_user_id).val('');
        }
    })
    get_img_self(from_user_id);
    

 }

})
   
  });


function unfollow(id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          
        }
    }
    xhttp.open("GET", "manage_rel.php?unfollow_id="+id, true);
    xhttp.send();
}


