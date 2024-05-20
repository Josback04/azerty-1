let etape1 = document.getElementById('etape1');
let etape2 = document.getElementById('etape2');
let etape3 = document.getElementById('etape3');

let btnNext1 = document.getElementById('btn-next1');
let btnNext2 = document.getElementById('btn-next2');
let btnPrev1 = document.getElementById('btn-prev1');
let btnPrev2 = document.getElementById('btn-prev2');


btnNext1.addEventListener('click', (e) => {
    etape2.classList.add('active');
    etape1.classList.remove('active');
    e.preventDefault();
})


btnPrev1.addEventListener('click', (e) => {
    etape1.classList.add('active');
    etape2.classList.remove('active');
    e.preventDefault();
})

btnNext2.addEventListener('click', (e) => {
    etape3.classList.add('active');
    etape2.classList.remove('active');
    e.preventDefault();
})

btnPrev2.addEventListener('click', (e) => {
    etape2.classList.add('active');
    etape3.classList.remove('active');
    e.preventDefault();
})
