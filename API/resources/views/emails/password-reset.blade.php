@extends('beautymail::templates.sunny')
@section('content')
    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Recuperación de contraseña',
        'level' => 'h1',
    ])
    @include('beautymail::templates.sunny.contentStart')
    <h4>Hola {{ $name }} {{ $lastname }}</h4>
    <p>Recibimos una solicitud para cambiar su contraseña en Caribbean Connection.</p> <br>
    <p>Si no solicitó un cambio de contraseña, puede ignorar este mensaje y seguir utilizando su contraseña actual. Alguien probablemente escribió su dirección de correo electrónico por accidente.</p>
    @include('beautymail::templates.sunny.contentEnd')
    @include('beautymail::templates.sunny.button', [
            'title' => 'Recuperar contraseña',
            'link' => "http://caribbean.dev/password/reset?token=$token&email=$email"
    ])
    @include('beautymail::templates.sunny.contentStart')
    <br><br>
    <div style="text-align: center">
        <h4 style="text-align: center;"><i>Atentamente:</i></h4>
        <p>Ing. Horacio Darinel Espinosa Barceló <br> Área de soporte y desarrollo</p>
    </div>
    @include('beautymail::templates.sunny.contentEnd')
@stop