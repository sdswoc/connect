function notify_alert(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var message = this.responseText;

            if (message !== "0") {
                alert(message);
                location.reload(true);
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
    xhttp.open("GET", "notify.php?bio_update_id=" + id + "&bio=" + bio_extract, true);
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