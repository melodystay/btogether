<section class="hero-section">
	<div class="pana-accordion" id="accordion">
        <div class="pana-accordion-wrap">
        <?php
            include_once("./connect.php");
            $query = "SELECT * FROM `events`, `category`, `artists` WHERE `events`.`category_id` = `category`.`id` AND `events`.`singer` = `artists`.`id` ORDER BY `date` DESC Limit 0,5;";
            $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_assoc($result)) {
        ?>              
            <div class="pana-accordion-item set-bg" data-setbg="img/<?=$row['poster']?>">
                <div class="pa-text">
                    <div class="pa-tag"><?=$row['name']?></div>
                    <h2><?=$row['title'];?></h2>
                    <div class="pa-author">
                        <img src="img/<?=$row['img']?>">
                        <h4><?=$row['artist']?></h4>
                    </div>
                </div>
            </div>            
            <?php
                }
            ?>	
	    </div>
	</div>
	<div class="hero-slider-warp">
		<div class="hero-slider owl-carousel">
        <?php
            while($row = mysqli_fetch_assoc($result)) {
        ?>
		    <div class="hero-item set-bg" data-setbg="img/<?=$row['poster']?>">
				<div class="pa-text">
					<div class="pa-tag"><?=$row['name']?></div>
					<h2><?=$row[`title`]?></h2>
					<div class="pa-author">
						<img src="img/<?=$row['img']?>">
						<h4><?=$row['artist']?></h4>
					</div>
				</div>
			</div>
        <?php
            }
        ?>
		</div>
	</div>
</section>