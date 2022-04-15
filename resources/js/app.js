require('./bootstrap');
let Swal = require('sweetalert2')
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.addEventListener('sweetalert',(event)=>{

    Swal.fire({
        icon: event.detail.type,
        title: event.detail.message
    })
})

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
