@extends('layouts.app')

@section('htmlheader_title') Homepage @endsection
@section('contentheader_title') Homepage @endsection
@section('contentheader_description') Homepage @endsection

@section('main-content')
<body>
	<div class="container">
		<header>
			<h1>Dwij IT Solutions <span>Online tutorials for Students.</span></h1>  
		</header>
		<div class="wrapper">
			<ul class="stage clearfix">

                <!--@foreach($courses as $course)
                    <a  href="course/{{$course->id}}">
                        <li class="scene">
                            <div class="" onclick="return true">
                                <div class="poster"></div>
                                <div class="info">
                                    <header>
                                        <h1>{{ $course->name }}</h1>
                                    </header>
                                    <p>
                                        {{ $course->description }}
                                    </p>
                                </div>
                            </div>
                        </li>
                    </a>
                @endforeach-->

                @foreach($courses as $course)
                    <li class="scene">
                        <div class="movie" onclick="return true">
                            <div class="poster" style="background-image:url(http://dwij.net/tuts//img/python-programming-on-raspberry-pi.jpg)"></div>
                            <div class="info">
                                <header style="background-image:url(http://dwij.net/tuts/img/python-programming-on-raspberry-pi-bw.jpg);">
                                    <h1>{{ $course->name }}</h1>
                                    <span class="rating">For Students</span>
                                    <span class="duration">140 slides</span>
                                </header>
                                <p>
                                    {{ $course->description }}
                                </p>
                                <center><a class="toslides" href="http://dwij.net/tuts/python-basic">Python Basics</a></center>
                            </div>
                        </div>
                    </li>
                @endforeach

			</ul>
		</div><!-- /wrapper -->
	</div><!-- /container -->
</body>
@endsection

@push('styles')
<style>
.main-footer { margin-left: 0px;}
</style>
@endpush