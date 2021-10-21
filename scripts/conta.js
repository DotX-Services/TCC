const botao = document.querySelector('#btnAlterar');
const input = document.querySelectorAll('.inputConta');

botao.addEventListener('click', e => {
    if(input === ''){
        alert('Erro nos dados! Digite algum valor');
        return;
    }
});