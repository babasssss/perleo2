<x-content-layout >

  <div class="redirection">
    <x-redirection text="Accueil" href="/" />
  </div>
  <div class="bg-title-perleo">
    <span class="title-perleo" >Profil</span>
  </div>

  <div class="base-layout">
    <div class="window-profile">
      <div class="scrollspy-container">
        <div class="scrollspy-items">
          <a href="#section1" class="scrollspy-item">Mes articles</a>
          <a href="#section2" class="scrollspy-item">Mes évènements</a>
          <a href="#section3" class="scrollspy-item">Paramètres</a>
        </div>
      </div>
    </div>
  </div>
  <div class="base-layout-articles">
    sd
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