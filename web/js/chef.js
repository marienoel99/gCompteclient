    host='121.0.0.1'
    document.getElementsByClassName('close')[0].onclick=function(){
        document.getElementById('em').src=""
        document.getElementsByClassName('divembed')[0].style.display='none';
    }
    const elmt=[];

    for(var i=0; i<=document.getElementsByClassName('af').length - 1;i++){
        elmt.push(document.getElementsByClassName('af')[i]);
    }
    elmt.forEach(function(val){
        val.onclick=function(e){
            const id=e.target.id;

            document.getElementById('em').src='/uploads/carte_directory/'+id;
            document.getElementsByClassName('divembed')[0].style.display='flex';

            console.log(document.getElementById('em').attributes)

        }
    })

    const elmt2=[];

    for(var i=0; i<=document.getElementsByClassName('af1').length - 1;i++){
        elmt2.push(document.getElementsByClassName('af1')[i]);
    }

    elmt2.forEach(function(val){
        val.onclick=function(e){
            const id=e.target.id;
        fetch(`http://${host}:8000/deletep`,{
            method:'POST',
            body:id
        }).then(res=>{
            return res.text();
        }).then(res=>{
            alert(res)
        }).catch(error=>{
            alert(error)
        })


        }
    })


    const elmt3=[];

    for(var i=0; i<=document.getElementsByClassName('af2').length - 1;i++){
        elmt3.push(document.getElementsByClassName('af2')[i]);
    }

    elmt3.forEach(function(val){
        val.onclick=function(e){
            const id=e.target.id;
        alert(id)


        }
    })