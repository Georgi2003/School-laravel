<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Училища
        </h2>
    </x-slot>
    <br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div style="text-align: center;">
     <!-- City Dropdown -->
      Град: <select id='sel_city' name='sel_city'>
      <option value='0'>Град</option>
 
       <!-- Read City -->
       @foreach($cityData as $city)
         <option value='{{ $city->id }}'>{{ $city->name }}</option>
       @endforeach

    </select>

    <br><br>
    <!-- City Schools Dropdown -->
    Училище: <select id='sel_schools' name='sel_schools'>
      <option value='0'>Училище</option>
    </select>
  </div>
    <script src="{{ asset('js/student.js') }}" defer></script>
</x-app-layout>