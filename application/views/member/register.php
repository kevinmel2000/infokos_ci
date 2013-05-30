<div class="contact" style="width: 700px;margin: 0 auto;">
    <h1>Edit Data Profile User</h1>
    <p class="message"><?php echo $this->session->flashdata('message'); ?></p>
    <div class="content-table">
        <?php echo form_open_multipart('member/register'); ?>
        <table>
            <tr>
                <th width="220px">Nama <span class="red">*</span></th>
                <td>
                    <input type="text" name="name" size="40" value="<?php echo set_value('name') ?>"/>
                    <?php echo form_error('name', '<p class="field_error">', '</p>'); ?>
                </td>
            </tr>
            <tr>
                <th>No. KTP <span class="red">*</span></th>
                <td>
                    <input type="text" name="ktp" size="40" value="<?php echo set_value('ktp') ?>"/>
                    <?php echo form_error('ktp', '<p class="field_error">', '</p>'); ?>
                </td>
            </tr>
            <tr>
                <th>Email <span class="red">*</span></th>
                <td>
                    <input type="text" name="email" size="40" value="<?php echo set_value('email') ?>"/>
                    <?php echo form_error('email', '<p class="field_error">', '</p>'); ?>
                </td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>
                    <textarea name="address" rows="3" cols="56"><?php echo set_value('address') ?></textarea>
                    <?php echo form_error('address', '<p class="field_error">', '</p>'); ?>
                </td>
            </tr>
            <tr>
                <th>Jenis Kelamin <span class="red">*</span></th>
                <td>
                    <?php
                    echo form_radio(array(
                        'name' => 'gender',
                        'id' => 'male',
                        'value' => 'M',
                    ));
                    echo 'Laki - laki';
                    echo form_radio(array(
                        'name' => 'gender',
                        'id' => 'F',
                        'value' => 'accept',
                    ));
                    echo 'Perempuan';
                    ?>
                    <?php echo form_error('gender', '<p class="field_error">', '</p>'); ?>
                </td>
            </tr>
            <tr>
                <th>No. Handphone <span class="red">*</span></th>
                <td>
                    <input type="text" name="phone" size="40" value="<?php echo set_value('phone') ?>"/>
                    <?php echo form_error('phone', '<p class="field_error">', '</p>'); ?>
                </td>
            </tr>
            <tr>
                <th>Kampus</th>
                <td>
                    <input type="text" name="campus" size="40" value="<?php echo set_value('campus') ?>"/>
                    <?php echo form_error('campus', '<p class="field_error">', '</p>'); ?>
                </td>
            </tr>
            <tr>
                <th>Password <span class="red">*</span></th>
                <td>
                    <input type="password" name="password" size="40" value="<?php echo set_value('password') ?>"/>
                    <?php echo form_error('password', '<p class="field_error">', '</p>'); ?>
                </td>
            </tr>
            <tr>
                <th>Konfirmasi Password <span class="red">*</span></th>
                <td>
                    <input type="password" name="conf_password" size="40" value="<?php echo set_value('conf_password') ?>"/>
                    <?php echo form_error('conf_password', '<p class="field_error">', '</p>'); ?>
                </td>
            </tr>
            <tr>
                <th><label for="photo">Foto</label></th>
                <td>
                    <input type="file" name="photo" id="photo" size="40" value="<?php echo set_value('photo') ?>"/>
                    <?php echo form_error('photo', '<p class="field_error">', '</p>'); ?>
                </td>
            </tr>
            <tr>
                <th>&nbsp;</th>
                <th align="center"><input type="submit" value="Simpan"/></th>
            </tr>
        </table>
        <?php echo form_close() ?>
    </div>
</div>