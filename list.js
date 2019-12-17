

function add_cross(){
  var hobbie_list = document.querySelectorAll("#hobbieUL li");
var i;
for(i = 0; i < hobbie_list.length;i++){
  var span  = document.createElement("span");
  var txt = document.createTextNode("\u00D7");
  span.className = "closeHobbie";
  span.appendChild(txt);
  hobbie_list[i].appendChild(span);
}

var delete_hobbie = document.getElementsByClassName("closeHobbie");
var i;
for(i = 0; i < delete_hobbie.length; i++){
  delete_hobbie[i].onclick = function (){
    var div = this.parentElement;
    div.style.display = "none" ;
  }
}

}




// Create a new list item when clicking on the "Add" button
function add_hobbie() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("hobbieInput").value;
  var t = document.createTextNode(inputValue);
  var hobbie_names = ["Dancing", "Listening Music", "Cricket", "Singing", "Fooseball", "Reading Novels"];
  var hobbie_id = hobbie_names.indexOf(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } 
  else {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status == 200){
           $txt = this.responseText; 
           if($txt === "canAdd"){
             document.getElementById("hobbieUL").appendChild(li);
            }
           if($txt === "Already added!"){alert($txt);}
        }
    }
    xhttp.open("GET","updateList.php?id="+(hobbie_id+1),true);
    xhttp.send();
  }
  document.getElementById("hobbieInput").value = "";
  
  var span  = document.createElement("span");
  var txt = document.createTextNode("\u00D7");
  span.className = "closeHobbie";
  span.appendChild(txt);
  li.appendChild(span);
   
  span.onclick = function(){
    var div = this.parentElement;
    div.style.display = "none";
  }
}

   
