<div class="container" id="prodi">
  <div class="card">
    <div class="card-body">Daftar Program Studi Universitas Yapis Papua</div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode</th>
        <th scope="col">Program Studi</th>
        <th scope="col">Fakultas</th>
        <th scope="col">Akreditasi</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      <?php $i = 1 ?>
      <?php foreach($data as $row) : ?>
        <tr>
          <td><?php echo($i++) ?></td>
          <td><?php echo($row['kode_prodi']) ?></td>
          <td><?php echo($row['prodi']) ?></td>
          <td><?php echo($row['fakultas']) ?></td>
          <td><?php echo($row['akreditasi']) ?></td>
        </tr> 
      <?php endforeach; ?>   
    </tbody>
  </table>
</div>
  


  




 <script>

    window.onload = function() {
        var scroll = document.getElementById("prodi");
        scroll.scrollIntoView({ behavior: 'smooth'});
    };
</script>

</body>
</html>
