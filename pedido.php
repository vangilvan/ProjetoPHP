<?php 
   include_once('conexao.php');

   if(isset($_GET['idprod'])){
       $idProd = $_GET['idprod'];
       

       $sql = "select * from produto WHERE idproduto = $idProd";
       $result = $conn->query($sql);
       $infoProd = $result->fetch_array();
   }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Contato - Full Stack Eletro</title>
        <link rel="stylesheet" type="text/css" href="./css/estilo.css" />
        <script src="js/funcoes.js"></script>
    </head>
    <body>
        <header id="cabecalho">
            <!-- Inicio do Menu-->
            <?php include('menu.php');?>
            <!--Fim do menu-->
            <h2>Pedido</h2>
            <hr />
        </header>
        <main id="conteudo">
            <section class="pedido">
                <form method="post" action="fecha_pedido.php">
                    <table width="800">
                        <tr>
                            <td rowspan="6" class="prod">
                                <img src='<?php echo $infoProd["imagem"]?>' width='120' />
                                <p><?php echo $infoProd["descricao"]?></p>
                                <p>De: <?php echo $infoProd["preco"]?></p>
                                <p class='destaque'>Por: <?php echo $infoProd["precofinal"]?></p>
                            </td>
                            <td><label for="nome"><b>Nome:</b></label></td>
                            <td colspan="3"><input type="text" name="nome" id="nome" /></td>
                        </tr>
                        <tr>
                           <td><label for="endereco"><b>Endereço:</b></label></td>
                           <td class="end"><input type="text" name="endereco" id="endereco" /></td>
                           <td><label for="numero"><b>Nº:</b></label></td>
                           <td><input type="number" name="numero" id="numero" class="num" /></td>
                        </tr>
                        <tr> 
                           <td><label for="bairro"><b>Bairro:</b></label></td>
                           <td colspan="3"><input type="text" name="bairro" id="bairro" /></td>
                        </tr>
                        <tr>
                           <td><label for="cidade"><b>Cidade:</b></label></td>
                           <td colspan="3"><input type="text" name="cidade" id="cidade" /></td>
                        </tr>
                        <tr>
                           <td><label for="telefone"><b>Telefone:</b></label></td>
                           <td colspan="3"><input type="tel" name="telefone" id="telefone" class="tel" /></td>
                        </tr>
                        <tr>
                           <td><label for="quantidade"><b>Quantidade:</b></label></td>
                           <td colspan="3"><input type="Number" name="quantidade" value="1" id="quantidade" class="qtd" /></td>
                        </tr>
                        <tr>
                           <td colspan="5" class="sub">
                               <input type="hidden" name="idprod" value='<?php echo $infoProd["idproduto"]?>' />
                              <button type="submit" name="envia">Realizar Pedido</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </section>
        </main>
        <footer id="rodape">
            <p class="pagamento">Formas de pagamento</p>
            <img src="./imagens/pagamentos.jpg" alt="Formas de Pagamento"  />
            <p class="copy">&copy; Recode Pro</p>
        </footer>
    </body>
</html>