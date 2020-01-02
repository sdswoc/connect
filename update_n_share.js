

$(document).ready(function(){

notif_count();

setInterval(function(){
    update_login_status();
    notif_count();
}, 5000)

    function update_login_status(){
        $.ajax({
            url:"updateList.php?update_login_status_id=1"
        })
    }

    function notif_count(){
        $.ajax({
            url:"updateList.php?notif_count=1",
            success: function(result){
                $('#notif_count').html(result);
            }
        })
    }
})



function notify_alert(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var message = this.responseText;

            if (message !== "0") {
                document.getElementById("notif_panel").innerHTML = message;
            }

        }
    }
    xhttp.open("GET", "notify.php?id=" + id, true);
    xhttp.send();
}

function updateBio(id) {
    var bio_extract = document.getElementById('bio').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    }
    xhttp.open("GET", "notify.php?bio_update_id=" + id + "&bio="+bio_extract, true);
    xhttp.send();

}
function updateBranch(id) {
    var branch_extract = document.getElementById('branch').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("reached");
            alert(this.responseText);
        }
    }
    xhttp.open("GET", "notify.php?branch_update_id=" + id + "&branch="+branch_extract, true);
    xhttp.send();

}

function updateEmail(id) {

    var email_extract = document.getElementById('email').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("reached");
            alert(this.responseText);
        }
    }
    xhttp.open("GET", "notify.php?email_update_id=" + id + "&email="+email_extract, true);
    xhttp.send();

}

function updateBhawan(id) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    }
    var bhawan_extract = document.getElementById('bhawan').value;
    xhttp.open("GET", "notify.php?bhawan_update_id=" + id + "&bhawan=" + bhawan_extract, true);
    xhttp.send();

}

function msg_post(){
    var xhttp = new XMLHttpRequest();
    var message = document.getElementById('msg_post').value;
    if(message == ""){alert("Can\'t share empty message!")}
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('msg_status').innerHTML = this.responseText;
            document.getElementById('msg_post').value = "";
        }
    }
    xhttp.open("GET", "feed.php?msg="+message, false);
    xhttp.send();
}

function view_messages(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('public-message-container').innerHTML = this.responseText;
        }
    }
    xhttp.open("GET", "view_messages.php", true);
    xhttp.send();
}