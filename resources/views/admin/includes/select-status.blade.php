<select class="form-select" name="status">
    <option value="1" @if(!empty($data) and $data->status == true) selected @endif>Active</option>
    <option value="0" @if(!empty($data) and $data->status == false) selected @endif>Deactive</option>
</select>