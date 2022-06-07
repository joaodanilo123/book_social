function Avaliar(estrela) {

    const img = "http://localhost/booksocial/img";

    let estrelas = [];

    for (let i = 1; i <= 5; i++) {
        estrelas.push(document.getElementById(`s${i}`))
    }

    for (let i = 0; i < 5; i++) {
        if(estrela >= i + 1) {
            estrelas[i].src = `${img}/star1.png`;
        } else {
            estrelas[i].src = `${img}/star0.png`;
        }
    }
    
    document.getElementById('rating').innerHTML = estrela;
    
}
