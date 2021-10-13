@foreach($resume as $resumes)
<a href="#" data-id="{{ $resumes->submission_info_id }}" class="btn btn-primary resumeModel" data-toggle="modal" style="font-size:10px;"><i class="la la-eye"></i></a><br />
@if($resumes->submission_status == 0)
<a href="#" style="font-size:10px;" data-id="{{ $resumes->submission_info_id }}" class="btn btn-success accept">Duyệt</a>
<a href="#" style="font-size:10px;" data-id="{{ $resumes->submission_info_id }}" class="btn btn-danger no_accept">Không duyệt</a>
@elseif($resumes->submission_status == 1)
<a href="#" style="font-size:10px;" class="btn btn-success disabled">Đã duyệt</a>
@endif
@if($resumes->submission_status == 2)
<a href="#" style="font-size:10px;" class="btn btn-danger disabled">Không duyệt</a>
@endif
@endforeach
<script>
    $(document).ready(function(){
        //Accept
        $(".accept").on("click", function(e){
            e.preventDefault();
            var id = $(this).attr("data-id");
            var url = "{{ route('job.resume.accept') }}";
            
            $.ajax({
                url: url,
                data: {
                    id:id,
                },
                success: function(data){
                    $("#result-"+id).html(data);
                },
            });
        });

        //Modal
        $(".resumeModel").on("click", function(e){
            e.preventDefault();
            var id  = $(this).attr("data-id");
            var url = "{{ route('job.resume.model') }}";

            $.ajax({
                url: url,
                data: {
                    id:id,
                },
                success: function(data){
                    $(".location").text(data.location);
                    $(".info_school").text(data.info_school);
                    $(".specialized").text(data.specialized);
                    $(".school_day").text(data.school_day);
                    $(".school_end_day").text(data.school_end_day);
                    $(".type").text(data.type);
                    $(".imgModal").attr({"src": data.picture});
                     $('#resumeModel').modal('show'); 
                },
            });
        });

        //No - Accept
        $(".no_accept").on("click", function(e){
            e.preventDefault();
            var id = $(this).attr("data-id");
            var url = "{{ route('job.resume.no-accept') }}";
            
            $.ajax({
                url: url,
                data: {
                    id:id,
                },
                success: function(data){
                    $("#result-"+id).html(data);
                },
            });
        });
    });
</script>