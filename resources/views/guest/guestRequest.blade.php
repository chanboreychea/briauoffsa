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
                <h5 class="text-light">ការចុះឈ្មោះសំរាប់ធ្វើការកក់បន្ទប់ប្រជុំ</h5>
            </div>
        </div>
        <div class="card-body">
            <form action="/guests/request" method="GET">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlInput1">ជាអក្សរឡាតាំង</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                placeholder="ជាអក្សរឡាតាំង" aria-describedby="nameHelp">
                            @error('name')
                                <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlInput1">តួរនាទី</label>
                            <input type="text" name="position" value="{{ old('position') }}" class="form-control"
                                placeholder="តួរនាទី" aria-describedby="nameHelp">
                            @error('position')
                                <small id="nameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label" for="meetingLevel">កិច្ចប្រជុំ</label>
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
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-dark m-2" href="/">ថយក្រោយ</a>
                        <input type="submit" class="btn btn-primary" value="បន្ត">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
