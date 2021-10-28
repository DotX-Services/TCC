<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2077a80796.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/chatbot.css">
    <title>Despachante Central - Home</title>
</head>
<body>
    <button type="button" class="chatLauncher" style="display:none;"></button>
    <script src="scripts/chatbot.js"></script>
    <header>
        <a href="index.php"><img src="media/Despachante.png" alt="Foto Despachante" id="fotoDespachante"></a>
        <nav>
            <ul>
                <a href="#">
                    <i class="fas fa-car-side"></i>
                    <span>Nossos Serviços</span>
                </a>
                <a href="#">
                    <i class="fas fa-map-marked"></i>
                    <span>Onde nos encontrar</span>
                </a>
                <a href="#">
                    <i class="fas fa-bullhorn"></i>
                    <span>Fale conosco</span>
                </a>
            </ul>
            <img src="media/Menu.png" alt="teste" id="menu">
        </nav>
        <div class="traco"></div>
        <div id="usuario">
            <p id="entrar"><a href="entrar.php">Entrar</a></p>
            <p class="Abaixo"><a href="registrar.php">Cadastrar</a></p>
        </div>
    </header>
    <main>
        <div class="main_branca">
            <img src="./media/loja.png" alt="Teste">
            <h1 class="titulo">Sobre nós</h1>
            <p>Somos uma empresa de despache já consolidada no ramo. Estamos prontos para fazer qualquer tipo de documentação, emplacamento, enviar 2ª via etc. Sendo assim, seu carros e sua documentação estarão seguros em nossas mãos.</p>
        </div>
        <div class="main_azul">
            <img src="./media/eva-azul-bebê.jpg" alt="Teste">
            <h1 class="titulo">O site</h1>
            <p>Esperamos em todos os nossos projetos tirar está dor de cabeça, de mexer com a papelada e a parte mais burocrática, dos nossos clientes. <br> Dessa forma, decidimos criar este site, com o intuíto de automatizar muitos processos e passar para nosso cliente a profisssionalidade e a segurança de que seu automóvel precisa. <br> É possivel <strong>consultar status de pedidos já feitos</strong>, <strong>tirar dúvidas frequentes com nosso chatbot</strong> e <strong>fazer novos pedidos</strong>. Qualquer dúvida ou dificuldade, pode nos contatar diretamente pela parte de <strong>atendimento</strong>.</p>
        </div>
        <div class="main_branca" id="servicos">
            <img src="./media/eva-azul-bebê.jpg" alt="Teste">
            <h1 class="titulo">Nossos Serviços</h1>
            <ul>
                <li>Primeiro emplacamento.</li>
                <li>Licenciamento anual.</li>
                <li>Transferência de propriedade.</li>
                <li>Transferência de estado / município.</li>
                <li>Comunicação de venda ao DETRAN.</li>
                <li>Consulta débitos.</li>
                <li>Baixa sucata.</li>
                <li>Pagamento de débitos.</li>
                <li>2° via do CRV (recibo de compra e venda).</li>
                <li>2° via do CRLV (porte obrigatório).</li>
                <li>2° via CNH.</li>
                <li>Consulta da situação regular do veiculo.</li>
                <li>Documentação de veículos blindados.</li>
                <li>Desbloqueio de Sinistro.</li>
            </ul>
        </div>
        <div class="main_azul" id="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3674.99880168831!2d-47.06479938540024!3d-22.913415043867257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8c8cbdac3a855%3A0x703bc03d5ccb4085!2sDespachante%20Central!5e0!3m2!1spt-BR!2sbr!4v1633373107302!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <h1 class="titulo">Onde nos encontrar</h1>
            <ul>
                <li>Campinas-SP</li>
                <li>Rua Sete de Setembro, 506</li>
                <li>Vila Industrial</li>
                <li>CEP: 13035-350</li>
            </ul>
        </div>
    </main>
    <footer>
        <h2>Atendimento</h2>
        <section>
            <ul class="contato">
                <li><i class="fas fa-phone-alt"></i><span>(19) 3272-7655</span></li>
                <li><i class="fab fa-whatsapp"></i><a href="http://api.whatsapp.com/send?phone=5519991560933">Whatsapp</a></li>
                <li><i class="far fa-envelope"></i><span>Despachante@despachante.com</span></li>
            </ul>
            <ul class="etc">
                <li><a href="#">Formas de pagamento</a></li>
                <li><a href="#">Serviços</a></li>
                <li><a href="termosDeUso.php">Termos de uso</a></li>
                <li><a href="politicaDePrivacidade.php">Política de privacidade</a></li>
            </ul>
        </section>
    </footer>
</body>
</html>