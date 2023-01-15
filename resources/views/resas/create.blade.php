<form method="POST" action="{{ route('resas.store') }}">
    @csrf

    <input name="places" type="number">
    <label for="">Resa pour combien</label>


    <input name="name" type="text">
    <label for="">Nom de la resa</label>

    @foreach($horaires as $horaire)
        @foreach($horaire->horaire_decoupes as $decoupe)
            <input value="{{$decoupe->id}}" name="horaire_decoupes_id" type="radio">
            <label>{{ $decoupe->start }} - {{ $decoupe->end }}</label>
        @endforeach
    @endforeach

<button type="submit">Ok</button>
</form>