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
for (let i = 0; i < optionsList.length; i++) {
    optionsList[i].addEventListener('click',()=>{
        soValue.value = optionsList[i].textContent;
        document.querySelector('#idSektera').value = optionsList[i].id;
        selectBox.classList.remove('active');
       
    });
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

