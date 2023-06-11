@if (session('success'))
      <div class="bg-green-200 text-green-600 p-5 rounded-lg">
            {{ session('success') }}
      </div>
@endif