const btn = document.querySelector("button");

btn.addEventListener("click", () => {
    const checkBoxes = document.querySelectorAll("input[type='checkbox']");
    let price = 0;
    let react = checkBoxes[0].checked
    let js = checkBoxes[1].checked
    let city = document.querySelector("select").value;
    const result = document.getElementById("wynik");
    let amountOfInstallment = Number(document.querySelector("input[type='number']").value);
    
    if(js && react) {
        price = 8000;
    }
    else if(react) {
        price = 5000;
    }
    else if(js) {
        price = 3000
    }

    result.innerHTML = `Kurs odbędzie się w ${city}. Koszt całkowity: ${price} zł. Płacisz ${amountOfInstallment} rat po ${price / amountOfInstallment} zł.`
    
});