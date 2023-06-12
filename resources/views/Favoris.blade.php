<!-- Gestion erreur lors de la suppression d'article -->
@if ($errors->any())
    <div id="error-notification" class="error-notification">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var notification = document.getElementById('error-notification');
            notification.style.display = 'block';

            setTimeout(function() {
                notification.style.display = 'none';
            }, 5000);
        });
    </script>
@endif

@if (session('success'))
    <div id="success-notification" class="success-notification">
        {{ session('success') }}
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var notification = document.getElementById('success-notification');
            notification.style.display = 'block';

            setTimeout(function() {
                notification.style.display = 'none';
            }, 5000);
        });
    </script>
@endif


<x-content-layout >

  <div class="redirection">
    <x-redirection text="Accueil" href="/" />
  </div>
  <div class="bg-title-perleo">
    <span class="title-perleo" >Favoris</span>
  </div>

  <div class="base-layout-profil mt-4">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active custom-link" id="articles-tab" data-toggle="tab" href="#articles-content">Articles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link custom-link" id="events-tab" data-toggle="tab" href="#events-content">Evènements</a>
      </li>
    </ul>
  </div>











  

  <div class="tab-content">
    <!-- ---------------------- Début Article  ------------------------>
    <div class="tab-pane fade show active" id="articles-content">
      <div class="base-layout-articles">
        <div class="article-profil">
        @if($lovesArticles->isEmpty())
          <p class="article-profil-title">Vous n'avez aimer d'article. Vos articles préférer apparaîtront ici.</p>
        @else
          @foreach($lovesArticles as $lovesArticle)
            <!-- CARD ARTICLES -->
            <div class="article-profile-scrollable">
              <div class="article-profil-line">
                <div class="article-profil-card">
                  <img src="./img/articles/{{$lovesArticle->depot}}" class="article-profil-art-img"/>
                    <a class="heart-icon clicked" data-toggle="modal" data-target="#Modal{{$lovesArticle->id_article}}"></a>
                  <p class="article-profil-title"> {{$lovesArticle->titre_article}} </p>
                </div>
              </div>
            </div> 

            <!-- MODAL-ARTICLE -->
            <div class="modal fade" id="Modal{{$lovesArticle->id_article}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="titre-modal">
                    Vous souhaitez ne plus accorder de l'estime à cet article !
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="close-modal" data-dismiss="modal">J'annule</button>
                    <form action="{{ route('mon-compte.dislikeArticle', ['id' => $lovesArticle->id_article]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="valide-modal">Je n'aime plus</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
        </div>
      </div> 
    </div>
    <!-- ---------------------- FIN Article  ------------------------>


    <div class="tab-pane fade" id="events-content">
      <!-- ---------------------- Début évènements  ------------------------>
      <div class="base-layout-articles">
        <div class="article-profil">
          @if($lovesEvenements->isEmpty())
            <p class="mon-compte-null">Les événements auxquels vous serez conviés apparaîtront ici.</p>
          @else
            @foreach($lovesEvenements as $lovesEvenement)
              <!-- CARD EVENEMENT -->
              <div class="line-profil">
                <div class="card-evenement-profil">
                  <img src="./img/evenements/{{$lovesEvenement->depot}}" class="img-evenement-profil"/>
                  <a class="heart-icon clicked" data-toggle="modal" data-target="#Modal{{$lovesEvenement->id_article}}"></a>
                  <div class="card-description-evenement-profil">
                    <p class="title-evenement-profil"> {{$lovesEvenement->nom}}</p>
                    <p class="date-evenement-profil"> {{$lovesEvenement->lieux}}, {{$lovesEvenement->date}} </p>
                  </div>
                </div>
              </div>

              <!-- MODAL-EVENEMENT -->
              <div class="modal fade" id="Modal{{$lovesEvenement->id_article}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="titre-modal">
                      Vous êtes sur le point de ne plus apprécier l'événement !
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="close-modal" data-dismiss="modal">J'annule</button>
                      <form action="{{ route('mon-compte.dislikeEvenement', ['id' => $lovesEvenement->code]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="valide-modal">Je n'aime plus</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- MODAL-EVENEMENT -->
            @endforeach
          @endif
        </div>
      </div>
      <!-- ---------------------- Fin évènements ------------------------>
    </div>
  </div>



















</x-content-layout>

<script>
  // Sélectionnez tous les éléments de navigation
  const scrollspyItems = document.querySelectorAll('.scrollspy-item');

  // Parcours des éléments et ajout d'un gestionnaire d'événement de clic à chacun

  scrollspyItems.forEach(item => {
    item.addEventListener('click', () => {
      // Supprimez la classe active de tous les éléments
      scrollspyItems.forEach(item => {
        item.classList.remove('scrollspy-item-active');
        item.classList.add('scrollspy-item');
      });

      // Ajoutez la classe active à l'élément cliqué
      item.classList.add('scrollspy-item-active');
      item.classList.remove('scrollspy-item');
    });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Sélectionnez tous les éléments de navigation
    const scrollspyItems = document.querySelectorAll('.scrollspy-item');

    // Parcours des éléments et ajout d'un gestionnaire d'événement de clic à chacun
    scrollspyItems.forEach(item => {
      item.addEventListener('click', () => {
        // Supprimez la classe active de tous les éléments
        scrollspyItems.forEach(item => {
          item.classList.remove('scrollspy-item-active');
          item.classList.add('scrollspy-item');
        });

        // Ajoutez la classe active à l'élément cliqué
        item.classList.add('scrollspy-item-active');
        item.classList.remove('scrollspy-item');

        // Récupérez l'ID de l'élément cliqué
        const targetId = item.getAttribute('href').substr(1);

        // Activez l'onglet correspondant en utilisant le ID
        const targetTab = document.getElementById(targetId);
        const tabPane = new bootstrap.Tab(targetTab);
        tabPane.show();
      });
    });
  });
</script>


