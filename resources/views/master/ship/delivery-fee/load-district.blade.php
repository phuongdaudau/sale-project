@if($districts != null)
<select name="district" id="district" class="form-control show-tick" data-live-search="true" onchange="javascript:loadCommune(this.value)">
<option value="0">Chọn quận huyện</option>
    @foreach($districts as $district)
    <option value="{{$district->id}}">{{$district->name}}</option>
    @endforeach
</select>
@endif