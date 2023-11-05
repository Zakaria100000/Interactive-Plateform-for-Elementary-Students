<li>
    <a {{ $attributes->merge(['class' => 'inline-flex items-center px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md ']) }}>
        {{ $icon ?? '' }}
        <span>{{ $slot }}</span>
    </a>
</li>
