require('./bootstrap');

// Echo.channel('notifications') //notifications es el nombre del canal 
Echo.private('notifications') //notifications es el nombre del canal en este caso el canal es privado
    .listen('UserSessionChange', (e) => { //userSession es el nombre del evento
        const notificacion = document.getElementById('notification');

        notificacion.innerHTML = e.message;

        notificacion.classList.remove('invisible');
        notificacion.classList.remove('alert-success');
        notificacion.classList.remove('alert-danger');

        notificacion.classList.add(`alert-${e.type}`);
    })