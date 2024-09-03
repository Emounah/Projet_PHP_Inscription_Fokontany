const selectBox = document.querySelector('.select-box');
const selectOption = document.querySelector('.select-option');
const soValue = document.querySelector('#soValue');
const optionSearch = document.querySelector('#optionSearch');
const options = document.querySelector('.options');
const optionsList = document.querySelectorAll('.options li');
selectOption.addEventListener('click',function(){
    selectBox.classList.toggle('active');
});

// optionsList.forEach(function(optionsListSingle){
//     optionsListSingle.addEventListener('click',function(){
//         text = this.textContent;
//         soValue.value = text;
//         selectBox.classList.remove('active');
//     })
// });
//ou

for (let i = 0; i < optionsList.length; i++) {
    optionsList[i].addEventListener('click',()=>{
        soValue.value = optionsList[i].textContent;
        document.querySelector('#idFokontany').value = optionsList[i].classList;
        document.querySelector('#nomfokontany').value = optionsList[i].children[0].textContent;
        document.querySelector('#nomcommune').value = optionsList[i].children[1].textContent;
        document.querySelector('#nomdistrict').value = optionsList[i].children[2].textContent;
        document.querySelector('#nomregion').value = optionsList[i].children[3].textContent;

        selectBox.classList.remove('active');
    })
}


optionSearch.addEventListener('keyup',function(){
    let filter, li, textValue;
    filter = optionSearch.value.toUpperCase();
    li = options.getElementsByTagName('li');
    for (let j = 0; j < li.length; j++) {
        liCount = li[j];
        textValue = liCount.textContent || liCount.innerText;
        if (textValue.toUpperCase().indexOf(filter) > -1) {
            li[j].style.display = '';
        }else{
            li[j].style.display = 'none';
        }
    }
})
let uploadButtonn = document.querySelector("#upload-buttonn");
let chosenImagee = document.querySelector("#chosen-imagee");
let fileNamee = document.querySelector("#file-namee");

uploadButtonn.onchange = () =>{
    let reader = new FileReader();
    reader.readAsDataURL(uploadButtonn.files[0]);
    console.log(uploadButtonn.files[0]);
    reader.onload = () => {
        chosenImagee.setAttribute('src',reader.result);
    }
    fileNamee.textContent = uploadButtonn.files[0].name;
}

// function NomPresidentFkt() {
//     let PresidentFkt = document.querySelector('#nompresident').value;
//     PresidentFktSplit = PresidentFkt.toLocaleUpperCase();
//     document.querySelector('#nompresident').value =  PresidentFktSplit;
// }
// setInterval(NomPresidentFkt,100);
function NomPresidentFkt() {
    let PresidentFkt = document.querySelector('#nompresident').value.toLocaleUpperCase();
    document.querySelector('#nompresident').value = PresidentFkt;
}
setInterval(NomPresidentFkt,100);

// function PresidentFktPrenom() {
//     let PresidentFktPrenom = document.querySelector('#prenompresident').value;
//     PresidentFktPrenomSplit = PresidentFktPrenom.split("");
//     PresidentFktPrenomJoin = PresidentFktPrenomSplit.join("").toLocaleLowerCase();
//     let longeure = PresidentFktPrenomJoin.length;
//     let PresidentFktPrenomSlice = PresidentFktPrenomJoin.slice(0,1).toLocaleUpperCase();
//     let PresidentFktPrenomSliceRest = PresidentFktPrenomJoin.slice(1,longeure);
//     PresidentFktPrenom = PresidentFktPrenomSlice+PresidentFktPrenomSliceRest;
//     document.querySelector('#prenompresident').value = PresidentFktPrenom;
// }
// setInterval(PresidentFktPrenom,100);
function PresidentFktDdnLieux() {
    let PresidentFktDdnLieux = document.querySelector('#lieuxnaissance').value;
    PresidentFktDdnLieuxSplit = PresidentFktDdnLieux.split("");
    PresidentFktDdnLieuxJoin = PresidentFktDdnLieuxSplit.join("").toLocaleLowerCase();
    let longeure = PresidentFktDdnLieuxJoin.length;
    let PresidentFktDdnLieuxSlice = PresidentFktDdnLieuxJoin.slice(0,1).toLocaleUpperCase();
    let PresidentFktDdnLieuxSliceRest = PresidentFktDdnLieuxJoin.slice(1,longeure);
    PresidentFktDdnLieux = PresidentFktDdnLieuxSlice+PresidentFktDdnLieuxSliceRest;
    document.querySelector('#lieuxnaissance').value = PresidentFktDdnLieux;
}
setInterval(PresidentFktDdnLieux,100);
function PresidentFktLieuxcin() {
    let PresidentFktLieuxcin = document.querySelector('#lieuxcin').value;
    PresidentFktLieuxcinSplit = PresidentFktLieuxcin.split("");
    PresidentFktLieuxcinJoin = PresidentFktLieuxcinSplit.join("").toLocaleLowerCase();
    let longeure = PresidentFktLieuxcinJoin.length;
    let PresidentFktLieuxcinSlice = PresidentFktLieuxcinJoin.slice(0,1).toLocaleUpperCase();
    let PresidentFktLieuxcinSliceRest = PresidentFktLieuxcinJoin.slice(1,longeure);
    PresidentFktLieuxcin = PresidentFktLieuxcinSlice+PresidentFktLieuxcinSliceRest;
    document.querySelector('#lieuxcin').value = PresidentFktLieuxcin;
}
setInterval(PresidentFktLieuxcin,100);
function PresidentFktTravail() {
    let PresidentFktTravail = document.querySelector('#travail').value;
    PresidentFktTravailSplit = PresidentFktTravail.split("");
    PresidentFktTravailJoin = PresidentFktTravailSplit.join("").toLocaleLowerCase();
    let longeure = PresidentFktTravailJoin.length;
    let PresidentFktTravailSlice = PresidentFktTravailJoin.slice(0,1).toLocaleUpperCase();
    let PresidentFktTravailSliceRest = PresidentFktTravailJoin.slice(1,longeure);
    PresidentFktTravail = PresidentFktTravailSlice+PresidentFktTravailSliceRest;
    document.querySelector('#travail').value = PresidentFktTravail;
}
setInterval(PresidentFktTravail,100);
function adressePresidentFkt() {
    let PresidentFkt = document.querySelector('#adresse').value.toLocaleUpperCase();
    document.querySelector('#adresse').value = PresidentFkt;
}
setInterval(adressePresidentFkt,100);

