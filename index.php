<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <h1>Formulário com PHP</h1>

         <p><span class="error">*</span> Obrigatório</p>

        Nome:<input name="name" type="text"><span class="error">*</span><br><br>
        E-mail:<input name="email" type="text"><span class="error">*</span><br><br>
        Website: <input name="website" type="text"><span class="error">*</span><br><br>
        Comentários: <textarea name="comment" cols="30" rows="3"></textarea><br><br>
        Gênero: <input name="gender" value="masculino" type="radio"> Masculino
        <input name="gender" value="feminino" type="radio"> Feminino
        <input name="gender" value="outros" type="radio"> Outros
        <br><br>
        <button name="enviado" type="submit">Enviar</button><br><br>
        
        <h1>Dados enviados:</h1>

        <?php

            if(isset($_POST['enviado'])) {

                if(empty($_POST['name']) || strlen($_POST['name']) < 3 || strlen($_POST['name']) > 90) {
                    echo '<p class="error">Preencha o campo nome</p>';
                    die();
                }

                if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL )) {
                    echo '<p class="error">Preencha o campo E-mail</p>';
                    die();
                }

                if(!empty($_POST['website']) && !filter_var($_POST['website'], FILTER_VALIDATE_URL)) {
                    echo '<p class="error">Preencha o campo Website</p>';
                    die();
                }

                $gender = "Não selecionado";

                if(isset($_POST['gender'])){
                    $gender = $_POST['gender'];

                    if($gender != "masculino" && $gender != "feminino" && $gender != "outros") {
                        echo '<p class="error">Erro no campo sexo</p>';
                        die();
                    }
                }

                echo "<p>Nome: " . $_POST['name'] . "</p>";
                echo "<p>E-mail: " . $_POST['email'] . "</p>";
                echo "<p>Website: " . $_POST['website'] . "</p>";
                echo "<p>Comentário: " . $_POST['comment'] . "</p>";
                echo "<p>Gênero: " . $gender . "</p>";


            }

        ?>

    </form>
</body>
</html>