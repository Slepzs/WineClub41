<?php session_start(); ?>
<?php include('loops.php'); ?>
<?php include('includes/header.php'); ?>








<div class="uk-width-1-1" uk-grid>



  <div class="uk-width-1-3">
    <div class="leftside">
      <h3>Information</h3>
      <p>Be sure to add all the necessary information..</p>
    </div>
  </div>

  <div class="uk-width-1-3">

    <form>
  <fieldset class="uk-fieldset">

      <legend class="uk-legend">Today's Wine</legend>
      <hr>

<div class="uk-grid-small" uk-grid>

   <div class="uk-width-1-2@s">
       <input class="uk-input" type="text" placeholder="Wine Name">
   </div>

   <div class="uk-width-1-2@s">
       <input class="uk-input" type="text" placeholder="Wine Country and Region">
   </div>
   <div class="uk-width-1-2@s">
    <input class="uk-input" type="text" placeholder="Wine Grape(s)">
  </div>
  <div class="uk-width-1-2@s">
    <input class="uk-input" type="text" placeholder="Wine Year">
  </div>

  <div class="uk-width-1-2@s">
    <input class="uk-input" type="text" placeholder="Volume %">
</div>

  <div class="uk-width-1-2@s">

       <div class="selectdropdown" uk-form-custom="target: > * > span:first-child">
           <select>
               <option value="">Please select...</option>
               <option value="1">Option 01</option>
               <option value="2">Option 02</option>
               <option value="3">Option 03</option>
               <option value="4">Option 04</option>
           </select>
           <button class="uk-button uk-button-default" type="button" tabindex="-1">
               <span></span>
               <span uk-icon="icon: chevron-down"></span>
           </button>
       </div>

   </div>

   <div class="uk-width-1-2@s">
     <input class="uk-input" type="text" placeholder="Price">
 </div>

 <div class="uk-width-1-2@s">
   <input class="uk-input" type="text" placeholder="Date">
</div>


 <div class="uk-width-1-1@s">

    <div class="uk-margin" uk-margin>
        <div uk-form-custom="target: true">
            <input type="file">
            <input class="uk-input selectform" type="text" placeholder="Select file" disabled>
        </div>
    </div>

    </div>

<div class="uk-width-1-1@s">
  <input class="uk-input" type="text" placeholder="Bought By">
</div>

<div class="uk-width-1-1@s">
  <button class="uk-button uk-button-primary winesubmit">Submit Wine</button>
</div>

  </fieldset>
</form>
  </div>


<?php include('includes/sidebar.php'); ?>
</div>









<?php include("includes/footer.php"); ?>
