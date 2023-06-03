let form = document.querySelector("form")
let pmsg = document.querySelector(".msg_noticia")
let msgContainer = document.querySelector(".msg_sucesss")
let btn = document.querySelector('.Login-btn')
let timeoutRef ;
form.addEventListener("submit", async function(e){
   
    e.preventDefault()

    let formdata = new FormData(this)
 
    let req = await fetch("login.php",{
        method:"POST",
        body:formdata
    })
  
    let res = await req.json()
    if(res['status'] === 400){
   
    
    let div_msg = document.createElement("div")
    div_msg.classList.add("msg_sucesss")
    let p_msg_content = document.createElement("p")
    p_msg_content.classList.add("msg_noticia")
    div_msg.appendChild(p_msg_content)
    div_msg.style.backgroundColor = "red"
    document.body.appendChild(div_msg)
    div_msg.style.display = 'block'
    p_msg_content.textContent = res.msg
    setTimeout(() => {
        div_msg.classList.add("fade-out")
    }, 1500);
    setTimeout(() => {
        div_msg.classList.remove("fade-out")
        div_msg.style.display = 'none'
        div_msg.classList.remove("animating");
    }, 2500);
    form.reset()
    return
    }
    window.location.href = "TodasAsNoticias.php"
   
   
   
   
    
})


