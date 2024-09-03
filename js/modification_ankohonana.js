const selectBox2 = document.querySelector('.select-box2');
const selectOption2 = document.querySelector('.select-option2');
const soValue2 = document.querySelector('#soValue2');
const optionSearch2 = document.querySelector('#optionSearch2');
const options2 = document.querySelector('.options2');
const optionsList2 = document.querySelectorAll('.options2 li');
selectOption2.addEventListener('click',function(){
    selectBox2.classList.toggle('active');
});

// optionsList.forEach(function(optionsListSingle){
//     optionsListSingle.addEventListener('click',function(){
//         text = this.textContent;
//         soValue.value = text;
//         selectBox.classList.remove('active');
//     })
// });
//ou
for (let i = 0; i < optionsList2.length; i++) {
    optionsList2[i].addEventListener('click',()=>{
        soValue2.value = optionsList2[i].textContent;
        document.querySelector('#idSekterauser').value = optionsList2[i].classList;
        selectBox2.classList.remove('active');
    });
}

optionSearch2.addEventListener('keyup',function(){
    let filter, li, textValue;
    filter = optionSearch2.value.toUpperCase();
    li = options2.getElementsByTagName('li');
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