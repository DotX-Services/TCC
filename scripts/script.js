const menu = document.querySelector('.menu');
const header = document.querySelector('header');

menu.addEventListener('click', function(e){
    const servicos = document.createElement('a');

    header.appendChild(servicos);
    servicos.href = '#servicos';
    servicos.title = 'Nossos serviços'
});
