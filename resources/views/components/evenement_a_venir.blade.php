    <!-- ======= About Boxes Section ======= -->
    <section id="about-boxes" class="about-boxes">
      <div class="container text-justify" data-aos="fade-up">
        
      <div class="container">
        <div class="row">
          @foreach ($evenements as $evenement)
            <div class="col-sm-6">
              <div class="card-template">
                <a href="/evenement/{{ Str::slug($evenement->nom) }}">
                  <div class="card-evenement">
                    <div class="image-container">
                      <img src="./img/evenements/{{$evenement->depot}}"/>
                      @if( Auth::user() )
                        <a 
                          href="/like_event/{{$evenement->code}}/{{Auth::id()}}" 
                          class="heart-icon 
                            <?php 
                              foreach($_Aimers as $_aimer){
                                echo $evenement->code === $_aimer->code ? 'clicked' : ''; 
                              }
                            ?>">
                        </a>
                        @else
                        <a href="/login" class="heart-icon"></a>
                      @endif
                    </div>
                  </div>
                </a>
                <div class="card-body sous-event">
                  <h5 class="">{{$evenement->nom}}</h5>
                  <p class="card-text">Au {{$evenement->lieux}}, le {{$evenement->date}}</p>
                </div>
              </div>
            </div>
          @endforeach
          
          
        </div>
      </div>

      </div>
    </section><!-- End About Boxes Section -->


