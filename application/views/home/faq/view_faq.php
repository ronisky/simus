<div class="row">
    <div class="col-md-12 mx-auto">
        <h4 class="card-title">Pertanyaan yang Sering Ditanyakan</h4>
        <div class="row">
            <div class="col-sm-10">
                <?php
                $no = 1;
                foreach ($faq as $f) {
                ?>
                    <div class="card my-2 bold" data-toggle="collapse" data-target="#collapseExample<?= $no ?>">
                        <?= $f['pertanyaan']; ?><i class="fas fa-chevron-down ml-2"></i>
                    </div>
                    <div class="collapse" id="collapseExample<?= $no ?>">
                        <div class="card card-body">
                            <?= $f['jawaban']; ?>
                        </div>
                    </div>
                <?php
                    $no++;
                }
                ?>
            </div>
            <div class="col-sm-10 my-5">
                <h4>Punya pertanyaan lain?</h4>
                <div class="col-sm-8">

                    <?= $this->session->flashdata('message') ?>
                </div>
                <form action="<?= base_url('page/kirimfaq') ?>" method="post">
                    <div class="row">
                        <div class="form-group col-sm-4 mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Email">
                        </div>
                        <div class="form-group col-sm-4 mt-3">
                            <label for="nama">Nama lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group col-sm-8">
                            <label for="pertanyaan">Pertanyaan</label>
                            <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="3" required placeholder="Pertanyaan"></textarea>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Kirim Pertanyaan</button>
                </form>
            </div>
        </div>
    </div>
</div>