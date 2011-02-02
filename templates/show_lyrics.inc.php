<?php
/* vim:set tabstop=8 softtabstop=8 shiftwidth=8 noexpandtab: */
/*
 * Show Lyrics
 *
 * PHP version 5
 *
 * LICENSE: GNU General Public License, version 2 (GPLv2)
 * Copyright (c) 2001 - 2011 Ampache.org All Rights Reserved
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License v2
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 * @category	Template
 * @package	Template
 * @author	Karl Vollmer <vollmer@ampache.org>
 * @author	Al Ayres <al.ayres@gmail.com>
 * @copyright	2001 - 2011 Ampache.org
 * @license	http://opensource.org/licenses/gpl-2.0 GPLv2
 * @version	PHP 5.2
 * @link	http://www.ampache.org/
 * @since	File available since Release 1.0
 */

/*
 * show_lyrics.inc.php
 * show lyrics for selected song, if user has selected to do so in preferences
 *
 * Al Ayres
 * al.ayres@gmail.com
 * Modified: 02/24/2009
 *
 * @todo get lyrics from id3tag, if possible.
*/
/* HINT: Song Title */
show_box_top(sprintf(_('%s Lyrics'), $song->title));
?>
<table class="tabledata" cellspacing="0" cellpadding="0">
<tr>
	<td>
		<?php
		if($return == "Sorry Lyrics, Not found") {
			echo _("Sorry Lyrics Not Found.");
		}
		else {
			echo $link;
			echo "<pre>" . $return . "</pre>";
		}
		?>
	</td>
</tr>
</table>
<?php show_box_bottom(); ?>
