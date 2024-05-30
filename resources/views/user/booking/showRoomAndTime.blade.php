@extends('template.master')

@section('message')
    @if ($message = Session::get('message'))
        <div class="position-absolute top-0 end-0 success-alert" id="success-alert" style="z-index:999;">
            <div class="toast show ">
                <div class="toast-header">
                    <strong class="me-auto">ការកក់បន្ទប់ប្រជុំ</strong>
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
                    <strong class="me-auto">ការកក់បន្ទប់ប្រជុំ</strong>
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

    <div class="row mb-3">
        <div class="card w-100 p-0">
            <h6 class="card-header bg-info text-light">
                សូមជ្រើសរើសប្រភេទបន្ទប់ និងម៉ោងប្រជុំ
            </h6>
            <div class="card-body bg-light">
                <div class="container-fluid" id="myGroup">
                    <div class="row">
                        <div class="col-lg-6">
                            <button id="room1" style="font-family: khmer mef2;" class="btn btn-primary rounded w-100"
                                data-toggle="collapse" value="A" href="#collapseExample" role="button"
                                aria-expanded="false" aria-controls="collapseExample">បន្ទប់ប្រជុំធំ A
                            </button>
                        </div>
                        <div class="col-lg-6">
                            <button id="room2" style="font-family: khmer mef2;" class="btn btn-primary rounded w-100"
                                data-toggle="collapse" value="B" data-target="#collapseExample2" aria-expanded="false"
                                aria-controls="collapseExample2">បន្ទប់ប្រជុំតូច B
                            </button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="collapse" id="collapseExample" data-parent="#myGroup">
                                <div class="card card-body">
                                    <div class="container" id="room1">
                                        <div class="row ">
                                            @for ($i = 8; $i < 12; $i++)
                                                <div class="col nowrap">
                                                    <button type="button" value="A {{ $i }}-{{ $i + 1 }}"
                                                        class="items btn btn-sm btn-secondary rounded w-100 times mt-2">
                                                        {{ $i }}-{{ $i + 1 }} AM
                                                    </button>
                                                </div>
                                            @endfor
                                        </div>

                                        <div class="row">
                                            @for ($i = 1; $i < 5; $i++)
                                                <div class="col nowrap">
                                                    <button type="button" value="A {{ $i }}-{{ $i + 1 }}"
                                                        class="items btn btn-sm btn-secondary rounded w-100 times mt-2">
                                                        {{ $i }}-{{ $i + 1 }} PM
                                                    </button>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="collapse" id="collapseExample2" data-parent="#myGroup">
                                <div class="card card-body">
                                    <div class="container">
                                        <div class="row">
                                            @for ($i = 8; $i < 12; $i++)
                                                <div class="col nowrap">
                                                    <button type="button"
                                                        value="B {{ $i }}-{{ $i + 1 }}"
                                                        class="items btn btn-sm btn-secondary rounded w-100 times mt-2">
                                                        {{ $i }}-{{ $i + 1 }} AM
                                                    </button>
                                                </div>
                                            @endfor
                                        </div>
                                        <div class="row">
                                            @for ($i = 1; $i < 5; $i++)
                                                <div class="col nowrap">
                                                    <button type="button"
                                                        value="B {{ $i }}-{{ $i + 1 }}"
                                                        {{-- data-value="B {{ $i }}-{{ $i + 1 }}" --}}
                                                        class="items btn btn-sm btn-secondary rounded w-100 times mt-2">
                                                        {{ $i }}-{{ $i + 1 }} PM
                                                    </button>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <div class="modal-body d-flex-justify-content-center align-items-center"
                                style="height: 400px;display:flex;justify-content: center;align-items: center;flex-direction: column">

                                <h3>សូមជ្រើសរើសម៉ោងតាមលំដាប់​</h3>
                                <br>
                                <h3>និងវេន(ព្រឹក ឬល្ងាច)ដូចគ្នា</h3>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card p-0">
            <h6 class="card-header bg-danger text-light">ព័ត៌មានលម្អិត</h6>
            <form action="/booking" method="POST">
                @csrf
                <div class="card-body bg-light">
                    <div class="container">
                        <input type="hidden" value="{{ $now }}" id="dateInput" name="date">
                        <input type="hidden" name="userId" value="">
                        <input type="hidden" id="roomInput" name="room">
                        <input type="hidden" id="timeInput" name="times">

                        <div class="form-group text-muted m-0">
                            <label for="inputEmail3">កាលបរិច្ឆេទ:</label>
                            <h5 id="inputEmail3" class="text-success">
                                {{ $date }}</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group row text-muted">
                                    <label for="roomDiv" class="col-form-label col-lg-3 ">បន្ទប់:</label>
                                    <div class="col-lg-9 p-0">
                                        <div id="roomDiv"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group row text-muted">
                                    <label for="timeDiv" class="col-form-label col-lg-3 ">ម៉ោង:</label>
                                    <div class="col-lg-9 p-0">
                                        <div class="mb-0" id="timeDiv"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @if (Session::get('meetingLevel') == 9)
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="topic">ប្រធានបទ:</label>
                                    <input type="text" class="form-control" value="{{ old('topic') }}"
                                        name="topic" id="topic" placeholder="ប្រធានបទ">
                                    @error('topic')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="regulator">និយ័តករ:</label>
                                    <select class="form-control" name="regulator" value="{{ old('regulator') }}"
                                        id="regulator">
                                        <option value="">-- ជ្រើសរើស --</option>
                                        @foreach ($regulator as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>

                                    @error('regulator')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="directedBy">តួនាទី:</label>
                                    <input type="text" class="form-control" value="{{ old('directedBy') }}"
                                        name="directedBy" id="directedBy" placeholder="សូមបំពេញ">
                                    @error('directedBy')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nameDirectedBy">ដឹកនាំដោយ:</label>
                                    <input type="text" class="form-control" value="{{ old('nameDirectedBy') }}"
                                        name="nameDirectedBy" id="nameDirectedBy" placeholder="ឈ្មោះ">
                                    @error('nameDirectedBy')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="topic">ប្រធានបទ:</label>
                                    <input type="text" class="form-control" value="{{ old('topic') }}"
                                        name="topic" id="topic" placeholder="ប្រធានបទ">
                                    @error('topic')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="directedBy">តួនាទី:</label>

                                    <select class="form-control" name="directedBy" value="{{ old('derectedBy') }}"
                                        id="directedBy">
                                        <option value="">-- ជ្រើសរើស --</option>
                                        <option value="ប្រធានអង្គភាព">
                                            ប្រធានអង្គភាព
                                        </option>
                                        <option value="អនុប្រធានអង្គភាព">អនុប្រធានអង្គភាព</option>
                                        @foreach ($departments as $key => $offices)
                                            <option value="ប្រធាននាយកដ្ឋាន{{ $key }}">
                                                ប្រធាននាយកដ្ឋាន
                                                {{ $key }}</option>
                                            <option value="អនុប្រធាននាយកដ្ឋាន{{ $key }}">
                                                អនុប្រធាននាយកដ្ឋាន
                                                {{ $key }}</option>
                                            @foreach ($offices as $key => $item)
                                                <option value="ប្រធានការិយាល័យ{{ $item }}">ប្រធានការិយាល័យ
                                                    {{ $item }}</option>

                                                <option value="អនុប្រធានការិយាល័យ{{ $item }}">អនុប្រធានការិយាល័យ
                                                    {{ $item }}</option>
                                            @endforeach
                                        @endforeach
                                        <option value="ផ្សេងៗ">
                                            ផ្សេងៗ
                                        </option>
                                    </select>

                                    @error('directedBy')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nameDirectedBy">ដឹកនាំដោយ:</label>
                                    <input type="text" class="form-control" value="{{ old('nameDirectedBy') }}"
                                        name="nameDirectedBy" id="nameDirectedBy" placeholder="ឈ្មោះ">
                                    @error('nameDirectedBy')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="member" class="col-form-label">ចំនួនសមាជិក:</label>
                                <input type="number" min="2" max="50" value="{{ old('member') }}"
                                    class="form-control w-100" name="member" id="member" placeholder="ចំនួន">
                                @error('member')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="description" class="col-form-label">គោលបំណង:</label>
                                <div>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-muted d-flex justify-content-between">
                    <a href="/calendar" class="btn btn-secondary rounded"
                        style="font-family: khmer mef1,arial;">បោះបង់</a>
                    <input type="submit" class="btn btn-success rounded" style="font-family: khmer mef1,arial;"
                        value="ធ្វើការកក់">
                </div>
            </form>
        </div>
    </div>

    <script>
        var room1 = document.getElementById("room1");
        var room2 = document.getElementById("room2");
        var times = document.querySelectorAll('.times');
        var timeArray = [];
        var dataFromBookingController = {!! json_encode($verifyTimesBooking) !!};
        var departmentAndOffice = @json($departments);


        room1.addEventListener('click', function() {
            const value = room1.value;
            timeArray.length = 0;
            document.getElementById("timeDiv").innerHTML = timeArray.join(', ');
            document.getElementById("timeInput").value = timeArray.join(', ');
            for (let i = 0; i < times.length; i++) {
                times[i].classList.remove("btn-success");
            }

            if (room1.classList.contains('btn-success')) {
                room1.classList.remove("btn-success");
                if (timeArray.length == 0) {
                    document.getElementById("roomInput").value = '';
                    document.getElementById("roomDiv").innerHTML = '';
                }
            } else {
                room1.classList.add("btn-success");
                room2.classList.remove("btn-success");
                document.getElementById("roomDiv").innerHTML = value;
                document.getElementById("roomInput").value = value;
            }

        });

        room2.addEventListener('click', function() {
            const value = room2.value;
            timeArray.length = 0;
            document.getElementById("timeDiv").innerHTML = timeArray.join(', ');
            document.getElementById("timeInput").value = timeArray.join(', ');
            for (let i = 0; i < times.length; i++) {
                times[i].classList.remove("btn-success");
            }
            if (room2.classList.contains('btn-success')) {
                room2.classList.remove("btn-success");
                if (timeArray.length == 0) {
                    document.getElementById("roomInput").value = '';
                    document.getElementById("roomDiv").innerHTML = '';
                }
            } else {
                room2.classList.add("btn-success");
                room1.classList.remove("btn-success");
                document.getElementById("roomDiv").innerHTML = value;
                document.getElementById("roomInput").value = value;
            }
        });

        for (let i = 0; i < times.length; i++) {

            for (let j = 0; j < dataFromBookingController.length; j++) {
                var explodedArray = dataFromBookingController[j]['time'].split(', ');
                // Output each substring
                explodedArray.forEach(function(substring) {
                    if (times[i].value == substring) {
                        times[i].classList.add("btn-danger");
                        times[i].disabled = true;
                    }
                });
            }

            times[i].addEventListener('click', function(event) {
                const value = event.target.value;
                var index = timeArray.indexOf(value);

                if (index !== -1) {
                    timeArray.sort((a, b) => {
                        // Compare the extracted numbers
                        const numA = extractNumber(a);
                        const numB = extractNumber(b);
                        return numA - numB;
                    });

                    let fVinTimeArrays = extractNumber(timeArray[0]);
                    let lVinTimeArrays = extractNumber(timeArray[timeArray.length - 1]);

                    console.log(fVinTimeArrays);
                    if (extractNumber(value) > fVinTimeArrays && extractNumber(value) < lVinTimeArrays) {

                        $('#exampleModal').modal('show');

                        times[i].classList.toggle("btn-success");
                    } else
                        timeArray.splice(index, 1);
                } else {

                    if (timeArray.length === 0) {

                        timeArray.push(value);
                    } else {
                        timeArray.sort((a, b) => {
                            // Compare the extracted numbers
                            const numA = extractNumber(a);
                            const numB = extractNumber(b);
                            return numA - numB;
                        });

                        let fVinTimeArrays = extractNumber(timeArray[0]);
                        let lVinTimeArrays = extractNumber(timeArray[timeArray.length - 1]);

                        console.log(fVinTimeArrays);
                        if (extractNumber(value) < fVinTimeArrays - 1 || extractNumber(value) > lVinTimeArrays +
                            1) {

                            $('#exampleModal').modal('show');

                            times[i].classList.toggle("btn-success");
                        } else
                            timeArray.push(value);
                    }
                }

                timeArray.sort((a, b) => {
                    // Compare the extracted numbers
                    const numA = extractNumber(a);
                    const numB = extractNumber(b);
                    return numA - numB;
                });

                document.getElementById("timeDiv").innerHTML = timeArray.join(', ');
                document.getElementById("timeInput").value = timeArray.join(', ');

                times[i].classList.toggle("btn-success");
            });

        }

        // Extract the numbers from the strings
        const extractNumber = (str) => {
            const match = str.match(/\d+/); // Extract the first number
            return match ? parseInt(match[0], 10) : 0;
        };
    </script>

@endsection
