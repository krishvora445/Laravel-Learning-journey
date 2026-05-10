<x-layout title="Home">
<!--      <h1>{{ $greeting }}, {{ $person }}!👍</h1> -->
    <!-- <h1>{{ $greeting }},  <?php echo htmlspecialchars($person) ?> !👍</h1> -->
    <x-card class="max-w-400">
    <h1>{{ $greeting }}, {!! $person !!}!👍</h1> <!--//with our any  This will load whatever the person hold. Like if it's hold person keyword hold any script, it will just load the script and end up running script in your app.If you don't want to, you have to like add htmlspecialchars . -->
    </x-card>
</x-layout>
