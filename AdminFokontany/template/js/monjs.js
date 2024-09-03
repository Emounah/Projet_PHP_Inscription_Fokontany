const selectBox = document.querySelector('.select-box');
const selectOption = document.querySelector('.select-option');
const soValue = document.querySelector('#soValue');
const optionSearch = document.querySelector('#optionSearch');
const options = document.querySelector('.options');
const optionsList = document.querySelectorAll('.options li');
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
for (let i = 0; i < optionsList.length; i++) {
    optionsList[i].addEventListener('click',()=>{
        soValue.value = optionsList[i].textContent;
        document.querySelector('#idregioncommune').value = optionsList[i].classList;
        selectBox.classList.remove('active');
    })
}
for (let i = 0; i < optionsList.length; i++) {
    optionsList[i].addEventListener('click',()=>{
        soValue.value = optionsList[i].textContent;
        document.querySelector('#iddistric').value = optionsList[i].classList;
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
        document.querySelector('#idcommune').value = optionsList1[i].id;
        document.querySelector('#regioncomm').value = optionsList1[i].classList;
        console.log(optionsList1[i].classList);
        selectBox1.classList.remove('active');
    })
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

