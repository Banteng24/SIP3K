{{-- <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pegawai</title>
  <script>
    // Data dummy
    const dataPegawai = {
      "1987654321": { nama: "Sinta Dewi", jabatan: "Analis Kepegawaian", unit: "BKPSDM" },
      "1976543210": { nama: "Budi Hartono", jabatan: "Staf Umum", unit: "Setda" }
    };

    function cariNIP() {
      const nip = document.getElementById("nip").value;
      const data = dataPegawai[nip];
      if (data) {
        document.getElementById("nama").value = data.nama;
        document.getElementById("jabatan").value = data.jabatan;
        document.getElementById("unit").value = data.unit;
      } else {
        alert("Data tidak ditemukan!");
      }
    }
  </script>
</head>
<body>
  <h2>Form Pegawai</h2>
  <label>NIP: <input type="text" id="nip" oninput="cariNIP()"></label><br>
  <label>Nama: <input type="text" id="nama" readonly></label><br>
  <label>Jabatan: <input type="text" id="jabatan" readonly></label><br>
  <label>Unit: <input type="text" id="unit" readonly></label><br>
</body>
</html> --}}
