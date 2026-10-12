<script>
    (function () {
        try {
            var theme = localStorage.getItem('theme');
            document.documentElement.setAttribute('data-theme', theme === 'dark' ? 'dark' : 'light');
        } catch (e) {
            document.documentElement.setAttribute('data-theme', 'light');
        }
    })();
</script>
