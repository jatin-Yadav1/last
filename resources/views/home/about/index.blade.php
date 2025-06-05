@extends('home.layout.app')
@section('title', 'Our Services')

@section('content')

<x-page-hero-section title="About Us" />

<section class="about" id="about">
    <h2 class="heading"><i class="fas fa-user-alt"></i> About <span>Me</span></h2>

    <div class="row">

        <div class="image">
            <img draggable="false" class="tilt" src="{{$user->image}}" alt="">
        </div>

        <div class="content">
            <h3>I'm {{$user->first_name}}</h3>
            <span class="tag">{{$user->heading}}</span>

            <p>{{$user->bio}}</p>

            <div class="box-container">
                <!-- <div class="box">
                    <p><span> age: </span> 20</p>
                    <p><span> phone : </span> +91 XXX-XXX-XXXX</p>
                </div> -->
                <div class="box">
                    <p><span> email : </span> {{$user->email}}</p>
                    <p><span> place : </span> {{$user->full_address}}</p>
                </div>
            </div>

            <div class="resumebtn">
                <a href="{{route('home.resume')}}" target="_blank" class="btn"><span>Resume</span>
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>

        </div>
    </div>
</section>
@endsection