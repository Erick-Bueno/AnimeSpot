const parametros = new URLSearchParams(window.location.search)
let container_notice_completed = document.querySelector(".Notice-Completed") 
let noticeId =  parametros.get("id")
async function findNotice(){
    let req = await fetch(`buscarNoticia.php?id=${noticeId}`)
    let res = await req.json()
    console.log(res)
    let NoticeComplete_h1 = document.createElement("h1")
    NoticeComplete_h1.textContent = res['title']
    NoticeComplete_h1.classList.add("Notice-Completed__title")

    let paragraphDate = document.createElement("p")
    commentdate = moment(new Date(res['created_at']))
    paragraphDate.textContent = commentdate.format("DD/MM/YYYY")
    paragraphDate.classList.add("Notice-Completed__date")

    let img_notice_completed = document.createElement("img")
    img_notice_completed.src = res['img_url']
    img_notice_completed.classList.add("Notice-Completed__img")

    let notice_paragraph_content = document.createElement("p")
    notice_paragraph_content.textContent = res['content']
    notice_paragraph_content.classList.add("Notice-Completed__desc")

    container_notice_completed.appendChild(NoticeComplete_h1)
    container_notice_completed.appendChild(paragraphDate)
    container_notice_completed.appendChild(img_notice_completed)
    container_notice_completed.appendChild(notice_paragraph_content)




}

findNotice()