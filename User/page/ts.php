<div class="container pt-3">
    <h4><i class="bi bi-card-image"></i> Tourist Spot</h4>
    <div class="tourist-spot-container container d-flex flex-wrap">
        <?php
        $getTouristSpot = $db->getTouristSpot();
        while ($ts = $getTouristSpot->fetch_assoc()) {
            $getImage = $db->getSMEsImages($ts['SPOT_ID']);
            if ($getImage->num_rows > 0) {
                $img = $getImage->fetch_assoc();
                $spotDisplayImg = '../backend/SMEsImg/' . $img['FILE_NAME'];
            } else {
                $spotDisplayImg = '../assets/system-img/logo.png';
            }
        ?>
            <button class="btnSpotContainer btn" data-id="<?= $ts['SPOT_ID'] ?>">
                <img src="<?= $spotDisplayImg ?>">
                <hr>
                <div>
                    <h6><?= $ts['SPOT_NAME'] ?></h6>
                    <p>
                        Entrance Fee: <span class="text-success"><?= ($ts['FEE'] > 0) ? $ts['FEE'] : 'Free' ?></span>
                    </p>
                </div>
            </button>
        <?php
        }
        ?>
    </div>
</div>