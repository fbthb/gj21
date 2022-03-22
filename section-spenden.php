<?php
$spenden_text = get_theme_mod('spenden_text');
$spenden_text2 = get_theme_mod('spenden_text2');
$gliederung_text = get_theme_mod('gliederung_text');
?>
	<section id="spenden" class="homesection">
		<h2>Spenden</h2>
		<div class="textcontent">
		<p><strong><?php if($spenden_text!="") echo $spenden_text; else echo "Wir alle brennen für junggrüne Politik und engagieren uns ehrenamtlich für eine bessere Welt – aber Engagement kostet auch Geld."?></strong></p>
		<p class="regular"><?php if($spenden_text2!="") echo $spenden_text2; else echo ""?></p>
		</div>
		
		<?php if(get_theme_mod('spenden_paypal')!="") { ?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" class="form-donation-paypal">
			<p><strong>Direkt per PayPal spenden</strong></p>
            <input type="hidden" name="cmd" value="_donations">
            <input type="hidden" name="business" value="<?=get_theme_mod('spenden_paypal')?>">
            <input type="hidden" name="lc" value="DE">
            <input type="hidden" name="item_name" value="GRÜNE JUGEND<?php if($gliederung_text!="") echo " ".$gliederung_text?>">
            <input type="hidden" name="currency_code" value="EUR">
            <input type="hidden" name="no_note" value="0">
            <input type="hidden" name="charset" value="utf-8">
            <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">

            <div class="form-group clear">
	            <label class="radio-inline">
				<input type="radio" value="5.00" name="amount"> 5€
				</label><label class="radio-inline">
				<input type="radio" value="10.00" name="amount"> 10€
				</label><label class="radio-inline">
				<input type="radio" value="15.00" name="amount"> 15€
				</label><label class="radio-inline">
				<input type="radio" value="25.00" name="amount"> 25€
				</label><label class="radio-inline">
				<input type="radio" value="50.00" name="amount"> 50€
				</label><label class="radio-inline">
				<input type="radio" value="75.00" name="amount"> 75€
				</label><label class="radio-inline">
				<input type="radio" value="100.00" name="amount"> 100€
				</label><label class="radio-inline">
				<input type="radio" value="200.00" name="amount"> 200€
				</label>      
			</div>
                
            <input type="submit" name="Donate" class="btn btn-yellow" value="Jetzt spenden!">
            <p><a href="<?php echo home_url( '/' ); ?>spenden">Weitere Spendenmöglichkeiten</a></p>
        </form>
        <?php } ?>
	</section>