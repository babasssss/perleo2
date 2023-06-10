<x-content-layout>
  <main id="main">
    <section id="about" class="about">
      <div class="container mt-5" data-aos="fade-up">
        @include('components.filtre')
      </div>
    </section>
  </main>
  @include('components.evenement_a_venir')
  @include('components.articles')
  
</x-content-layout>