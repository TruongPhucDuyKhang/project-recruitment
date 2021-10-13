<aside class="col-lg-3 column margin_widget">
	<div class="widget">
		<div class="search_widget_job">
			<div class="field_w_search">
			{{-- <input type="text" placeholder="Mức lương mong muốn" />
			<i class="la la-money"></i> --}}
			<!-- Search Widget -->
				{{-- <span>Sort by</span> --}}
			<form method="get" id="formwage">
				<select placeholder="Mức lương mong muốn" class="chosen wherewage">
					<option value="0" selected="selected">Tất cả mức lương</option>
					@foreach($wage as $wages)
					<option value="{{ $wages->mid }}">{{ $wages->mname }}</option>
					@endforeach
				</select>
			</form>
			<script>
				$(document).ready(function(){
					$(".wherewage").on("change", function(e){
						e.preventDefault();
						var value = $(this).val();
						var url   = "{{ route('job.list.ajax') }}?wherewage=" + value;
						
						$.ajax({
							url: url,
							type: "POST",
							data: {
								value:value,
							},
							success: function(data){
								$("#wherewage").html(data);	
							}
						})
					});
				});
			</script>
			<i class="la la-money"></i>
		</div>
	</div>
</div>
<div class="widget border">
	<h3 class="sb-title open">Ngành nghề</h3>
	<div class="specialism_widget">
		<div class="simple-checkbox">
			@foreach($cat as $cats)
			<p><input type="checkbox" name="spealism" id="{{ $cats->cname }}"><label for="{{ $cats->cname }}">{{ $cats->cname }}</label></p>
			@endforeach
		</div>
	</div>
</div>
<div class="widget border">
	<h3 class="sb-title closed">Tỉnh thành</h3>
	<div class="specialism_widget">
		<div class="simple-checkbox">
			@foreach($city as $citys)
			<p><input type="checkbox" name="spealism" id="{{ $citys->city_name }}"><label for="{{ $citys->city_name }}">{{ $citys->city_name }}</label></p>
			@endforeach
		</div>
	</div>
</div>
<div class="widget border">
	<h3 class="sb-title open">Cấp bậc</h3>
	<div class="specialism_widget">
		<div class="simple-checkbox">
			@foreach($rank as $ranks)
			<p><input type="checkbox" name="spealism" id="{{ $ranks->rname }}"><label for="{{ $ranks->rname }}">{{ $ranks->rname }}</label></p>
			@endforeach
		</div>
	</div>
</div>
<div class="widget border">
	<h3 class="sb-title open">Loại hình công việc</h3>
	<div class="specialism_widget">
		<div class="simple-checkbox">
			@foreach($type as $types)
			<p><input type="checkbox" name="spealism" id="{{ $types->tname }}"><label for="{{ $types->tname }}">{{ $types->tname }}</label></p>
			@endforeach
		</div>
	</div>
</div>
{{-- <div class="widget border">
	<h3 class="sb-title open">Giới tính</h3>
	<div class="specialism_widget">
		<div class="simple-checkbox">
			<p><input type="checkbox" name="spealism" id="t1"><label for="t1">Nam</label></p>
			<p><input type="checkbox" name="spealism" id="t2"><label for="t2">Nữ</label></p>
		</div>
	</div>
</div> --}}
</aside>