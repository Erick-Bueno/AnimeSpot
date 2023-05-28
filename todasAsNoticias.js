let links = document.querySelectorAll('a')

let currentPage = window.location.href
links.forEach(function(link){
    if(link.href == currentPage){
        link.classList.add("selectedLink")
    }
})