@extends('layouts/default')

@section('title')
    Rapports PowerBI
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            {{-- <div class="box-header with-border">
                <h3 class="box-title">Rapports opérationnels</h3>
            </div> --}}
            <div class="box-body">
                @foreach($reports as $report)
                    <div class="mb-4" style="margin-bottom: 30px;">
                        <h4>{{ $report['title'] }}</h4>

                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe
                                title="{{ $report['title'] }}"
                                width="100%"
                                height="650"
                                src="{{ $report['src'] }}"
                                frameborder="0"
                                allowfullscreen="true">
                            </iframe>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop