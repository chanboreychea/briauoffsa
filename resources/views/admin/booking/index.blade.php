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

    <form action="/booking" action="GET" class="container p-0">
        @csrf
        <div class="row d-flex align-items-center border rounded-3 mt-2 pt-2">

            <div class="col-lg-2 col-sm-12 mb-3">
                <label class="form-label text-danger" id="basic-addon1">តួនាទី:</label>
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

            <div class="col-lg-2 col-sm-12 mb-3">
                <label class="form-label text-danger" id="meetingLevel">កិច្ចប្រជុំ:</label>
                <select class="form-control" name="meetingLevel" id="meetingLevel">
                    <option value="">ជ្រើសរើស</option>
                    @foreach ($meetingLevel as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-2 col-sm-12 mb-3">
                <label class="form-label text-danger" id="basic-addon1">បន្ទប់:</label>
                <select class="form-control" name="room" id="basic-addon1">
                    <option value="">ជ្រើសរើស</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>
            </div>

            <div class="col-lg-2 col-sm-12 mb-3">
                <label class="form-label text-danger" id="basic-addon1">ចាប់ពី:</label>
                <input type="date" name="fromDate" min="{{ now()->subMonths(3)->format('Y-m-d') }}"
                    max="{{ now()->format('Y-m-d') }}" class="form-control" aria-describedby="basic-addon1">
            </div>

            <div class="col-lg-2 col-sm-12 mb-3">
                <label class="form-label text-danger" id="basic-addon1">ដល់:</label>
                <input type="date" name="toDate" class="form-control" aria-describedby="basic-addon1">
            </div>

            <div class="col-lg-2 col-md-12 col-sm-12  mb-3">
                <label class="form-label text-danger" for="search">ជម្រើស:</label>
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle rounded w-100" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        មុខងារ
                    </button>
                    <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                        <input class="dropdown-item" type="submit" value="ស្វែងរក">
                        <a href="/booking/export/excel" class="dropdown-item">ទាញយក</a>
                    </div>
                </div>
                {{-- <div id="search" class="d-flex justify-content-between gap-1">
                    <input class="btn btn-success text-white rounded" type="submit" value="ស្វែងរក">
                    <a href="/booking/export/excel" class="btn btn-success text-white rounded">ទាញយក</a>
                </div> --}}

            </div>

        </div>
    </form>

    <div class="row table-responsive mt-20">
        <table class="table table-sm table-bordered">
            <thead class="thead-light">
                <th style="width: 2%" class="text-center">ល.រ</th>
                <th style="width: 7%" class="text-center">កាលបរិច្ឆេទ</th>
                <th>ប្រធានបទ</th>
                <th>តួនាទី</th>
                <th>ដឹកនាំដោយ</th>
                <th>ប្រភេទកិច្ចប្រជុំ</th>
                <th>បន្ទប់/ម៉ោង</th>
                <th>ឈ្មោះអ្នកស្នើសុំ</th>
                <th>ស្ថានភាព</th>
                <th style="width: 8%" class="text-center">សកម្មភាព</th>
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
                            @if ($item->meetingLevel == 9)
                                @php
                                    $regulatorName = '';
                                    foreach ($regulators as $key => $value) {
                                        if ($item->regulator == $key) {
                                            $regulatorName = $value;
                                        }
                                    }
                                @endphp
                                <div data-toggle="tooltip" data-html="true" title="{{ $regulatorName }}">
                                    @foreach ($meetingLevel as $key => $value)
                                        @if ($item->meetingLevel == $key)
                                            {{ $value }}
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <div data-toggle="tooltip" data-html="true" title="{{ $item->interOfficeOrDepartmental }}">
                                    @foreach ($meetingLevel as $key => $value)
                                        @if ($item->meetingLevel == $key)
                                            {{ $value }}
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </td>
                        <td>
                            <div data-toggle="tooltip" data-html="true" title="{{ $item->room }}">
                                <div class="times">{{ $item->time }}</div>
                            </div>
                        </td>
                        <td>{{ $item->name }}</td>

                        @if ($item->isApprove == 1)
                            <td class="text-center text-success">
                                <div data-toggle="tooltip" data-html="true" title="{{ $item->bookingReason }}">
                                    អនុញ្ញាត
                                </div>
                            </td>
                        @elseif ($item->isApprove == 2)
                            <td class="text-center text-danger">
                                <div data-toggle="tooltip" data-html="true" title="{{ $item->bookingReason }}">
                                    បដិសេធ
                                </div>
                            </td>
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
                                                    <label for="bookingReason"
                                                        class="form-label col-lg-4 text-info">បរិយាយ:</label>
                                                    <div class="col-lg-8">
                                                        <textarea name="bookingReason" id="bookingReason" class="form-control" cols="30" rows="3">{{ $item->bookingReason }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="reject"
                                                    class="btn btn-danger btn-sm rounded" value="បដិសេធ">
                                                <input type="submit" name="approve"
                                                    class="btn btn-primary btn-sm rounded" value="អនុញ្ញាត">
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
                                                        <label class="form-label" for="phoneNumber">លេខទូរស័ព្ទ</label>
                                                        <input type="text" id="phoneNumber"
                                                            value="{{ $item->phoneNumber }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="email">អ៊ីម៉ែល</label>
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

        var times = document.querySelectorAll('.times');
        times.forEach(element => {
            var timeValue = element.textContent || element.innerText;
            element.textContent = mergeTimeRanges(timeValue);
            // console.log(mergeTimeRanges(timeValue));
        });

        function mergeTimeRanges(inputString) {
            // Split the input string into individual ranges
            const ranges = inputString.split(', ');

            // Parse the ranges into objects with prefix, start, and end times
            const parsedRanges = ranges.map(range => {
                const [prefix, time] = range.split(' ');
                const [start, end] = time.split('-').map(Number);
                return {
                    prefix,
                    start,
                    end
                };
            });

            // Sort the ranges by start time
            parsedRanges.sort((a, b) => a.start - b.start);

            // Merge the ranges
            const mergedRanges = [];
            let currentRange = parsedRanges[0];

            for (let i = 1; i < parsedRanges.length; i++) {
                const nextRange = parsedRanges[i];

                // Check if the current range overlaps or is consecutive with the next range
                if (currentRange.end >= nextRange.start) {
                    // Merge the ranges by extending the end time
                    currentRange.end = Math.max(currentRange.end, nextRange.end);
                } else {
                    // Push the current range to the merged ranges and start a new range
                    mergedRanges.push(currentRange);
                    currentRange = nextRange;
                }
            }

            // Push the last range
            mergedRanges.push(currentRange);

            // Format the merged ranges back into the desired output format
            const result = mergedRanges.map(range => `${range.prefix} ${range.start}-${range.end}`).join(', ');
            return result;
        }
    </script>

@endsection
