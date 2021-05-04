@extends('themes.Auth.authLayout')

@section('title', 'Reeducando | Acesso')
 @section('content')

     <!-- Start Login Area -->
     <div class="login-area bg-image" style="background-image: url({{asset('../img/servicos-2.png')}});">
         <div class="d-table">
             <div class="d-table-cell">
                 <div class="login-form">
                     <div class="logo">
                         <a href="{{route('Auth.loginForm')}}"><h2>REEDUCANDO</h2></a>
                     </div>
{{--                     <img src="{{asset('img/logo.png')}}" alt="image">--}}
                     <h2>Para acessar o sistema</h2>

                     <form name="formLogin">
                         @csrf
                         <div class="form-group">
                             <input type="text" class="form-control" name="email" placeholder="Digite seu email">
                             <span class="label-title"><i class='bx bx-user'></i></span>
                         </div>

                         <div class="form-group">
                             <input type="password" class="form-control" name="password" placeholder="Digite sua senha">
                             <span class="label-title"><i class='bx bx-lock'></i></span>
                         </div>

                         <div class="form-group">
                             <div class="remember-forgot">
                                 <label class="checkbox-box">Remember me
                                     <input type="checkbox">
                                     <span class="checkmark"></span>
                                 </label>

                                 <a href="forgot-password.html" class="forgot-password">Forgot password?</a>
                             </div>
                         </div>

                         <button type="submit" class="login-btn">Acessar</button>

                         <p class="mb-0">Caso não tenha usuario? <a href="{{route('Auth.registerForm')}}">Click aqui cadastrar</a></p>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Login Area -->
 @endsection

@section('js')
    <script>
        $('form[name="formLogin"]').submit(function (event){
            event.preventDefault();

            $.ajax({
                url:"{{route('Auth.login')}}",
                type:"post",
                data:$(this).serialize(),
                dataType:"json",
                success:function (response){

                    if(response.success===true){

                        window.location.href="{{route('Admin.dash')}}"

                    }else{
                        let timerInterval
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                            footer: '<a href>Ainda não tem cadastro? Clique Aqui!</a>',
                            timer: 4000,
                            didOpen: () => {
                                timerInterval = setInterval(() => {
                                    const content = Swal.getContent()
                                    if (content) {
                                        const b = content.querySelector('b')
                                        if (b) {
                                            b.textContent = Swal.getTimerLeft()
                                        }
                                    }
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {

                            }
                        })
                        // Swal.fire({
                        //     icon: 'error',
                        //     title: 'Oops...',
                        //     text: response.message,
                        //     footer: '<a href>Tente novamente!</a>'
                        // })
                    }
                    console.log(response)
                }


            })
        })

        {{--action="{{route('logar')}}" method="POST"--}}

    </script>



@endsection
