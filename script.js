let paragrafo = document.querySelector(".cop")
let paragrafo2 = document.querySelector(".cop2")

let date = new Date()
let yearNow = date.getFullYear()

let current_page = window.location.href
let links = document.querySelectorAll("a")

links.forEach(function(link){
    console.log(link.getAttribute("href"))
    console.log(current_page)
    if(link.href === current_page){
        link.classList.add("current-page")
        
    }
})

paragrafo.textContent = yearNow
paragrafo2.textContent = yearNow