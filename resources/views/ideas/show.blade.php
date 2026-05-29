<x-layout title="Idea details">
    <section class="space-y-6">
        <div class="flex items-center justify-between gap-4 rounded-box border border-base-300 bg-base-100 p-6 shadow-sm">
            <div>
                <p class="text-sm uppercase tracking-[0.25em] text-primary">Idea details</p>
                <h1 class="mt-2 text-3xl font-bold">Your idea 🔥</h1>
            </div>

            <a href="{{ url('/ideas') }}" class="btn btn-outline btn-sm">Back to ideas</a>
        </div>

        <div class="card border border-base-300 bg-base-100 shadow-lg">
            <div class="card-body gap-6">
                <x-idea-card>
                    {{ $idea->description }}
                </x-idea-card>

                <div class="card-actions justify-end">
                    <a href="{{ url('/ideas/' . $idea->id . '/edit') }}" data-test="edit-idea" class="btn btn-primary">Edit idea</a>
                </div>
            </div>
        </div>
    </section>
</x-layout>

