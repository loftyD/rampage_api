<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?=$this->render('sidebar');?>
		</div>
		<div class="col-md-8">
			<h1>Help</h1>
			
			<p>This page will provide a reference for any codes, integers, or essential URL's that may show up in the provided resources.</p>

			<h2>Libraries</h2>

			<p>There are no officially supported client or server side libraries available, however a JS implementation authored by Merseyside Robot Fighting is available to use. This is limited in support and only provides unauthenticated <code>GET</code> and <code>POST</code> requests. Download it now at <a target="_blank" href="https://www.merseysiderobotfighting.com/plugins/rampage.min.js">https://www.merseysiderobotfighting.com/plugins/rampage.min.js</a>.</p>

			<h2>Endpoint</h2>
			<p>The API Endpoint is located at <code>https://rampagebots.co.uk/api</code>.</p>

			<h2>Rate Limiting</h2>
			<p>Unless specified, you are limited to 50 requests per hour for all resources; however some resources may have their own rate limiting set, if this is the case then this will be shown for the applicable resource.</p>

			<h2>Robot Weight Classes</h2>
			<p>Currently there are 9 weight classes. These are identified as:</p>
			<ul>
				<li><code>1</code> : Antweight (150g)</li>
				<li><code>2</code> : Beetleweight (1.5kg)</li>
				<li><code>3</code> : Featherweight (13.6kg) (30lb)</li>
				<li><code>4</code> : Middleweight</li>
				<li><code>5</code> : Heavyweight</li>
				<li><code>6</code> : US Antweight (454g) (1lb)</li>
				<li><code>7</code> : US Beetleweight (1.36kg) (3lb)</li>
				<li><code>8</code> : Featherweight Sportsman - Robodojo Rules (13.6kg) (30lb) <em>Deprecated: Do not use as of 8/3/22</em></li>
				<li><code>9</code> : Bristol Antweight - Bristol Bot Builders Rules (175g / 250g)</li>
			</ul>

		</div>
	</div>
</div>
