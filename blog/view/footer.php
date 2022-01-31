<footer>
    &copy; Blog <?php echo date("Y");?>
    <span class="footerRight">
        <a href="/home/contact/">Contact</a>
        <a href="/home/page/about/">About</a>
    </span>
</footer>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>
<script src="/js/ckeditor5/build/ckeditor.js"></script>
<script>ClassicEditor
        .create( document.querySelector( '.editor' ), {

            ckfinder: {
                        uploadUrl: '/home/uploadJs',
                        filebrowserUploadMethod:'form'
                    },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'undo',
                    'redo',
                    'codeBlock',
                    'fontColor',
                    'fontBackgroundColor',
                    'MathType',
                    'ChemType',
                    'htmlEmbed'
                ]
            },
            language: 'en',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            licenseKey: '',
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( error => {
            console.error( 'Oops, something went wrong!' );
            console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
            console.warn( 'Build id: ioztnw2p6l2m-hlv9k5ypcfv' );
            console.error( error );
        } );
</script>
</body>
</html>