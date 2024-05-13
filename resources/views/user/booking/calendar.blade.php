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
@endsection

@section('contents')
    <div class="d-flex justify-content-center align-items-start">
        <h4>{{ $date }}</h4>
    </div>
    <div class="mb-3 mt-3 d-flex justify-content-between align-items-center">

        <div>
            <form action="/calendar" method="GET">
                @csrf
                <input type="hidden" name="previous" value="{{ $month - 1 }}">
                <button type="submit" class="btn btn-sm btn-light rounded-2 shadow-sm"><i
                        class='bx bx-chevrons-left'></i><span>ខែមុន</span></button>
            </form>
        </div>
        <div class="d-flex justify-content-end">
            <form action="/calendar" method="GET">
                @csrf
                <input type="hidden" name="next" value="{{ $month + 1 }}">
                <button type="submit" class="btn btn-sm btn-light rounded-2 shadow-sm"><span>ខែបន្ទាប់</span> <i
                        class='bx bx-chevrons-right'></i></button>
            </form>
        </div>

    </div>
    <div class="row table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th style="text-align: center" class="text-danger">អាទិត្យ</th>
                    <th style="text-align: center">ច័ន្ទ</th>
                    <th style="text-align: center">អង្គារ</th>
                    <th style="text-align: center">ពុធ</th>
                    <th style="text-align: center">
                        <div class="d-none d-sm-block">ព្រហស្បតិ៍</div>
                        <div class="d-block d-sm-none">ព្រ.ហ</div>
                    </th>
                    <th style="text-align: center">សុក្រ</th>
                    <th style="text-align: center">សៅរ៍</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calendar as $week)
                    <tr>
                        @foreach ($week as $key => $day)
                            @if ($key == 0 || $key == 6)
                                <td style="text-align: center" class="text-danger">
                                    {{ $day }}
                                </td>
                            @else
                                <td>
                                    @if ($day == '')
                                    @elseif ($day >= $dday)
                                        <a href="/days/{{ $day }}/{{ $month }}"
                                            class="btn btn-info btn-sm days w-100">
                                            {{ $day }}
                                        </a>
                                    @else
                                        <div style="text-align: center">{{ $day }}</div>
                                    @endif
                                </td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
