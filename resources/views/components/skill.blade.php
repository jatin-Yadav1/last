<section class="skills" id="skills">

    <h2 class="heading"><i class="fas fa-laptop-code"></i> Skills & <span>Abilities</span></h2>

    <div class="container">
        <div class="row" id="skillsContainer">
            @foreach($skills as $skill)
            <div class="bar">
                <div class="info">
                    <img src="{{$skill->icon}}" />
                    <span>{{$skill->name}}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>