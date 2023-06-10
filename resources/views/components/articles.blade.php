<!-- ======= Articles Section ======= -->
<section id="portfolio" class="portfolio" >
  <div class="container" data-aos="fade-up" style=" padding:30px">

    <div class="section-title">
      <h2>Les articles</h2>
      <p>Mise en avant</p>
      
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">Tous</li>
          @foreach ($tabCategorie as $categorie)
            <li data-filter=".filter-<?php echo $categorie ?>">{{ $categorie }}</li>
          @endforeach
        </ul>
      </div>
    </div>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

    @foreach ($articles as $article)
      <div class="col-lg-4 col-md-6 portfolio-item filter-{{$article->nom_categorie}}">
        <div class="image-container">
          <img src="./img/articles/{{$article->depot}}" class="img-fluid" alt="Perleo">
          @if( Auth::user() )
            <a 
              href="/like/{{$article->id_article}}/{{Auth::id()}}" 
              class="heart-icon 
                <?php 
                  foreach($Aimers as $aimer){
                    echo $article->id_article === $aimer->id_article ? 'clicked' : ''; 
                  }
                ?>">
            </a>
            @else
            <a href="/login" class="heart-icon"></a>
          @endif
        </div>
        <div class="portfolio-info">
          <h4>{{$article->titre_article}}</h4>
          <p>{{$article->nom_categorie}}</p>
        </div>
      </div>
    @endforeach


    </div>
  </div>
</section>
<!-- End Portfolio Section -->


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const heartIcons = document.querySelectorAll('.heart-icon');
    
    heartIcons.forEach(function(icon) {
      icon.addEventListener('click', function() {
        icon.classList.toggle('clicked');
      });
    });
  });
</script>
