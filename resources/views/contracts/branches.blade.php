<option>Select Branch</option>
@if(!empty($branches))
  @foreach($branches as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif