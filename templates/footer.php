<ul class="footer-info">
	<li class="footer-info--list">
		<ul id="contact">
			<!-- <li class="footer-info--heading">contact us</li> -->
			<?php
				$phone_number = get_field( 'phone_number' );
				$address = get_field( 'address' );

				$facebook = get_field( 'facebook_link' );
				$twitter = get_field( 'twitter_link' );
				$instagram = get_field( 'instagram_link' );
			?>
			<li class="footer-info--address"><span class="footer-info--address-item"><?php echo esc_html( $phone_number ); ?></span> <span class="footer-pipe">&nbsp;&nbsp;|&nbsp;&nbsp;</span> <span class="footer-info--address-item"><?php echo esc_html( $address ); ?></span> <span class="footer-pipe">&nbsp;&nbsp;|&nbsp;&nbsp;</span> <span class="footer-info--address-item">Chicago, Illinois 60657</span></li>
		</ul>
	</li>
	<li class="footer-info--list">
		<ul>
			<li class="footer-info--social-media"><a href="<?php echo esc_url( $facebook ); ?>" target="_blank">facebook</a></li>
			<li class="footer-info--social-media"><a href="<?php echo esc_url( $twitter ); ?>" target="_blank">twitter</a></li>
			<li class="footer-info--social-media"><a href="<?php echo esc_url( $instagram ); ?>" target="_blank">instagram</a></li>
			<li class="footer-info--item copyright">&copy; LiveCentrum 2016</li>
		</ul>
	</li>
	<!-- <li class="footer-info--list">
		<ul>
			<li class="footer-info--item">privacy policy</li>
			<li class="footer-info--item">terms of service</li>
			<li class="footer-info--item">&copy; Centrum Living 2016</li>
		</ul>
	</li> -->
</ul>
