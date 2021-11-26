<?php 

    require_once('dashboard/model/ServicosDAO.php');
    require_once('dashboard/model/ServicosDTO.php');
    require_once('model/clienteDAO.php');
    require_once('model/clienteDTO.php');

    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2077a80796.js" crossorigin="anonymous"></script>
        <title>Status do pedido</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/statusDoPedido.css">
        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="shortcut icon" type="imagex/png" href="media/favicon.ico">
    </head>
    <body>
        <?php 
            $id = $_SESSION['idUser'];
            $dao = new ClienteDAO();
            $c = $dao->obter($id);
        ?>
        <div class="cotainer">
            <header class="textoPrincipal">
                <a href="index.php"><img src="media/Despachante.png" alt="Foto Despachante" id="fotoDespachante"></a>
                <nav>
                    <a href="index.php#servicos">
                        <i class="fas fa-car-side"></i>
                        <span>Nosso Serviço</span>
                    </a>
                    <a href="index.php#mapa">
                        <i class="fas fa-map-marked"></i>
                        <span>Onde nos encontrar</span>
                    </a>
                    <a href="index.php#contato">
                        <i class="fas fa-bullhorn"></i>
                        <span>Fale conosco</span>
                    </a>
                    <input type="image" src="media/Menu.png" class="menu">
                </nav>
                <div class="traco"></div>
                <div>
                    <a href="conta.php"><img src="https://avatars.dicebear.com/api/initials/<?php echo $c->get_nome().'.svg';?>" alt="Foto usuário" href="conta.php" id="fotoUsuario"></a>
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

            <div class="tracoStatus"></div>

            <div class="titulo">
                <h1>Status do pedido</h1>
            </div>
            <main>
                <?php
                    $sDAO = new ServicosDAO();
                    $sDTO = new ServicosDTO(); 

                    $id = $_SESSION['idUser'];

                    //$cliente = $cDAO->obter($id);
                    $servicos = $sDAO->obter_por_cliente($id);
                        
                    if(!$servicos){
                        include('includes/pedidoVazio.php');
                    }

                    foreach ($servicos as $s) {
                        echo "<form action='controller/pagamento.php' method='POST'>
                                <table>
                                    <tr>
                                        <th>". $s->get_tipo() ."</th>
                                        <th>Data do pedido<br>". $s->get_dataPedido() ."</th>
                                    </tr>
                                    <tr>
                                        <td>Status do pedido:</td>
                                        <td class='secundario'>". $s->get_status() ."</td>
                                    </tr>
                                    <tr>
                                        <td>Prazo:</td>
                                        <td class='secundario'>". $s->get_prazo() ."</td>
                                    </tr>
                                    <tr>
                                        <td>Observações:</td>
                                        <td class='secundario'>". $s->get_observacao() ."</td>
                                    </tr>
                                    <tr>
                                        <td>Preço Final:</td>";
                                        if(is_numeric($s->get_preco()) == true and $s->get_preco() > 0){
                                            echo "<td class='secundario'><button type='submit' id='proximos' style='border: none'>R$". $s->get_preco() ."</button></td>";
                                        }else{
                                            echo "<td class='secundario'>". $s->get_preco() ."</td>";
                                        }
                                        echo"
                                    </tr>
                                    <tr>
                                        <td>Status do Pagamento:</td>
                                        <td class='secundario'>Pendente</td>
                                    </tr>
                                    <tr>
                                        <td>Documentação:</td>
                                        <td class='secundario'>". $s->get_statusDoc() ."</td>
                                    </tr>
                                </table>
                                <input type='hidden' name='preco' value='". $s->get_preco() ."'>
                                <input type='hidden' name='nome' value='". $s->get_tipo() ."'>
                                <input type='hidden' name='id' value='". $s->get_codigo() ."'> 
                            </form>";
                    }
                ?>
                <?php 
                
                    if($servicos){
                        echo '
                        <div id="a">
                            <a href="pedido.php" id="proximos">Novo pedido</a>
                        </div>';
                    }
                
                ?>
            </main>
            <?php include('includes/footer.php'); ?>
    </div>
        </div>
    </body>
</html>