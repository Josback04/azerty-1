let etape1=document.getElementById('etape1');
let etape2=document.getElementById('etape2');
let btnNext=document.getElementById('btn-next');
let btnPrev=document.getElementById('btn-prev');

btnNext.addEventListener('click',(e)=>{
    etape2.classList.add('active');
    etape1.classList.remove('active');
    e.preventDefault();
})

btnPrev.addEventListener('click',(e)=>{
    etape1.classList.add('active');
    etape2.classList.remove('active');
    e.preventDefault();
})

// script pour le caroussel

var position=1;
afficherPhoto(position);
function dplcmt(n) {
    afficherPhoto(position+=n);
}
function afficherPhoto(n){
    var i;
    x =document.getElementsByClassName('monDiapo');
    for(i=0;i<x.length;i++){
    x[i].style.display="none";
    }
    if(n>x.length){position=1}
    if(n<x.length){position=x.length}
    x[position-1].style.display="block";
}