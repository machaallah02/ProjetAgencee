@extends('base')
@section('title', 'home')
@section('content')

<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
        <h1>Agence immobiliere AM</h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed rem dignissimos consequatur voluptates perferendis dolores minima, eveniet modi iste et reiciendis accusamus id velit corporis saepe nostrum tempora voluptatem. Modi!
        </p>
    </div>
</div>
<div class="container">
    <h2>Nos derniers biens</h2>
    <div class="row">
        @foreach ($properties as $property )
        <div class="col">
            @include('property.card')
        </div>
        @endforeach
    </div>
</div>

@endsection
