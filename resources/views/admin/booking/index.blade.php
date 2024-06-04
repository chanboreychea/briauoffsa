@extends('template.master')

@section('title', 'Booking Room')

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
@endsection

@section('contents')

    {{-- <div class="card">
        <div class="card-header bg-muted">
            <h5 class="text-danger">ការស្នើសុំកក់បន្ទប់ប្រជំុ</h5>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered bg-light">
                <thead class="thead-light">
                    <th class="text-center">ល.រ</th>
                    <th class="text-center">កាលបរិច្ឆេទប្រជុំ</th>
                    <th class="text-center">ប្រធានបទ</th>
                    <th class="text-center">ដឹកនាំដោយ</th>
                    <th class="text-center">ឈ្មោះអ្នកដឹកនាំ</th>
                    <th class="text-center">កម្រិតប្រជុំ</th>
                    <th class="text-center">ម៉ោង</th>
                    <th class="text-center">ឈ្មោះអ្នកកក់</th>
                    <th class="text-center">អនុញ្ញាត</th>
                </thead>
                <tbody class="bg-light">
                    @foreach ($booking as $key => $item)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $item->date }}</td>
                            <td class="text-center">
                                <div data-toggle="tooltip" data-html="true" title="{{ $item->description }}">
                                    {{ $item->topicOfMeeting }}
                                </div>
                            </td>
                            <td class="text-center">{{ $item->directedBy }}</td>
                            <td class="text-center">{{ $item->nameDirectedBy }}</td>
                            <td class="text-center">
                                <div data-toggle="tooltip" data-html="true" title="{{ $item->interOfficeOrDepartmental }}">
                                    @foreach ($meetingLevel as $key => $value)
                                        @if ($item->meetingLevel == $key)
                                            {{ $value }}
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                            <td class="text-center">
                                <div data-toggle="tooltip" data-html="true" title="{{ $item->room }}">
                                    {{ $item->time }}
                                </div>
                            </td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#exampleModal{{ $item->id }}">
                                    ពិនិត្យ
                                </button>

                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ការអនុញ្ញាត</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/booking/approve/{{ $item->id }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group row text-muted text-center">
                                                        <label for="description"
                                                            class="form-label col-lg-4 text-info">មូលហេតុ:</label>
                                                        <div class="col-lg-8">
                                                            <textarea name="description" id="description" class="form-control" cols="30" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="reject" class="btn btn-danger"
                                                        value="បដិសេធ">
                                                    <input type="submit" name="approve" class="btn btn-primary"
                                                        value="អនុញ្ញាត">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div> --}}

    <div class="">
        <div class="card-header bg-gray">
            {{-- <form action="/booking" action="GET">
                @csrf
                <div class="row d-flex align-items-center">

                    <div class="col-lg-2 col-sm-12">
                        <div class="input-group">
                            <span class="input-group-text text-danger" id="basic-addon1">តួនាទី</span>
                            <select class="form-control" name="directedBy" id="directedBy">
                                <option value="">ជ្រើសរើស</option>
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
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-12">
                        <div class="input-group">
                            <span class="input-group-text text-danger" id="meetingLevel">កិច្ចប្រជុំ</span>
                            <select class="form-control" name="meetingLevel" id="meetingLevel">
                                <option value="">ជ្រើសរើស</option>
                                @foreach ($meetingLevel as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-12">
                        <div class="input-group">
                            <span class="input-group-text text-danger" id="basic-addon1">បន្ទប់</span>
                            <select class="form-control" name="room" id="basic-addon1">
                                <option value="">ជ្រើសរើស</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-12">
                        <div class="input-group">
                            <span class="input-group-text text-danger" id="basic-addon1">ចាប់ពី</span>
                            <input type="date" name="fromDate" min="{{ now()->subMonths(3)->format('Y-m-d') }}"
                                max="{{ now()->format('Y-m-d') }}" class="form-control" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-12">
                        <div class="input-group">
                            <span class="input-group-text text-danger" id="basic-addon1">ដល់</span>
                            <input type="date" name="toDate" class="form-control" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-12">
                        <div class="d-flex gap-1">
                            <div class="col"><input class="btn btn-success w-100 text-white" type="submit"
                                    value="ស្វែងរក"></div>
                            <div class="col"><a href="/booking/export/excel"
                                    class="btn btn-success w-100 text-white">ទាញយក</a>
                            </div>
                        </div>
                    </div>

                </div>
            </form> --}}
        </div>
        <div class="card-body bg-gray table-responsive">

            {{-- <table class="table table-sm table-bordered">
                <thead class="thead-light">
                    <th class="text-center">ល.រ</th>
                    <th class="text-center">កាលបរិច្ឆេទ</th>
                    <th>ប្រធានបទ</th>
                    <th>តួនាទី</th>
                    <th>ដឹកនាំដោយ</th>
                    <th>ប្រភេទកិច្ចប្រជុំ</th>
                    <th>បន្ទប់/ម៉ោង</th>
                    <th>ឈ្មោះអ្នកស្នើសុំ</th>
                    <th>ស្ថានភាព</th>
                    <th class="text-center">សកម្មភាព</th>
                </thead>
                <tbody>
                    @foreach ($isApproveBooking as $key => $item)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $item->date }}</td>
                            <td>
                                <div data-toggle="tooltip" data-html="true" title="{{ $item->description }}">
                                    {{ $item->topicOfMeeting }}
                                </div>
                            </td>
                            <td>{{ $item->directedBy }}</td>
                            <td>{{ $item->nameDirectedBy }}</td>
                            <td>
                                <div data-toggle="tooltip" data-html="true" title="{{ $item->interOfficeOrDepartmental }}">
                                    @foreach ($meetingLevel as $key => $value)
                                        @if ($item->meetingLevel == $key)
                                            {{ $value }}
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div data-toggle="tooltip" data-html="true" title="{{ $item->room }}">
                                    {{ $item->time }}
                                </div>
                            </td>
                            <td>{{ $item->name }}</td>

                            @if ($item->isApprove == 1)
                                <td class="text-success">អនុញ្ញាត</td>
                            @elseif ($item->isApprove == 2)
                                <td class="text-danger">បដិសេធ</td>
                            @else
                                <td class="text-primary">រងចាំ...</td>
                            @endif

                            <td class="text-center ">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#exampleModal{{ $item->id }}">
                                    <i class='bx bx-edit-alt'></i>
                                </button>
                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    ការអនុញ្ញាត</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/booking/approve/{{ $item->id }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group row text-muted text-center">
                                                        <label for="description"
                                                            class="form-label col-lg-4 text-info">គោលបំណង:</label>
                                                        <div class="col-lg-8">
                                                            <textarea name="description" id="description" class="form-control" cols="30" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="reject" class="btn btn-danger"
                                                        value="បដិសេធ">
                                                    <input type="submit" name="approve" class="btn btn-primary"
                                                        value="អនុញ្ញាត">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#deleteRecord{{ $item->id }}">
                                    <i class='bx bx-trash'></i>
                                </button>
                                <div class="modal fade" id="deleteRecord{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    លុបការកក់បន្ទប់ប្រជុំ</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="/booking/{{ $item->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input class="btn btn-primarយ btn-sm" type="submit" value="យល់ព្រម">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}

        </div>

        {{-- <div class="card-footer">
            <div class="row">
                @if ($isApproveBooking->hasPages())
                    <div class="d-flex justify-content-between aligh-items-center">

                        @if ($isApproveBooking->onFirstPage())
                            <button class="disabled btn btn-sm btn-light rounded-2 shadow-sm" aria-disabled="true"
                                aria-label="@lang('pagination.previous')">
                                <span aria-hidden="true"><i class='bx bx-chevrons-left'></i>Previous</span>
                            </button>
                        @else
                            <button class="btn btn-sm btn-light rounded-2 shadow-sm">
                                <a href="{{ $isApproveBooking->previousPageUrl() }}" rel="prev"
                                    aria-label="@lang('pagination.previous')"><i class='bx bx-chevrons-left'></i>
                                    Previous</a>
                            </button>
                        @endif


                        @if ($isApproveBooking->hasMorePages())
                            <button class="btn btn-sm btn-light rounded-2 shadow-sm">
                                <a href="{{ $isApproveBooking->nextPageUrl() }}" rel="next"
                                    aria-label="@lang('pagination.next')">Next
                                    <i class='bx bx-chevrons-right'></i></a>
                            </button>
                        @else
                            <button class="disabled btn btn-sm btn-light rounded-2 shadow-sm" aria-disabled="true"
                                aria-label="@lang('pagination.next')">
                                <span aria-hidden="true">Next<i class='bx bx-chevrons-right'></i></span>
                            </button>
                        @endif
                    </div>
                @endif

            </div>
        </div> --}}
    </div>

    <nav class="navbar bg-dark rounded p-2">

        <form action="/booking" action="GET" class="w-100">
            @csrf
            <div class="row d-flex justify-content-between align-items-center">

                <div class="col-lg-2 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-text text-danger" id="basic-addon1">តួនាទី</span>
                        <select class="form-control" name="directedBy" id="directedBy">
                            <option value="">ជ្រើសរើស</option>
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
                        </select>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-text text-danger" id="meetingLevel">កិច្ចប្រជុំ</span>
                        <select class="form-control" name="meetingLevel" id="meetingLevel">
                            <option value="">ជ្រើសរើស</option>
                            @foreach ($meetingLevel as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-12">
                    <div class="input-group">
                        <span class="input-group-text text-danger" id="basic-addon1">បន្ទប់</span>
                        <select class="form-control" name="room" id="basic-addon1">
                            <option value="">ជ្រើសរើស</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-12">
                    <div class="input-group">
                        <span class="input-group-text text-danger" id="basic-addon1">ចាប់ពី</span>
                        <input type="date" name="fromDate" min="{{ now()->subMonths(3)->format('Y-m-d') }}"
                            max="{{ now()->format('Y-m-d') }}" class="form-control" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="col-lg-2 col-sm-12">
                    <div class="input-group">
                        <span class="input-group-text text-danger" id="basic-addon1">ដល់</span>
                        <input type="date" name="toDate" class="form-control" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="col-lg-2 col-sm-12">
                    <div class="d-flex">
                        <input class="btn btn-success text-white rounded" type="submit" value="ស្វែងរក">
                        <a href="/booking/export/excel" class="btn btn-success text-white rounded">ទាញយក</a>
                    </div>
                </div>

            </div>
        </form>

    </nav>

    <div class="row table-responsive mt-20">
        <table class="table table-sm table-bordered">
            <thead class="thead-light">
                <th class="text-center">ល.រ</th>
                <th class="text-center">កាលបរិច្ឆេទ</th>
                <th>ប្រធានបទ</th>
                <th>តួនាទី</th>
                <th>ដឹកនាំដោយ</th>
                <th>ប្រភេទកិច្ចប្រជុំ</th>
                <th>បន្ទប់/ម៉ោង</th>
                <th>ឈ្មោះអ្នកស្នើសុំ</th>
                <th>ស្ថានភាព</th>
                <th class="text-center">សកម្មភាព</th>
            </thead>
            <tbody>
                @foreach ($isApproveBooking as $key => $item)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center">{{ $item->date }}</td>
                        <td>
                            <div data-toggle="tooltip" data-html="true" title="{{ $item->description }}">
                                {{ $item->topicOfMeeting }}
                            </div>
                        </td>
                        <td>{{ $item->directedBy }}</td>
                        <td>{{ $item->nameDirectedBy }}</td>
                        <td>
                            <div data-toggle="tooltip" data-html="true" title="{{ $item->interOfficeOrDepartmental }}">
                                @foreach ($meetingLevel as $key => $value)
                                    @if ($item->meetingLevel == $key)
                                        {{ $value }}
                                    @endif
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <div data-toggle="tooltip" data-html="true" title="{{ $item->room }}">
                                {{ $item->time }}
                            </div>
                        </td>
                        <td>{{ $item->name }}</td>

                        @if ($item->isApprove == 1)
                            <td class="text-success">អនុញ្ញាត</td>
                        @elseif ($item->isApprove == 2)
                            <td class="text-danger">បដិសេធ</td>
                        @else
                            <td class="text-primary">រងចាំ...</td>
                        @endif

                        <td class="text-center ">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#edit{{ $item->id }}">
                                <i class='bx bx-edit-alt'></i>
                            </button>
                            <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                ការអនុញ្ញាត</h5>
                                        </div>
                                        <form action="/booking/approve/{{ $item->id }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group row text-muted text-center">
                                                    <label for="description"
                                                        class="form-label col-lg-4 text-info">គោលបំណង:</label>
                                                    <div class="col-lg-8">
                                                        <textarea name="description" id="description" class="form-control" cols="30" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="reject" class="btn btn-danger rounded"
                                                    value="បដិសេធ">
                                                <input type="submit" name="approve" class="btn btn-primary rounded"
                                                    value="អនុញ្ញាត">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#deleteRecord{{ $item->id }}">
                                {{-- <i class='bx bx-trash'></i> --}}
                                <i class='bx bx-show'></i>
                            </button>
                            <div class="modal fade" id="deleteRecord{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                ព័ត៌មានបន្ថែម</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="phoneNumber">លេខទូរស័ព្ទ</label>
                                                        <input type="text" id="phoneNumber"
                                                            value="{{ $item->phoneNumber }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="email">អ៊ីម៉ែល</label>
                                                        <input type="email" name="email" value="{{ $item->email }}"
                                                            class="form-control" id="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="position">តួនាទី</label>
                                                        <input type="text" name="name" id="position"
                                                            value="{{ $item->position }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="created_at">កាលបរិច្ឆេទស្នើសុំ</label>
                                                        <input type="" name="email"
                                                            value="{{ $item->created_at }}" class="form-control"
                                                            id="created_at">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="font-khmer1 text-danger">ចុចយល់ព្រមដើម្បីលុប</div>
                                            <form action="/booking/{{ $item->id }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input class="btn btn-danger btn-sm rounded" type="submit"
                                                    value="យល់ព្រម">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        {{ $isApproveBooking->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>

    <script>
        //message
        $('#success-alert, #error-alert').fadeIn('slow');
        setTimeout(function() {
            $('#success-alert, #error-alert').fadeOut('slow');
        }, 5000);
    </script>

@endsection
