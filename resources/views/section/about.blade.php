<section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
            @foreach ($sections as $section)
            @if ($section->name === "About")
                <h2 class="section-heading text-uppercase">{{ $section->text_1 }}</h2>
                </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('user/assets/img/about/' . $section->image_1) }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">{{ $section->text_2 }}</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">{{ $section->text_3 }}</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('user/assets/img/about/' . $section->image_2) }}" alt="..." /></div>

                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">{{ $section->text_4 }}</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">{{ $section->text_5 }}</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('user/assets/img/about/' . $section->image_3) }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">{{ $section->text_6 }}</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">{{ $section->text_7 }}</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('user/assets/img/about/' . $section->image_4) }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">{{ $section->text_8 }}</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">{{ $section->text_9 }}</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                        {{ $section->text_10 }}
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
        @endif
        @endforeach
    </section>