<?php
require_once("app/Class/UserInfo.class.php");
require_once("app/Class/Licencas.class.php");


$info = new UserInfo();
$licence = new Licencas();
$cod = $licence->getLicence();
$erro =   $licence->countStatus('erro');
$usadas = $licence->countStatus('usadas');
$livres = $licence->countStatus('livres');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>


    <section class="get-in-touch">
        <h1 class="title">LICENÇAS MICROSOFT 2019</h1>
        <div class="contact-form row">
            <div class="form-field col-lg-6">
                <input id="hostname" class="input-text js-input" type="text" value="<?php echo $info->getHostname() ?>" required>
                <label class="label" for="name">HOSTNAME</label>
            </div>
            <div class="form-field col-lg-6 ">
                <input id="username" class="input-text js-input" type="text" value="<?php echo $info->getUserName() ?>" required>
                <label class="label" for="email">Usuário</label>
            </div>
            <div class="form-field col-lg-6 ">
                <input id="num_serie" class="input-text js-input" type="text" required>
                <label class="label" for="company">Número de série PC</label>
            </div>
            <div class="form-field col-lg-6 ">
                <input id="local" class="input-text js-input" type="text" required>
                <label class="label" for="phone">Local</label>
            </div>
            <div class="form-field col-lg-5">
                <input id="val_chave" disabled class="input-text js-input" value="<?php echo $cod->CHAVES; ?>" type="text" required>
                <label class="label" for="val_chave">Chave de ativação</label>
            </div>
            <div class="form-field col-lg-2">
                <input disabled id="id_chave_l" class="input-text js-input" value="<?php echo $cod->ID; ?>" type="text" required>
                <label class="label" for="id_chave_l">Codigo</label>
            </div>
            <div class="form-field col-lg-5">
                <input id="andar" class="input-text js-input" value="" type="text">
                <label class="label" for="andar">Andar</label>
            </div>
            <input type="hidden" id="id_chave" value="<?php echo $cod->ID; ?>">
            <div class="form-field col-lg-4">
                <input id="save_changes" class="submit-btn" type="submit" value="Salvar">
            </div>
            <div class="form-field col-lg-4">
                <button class="submit-btn" id="atualiza_chave" href="#">Atualizar</button>
            </div>
            <div class="form-field col-lg-4">
                <button class="submit-btn" id="chave_erro" href="#">Falha</button>
            </div>


        </div>
        <div class="col-lg-12">
            <div class="alert alert-danger" id="resultado">

                <span id="text_result"></span>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- <noscript> -->
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <span><strong>Atenção: </strong> Antes de salvar, certifique-se que a licença funcionou!.</span>
            </div>
            <!-- </noscript> -->
        </div>

        

        <div class="right-corder-container">
        <div class="oaerror success">
                    <strong>Ativados:</strong> - <b id="ativado"> <?php echo  $usadas->total ?></b>.
                </div>

        </div>

        <div class="right-corder-container call-us">
        <div class="oaerror danger">
                    <strong>Com Erro:</strong> - <b id="erro"><?php echo   $erro->total ?></b>
                </div>

        </div>
        <div class="right-corder-container whatapp-us">
        <div class="oaerror warning">
                    <strong>Disponives:</strong> - <b id="erro"><?php echo   $livres->total ?></b>
                </div>
        </div>
        </div>
       <?php
            $erro->total;
       ?> 



    </section>





    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/showLicenca.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</body>

</html>