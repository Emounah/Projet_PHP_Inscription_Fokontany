let nextsection = document.querySelector('.nextsection');
let prevsection = document.querySelector('.prevsection');
let timer;
nextsection.addEventListener("click", nextSection)
prevsection.addEventListener("click", prevSection)
nextsection.addEventListener("mouseover",stopTimer);
nextsection.addEventListener("mouseout",startTimer);
prevsection.addEventListener("mouseover",stopTimer);
prevsection.addEventListener("mouseout",startTimer);
timer = setInterval(nextSection,9000);
function nextSection() {
    let items = document.querySelectorAll('.items');
    document.querySelector('.slides').appendChild(items[0]);
}
function prevSection() {
    let items = document.querySelectorAll('.items');
    document.querySelector('.slides').prepend(items[items.length - 1]);
}
function stopTimer() {
    clearInterval(timer);
}
function startTimer() {
    timer = setInterval(nextSection,4000);
}
