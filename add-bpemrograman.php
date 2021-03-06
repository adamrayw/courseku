<?php
include "header.php";

if (isset($_POST['tambah'])) {

    // simpan data dari form
    $icon = $_POST['icon'];
    $nama = $_POST['nama'];
    $code = $_POST['code'];

    $addCourse = "INSERT INTO course (logo_course, nama_course, code) VALUES ('$icon', '$nama', '$code')";
    if (mysqli_query($db, $addCourse)) {
        echo "<script>Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Course telah di tambahkan!',
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
                window.location = 'admin-dashboard.php';
            });</script>";
        die();
    } else {
        echo "ERROR";
    }
}

?>

<section class="all-course w-80 my-12 px-2 text-center h-auto mx-auto">
    <div class="text-left bg-white my-6 p-4 max-w-7xl md:w-96 md:p-6 lg:p-8 shadow-xl rounded mx-auto">
        <h2 class="text-2xl font-semibold text-gray-500">Tambah Course</h2>
        <hr class="mt-2 mb-4">
        <ul class="list-decimal y-4">
            <form method="POST">
                <label for="icon" class="text-gray-500">Icon Course<br>
                    <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="icon" placeholder="paste url icon from icons8" required>
                </label>
                <br>
                <label for="nama" class="text-gray-500">Nama Course <br>
                    <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="nama" placeholder="contoh : React JS" required>
                </label>
                <br>
                <label for="code" class="text-gray-500">Code<br>
                    <input class="border w-full mb-4 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition rounded-lg text-sm p-2" type="text" name="code" placeholder="contoh : python" required>
                </label>
                <br>
                <div class="flex justify-center mt-8">
                    <input class="bg-blue-500 hover:bg-blue-700 mr-2 font-semibold text-white px-4 py-2 rounded no-outline focus:shadow-outline select-none cursor-pointer" type="submit" name="tambah" value="Tambah">
                </div>
            </form>

    </div>
</section>