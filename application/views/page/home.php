<div class="featured">
    <div>
        <ul>
            <li><img src="<?php echo base_url() ?>webroot/images/home-1.jpg" alt=""/></li>
            <li><img src="<?php echo base_url() ?>webroot/images/home-2.jpg" alt=""/></li>		
        </ul>		
        <div class="section">
            <div>
                <img src="<?php echo base_url() ?>webroot/images/home-465x420.jpg" alt=""/>
            </div>	
        </div>
    </div>
</div>
<div class="home">
    <span class="heading"><a>Info Kost On-line</a></span>
    <div>
        <ul class="home-list">
            <?php foreach ($kost as $item) { ?>
                <li>
                    <img src="
                    <?php
                    if (!empty($item->location)) {
                        echo base_url().'webroot/images/small_' . $item->location;
                    } else {
                        echo base_url().'webroot/images/na-135x135.jpg';
                    }
                    ?>
                         " alt="<?php echo $item->name ?>"/>
                    <a href="<?php echo site_url('kost/detail/'.$item->id) ?>">
                        <span>
                            <b><?php echo $item->name ?></b><br/>
                            <?php echo $item->address ?><br/>
                            No. Handphone <?php echo $item->phone ?><br/>
                            <?php
                            if ($item->male > 0 || $item->female > 0) {
                                echo 'Kosan';
                                if ($item->male > 0)
                                    echo ' Putra';
                                if ($item->female > 0)
                                    echo ' Putri';
                            }
                            if (!empty($item->max_price))
                                echo '<br/>Harga Rp. ' . number_format($item->max_price, 2, ',', '.') . '/' . $item->room_type
                                ?>
                        </span>
                    </a>
                </li>                
            <?php } ?>
        </ul>
        <h4><?php echo anchor('kost', 'Lihat Semua Kost') ?></h4>
        <div style="clear:both"></div>
    </div>
</div>
