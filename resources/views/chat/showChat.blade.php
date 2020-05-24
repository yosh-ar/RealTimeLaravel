@extends('layouts.app')
@push('styles')
<style>

</style>
@endpush
@section('chat')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chat</div>
                
                <div class="card-body">
                    <div class="row p-2">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-12 border rounded-lg p-3">
                                    <ul
                                    id="messages"
                                    class="list-unstyled overflow-auto"
                                    style="height:  45vh"
                                    >
                   
                                    </ul>
                                </div>
                            </div>
                            <form action="">
                                <div class="row py-3">
                                    <div class="col-10">
                                        <input type="text" id="message" class="form-control">
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" id="send" class="btn btn-primary btn-block">
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-2">
                            <p><strong>Online now</strong></p>
                            <ul id="users" class="list-unstyled overflow-auto text-info " style="height: 45vh">
                          
                            </ul>
                        </div>
                    </div>

            
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // const UsersElement = document.getElementById('users');
    const listadoUl = document.getElementById('users');
    const listadoMensajes = document.getElementById('messages');
    Echo.join('chat')
        .here((users)=>{
            users.forEach((user, index) => {
                let elemtn = document.createElement('li');

                elemtn.setAttribute('id', user.id);

                elemtn.innerText = user.name;

                listadoUl.appendChild(elemtn);
            });
        }).joining((user)=>{
            let elemtn = document.createElement('li');

            elemtn.setAttribute('id', user.id);

            elemtn.innerText = user.name;

            listadoUl.appendChild(elemtn);

        }).leaving((user)=>{
            let elemtn = document.getElementById(user.id);
            elemtn.parentNode.removeChild(elemtn);

        }).listen('SendMessage', (e)=>{
                let elemtn = document.createElement('li');

                elemtn.setAttribute('id', e.user.id);

                elemtn.innerText = e.user.name +': ' + e.message;

                listadoMensajes.appendChild(elemtn);
        });
</script>

<script>
    let  botonEnvio = document.getElementById('send');
    let  inputMensage = document.getElementById('message');

    botonEnvio.addEventListener('click', (e)=>{
        e.preventDefault();

        window.axios.post('/chat/envio', {
            message: inputMensage.value
        })
        inputMensage.value = '';
    }); 
</script>
    
@endpush