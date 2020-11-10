document.getElementById('nouveau').onclick=function(){
    fetch('http://127.0.0.1:8000/nouveau',{
        method:'GET'
    }).then(res=>{
        return res.text()
    }).then(res=>{
        document.getElementsByClassName('statistique')[0].innerHTML=res
        document.getElementById('back').style.visibility='visible'
        document.getElementById('back').onclick=function(){
            window.location.pathname='/charge'
        }
        document.getElementById('perform').onsubmit=function(ev){
            ev.preventDefault();
            fetch()
        }
    }).catch(error=>{
        console.log(error)
    })
}

