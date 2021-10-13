<ul>
@if(Auth::check())
@if(Auth::user()->permission == 1)
<li class="menu-item">
	<a href="{{ route('job.recruitment.add') }}" title="">Đăng tin</a>
</li>
<li class="menu-item">
	<a href="{{ route('job.list.index') }}" title="">Lọc hồ sơ</a>
</li>
@elseif(Auth::user()->permission == 0)
<li class="menu-item">
	<a href="{{ route('job.list.index') }}" title="">Tất cả việc làm</a>
</li>
<li class="menu-item">
	<a href="{{ route('job.news.index') }}" title="">Tư vấn/Bài viết</a>
</li>
<li class="menu-item">
	<a href="{{ route('job.company.index') }}" title="">Công ty</a>
</li>
@endif
@else
<li class="menu-item">
	<a href="{{ route('job.list.index') }}" title="">Tất cả việc làm</a>
</li>
<li class="menu-item">
	<a href="{{ route('job.news.index') }}" title="">Tư vấn/Bài viết</a>
</li>
<li class="menu-item">
	<a href="{{ route('job.company.index') }}" title="">Công ty</a>
</li>
@endif
</ul>