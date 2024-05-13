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

        <a class="btn btn-default" href="/guests">ស្នើរសុំកក់បន្ទប់ប្រជុំ</a>

    </div>
@endsection

@section('contents')

    <div class="d-flex justify-content-center mb-20">
        <div class="text-primary" style="font-family: khmer mef2;font-size: 24px">ព័ត៌មានអំពីកិច្ចប្រជុំ
        </div>
    </div>

    <div class="row table-responsive mt-5">
        <table class="table table-bordered">
            <thead class="thead-light">
                <th class="text-center">ល.រ</th>
                <th class="text-center">កាលបរិច្ឆេទ</th>
                <th class="text-center">ប្រធានបទ</th>
                <th class="text-center">ដឹកនាំដោយ</th>
                <th class="text-center">ឈ្មោះអ្នកដឹកនាំ</th>
                <th class="text-center">កម្រិតប្រជុំ</th>
                <th class="text-center">ម៉ោង</th>
                <th class="text-center">ឈ្មោះអ្នកកក់</th>
                <th class="text-center">ការស្នើរ</th>
            </thead>
            <tbody>
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
                        </td>
                        @if ($item->isApprove == 1)
                            <td class="text-center text-success">អនុញ្ញាត</td>
                        @elseif ($item->isApprove == 2)
                            <td class="text-center text-danger">បដិសេធ</td>
                        @else
                            <td class="text-center text-primary">រងចាំ...</td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        @if ($booking->hasPages())
            <div class="d-flex justify-content-between aligh-items-center">
                {{-- Previous Page Link --}}
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

                {{-- Next Page Link --}}
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

    </div>

@endsection
