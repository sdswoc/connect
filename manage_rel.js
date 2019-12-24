

$(document).ready(function(){
    var conn = new WebSocket('ws://localhost:8080');
conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    console.log(e.data);
    var data = JSON.parse(e.data);
   var chat_receive = '<div class="d-flex justify-content-start mb-4">';
   chat_receive+= '<div class="img_cont_msg"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"></div>';
   chat_receive+= '<div class="msg_cotainer">'+data.msg+'<span class="msg_time">'+data.dt+'</span></div>';
   chat_receive+= '</div>';

   console.log("RECEIVED!");
            $('#msg_card_to_user_'+data.from_userID).append(chat_receive);


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
            console.log("Reached");
        }
    })
}

 function append_chat_box(to_user_id, to_user_name){

    var modal_content = '<div class="container-fluid h-100" id="user_dialog_'+to_user_id+'">';
   modal_content+= '<div class="row justify-content-center h-100">';
        
   modal_content+= '<div class="col-md-8 col-xl-6 chat">';
   modal_content+= '<div class="card" style="width: 400px"><div class="card-header msg_head">';
                
   modal_content+= '<div class="d-flex bd-highlight">';
   modal_content+= '<div class="img_cont"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img"><span class="online_icon"></span></div>';
   modal_content+= '<div class="user_info"><span>Chat with '+to_user_name+'</span><p>1767 Messages</p></div></div></div>';
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
   });

$(document).on('click', '.send_chat', function(){
    var to_user_id = $(this).attr('id');
    var from_user_id = $('#hidden_selfID').val();
    var chat_message = $('#chat_message_'+to_user_id).val();

   var chat_insert = '<div class="d-flex justify-content-end mb-4">';
   chat_insert+= '<div class="msg_cotainer_send">'+chat_message+'<span class="msg_time_send">8:55 AM, Today</span></div>';
   chat_insert+= '<div class="img_cont_msg"><img src="" class="rounded-circle user_img_msg"></div>';
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
            $('#chat_message_'+to_user_id).val('');
        }
    })
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


