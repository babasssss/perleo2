<x-content-layout >

  <div class="redirection">
    <x-redirection text="Accueil" href="/" />
  </div>
  <div class="bg-title-perleo">
    <span class="title-perleo" >Ma carte Perleo</span>
  </div>

  <div class="base-layout">
    <div class="bg-qrCode">
      <div class="info-qrCode">
        <div class="info-user-qrCode">
          <span class="info-user-titre-qrCode">
            Isabelle Thomas
          </span>
          <div class="info-user-inscrit-qrCode">
            <p>Inscrit(e) depuis le :</p>
            <p>01 / 03 / 2023</p>
            <div class="info-user-abonnement-qrCode">
              <span style="font-weight: 700;">Abonnement : </span>
              <span style="font-weight: 400;">Mensuel</span>
            </div>
          </div>
        </div>
        <img class="user-photo-qrCode" />
      </div>
      {{$qrCode}}
      <div class="info-user-credit-qrCode">
        Crédit : 2 perles
      </div>
    </div>
  </div>
</x-content-layout>
