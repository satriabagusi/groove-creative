$(document).ready(function(){
    $('select').selectpicker();

    $('.selectpciker').on( 'hide.bs.select', function ( ) {
        $(this).trigger("focusout");
    });

    var clipboard = new ClipboardJS('.btn');

    clipboard.on('success', function(e) {
        $('#tooltips').tooltip('show');
    });
});

$('#nama').on('input', function() {
    $('#nama').removeClass('is-invalid');
});
$('#email').on('input', function() {
    $('#email').removeClass('is-invalid');
});
$('#no_hp').on('input', function() {
    $('#no_hp').removeClass('is-invalid');
});
$('#username').on('input', function() {
    $('#username').removeClass('is-invalid');
});
$('#password').on('input', function() {
    $('#password').removeClass('is-invalid');
});

// $(document).ready(function(){
//     $('#project_leader').change(function(){
//         const project_leader = $('#project_leader option:selected').val();


//         $('#project_employee option').each(function() {
//             if( $(this).val() == project_leader){
//                 $(this).remove();
//             }
//         })
//     })

// })


// $(function(){
//     //Initialize Select2 Elements
//     $('.select2').select2()

//     //Initialize Select2 Elements
//     $('.select2bs4').select2({
//       theme: 'bootstrap4'
//     })
// })

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
