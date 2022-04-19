@if($communes != null)
<select name="district" id="district" class="form-control show-tick" data-live-search="true">
<option value="0">Chọn xã phường</option>
    @foreach($communes as $commune)
    <option value="{{$commune->id}}">{{$commune->name}}</option>
    @endforeach
</select>
@endif