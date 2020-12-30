@extends('layouts.form-auth')

@section('title')
    Register
@endsection

@section('form')
    <form class="login100-form" method="POST" action="{{ route('register') }}" id="registerForm">
        @csrf

        <div id="firstAuth">
            <span class="login100-form-title">
                S'inscrire
            </span>
            <div class="wrap-input100">
                <x-jet-input id="name" class="block mt-1 w-full input100" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="email" class="block mt-1 w-full input100" type="email" name="email" :value="old('email')" required />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="tel" class="block mt-1 w-full input100" type="tel" name="tel" :value="old('tel')" required />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="password" class="block mt-1 w-full input100" type="password" name="password" required autocomplete="current-password" />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="adresse" class="block mt-1 w-full input100" type="password" name="password_confirmation" required autocomplete="new-password" />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn" id="suivant">
                    Suivant
                </button>
            </div>

        </div>

        <div id="secondAuth" class="d-none">
            <span class="login100-form-title">
                S'inscrire
            </span>
            <div class="wrap-input100">
                <x-jet-input id="nom" class="block mt-1 w-full input100" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="nom" />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="prenom" class="block mt-1 w-full input100" type="text" name="prenom" :value="old('prenom')" required />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="ville" class="block mt-1 w-full input100" type="text" name="ville" required autocomplete="current-ville" />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-city" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="adresse" class="block mt-1 w-full input100" type="text" name="adresse" required autocomplete="adresse" />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                </span>
            </div>

            <div class="container-login100-form-btn">
                <a class="login100-form-btn" id='sendCodeVerify'>
                    Enregistrer
                </a>
            </div>
            <div class="container-login100-form-btn">
                <a class="login100-form-btn" id="retour">
                    Retour
                </a>
            </div>
        </div>


        {{-- <div class="text-center p-t-12">
            <span class="txt1">
                Forgot
            </span>
            <a class="txt2" href="#">
                Username / Password?
            </a>
        </div> --}}

        <div class="text-center p-t-136">
            <a class="txt2" href="{{ route('register') }}">
                Create your Account
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>
    </form>

    <div id="thirdAuth" class="d-none">
        <form class="login100-form">
            <span class="login100-form-title">
                Entrez le numéro qui sera envoyé sur votre téléphone
            </span>
            <div class="wrap-input100">
                <x-jet-input  class="block mt-1 w-full input100" type="text" name="code"  id="codeConfirm" />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </span>
            </div>
            <div class="container-login100-form-btn">
                <button class="login100-form-btn" id="validate">
                    Valider
                </button>
            </div>

        </form>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function(){
            codeV = 0;
            $('#suivant').click(function(){
                $('#firstAuth').addClass('d-none');
                $('#secondAuth').removeClass('d-none');
            })
            $('#retour').click(function(){
                $('#secondAuth').addClass('d-none');
                $('#firstAuth').removeClass('d-none');
            })

            $('#sendCodeVerify').click(function(){
                $.ajax({
                    url:'http://127.0.0.1:8000/user/send-sms',
                    type:"post",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        code:Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000
                    },
                    success:function(res){
                        $('#firstAuth').addClass('d-none');
                        $('#secondAuth').addClass('d-none');
                        $('#thirdAuth').removeClass('d-none');
                        localStorage.setItem('axcvwtzsas',res);
                        // codeV = res;
                        // console.log(codeV)

                    },
                    error:function(err){
                        console.log(err)
                    }
                })
            });

            $('#validate').click(function(){
                inputVal = $("#codeConfirm").val();
                // console.log('code :'+codeV);
                // console.log('code confirmation :'+$("#codeConfirm").val());
                if(inputVal == localStorage.getItem('axcvwtzsas')){
                    $("#registerForm").submit();
                }

            });

        })
    </script>
@endsection
