<?php
$loadMenu = $topMenu;
if (!empty($type) && $type == 'bottom') {
	$loadMenu = $bottomMenu;
}

if (empty($ul['class'])) {
	$ul['class'] = 'dropdown';
}

if ($loadMenu) : ?>
	<ul<?php if (!empty($ul['class'])) : ?> class="<?php echo $ul['class']; ?>"<?php endif; ?>>
		<?php
			$options = array();
			if (!empty($li)) {
				$options['li'] = $li;
			}
			if (!empty($children)) {
				$options['children'] = $children;
			}

			echo $this->MenuBuilder->load($loadMenu, $options);
		?>
	</ul>
<?php endif; ?>