let id_zamowienia = 0;
function braki(){
    if(stan1.innerHTML==0){
        stan1.style.backgroundColor = "red";
    }
    else if(stan1.innerHTML>=0&&stan1.innerHTML<=5){
        stan1.style.backgroundColor = "yellow";
    }
    else{
        stan1.style.backgroundColor = "honeydew";
    }

    if(stan2.innerHTML==0){
        stan2.style.backgroundColor = "red";
    }
    else if(stan2.innerHTML>=0&&stan2.innerHTML<=5){
        stan2.style.backgroundColor = "yellow";
    }
    else{
        stan2.style.backgroundColor = "honeydew";
    }
    
    if(stan3.innerHTML==0){
        stan3.style.backgroundColor = "red";
    }
    else if(stan3.innerHTML>=0&&stan3.innerHTML<=5){
        stan3.style.backgroundColor = "yellow";
    }
    else{
        stan3.style.backgroundColor = "honeydew";
    }
    
    if(stan4.innerHTML==0){
        stan4.style.backgroundColor = "red";
    }
    else if(stan4.innerHTML>=0&&stan4.innerHTML<=5){
        stan4.style.backgroundColor = "yellow";
    }
    else{
        stan4.style.backgroundColor = "honeydew";
    }
}
braki();
function aktualizuj(stan,nazwa_stanu){
    nazwa_stanu.innerHTML=prompt("Podaj nową ilość");
    braki();
}
function zamow(produkt){
    id_zamowienia++;
    alert("Zamówienie nr: " + id_zamowienia + " Produkt: " + produkt.innerHTML);
}
