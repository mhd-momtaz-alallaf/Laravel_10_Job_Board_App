<nav {{ $attributes }}> {{-- $attributes parameter to pass the links to this component --}}
    <ul class="flex space-x-4 text-slate-500">
        <li>
            <a href="/">Home</a>
        </li>
    
        @foreach ($links as $label => $link)
            <li>→</li>
            <li>
            <a href="{{ $link }}">
                {{ $label }}
            </a>
            </li>
        @endforeach
    </ul>
</nav>