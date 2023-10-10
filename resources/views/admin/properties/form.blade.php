@extends('admin.admin')
@section('title', $property->exists ? "Editer un bien ":"Creer un bien")
@section('content')
<h1>@yield('title')</h1>

<form class="vstack gap-2" action="{{route($property->exists ? 'admin.property.update' : 'admin.property.store', $property)}}" method="post" enctype="multipart/form-data">
 @csrf
 @method($property->exists ? 'put' : 'post')

    <div class="row">
        <div class="col" style="flex: 100">
            <div class="row">
                @include('shared.input', ['class'=>'col','label'=>'titre', 'name'=>'title', 'value'=>$property->title])
                <div class="col row">
                    @include('shared.input', ['class'=>'col', 'name'=>'surface', 'value'=>$property->surface])
                    @include('shared.input', ['class'=>'col','label'=>'prix', 'name'=>'price', 'value'=>$property->price])
                </div>
            </div>
            @include('shared.input', ['type'=>'textarea','class'=>'col', 'name'=>'description', 'value'=>$property->description])
            <div class="row">
                @include('shared.input', ['class'=>'col','label'=>'piéce', 'name'=>'rooms', 'value'=>$property->rooms])
                @include('shared.input', ['class'=>'col','label'=>'chambre', 'name'=>'bedrooms', 'value'=>$property->bedrooms])
                @include('shared.input', ['class'=>'col','label'=>'étage', 'name'=>'floor', 'value'=>$property->floor])
            </div>
            <div class="row">
                @include('shared.input', ['class'=>'col','label'=>'ville', 'name'=>'city', 'value'=>$property->city])
                @include('shared.input', ['class'=>'col','label'=>'Adresse', 'name'=>'adress', 'value'=>$property->adress])
                @include('shared.input', ['class'=>'col','label'=>'code postale', 'name'=>'postal_code', 'value'=>$property->postal_code])
            </div>
            @include('shared.select', ['label'=>'Options', 'name'=>'options', 'value'=>$property->options()->pluck('id'), 'multiple'=>true])
            @include('shared.checkbox', ['label'=>'vendu', 'name'=>'sold', 'value'=>$property->sold, 'options'=>$options])

        </div>
        <div class="col vstack gap-2" style="flex: 25">
            @foreach ($property->pictures as $picture )
            <div id="picture{{ $picture->id }}" class="position-relative">
                <img src="{{$picture->getImageUrl()}}" alt="" class="w-100 d-block">
                <button type="button" class="btn btn-danger position-absolute bottom-0 w-100 start-0"
                    hx-delete="{{ route('admin.picture.destroy', $picture)}}"
                    hx-target="#picture{{$picture->id }}"
                    hx-swap="delete"
                    >
                    <span class="htmx-indicator spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Supprimer</button>
            </div>
            @endforeach
            @include('shared.upload', ['label'=>'Image', 'name'=>'pictures', 'multiple'=>true])
        </div>
    </div>
  <div>
    <button class="btn btn-success" type="submit">
        @if ($property->exists)
            Modifier
        @else
            Creer
        @endif
    </button>
  </div>
</form>

@endsection
