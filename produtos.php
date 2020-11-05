<?php include_once('conexao.php');?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Produtos - Full Stack Eletro</title>
        <link rel="stylesheet" type="text/css" href="./css/estilo.css" />
        <script src="js/funcoes.js"></script>
    </head>
    <body>
        <header id="cabecalho">
           <!-- Inicio do Menu-->
           <?php include('menu.php');?>
           <!--Fim do menu-->
           <h2>Produtos</h2>
           <hr />
        </header>
        <main id="conteudo">
            <aside class="sidebar">
                <h3>Categorias</h3>
                <ol>
                  <?php
                    $cat = "select nome_produto from produto";
                    $total = $conn->query($cat);
                    $qtd = $total->num_rows;
                  ?>
                  <li onclick='exibir_todos()' onmouseover='sidebarUp(this)' onmouseout='sidebarDown(this)'>Todos (<?php echo $qtd;?>)</li>
                  <?php
                    $geladeira = 0;
                    $fogao = 0;
                    $microondas = 0;
                    $lavaLoucas = 0;
                    $lavaRoupas = 0;
                    while($qcat = $total->fetch_array()){
                        switch ($qcat["nome_produto"]){
                            case "Geladeira":
                                $geladeira++;
                                break;
                            case "Fogao":
                                $fogao++;
                                break;
                            case "Microondas":
                                $microondas++;
                                break;
                            case "Lava-loucas":
                                $lavaLoucas++;
                                break;
                            case "Lava-roupas":
                                $lavaRoupas++;
                            break;
                        } 
                    }
                    ?>
                    <li onclick='exibir_categoria("Geladeira")' onmouseover='sidebarUp(this)' onmouseout='sidebarDown(this)'>Geladeiras (<?php echo $geladeira;?>)</li>
                    <li onclick='exibir_categoria("Fogao")' onmouseover='sidebarUp(this)' onmouseout='sidebarDown(this)'>Fogões (<?php echo $fogao;?>)</li>
                    <li onclick='exibir_categoria("Microondas")' onmouseover='sidebarUp(this)' onmouseout='sidebarDown(this)'>Microondas (<?php echo $microondas;?>)</li>
                    <li onclick='exibir_categoria("Lava-loucas")' onmouseover='sidebarUp(this)' onmouseout='sidebarDown(this)'>Lava-Louças (<?php echo $lavaLoucas;?>)</li>
                    <li onclick='exibir_categoria("Lava-roupas")' onmouseover='sidebarUp(this)' onmouseout='sidebarDown(this)'>Lavadoura de roupas (<?php echo $lavaRoupas;?>)</li>
                </ol>
           </aside>
           <section class="produtos">
            <ul>
              <?php
                $sql = "select * from produto";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($rows = $result->fetch_assoc()){
              ?>
                <li id='<?php echo $rows["nome_produto"]?>' class='box_produto' onmouseover='upProd(this)' onmouseout='downProd(this)'>   
                    <img src='<?php echo $rows["imagem"]?>' width='120' onclick='destaque(this)' />
                    <p><a href='pedido.php?idprod=<?php echo $rows["idproduto"]?>'><?php echo $rows["descricao"]?></a></p>
                    <hr>
                    <p><strike><?php echo $rows["preco"]?></strike></p>
                    <p class='destaque'><?php echo $rows["precofinal"]?></p>  
                </li>     
              <?php
                    }
                
                }else{
                    echo "Nenhum produto cadastrado";
                }
              ?>
              </ul>
            </section>
        </main>
        <footer id="rodape">
            <p class="pagamento">Formas de pagamento</p>
            <img src="./imagens/pagamentos.jpg" alt="Formas de Pagamento"  />
            <p class="copy">&copy; Recode Pro</p>
        </footer>
    </body>
</html>