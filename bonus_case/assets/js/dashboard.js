document.addEventListener("DOMContentLoaded", function () {


  // ! Modal
  // * Cari Tombol Tambah
  var addInstansi = document.getElementById("tambahInstansi");

  // * Tambahkan Event Listener
  addInstansi.addEventListener("click", function () {
    // * Cari Modal
    var addModal = new bootstrap.Modal(document.getElementById("addModal"));
    addModal.show();
  });

  // ! Reset Button
  // * Cari tombol reset
  var resetButton = document.getElementById("resetInstansi");

  // * Tambahkan event listener untuk mengatur tindakan saat tombol "Reset" di dalam modal diklik
  resetButton.addEventListener("click", function () {
    // * Cari nilai-nilai input di dalam form
    document.getElementById("instansiInput").value = "";
    document.getElementById("deskripsiInput").value = "";
  });

  // ! Save Button
  // * Cari tombol simpan
  var saveButton = document.getElementById("saveInstansi");

  // * Tambahkan event listener untuk mengatur tindakan saat tombol "Simpan" di dalam modal diklik
  saveButton.addEventListener("click", function () {
    // * Cari nilai-nilai input di dalam form
    var instansiInput = document.getElementById("instansiInput").value;
    var deskripsiInput = document.getElementById("deskripsiInput").value;

    // * Buat objek FormData dan tambahkan data instansi
    var formData = new FormData();
    formData.append("addInstansi", "true");
    formData.append("instansiInput", instansiInput);
    formData.append("deskripsiInput", deskripsiInput);

    // * Buat objek XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // * Tentukan URL tujuan dan metode HTTP (POST)
    var url = "../dashboard/index.php";
    var method = "POST";

    // * Kirim permintaan HTTP ke server
    xhr.open(method, url, true);
    // * Tambahkan kode berikut di dalam event listener tombol "Simpan"
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Jika permintaan sukses, tampilkan toast (alert) sukses

          var successToast = new bootstrap.Toast(document.getElementById('successToast'));
          successToast.show();
        } else {
          // Jika permintaan gagal, tampilkan toast (alert) error
          var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
          errorToast.show();
        }
      }
    };

    xhr.send(formData);


    // ! Close Modal
    var addModal = bootstrap.Modal.getInstance(document.getElementById("addModal"));
    addModal.hide();
  });


});
