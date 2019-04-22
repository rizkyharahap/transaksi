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
          <td> <input type="number" name="harga" value=""> </td>
        </tr>
        <tr>
          <td>Jumlah</td>
          <td> : </td>
          <td> <input type="number" name="jumlah" value=""> </td>
        </tr>
        <tr>
          <td>Tanggal Masuk</td>
          <td> : </td>
          <td> <input type="date" name="tgl_masuk" value=""> </td>
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

        if (isset($_POST['submit'])) {
          try {
            $id = $_POST['id'];
            $nm_barang = $_POST['nm_barang'];
            $harga = $_POST['harga'];
            $jumlah = $_POST['jumlah'];
            $tgl_masuk = $_POST['tgl_masuk'];

            $sql_insert = "INSERT INTO barang (id, nm_barang, harga, jumlah, date) VALUES (?,?,?,?,?)";

            $query = $conn->prepare($sql_insert);
            $query->bindValue(1,$id);
            $query->bindValue(2,$nm_barang);
            $query->bindValue(3,$harga);
            $query->bindValue(4,$jumlah);
            $query->bindValue(5,$tgl_masuk);
            $query->execute();

          } catch (Exception $e) {
            echo "Failed : " . $e;
          }

          echo "<h3>Data telah dimasukan</h3>";
        }

s
      ?>

  </body>
</html>
