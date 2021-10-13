<div class="apply-alternative">
    @if(Auth::check())
    @if(Auth::user()->permission == 0)
    @if($findSavercm->count())
        @if($find->users_id == Auth::user()->id)
        <a href="#" data-svid="{{ $find->save_id }}" data-id="{{ $findItem->recruitment_id }}" class="delRecruitment active-ajax" title=""><i class="fa fa-star"></i> Lưu công việc</a>
        @elseif($find->users_id)
        <a href="#" data-id="{{ $findItem->recruitment_id }}" data-uid="{{ Auth::user()->id }}" class="saveRecruitment" title=""><i class="fa fa-star"></i> Lưu công việc</a>
        @endif
    @else
    <a href="#" data-id="{{ $findItem->recruitment_id }}" data-uid="{{ Auth::user()->id }}" class="saveRecruitment" title=""><i class="fa fa-star"></i> Lưu công việc</a>
    @endif
        @else
        <a href="#" class="open-letter" title=""><i class="fa fa-star"></i> Lưu công việc</a>
        @endif
    @else
    <a class="signin-popup" title=""><i class="fa fa-star"></i> Lưu công việc</a>
    @endif
    <a href="#" title="" style="float:right;"><i class="fa fa-heart-o"></i> Thích</a>
</div>
<script>
    $(document).ready(function(){
        $(".saveRecruitment").on("click", function(e){
            e.preventDefault();
            var recruitment_id = $(this).attr("data-id");
            var users_id       = $(this).attr("data-uid");
            var url            = "{{ route('job.list.ajax-savercm') }}";

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    recruitment_id: recruitment_id,
                    users_id: users_id,
                },
                success: function(data){
                    $("#ajax-savercm").html(data);
                    {{--  window.location.reload();  --}}
                    {{--  alert(data);  --}}
                },
            });
        });
        //Un Save Recruitment
        $(".delRecruitment").on("click", function(e){
            e.preventDefault();
            var id    = $(this).attr("data-id");
            var svid  = $(this).attr("data-svid");
            var url = "{{ route('un-recruitment') }}";

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    id:id,
                    svid:svid,
                },
                success: function(data){
                    $("#ajax-savercm").html(data);
                    {{--  window.location.reload();
                    alert(data);  --}}
                }
            });
        });
        //END - Un Save Recruitment
    });
</script>