@extends('template.master')

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

@section('header-right')
    <div class="block-signin">
        <!-- <a class="text-link-bd-btom hover-up" href="page-register.html">Register</a> -->

        <a class="btn btn-primary rounded-3 shadow-sm" href="/guests">ស្នើសុំកក់បន្ទប់ប្រជុំ</a>

    </div>
@endsection

@section('contents')
    <div class="d-flex justify-content-center mb-20">
        <div class="" style="font-family: khmer mef2;font-size: 24px;color:#012E89">ព័ត៌មានអំពីកិច្ចប្រជុំ
        </div>
    </div>

    <div class="row table-responsive mt-5">
        <table class="table table-bordered table-hover">
            {{-- table-striped --}}
            <thead class="thead">
                <th style="width: 2%" class="text-center bg-info text-light">ល.រ</th>
                <th style="width: 8%" class="text-center bg-info text-light">កាលបរិច្ឆេទ</th>
                <th style="width: 20%" class="text-center bg-info text-light">ប្រធានបទ</th>
                <th style="width: 10%" class="text-center bg-info text-light">តួនាទី</th>
                <th style="width: 10%" class="text-center bg-info text-light">ដឹកនាំដោយ</th>
                <th style="width: 20%" class="text-center bg-info text-light">ប្រភេទកិច្ចប្រជុំ</th>
                <th style="width: 6%" class="text-center bg-info text-light">បន្ទប់/ម៉ោង</th>
                <th style="width: 10%" class="text-center bg-info text-light">ឈ្មោះអ្នកស្នើសុំ</th>
                <th style="width: 4%" class="text-center bg-info text-light">ស្ថានភាព</th>
            </thead>
            <tbody>
                @foreach ($booking as $key => $item)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center">{{ $item->date }}</td>
                        <td class="">
                            <div data-toggle="tooltip" data-html="true" title="{{ $item->description }}">
                                {{ $item->topicOfMeeting }}
                            </div>
                        </td>
                        <td class="">{{ $item->directedBy }}</td>
                        <td class="">{{ $item->nameDirectedBy }}</td>
                        <td class="">
                            @if ($item->meetingLevel == 9)
                                @php
                                    $regulatorName = '';
                                    foreach ($regulator as $key => $value) {
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
                        <td class="">
                            <div data-toggle="tooltip" data-html="true" title="{{ $item->room }}">
                                <div class="times">{{ $item->time }}</div>
                            </div>
                        </td>
                        <td class="">{{ $item->name }}</td>
                        </td>
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
                            <td class="text-center text-primary">រងចាំ...</td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="row">
        @if ($booking->hasPages())
            <div class="d-flex justify-content-between aligh-items-center">
                @if ($booking->onFirstPage())
                    <button class="disabled btn btn-sm btn-light rounded-2 shadow-sm" aria-disabled="true"
                        aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true"><i class='bx bx-chevrons-left'></i>Previous</span>
                    </button>
                @else
                    <button class="btn btn-sm btn-light rounded-2 shadow-sm">
                        <a href="{{ $booking->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i
                                class='bx bx-chevrons-left'></i>
                            Previous</a>
                    </button>
                @endif
                @if ($booking->hasMorePages())
                    <button class="btn btn-sm btn-light rounded-2 shadow-sm">
                        <a href="{{ $booking->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next
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

    </div> --}}

    <div class="d-flex justify-content-center align-items-center">
        {{ $booking->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>

    <script>
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
