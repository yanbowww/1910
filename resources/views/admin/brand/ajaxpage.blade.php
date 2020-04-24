@foreach($brand as $v)
		<tr>
				<th>{{$v->brand_id}}</th>
				<th>{{$v->brand_name}}</th>
				<th>{{$v->brand_url}}</th>
				<th>@if($v->brand_logo)<img src="{{env('UPLOADS_URL')}}{{$v->brand_logo}}" width="40" height="40">@endif</th>
				<th>
					@if($v->brand_imgs)
					@php $brand_imgs= explode('|',$v->brand_imgs); @endphp
					@foreach ($brand_imgs as $vv)
					<img src="{{env('UPLOADS_URL')}}{{$vv}}" width="40" height="40">
					@endforeach
					@endif
				</th>
				<th>{{$v->brand_desc}}</th>
				<th><a href="{{url('/brand/edit/'.$v->brand_id)}}" type="button" class="btn btn-primary">修改</a>
				   -<a href="{{url('/brand/destroy/'.$v->brand_id)}}" type="button" class="btn btn-danger">删除</a></th>
			</tr>
			@endforeach
			<tr><td colspan="7">{{$brand->appends($query)->links()}}</td></tr>