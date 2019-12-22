function unfollow(id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.location.reload(true);
        }
    }
    xhttp.open("GET", "manage_rel.php?unfollow_id="+id, true);
    xhttp.send();
}

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


})
