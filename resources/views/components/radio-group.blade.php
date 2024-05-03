<div>
    @if ($allOption) {{-- to show the (all) option just when needed (when passed to true)--}}
        <label for="{{ $filterName }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $filterName }}" value=""
                @checked(!request($filterName)) />
            <span class="ml-2">All</span>
        </label>
    @endif
  
    @foreach ($optionsWithLabels as $label => $option) {{-- $optionsWithLabels is a function within the RadioGroup Component class to show the label insted of actiual aoption name --}}
        <label for="{{ $filterName }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $filterName }}" value="{{ $option }}"
            @checked($option === ($value ?? request($filterName))) />
            <span class="ml-2">{{ $label }}</span>
        </label>
    @endforeach
</div>