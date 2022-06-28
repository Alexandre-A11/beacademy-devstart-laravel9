<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Via Cep</title>
</head>

<body>
    <div>
        <form action="{{ route('viacep.index.post') }}" method="post">
            @csrf
            <input type="text" name="cep" placeholder="Digite o CEP">
            <button type="submit">Buscar</button>
        </form>
    </div>
</body>

</html>