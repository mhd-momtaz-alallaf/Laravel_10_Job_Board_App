{{-- this component is just to add a button with a link --}}
<a href="{{ $href }}" {{-- $href is the first slot parameter --}}
  class="rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center text-sm font-semibold text-black shadow-sm hover:bg-slate-100">
  {{ $slot }} {{-- second slot parameter --}}
</a>