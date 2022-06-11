function Avaliar(element) {

    const img = "http://localhost/booksocial/img";
    
    let estrelas = [];

    const nota = element.id;

    for (let i = 1; i <= 5; i++) {
        estrelas.push(document.getElementById(`s${i}`))
    }

    estrelas.forEach((elemento, i) => {
        if (nota >= i + 1) {
            elemento.src = `${img}/star1.png`;
        } else {
            elemento.src = `${img}/star0.png`;
        }
    })

    document.getElementById('rating').innerHTML = nota;

}