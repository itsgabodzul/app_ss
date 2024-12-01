function mostrarAlerta() {
    Swal.fire({
        icon: "warning",
        title: "ATENCIÓN",
        text: "El Salon X esta libre considera revisar el clima",
        showConfirmButton: true,
        confirmButtonText: '<a href="bitacorah.php" style="color: white; text-decoration: none;">Ir a Horarios</a>',
        allowOutsideClick: false
    });
}
