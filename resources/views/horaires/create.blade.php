<form method="POST" action="{{ route('horaires.store') }}">
              @csrf
    <label for="">Heure début</label>
    <input name="start" type="time">


    <label for="">Heure fin</label>
    <input name="end" type="time">

    <label for="">Places dispo</label>
    <input name="places" type="number">

    <button type="submit">Ok</button>
</form>