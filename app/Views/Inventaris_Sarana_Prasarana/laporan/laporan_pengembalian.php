<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-transform: capitalize;
    }

    .container {
      max-width: 8000px;
      margin: 0 auto;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header img {
      width: 100%;
      height: auto;
    }

    .table-container {
      margin-top: 20px;
    }

    table {
      width: 100%; 
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    td:nth-child(2) {
      text-align: center;
      text-transform: capitalize;
    }

    td:nth-child(4) {
      text-align: center;
      text-transform: capitalize;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Laporan Pengembalian Barang</h1>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Username</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Stok Peminjaman</th>
            <th class="text-center">Tanggal peminjaman</th>
            <th class="text-center">Tanggal pengembalian</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($data as $dataa) {
            if ($dataa->status == 'Barang Telah Diterima') { ?>
              <tr>
                <td class="text-capitalize text-center"><?php echo $dataa->tanggal_laporan?></td>
                <td class="text-capitalize text-center"><?php echo $dataa->username?></td>
                <td class="text-center text-capitalize text-dark text-success"><?php echo $dataa->nama_barang?></td>
                <td class="text-center text-capitalize text-dark text-success"><?php echo $dataa->stok?></td>
                <td class="text-capitalize text-center"><?php echo $dataa->tanggal_pp?></td>
                <td class="text-capitalize text-center"><?php echo $dataa->tanggal_pengembalian?></td>
              </tr>
            <?php }
          }?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    window.print();
  </script>
</body>
</html>
