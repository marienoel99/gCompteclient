document.getElementById('nouveau').onclick=function(){
    fetch('http://127.0.0.1:8000/nouveau',{
        method:'GET'
    }).then(res=>{
        return res.text()
    }).then(res=>{
        document.getElementsByClassName('statistique')[0].innerHTML=res
        document.getElementById('back').style.visibility='visible'
        document.getElementById('title').innerHTML='/nouveau client'
        document.getElementById('back').onclick=function(){
            window.location.pathname='/charge'
        }
        document.getElementById('perform').onsubmit=function(ev){
            ev.preventDefault();
            const target=ev.target;
            const data={
                tel:target.tel.value,
                mail:target.mail.value,
                type:target.type.value
            }

            fetch('http://127.0.0.1:8000/nouveaup',{
                method:'POST',
                'Content-Type':'application/json',
                body:JSON.stringify(data)
            }).then(res=>{
                if(res.status==403){
                    return res.status;
                }else{
                    return res.text()
                }

            }).then(res=>{
                if(res==403){
                    document.getElementById('inf').innerHTML='cette personne existe déjà';
                    document.getElementById('inf').style.color='red';
                }else{
                    document.getElementsByClassName('statistique')[0].innerHTML=res
                    document.getElementById('title').innerHTML+='/personne'
                }

            }).catch(error=>{
                alert(error)
            })

        }
    }).catch(error=>{
        console.log(error)
    })
}

