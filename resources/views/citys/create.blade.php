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