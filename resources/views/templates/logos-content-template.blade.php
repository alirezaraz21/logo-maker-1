<img src="{{ asset('imgs/loading.gif') }}" style="display: none" class="loading">

<div id="icons-results-page" style="display: none" class="half-page-top page-content">
    <p class="half-page-top-header">
        Your Results
    </p>
    <p class="half-page-top-resume">
        Click on the chosen logo to download a PNG file.
    </p>
    <p class="half-page-top-resume">
       If you didn’t like any of the results, just click “Generate more”.
    </p>

    <div id="result-icons"></div>

    @include('components.download-icon-modal')
</div>

