

<div class="form-group">
    <label for="exampleInputText">{{ $label ?? '' }}</label>
    <input type="text"
           class="form-control"
           name="{{ $name }}"
           value="{{ $value ?? old($name) }}"
           id="exampleInputText"
           placeholder="{{ $placeholder ?? '' }}">
</div>
{{--@error('names')--}}
{{--<span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--@enderror--}}