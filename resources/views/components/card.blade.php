<article
  {{ $attributes->class(['rounded-md border border-slate-300 bg-white p-4 shadow-sm']) }}> {{-- $attributes->class to let us add more classes in the x-card tag when we use the component (<x-card class="mb-4"> in index file)--}}
  {{ $slot }}
</article>