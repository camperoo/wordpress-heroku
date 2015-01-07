<?php
class Rey_Customize_Textarea_Control extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since 1.4.0
	 */
	public $type = 'textarea';

	/**
	 * Displays the textarea on the customize screen.
	 *
	 * @since 1.4.0
	 */
	public function render_content() { ?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="customize-control-content">
				<textarea class="widefat" cols="45" rows="3" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</div>
		</label>
	<?php }
}

class Rey_Customize_IconPicker_Control extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since 1.4.0
	 */
	public $type = 'iconpicker';

	/**
	 * Displays the textarea on the customize screen.
	 *
	 * @since 1.4.0
	 */
	public function render_content() { ?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php
				// Fontawesome icons list
				$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
				$fontawesome_path = get_template_directory() . '/font-awesome/css/font-awesome.css';
				if( file_exists( $fontawesome_path ) ) {
					@$subject = file_get_contents( $fontawesome_path );
				}

				preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

				$icons = array();

				foreach($matches as $match){
					$icons[$match[1]] = $match[2];
				}
			?>			
			<form><div class="iconpicker">
			<?php foreach( $icons as $value => $option ) { ?><i class="<?php echo $value; ?>" data-name="<?php echo $value; ?>"><input type="radio" name="<?php echo $value; ?>" value="<?php echo $value; ?>" <?php $this->link(); ?>></i><?php } ?>
			</div></form>
		</label>
	<?php }
}

class Rey_Customize_Featured_Select_Control extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since 1.4.0
	 */
	public $type = 'select';


    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);

        parent::__construct( $manager, $id, $args );
    }


	/**
	 * Displays the select on the customize screen.
	 *
	 * @since 1.4.0
	 */
	public function render_content() { ?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif;
			if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>

			<select <?php $this->link(); ?>>
				<?php
				echo '<optgroup label="Options">';
				foreach ( $this->choices as $value => $label )
					echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
				echo '</optgroup>';
				?>
				<optgroup label="Categories">
				<?php
				foreach ( $this->cats as $cat )
				{
					printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
				}
				?>
				</optgroup>
			</select>
		</label>
	<?php }
}


?>