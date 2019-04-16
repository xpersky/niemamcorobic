<?php
function Render_EventMakerPane(){ // thats just static form for making events
  ?>
  <div class="labels">
    <div id="label_first"> 1 </div>
    <div id="label_second"> 2 </div>
    <div id="label_third"> 3 </div>
    <div id="label_all"> <i class="fas fa-check"></i> </div>
  </div>
    <form action="../data/db_makeEvent.php" method="post">
      <div id="L_1" class="event_label">Gdzie?</div>
      <input type="text" name="unique" id="event_place" placeholder="Gdzie?" onfocusout="verifyP(this)" onFocus="geolocate()" required>
      <div id="L_2" class="event_label">Kiedy?</div>
      <input type="text" name="event_date" id="event_date" placeholder="YYYY/MM/DD HH:MM" onfocusout="verifyT(this)" onfocus="clearInput(this)" required>
      <div id="L_3" class="event_label">Warunki</div>
      <div id="event_terms_container">
        <div id="event_terms_inside">
          <input type="text" name="event_term_0" id="term0" placeholder="Warunek" onfocusout="verifyTerms(this)"></div>
        <div id="add_term" onclick="expandEventTerms(this.parentNode)"><i class="fas fa-plus"></i></div>
        <input type="hidden" name="termCount" id="termC" value="1">
      </div>
      <input type="hidden" name="input_place_name" id="inputplace" value="">
      <input type="hidden" name="lat" id="lat" value="">
      <input type="hidden" name="lng" id="lng" value="">
      <input type="reset" name="cancel" id="event_reset" class="event_button" value="Anuluj">
      <input type="submit" name="submit" id="event_submit" class="event_button" value="Dodaj" disabled>
    </form>
  <?php
}
?>
