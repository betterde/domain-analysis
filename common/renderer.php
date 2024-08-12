<?php

/**
 * 渲染模版文件
 *
 * @param string $path 模块文件路径
 * @param array $data 模版文件上用到的变量数组
 * @return string 渲染后的html文件内容
 */
function rendering(string $path, array $data): string
{
    ob_start();
    extract($data);
    include $path;
    $str = ob_get_contents();
    ob_end_clean();
    
    return $str;
}