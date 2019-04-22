<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Stok Barang</title>
  </head>
  <body>
    <h1>Input Stok Barang</h1>
    <form class="" action="index.php" method="post">
      <table>
        <tr>
          <td>ID</td>
          <td> : </td>
          <td> <input type="number" name="id" value=""> </td>
        </tr>
        <tr>
          <td>Nama Barang</td>
          <td> : </td>
          <td> <input type="text" name="nm_barang" value=""> </td>
        </tr>
        <tr>
          <td>Harga</td>
          <td> : </td>
          <td> <input type="text" name="harga" value=""> </td>
        </tr>
        <tr>
          <td>Jumlah</td>
          <td> : </td>
          <td> <input type="text" name="jumlah" value=""> </td>
        </tr>
        <tr>
          <td> <input type="submit" name="submit" value="submit"> </td>
        </tr>
      </table>
      </form>
      <?php
        $host = "transaksi.database.windows.net";
        $user = "rizkyhaphap";
        $pass = "B3l4tr1x4nn3";
        $db = "transaksi";

        try {
          $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
          $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (Exception $e) {
          echo "Failed : " . $e;
        }

         ?>

  </body>
</html>
