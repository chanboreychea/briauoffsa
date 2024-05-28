@extends('template.master')
@section('title', 'User')

@section('message')
    @if ($message = Session::get('message'))
        <div class="position-absolute top-0 end-0 success-alert" id="success-alert" style="z-index:999;">
            <div class="toast show ">
                <div class="toast-header">
                    <strong class="me-auto">សេចក្ដីជូនដំណឹង!!!</strong>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="toast"></button>
                </div>

                <div class="toast-body text-success">
                    <b>{{ $message }}</b>
                </div>
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div class="position-absolute top-0 end-0 danger-alert" id="success-alert" style="z-index:999;">
            <div class="toast show ">
                <div class="toast-header">
                    <strong class="me-auto">សេចក្ដីជូនដំណឹង!!!</strong>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection

@section('contents')
    <div class="card">
        <div class="card-header bg-success">
            <div class="">
                <h5 class="text-light">ទម្រង់ព័ត៌មានរបស់អ្នកស្នើសុំកក់បន្ទប់ប្រជុំ</h5>
            </div>
        </div>
        <form action="/guests/request" method="GET">
            @csrf
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlInput1">ឈ្មោះអ្នកស្នើសុំ</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                placeholder="សូមបំពេញឈ្មោះ" aria-describedby="nameHelp">
                            @error('name')
                                <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlInput1">តួនាទី</label>
                            <input type="text" name="position" value="{{ old('position') }}" class="form-control"
                                placeholder="តួនាទី" aria-describedby="nameHelp">
                            @error('position')
                                <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label" for="meetingLevel">ប្រភេទកិច្ចប្រជុំ</label>
                            <select class="form-control" name="meetingLevel" value="" id="meetingLevel">
                                <option value="">-- ជ្រើសរើស --</option>
                                @foreach ($meetingLevel as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            @error('meetingLevel')
                                <small id="passwordHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlInput1">លេខទូរស័ព្ទ</label>
                            <input type="text" name="phoneNumber" value="{{ old('phoneNumber') }}" class="form-control"
                                id="exampleFormControlInput1" placeholder="លេខទូរស័ព្ទ" aria-describedby="passwordHelp">
                            @error('phoneNumber')
                                <small id="passwordHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlInput1">អ៊ីម៉ែល</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                id="exampleFormControlInput1" placeholder="អ៊ីម៉ែល" aria-describedby="emailHelp">
                            @error('email')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="interOfficeOrDepartmental"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer mt-2">
                <div class="d-flex justify-content-between align-items-center">
                    <a class="btn btn-dark m-2 rounded" href="/">បោះបង់</a>
                    <input type="submit" class="btn btn-primary rounded" value="បន្ទាប់">
                </div>
            </div>
        </form>
    </div>
    <script>
        var departmentAndOffice = @json($departments);

        function getSelectedMeetingLevelValue() {
            const selectElement = document.getElementById('meetingLevel');
            const selectedValue = selectElement.value;
            if (selectedValue == 6) {
                removeInput('offices');
                createInput("នាយកដ្ឋាន", "departments");

            } else if (selectedValue == 4) {
                removeInput('departments');
                createInput("ការិយាល័យ", "offices");

            } else if (selectedValue == '') {
                console.log('null');
            } else {
                removeInput('offices');
                removeInput('departments');
            }

        }

        function createInput(name, meetingLevel) {
            const newLabel = document.createElement('label');
            newLabel.textContent = `ឈ្មោះ${name}:`;
            newLabel.className = `col-form-label ${meetingLevel}`;

            const selectElement = document.createElement('select');
            selectElement.name = 'interOfficeOrDepartmental[]';
            // selectElement.id = 'mySelectID';
            selectElement.className = `form-control ${meetingLevel}`;

            if (meetingLevel == "departments") {
                for (const key in departmentAndOffice) {
                    const optionElement = document.createElement('option');
                    optionElement.value = key;
                    optionElement.textContent = key;
                    selectElement.appendChild(optionElement);
                }
            } else {
                for (const key in departmentAndOffice) {
                    for (const office in departmentAndOffice[key]) {
                        const optionElement = document.createElement('option');
                        optionElement.value = departmentAndOffice[key][office];
                        optionElement.textContent = departmentAndOffice[key][office];
                        selectElement.appendChild(optionElement);
                    }
                }
            }


            const parentElement = document.getElementById('interOfficeOrDepartmental');
            parentElement.appendChild(newLabel);
            parentElement.appendChild(selectElement);
        }

        function removeInput(name) {
            const container = document.querySelector('#interOfficeOrDepartmental');
            const childrenToRemove = container.querySelectorAll(`.${name}`);
            childrenToRemove.forEach(child => {
                container.removeChild(child);
            });
        }

        document.getElementById('meetingLevel').addEventListener('change', getSelectedMeetingLevelValue);
    </script>
@endsection
