// function NomRegion() {
//     let region = document.querySelector('#region').value;
//     regionSplit = region.split("");
//     regionJoin = regionSplit.join("").toLocaleLowerCase();
//     let longeure = regionJoin.length;
//     let regionSlice = regionJoin.slice(0,1).toLocaleUpperCase();
//     let regionSliceRest = regionJoin.slice(1,longeure);
//     region = regionSlice+regionSliceRest;
//     document.querySelector('#region').value = region;
// }
// setInterval(NomRegion,100);
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