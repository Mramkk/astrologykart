@php
    $dummy_image = '';
    $exist_image1 = '';
    if(!empty($image_dir)){
        $dummy_image = $image_dir.'dummy-image.png';
        if(!empty($data->image1)){
            $exist_image1 = $image_dir.$data->image1;
        }
    }
@endphp
<img src="{{ Hpx::image_src(!empty($exist_image1) ? $exist_image1 : '',!empty($dummy_image) ? $dummy_image : '') }}" id="showBanner1" class="show-banner img-hover" data-dummy-image="{{ !empty($dummy_image) ? asset($dummy_image) : '' }}">
<input accept="image/*" type="file" name="image1" id="inputBanner1" class="invisible" />
@if(!empty($img_wh))<br><small style="margin-top:5px;">Image Size ({{$img_wh}})</small>@endif
<script>
    $(document).ready(function(){
        @if(!empty($data->id))
		    image_edit('#showBanner1','{{route($route_name.".store")}}','DELETE_IMAGE',{{$data->id}},'image1');
        @else
            image_edit('#showBanner1');
        @endif
	});
</script>