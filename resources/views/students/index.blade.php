<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Ученици
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

    @include('students.create');
  </div>
</div>
</div>
<script src="{{ asset('js/student.js') }}" defer></script>
<script src="{{ asset('js/studentCreate.js') }}" defer></script>
</x-app-layout>