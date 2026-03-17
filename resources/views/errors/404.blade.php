@extends('layouts/basic')

{{-- Page title --}}
@section('title')
404 - Page introuvable
@parent
@stop


{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">

    <div style="padding-top: 150px; text-align:center">

        <x-icon type="warning" class="text-yellow" style="font-size:70px;" />

        <h2 style="margin-top:20px;">
            Page introuvable
        </h2>

        <p style="font-size:16px; margin-top:15px;">
            La page demandée n’est pas disponible ou vous ne disposez pas des droits nécessaires.
        </p>

        <p>
            Vous pouvez retourner au
            <a href="{{ config('app.url') }}">
                tableau de bord
            </a>
            
        </p>

    </div>

  </div>
</div>

@stop