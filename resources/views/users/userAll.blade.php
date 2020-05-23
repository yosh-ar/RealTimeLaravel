@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                   
                    <ul id="users">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    window.axios.get('/api/users')
        .then((response)=>{
            const listadoUl = document.getElementById('users');
            let users = response.data;

            users.forEach((user, index) => {
                let elemtn = document.createElement('li');

                elemtn.setAttribute('id', user.id);

                elemtn.innerText = user.name;

                listadoUl.appendChild(elemtn);
            });
        });
    
</script>

<script>
    Echo.channel('users')
    .listen('UserCreated', (e)=>{
        // console.log(e);

        const listadoUl = document.getElementById('users');
    
        let elemtn = document.createElement('li');

        elemtn.setAttribute('id', e.user.id);

        elemtn.innerText = e.user.name;

        listadoUl.appendChild(elemtn);
    });

</script>

@endpush