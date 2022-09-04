
let alert_flash = document.querySelector('.alert-flash')
if(alert_flash.innerHTML){
  console.log('wala')
}else{

  setTimeout(function(){
    
    alert_flash.style.display = 'none'
  }, 2000);
console.log('naa')
}