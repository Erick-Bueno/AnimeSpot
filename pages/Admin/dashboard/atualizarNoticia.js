let parametros = new URLSearchParams(window.location.search);
let a = document.querySelector(".preview-img");
let inputFile = document.querySelector(".file");
let paragraphTitle = document.querySelector(".notice-title");
let inputTitle = document.querySelector(".input-title");
let paragraphDescription = document.querySelector(".description");
let inputDescription = document.querySelector(".input-description");
let selectCat = document.querySelector("#selectCat");
let selectType = document.querySelector("#selectType");
let content = document.querySelector("#content");
let btn_update = document.querySelector("#save");
let form = document.querySelector("form");

let id_notice = parametros.get("id");
function generateUUID() {
  return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function (c) {
    var r = (Math.random() * 16) | 0,
      v = c === "x" ? r : (r & 0x3) | 0x8;
    return v.toString(16);
  });
}

async function buscarNoticia() {
  let req = await fetch(`../../buscarNoticia.php?id=${id_notice}`);
  let res = await req.json();
  console.log(res);
  a.src = res["img_url"];
  inputTitle.value = res["title"];
  paragraphTitle.textContent = res["title"];
  inputDescription.value = res["simpleDescription"];
  paragraphDescription.textContent = res["simpleDescription"];
  selectCat.value = res["typeContent"];
  selectType.value = res["typeNotice"];
  content.value = res["content"];
}
inputTitle.addEventListener("input", function (e) {
  let newText = e.target.value;
  paragraphTitle.textContent = newText;
});

inputDescription.addEventListener("input", function (e) {
  let newText = e.target.value;
  paragraphDescription.textContent = newText;
});

inputFile.addEventListener("change", function (e) {
  let img = e.target.files[0];
  let url = URL.createObjectURL(img);
  a.src = url;
});
form.addEventListener("submit", async function (e) {
  e.preventDefault();
  if (inputFile.files.length > 0) {
    let uuid = generateUUID();
    let img_selected = inputFile.files[0];
    let nomeimg = uuid + "_" + img_selected.name;
    const firebaseConfig = {
      apiKey: "AIzaSyDVWdg2eS3We3myqVLfFYV6xN4UAXHrSho",
      authDomain: "lateral-rider-354218.firebaseapp.com",
      projectId: "lateral-rider-354218",
      storageBucket: "lateral-rider-354218.appspot.com",
      messagingSenderId: "146567212142",
      appId: "1:146567212142:web:7ecfb9119b3283e87dca7f",
      measurementId: "G-ZJDLVTSDX0",
    };
    if (!firebase.apps.length) {
      // Configurar o Firebase usando o seu Firebase config
      firebase.initializeApp(firebaseConfig);
    }
    let storage = firebase.storage();
    storage
      .ref()
      .child("images")
      .child(nomeimg)
      .put(img_selected)
      .then(function (snapshot) {
        snapshot.ref.getDownloadURL().then(async function (url) {
          let dowUrl = encodeURIComponent(url);
          let formdata = new FormData(form);
          let req = await fetch(`update.php?id=${id_notice}&imgurl=${dowUrl}`, {
            method: "POST",
            body: formdata,
          });
          let res = await req.json();
          console.log(res);
          let div_msg = document.createElement("div");
          div_msg.classList.add("msg_sucesss");
          let p_msg_content = document.createElement("p");
          p_msg_content.classList.add("msg_noticia");
          div_msg.appendChild(p_msg_content);
          document.body.appendChild(div_msg);
          div_msg.style.display = "block";
          p_msg_content.textContent = res.msg;
          setTimeout(() => {
            div_msg.classList.add("fade-out");
          }, 1500);
          setTimeout(() => {
            div_msg.classList.remove("fade-out");
            div_msg.style.display = "none";
            div_msg.classList.remove("animating");
          }, 2500);
        });
      });
      return
  }
  let formdata = new FormData(form);
  let req = await fetch(`update.php?id=${id_notice}`, {
    method: "POST",
    body: formdata,
  });
  let res = await req.json();
  let div_msg = document.createElement("div");
  div_msg.classList.add("msg_sucesss");
  let p_msg_content = document.createElement("p");
  p_msg_content.classList.add("msg_noticia");
  div_msg.appendChild(p_msg_content);

  document.body.appendChild(div_msg);
  div_msg.style.display = "block";
  p_msg_content.textContent = res.msg;
  setTimeout(() => {
    div_msg.classList.add("fade-out");
  }, 1500);
  setTimeout(() => {
    div_msg.classList.remove("fade-out");
    div_msg.style.display = "none";
    div_msg.classList.remove("animating");
  }, 2500);
});
buscarNoticia();
