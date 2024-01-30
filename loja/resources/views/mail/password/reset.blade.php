<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Código de verificação</title>
    <style>
        .codigo{
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .expiration{
            font-size: 10px;
        }
        .warning{
            font-size: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
     Olá, {{$token->user->name}}!
    <br>
     Detectamos que você solicitou a redefinição de senha para sua conta.
    <br>

         <strong>Código de verificação:</strong>
    <div class="codigo">
        {{$token->token }}
    </div>
    <span class="expiration">Este código expira em 60 minutos.</span>
    <span class="warning"> Se você não solicitou a redefinição de senha, ignore este e-mail.</span>
</body>
</html>

