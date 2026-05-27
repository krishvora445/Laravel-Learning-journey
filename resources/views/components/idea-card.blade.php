@props([
    'href' => null,
])

@php
    $classes = 'card h-full border border-base-300 bg-base-100 shadow-sm transition hover:-translate-y-1 hover:shadow-lg';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        <div class="card-body gap-3">
            <p class="text-sm leading-6 text-base-content/80">{{ $slot }}</p>
            <div class="card-actions justify-end">
                <span class="btn btn-ghost btn-sm">Open idea</span>
            </div>
        </div>
    </a>
@else
    <div {{ $attributes->merge(['class' => $classes]) }}>
        <div class="card-body gap-3">
            <p class="text-sm leading-6 text-base-content/80">{{ $slot }}</p>
        </div>
    </div>
@endif
