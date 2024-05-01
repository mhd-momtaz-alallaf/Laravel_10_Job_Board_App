<div>
    <label for="{{ $filterName }}" class="mb-1 flex items-center">
        <input type="radio" name="{{ $filterName }}" value=""
            @checked(!request($filterName)) />
        <span class="ml-2">All</span>
    </label>
  
    @foreach ($optionsWithLabels as $label => $option) {{-- $optionsWithLabels is a function within the RadioGroup Component class to show the label insted of actiual aoption name --}}
        <label for="{{ $filterName }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $filterName }}" value="{{ $option }}"
            @checked($option === request($filterName)) />
            <span class="ml-2">{{ $label }}</span>
        </label>
    @endforeach
</div>