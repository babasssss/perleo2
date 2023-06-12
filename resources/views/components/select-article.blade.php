<div>
  <x-input-label for="category" :value="__('Dans quelle catégorie se situe-t-elle ? ')" />
  <select 
  style="
  border: 2px solid #3574F2;
  filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
  border-radius: 8px;
  height: 40px;
  width: 100%;
  padding-left: 5px;
  "
  
  class="block mt-1 w-full" id="category" name="category">
        @foreach ($options as $option)
            <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
        @endforeach
  </select>
  <x-input-error :messages="$errors->get('category')" class="mt-2" />
</div>