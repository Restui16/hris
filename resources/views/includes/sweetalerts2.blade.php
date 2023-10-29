@if ($errors->any())
<script>
    var errorMessages = @json($errors->all()); // Mengambil semua pesan kesalahan dari variabel Blade $errors

    var errorMessage = '';
    errorMessages.forEach(function(message) {
        errorMessage += message + '<br>'; // Menggabungkan semua pesan kesalahan
    });

    Swal.fire({
        toast: true,
        title: 'Opps!',
        html: errorMessage, // Menggunakan teks HTML untuk menampilkan semua pesan kesalahan
        icon: 'error',
        position: 'top-end',
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 5000
    });
</script>
@endif

@if (session()->has('success'))
<script>
    Swal.fire({
        toast: true,
        title : 'Yeay!',
        text : '{{ session('success') }}',
        icon : 'success',
        position : 'top-end',
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 5000
    });
</script>
@endif

<script>
    function confirmDelete(e){
            let id = e.getAttribute('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'Delete',
                            url: '/departements/' + id,
                            dataType: "json",
                            success:function(response){
                                Swal.fire({
                                    toast: true,
                                    title : 'Yeay!',
                                    text : response.message,
                                    icon : 'success',
                                    position : 'top-end',
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    timer: 1000
                                }).then((result) => {
                                    window.location.href = '/departements';
                                })
                            },
                            error: function(xhr, ajaxOptions, thrownError){
                                alert(xhr. status + "\n" + xhr.responseText + "\n" + thrownError);
                            }
                        });
                    }
                })
        }
</script>