<form action="{{ Route('chusqers.fav', $chusqer->id) }}" method="POST" id="chusqer-actions-buttons">
    {{ csrf_field() }}
    <button type="submit" class="button alert">Fav</button>
    @if($chusqer->isUnlikedByUser(Auth::user()))
        <span class="label label-primary"> Vaya  vaya !!! ya no te gusta esta publicacion !!!!</span>
    @endif
</form>