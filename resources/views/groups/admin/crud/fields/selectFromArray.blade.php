@if(count($array))

    <div class="mb-2">

        <label class="d-block" for="">
            {{ $label ?? 'Select form array' }}
        </label>

        <select name="{{ $name }}" id="">

            @foreach($array as $item)
                <option @if($item->id === $value) selected @endif
                value="{{ $item->id }}">
                    {{ $item->$arrayShow }}
                </option>

            @endforeach
        </select>
    </div>

@endif