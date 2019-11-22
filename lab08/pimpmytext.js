function btn() {
  alert("Hello World!");
  if (document.getElementById("ta").style.fontSize == "") {
    document.getElementById("ta").style.fontSize = "12pt";
  }
  setInterval(function(){
    document.getElementById("ta").style.fontSize = parseFloat(document.getElementById("ta").style.fontSize) + 2 + "pt";
  }, 500);
}

function check() {
  var ta = document.getElementById("ta");
  var box = document.getElementById("box");
  if (box.checked == true) {
    document.body.style.background = "url('https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg')";
    ta.style.fontWeight = "bold";
    ta.style.color = "green";
    ta.style.textDecoration = "underline";
  }
  else {
    ta.style.fontWeight = "normal";
  }
}

function Snoopify() {
  var ta = document.getElementById("ta").value;
  document.getElementById("ta").value = ta.toUpperCase();
  var array = document.getElementById("ta").value.split(".");
  document.getElementById("ta").value = array.join("-izzle.");
}

function piglatin() {
  var ta = document.getElementById("ta").value;
  document.getElementById("ta").value = ta.substring(1,ta.length + 1) + ta.substring(0,1) + "ay";
}

function Malkovitch() {
  var ta = document.getElementById("ta").value;
  if (ta.length >= 5) {
    document.getElementById("ta").value = "Malkovitch";
  }
}
