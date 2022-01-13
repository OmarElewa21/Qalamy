<div style="{{(App::isLocale('ar') ? 'left:0; right:250px;' : ' ')}}"  class="footerbar">
    <footer class="footer">
        <p class="mb-0">© 2020 {{ getSystemSetting('type_footer')->value }} v{{ env('APP_VERSION') }}</p>
    </footer>
</div>
