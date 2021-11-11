<?php 

    echo '    <header>
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
                    <img src="media/Menu.png" alt="teste" id="menu">
                </nav>
                <div class="traco"></div>
                <div id="usuario">';
                    session_start();
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                        echo '<p class="entrar"><a href="conta.php" class="entrar">Entrar</a></p>';
                    }else{
                        echo'<p class="entrar"><a href="entrar.php" class="entrar">Entrar</a></p>';
                    }
                    echo '<p class="Abaixo"><a href="registrar.php">Cadastrar</a></p>
                </div>
            </header>';

?>