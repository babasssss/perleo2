<x-content-layout >

  <div class="redirection">
    <x-redirection text="Accueil" href="/" />
  </div>
  <div class="bg-title-perleo">
    <span class="title-perleo" >Ma carte Perleo</span>
  </div>

  <div class="base-layout">
    @if($users->isEmpty())
      <p class="mon-compte-null">Un incident s'est produit. Veuillez réessayer ultérieurement. Si le problème persiste, n'hésitez pas à nous contacter. </p>
    @else
      @foreach($users as $user)
        <div class="bg-qrCode">
          <div class="info-qrCode">
            <div class="info-user-qrCode">
              <span class="info-user-titre-qrCode">
                {{ strtoupper($user->name) }} {{ ucfirst(strtolower($user->firstName)) }}
              </span>
              <div class="info-user-inscrit-qrCode">
                <p>Inscrit(e) depuis le :</p>
                <p>{{ \Carbon\Carbon::parse($user->created_at)->locale('fr')->isoFormat('D MMMM YYYY') }}</p>
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
          {{$qrCode}}
          <div class="info-user-credit-qrCode">
            Crédit : 2 perles
          </div>
        </div>
        @endforeach
      @endif
  </div>
</x-content-layout>
