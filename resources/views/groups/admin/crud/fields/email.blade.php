

<div class="form-group">
    <label for="exampleInputEmail1">{{ $label ?? 'Email address' }}</label>
    <input type="email"
           class="form-control"
           name="{{ $name }}"
           value="{{ $value ?? '' }}"
           id="exampleInputEmail1"
           placeholder="{{ $placeholder ?? 'Email' }}">
</div>