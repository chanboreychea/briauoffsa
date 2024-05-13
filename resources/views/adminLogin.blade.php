@extends('template.master')

@section('contents')
    <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12 mx-auto">
            <div class="login-register-cover">
                <div class="text-center">
                    <h2 class="mb-2 text-brand-1">ប្រព័ន្ធគ្រប់គ្រងកក់បន្ទប់ប្រជុំ</h2>
                    <p class="font-sm text-muted mb-30">Log in to admin Dashboard</p>
                </div>
                <form class="login-register text-start mt-20" action="/admins/login" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="form-label" for="input-3">អ្នកគ្រប់គ្រង</label>
                                <input class="form-control" id="input-3" type="text" required="" name="username"
                                    placeholder="iauoffsa.gov.kh">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="form-label" for="input-4">លេខសម្ងាត់</label>
                                <input class="form-control" id="input-4" type="password" required="" name="password"
                                    placeholder="************">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default hover-up w-100" type="submit" name="login">ចូលគ្រប់គ្រងប្រព័ន្ធ</button>
                    </div>
                    {{-- <div class="text-muted text-center">Don't have an account? --}}
                        {{-- <a href="/login">Go to User Sing In</a> --}}
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
