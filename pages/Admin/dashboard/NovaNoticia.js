let inputFile = document.querySelector(".file");
let a = document.querySelector(".preview-img");
let inputTitle = document.querySelector(".input-title");
let paragraphTitle = document.querySelector(".notice-title");
let paragraphDate = document.querySelector(".datenow");
let paragraphDescription = document.querySelector(".description");
let inputDescription = document.querySelector(".input-description");
let form = document.querySelector("form");
let pmsg = document.querySelector(".msg_noticia");
let msgContainer = document.querySelector(".msg_sucesss");

let date = new Date();

let time = date.getTime();
let dateNow = new Date(time);
paragraphDate.textContent = dateNow.toLocaleDateString();
inputFile.addEventListener("change", function (e) {
  let img = e.target.files[0];
  let url = URL.createObjectURL(img);
  a.src = url;
});

inputTitle.addEventListener("input", function (e) {
  let newText = e.target.value;
  paragraphTitle.textContent = newText;
});
inputDescription.addEventListener("input", function (e) {
  let newText = e.target.value;
  paragraphDescription.textContent = newText;
});
  
 form.addEventListener("submit", async function (e) {
  e.preventDefault();
  let img_selected = inputFile.files[0]
  let uuid = uuidv4()
  let nomeimg = uuid + "_" + img_selected.name
  const firebaseConfig = {
    apiKey: "AIzaSyDVWdg2eS3We3myqVLfFYV6xN4UAXHrSho",
    authDomain: "lateral-rider-354218.firebaseapp.com",
    projectId: "lateral-rider-354218",
    storageBucket: "lateral-rider-354218.appspot.com",
    messagingSenderId: "146567212142",
    appId: "1:146567212142:web:7ecfb9119b3283e87dca7f",
    measurementId: "G-ZJDLVTSDX0"
  };
  if (!firebase.apps.length) {
    // Configurar o Firebase usando o seu Firebase config
    firebase.initializeApp(firebaseConfig);
  }
  let storage = firebase.storage()
  let upload = storage.ref().child("images").child(nomeimg).put(img_selected)
  upload.on("state_changed", function(){
    console.log("ok")
  }, function(error){
    console.log("erro")
  })

/*   let formdata = new FormData(this);
  let req = await fetch("inserirdados.php", {
    method: "POST",
    body: formdata,
  });

  console.log(formdata);

  let res = await req.json();
  form.reset();
  a.src = "";
  paragraphDescription.textContent = "Descrição";
  paragraphTitle.textContent = "Titulo";

  let div_msg = document.createElement("div");
  div_msg.classList.add("msg_sucesss");
  let p_msg_content = document.createElement("p");
  p_msg_content.classList.add("msg_noticia");
  div_msg.appendChild(p_msg_content);

  document.body.appendChild(div_msg);
  div_msg.style.display = "block";
  p_msg_content.textContent = res.message;
  setTimeout(() => {
    div_msg.classList.add("fade-out");
  }, 1500);
  setTimeout(() => {
    div_msg.classList.remove("fade-out");
    div_msg.style.display = "none";
    div_msg.classList.remove("animating");
  }, 2500); */
}); 
