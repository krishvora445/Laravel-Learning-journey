<x-layout title="Ideas">
    <div class="mt-4">
            <h2>Your IDEAS 🔥</h2>
            @if($ideas->count())
                <ul class="mt-6 grid gap-6 text-white sm:grid-cols-2 xl:grid-cols-3">
                    @foreach($ideas as $idea)
                        <x-idea-card href="/ideas/{{$idea->id}}">
                            {{$idea->description}}
                        </x-idea-card>
                    @endforeach
                </ul>
            @else
                <p class="mt-4 text-white/80">No ideas yet.<a href="/ideas/create" class="underline">create a new one</a></p>
            @endif
    </div>
</x-layout>
