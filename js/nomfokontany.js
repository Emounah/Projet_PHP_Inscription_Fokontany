function NomFokontany() {
    let Fokontany = document.querySelector('#exampleInputName1').value;
    FokontanySplit = Fokontany.split("");
    FokontanyJoin = FokontanySplit.join("").toLocaleLowerCase();
    let longeure = FokontanyJoin.length;
    let FokontanySlice = FokontanyJoin.slice(0,1).toLocaleUpperCase();
    let FokontanySliceRest = FokontanyJoin.slice(1,longeure);
    Fokontany = FokontanySlice+FokontanySliceRest;
    document.querySelector('#exampleInputName1').value = Fokontany;
}
setInterval(NomFokontany,100);