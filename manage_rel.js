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