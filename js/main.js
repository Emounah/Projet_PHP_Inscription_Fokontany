// function boutonchat() {
//     document.querySelector('.btn-chat').addEventListener('click',()=>{
//         document.querySelector('.chat-discussion').classList.toggle('chat-opacite');
//         document.querySelector('.btn-chat').classList.toggle('activechat');
//     })
// } 
// boutonchat();
let sec2_list = document.querySelectorAll('.sec2-list');
function boutonFormClient() {
    document.querySelector('.btnkarine').addEventListener('click',()=>{
    document.querySelector('.form-membre').classList.remove('form-active');
    document.querySelector('.form-payment').classList.remove('form-active-payment');
    document.querySelector('.form-paymentSazy').classList.remove('form-paymentSazy-active');
    document.querySelector('.form-paymentAdidy').classList.remove('form-paymentAdidy-active');
    document.querySelector('.form-mdp').classList.remove('form-mdp-active');
        for (let i = 0; i < sec2_list.length; i++) {
            sec2_list[i].classList.toggle('form-liste');
        }
        // document.querySelector('.sec2-list').classList.toggle('form-liste');
    })
}
boutonFormClient();
function boutonFormMdp() {
    document.querySelector('.btnmdp').addEventListener('click',()=>{
    document.querySelector('.form-membre').classList.remove('form-active');
    document.querySelector('.form-payment').classList.remove('form-active-payment');
    document.querySelector('.form-paymentSazy').classList.remove('form-paymentSazy-active');
    document.querySelector('.form-paymentAdidy').classList.remove('form-paymentAdidy-active');
        for (let i = 0; i < sec2_list.length; i++) {
            sec2_list[i].classList.remove('form-liste');
        }
        document.querySelector('.form-mdp').classList.toggle('form-mdp-active');
        // document.querySelector('.sec2-list').classList.toggle('form-liste');
    })
}
boutonFormMdp();
function boutonFormClientinserer() {
    document.querySelector('.btnajouthomme').addEventListener('click',(e)=>{
        document.querySelector('.form-membre').classList.toggle('form-active');
        document.querySelector('.sec2-list').classList.remove('form-liste');
        for (let i = 0; i < sec2_list.length; i++) {
            sec2_list[i].classList.remove('form-liste');
        }
        document.querySelector('.form-payment').classList.remove('form-active-payment');
        document.querySelector('.form-paymentAdidy').classList.remove('form-paymentAdidy-active');
        document.querySelector('.form-paymentSazy').classList.remove('form-paymentSazy-active');
        document.querySelector('.form-mdp').classList.remove('form-mdp-active');

        e.preventDefault()

    })
}
boutonFormClientinserer();
let btnpaymentinscri = document.querySelector('.btnpaymentinscri');
let form_payment = document.querySelector('.form-payment')
function boutonpaymentinscri() {
    btnpaymentinscri.addEventListener('click',()=>{
        for (let i = 0; i < sec2_list.length; i++) {
            sec2_list[i].classList.remove('form-liste');
        }
        document.querySelector('.form-membre').classList.remove('form-active');
        document.querySelector('.form-paymentAdidy').classList.remove('form-paymentAdidy-active');
        document.querySelector('.form-paymentSazy').classList.remove('form-paymentSazy-active');
        document.querySelector('.form-mdp').classList.remove('form-mdp-active');
        form_payment.classList.toggle('form-active-payment');
    })
}
boutonpaymentinscri();
function boutonpaymentadidy() {
    document.querySelector('.btnpaymentadidy').addEventListener('click',()=>{
        for (let i = 0; i < sec2_list.length; i++) {
            sec2_list[i].classList.remove('form-liste');
        }
        document.querySelector('.form-membre').classList.remove('form-active');
        form_payment.classList.remove('form-active-payment');
        document.querySelector('.form-paymentSazy').classList.remove('form-paymentSazy-active');
        document.querySelector('.form-mdp').classList.remove('form-mdp-active');
        document.querySelector('.form-paymentAdidy').classList.toggle('form-paymentAdidy-active');
    })
}
boutonpaymentadidy();
function boutonpaymentsazy() {
    document.querySelector('.btnpaymentsazy').addEventListener('click',()=>{
        for (let i = 0; i < sec2_list.length; i++) {
            sec2_list[i].classList.remove('form-liste');
        }
        document.querySelector('.form-membre').classList.remove('form-active');
        form_payment.classList.remove('form-active-payment');
        document.querySelector('.form-paymentAdidy').classList.remove('form-paymentAdidy-active');
        document.querySelector('.form-mdp').classList.remove('form-mdp-active');
        document.querySelector('.form-paymentSazy').classList.toggle('form-paymentSazy-active');
    })
}
boutonpaymentsazy();
function btnFermerFormPayment() {
    let retour_form = document.querySelector('.retour-form');
    retour_form.addEventListener('click',()=>{
        for (let i = 0; i < sec2_list.length; i++) {
            sec2_list[i].classList.remove('form-liste');
        }
         document.querySelector('.form-payment').classList.remove('form-active-payment');
    })
 }
 btnFermerFormPayment();
 
 function btnretourformadidy() {
    let retour_form_adidy = document.querySelector('.retour-form-adidy');
    retour_form_adidy.addEventListener('click',()=>{
        for (let i = 0; i < sec2_list.length; i++) {
            sec2_list[i].classList.remove('form-liste');
        }
         document.querySelector('.form-paymentAdidy').classList.remove('form-paymentAdidy-active');
    })
 }
 btnretourformadidy();
 function btnretourformsazy() {
    let retour_form_sazy = document.querySelector('.retour-form-sazy');
    retour_form_sazy.addEventListener('click',()=>{
        for (let i = 0; i < sec2_list.length; i++) {
            sec2_list[i].classList.remove('form-liste');
        }
        document.querySelector('.form-paymentSazy').classList.remove('form-paymentSazy-active');
    })
 }
 btnretourformsazy();
  function btnFermerForm() {
   let retour_membre = document.querySelectorAll('.retour-membre');
   for (let i = 0; i < retour_membre.length; i++) {
       retour_membre[i].addEventListener('click',()=>{
        document.querySelector('.form-membre').classList.remove('form-active');
       })
   }
}
btnFermerForm();
function btnFermerFormmdp() {
        document.querySelector('.retour-form-mdp').addEventListener('click',()=>{
            document.querySelector('.form-mdp').classList.remove('form-mdp-active');
        })
 }
 btnFermerFormmdp();
function btnFermerFormListe() {
    let retour_list = document.querySelector('.retour-liste');
         retour_list.addEventListener('click',()=>{
         document.querySelector('.sec2-list').classList.remove('form-liste');
        })
 }
 btnFermerFormListe();


