
var hobbie_names = ["Dancing", "Listening Music", "Cricket", "Singing", "Fooseball", "Reading Novels"];

function n_2_i(a){
  var res = hobbie_names.indexOf(a);
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



var delete_hobbie = document.getElementsByClassName("closeHobbie");
var i;
for(i = 0; i < delete_hobbie.length; i++){
  delete_hobbie[i].onclick = function (){
    var div = this.parentElement;
    let inter = div.innerText;
    let final = inter.substring(0, inter.length - 2);
    console.log(inter);
    var hobbie_id = n_2_i(final);
    
    console.log(hobbie_id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState==4 && this.status == 200){
         var txt = this.responseText; 
         console.log("Received echo");
         div.style.display = "none";
         alert(txt);
      }
  }
  xhttp.open("GET","updateList.php?delete_id="+(hobbie_id+1),true);
  xhttp.send();
  }
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
   

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState==4 && this.status == 200){
         var txt = this.responseText; 
         var div = span.parentElement;
         div.style.display = "none";
      }
  }
  xhttp.open("GET","updateList.php?delete_id="+(hobbie_id+1),false);
  xhttp.send();

  }
}

   
