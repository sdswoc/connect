

$(document).ready(function(){

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

function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">Aryaman';
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
    var to_user_id = $(this).data('touserid');
    var to_user_name = $(this).data('tousername');
    make_chat_dialog_box(to_user_id, to_user_name);
    $("#user_dialog_"+to_user_id).dialog({
     autoOpen:false,
     width:400
    });
    $('#user_dialog_'+to_user_id).dialog('open');
   });

$(document).on('click', '.send_chat', function(){
    var to_user_id = $(this).attr('id');
    var chat_message = $('#chat_message_'+to_user_id).val();
    $.ajax({
        url: "insert_chat.php?to_id="+to_user_id+"&chat_msg="+chat_message,
       method: "GET",
        success:function(data){
            console.log("SENT!");
            alert(data);
            $('#chat_message'+to_user_id).val('');
            $('#chat_history'+to_user_id).html(data);
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


