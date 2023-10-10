<x-mail::message>
# Nouvelle demande de contact
Une nouvelle demande de contact a été fait pour le bien <a href="{{route('property.show', ['slug'=>$property->getSlug(), 'property'=>$property])}}">{{$property->title}}</a>.
prenom:{{$data['firstname']}}
nom:{{$data['name']}}
Telephone:{{$data['phone']}}
Email:{{$data['email']}}

**Message : <br/>
{{$data['message']}}


</x-mail::message>
