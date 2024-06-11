<section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
            @foreach ($sections as $section)
            @if ($section->name === "OUR AMAZING TEAM")
                <h2 class="section-heading text-uppercase">{{ $section->text_1 }}</h2>
                <h3 class="section-subheading text-muted">{{ $section->text_2 }}</h3>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{ asset('user/assets/img/team/' . $section->image_1) }}" alt="..." />
                        <h4>{{ $section->text_3 }}</h4>
                        <p class="text-muted">{{ $section->text_4}}</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{ asset('user/assets/img/team/' . $section->image_2) }}" alt="..." />
                        <h4>{{ $section->text_5 }}</h4>
                        <p class="text-muted">{{ $section->text_6 }}</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{ asset('user/assets/img/team/' . $section->image_3) }}" alt="..." />
                        <h4>{{ $section->text_7 }}</h4>
                        <p class="text-muted">{{ $section->text_8 }}</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">{{ $section->text_9 }}</p>
                </div>
            </div>
        </div>
        @endif  
        @endforeach
    </section>