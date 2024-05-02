<div class="relative">
    @if ($formRef) {{-- if the formRef (form-ref in the view files) is passed in the index form --}}
        <button type="button" class="absolute top-0 right-0 flex h-full items-center pr-2"
            @click="$refs['input-{{ $name }}'].value = ''; $refs['{{ $formRef }}'].submit();"> {{-- $refs is an alpine way to refference the x-ref directives, the first Alpinejs satatement is to reset the input, the second one to submit the form --}}

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" {{-- to have x clouse icon --}}
                stroke="currentColor" class="h-4 w-4 text-slate-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    @endif
    <input x-ref="input-{{ $name }}" type="{{ $type }}"
        placeholder="{{ $placeholder }}"
        name="{{ $name }}" value="{{ $value }}" id="{{ $name }}"
        class="w-full rounded-md border-0 py-1.5 px-2.5 pr-8 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2" />
</div>