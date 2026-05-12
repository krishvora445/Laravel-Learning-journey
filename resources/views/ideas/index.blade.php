<x-layout title="Ideas">

    <div class="page-grid mt-8">
        <div class="page-card page-card--featured">
            <form method="POST" action="/ideas">
                @csrf
                <div class="col-span-full">
                    <label for="description" class="block text-sm/6 font-medium text-white">New Idea</label>
                    <div class="mt-2">
                        <textarea id="description" name="description" rows="3" class="block w-full border border-white bg-black px-3 py-1.5 text-base text-white outline-none placeholder:text-white/60 focus:bg-white focus:text-black sm:text-sm/6"></textarea>
                    </div>
                    <p class="mt-3 text-sm/6 text-white/80">I have an Idea, you want to save for later?</p>
                </div>
                <div class="mt-6 flex items-center gap-x-6">
                    <button type="submit" class="border border-white bg-white px-4 py-2 text-sm font-semibold text-black hover:bg-black hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Save Idea</button>
                </div>
            </form>
        </div>

        <div class="page-card col-span-full md:col-span-6">
            <h2>Your IDEAS 🔥</h2>
            @if($ideas->count())
                <ul class="mt-4 space-y-3 text-white">
                @foreach($ideas as $idea)
                    <li>
                        <a href="/ideas/{{$idea->id}}" class="block border border-white bg-black p-3 text-white transition-colors hover:bg-white hover:text-black">{{$idea->description}}</a>
                    </li>
                @endforeach
                </ul>
            @else
                <p class="mt-4 text-white/80">No ideas yet. Be the first to share one!</p>
            @endif
        </div>
    </div>
</x-layout>
