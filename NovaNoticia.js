let inputFile = document.querySelector(".file")
let a = document.querySelector(".preview-img")
let inputTitle = document.querySelector(".input-title")
let paragraphTitle = document.querySelector(".notice-title")
let paragraphDate = document.querySelector(".datenow")
let paragraphDescription = document.querySelector(".description")
let inputDescription = document.querySelector(".input-description")
let date = new Date()

let time = date.getTime();
let dateNow = new Date(time)
paragraphDate.textContent = dateNow.toLocaleDateString()
inputFile.addEventListener("change", function(e){
    let img = e.target.files[0]
    let url = URL.createObjectURL(img)
    a.src = url
})

inputTitle.addEventListener("input", function(e){
    let newText = e.target.value
    paragraphTitle.textContent = newText
})
inputDescription.addEventListener("input", function(e){
    let newText = e.target.value
    paragraphDescription.textContent = newText
})


