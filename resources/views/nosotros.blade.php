@extends('layouts.app')

@section('title',"Nosotros")

@section('content')

<div class="imgContainer">
    <img class="image" src="{{ asset('assets/nosotros.png') }}" alt="Local_Coffeenet"></img>
    <div class="transparency"></div>
    <div class="col-md-6 px-0">
        <h1 class="display-4 title">CoffeeNet Todo Para Sublimación</h1>
        <p class="lead my-3 description">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
        <p class="lead mb-0 link"><a href="#" class="text-white fw-bold">Ver Productos...</a></p>
    </div>
</div>

<h1 class="display-4 fst-italic text-center mt-5 mb-5">¿Cómo llegar?</h1>

<div class="d-flex justify-content-center">
        <div class="shadow-lg map-area">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d923.8679385326819!2d-101.0163318895815!3d22.14610769347286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842a98d16583edd7%3A0xb86748da19117e42!2sCoffeenet%20slp%20TODO%20PARA%20SUBLIMACION!5e0!3m2!1ses!2smx!4v1651282211242!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
</div>

<div class="d-flex justify-content-center my-3">
    <a href="https://goo.gl/maps/HjWV5SR94WRowJPB9" class="btn btn-primary">Ver en Maps</a>
</div>

@endsection