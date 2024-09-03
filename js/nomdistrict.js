function NomDistrict() {
    let district = document.querySelector('#exampleInputName1').value;
    districtSplit = district.split("");
    districtJoin = districtSplit.join("").toLocaleLowerCase();
    let longeure = districtJoin.length;
    let districtSlice = districtJoin.slice(0,1).toLocaleUpperCase();
    let districtSliceRest = districtJoin.slice(1,longeure);
    district = districtSlice+districtSliceRest;
    document.querySelector('#exampleInputName1').value = district;
}
setInterval(NomDistrict,100);