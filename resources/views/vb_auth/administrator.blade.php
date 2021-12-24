@extends('template.materialpro.template')
@section('content')


<h1>Anak IT</h1>
<p>Hallo, {{Session::get('name')}} {{Session::get('last_name')}}. Apakabar?</p>

<h2>* Email kamu : {{Session::get('email')}}</h2>

<a href="{{ url('/logout') }}" class="btn btn-primary btn-lg">Logout</a>

<?php
        // echo "<pre>";
         	// print_r($this->session->all_userdata());
        // echo "</pre>";   
		 
?>

<!-- JQuery -->
<script src="themes/material-pro/assets/plugins/jquery/jquery.min.js"></script>


@endsection