<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Verification | Smart E-Learning</title>
    <link rel="shortcut icon" href="{{ asset('images/Components/Favicon.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <style>
        body {
            background: linear-gradient(135deg, #090014 0%, #1A0B2E 50%, #4C1D95 100%);
        }

        .otp-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: clamp(0.3rem, 2%, 0.75rem);
            width: 100%;
        }
        .otp-input {
            aspect-ratio: 4/5;          
            width: 100%;                
            min-width: 0;               
            border: 1.5px solid #e5e7eb;
            border-radius: 0.75rem;
            background: #f9fafb;
            text-align: center;
            font-weight: 700;
            color: #090014;
            outline: none;
            font-size: clamp(1rem, 4cqi, 1.6rem); 
            transition: border-color .15s, background .15s;
        }
        .otp-input:focus {
            border-color: rgba(76, 29, 149, 0.5);
            background: #ffffff;
        }
        .container-type-inline { container-type: inline-size; }
        
        @supports not (font-size: 1cqi) {
            .otp-input { font-size: clamp(1rem, 5vw, 1.6rem); }
        }
    </style>
</head>
<body class="w-screen h-screen overflow-hidden font-sans">

    {{-- MOBILE --}}
    <div class="flex md:hidden w-full h-full items-center justify-center p-4">

        <div class="w-full max-w-[420px] flex flex-col rounded-3xl overflow-hidden shadow-2xl
                    border-[1.5px] border-white/40"
             style="max-height: calc(100dvh - 2rem)">

            {{-- Header (glass, matches login/register page) --}}
            <div class="bg-[#CECBF6]/6 backdrop-blur-sm flex flex-col items-center justify-center text-white
                        py-[clamp(1rem,3.5dvh,1.75rem)] px-6 shrink-0 gap-1
                        border-b-[1.5px] border-b-[#CECBF6]/15">
                <img src="{{ asset('images/Components/Logo.png') }}" alt="Logo"
                     class="object-contain mb-1 drop-shadow-lg"
                     style="width:clamp(48px,7dvh,72px); height:clamp(48px,7dvh,72px)">
                <h1 class="font-bold leading-tight m-0 tracking-wide"
                    style="font-size:clamp(1.1rem,3dvh,1.6rem)">Smart E-Learning</h1>

                <div class="w-14 h-[3px] bg-[#CECBF6] rounded-full my-1"></div>
                <p class="font-semibold m-0 text-[#CECBF6]/65 tracking-wide"
                   style="font-size:clamp(0.6rem,1.5dvh,0.75rem)">Review Smarter, Quiz Better.</p>
            </div>

            <div class="bg-white flex flex-col justify-center rounded-b-3xl
                        px-[clamp(1.25rem,5vw,2rem)] py-[clamp(1rem,3dvh,1.75rem)]">

                <h4 class="font-bold m-0 text-[#090014] tracking-wide text-center"
                    style="font-size:clamp(0.95rem,2.3dvh,1.2rem)">ACCOUNT VERIFICATION</h4>

                <p class="text-gray-500 mt-1.5 text-center leading-snug px-2
                          mb-[clamp(0.5rem,1.5dvh,1rem)]"
                   style="font-size:clamp(0.62rem,1.4dvh,0.75rem)">
                    Your OTP code has been sent to <b class="text-gray-700">{{$email}}</b>.
                    Enter the OTP code to verify your account.
                </p>

                <form action="/verify_otp" method="POST" class="flex flex-col gap-[clamp(0.75rem,2dvh,1.25rem)]">

                    @csrf
                    {{-- OTP inputs --}}
                    
                    <div class="otp-grid container-type-inline my-2">
                    
                        <input type="text" maxlength="1" name="otp1" class="otp-input" inputmode="numeric" pattern="[0-9]*">
                        <input type="text" maxlength="1" name="otp2" class="otp-input" inputmode="numeric" pattern="[0-9]*">
                        <input type="text" maxlength="1" name="otp3" class="otp-input" inputmode="numeric" pattern="[0-9]*">
                        <input type="text" maxlength="1" name="otp4" class="otp-input" inputmode="numeric" pattern="[0-9]*">
                        <input type="text" maxlength="1" name="otp5" class="otp-input" inputmode="numeric" pattern="[0-9]*">
                        <input type="text" maxlength="1" name="otp6" class="otp-input" inputmode="numeric" pattern="[0-9]*">
                    
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            class="w-full bg-[#4C1D95] hover:bg-[#4C1D95]/85 text-white font-bold
                                   rounded-full cursor-pointer shadow-md hover:shadow-lg
                                   transition-all duration-200 tracking-wide"
                            style="height:clamp(42px,6.5dvh,54px); font-size:clamp(0.85rem,2dvh,1rem)">
                        Verify Account
                    </button>

                    {{-- Resend --}}
                    <div class="flex justify-center items-center gap-1.5
                                pb-[clamp(0.1rem,0.5dvh,0.3rem)]"
                         style="font-size:clamp(0.65rem,1.5dvh,0.78rem)">
                        <span class="text-gray-500">Didn't receive a code?</span>
                        <a href="#" class="text-[#4C1D95] font-semibold hover:underline">Resend Code</a>
                    </div>

                </form>
            </div>
        </div>
    </div>


    {{-- ══════════════════════════════════════ --}}
    {{-- DESKTOP  (hidden below md)             --}}
    {{-- ══════════════════════════════════════ --}}
    <div class="hidden md:flex w-full h-full">

        {{-- Left panel --}}
        <div class="w-1/2 h-full flex flex-col items-center justify-center text-white px-8 gap-3">
            <img src="{{ asset('images/Components/Logo.png') }}" alt="Logo"
                 class="object-contain drop-shadow-2xl"
                 style="width:clamp(100px,13vw,190px); height:clamp(90px,11vw,170px)">

            <div class="text-center">
                <h1 class="font-bold m-0 leading-none tracking-wide"
                    style="font-size:clamp(1.5rem,4vw,3rem)">Smart E-Learning</h1>
            </div>

            <div class="bg-[#CECBF6] rounded-full"
                 style="width:clamp(60px,7vw,110px); height:4px"></div>

            <div class="text-center">
                <h5 class="font-semibold m-0 leading-none text-[#CECBF6]/65"
                    style="font-size:clamp(0.8rem,1.4vw,1.15rem)">Review Smarter, Quiz Better.</h5>
                <h6 class="font-medium m-0 mt-2 leading-none text-gray-400"
                    style="font-size:clamp(0.65rem,0.9vw,0.8rem)">Nueva Vizcaya State University</h6>
            </div>
        </div>

        {{-- Right panel --}}
        <div class="w-1/2 h-full flex items-center justify-start px-8 lg:px-16 overflow-y-auto py-8">

            <form action="/verify_otp" method="POST"
                  class="w-full max-w-[460px] bg-white border-[1.5px] border-white/40 rounded-3xl shadow-2xl
                         flex flex-col px-[clamp(1.5rem,3vw,2.5rem)] py-[clamp(1.25rem,4vh,2.5rem)] my-auto">
                @csrf
                <h4 class="font-bold m-0 text-[#090014] tracking-wide text-center"
                    style="font-size:clamp(1.2rem,2.2vw,1.50rem)">ACCOUNT VERIFICATION</h4>
                <p class="text-gray-500 mt-1.5 mb-[clamp(1rem,3vh,2rem)] text-sm text-center px-4 leading-relaxed">
                    Your OTP code has been sent to <b class="text-gray-700">{{$email}}</b>.
                    Enter the OTP code to verify your account.
                </p>

                @if($errors->has('otp'))
                    <div class="text-red-500 text-xs text-center mb-2 font-semibold">
                        {{ $errors->first('otp') }}
                    </div>
                @elseif($errors->has('expired_otp'))
                    <div class="text-red-500 text-xs text-center mb-2 font-semibold">
                        {{ $errors->first('expired_otp') }}
                    </div>
                @endif

                {{-- OTP --}}
                <div class="otp-grid container-type-inline my-6">
                    
                    <input type="text" maxlength="1" name="otp1" class="otp-input" inputmode="numeric" pattern="[0-9]*">
                    <input type="text" maxlength="1" name="otp2" class="otp-input" inputmode="numeric" pattern="[0-9]*">
                    <input type="text" maxlength="1" name="otp3" class="otp-input" inputmode="numeric" pattern="[0-9]*">
                    <input type="text" maxlength="1" name="otp4" class="otp-input" inputmode="numeric" pattern="[0-9]*">
                    <input type="text" maxlength="1" name="otp5" class="otp-input" inputmode="numeric" pattern="[0-9]*">
                    <input type="text" maxlength="1" name="otp6" class="otp-input" inputmode="numeric" pattern="[0-9]*">
                   
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full bg-[#4C1D95] hover:bg-[#4C1D95]/85 text-white font-bold
                               rounded-full cursor-pointer shadow-md hover:shadow-xl
                               tracking-wide transition-all duration-200"
                        style="height:clamp(46px,5.5vh,58px); font-size:clamp(0.95rem,1.5vw,1.15rem)">
                    Verify Account
                </button>

                {{-- Resend --}}
                <div class="flex justify-center items-center gap-2 text-sm
                            mt-[clamp(0.75rem,2vh,1.25rem)]">
                    <span class="text-gray-500">Didn't receive a code?</span>
                    
                    <span id="resend_otp" class="text-[#4C1D95] font-semibold hover:underline cursor-pointer">Resend Code</span>
                </div>

            </form>
        </div>
    </div>


    {{-- @include('Hidden_Forms.Resend_OTP') --}}
    @vite(['resources/js/Auth.js'])

    
</body>
</html>