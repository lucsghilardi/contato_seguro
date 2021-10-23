<?php


//SISTEMA ANTI SPAM
session_start();
//HASH
$_SESSION['hash'] = md5(rand(5, 15));
//So dispara se o valor for mais que 10 Segundos entre o abrir o site e o disparo
$_SESSION['data_site']=date('Y-m-d H:i:s');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio Teste</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
        <body>

                                <form action="#" method="POST" id='formulario_contato' name="formulario_contato">
                                    <input type="hidden" name='emailv' value="<?=$_SESSION['hash']?>" />
                                    <div class="mb-3">
                                    <label for="name" class="form-label">Nome</label>
                                    <input type="name" class="form-control" id="name" aria-describedby="name" name="nome" placeholder="Nome" required>
                                    </div>
                                    <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">E-mail</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="E-mail" required>
                                    </div>
                                    <div class="mb-5">
                                    <label for="telefone" class="form-label">DDD Telefone</label>
                                    <input type="telefone" class="form-control tel" id="telefone" name="telefone" placeholder="DDD Telefone" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-8 mb-3 mb-lg-0">
                                            <textarea type="text" placeholder="Mensagem" class="form-control" id="mensagem"  name="mensagem" rows="3" required></textarea>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <button type="submit" class="btn btn-primary w-100 h-100" style="background-color:#262477;border:0;" id='teste'>
                                                ENVIAR
                                                <img src="assets/logo_icones/arrow-right.svg" alt="">
                                            </button>
                                        </div>
                                    </div>
                                </form>

        </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js" integrity="sha512-Y/GIYsd+LaQm6bGysIClyez2HGCIN1yrs94wUrHoRAD5RSURkqqVQEU6mM51O90hqS80ABFTGtiDpSXd2O05nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
 $(function() {

    $('.tel').mask('(99) 99999-9999');


    $("#formulario_contato").submit(function(e){
        var values = $(this).serialize();

        $.ajax({
                url: "ajax/contato.php",
                type: "post",
                data: values ,
                success: function (response) {

                    if (response.status=='enviook')
                    {
                        alert('Envio Realizado com sucesso')
                    }
                // You will get response from your PHP page (what you echo or print)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                }
            });

        e.preventDefault();


});

    
});

</script>


