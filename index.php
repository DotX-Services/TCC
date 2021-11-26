<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2077a80796.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="shortcut icon" type="imagex/png" href="media/favicon.ico">
    <title>Despachante Central - Home</title>
</head>
<body>
    <?php include('includes/header.php'); ?>
    <main>
        <div class="main_branca">
            <img src="./media/loja.png" alt="Teste">
            <h1 class="titulo">Sobre nós</h1>
            <p>Somos uma empresa de despache já consolidada no ramo. Estamos prontos para fazer qualquer tipo de documentação, emplacamento, enviar 2ª via etc. Sendo assim, seu carros e sua documentação estarão seguros em nossas mãos.</p>
        </div>
        <div class="main_azul">
            <img src="./media/site.png" alt="Teste">
            <h1 class="titulo">O site</h1>
            <p>Esperamos em todos os nossos projetos tirar essa dor de cabeça, de mexer com a papelada e a parte mais burocrática, dos nossos clientes. <br><br>Dessa forma, decidimos criar este site, com o intuíto de automatizar muitos processos e passar para nosso cliente a profisssionalidade e a segurança de que seu automóvel precisa. <br><br> É possivel <strong>consultar status de pedidos já feitos</strong>, <strong>tirar dúvidas frequentes com nosso chatbot</strong> e <strong>fazer novos pedidos</strong>. Qualquer dúvida ou dificuldade, pode nos contatar diretamente pela parte de <strong>atendimento</strong>.</p>
        </div>
        <div class="main_branca" id="servicos">
            <img src="./media/servicos.png" alt="Teste" id="servicosImg">
            <h1 class="titulo">Nossos Serviços</h1>
            <ul>
                <li>Primeiro emplacamento.</li>
                <li>Licenciamento anual.</li>
                <li>Transferência de propritário.</li>
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
            <p>Cidade: Campinas (SP)<br>Endereço: Rua Sete de Setembro, 506 - Vila Industrial<br>CEP: 13035-350</p>
        </div>
            <?php include('includes/footer.php'); ?>
        <div id="chatbot">
            <button type="button" class="chatLauncher" style="display:none;"></button>
            <script src="scripts/chatbot.js"></script>
        </div>
    </main>
</body>
</html>