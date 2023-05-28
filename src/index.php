<!-- Página de Login -->

<?php
/* script para conectar ao banco de dados e carregar os produtos */ 
include('./php/connect-mysql.php');
$sql_code = "SELECT * FROM produtos";
$query = mysqli_query($conexao, $sql_code);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- favicon da página -->
    <link rel="shortcut icon" href="./images/logo-white.png" type="image/x-icon">

    <title>TechnoStore</title>
    
    <!-- Estilização da página -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">
    
    <!-- Script para ações na página -->
    <script defer src="./js/index.js"></script>
</head>
<body>
    
    <header>
        <h2>TechnoStore<img class="logo" src="./images/logo-white.png"></h2>
        <nav class="navegacao">
            <a href="#">Home</a>
            <a href="">Sobre</a>
            <a href="">Contato</a>
            <button class="btnlogin-popup">Login</button>
        </nav>
    </header>

    <!-- Formulário pop-up -->
    <div class="formulario-login">
        <span class="icone-fechar">
            <img src="./images/close.png">
        </span>

        <!-- Div de login do usuário -->
        <div class="form-box login">
            <h2>Login</h2>
            <form action="./php/login-check.php" method="POST">
                <div class="input-box">
                    <span class="icones"><img src="./images/mail.svg" alt=""></span>
                    <input type="text" name="email" required>
                    <label>E-mail</label>
                </div>
                <div class="input-box">
                    <span class="icones"><img src="./images/eye-off-outline.svg" class="senha-icone-login" alt=""></span>
                    <input type="password" name="senha" class="senha-login" required>
                    <label>Senha</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox"> Lembre-me</label>
                    <a href="#">Esqueceu sua Senha?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-registro">
                    <p>Não possui uma conta? <a href="#" class="link-registro">Registre-se</a></p>
                </div>
            </form>
        </div>

        <!-- Div de Registro do Usuário -->
        <div class="form-box register">
            <h2>Cadastre-se</h2>
            <form action="./php/cadastrar-usuario.php" method="POST">
                <div class="input-box">
                    <span class="icones"><img src="./images/person.svg" alt=""></span>
                    <input type="text" name="nome" required>
                    <label>Nome de Usuário</label>
                </div>
                <div class="input-box">
                    <span class="icones"><img src="./images/mail.svg" alt=""></span>
                    <input type="text" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icones"><img class="senha-icone-registro" src="./images/eye-off-outline.svg"></span>
                    <input type="password" name="senha" class="senha-registro" required>
                    <label>Senha</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" name="" required> Eu aceito os termos e condições</label>
                </div>
                <button type="submit" class="btn">Registrar</button>
                <div class="login-registro">
                    <p>Já possui uma conta? <a href="#" class="link-login">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <main>
        <?php
        // Banco de Dados não retornou nenhum resultado
        if (mysqli_num_rows($query) == 0) {
            echo "<h1 style=\"
            display: flex;
            color: black;
            flex-direction: row;
            align-items: center;
            font-size: 40pt;\">
                TechnoStore<img style=\"width: 400px; height: 400px;\" src=\"./images/logo-black.png\">
            </h1>";
        }
        
        // Banco de Dados retorna algum resultado
        while($row=mysqli_fetch_array($query)) {
        ?>
            <div class="span-php">
                <div class="nome-produto">
                    <?php echo $row['nome']; ?>
                    <img src="./images/image-outline.svg" alt="foto-produto">
                </div>
                <hr style="border-color: rgba(255, 255, 255, 0.5); width: 100%; position: absolute; top: 50%;">
                <h3>Descrição:</h3>
                <p><?php echo $row['descricao'] ?></p>
                <hr style="border-color: rgba(255, 255, 255, 0.5); width: 100%; position: absolute; bottom: 47px;">
                <div class="rodape-item">
                    <span class="preco" style="left: auto;">
                        R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?>
                    </span>
                </div>
            </div>
        <?php
        } mysqli_close($conexao);
        ?>
    </main>

</body>
</html>