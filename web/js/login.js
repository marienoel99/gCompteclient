const handleFocus=(e)=>{
    const lab=e.target.previousElementSibling;
    console.log(lab);
    lab.className='labFoc';
}
const handleBlur=(e)=>{
    if(e.target.value!==''){

        e.target.previousElementSibling.className='labFoc'
    }else{
        e.target.previousElementSibling.className='label'
    }
}


for(var i=0;i<=1;i++){
   var lab=document.getElementsByClassName('formControl')[i]
    lab.onfocus=function(ev){handleFocus(ev)}
    lab.onblur=function(ev){handleBlur(ev)}
}