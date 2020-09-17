<!-- Modal -->
<div class="modal fade" id="person-editor-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="error-message"></div>
                <form id="product-form">
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" name="firstname" value="{{ $person->firstname ?? null }}" placeholder="First Name">
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" name="lastname" value="{{ $person->lastname }}" placeholder="Last Name">
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" name="nickname" value="{{ $person->nickname }}" placeholder="Nick Name">
                    </div>
                    <div class="form-group mt-4">
                        <input type="date" class="form-control" name="birthday" value="{{ date('Y-m-d', $person->birthday) }}" placeholder="Birthday">
                    </div>
                    <div class="form-group mt-4">
                        <select class="custom-select">
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <input type="number" class="form-control" name="hobby" placeholder="Hobby">
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" name="urlImg" placeholder="URL Image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
