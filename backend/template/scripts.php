<script type="text/javascript" src="<?php Setting::uri(); ?>design/js/jquery.js"></script>
<script type="text/javascript" src="<?php Setting::uri(); ?>design/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	var editor = CKEDITOR.replace('description',{height: 350});
    AjexFileManager.init({returnTo: 'ckeditor', editor: editor});
</script>