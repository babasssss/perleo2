<div>
  <x-input-label for="etat" :value="__('Dans quel état est votre article ? ')" />
  <select 
  style="
  border: 2px solid #3574F2;
  filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
  border-radius: 8px;
  height: 40px;
  width: 100%;
  padding-left: 5px;
  "
  
  class="block mt-1 w-full" id="etat" name="etat">
        @foreach ($etatArticles as $etatArticle)
            <option value="{{ $etatArticle['value'] }}">{{ $etatArticle['label'] }}</option>
        @endforeach
  </select>
  <x-input-error :messages="$errors->get('etat')" class="mt-2" />
</div>