<x-layout title="Home">
{{-- {{$tasks}} // It not work because you cannot echo an array--}}

{{--   but what we do in php --}}

    {{--  <?php die(var_dump($tasks)) ?> --}}

  {{--    or we use blade syntax --}}

{{--    @dump($tasks)--}}
{{--    @dd($tasks)--}}

{{--    <h1>dncods</h1>--}}

{{--    <?php if (count($tasks ?? [] )): ?>--}}
{{--        <p>yes, we have some tasks. How many? <?= count($tasks ?? [] ) ?> tasks, in fact!</p>--}}
{{--    <?php endif; ?>--}}

{{--    or--}}

{{--    @if (count($tasks ?? [] ))--}}
{{--        <p>yes, we have some tasks. How many? {{ count($tasks ?? [] ) }} tasks, in fact!</p>--}}
{{--    @endif --}}

{{--    <x-card>--}}
{{--    @foreach($tasks as $task)--}}
{{--        <li> {{$task}} </li>--}}
{{--    @endforeach--}}
{{--    @unless(count($tasks))--}}
{{--        <p>No tasks yet!</p>--}}
{{--    @endunless--}}
{{--    </x-card>--}}

{{--    <x-card class="max-w-400">--}}
{{--        @forelse($tasks as $task)--}}
{{--            <li> {{$task}} </li>--}}
{{--        @empty--}}
{{--            <p>No tasks yet!</p>--}}

{{--        @endforelse--}}
{{--    </x-card>--}}

    @auth()

    @endauth


    @guest()

    @endguest

    @can('edit',$post)
      <a href="/posts/1/edit">Edit Post</a>
    @endcan
</x-layout>
