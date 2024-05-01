<div>
    <label for="{{ $filterName }}" class="mb-1 flex items-center">
        <input type="radio" name="{{ $filterName }}" value=""
            @checked(!request($filterName)) />
        <span class="ml-2">All</span>
    </label>
  
    @foreach ($options as $option)
        <label for="{{ $filterName }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $filterName }}" value="{{ $option }}"
            @checked($option === request($filterName)) />
            <span class="ml-2">{{ $option }}</span>
        </label>
    @endforeach
</div>