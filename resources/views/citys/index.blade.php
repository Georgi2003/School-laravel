<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Градове
        </h2>
    </x-slot>
    <br>
    
    <div class="container">

    <div class="d-flex bd-highlight mb-4">
        <div class="p-2 w-100 bd-highlight"></div>
        
        <div class="p-2 flex-shrink-0 bd-highlight">
            <button class="btn btn-success" id="btn-add">
                Добави град
            </button>
        </div>
    </div>

    <div>
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Име на града</th>
                    <th>Брой жители</th>
                    <th>Изтрии</th>
                    <th>Актуализирай</th>
                </tr>
            </thead>
            <tbody id="todos-list" name="todos-list">
                @foreach($allCitys as $city)
                <tr id="todo{{$city->id}}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->inhabitants_count }}</td>
                
                    <td>
                    <form method="post" action="{{ url('citys/') }}/{{ $city->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger delete-todo" class="btn btn-primary">
                            Изтрий
                        </button>
                    </form> 
                    </td>

                    <td>
                        <button>
                            <a class="btn btn-primary" href = "{{ url('citys') }}/{{ $city->id }}/edit">
                                Актуализирай
                            </a>
                        </button>
                    </td>
                </tr>
            </td>
                @endforeach
            </tbody>
        </table>

        @include('citys.create')
    </div>
</div>
<script src="{{ asset('js/city.js') }}" defer></script>
</x-app-layout>
