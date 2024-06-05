const INPUT_BUSCA = document.getElementById('input-busca');
const TABELA_EMPRESA = document.getElementById('tabela-empresa');

INPUT_BUSCA.addEventListener('keyup', () =>{
    let expressao = INPUT_BUSCA.value.toLowerCase();

    let linhas = TABELA_EMPRESA.getElementsByTagName('tbody');

    for (let posicao in linhas) {
        if (true === isNaN(posicao)) {
            continue;
        }

        let conteudoDaLinha = linhas[posicao].innerHTML.toLowerCase();

        if (true === conteudoDaLinha.includes(expressao)) {
            linhas[posicao].style.display = '';
        } else {
            
            linhas[posicao].style.display = 'none';
        }
    }
});