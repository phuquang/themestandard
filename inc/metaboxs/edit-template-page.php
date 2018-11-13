<?php
class CbaMetaboxEditFilePage
{
    public $nonce = '_nonce_edit_file_page';
    public function __construct()
    {
        if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }

    }

    public function init_metabox() {
        add_action('admin_enqueue_scripts', array($this,'cba_metabox_enqueue'));
        add_action('add_meta_boxes', array($this,'cba_metabox_add'), 10, 2);
        add_action('save_post', array($this,'cba_metabox_save'), 10, 2);
    }

    public function cba_metabox_add($post_type)
    {
        global $post;
        $slug = $post->post_name;
        $str = '';
        if(!empty($slug)){
            $file = get_template_directory().'/template-pages/page-'.$slug.'.php';
            $str = ' (Current edit file '.$file.')';
        }

        add_meta_box(
            'edit_file_page',
            'Edit File'.$str,
            array($this,'cba_metabox_callback'),
            'page',
            'normal'
        );
    }

    public function cba_metabox_callback($post, $args)
    {
        wp_nonce_field( basename(__FILE__), $this->nonce );
        $slug = $post->post_name;
        $file = get_template_directory().'/template-pages/page-'.$slug.'.php';
        $content = '';
        try {
            if (file_exists($file)){
                $content = file_get_contents($file);
            }


            if ($content === false) {
                // Handle the error
            }
        } catch (Exception $e) {
            // Handle exception
        }
        ?>
        <textarea name="sourcecode" id="sourcecode_val" rows="10" cols="100" autocapitalize="off" autocorrect="off" wrap="off"><?php echo $content ?></textarea>
        <a href="javascript:;" id="btn_sourcecode_save" class="button button-large button-green">Save file</a>
        <script>
            var myTextarea = document.getElementById("sourcecode_val");

            var editor = CodeMirror.fromTextArea(myTextarea, {
                lineNumbers: true,
                mode: "application/x-httpd-php",
                keyMap: "sublime",
                autoCloseBrackets: true,
                matchBrackets: true,
                showCursorWhenSelecting: true,
                theme: "monokai",
                tabSize: 4
            });
            editor.focus();
            editor.setCursor({line: 0});
            editor.setSize('100%', '100%');
            $('#btn_sourcecode_save').on('click',function(e){
                if (!$(this).hasClass('disabled')){
                    console.log( $('#sourcecode_val').val() );
                }
                $(this).addClass('disabled')
                $(this).attr('disabled',true);
            })
        </script>
        <style>
        #edit_file_page>.inside{
            padding: 0;
            margin: 0;
        }
        .CodeMirror { height: 1000px; width: 100%; }
        .CodeMirror-scroll { max-height: 1000px; width:100%; }
        .CodeMirror-linenumber {padding: 0 3px 0 0px;}
        .button-green{margin: 5px !important;}
        .button-green{
            border-color: #00854C !important;
            background: #1BAE75 !important;
            text-shadow: 0 -1px 1px #00854C, 1px 0 1px #00854C, 0 1px 1px #00854C, -1px 0 1px #00854C;
            box-shadow: 0 1px 0 #00854C !important;
            color: #fff !important;
        }
        .button-green:hover{
            background: #1aa871 !important;
        }
        </style>
        <?php
    }

    public function cba_metabox_save($post_id)
    {
        // Add nonce for security and authentication.
        $nonce_name   = isset( $_POST[$this->nonce] ) ? $_POST[$this->nonce] : '';

        // Check if nonce is set.
        if ( ! isset( $nonce_name ) ) {
            return;
        }

        // Check if nonce is valid.
        if ( ! wp_verify_nonce( $nonce_name, basename(__FILE__) ) ) {
            return;
        }

        // Check if user has permissions to save data.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        // Check if not an autosave.
        if ( wp_is_post_autosave( $post_id ) ) {
            return;
        }

        // Check if not a revision.
        if ( wp_is_post_revision( $post_id ) ) {
            return;
        }

        global $post;
        $slug = $post->post_name;
        $file = get_template_directory().'/template-pages/page-'.$slug.'.php';
        if (!file_exists($file)){
            return;
        }

        $content = $_POST['sourcecode'];
        $content = stripslashes($content);

        $result = $this->_check_syntax($content);

        if ($result === 1){
            $fileHandle = fopen($file, 'w');
            fwrite($fileHandle,$content);
            fclose($fileHandle);
        }

        switch ($result) {
            case 1:
                echo 'Code is valid';
            case 2:
                echo 'Code is not valid PHP code';
                break;
            case 3:
                echo 'Failed to create folders';
                break;
            default:
                echo 'Unknown error?';
                break;
        }
    }

    public function cba_metabox_enqueue($hook)
    {
        if ( in_array($hook, array('post.php','post-new.php')) ) {
            $dir = get_template_directory_uri() . '/assets/admin-js/codemirror';
            wp_enqueue_style('cba-codemirror', $dir . '/codemirror.css');
            wp_enqueue_style('cba-codemirror-addon-foldgutter', $dir . '/addon/fold/foldgutter.css');
            wp_enqueue_style('cba-codemirror-addon-dialog', $dir . '/addon/dialog/dialog.css');
            wp_enqueue_style('cba-codemirror-theme-monokai', $dir . '/theme/monokai.css');

            wp_enqueue_script('cba-codemirror', $dir . '/codemirror.js');
            wp_enqueue_script('cba-codemirror-addon-searchcursor', $dir . '/addon/search/searchcursor.js');
            wp_enqueue_script('cba-codemirror-addon-search', $dir . '/addon/search/search.js');
            wp_enqueue_script('cba-codemirror-addon-dialog', $dir . '/addon/dialog/dialog.js');
            wp_enqueue_script('cba-codemirror-addon-matchbrackets', $dir . '/addon/edit/matchbrackets.js');
            wp_enqueue_script('cba-codemirror-addon-closebrackets', $dir . '/addon/edit/closebrackets.js');
            wp_enqueue_script('cba-codemirror-addon-comment', $dir . '/addon/comment/comment.js');
            wp_enqueue_script('cba-codemirror-addon-hardwrap', $dir . '/addon/wrap/hardwrap.js');
            wp_enqueue_script('cba-codemirror-addon-foldcode', $dir . '/addon/fold/foldcode.js');
            wp_enqueue_script('cba-codemirror-addon-brace-fold', $dir . '/addon/fold/brace-fold.js');
            wp_enqueue_script('cba-codemirror-mode-xml', $dir . '/mode/xml/xml.js');
            wp_enqueue_script('cba-codemirror-mode-clike', $dir . '/mode/clike/clike.js');
            wp_enqueue_script('cba-codemirror-mode-javascript', $dir . '/mode/javascript/javascript.js');
            wp_enqueue_script('cba-codemirror-mode-css', $dir . '/mode/css/css.js');
            wp_enqueue_script('cba-codemirror-mode-php', $dir . '/mode/php/php.js');
            wp_enqueue_script('cba-codemirror-mode-htmlmixed', $dir . '/mode/htmlmixed/htmlmixed.js');
            wp_enqueue_script('cba-codemirror-keymap-sublime', $dir . '/keymap/sublime.js');
            wp_enqueue_media();
        }
    }

    public function _check_syntax($content){
        $dir = get_template_directory().'/tmp';
        if (!is_dir($dir) && !mkdir($dir, 0777, true)) {
            // Failed to create folders
            return 3;
        }
        $file = $dir.'/temp'.date('Ymd').rand(100,999).'.php';
        file_put_contents($file, $content);
        exec('php -l '.$file, $output, $result);
        unlink($file);
        if ($result == 0){
            // Code is valid
            return 1;
        } else {
            // Code is not valid PHP code
            return 2;
        }
    }
}
new CbaMetaboxEditFilePage();
