

<a  {{$attributes->merge(['class' => 'block border border-white bg-black p-3 text-white transition-colors hover:bg-white hover:text-black transition hover:border-white/60 hover:bg-neutral-focus'])}}>
    <div class="card-body">
{{--        <h2 class="card-title">Idea #{{$idea->id}}</h2>--}}
        <p>{{$slot}}</p>
    </div>
</a>
