@extends('admin.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Analytics</h5>
                </div>
                <div class="card-body ">
                    <form action="">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input name="from_date" value="{{ request()->from_date }}" type="date" class="form-control datetimepicker">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input name="to_date" value="{{ request()->to_date }}" type="date" class="form-control datetimepicker">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-primary m-0" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
                    <div>
                        {!! $chart->container() !!}
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Updated 3 minutes ago
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

{!! $chart->script() !!}
@endpush

