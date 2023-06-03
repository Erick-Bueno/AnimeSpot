let links = document.querySelectorAll("a");
let table = document.querySelector("tbody");

let currentPage = window.location.href;
links.forEach(function (link) {
  if (link.href == currentPage) {
    link.classList.add("selectedLink");
  }
});

async function toListNotices() {
  let req = await fetch("listarNoticias.php");
  let res = await req.json();
  console.log(res);
  for (let c in res) {
    let tr = document.createElement("tr");
    let tdId = document.createElement("td");
    let tdTitle = document.createElement("td");
    let divTitle = document.createElement("div");
    let tddesc = document.createElement("td");
    let divdesc = document.createElement("div");
    let tdImgs = document.createElement("td");
    let divImgs = document.createElement("div");
    let imgDel = document.createElement("img");
    let imgUp = document.createElement("img");
    divTitle.textContent = res[c]["title"];
    tdTitle.appendChild(divTitle);
    divdesc.textContent = res[c]["simpleDescription"];
    tddesc.appendChild(divdesc);
    tdId.textContent = res[c]["id"];
    imgDel.src = "../../../images/excluir.png";
    imgUp.src = "../../../images/editar.png";
    imgDel.classList.add("manipulation");
    imgUp.classList.add("manipulation");
    tr.id = res[c]['id']
    imgDel.addEventListener("click", async function(){
        tr.remove()
        let req = await fetch(`removerRegistro.php?id=${tr.id}`)
        let res = await req.json()
    })
    imgUp.addEventListener("click", function(){
      window.location.href = `atualizarNoticia.php?id=${tr.id}`
    })
    divImgs.classList.add("container-mani");
    divImgs.appendChild(imgDel);
    divImgs.appendChild(imgUp);
    tdImgs.appendChild(divImgs);
    tr.appendChild(tdId);
    tr.appendChild(tdTitle);
    tr.appendChild(tddesc);
    tr.appendChild(tdImgs);
    table.appendChild(tr);

  }
  

}

toListNotices();


