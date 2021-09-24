<!-- modal update -->
<?php
foreach ($profile as $pr) {
?>
    <div class="example-modal">
        <div id="update<?php echo $pr->id; ?>" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Edit Data User </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="user" method="post" action="<?= base_url('C_profile/update') ?>">

                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="mx-auto" style="width: 200px;">
                                    <img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/undraw_profile.svg">
                                </div>
                                <span class="font-weight-bold"><?php echo $pr->name ?></span>
                                <span class="text-black-50"><?php echo $pr->email ?></span>
                            </div>

                            </br>

                            <input type="hidden" class="form-control" name="id" value="<?php echo $pr->id; ?>">
                            <div class="row g-3">
                                <div class="col-md">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $pr->name; ?>">
                                    <?= form_error('name', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            </br>

                            <div class="row g-3">
                                <div class="col-md">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $pr->email; ?>">
                                    <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            </br>

                            <div class="row g-3">
                                <div class="col-md">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $pr->password; ?>">
                                    <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            </br>

                            <div class="row g-3">
                                <div class="col-md">
                                    <label for="exampleFormControlSelect1">Hak Akses</label>
                                    <select class="form-control" id="role_id" name="role_id">
                                        <?php
                                        $user_role;
                                        foreach ($user_role as $ur) {
                                        ?>
                                            <?php if ($ur->role_id == $pr->role_id) : ?>
                                                <option value="<?php echo $ur->role_id ?>" selected><?php echo $ur->role ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $ur->role_id ?>"><?php echo $ur->role ?></option>
                                            <?php endif; ?>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            </br>

                            <div class="modal-footer">
                                <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                <button tye="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- modal update close -->