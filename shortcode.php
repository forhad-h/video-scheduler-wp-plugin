<?php
add_shortcode('sals-video', 'sals_video_shortcode');
function sals_video_shortcode($attr) {
  extract(shortcode_atts(array(
    'main_video_url' => plugin_dir_url(__FILE__).'video/tears-of-steel-battle-clip-medium.mp4',
    'main_video_poster' => plugin_dir_url(__FILE__).'img/poster.jpg',
    'video_start_time' => "2562721120",
    'video_placeholder' => "Coming soon...",
    'video_info' => 'Some Info. about this video',
    'control_playpause' => 'off',
    'control_sound' => 'off',
    'control_volume' => 'off',
    'control_live' => 'off',
    'control_fullscreen' => 'off',
    'ad_video_urls' => plugin_dir_url(__FILE__).'video/movie.mp4',
    'ad_start_times' => 3,
  ), $attr));

  $ad_video_urls_arr = explode(',', $ad_video_urls);
  $ad_start_times_arr = explode(',', $ad_start_times);
  ob_start();
  if($video_start_time <= time()) :
?>
  <figure class="sals_videoContainer" data-fullscreen="false">
    <div class="sals_video_loading"></div>
    <div class="sals_unmute_btn">Click to play sound</div>
    <div class="sals_video_main">
      <video class="sals_video" controls preload="metadata" data-videostart="<?= $video_start_time; ?>" poster="<?= $main_video_poster;?> ">
        <source src="<?= $main_video_url; ?>" type="video/mp4">
      </video>
      <div class="sals_ads" style="display:none">
        <?php
          for($i=0; $i < count($ad_video_urls_arr); $i++ ) {

        ?>

          <div class="sals__single_ad" data-adstart="<?= $ad_start_times_arr[$i]; ?>" data-addisplayed="false" style="display:none">
            <video class="sals__video_ad">
              <source src="<?= $ad_video_urls_arr[$i]; ?>" type="video/mp4">
            </video>
            <button class="sals__skip_btn" type="button">Skip in 5s</button>
          </div>

        <?php } ?>

      </div>
      <div class="sals_video-controls" data-state="hidden">
        <button class="sals_playpause" type="button" data-state="play"
        style="display: <?= $control_playpause === 'on' ? 'block' : 'none';?>">
        Play/Pause</button>
        <button class="sals_volume" type="button">
          <span class="sals_volume__icon" data-state="muted"
          style="display: <?= $control_sound === 'on' ? 'block' : 'none';?>"></span>
          <span class="sals_volume__controller"
          style="display: <?= $control_volume === 'on' ? 'block' : 'none';?>">
            <span class="sals_volume__pointer"></span>
          </span>
        </button>
        <button class="sals_fs" type="button" data-state="go-fullscreen"
        style="display: <?= $control_live === 'on' ? 'block' : 'none';?>">Fullscreen</button>
        <div class="sals_live_now"
        style="display: <?= $control_fullscreen === 'on' ? 'block' : 'none';?>">Live</div>
      </div>
    </div>
  </figure>
  <p class="sals_video_info"><?= $video_info; ?></p>
<?php else : ?>
  <div class="sals_video_placeholder">
    <img src="<?= plugin_dir_url( __FILE__ );?>/img/video.png" />
    <h2><?= $video_placeholder; ?></h2>
  </div>
<?php
  endif;
  return ob_get_clean();
}
 ?>
