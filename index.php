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

        if (isset($_POST['submit'])) {
          try {
            $id = $_POST['id'];
            $nm_barang = $_POST['nm_barang'];
            $harga = $_POST['harga'];
            $jumlah = $_POST['jumlah'];
            $tgl_masuk = date("Y-m-d");

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

        try {
          $sql_select = "SELECT * FROM barang";
          $query = $conn->query($sql_select);
          $data = $query->fetchAll();
          if (count($data)) > 0  {
            ?>
            <h2>Data Stok Barang</h2>
            <table>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Tanggal Masuk</th>
              </tr>

              <?php foreach ($data as $data ): ?>
                <tr>
                  <td><?php echo $data['id'] ?></td>
                  <td><?php echo $data['nm_barang'] ?></td>
                  <td><?php echo $data['harga'] ?></td>
                  <td><?php echo $data['jumlah'] ?></td>
                  <td><?php echo $data['tgl_masuk'] ?></td>
                </tr>
              <?php endforeach; ?>
            </table>

          <?php
         }
          catch(Exception $e) {
            echo "Failed: " . $e;
          } ?>

  </body>
</html>
