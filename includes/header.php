<?php

    require_once('model/clienteDAO.php');

?>

<header>
    <a href="index.php"><img src="media/Despachante.png" alt="Foto Despachante" id="fotoDespachante"></a>
    <nav>
        <ul>
            <a href="index.php#servicos">
                <i class="fas fa-car-side"></i>
                <span>Nossos Serviços</span>
            </a>
            <a href="index.php#mapa">
                <i class="fas fa-map-marked"></i>
                <span>Onde nos encontrar</span>
            </a>
            <a href="index.php#contato">
                <i class="fas fa-bullhorn"></i>
                <span>Fale conosco</span>
            </a>
        </ul>
        <input type="image" src="media/Menu.png" class="menu">
    </nav>
    <div class="traco"></div>
    <div>
                    <?php
                        session_start();
                        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['idUser'])){
                            $id = $_SESSION['idUser'];
                            $dao = new ClienteDAO();
                            $c = $dao->obter($id);
                            $nome = $c->get_nome().'.svg';
                            echo '<a href="conta.php"><img src="https://avatars.dicebear.com/api/initials/'. $nome .'" alt="Foto usuário" style="border-radius: 50%; width: 100px"></a>';
                        }else{
                            echo '<div id="usuario">
                                    <p class="entrar"><a href="entrar.php" class="entrar">Entrar</a></p>
                                    <p class="Abaixo"><a href="registrar.php">Cadastrar</a></p>
                                  </div>';
                            session_destroy();
                        }
                    ?>
    </div>
</header>
<section id="menuResponsivo">
        <a href="#" id="menuServ">
            <i class="fas fa-car-side"></i>
            <span>Nossos Serviços</span>
        </a>
        <a href="#" id="menuEncon">
            <i class="fas fa-map-marked"></i>
            <span>Onde nos encontrar</span>
        </a>
        <a href="#" id="menuFale">
            <i class="fas fa-bullhorn"></i>
            <span>Fale conosco</span>
        </a>
    </section>
<script src="scripts/script.js"></script>

