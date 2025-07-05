@extends('home.layout.app')
@section('title', 'Our Services')

@section('content')
<section class="home" id="home">
    <div id="particles-js"></div>

    <div class="content">
        <h2>Hi There,<br /> I'm {{$user->first_name}} <span>{{$user->first_name}}</span></h2>
        <p>i am into <span class="typing-text"></span></p>
        <a href="{{route('home.about')}}" class="btn"><span>About Me</span>
            <i class="fas fa-arrow-circle-down"></i>
        </a>
        <div class="socials">
            <ul class="social-icons">
                <li><a class="linkedin" aria-label="LinkedIn" href="https://www.linkedin.com/in/jigar-sable/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                <li><a class="github" aria-label="GitHub" href="https://github.com/jigar-sable" target="_blank"><i class="fab fa-github"></i></a></li>
                <li><a class="twitter" aria-label="Twitter" href="https://twitter.com/jigar_sable" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a class="telegram" aria-label="Telegram" href="https://t.me/lifecode5" target="_blank"><i class="fab fa-telegram-plane"></i></a></li>
                <li><a class="instagram" aria-label="Instagram" href="https://www.instagram.com/jigarsable.dev"><i class="fab fa-instagram" target="_blank"></i></a></li>
                <li><a class="dev" aria-label="Dev" href="https://dev.to/jigarsable" target="_blank"><i class="fab fa-dev"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="image">
        
        <img draggable="false" class="tilt" src="" alt="">
    </div>
</section>
@endsection