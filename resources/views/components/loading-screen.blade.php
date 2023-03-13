@push('styles')
    <link href="{{ asset('css/loading-spinner.css') }}" rel="stylesheet">
@endpush
<div id="loading-screen">
    <div class="spinner"></div>
    <p>Loading...</p>
</div>

<script>
    const loadingScreen = document.getElementById("loading-screen");

    function showLoadingScrenn() {
        loadingScreen.classList.add("active");
    }

    function hideLoadingScrenn() {
        loadingScreen.classList.remove("active");
    }
</script>
