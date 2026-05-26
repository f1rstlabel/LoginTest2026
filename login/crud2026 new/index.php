<?php
session_start();


if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: ../login/index.php");
    exit();
}

// --- INI ANTI-BACK ---

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

$koneksi = mysqli_connect("localhost", "root", "", "datasiswa"); 
$vnama   = "";
$vttl    = "";
$vumur   = "";
$vjk     = "";
$valamat = "";
$vkelas  = "";
$vhobi   = "";
$vcatatan= "";

if (isset($_POST['bsubmit'])) 
    if (empty($_POST['tnama'])) 
{
    // Pengujian apakah data akan diedit atau disimpan baru
    if (isset($_GET['hal']) && $_GET['hal'] == "edit")
    {
        $edit = mysqli_query($koneksi,"UPDATE tabelsiswa SET
                    Nama  ='$_POST[tnama]',
                    TTL   ='$_POST[tttl]',
                    Umur  ='$_POST[tumur]',
                    Jenkel='$_POST[tjk]',
                    Alamat ='$_POST[talamat]',
                    Kelas  ='$_POST[tkelas]',
                    Hobi   ='$_POST[thobi]',
                    Catatan ='$_POST[tcatatan]'
WHERE id='$_GET[id]'
");
        
        if ($edit) 
        {
            echo "<script>
             alert('edit data suksesദ്ദി(˵ •̀ ᴗ - ˵ ) ✧');
             document.location='index.php';
            </script>";
        } 
        else
        { 
            echo "<script>
            alert('edit data gagal🥺');
            document.location='index.php';
            </script>";
        }
    }
    else
    {
        //data akan disimpan baru
        $submit = mysqli_query($koneksi,"INSERT INTO tabelsiswa 
        (Nama, TTL, Umur,Jenkel, Alamat, Kelas, Hobi, Catatan)
        VALUES ('$_POST[tnama]',
        '$_POST[tttl]',
        '$_POST[tumur]',
        '$_POST[tjk]',
        '$_POST[talamat]',
        '$_POST[tkelas]',
        '$_POST[thobi]',
        '$_POST[tcatatan]')
        ");

        if ($submit) 
        {
            echo "<script>
             alert('Simpan data sukses!☺️');
             document.location='index.php';
            </script>";
        } 
        else
        { 
            echo "<script>
            alert('Simpan data gagal🥺');
            document.location='index.php';
            </script>";
        }
    }
}


// Tampilkan Data yang akan diedit
if (isset($_GET['hal']) && $_GET['hal']=="edit")
{
    $tampil = mysqli_query($koneksi,
        "SELECT * FROM tabelsiswa WHERE id ='$_GET[id]'");
    $data = mysqli_fetch_array($tampil);

    if ($data)
    {
        $vid = $data['id'];
        $vnama = $data['Nama'];
        $vttl = $data['TTL'];
        $vumur = $data['Umur'];
        $vjk = $data['Jenkel'];
        $valamat = $data['Alamat'];
        $vkelas = $data['Kelas'];
        $vhobi = $data['Hobi'];
        $vcatatan = $data['Catatan'];
    }
}


// Hapus data
else if (isset($_GET['hal']) && $_GET['hal']=="hapus")
{
    $id = $_GET['id'];

    $hapus = mysqli_query($koneksi,
        "DELETE FROM tabelsiswa WHERE id='$id'");

    if ($hapus)
    {
        echo "<script>
        alert('Data berhasil dihapus😉');
        document.location='index.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<head>

    <title>TAMBAH DATA MAHASISWA</title>
    <head>
    <title>Form Mahasiswa</title>
    <script>
   
    if (window.performance && window.performance.navigation.type === 2) {
        location.reload(true);
    }
</script>

<!--bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<style> .card{ background:#fff7fa;}</style> 
</head> <style>
    body{
        background:#ffeef5;
        }
        </style>
        <div style="background: rgba(255, 133, 162, 0.8); padding: 10px 20px; display: flex; justify-content: space-between; align-items: center; border-radius: 0 0 15px 15px; margin-bottom: 20px;">
    <span style="color: white; font-weight: bold;">Data Mahasiswa</span>
    <a href="logout.php" onclick="return confirm('Yakin ingin keluar?')" style="background: #d63384; color: white; padding: 5px 15px; text-decoration: none; border-radius: 8px; font-size: 14px; font-weight: bold;">
        Log Out
    </a>
</div>
<body>
<div class="container mt-5">
    <h1 class="text-center" style="color:#d63384;">˚.🎀𓍢ִ໋🌷͙༘֒⋆TAMBAH DATA MAHASISWA𓍢ִ໋🌷͙֒˚.🎀༘⋆ </h1>
<!-- awal card -->
  <div class="card mt-3"> 
  <div class="card-header text-white" style="background:#ff85a2;">

       FORM INPUT DATA MAHASISWA
  </div>
  <div class="card-body mt-3">
    <form method = "post" action ="">

 <div class="form-group">
            <label><b>Nama</b></label>
            <input type= "text" name= "tnama" value="<?= $vnama ?? '' ?>" class = "form-control" placeholder="input nama anda disini">

 <div class="form-group">
            <label><b>TTL</b></label>
            <input type= "text" name= "tttl"  value="<?= $vttl ?? '' ?>" class = "form-control" placeholder="input Tempat Tanggal Lahir anda disini">

         <div class="form-group">
            <label><b>Umur</b></label>
            <input type= "text" name= "tumur" value="<?= $vumur ?? '' ?>" class = "form-control" placeholder="input umur anda disini">

 <div class="form-group">
            <label><b>Jenis_Kelamin</b></label>
            <select class="form-control" name= "tjk">
                <option value="selected disabled">input jenis kelamin anda disini</option>
                <option value ="<?= $vjk?>"> </option>
                <option value="laki laki">laki laki</option>
                <option value="perempuan">perempuan</option>
                <option value ="tidak keduanya">tidak keduanya</option>
</select>
 <div class="form-group">
            <label><b>Alamat</b></label>
            <textarea class= "form-control" name= "talamat" placeholder="input alamat anda disini"><?= $valamat ?? '' ?></textarea>

 <div class="form-group">
    <label><b>Kelas</b></label>
    <select class="form-control" name="tkelas">

        <option value="" disabled selected>input kelas anda disini</option>

        <option value="pemrograman-1" <?= $vkelas=="pemrograman-1" ? "selected" : "" ?>>pemrograman 1</option>

        <option value="pemrograman-2" <?= $vkelas=="pemrograman-2" ? "selected" : "" ?>>pemrograman 2</option>

        <option value="pemrograman-3" <?= $vkelas=="pemrograman-3" ? "selected" : "" ?>>pemrograman 3</option>

        <option value="pemrograman-4" <?= $vkelas=="pemrograman-4" ? "selected" : "" ?>>pemrograman 4</option>

        <option value="pemrograman-5" <?= $vkelas=="pemrograman-5" ? "selected" : "" ?>>pemrograman 5</option>

    </select>
</div>
 <div class="form-group">
            <label><b>Hobi</b></label>
            <input type= "text" name= "thobi" class = "form-control"  placeholder="input Hobi anda disini" value="<?= $vhobi ?? '' ?>">
            
 <div class="form-group">
            <label><b>Catatan:</b></label>
            <textarea 
            name=tcatatan 
            class="form-control" 
            rows="4" cols="30" 
            placeholder="isi catatan jika perlu"><?= $vcatatan ?? '' ?></textarea>

        <br>
            
            <button type="submit" class="btn btn-success" name="bsubmit">submit</button>
            <button type="reset" class="btn btn-danger" name="breset">reset</button>

</div>
    </form>
</div>
     <!--akhir dari card -->

      <!--awal tabelnya -->
  <div class="card mt-3">
  <div class="card-header text-white" style="background:#ff85a2;" >

        DATA MAHASISWA
  </div>
  <div class="card-body"> 

<table class="table table-bordered table-striped table-pink">
    <tr>
    <th>no</th>
    <th>Nama</th>
    <th>TTL</th>
    <th>Umur</th>
    <th>Jenis Kelamin</th>
    <th>Alamat</th>
    <th>Kelas</th>
    <th>Hobi</th>
    <th>Catatan</th>
    <th>Aksi<th>
    </tr>

    
    <?php
    $no=1;

    $tampil=mysqli_query($koneksi,"select * from tabelsiswa order by Nama desc");
            while($data= mysqli_fetch_array($tampil)):

    ?>
         <tr>
            <td><?=$data['id']?></td>   
            <td><?=$data['Nama']?></td>
            <td><?= $data['TTL']?></td>
            <td><?= $data['Umur'] ?></td>
            <td><?= $data['Jenkel'] ?></td>
            <td><?= $data ['Alamat'] ?></td>
            <td><?= $data['Kelas'] ?></td>
            <td><?= $data ['Hobi'] ?>
            <td><?= $data ['Catatan'] ?></td>

            
                <td nowrap>
                    <!-- button edit hapus -->
                          <a href="index.php?hal=edit&id=<?= $data['id']; ?>" 
                          class="btn btn-warning btn-sm"
                          onclick="return confirm ('yakin mau edit data yang ini?🤨')">edit</a>

                          <a href="index.php?hal=hapus&id=<?= $data['id']; ?>" 
                          class="btn btn-danger btn-sm"
                          onclick="return confirm('Yakin mau kamu hapus?😏')">Hapus</a>

            
                </td>
           
         </tr>
        <?php endwhile; ?>
            </body>