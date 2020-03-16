<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <!-- favicon-->
        <link rel="shortcut icon" href="{{ url('img/logo.svg') }}" />

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <title>Covid Community Response - Ireland</title>

        <!-- fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">

        <!-- compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />

        <link rel="stylesheet" href="{{url('css/app.css')}}">

    </head>

    <body>

        @include('layout.nav')
