// EFECTO EN CARDS

const card = document.getElementsByClassName('card');
const car = card.length;
for (var i = 0; i <= car; i++){
    const cardd = document.getElementsByClassName('card')[i];
    cardd.addEventListener("click", function(){
        cardd.classList.toggle("card-act");
    });
}