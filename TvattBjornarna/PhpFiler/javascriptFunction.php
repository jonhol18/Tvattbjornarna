<?php /*Vi har valt att använda oss av javascript för att kunna klicka på tiderna och välja 
    onClick skickar data i tabellen till en funktion. Datum hämtas i en egen javascript funktion 
    vid namn =datum. */
 if($week < Date('W')) //Om användare lyckas gå tillbaka till äldre vecka
{?>
   <script type='text/javascript'>
    
    var Pdate = document.getElementById('pdate');
    function booking(el){
    el.style.backgroundColor = '#FF7070';
    var p = document.getElementById('Tid');
    p.innerHTML='ogiltig tid';//värdet blir ogiltigt
    return false;
   
    }
    function datum(el2)
    {
    el2.style.backgroundColor = '#FF7070';
    var pa = document.getElementById('datum');
    pa.innerHTML='ogiltig datum';//värdet blir ogiltigt
    return false; 
    }
    
    </script><?php
}    
/*Nedanför kan man se javascript funktionerna. Det finns två funktioner vid namn booking och datum*/ 
else{
  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type='text/javascript'>

var Pdate = document.getElementById('pdate'); 
function booking(el){//onClick funktion
 
  if(el<Date('D'))
    {
      p.innerHTML='ogiltig tid';//värdet blir ogiltigt

    }
el.style.backgroundColor = '#DEDBDB';//ändrar färg 
var p = document.getElementById('Tid');//hämtar textbox 
p.innerHTML=el.innerText;//i textbox visas värdet från tabllen
if (typeof(Storage) !== 'undefined') {//om localstorage värdet är odefinierat 
    // Store
    p.innerHTML=el.innerText;
    localStorage.setItem('Tidsbokning', 'Bokad');//sätter värdet till bokat
  }
  
else{
    p.innerHTML= localStorage.getItem('Tidsbokning');  //finns värdet redan så sätts värdet till bokad i textbox
}
  el.innerHTML = localStorage.getItem('Tidsbokning');   //finns värdet så sätts värdet till bokad i TD
   return el.innerHTML.value;
}
function datum(el2)//datum onClick
{
el2.style.backgroundColor = '#C4C2C2';//färg till datum
var pa = document.getElementById('datum');//hämtar textbox
pa.innerHTML=el2.innerText;//visar värdet till textbox
return pa; 
}
</script> <?php
} ?>