<!-- arquivo de listagem -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Pessoa</title>
    <link rel="stylesheet" href="View/Modules/Pessoa/cssLista.css">
</head>
<body>
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>AÇÕES</th>
            </tr>
            <!-- acessando meu array de objetos -->
            <?php foreach($model->rows as $item): ?>
                <tr>
                    <!-- pegando as variaveis -->
                    <td> <?= $item->id ?> </td>
                    <td><?= $item->nome ?></td>
                    <td><?= $item->email ?></td>
                    <td>
                        <form action="/pessoa/form?id=<?=$item->id?>" method="POST">
                            <input type="submit" value="Update">
                        </form>
                        <form action="/pessoa/delete?id=<?=$item->id?>" method="post">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
            
            <?php if (count($model->rows)==0) : ?>
                <tr>
                    <td colspan="4">Nenhum registo encontrado</td>
                </tr>
            <?php endif ?>    
        </table>
        <a href="/pessoa/form">Cadastrar pessoa</a>
        <a href="/">Página inicial</a>
    </div>
</body>
</html>