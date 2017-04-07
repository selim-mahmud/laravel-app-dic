{{-- Support for Android and Opera browser select menus --}}
<script>
    $(function () {
        // Android checks and changes
        var nua = navigator.userAgent
        var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
        if (isAndroid) {
            $('select.form-control').removeClass('form-control').css('width', '100%').css('height','32px'); /* resets select dropdown to default and sets height/width otherwise select fields look like regular inputs */
            $('.checkbox input').css('margin-top', '-2px'); /* removes margin-top on checkbox to line up labels */
        }
        // Opera checks and changes
        var isChromium = window.chrome;
        var isOpera = window.navigator.userAgent.indexOf("OPR") > -1 || window.navigator.userAgent.indexOf("Opera") > -1;
        if (isChromium !== null && isOpera == true) {
            $('.form-control').css('height', '30px'); /* change size of form controls or inputs are too tall */
        }
    })
</script>