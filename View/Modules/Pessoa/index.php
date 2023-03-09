<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <style>
        body{
            background-image: linear-gradient(to right, rgb(0, 0, 0), rgb(100, 100, 100));
            color: #ffffff96;
        }

        div{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #000000af;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 15px;
            padding: 20px;
        }
        button {
    background-color: rgba(53, 53, 53, 0.171);
    text-decoration: none;
    padding: 10px 15px;
    font-size: 15px;
    display: block;
    cursor: pointer;
    margin: 1px;
    border-radius: 5px;
    border: none;
    margin: 5px;
    color: #ffffff96;
    }
    a{
        text-decoration: none;
    }
    </style>

</head>
<body>
    <div>
        <h2>O que deseja?</h2>
        <button onclick="window.location.href = '/pessoa/form'">Cadastrar pessoa</button>
        <a href='/pessoa'><button>Formulário de pessoas</button></a>
    </div>
</body>
</html>