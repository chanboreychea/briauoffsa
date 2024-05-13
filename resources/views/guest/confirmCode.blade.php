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
@endsection

@section('contents')

    <style>
        .wrapper {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: start;
            align-items: center;
        }

        .submit {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 5px;
        }

        .otp-field {
            display: flex;
        }

        .otp-field input {
            width: 50px;
            font-size: 32px;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            margin: 2px;
            border: 2px solid #55525c;
            background: #21232d;
            font-weight: bold;
            color: #fff;
            outline: none;
            transition: all 0.1s;
        }

        .otp-field input:focus {
            border: 2px solid #a527ff;
            box-shadow: 0 0 2px 2px #a527ff6a;
        }

        .disabled {
            opacity: 0.5;
        }

        .space {
            margin-right: 1rem !important;
        }
    </style>

    <div class="wrapper">

        <div class="w-left">
            <div class="d-flex align-items-end"><span>Here is your codes:</span>
                <h4>  {{ $randomNumber }}</h4>
            </div>
            <div id="countdown">
            </div>
            <h2>Enter codes above:</h2>
            <div class="otp-field">
                <input type="text" maxlength="1" />
                <input type="text" maxlength="1" />
                <input class="space" type="text" maxlength="1" />
                <input type="text" maxlength="1" />
                <input type="text" maxlength="1" />
                <input type="text" maxlength="1" />
            </div>
            <div class="submit">
                <a href="/guests" class="btn-dark btn-sm">Back</a>

                <form action="/guests/login" method="GET">
                    <input type="hidden" name="code" id="code">
                    <input type="submit" class="d-none" id="send" value="Send">
                </form>

                <a href="/guests/request" class="btn-dark btn-sm">Resend Code</a>
            </div>
        </div>

    </div>

    <script>
        const inputs = document.querySelectorAll(".otp-field input");
        const send = document.getElementById('send');
        const code = document.getElementById('code');

        inputs.forEach((input, index) => {
            input.dataset.index = index;
            input.addEventListener("keyup", handleOtp);
            input.addEventListener("paste", handleOnPasteOtp);
        });

        function handleOtp(e) {
            /**
             * <input type="text" 👉 maxlength="1" />
             * 👉 NOTE: On mobile devices `maxlength` property isn't supported,
             * So we to write our own logic to make it work. 🙂
             */
            const input = e.target;
            let value = input.value;
            let isValidInput = value.match(/[0-9a-z]/gi);
            input.value = "";
            input.value = isValidInput ? value[0] : "";

            let fieldIndex = input.dataset.index;
            if (fieldIndex < inputs.length - 1 && isValidInput) {
                input.nextElementSibling.focus();
            }

            if (e.key === "Backspace" && fieldIndex > 0) {
                input.previousElementSibling.focus();
            }

            if (fieldIndex == inputs.length - 1 && isValidInput) {
                submit();
            }
        }

        function handleOnPasteOtp(e) {
            const data = e.clipboardData.getData("text");
            const value = data.split("");
            if (value.length === inputs.length) {
                inputs.forEach((input, index) => (input.value = value[index]));
                submit();
            }
        }

        function submit() {
            console.log("Submitting...");
            // 👇 Entered OTP
            let otp = "";
            inputs.forEach((input) => {
                otp += input.value;
                input.disabled = true;
                input.classList.add("disabled");
            });
            console.log(otp);

            code.value = otp;

            send.click();

        }

        // Initial countdown time in seconds
        let countdownTime = 60;
        const countdownElement = document.getElementById('countdown');

        function updateCountdown() {
            countdownTime--;
            countdownElement.innerHTML = countdownTime + ' seconds';
            if (countdownTime <= 0) {
                clearInterval(countdownInterval);
                countdownElement.innerHTML = 'Time is up!';
            }
        }
        const countdownInterval = setInterval(updateCountdown, 1000);
        countdownElement.innerHTML = countdownTime + ' seconds';
    </script>
@endsection
