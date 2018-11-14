<?php
class CbaMetaboxEditFilePage
{
    public $nonce = '_nonce_';
    public $id    = '';
    public $title = '';
    public $file  = '';
    public $langs = array(
        'en' => array(
            'title'              => 'Edit File',
            'button_update'      => 'Update',
            'not_file_create_it' => 'Not found template file. Create it?',
            'code_valid'         => 'Code is valid.',
            'code_note_valid'    => 'Code is not valid PHP code.',
            'failed_create_tmp'  => 'Failed to create tmp folders for check code.',
            'unknown'            => 'Unknown?',
            'file_saved'         => ' File saved.',
            'file_not_saved'     => ' File not saved!',
        ),
        'ja' => array(
            'title'              => 'ファイルの編集',
            'button_update'      => '更新',
            'not_file_create_it' => 'Not found template file. Create it?',
            'code_valid'         => 'Code is valid.',
            'code_note_valid'    => 'Code is not valid PHP code.',
            'failed_create_tmp'  => 'Failed to create tmp folders for check code.',
            'unknown'            => 'Unknown?',
            'file_saved'         => ' ファイルの編集に成功しました。',
            'file_not_saved'     => ' File not saved!',
        ),
    );
    public $lang = array();
    public function __construct()
    {
        if ( is_admin() ) {
            session_start();
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
            add_action( 'admin_init',        array( $this, 'print_error'  ) );

            $this->lang = $this->langs[substr(get_locale(), 0, 2)];
            $this->id    = 'edit_file_page';
            $this->title = $this->lang['title'];
            $this->nonce = $this->nonce . $this->id;
        }
    }

    public function init_metabox() {
        add_action('admin_enqueue_scripts', array( $this, 'enqueue'  ) );
        add_action('add_meta_boxes',        array( $this, 'register' ), 10, 2);
        add_action('save_post',             array( $this, 'saved'    ), 10, 2);
    }

    public function register($post_type)
    {
        $this->file  = $this->get_template_exists();
        $this->title = $this->title . $this->_title();
        add_meta_box( $this->id, $this->title, array( $this, 'html' ), 'page', 'normal' );
    }

    public function html($post, $args)
    {
        wp_nonce_field( basename(__FILE__), $this->nonce );
        $slug    = $post->post_name;
        $content = '';
        if (file_exists($this->file)){
            $content = file_get_contents($this->file);
        }
        ?>
        <textarea name="sourcecode" id="sourcecode_val" rows="10" cols="100" autocapitalize="off" autocorrect="off" wrap="off"><?php echo $content ?></textarea>
        <button id="btn_sourcecode_save" class="button button-large button-green"><?php echo $this->lang['button_update'] ?></button>
        <?php if (empty($this->file)): ?>
        <p style="padding-left: 10px"><label for="btn_create_file"><input type="checkbox" name="createfile" id="btn_create_file" value="create"> <?php echo $this->lang['not_file_create_it'] ?></label></p>
        <?php endif; ?>
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
        </script>
        <style>
        #edit_file_page>.inside{
            padding: 0;
            margin: 0;
        }
        .CodeMirror { height: 1000px; width: 100%; }
        .CodeMirror-scroll { max-height: 1000px; width:100%; }
        .CodeMirror-linenumber {padding: 0 3px 0 0px;}
        .button-green{margin: 10px !important;}
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

    public function saved($post_id)
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

        $content = empty($_POST['sourcecode']) ? '' : $_POST['sourcecode'];
        $content = stripslashes($content);

        $result = $this->_check_syntax($content);

        $error_msg = $this->_check_syntax_msg($result);

        if ($result === 1){
            if(!empty($_POST['createfile']) && $_POST['createfile'] == 'create'){
                $this->_create_file($slug);
            }
            $file = $this->get_template_exists();
            $result_file = $this->_saved_file($file, $content);
            $error_msg .= $result_file ? $this->lang['file_saved'] : $this->lang['file_not_saved'];
        }

        $_SESSION['CBA_MESSAGE'] = $error_msg;
        $_SESSION['CBA_MESSAGE_CODE'] = $result;
    }

    public function print_error()
    {
        if (! empty($_SESSION['CBA_MESSAGE'])){
            add_action('admin_notices', function() {
                $msg      = $_SESSION['CBA_MESSAGE'];
                $msg_code = $_SESSION['CBA_MESSAGE_CODE'];
                $classe   = $msg_code === 1 ? 'info' : 'error';
                $classe   = "notice notice-{$classe} is-dismissible code-{$msg_code}";
                $message  = $msg;
                printf( '<div class="%1$s"><p>%2$s</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>', esc_attr( $classe ), esc_html( $message ) );
                unset($_SESSION['CBA_MESSAGE']);
                unset($_SESSION['CBA_MESSAGE_CODE']);
            });
        }
    }

    public function enqueue($hook)
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

    public function _saved_file($name, $content)
    {
        if (empty($name)){
            return false;
        }
        if (!file_exists($name)){
            return false;
        }
        $handle = fopen($name, 'w');
            fwrite($handle,$content);
            fclose($handle);
            return true;
        
        return false;
    }

    private function _check_syntax($content){
        $dir = get_template_directory().'/tmp';
        if (!is_dir($dir) && !mkdir($dir, 0777, true)) {
            // Failed to create folders
            return 3;
        }
        $tmp = $dir.'/temp'.date('Ymd').rand(100,999).'.php';
        file_put_contents($tmp, $content);
        exec('php -l '.$tmp, $output, $result);
        unlink($tmp);
        if ($result == 0){
            // Code is valid
            return 1;
        } else {
            // Code is not valid PHP code
            return 2;
        }
    }
    private function _check_syntax_msg($num)
    {
        $error_msg = '';
        switch ($num) {
            case 1:
                $error_msg = $this->lang['code_valid'];
                break;
            case 2:
                $error_msg = $this->lang['code_note_valid'];
                break;
            case 3:
                $error_msg = $this->lang['failed_create_tmp'];
                break;
            default:
                $error_msg = $this->lang['unknown'];
                break;
        }
        return $error_msg;
    }

    public function _title(){
        global $post;
        $slug = $post->post_name;
        $str = '';
        if(!empty($slug) && !empty($this->file)){
            $str = ' ('.$this->file.')';
        }
        return $str;
    }

    public function _create_file($slug){
        if ($handle = fopen(get_template_directory().'/template-pages/page-'.$slug.'.php', 'w')){
            $content = "<?php\n// something\n?>\n";
            fwrite($handle, $content);
            fclose($handle);
        }
    }

    public function get_template_exists()
    {
        global $post;
        if (empty($post->post_name)){
            return '';
        }
        if (file_exists(get_template_directory().'/page-'.$post->post_name.'.php')){
            return get_template_directory().'/page-'.$post->post_name.'.php';
        } else if (file_exists(get_template_directory().'/page-'.$post->ID.'.php')){
            return get_template_directory().'/page-'.$post->ID.'.php';
        } else if (file_exists(get_template_directory().'/template-pages/page-'.$post->post_name.'.php')){
            return get_template_directory().'/template-pages/page-'.$post->post_name.'.php';
        }
        return '';
    }
}
new CbaMetaboxEditFilePage();
