const buttons = document.querySelectorAll(".details-btn");
buttons.forEach(function(x){
   
    x.addEventListener("click",function(){
        
        var card=x.closest(".programCard");
        var details= card.querySelector(".card-details");
        details.classList.toggle("show");
         if(details.classList.contains("show")){
            x.textContent="Hide Details";
         }else{
            x.textContent="viwe More"
         }
    });
});
