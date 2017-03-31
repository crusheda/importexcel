<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="dist/semantic.min.css">
<link rel="icon" href="foto/home.ico" type="image/x-icon">
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous">

</script>
<script src="dist/semantic.min.js"></script>
  <!-- Standard Meta -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<!-- Site Properties -->
<title>Import Data</title>

<link rel="stylesheet" type="text/css" href="dist/components/reset.css">
<link rel="stylesheet" type="text/css" href="dist/components/site.css">

<link rel="stylesheet" type="text/css" href="dist/components/container.css">
<link rel="stylesheet" type="text/css" href="dist/components/grid.css">
<link rel="stylesheet" type="text/css" href="dist/components/header.css">
<link rel="stylesheet" type="text/css" href="dist/components/image.css">
<link rel="stylesheet" type="text/css" href="dist/components/menu.css">

<link rel="stylesheet" type="text/css" href="dist/components/divider.css">
<link rel="stylesheet" type="text/css" href="dist/components/list.css">
<link rel="stylesheet" type="text/css" href="dist/components/segment.css">
<link rel="stylesheet" type="text/css" href="dist/components/dropdown.css">
<link rel="stylesheet" type="text/css" href="dist/components/icon.css">

<script type="dist/semantic.min.js">$('.autumn.leaf').transition('fade');
</script>
</head>
<body style="background-color: #78536A;font-family: 'Roboto'">
<div class="ui container" style="margin-top: 15px">
  <div class="ui stackable menu" style="background-color: #E8A0CF">
    <a class="item" style="font-size: 18px;color: white">Home</a>
  </div>
  

  <center>
  <form name="myForm" id="myForm" onSubmit="return validateForm()" action="import.php" method="post" enctype="multipart/form-data">
    <center><h3><p style="color: white;font-family: 'Roboto'">Mengimpor data dari M.S Excel(multi sheet) ke dalam Database</p></h3></center>
    <div class="ui inverted pink button">
      <input type="file" id="inputdata" name="inputdata" style="color: white"></input>
    </div>

    <!-- Jika ingin menambahkan fungsi untuk menghapus data terlebih dahulu sebelum mengimpor
    <br>
    
    <div class="ui checkbox">
      <input type="checkbox" name="drop" value="1" >
        <label style="color: white">
          Kosongkan tabel terlebih dahulu
        </label>
    </div>
    -->

    <br><br>
      <input type="submit" name="submit" class="ui pink toggle button" value="Impor">
    </div>
    </center>
  </div>
  <div class="ui container segment align bottom" style="background-color: #E8A0CF;color: white">
    <center><p>- 15650019 -</p></center>
  </div>
</form>

<script type="text/javascript">
  //  validasi form (hanya file .xls yang diijinkan)
  function validateForm()
  {
    function hasExtension(inputID, exts) {
        var fileName = document.getElementById(inputID).value;
        return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
    }

    if(!hasExtension('inputdata', ['.xls'])){
        alert("Hanya file XLS (Excel 2003) yang diijinkan.");
        return false;
    }
  }
</script>
</body>
</html>