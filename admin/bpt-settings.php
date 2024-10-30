<?php

require_once( plugin_dir_path( __FILE__ ).'../src/brown-paper-tickets-plugin.php');

use BrownPaperTickets\BPTFeed;
use BrownPaperTickets\BPTPlugin;

$menu_slug = BPTPlugin::get_menu_slug();
$plugin_slug    = BPTPlugin::get_plugin_slug();
$plugin_version = BPTPlugin::get_plugin_version();

?>
<h1>
	<img src="<?php echo esc_url( plugins_url( 'public/assets/img/bpt.png', dirname( __FILE__ ) ) )?>">
</h1>

<div class="wrap">
	<div class="welcome-panel">
		<div class="welcome-panel-content">
			<div id="greeting"></div>
			<p class="about-description">Please be aware that this plugin is no longer actively supported by Brown Paper Tickets.</p>
			<p class="about-description">While this plugin continues to work well for many users, you may encounter errors and bugs. All usage is as-is, at your own risk.</p>
		</div>
	</div>
	<nav id="<?php esc_attr_e( $menu_slug );?>">
		<ul>
			<li class="selected-tab"><a class="bpt-admin-tab" href="#usage">Usage</a></li>
			<?php echo ( is_ssl() ? '<li><a class="bpt-admin-tab" href="#purchase-settings">Purchase Settings</a></li>' : '' ); ?>
			<li><a class="bpt-admin-tab" href="#help">Help</a></li>
			<li><a class="bpt-admin-tab" href="#credits">Credits</a></li>
			<!-- <li><a class="bpt-admin-tab" href="#debug">Debug</a></li> -->
		</ul>
	</nav>
	<form method="post" action="options.php">
	<?php settings_fields( $menu_slug ); ?>
	<div id="bpt-settings-wrapper">
		<div id="usage">
			<h1>Plugin Usage</h1>
			<p class="bpt-jumbotron">This plugin allows you to display your events within your wordpress posts or using a widget</p>
			<h2>Shortcodes</h2>
			<p>Simply place one of the shortcodes where you want it in a post or page.</p>
			<table>
				<tr>
					<th>Action</th>
					<th>Shortcode</th>
					<th>Description</th>
				</tr>
				<tr>
					<td>List all of your events:</td>
					<td><pre class="bpt-inline">[list_events]</pre></td>
					<td>This will display all of your events in a ticket widget format.</td>
				</tr>
				<tr>
					<td>List a single event:</td>
					<td><pre class="bpt-inline">[list_event event_id="EVENT_ID"]</pre></td>
					<td>This will display a single event. EVENT_ID is the ID of the event you wish to display.</td>
				</tr>
				<tr>
					<td>List another producer's events:</td>
					<td><pre class="bpt-inline">[list_event client_id="CLIENT_ID"]</pre></td>
					<td>This will display the events of the producer listed.</td>
				</tr>
				<tr>
					<td>Display Calendar in Page/Post:</td>
					<td><pre class="bpt-inline">[event_calendar client_id="CLIENT_ID"]</pre></td>
					<td>This will display the events of the producer listed. The Client ID is optional.</td>
				</tr>
<!-- 				<tr>
					<td><pre class="bpt-inline">[list-events-links]</pre></td>
					<td>This will simply generate a list of links to your events.</td>
				</tr> -->
			</table>
			<h2>Widgets</h2>
			<ul>
				<li>Calendar Widget. Display Events in a Calendar. Go to <a href="widgets.php">Widgets to enable.</a></li>
			</ul>
		</div>
		<div id="help">
			<div>
				<?php do_settings_sections( $menu_slug . '_help' ); ?>
			</div>
		</div>
		<div id="credits">
			<h3>Credits</h3>
			<p>This plugin makes use of Free Software</p>
			<div>
				<ul>
					<li><a href="http://www.jquery.com" target="blank">jQuery</a></li>
					<li><a href="http://underscorejs.org/" target="_blank">Underscore</a></li>
					<li><a href="http://kylestetz.github.io/CLNDR/" target="_blank">CLNDR.js</a></li>
					<li><a href="http://www.ractivejs.org/" target="_blank">Ractive.js</a></li>
					<li><a href="http://momentjs.com/" target="_blank">Moment.js</a></li>
				</ul>
			</div>
		</div>
		<div class="plugin-debug">

		</div>

	</div>
	</form>
</div>

<script type="text/ractive" id="bpt-welcome-panel-template">
	{{ #account }}
	<h3>Hi, {{ firstName }}</h3>
	{{ /account}}
	{{ ^account }}
	<h3>Thanks for using Brown Paper Tickets.</h3>
	{{ /account }}
	<div class="bpt-status-box">

	</div>
	{{ #request }}
		{{ #message }}
			<div class="bpt-message-box">
				<p class="{{ result === false ? 'bpt-error-message' : 'bpt-success-message' }} ">{{ message }} </p>
			</div>
		{{ /message}}
	{{ /request }}
</script>
