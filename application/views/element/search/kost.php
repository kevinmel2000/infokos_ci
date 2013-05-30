<style type="text/css">
    .right {
        border-radius: 10px;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        background: #5E9901;
        opacity: 0.8;
        padding: 10px;
        margin-bottom: 20px;
        width: 100%;
    }
    ul.fasilitas {
        padding: 0;
    }
    ul.fasilitas li{
        width: 25%;
        padding: 0;
        float: left;
        list-style: none;
    }
    .hidden{
        display: none;
    }
</style>
<script type="text/javascript">
    $('.search-check').live('click',function(){
        $('.hidden').hide();
        if($(this).val() == 'ya'){
            $('.hidden').show();
        }
    });
    
    $('#type-sewa').live('change',function(){
        var option = '<option value="0">Semua Harga Sewa</option>';
        if($(this).val() == 'month'){
            option = option+'<option value="100000-300000">Rp. 100.000 - Rp. 300.000</option>'
                +'<option value="300000-500000">Rp. 300.000 - Rp. 500.000</option>'
                +'<option value="500000">Lebih dari Rp. 500.000</option>';
        }else if($(this).val() == '6 month'){
            option = option+'<option value="1000000-2500000">Rp. 1.000.000 - Rp. 2.500.000</option>'
                +'<option value="2500000-5000000">Rp. 2.500.000 - Rp. 5.000.000</option>'
                +'<option value="5000000">Lebih dari Rp. 5.000.000</option>';
        }else if($(this).val() == 'year'){
            option = option+'<option value="1500000-3000000">Rp. 1.500.000 - Rp. 3.000.000</option>'
                +'<option value="3000000-5000000">Rp. 3.000.000 - Rp. 5.000.000</option>'
                +'<option value="5000000-8000000">Rp. 5.000.000 - Rp. 8.000.000</option>'
                +'<option value="8000000">Lebih dari Rp. 8.000.000</option>';
        }
        $('#harga-sewa').html(option);
    });
</script>
<?php echo form_open('kost/search') ?>
    <table class="right">
        <tr>
            <td width="90px"></td>
            <td><h2>Cari data Kosan : </h2>
                <input type="radio" name="check" class="search-check" value="ya"/>Ya
                <input type="radio" name="check" class="search-check" value="tidak" checked="checked"/>Tidak
            </td>
        </tr>
        <tr class="hidden">
            <td width="90px">Nama Kosan</td>
            <td><input type="text" name="name" class="search"/></td>
        </tr>
        <tr class="hidden">
            <td>Jenis Kamar</td>
            <td>
                <input type="checkbox" name="gender[]" value="M"/>Putra
                <input type="checkbox" name="gender[]" value="F"/>Putri
            </td>
        </tr>
        <tr class="hidden">
            <td>Alamat</td>
            <td><input type="text" name="address" class="search"/></td>
        </tr>
        <tr class="hidden">
            <td>Harga</td>
            <td>
                <select id="type-sewa" name="type">
                    <option value="0">Semua Jenis Sewa</option>
                    <option value="month">Bulanan</option>
                    <option value="6 month">6 Bulanan</option>
                    <option value="year">Tahunan</option>
                </select>
                <select id="harga-sewa" name="price">
                    <option value="0">-- Pilih Harga Sewa --</option>
                </select>
            </td>
        </tr>
        <tr class="hidden">
            <td>Fasilitas</td>
            <td>
                <ul class="fasilitas">
                    <?php
                    foreach ($facilities->result() as $val) {
                        echo '<li><input type="checkbox" name="facilities[]" value="' . $val->id . '"/>';
                        echo '<span>' . $val->name . '</span></li>';
                    }
                    ?>
                </ul>
            </td>
        </tr>
        <tr class="hidden">
            <td></td>
            <td><input type="submit" value="Cari"/></td>
        </tr>
    </table>
<?php echo form_close() ?>