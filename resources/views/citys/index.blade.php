<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Градове
        </h2>
    </x-slot>
    <br>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

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

        <div class="modal fade" id="formModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formModalLabel">Създаване на град</h4>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" name="myForm" class="form-horizontal" novalidate="" action="/citys">
                            @csrf
                            <div class="form-group">
                                <label>Име на града</label>
                                <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Въведи град">
                                <span style="color: red;" id = "spanName"><br>Въведи име!</span>
                            </div>

                            <div class="form-group">
                                <label>Жители</label>
                                    <input type="number" class="form-control" id="inhabitants_count" name="inhabitants_count"
                                        placeholder="Въведи броят на жителите">
                                <span style="color: red;" id = "spanInhabitantsCount"><br>Въведи брой жители!</span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Запази
                        </button>
                        <input type="hidden" id="todo_id" name="todo_id" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/city.js') }}" defer></script>
</x-app-layout>
