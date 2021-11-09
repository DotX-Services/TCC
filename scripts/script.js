const menu = document.querySelector('.menu');

menu.addEventListener('click', function (e) {
    const servicos = document.getElementById('menuServ');
    const menu = document.getElementById('menuEncon');
    const fale = document.getElementById('menuFale');

    if (servicos.style.display === 'block') {
        servicos.style.display = 'none';
        menu.style.display = 'none';
        fale.style.display = 'none';
    } else {
        servicos.style.display = 'block';
        menu.style.display = 'block';
        fale.style.display = 'block';
    }
});
