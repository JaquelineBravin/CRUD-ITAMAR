<!-- aqui está o arquivo de formulário de cadastro -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO</title>
    <link rel="stylesheet" href="/View/Modules/Pessoa/cssForm.css">
</head>
<body>
    
    <fieldset>
        <legend>Cadastro de Pessoa</legend>

        <!-- essa rota vai ser chamada quando o botão save for clicado -->
        <form action="/pessoa/form/save" method="post">
            <input type="hidden" name="id" value="<?= $model->id ?>">

            <label for="nome">NOME</label>
            <input type="text" id="nome" name="nome" value="<?=$model->nome?>">
            
            <label for="email">EMAIL</label>
            <input type="text" id="email" name="email" value="<?=$model->email?>">
            
            <button type="submit">Salvar</button>
        </form>

        <a href="/pessoa">Lista de pessoas</a>

    </fieldset>
</body>
</html>