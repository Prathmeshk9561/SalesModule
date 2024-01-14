
function showprice(val){
    if(val==1){
        document.getElementById('div1').style.display='block';
        document.getElementById('div2').style.display='none';
        document.getElementById('div3').style.display='none';
        document.getElementById('div4').style.display='none';
        
    }
    if(val==2){
        document.getElementById('div1').style.display='none';
        document.getElementById('div2').style.display='block';
        document.getElementById('div3').style.display='none';
        document.getElementById('div4').style.display='none';
        
    }
    if(val==3){
        document.getElementById('div1').style.display='none';
        document.getElementById('div2').style.display='none';
        document.getElementById('div3').style.display='block';
        document.getElementById('div4').style.display='none';
        
    }
    if(val==4){
        document.getElementById('div1').style.display='none';
        document.getElementById('div2').style.display='none';
        document.getElementById('div3').style.display='none';
        document.getElementById('div4').style.display='block';
        
    }
}
