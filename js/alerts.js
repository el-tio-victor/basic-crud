var alert
$(document).ready(function(){
    alert = $('.alert')
    if(alert !== undefined){
        setTimeout(function(){
             alert.css('display','none')
        },5000)
       
    }
})