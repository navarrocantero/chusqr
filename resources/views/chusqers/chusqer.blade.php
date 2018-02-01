<div class="card">
    <div class="card-divider">
        <p>Añadido por <a href="/users/{{ $chusqer->user->id }}">{{ $chusqer->user->name }}</a> - <a href="{{ url('/') }}/chusqers/{{ $chusqer['id'] }}">Leer más</a></p>
    </div>
    <p class="chusqer-content">
        {{ $chusqer->content }}
    </p>
    <p class="chusqer-hashtags text-right">
        @foreach($chusqer->hashtags as $hashtag)
            <a href="/hashtag/{{ $hashtag->id }}"><span class="label label-primary">{{ $hashtag->slug }}</span></a>
        @endforeach
    </p>
    <div class="card-section">

    </div>
</div>