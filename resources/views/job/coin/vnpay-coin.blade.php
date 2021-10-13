@extends('templates.job.master')
@section('main-content')
@if(Session::has('msg'))
<script>
	toastr.info('{{ Session::get('msg') }}', '', {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-top-center",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
      });
</script>
@endif
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{ $publicUrl }}/images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Nạp xu</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block no-padding">
        <div class="container">
                <div class="row no-gape">
                <aside class="col-lg-3 column border-right">
                    <div class="widget">
                        <div class="tree_widget-sec">
                            @include('templates.job.leftbar-profile')
                        </div>
                    </div>
                </aside>
                <div class="col-lg-9 column">
                    <div class="padding-left">
                        <div class="manage-jobs-sec">
                            <style>
                                .coins{
                                    color: #feae00f1;
                                }
                            </style>
                            <h3> 
                                <img widht="70px" style="margin:10px;" height="50px" class="XBlEsH" src="/job/storage/app/avatar/money.png">
                                @if($countId) 
                                <span class="coins">{{ $coin->number_coin }} Xu đang có</span>
                                @else
                                <span class="coins">0 Xu đang có</span>
                                @endif
                            </h3>
                            <style>
                                .change-password form button{
                                    border: none;
                                    background: #e8e8e8;
                                }
                                .change-password form button:hover {
                                    background: #e8e8e8;
                                    color: none;
                                }
                            </style>
                            <div class="change-password">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form action="{{ route('job.coin.vnpay') }}" method="POST">
                                            @csrf
                                            <span class="pf-title">Chọn loại xu bạn muốn mua</span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Please Select Specialism" class="chosen" name="number_coin">
                                                        <option value="20">20 xu</option>
                                                        <option value="50">50 xu</option>
                                                        <option value="100">100 xu</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" name="coins_type" value="Thanh toán hóa đơn">
                                                <input type="hidden" name="coins_id" value="{{ date('YmdHis') }}">
                                                <input type="hidden" name="amount" value="">
                                                <input type="hidden" name="coins_desc" value="Thanh toán đơn hàng">
                                                <input type="hidden" name="bank_code" value="">
                                                <input type="hidden" name="language" value="vn">
                                                <button type="submit" class="btn btn-block py-2 font-weight-bold border">
                                                    <span class="text-danger">VN</span><span class="text-info">PAY</span>
                                                </button>
                                            </form>
                                        </div>
                                        {{--  <div class="col-lg-8">
                                            <div class="manage-jobs-sec addscroll">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <td>#</td>
                                                            <td>Chức năng</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($xu as $xus)
                                                        @if($xus->id == Auth::user()->id)
                                                        <tr>
                                                            <td>
                                                                <span>{{ $xus->number_coin }} xu</span><br>
                                                                <span>{{ $xus->date_purchase }}</span>
                                                            </td>
                                                            <td>
                                                                <ul class="action_job">
                                                                    <li><span>View Job</span><a href="#" title=""><i class="la la-eye"></i></a></li>
                                                                    <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                                    <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>  --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
</section>
@stop
