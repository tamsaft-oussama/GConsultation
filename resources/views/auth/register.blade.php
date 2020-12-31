@extends('layouts.form-auth')

@section('title')
    Register
@endsection

@section('form')
    <form class="login100-form" method="POST" action="{{ route('register') }}" id="registerForm">
        @csrf
        <x-jet-validation-errors class="mb-4" />
        <div id="firstAuth">
            <span class="login100-form-title">
                S'inscrire
            </span>
            <div class="wrap-input100">
                <x-jet-input id="name" class="block mt-1 w-full input100" type="text" name="name" :value="old('name')" placeholder="Surnom" required autofocus autocomplete="name" />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="email" class="block mt-1 w-full input100" type="email" name="email" placeholder="Email" :value="old('email')" required />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="tel" class="block mt-1 w-full input100" type="tel" name="tel" placeholder="Téléphone Ex:'0600660066'" :value="old('tel')" maxlength="10" required />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="password" class="block mt-1 w-full input100" type="password" name="password" placeholder="Mot de passe" required autocomplete="current-password" />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="adresse" class="block mt-1 w-full input100" type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required autocomplete="new-password" />
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
                <x-jet-input id="nom" class="block mt-1 w-full input100" type="text" name="nom" placeholder="Nom"  :value="old('nom')" required autofocus autocomplete="nom" />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="prenom" class="block mt-1 w-full input100" type="text" name="prenom" placeholder="Prenom"  :value="old('prenom')" required />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="ville" class="block mt-1 w-full input100" type="text" name="ville" placeholder="Ville" required autocomplete="current-ville" />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-city" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100">
                <x-jet-input id="adresse" class="block mt-1 w-full input100" type="text" name="adresse" placeholder="Aadresse"  required autocomplete="adresse" />
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
            <a class="txt2" href="{{ route('login') }}">
                Vous avez déjà un compte?
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>

    </form>

    <div id="thirdAuth" class="d-none">
        <div class="login100-form">
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
                <a class="login100-form-btn" id="validate">
                    Valider
                </a>
            </div>

        </div>
        
        <div class="text-center p-5">
            <a class="txt2" id="rsendCode" style="color: red;cursor: pointer;">
                      Renvoyer le code
            </a>
        </div>
    </div>
    

@endsection

@section('js')
    <script>
        $(document).ready(function(){
            var validation = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
            $('#suivant').click(function(){
                $('#firstAuth').addClass('d-none');
                $('#secondAuth').removeClass('d-none');
            })
            $('#retour').click(function(){
                $('#secondAuth').addClass('d-none');
                $('#firstAuth').removeClass('d-none');
            })

            $('#sendCodeVerify').click(function(){
                console.log($("#tel").val());
                console.log(validation);
                $.ajax({
                    url:'http://127.0.0.1:8000/user/send-sms',
                    type:"post",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        code:validation,
                        phone:$("#tel").val()
                    },
                    success:function(res){
                        $('#registerForm').addClass('d-none');
                        $('#thirdAuth').removeClass('d-none');
                        // codeV = res;
                        // console.log(codeV)

                    },
                    error:function(err){
                        console.log(err)
                    }
                })
            });
            $('#rsendCode').click(function(){
                console.log($("#tel").val());
                console.log(validation);
                $.ajax({
                    url:'http://127.0.0.1:8000/user/send-sms',
                    type:"post",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        code:validation,
                        phone:$("#tel").val()
                    },
                    success:function(res){
                        $('#registerForm').addClass('d-none');
                        $('#thirdAuth').removeClass('d-none');
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
                if(inputVal == validation){
                    $("#registerForm").submit();
                }

            });

        })
    </script>
@endsection
