<x-layout title="Ideas">

    <section class="mx-auto max-w-3xl space-y-6">
        <div class="rounded-box border border-base-300 bg-base-100 p-6 shadow-sm">
            <p class="text-sm uppercase tracking-[0.25em] text-primary">Edit</p>
            <h1 class="mt-2 text-3xl font-bold">Update your idea</h1>
            <p class="mt-2 text-base-content/75">Refine the details before saving the next version.</p>
        </div>

        <div class="card border border-base-300 bg-base-100 shadow-lg">
            <div class="card-body">
                <form method="POST" action="{{ url('/ideas/' . $idea->id) }}" id="edit-form" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-medium">Edit Your Idea</span>
                        </div>
                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            class="textarea textarea-bordered w-full @error('description') textarea-error @enderror"
                        >{{ $idea->description }}</textarea>
                        <x-forms.error name="description" />
                    </label>
                </form>

                <div class="card-actions justify-between">
                    <a href="{{ url('/ideas/' . $idea->id) }}" class="btn btn-ghost">Cancel</a>

                    <div class="flex flex-wrap gap-3">
                        <button type="submit" form="edit-form" class="btn btn-primary">Update</button>

                        <form method="POST" action="{{ url('/ideas/' . $idea->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline btn-error">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>
