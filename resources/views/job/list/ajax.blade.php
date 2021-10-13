<div class="emply-list-sec style2">
    @foreach($item as $items)
    @php 
        $id          = $items->recruitment_id;
        $uid 	     = $items->id;
        $status      = $items->status;
        $deadline    = $items->deadline;
        $newDeadline = date('d/m/Y', strtotime($deadline));
        $slug        = Str::slug($items->name);
        $slug2       = Str::slug($items->name_company);
        
        $urlDetail   = route('job.list.detail', [$slug, $id]);
        $urlCompany  = route('job.company.detail', [$slug2, $uid]);

        $urlPic     = "/job/storage/app/".$items->picture;
    @endphp
    @if($status == 1)
    <div class="emply-list">
        <div class="emply-list-thumb">
            <a href="#" title="">
                <img src="{{ $urlPic }}" alt="" />
            </a>
        </div>
        <div class="emply-list-info">
            <div class="emply-pstn">
                <i class="la la-clock-o"></i> {{ $newDeadline }}
            </div>
            <h3><a href="{{ $urlDetail }}" title="">{{ $items->name }}</a></h3>
            <a href="{{ $urlCompany }}" style="float: left;
            width: 100%;
            font-size: 13px;
            color: #fb236a;">
            <span>{{ $items->name_company }}</span>
            </a>
            <h6><i class="la la-map-marker"></i> {{ $items->city_name }}</h6>
            <p>{{ Str::limit($items->preview_text, 160) }}</p>
        </div>
    </div><!-- Employe List -->
    @endif
    @endforeach
    <div class="pagination">
        <ul>
            {{ $item->links() }}
        </ul>
    </div><!-- Pagination -->
</div>