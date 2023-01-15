{{ $horaires }}

@foreach($horaires as $horaire)
    <h1>{{ $horaire->start}} / {{ $horaire->end }}</h1>

   {{ $horaire->horaire_decoupes}}
   <hr>
    @foreach($horaire->horaire_decoupes as $decoupe)
        
        {{ $decoupe->resas }}
    @endforeach

@endforeach