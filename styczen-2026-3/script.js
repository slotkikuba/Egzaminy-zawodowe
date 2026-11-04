let obrazy = document.querySelectorAll("img");

let obraz1 = obrazy[0];
let obraz2 = obrazy[1];
let obraz3 = obrazy[2];
let trojkat = false;
let prostokat = false;

obraz2.addEventListener("click", () => {
    trojkat = true;
    prostokat = false;
    obraz1.src = '1d.bmp';
})

obraz3.addEventListener("click", () => {
    prostokat = true;
    trojkat = false;
    obraz1.src = '2d.bmp';
})




let guzik = document.querySelector("button");

let p = document.querySelector("#wynik");

guzik.addEventListener("click", () => {

    let bok1 = Number(document.querySelector("#bok1").textContent);
    
    let bok2 = Number(document.querySelector("#bok2").textContent);
    if(trojkat) {
        let pole = 0.5 * bok1 * bok2;
        p.innerHTML += `${pole}`
    }

    if(prostokat) {
        let pole = bok1 * bok2;
        p.innerHTML += `${pole}`
    }
})

