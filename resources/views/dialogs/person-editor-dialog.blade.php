<!-- Modal -->
<div class="modal fade" id="person-editor-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="error-message"></div>
                <form id="person-editor-form">
                    @if($person !== null)
                        <input type="text" value="{{ $person->id }}" name="id" class="d-none">
                    @endif
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" name="firstname" value="{{ $person->firstname ?? null }}" placeholder="First Name">
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" name="lastname" value="{{ $person->lastname ?? null }}" placeholder="Last Name">
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" name="nickname" value="{{ $person->nickname ?? null }}" placeholder="Nick Name">
                    </div>
                    <div class="form-group mt-4">
                        <input type="date" class="form-control" name="birthday" value="{{ date('Y-m-d', $person->birthday ?? time()) }}" placeholder="Birthday">
                    </div>
                    <div class="form-group mt-4">
                        {{ Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'others' => 'Others'], $person->gender ?? 'male', ['class' => 'custom-select']) }}
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" name="hobby" value="{{ $person->hobby ?? null }}" placeholder="Hobby">
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" name="image" value="{{ $person->image ?? null }}" placeholder="URL Image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="person-editor-form">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#person-editor-form').on('submit', function (e) {
        e.preventDefault();

        /* get form data */
        let data = $(this).serializeArray();
        let formData = {};

        $.each(data, function(i, field) {
            formData[field.name] = field.value;
        });

        let url = '/person';
        let method = 'post';

        if (formData['id']) {
            url = `/person/${formData['id']}`;
            method = 'put';
        }

        $.ajax({
            url: url,
            method: method,
            data: formData,
            dataType: 'json',
            success: function(data) {
                if (_.get(data, 'status') === 'success') {
                    $('#product-editor-dialog').modal('hide');
                    location.reload();
                }
            },
            error: function (xhr, status, err) {
                $('#error-message').addClass('d-block');
                $('#error-message').html(_.join(_.values(_.get(xhr, 'responseJSON.errors')), '<br>'))
            }
        })
    })
</script>
