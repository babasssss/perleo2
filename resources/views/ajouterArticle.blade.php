<!-- Gestion erreur lors de l'ajout d'article -->
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

<x-content-layout >

  <div class="redirection">
    <x-redirection text="Accueil" href="/" />
  </div>
  <div class="bg-title-perleo">
    <span class="title-perleo" >Ajouter un article</span>
  </div>

  
  <div class="ajouter-article-base-layout mt-4">
    <form action="{{ route('ajouter-un-article.post') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <!-- Image -->
      <div class="add-img">
      

        <div class="bg-add-img" id="bg-add-img-container">
          <div class="icon-add-img">
            <div class="icon-plus-add-img">
              <label for="photo-upload" class="file-upload-label">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M31.6666 21.6668H21.6666V31.6668H18.3333V21.6668H8.33325V18.3335H18.3333V8.3335H21.6666V18.3335H31.6666V21.6668Z" fill="#230F47" />
                </svg>
              </label>
            </div>
            <input id="photo-upload" type="file" name="photo" class="file-upload-input" accept="image/*" onchange="updatePhotoName(this)" required>
          </div>
        </div>

        <p id="photo-name" class="text-add-photo">Ajouter photo</p>
      </div>

    <script>
      function updatePhotoName(input) {
        var photoNameElement = document.getElementById('photo-name');
        if (input.files.length > 0) {
          photoNameElement.textContent = input.files[0].name;
        } else {
          photoNameElement.textContent = 'Ajouter photo';
        }
      }
    </script>



      <div class="article-form-group">
        <!-- Name article -->
        <div>
            <x-input-label for="name" :value="__('Comment s\'appelle votre article ?')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" 
              :value="old('name')" required autofocus autocomplete="name"
              placeholder="Titre" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Catégorie article -->
        <x-select-article :options="$options" />

        <!-- Textarea article -->
        <div>
            <x-input-label for="textarea" :value="__('Décrivez votre article')" />
            <textarea style="
              border: 2px solid #3574F2;
              filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
              border-radius: 8px;
              width: 100%;
              padding-left: 5px;
              "
              class="block mt-1 w-full" id="textarea" rows="3" name="textarea" 
              :value="old('textarea')" required autofocus autocomplete="textarea"
              placeholder="Ajoutez votre description ici..."
            ></textarea>

            <x-input-error :messages="$errors->get('textarea')" class="mt-2" />
        </div>

        <!-- Etat article -->
        <x-select-etat-article :etatArticles="$etatArticles" />
        <button type="submit" class="valide-modal">Mettre en ligne</button>
      </div>
    </form>
  </div>
</x-content-layout>



























