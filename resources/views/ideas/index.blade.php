<x-layout title="Ideas">
    <section class="space-y-6">
        <div class="flex flex-col gap-4 rounded-box border border-base-300 bg-base-100 p-6 shadow-sm md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.25em] text-primary">Ideas board</p>
                <h1 class="mt-2 text-3xl font-bold">Your ideas 🔥</h1>
                <p class="mt-2 text-base-content/75">Capture, revisit, and refine the ideas you care about most.</p>
            </div>

            <a href="{{ url('/ideas/create') }}" class="btn btn-primary">Create new idea</a>
        </div>

        @if($ideas->count())
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($ideas as $idea)
                    <x-idea-card href="{{ url('/ideas/' . $idea->id) }}">
                        {{ $idea->description }}
                    </x-idea-card>
                @endforeach
            </div>
        @else
            <div class="card border border-base-300 bg-base-100 shadow-sm">
                <div class="card-body items-start gap-4">
                    <h2 class="card-title">No ideas yet</h2>
                    <p class="text-base-content/75">Create your first idea and start building your personal backlog.</p>
                    <div class="card-actions">
                        <a href="{{ url('/ideas/create') }}" class="btn btn-primary">Create a new one</a>
                    </div>
                </div>
            </div>
        @endif
    </section>
</x-layout>
