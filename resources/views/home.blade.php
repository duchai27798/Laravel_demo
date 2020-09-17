@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="card-container row">
            @foreach($persons ?? [] as $person)
                <div class="col-12 col-lg-6 mt-4">
                    <div class="card-item d-flex">
                        <div class="img" style="background-image: url('{{ $person->image }}')"></div>
                        <div class="ml-4 d-flex justify-content-between flex-grow-1">
                            <div>
                                <h4>{{ ucwords($person->firstname) }} {{ ucwords($person->lastname) }}</h4>
                                <p>( {{ $person->nickname }} )</p>
                                <div class="m-t-10 d-flex"><span class="label">Birthday:</span><span class="text-black-50">{{ date('d-m-Y', $person->birthday) }}</span></div>
                                <div class="mt-1 d-flex">
                                    <span class="label">Gender:</span>
                                    @if($person->gender === 'male')
                                        <i class="fas fa-mars size-22"></i>
                                    @else
                                        <i class="fas fa-venus size-22"></i>
                                    @endif
                                </div>
                                <div class="mt-1 d-flex"><span class="label">Hobby:</span><span class="text-black-50">{{ $person->hobby }}</span></div>
                            </div>
                            <div class="d-flex flex-column justify-content-end">
                                <button class="btn btn-primary" onclick="openPersonEditorDialog({{ $person->id }})"><i class="far fa-edit size-22"></i></button>
                                <button class="btn btn-danger m-t-10"><i class="fas fa-trash-alt size-22"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="dialog"></div>
@endsection

<script>
    function openPersonEditorDialog(id) {
        $.ajax({
            type: 'GET',
            url: '/person/edit/' + id,
            dataType: 'HTML',
            success: function (data) {
                $('#dialog').html(data);
                $('#person-editor-modal').modal("show");
            },
        })
    }
</script>
