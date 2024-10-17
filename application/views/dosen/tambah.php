<div class="container">
     <div class="row mt-5">
          <div class="col-md-5">
          <div class="card">
               <div class="card-header">
               Form Tambah Data Dosen
               </div>
               <div class="card-body">
                    <form action=""method="post">
               <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip">
                    <small class="form-text text-danger" ><?= form_error('nip')?></small>
               </div>
               <div class="form-group">
                    <label for="namadosen">Nama Dosen</label>
                    <input type="text" class="form-control" id="namadosen" name="namadosen">
                    <small class="form-text text-danger" ><?= form_error('namadosen')?></small>
               </div>
               <button type="submit" name="tambah" class="btn btn-primary float-end">Tambah</button>
               </form>
          </div>
     </div>
</div>