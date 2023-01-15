<h1>Id de la Résa : {{ $resa->id }}</h1>

<h2>Au nom de : {{ $resa->name}}</h2>

<h3>Pour le creneau :{{ $resa->horaire_decoupes->start}}-{{ $resa->horaire_decoupes->end}}
    pour la tranche : {{ $resa->horaire_decoupes->horaire}}
</h3>