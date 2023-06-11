@if ($errors->any())
<div class="bg-red-300 p-5 rounded-lg">
      <ul>
            @foreach ($errors->all() as $message) 
                  <li class="text-red-600">
                        {{ $message }}
                  </li>
            @endforeach
      </ul>
</div>
@endif