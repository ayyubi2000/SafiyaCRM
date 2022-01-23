<x-assets.head />
@laravelPWA
<x-assets.top-navbar />
<x-assets.side-bar />
<div class="content-wrapper">
    <x-page-elements.errors />
    <x-page-elements.session-status />
    <x-dynamic-component :vars="$vars" :component="$page" />
</div>
<x-assets.footer />
<x-assets.foot />
