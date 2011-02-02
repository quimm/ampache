<?php
/* vim:set tabstop=8 softtabstop=8 shiftwidth=8 noexpandtab: */
/*
 * Show Install Config
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
 * @copyright	2001 - 2011 Ampache.org
 * @license	http://opensource.org/licenses/gpl-2.0 GPLv2
 * @version	PHP 5.2
 * @link	http://www.ampache.org/
 * @since	File available since Release 1.0
 */

$prefix = realpath(dirname(__FILE__). "/../");
require $prefix . '/templates/install_header.inc.php';
?>
	<div class="content">
		<?php echo _('Step 1 - Create the Ampache database'); ?><br />
		<strong><?php echo _('Step 2 - Create ampache.cfg.php'); ?></strong><br />
		<dl>
		<dd><?php printf(_('This step takes the basic config values and generates the config file. It will prompt you to download the config file. Please put the downloaded config file in %s'),$prefix.'/config'); ?></dd>
		</dl>
		<?php echo _('Step 3 - Set up the initial account'); ?><br />
		<?php Error::display('general'); ?>
		<br />

<span class="header2"><?php echo _('Generate Config File'); ?></span>
<?php Error::display('config'); ?>
<form method="post" action="<?php echo WEB_PATH . "?action=create_config"; ?>" enctype="multipart/form-data" >
<table>
<tr>
	<td class="align"><?php echo _('Web Path'); ?></td>
	<td class="align"><input type="text" name="web_path" value="<?php echo $web_path; ?>" /></td>
</tr>
<tr>
	<td class="align"><?php echo _('Database Name'); ?></td>
	<td class="align"><input type="text" name="local_db" value="<?php echo scrub_out($_REQUEST['local_db']); ?>" /></td>
</tr>
<tr>
	<td class="align"><?php echo _('MySQL Hostname'); ?></td>
	<td class="align"><input type="text" name="local_host" value="<?php echo scrub_out($_REQUEST['local_host']); ?>" /></td>
</tr>
<tr>
	<td class="align"><?php echo _('MySQL Username'); ?></td>
	<td class="align"><input type="text" name="local_username" value="<?php echo scrub_out($_REQUEST['local_username']); ?>" /></td>
</tr>
<tr>
	<td class="align"><?php echo _('MySQL Password'); ?></td>
	<td class="align"><input type="password" name="local_pass" value="" /></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="submit" value="<?php echo _('Write Config'); ?>" />
		<input type="hidden" name="htmllang" value="<?php echo $htmllang; ?>" />
		<input type="hidden" name="charset" value="<?php echo $charset; ?>" />
	</td>
</tr>
		</table>
		</form>
		<br />
		<table>
<tr>
        <td class="align"><?php echo _('ampache.cfg.php exists?'); ?></td>
        <td>[
        <?php
                if (!is_readable($configfile)) {
			echo debug_result('',false);
                }
                else {
			echo debug_result('',true);
                }
        ?>
        ]
        </td>
</tr>
<tr>
        <td class="align">
                <?php echo _('ampache.cfg.php configured?'); ?>
        </td>
        <td>[
        <?php
                $results = @parse_ini_file($configfile);
                if (!check_config_values($results)) {
			echo debug_result('',false);
                }
                else {
			echo debug_result('',true);
                }
        ?>
        ]
        </td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
	<?php $check_url = WEB_PATH . "?action=show_create_config&amp;htmllang=$htmllang&amp;charset=$charset&amp;local_db=" . $_REQUEST['local_db'] . "&amp;local_host=" . $_REQUEST['local_host']; ?>
	<a href="<?php echo $check_url; ?>">[<?php echo _('Recheck Config'); ?>]</a>
	</td>
		</tr>
		</table>
		<br />
		<form method="post" action="<?php echo WEB_PATH . "?action=show_create_account&amp;htmllang=$htmllang&amp;charset=$charset"; ?>" enctype="multipart/form-data">
		<input type="submit" value="<?php echo _('Continue to Step 3'); ?>" />
		</form>
	</div>
	<div id="bottom">
    	<p><strong>Ampache Installation.</strong><br />
    	For the love of Music.</p>
	</div>
</div>

</body>
</html>

