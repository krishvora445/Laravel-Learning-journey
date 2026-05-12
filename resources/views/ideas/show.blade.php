<x-layout title="Home">

    <div class="max-w-xl mx-auto text-white m-3">
        <h1 class="text-2xl font-bold">Your IDEA 🔥</h1>

        <div class="mt-6 flex items-center gap-x-6 ">
            <p  class="block border border-white bg-black p-3 text-white transition-colors hover:bg-white hover:text-black">{{$idea->description}}</p>

        </div>
        <div
            class="mt-6 flex items-center gap-x-6 ">
        <a href="/ideas/{{$idea->id}}/edit" type="submit" class="border border-white bg-white px-4 py-2 text-sm font-semibold text-black hover:bg-black hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Edit</a>

        </div>
    </div>

</x-layout>

