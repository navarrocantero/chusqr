<div class="card">
    <div class="card-divider">
        <span>Fecha de laikeo -></span><span>{{$like->created_at}}</span>
    </div>

    <div class="card-section">
        <span>Nombre -></span>
        <a href={{ Route('user', $like->user()->first()->slug) }}><span>{{$like->user()->first()->name}}</span></a>
    </div>
</div>