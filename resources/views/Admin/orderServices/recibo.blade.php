<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recibo</title>
    <style>
        div {
            height: 180px;
            width: 90%;
            margin-left: 35px ;
            background-color:#fff8f8;

        }
    </style>
</head>
<body>

<div>
    <fieldset>
        <legend>RECIBO</legend>

        <p>Recebi(emos) de: <b>{{$cliente}}</b> a importancia de : <b>R$ {{number_format( $valorRecebido ,2,",",".")}}</b></p>
        <p>Referente ao serviço: <b>{{$servico}}</b> </p>
        <p>Observções: {{$obs}} </p>
        <p>Emissão: <b>{{date('d/m/Y')}}</b>  Assinatura:__________________________________________</p>


    </fieldset>

</div>

</body>
</html>
