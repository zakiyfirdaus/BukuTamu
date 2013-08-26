
<!--menampilkan judul-->
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <strong>Pengisian Buku Tamu</strong>

    </div>
</div>

<div style="font-size: small">
    <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" role="form" method="post" action="addguestbook.php" id="form-bukutamu">
                <!--form pengisian data buku tamu-->
                <div class="form-group" >
                    <!--form input nama-->
                    <label for="nama" class="col-md-1 control-label" >Nama</label>
                    <div id="input-nama">
                        <div class="col-md-9" id="">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <!--form input email-->
                    <label for="email" class="col-md-1 control-label">Email</label>
                    <div id="input-email">
                        <div class="col-md-9">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <!--form input pesan-->
                    <label for="pesan" class="col-md-1 control-label">Pesan</label>
                    <div id="input-pesan">
                        <div class="col-md-9">
                            <textarea class="form-control" name="pesan" cols="40" rows="3" id="pesan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <!--tombol submit-->
                    <div class="col-md-offset-1 col-md-9">
                        <button type="submit" name="Submit" value="Submit" class="btn btn-primary" id="kirim">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
