@props(['disabled' => false])

<input style="
  border: 2px solid #3574F2;
  filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
  border-radius: 8px;
  height: 40px;
  width: 100%;
  padding-left: 5px;
" 
{{ $disabled ? 'disabled' : '' }} 
{{ $attributes }}
>
