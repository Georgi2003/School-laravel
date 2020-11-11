<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Училища
        </h2>
    </x-slot>
    <br>

    <div class="container">

        <div class="d-flex bd-highlight mb-4">
            <div class="p-2 w-100 bd-highlight"></div>

            <div class="p-2 flex-shrink-0 bd-highlight">
                <button class="btn btn-success" id="btn-add">
                    Добави училище
                </button>
            </div>
        </div>

        <div>
            <table class="table table-inverse">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Име на училището</th>
                        <th>Град</th>
                        <th>Изтрии</th>
                        <th>Актуализирай</th>
                    </tr>
                </thead>
                <tbody id="todos-list" name="todos-list">
                    @foreach($allSchools as $school)
                    <tr id="todo{{$school->id}}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $school->name }}</td>
                        <td>{{ $school->city->name }}</td>

                        <td>
                            <form method="post" action="{{ url('schools/') }}/{{ $school->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger delete-todo" class="btn btn-primary">
                                    Изтрий
                                </button>
                            </form> 
                        </td>

                        <td>
                            <button>
                                <a class="btn btn-primary" href = "{{ url('schools') }}/{{ $school->id }}/edit">
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
                        <h4 class="modal-title" id="formModalLabel">Създаване на училище</h4>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" name="myForm" class="form-horizontal" novalidate="" action="/schools">
                            @csrf
                            <div class="form-group">
                                <label>Име на училището</label>
                                <input type="text" class="form-control" id="name" name="name"
                                placeholder="Въведи училище">
                                <span style="color: red;" id = "spanName"><br>Въведи име</span>
                            </div>
                                <select name="city_id" id="city_id" required>
                                    <option value="0">Град</option>
                                    @foreach($allCitys as $citys)
                                        <option value="{{ $citys->id }}">{{ $citys->name }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red;" id = "spanCityId"><br>Въведи град</span>
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

    <script src="{{ asset('js/school.js') }}" defer></script>
</x-app-layout>
