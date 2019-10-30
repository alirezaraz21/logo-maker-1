<div class="icons-results">
	<section>
		@foreach($icons as $key => $icon)
			<div class="icon-box" id="icon-{{$key}}">
				<div class="icon-design">
					<img id="icon-{{$key}}-img" src="{{$icon['preview_url_84']}}">
				</div>


				<div id="icon-{{$key}}-text" class="icon-text">
					{{$companyName}}
				</div>
			</div>
		@endforeach

		@if(!$resultsFound)
			<div class="alert alert-warning" role="alert">
				<p>No icons found for the tag(s): <b>{{$tags}}</b></p>
				
				<small>Try to use only single words for better results</small>
			</div>
		@endif
	</section>

	<section class="row">
		<div class="footer-buttons">
			<a href="#" onclick="homePage()">GO BACK</a>
		  	<button type="submit" onclick="getIcons(true)" class="btn btn-primary btn-submit-search-more">GENERATE MORE</button>
		</div>
	</section>

	</div>
</div>

