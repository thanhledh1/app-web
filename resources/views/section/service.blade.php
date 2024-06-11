<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            @foreach ($sections as $section)
                @if ($section->name === "Services")
                    <h2 class="">{{ $section->text_1 }}</h2>
                    <h3 class="section-subheading text-muted">{{ $section->text_2 }}</h3>
                @endif
            @endforeach
        </div>
        <div class="row text-center">
            @foreach ($sections as $section)
            @if ($section->name === "Services")
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">{{ $section->text_3 }}</h4>
                        <p class="text-muted">{{ $section->text_4 }}</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">{{ $section->text_5 }}</h4>
                        <p class="text-muted">{{ $section->text_6 }}</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">{{ $section->text_7 }}</h4>
                        <p class="text-muted">{{ $section->text_8 }}</p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
