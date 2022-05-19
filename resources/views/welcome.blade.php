@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
    <div class="imgContainer col-12">
        <img class="image" src="{{ asset('assets/nosotros.png') }}" alt="Local_Coffeenet"></img>
        <div class="transparency"></div>
        <div class="col-lg-8 col-md-10 col-sm-12 px-0">
            <h1 class="display-4 title">CoffeeNet Todo Para Sublimación</h1>
            <p class="lead my-3 description">CoffeNet Todo Para Sublimación se ha creado con el firme compromiso de proporcionarles a todos nuestros clientes los mejores productos e insumos para el decorado textil digital, respaldados por los lineamientos de control de calidad impuestos por nuestros proveedores internacionales.</p>
        </div>
    </div>

    <div class="container marketing">
        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your
                        mind.</span></h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some
                    exciting prose here.</p>
            </div>
            <div class="col-md-5">
                <img src="{{ asset('assets/taza.png') }}" alt="Imagen de Tazas para Sublimación" width="90%" height="500" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for
                        yourself.</span></h2>
                <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea
                    of how this layout would work with some actual real-world content in place.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <div class="col-md-5">
                    <img src="{{ asset('assets/gorra.png') }}" alt="Imagen de Gorras para Sublimación" width="250%" height="500" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                </div>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">And yes, this is the last block of representative placeholder content. Again, not
                    really intended to be actually read, simply here to give you a better view of what this would look like
                    with some actual content. Your content.</p>
            </div>
            <div class="col-md-5">
                <div class="col-md-5">
                    <img src="{{ asset('assets/termo.png') }}" alt="Imagen de Termos para Sublimación" width="250%" height="500" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                </div>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for
                        yourself.</span></h2>
                <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea
                    of how this layout would work with some actual real-world content in place.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <div class="col-md-5">
                    <img src="{{ asset('assets/playera.png') }}" alt="Imagen de Playeras para Sublimación" width="250%" height="500" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                </div>
            </div>
        </div>

    </div>

@endsection
