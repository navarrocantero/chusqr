<form action="{{ Route('chusqers.unfav', $chusqer->id) }}" method="POST" id="chusqer-actions-buttons">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <button type="submit" class="button alert">UNFAV</button>
    <span class="label ">
       Te gusta esta publicacion !
    </span>
</form>