@extends('layouts/default')

@section('title') Rapports PowerBI @stop

@section('content')
<div class="row">
    @foreach($reports as $report)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <i class="fa fa-bar-chart mr-2"></i>
                    <strong>{{ $report['title'] }}</strong>
                </div>
                <div class="card-body p-0">
                    <iframe
                        title="{{ $report['title'] }}"
                        width="100%"
                        height="400"
                        src="{{ $report['src'] }}"
                        frameborder="0"
                        allowfullscreen="true">
                    </iframe>
                </div>
                <div class="card-footer text-muted small">
                    <i class="fa fa-info-circle mr-1"></i>{{ $report['description'] }}
                </div>
            </div>
        </div>
    @endforeach
</div>
@stop