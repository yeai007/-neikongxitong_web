<?php

/**
 * @filename twigClass.php  
 * @encoding UTF-8  
 * @author liguangming <JN XianHe>  
 * @datetime 2017-7-18 11:21:19
 *  @version 1.0 
 * @Description
 *  */
class TwigClass {

    public $twig;
    public $config;
    private $data = array();

    /**
     * 读取配置文件twig.php并初始化设置
     *
     */
    public function __construct($config, $twig_data) {
        $config_default = array(
            'debug' => false,
            'auto_reload' => true
//            'extension' => '.tpl',
        );

        $this->data = $twig_data;
        $this->config = array_merge($config_default, $config);
       // Composer::register();
        $loader = new Twig_Loader_Filesystem($this->config['template_dir']);
        $this->twig = new Twig_Environment($loader, array(
            'cache' => $this->config['cache_dir'],
            'debug' => $this->config['debug'],
            'auto_reload' => $this->config['auto_reload'],
        ));
    }

    /**
     * 给变量赋值
     *
     * @param string|array $var
     * @param string $value
     */
    public function assign($var, $value = NULL) {
        if (is_array($var)) {
            foreach ($var as $key => $val) {
                $this->data[$key] = $val;
            }
        } else {
            $this->data[$var] = $value;
        }
    }

    /**
     * 模版渲染
     *
     * @param string $template 模板名
     * @param array $data 变量数组
     * @param bool $return true返回 false直接输出页面
     * @return string
     */
    public function render($template, $data = array(), $return = TRUE) {
        @$template = $this->twig->loadTemplate($this->getTemplateName($template));
        @$data = array_merge($this->data, $data);
        $islogin = isset($_SESSION['userinfo']) ? true : false;
        $data['islogin'] = $islogin;
        $data['session'] = $islogin ? json_decode($_SESSION['userinfo'], true) : null;
        $data['localuser'] = isset($_SESSION['local_user']) ? $_SESSION['local_user'] : null;
        if ($return === TRUE) {
            return $template->render($data);
        } else {
            return $template->display($data);
        }
    }

    /**
     * 获取模版名
     *
     * @param string $template
     * @return string
     */
    public function getTemplateName($template) {
        @$default_ext_len = strlen($this->config['extension']);
        if (substr($template, -$default_ext_len) != $this->config['extension']) {
            $template .= $this->config['extension'];
        }
        return $template;
    }

    /**
     * 字符串渲染
     *
     * @param string $string 需要渲染的字符串
     * @param array $data 变量数组
     * @param bool $return true返回 false直接输出页面
     * @return object
     */
    public function parse($string, $data = array(), $return = FALSE) {
        $string = $this->twig->loadTemplate($string);
        $data = array_merge($this->data, $data);
        if ($return === TRUE) {
            return $string->render($data);
        } else {
            return $string->display($data);
        }
    }

}

/* End of file Twig.php */
/* Location: ./application/libraries/Twig.php */
