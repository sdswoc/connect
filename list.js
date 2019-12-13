var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var http = new XMLHttpRequest();
      http.onreadystatechange = function(){
        if(this.readyState==4 && this.status == 200){
          if(this.responseText === "Deleted"){
            alert(this.responseText);
            var div = close[i].parentElement;
            div.style.display = "none";
          }
        }
     
      http.open("GET","updateList.php?delete_id="+i,false);
     http.send();
     
    }
  }
}


// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("hobbieInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function(){
         if(this.readyState==4 && this.status == 200){
            $txt = this.responseText; 
            
            if($txt === "canAdd"){document.getElementById("hobbieUL").appendChild(li);}
            else{alert($txt);}
         }
     }
     xhttp.open("GET","updateList.php?id="+inputValue,true);
     xhttp.send();

    
  }
  document.getElementById("hobbieInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var http = new XMLHttpRequest();
      http.onreadystatechange = function(){
        if(this.readyState==4 && this.status == 200){
            $txt = this.responseText;
          if($txt === "Deleted"){
            alert($txt);
            var div = close[i].parentElement;
            div.style.display = "none";
          }
        }
     
      http.open("GET","updateList.php?delete_id="+i,false);
     http.send();
     
    }
  }
}
}