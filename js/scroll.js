function fonctionscroll() { 
    document.querySelector(".cc-navbar").classList.toggle('styck', window.scrollY > 200);
}
setInterval(fonctionscroll,100);
