<x-layout title="Ideas">
    <section class="mx-auto max-w-3xl space-y-6">
        <div class="rounded-box border border-base-300 bg-base-100 p-6 shadow-sm">
            <p class="text-sm uppercase tracking-[0.25em] text-primary">Create</p>
            <h1 class="mt-2 text-3xl font-bold">Add a new idea</h1>
            <p class="mt-2 text-base-content/75">Write down your thought before it disappears.</p>
        </div>

        <div class="card border border-base-300 bg-base-100 shadow-lg">
            <div class="card-body">
                <form method="POST" action="{{ url('/ideas') }}" class="space-y-6">
                    @csrf

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text font-medium">Create New Idea</span>
                        </div>
                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            class="textarea textarea-bordered w-full @error('description') textarea-error @enderror"
                            placeholder="I have an idea about..."
                        ></textarea>
                        <x-forms.error name="description" />
                    </label>

                    <p class="text-sm text-base-content/75">I have an idea, do you want to save it for later?</p>

                    <div class="card-actions justify-end">
                        <button type="submit" class="btn btn-primary">Save idea</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>
