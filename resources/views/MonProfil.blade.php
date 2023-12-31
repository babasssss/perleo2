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
    <span class="title-perleo" >Profil</span>
  </div>

  <div class="base-layout-profil mt-4">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active custom-link" id="articles-tab" data-toggle="tab" href="#articles-content">Mes articles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link custom-link" id="events-tab" data-toggle="tab" href="#events-content">Mes évènements</a>
      </li>
      <li class="nav-item">
        <a class="nav-link custom-link" id="settings-tab" data-toggle="tab" href="#settings-content">Paramètres</a>
      </li>
    </ul>
  </div>











  

  <div class="tab-content">
    <!-- ---------------------- Début Article  ------------------------>
    <div class="tab-pane fade show active" id="articles-content">
      <div class="base-layout-articles">
        <div class="article-profil">
        @if($articles->isEmpty())
          <p class="article-profil-title">Vous n'avez pas ajouté d'articles. Vos articles apparaîtront ici.</p>
        @else
          @foreach($articles as $article)
            <!-- CARD ARTICLES -->
            <div class="article-profile-scrollable">
              <div class="article-profil-line">
                <div class="article-profil-card">
                  <img src="./img/articles/{{$article->depot}}" class="article-profil-art-img"/>
                    <a class="poubelle-icon" data-toggle="modal" data-target="#Modal{{$article->id_article}}"></a>
                  <p class="article-profil-title"> {{$article->titre_article}} </p>
                </div>
              </div>
            </div> 

            <!-- MODAL-ARTICLE -->
            <div class="modal fade" id="Modal{{$article->id_article}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="titre-modal">
                    Vous souhaitez supprimer cet article ?
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="close-modal" data-dismiss="modal">J'annule</button>
                    <form action="{{ route('mon-compte.delete', ['id' => $article->id_article]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="valide-modal">Je supprime</button>
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
          @if($evenements->isEmpty())
            <p class="mon-compte-null">Les événements auxquels vous serez conviés apparaîtront ici.</p>
          @else
            @foreach($evenements as $evenement)
              <!-- CARD EVENEMENT -->
              <div class="line-profil">
                <div class="card-evenement-profil">
                  <img src="./img/evenements/{{$evenement->depot}}" class="img-evenement-profil"/>
                  <a class="poubelle-icon" data-toggle="modal" data-target="#Modal{{$evenement->id_article}}"></a>
                  <div class="card-description-evenement-profil">
                    <p class="title-evenement-profil"> {{$evenement->nom}}</p>
                    <p class="date-evenement-profil"> {{$evenement->lieux}}, {{$evenement->date}} </p>
                  </div>
                </div>
              </div>

              <!-- MODAL-EVENEMENT -->
              <div class="modal fade" id="Modal{{$evenement->id_article}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="titre-modal">
                      Vous souhaitez vous désinscrire de cet évènement ?
                      <p class="sous-titre-modal-evenement mt-3">Pas de soucis, vous devez avoir vos raisons. Rendez-vous au prochain évènement ! </p>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="close-modal" data-dismiss="modal">J'annule</button>
                      <form action="{{ route('mon-compte.deleteEvenement', ['id' => $evenement->code]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="valide-modal">Je me désinscris</button>
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
    <div class="tab-pane fade" id="settings-content">
      <!-- ---------------------- Début Paramètre  ------------------------>
      <div class="base-layout-articles">
        @if($users->isEmpty())
          <p class="mon-compte-null">Un incident s'est produit. Veuillez réessayer ultérieurement. Si le problème persiste, n'hésitez pas à nous contacter. </p>
        @else
          @foreach($users as $user)
            <div class="bg-qrCode">
              <h2>Mes coordonées</h2>
              <div class="info-qrCode">
                <div class="info-user-qrCode">
                  <span class="info-user-titre-qrCode">
                    {{ strtoupper($user->name) }} {{ ucfirst(strtolower($user->firstName)) }}
                  </span>
                  <div class="info-user-inscrit-qrCode">
                    <p>{{ strtolower($user->email) }}</p>
                    <div class="info-user-abonnement-qrCode">
                      <span style="font-weight: 700;">Abonnement : </span>
                      <span style="font-weight: 400;">
                        @if($user->abonnement == 1)
                          Annuel
                        @elseif($user->abonnement == 2)
                          Mensuel 
                        @elseif($user->abonnement == 3)
                          Ponctuel
                        @endif
                      </span>
                    </div>
                  </div>
                </div>
                <img src="./img/perle/{{$user->photo_profil}}" class="user-photo-qrCode" />
              </div>
              <div class="info-user-credit-qrCode">
                <!-- Déconnexion -->
                <form style="color:black;" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="valide-modal" href="route('logout')" 
                        onclick="event.preventDefault(); this.closest('form').submit();">
                      Déconnexion
                    </a>
                </form>
              </div>
            </div>
          @endforeach
        @endif
      </div>
      <!-- ---------------------- FIN paramètre  ------------------------>
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


