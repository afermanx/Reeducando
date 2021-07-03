@extends('themes.Auth.authLayout')

@section('title', 'Reeducando | Acesso')
 @section('content')

     <!-- Start Login Area -->
     <div class="login-area bg-image" style="background-image: url({{asset('../img/servicos-2.png')}});">
         <div class="d-table">
             <div class="d-table-cell">
                 <div class="login-form">
                     <div class="logo">
                         <div class="swal2-grow-row-6">
                         <img src="{{asset('img/LogoReeducando.png')}}" alt="image" width="40%">

                         </div>
                     </div>
                     <form name="formLogin">
                         @csrf
                         <div class="form-group">
                             <input type="text" class="form-control"  maxlength="14" name="cpf" id="cpf" placeholder="Digite seu cpf">
                             <span class="label-title"><i class='bx bx-user'></i></span>
                         </div>

                         <div class="form-group">
                             <input type="password" class="form-control" name="password" placeholder="Digite sua senha">
                             <span class="label-title"><i class='bx bx-lock'></i></span>
                         </div>

                         <div class="form-group">
                             <div class="remember-forgot">
                                 <label class="checkbox-box">lembrar-me
                                     <input type="checkbox">
                                     <span class="checkmark"></span>
                                 </label>


                             </div>
                         </div>

                         <button type="submit" class="login-btn"><span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> Acessar</button>


                     </form>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Login Area -->
 @endsection

@section('js')
    <script src="{{ asset('/js/plugins/jquery.mask.js') }}"></script>

    <script>
        jQuery(function() {
            $("#cpf").mask("###.###.###-##", {
                reverse: true
            });


        });



        $('form[name="formLogin"]').submit(function (event){
            event.preventDefault();



            let cpf= $("#cpf").val();
            jQuery(function() {
                $("#cpf").mask("###.###.###-##", {
                    reverse: true
                });
            });

            $("#loading").removeClass('d-none');

            if(cpf===""){
                $("#loading").addClass('d-none');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Certifique-se que todos os campos estão preenchidos!',

                })

            }


            $.ajax({
                url:"{{route('Auth.login')}}",
                type:"post",
                data:$(this).serialize(),
                dataType:"json",
                success:function (response){

                    if(response.success===true){


                        window.location.href="{{route('Admin.dash')}}"

                    }else{
                        $("#loading").addClass('d-none');
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

                }


            })
        })

        {{--action="{{route('logar')}}" method="POST"--}}

    </script>



@endsection
