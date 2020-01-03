
var hobbie_names = ["Dancing", "Listening Music", "Cricket", "Singing", "Fooseball", "Reading Novels"];
var goal_names = ["Gymming", "Tech Group", "UPSC", "Branch Change", "Internship"];

function name_to_index_hobbie(a){
  var res = hobbie_names.indexOf(a);
  return res;
}
function name_to_index_goal(a){
  var res = goal_names.indexOf(a);
  return res;
}


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

var goal_list = document.querySelectorAll("#goalUL li");
var i;
for(i = 0; i < goal_list.length;i++){
  var span  = document.createElement("span");
  var txt = document.createTextNode("\u00D7");
  span.className = "closeGoal";
  span.appendChild(txt);
  goal_list[i].appendChild(span);
}

var delete_goal = document.getElementsByClassName("closeGoal");
var i;
for(i = 0; i < delete_goal.length; i++){
  delete_goal[i].onclick = function (){
    var div = this.parentElement;
    let inter = div.innerText;
    let final = inter.substring(0, inter.length - 2);
    var goal_id = name_to_index_goal(final);
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState==4 && this.status == 200){
         console.log("Received echo");
         div.style.display = "none";
      }
  }
  xhttp.open("GET","updateList.php?g_delete_id="+(goal_id+1),true);
  xhttp.send();
  }
}



var delete_hobbie = document.getElementsByClassName("closeHobbie");
var i;
for(i = 0; i < delete_hobbie.length; i++){
  delete_hobbie[i].onclick = function (){
    var div = this.parentElement;
    let inter = div.innerText;
    let final = inter.substring(0, inter.length - 2);
    var hobbie_id = name_to_index_hobbie(final);
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState==4 && this.status == 200){
         console.log("Received echo");
         div.style.display = "none";
      }
  }
  xhttp.open("GET","updateList.php?h_delete_id="+(hobbie_id+1),true);
  xhttp.send();
  }
}

}

function add_goal() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("goalInput").value;
  var t = document.createTextNode(inputValue);
  var goal_id = goal_names.indexOf(inputValue);
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
             document.getElementById("goalUL").appendChild(li);
            }
           if($txt === "Already added!"){alert($txt);}
        }
    }
    xhttp.open("GET","updateList.php?g_id="+(goal_id+1),true);
    xhttp.send();
  }
  document.getElementById("goalInput").value = "";
  
  var span  = document.createElement("span");
  var txt = document.createTextNode("\u00D7");
  span.className = "closeGoal";
  span.appendChild(txt);
  li.appendChild(span);
   
  span.onclick = function(){
   

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState==4 && this.status == 200){
         var txt = this.responseText; 
         var div = span.parentElement;
         div.style.display = "none";
      }
  }
  xhttp.open("GET","updateList.php?g_delete_id="+(goal_id+1),false);
  xhttp.send();

  }
}







// Create a new list item when clicking on the "Add" button
function add_hobbie() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("hobbieInput").value;
  var t = document.createTextNode(inputValue);
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
    xhttp.open("GET","updateList.php?h_id="+(hobbie_id+1),true);
    xhttp.send();
  }
  document.getElementById("hobbieInput").value = "";
  
  var span  = document.createElement("span");
  var txt = document.createTextNode("\u00D7");
  span.className = "closeHobbie";
  span.appendChild(txt);
  li.appendChild(span);
   
  span.onclick = function(){
   

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState==4 && this.status == 200){
         var txt = this.responseText; 
         var div = span.parentElement;
         div.style.display = "none";
      }
  }
  xhttp.open("GET","updateList.php?h_delete_id="+(hobbie_id+1),false);
  xhttp.send();

  }
}

   
