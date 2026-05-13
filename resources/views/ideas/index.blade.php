<x-layout title="Ideas">
    <div class="page-grid mt-4">
        <div class="page-card col-span-full md:col-span-6">
            <h2>Your IDEAS 🔥 <a href="/ideas/create" class="text-2xl pl-30 ">+</a></h2>
            @if($ideas->count())
                <ul class="mt-4 space-y-3 text-white">
                @foreach($ideas as $idea)
                    <li>
                        <a href="/ideas/{{$idea->id}}" class="block border border-white bg-black p-3 text-white transition-colors hover:bg-white hover:text-black">{{$idea->description}}</a>
                    </li>
                @endforeach
                </ul>
            @else
                <p class="mt-4 text-white/80">No ideas yet.<a href="/ideas/create" class="underline">create a new one</a></p>
            @endif
        </div>
    </div>
</x-layout>
