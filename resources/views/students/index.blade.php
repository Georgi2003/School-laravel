<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Училища
    </h2>
  </x-slot>
  <br>
  
  <!--  -->
  <div class="container">

    <div class="d-flex bd-highlight mb-4">
      <div class="p-2 w-100 bd-highlight"></div>

      <div class="p-2 flex-shrink-0 bd-highlight">
        <button class="btn btn-success" id="btn-add">
          Добави ученик
        </button>
      </div>
    </div>

    <div>
      <table class="table table-inverse">
        <thead>
          <tr>
            <th>№</th>
            <th>Име</th>
            <th>Фамилия</th>
            <th>Възраст</th>
            <th>Email</th>
            <th>Телефон</th>
            <th>Изтрии</th>
            <th>Актуализирай</th>
          </tr>
        </thead>
        <tbody id="todos-list" name="todos-list">
          @foreach($allStudents as $students)
          <tr id="todo{{$students->id}}">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $students->first_name }}</td>
            <td>{{ $students->last_name }}</td>
            <td>{{ $students->age }}</td>
            <td>{{ $students->email }}</td>
            <td>{{ $students->phone }}</td>

            <td>
              <form method="post" action="{{ url('students/') }}/{{ $students->id }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger delete-todo" class="btn btn-primary">
                  Изтрий
                </button>
              </form> 
            </td>

            <td>
              <button>
                <a class="btn btn-primary" href = "{{ url('students') }}/{{ $students->id }}/edit">
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
                <label>Име на ученика</label>
                <span style="color: red;" id = "spanFirstName"><br>Въведи име</span>
                <input type="text" class="form-control" id="first_name" name="first_name"
                placeholder="Въведи име">

                <label>Фамилия на ученика</label>
                <span style="color: red;" id = "spanLastName"><br>Въведи фамилия</span>
                <input type="text" class="form-control" id="last_name" name="last_name"
                placeholder="Въведи фамилия">

                <label>Възраст на ученика</label>
                <span style="color: red;" id = "spanAge"><br>Въведи възраст</span>
                <input type="number" class="form-control" id="age" name="age"
                placeholder="Въведи възраст">

                <label>Email на ученика</label>
                <span style="color: red;" id = "spanEmail"><br>Въведи email</span>
                <input type="text" class="form-control" id="email" name="email"
                placeholder="Въведи email">
                
                <label>Телефон на ученика</label>
                <span style="color: red;" id = "spanPhone"><br>Въведи телефон</span>
                <input type="number" class="form-control" id="phone" name="phone"
                placeholder="Въведи телефон">
              </div>

              <span style="color: red;" id = "spanCity"><br>Въведи град</span>
              <div style="text-align: center;">
               <!-- City Dropdown -->
               Град: <select id='sel_city' name='sel_city'>
                <option value='0'>Град</option>
                
                <!-- Read City -->
                @foreach($cityData as $city)
                  <option value='{{ $city->id }}'>{{ $city->name }}</option>
                @endforeach
              </select>

              <br>
              <span style="color: red;" id = "spanSchool"><br>Въведи училище</span>
              <br>
              <!-- City Schools Dropdown -->
              Училище: <select id='sel_schools' name='sel_schools'>
                <option value='0'>Училище</option>
              </select>
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
<script src="{{ asset('js/student.js') }}" defer></script>
<script src="{{ asset('js/studentCreate.js') }}" defer></script>
</x-app-layout>