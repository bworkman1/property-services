<div id="page-content">
	<h2 class="text-danger">Gallery <?php echo $gallery == '' ? '' : '('.ucwords($gallery).')' ; ?></h2>
	<hr>
	<?php

		$numOfCols = 3;
		$count = 0;
		$showGalleryButton = false;


		echo '<div class="row">';

			$gallery = str_replace('-', ' ', $gallery);
			if($gallery && isset($galleries[strtoupper($gallery) ] ) ) { // IF GALLERY IS SET SHOW IMAGES

				foreach($galleries[strtoupper($gallery)] as $i => $image) {
					echo '<div class="col-md-4">';
						echo '<div class="image-container">';
							echo '<a 
								href="' . $image['path'] . '" 
								rel="lightbox" 
								data-lightbox="' . $gallery . '" 
								data-title="'.$image['alt'].'">';

								echo '<img 
									src="' . $image['path'] . '" 
									class="img-fluid image-border image" 
									alt="'.$image['alt'].'">';

								echo '<div class="middle">';
									echo '<h4 class="text">View Image</h4>';
								echo '</div>';

							echo '</a>';
						echo '</div>';
					echo '</div>';
 
					$count++;
    				if($count % $numOfCols == 0) echo '</div><div class="spacer"></div><div class="row">';
				}
				$showGalleryButton = true;

			} else { // IF GALLERY ISN'T SET SHOW GALLERY DIRECTORIES
				foreach($galleries as $name => $gallery) {
					echo '<div class="col-md-4">';
						echo '<div class="image-container">';
							echo '<a href="'.current_url().'/?gallery='.url_title(strtolower($name)).'">';
								echo '<img src="' . $gallery[0]['path'] . '" class="img-fluid image image-border gallery-image">';
							
								echo '<div class="middle gallery-middle">';
									echo '<h4 class="text">' . $name . '</h4>';
								echo '</div>';
							echo '</a>';
						echo '</div>';

						echo '<div class="text-center mobile-gallery-title d-md-none"><h4>'.$name.'</h4></div>';

					echo '</div>';

					$count++;
    				if($count % $numOfCols == 0) echo '</div><div class="spacer"></div><div class="row">';
				}
			}
		echo '</div>';

		echo '<hr>';

		if($showGalleryButton) {
			echo '<div class="spacer"></div>';

			echo '<div class="d-flex">';
				echo '<ul class="gallery-list list-inline mx-auto justify-content-center">';
					foreach($galleries as $name => $gal) {
						echo '<li class="list-inline-item">';
							$activeUrl = strtolower($gallery) == strtolower($name) ? 'active' : '';

							echo '<a href="'.current_url().'/?gallery='.url_title(strtolower($name)).'" class="' . $activeUrl . '">' . ucwords(strtolower($name)) . '</a> / ';
						echo '</li>';
					}
				echo '</ul>';
			echo '</div>';

			echo '<div class="text-center">';
				echo '<a href="'. base_url('gallery') .'" class="btn btn-danger btn-large">Back to Main Gallery</a>';
			echo '</div>';
		}
	?>
</div>
