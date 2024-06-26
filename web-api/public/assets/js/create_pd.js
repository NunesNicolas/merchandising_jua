const unitSwitch = document.getElementById('unit-switch');
const unitText = document.getElementById('unit-text');
const unitWeight05 = document.getElementById('unit-weight0,5');
const unitWeight1 = document.getElementById('unit-weight1');
const unitWeight5 = document.getElementById('unit-weight5');

// Adicione um ouvinte de evento para detectar mudanças no estado do switch
unitSwitch.addEventListener('change', function () {
    // Atualize o texto conforme o estado do switch
    unitText.textContent = this.checked ? 'por Litro' : 'por KG';
    unitWeight05.textContent = this.checked ? '500ml' : '500g';
    unitWeight1.textContent = this.checked ? '1L' : '1Kg';
    unitWeight5.textContent = this.checked ? '5L' : '5Kg';
});