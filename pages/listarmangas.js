let lastNotices = document.querySelector(".LastNotices")
async function listarNotices(){
    let req = await fetch("listaMangasDestaque.php")
    let res = await req.json();
   
    for(let c in res){
       

        let div_card_high = document.createElement("div")
        div_card_high.classList.add("card-notices")

        let div_container_img = document.createElement("div")
        div_container_img.classList.add("container-cardimg")

        let img = document.createElement("img")
        img.src = res[c]["img_url"]

        img.classList.add("cardimg")
        div_card_high.appendChild(div_container_img)
        div_container_img.appendChild(img)

        let div_date_notice = document.createElement("div")
        let paragraphNoticeTitle = document.createElement("p")
        paragraphNoticeTitle.classList.add("notice-title")
        paragraphNoticeTitle.textContent = res[c]['title']

        let paragraphNoticeDate = document.createElement("p")
        paragraphNoticeDate.classList.add("date")
        let momentData = moment(new Date(res[c]['created_at']))
        paragraphNoticeDate.textContent = momentData.format("DD/MM/YYYY")
        

        let paragraphDescription = document.createElement("p")
        paragraphDescription.classList.add("description")
        paragraphDescription.textContent = res[c]["simpleDescription"]
        
        div_date_notice.appendChild(paragraphNoticeTitle)
        div_date_notice.appendChild(paragraphNoticeDate)
        div_date_notice.appendChild(paragraphDescription)

        div_card_high.appendChild(div_date_notice)
        container_cards_highlights.appendChild(div_card_high)
        div_card_high.addEventListener("click", function(){
            let noticeId = res[c]['id']
            window.location.href = `NoticiaCompleta.html?id=${noticeId}`
        })

    }
    
}
async function ultimasNoticias(){
    let req = await fetch("listarMangasUltimasNoticias.php")
    let res = await req.json()
    console.log(res)
    for(let c in res){
        
       

        let div_card_high = document.createElement("div")
        div_card_high.classList.add("card-notices")

        let div_container_img = document.createElement("div")
        div_container_img.classList.add("container-cardimg")

        let img = document.createElement("img")
        img.src = res[c]["img_url"]

        img.classList.add("cardimg")
        div_card_high.appendChild(div_container_img)
        div_container_img.appendChild(img)

        let div_date_notice = document.createElement("div")
        let paragraphNoticeTitle = document.createElement("p")
        paragraphNoticeTitle.classList.add("notice-title")
        paragraphNoticeTitle.textContent = res[c]['title']

        let paragraphNoticeDate = document.createElement("p")
        paragraphNoticeDate.classList.add("date")
        let momentData = moment(new Date(res[c]['created_at']))
        paragraphNoticeDate.textContent = momentData.format("DD/MM/YYYY")
        

        let paragraphDescription = document.createElement("p")
        paragraphDescription.classList.add("description")
        paragraphDescription.textContent = res[c]["simpleDescription"]
        
        div_date_notice.appendChild(paragraphNoticeTitle)
        div_date_notice.appendChild(paragraphNoticeDate)
        div_date_notice.appendChild(paragraphDescription)

        div_card_high.appendChild(div_date_notice)
        lastNotices.appendChild(div_card_high)
        
        div_card_high.addEventListener("click", function(){
            let noticeId = res[c]['id']
            window.location.href = `NoticiaCompleta.html?id=${noticeId}`
        })

    }
}

ultimasNoticias()
listarNotices()
