const selectBox1 = document.querySelector('.select-box1');
const selectOption1 = document.querySelector('.select-option1');
const soValue1 = document.querySelector('#soValue1');
const optionSearch1 = document.querySelector('#optionSearch1');
const options1 = document.querySelector('.options1');
const optionsList1 = document.querySelectorAll('.options1 li');
console.log(optionsList1);
selectOption1.addEventListener('click',function(){
    selectBox1.classList.toggle('active');
});

// optionsList.forEach(function(optionsListSingle){
//     optionsListSingle.addEventListener('click',function(){
//         text = this.textContent;
//         soValue.value = text;
//         selectBox.classList.remove('active');
//     })
// });
//ou
for (let i = 0; i < optionsList1.length; i++) {
    optionsList1[i].addEventListener('click',()=>{
        soValue1.value = optionsList1[i].textContent;
        document.querySelector('#idsektera').value = optionsList1[i].id;
        selectBox1.classList.remove('active');
    });
}

optionSearch1.addEventListener('keyup',function(){
    let filter, li, textValue;
    filter = optionSearch1.value.toUpperCase();
    li = options1.getElementsByTagName('li');
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





const selectBox = document.querySelector('.select-box');
const selectOption = document.querySelector('.select-option');
const soValue = document.querySelector('#soValue');
const optionSearch = document.querySelector('#optionSearch');
const options = document.querySelector('.options');
const optionsList = document.querySelectorAll('.options li');
const optionsListSpan = document.querySelectorAll('.options li .lispan');

// console.log(options);
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
let idFokontany = document.querySelector("#idFokontany");
for (let i = 0; i < optionsList.length; i++) {
    optionsList[i].addEventListener('click',()=>{
        soValue.value = optionsList[i].textContent;
        document.querySelector('#idFokontany').value = optionsList[i].classList;
        document.querySelector('#nomfokontany').value = optionsList[i].children[0].textContent;
        document.querySelector('#nomcommune').value = optionsList[i].children[1].textContent;
        document.querySelector('#nomdistrict').value = optionsList[i].children[2].textContent;
        document.querySelector('#nomregion').value = optionsList[i].children[3].textContent;

        selectBox.classList.remove('active');
            for (let i = 0; i < optionsList1.length; i++) {   
                if (optionsList1[i].classList != idFokontany.value) {
                    optionsList1[i].style = `display:none;`
                }else{
                    optionsList1[i].style = `display:flex;`
                }
        }
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


