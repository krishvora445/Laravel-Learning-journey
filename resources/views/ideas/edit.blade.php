<x-layout title="Ideas">

    <div class="page-grid mt-8">
        <div class="page-card page-card--featured">
            <form method="POST" action="/ideas/{{$idea->id}}" id="edit-form">
                @csrf
                @method('PATCH')
                <div class="col-span-full">
                    <label for="description" class="block text-sm/6 font-medium text-white">Edit Your Idea</label>
                    <div class="mt-2">
                        <textarea id="description" name="description" rows="3" class="block w-full border border-white bg-black px-3 py-1.5 text-base text-white outline-none placeholder:text-white/60 focus:bg-white focus:text-black sm:text-sm/6">{{$idea->description}}</textarea>
                    </div>
                </div>
            </form>

            <div class="mt-6 flex items-center gap-x-4">
                <button type="submit" form="edit-form" class="border border-white bg-white px-4 py-2 text-sm font-semibold text-black hover:bg-black hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Update</button>

                <form method="POST" action="/ideas/{{$idea->id}}" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="border border-white bg-black px-4 py-2 text-sm font-semibold text-white hover:bg-white hover:text-black focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Delete</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
