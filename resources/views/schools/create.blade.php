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